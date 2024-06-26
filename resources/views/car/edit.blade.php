<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Car</h1>
    <form method="POST" action="{{ route('cars.update', $car->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="brandName" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="brandName" name="brandName" value="{{ $car->Brand_Name }}" required>
        </div>
        <div class="mb-3">
            <label for="carName" class="form-label">Car Name</label>
            <input type="text" class="form-control" id="carName" name="carName" value="{{ $car->Name }}" required>
        </div>
        <div class="mb-3">
            <label for="carPrice" class="form-label">Car Price</label>
            <input type="number" class="form-control" id="carPrice" name="carPrice" value="{{ $car->Price }}" required>
        </div>
        <div class="mb-3">
            <label for="carDesc" class="form-label">Car Description</label>
            <textarea class="form-control" id="carDesc" name="carDesc" rows="3" required>{{ $car->Description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="carLoc" class="form-label">Car Location</label>
            <input type="text" class="form-control" id="carLoc" name="carLoc" value="{{ $car->Location }}" required>
        </div>
        <div class="mb-3">
            <label for="imageFile" class="form-label">Car Image</label>
            <input type="file" class="form-control" id="imageFile" name="imageFile">
            <img src="{{ asset('storage/' . $car->Image) }}" class="img-thumbnail mt-2" width="150" alt="Car Image">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qmF3PuhMXtF4zEuwcGHJZbRuc8uCM2fH7zTD3rj4xGtbAb51blxG7Uu6p6k0Z9sP" crossorigin="anonymous"></script>
</body>
</html>
