<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Brand' => 'required',
            'Name' => 'required',
            'Price' => 'required|numeric',
            'Description' => 'required',
            'Location' => 'required',
            'Image_Car' => 'required|image'
        ]);

        $imagePath = $request->file('Image_Car')->store('public/image_car');

        Car::create([
            'Brand' => $request->Brand,
            'Name' => $request->Name,
            'Image_Car' => basename($imagePath),
            'Price' => $request->Price,
            'Description' => $request->Description,
            'Location' => $request->Location
        ]);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'Brand' => 'required',
            'Name' => 'required',
            'Price' => 'required|numeric',
            'Description' => 'required',
            'Location' => 'required',
            'Image_Car' => 'nullable|image'
        ]);

        if ($request->hasFile('Image_Car')) {
            $imagePath = $request->file('Image_Car')->store('public/Image_Car');
            $car->Image_Car = $imagePath;
        }

        $data = $request->only(['Brand', 'Name', 'Price', 'Description', 'Location']);
        if ($request->hasFile('Image_Car')) {
            if ($car->Image_Car) {
                Storage::delete('public/Image_Car/' . $car->Image_Car);
            }
            $path = $request->file('Image_Car')->store('public/Image_Car');
            $data['Image_Car'] = basename($path);
        }

        $car->update($data);

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {   
        if ($car->Image_Car) {
            Storage::delete($car->Image_Car);
        }

        $car->delete();
        return redirect()->route('index');
    }
}
