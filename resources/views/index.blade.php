<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Balap Lelang</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:400, 700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
    <style>
        .body{
            font-family: 'Roboto', sans-serif;
        }
        .price-bar {
            position: absolute;
            bottom: 0;
            right: 1;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 2px 5px;
            border-radius: 3px;
            font-weight: bold;
        }
        .hiddenBtn {
            display: none;
        }
    </style>
</head>
<body class="font-roboto">
    @include('layouts.navigation')
    <section class="p-3">
        <div class="container mx-auto">
            <div class="flex justify-center items-center">
                <div class="w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($cars as $car)
                            <div class="bg-white p-4 rounded-lg shadow">
                                <div class="relative">
                                    <img src="{{ asset('storage/image_car/' . $car->Image_Car) }}" class="w-full h-48 object-cover rounded" alt="Car Image">
                                    <div class="absolute top-2 right-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <h5 class="text-lg font-bold">{{ $car->Brand_Name }} {{ $car->Name }}</h5>
                                    <div class="">
                                        <p class="text-gray-700">{{ $car->Description }}</p>
                                    </div>
                                    <div class="bg-white grid grid-cols-2 gap-x-6 gap-y-4 p-4 w-fit box-border text-sm">
                                        <div class="flex items-center box-border">
                                            <span class="mr-2.5 break-words text-black">
                                                @include('component-description.speedo')
                                            </span>
                                            <div class="inline-block break-words text-black">
                                                102,310ks
                                            </div>
                                        </div>
                                        <div class="flex items-center box-border">
                                            <span class="mr-2.5 break-words text-black">
                                                @include('component-description.gear')
                                            </span>
                                            <div class="inline-block break-words text-black">
                                                  6 Sp Manual
                                            </div>
                                        </div>
                                        <div class="flex items-center box-border">
                                            <span class="mr-2.5 break-words text-black">
                                                @include('component-description.fuel')
                                            </span>
                                            <div class="inline-block break-words text-black">
                                            Premium Unleaded Petrol
                                            </div>
                                        </div>
                                        <div class="flex items-center box-border">
                                            <span class="mr-2.5 break-words text-black">
                                                @include('component-description.engine')
                                            </span>
                                            <div class="inline-block break-words text-black">
                                                  3.5L V6 Twin Turbo
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center justify-between space-x-1">
                                        <div class="bg-black opacity-70 text-white bg-opacity-85 p-1 rounded-lg items-center inline-flex ">
                                            <span class="inline-block text-gray-500 ">
                                                @include('component-description.time')
                                            </span>
                                            <span class="inline-block">
                                                3:12:20
                                            </span>
                                            <span class="inline-block text-gray-400 ms-4">
                                                Bid:
                                            </span>
                                            <span class="inline-block ms-1">
                                                ${{ $car->Price }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-black">{{ $car->Location }}</p>
                                    </div>
                                </div>
                                
                                <div class="mt-2 flex space-x-2">
                                    <a class="hiddenBtn bg-yellow-500 text-white rounded px-2 py-1 mt-2 inline-block" href="{{ route('cars.edit', $car->id) }}">
                                        Update
                                    </a>
                                    <form method="post" action="{{ route('cars.destroy', $car->id) }}" class="hiddenBtn mt-2">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" name="delete" class='bg-red-500 text-white rounded px-2 py-1 inline-block'>Delete</button>
                                    </form>  
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-white p-4 shadow mt-4">
        @include('layouts.footer')
    </footer>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        document.getElementById('editBtn').addEventListener('click', function() {
            var buttons = document.querySelectorAll('.hiddenBtn');
            buttons.forEach(function(button) {
                if (button.style.display === 'none' || button.style.display === '') {
                    button.style.display = 'block';
                } else {
                    button.style.display = 'none';
                }
            });
        });
        document.getElementById('nav-toggle').addEventListener('click', function() {
            var navContent = document.getElementById('nav-content');
            if (navContent.classList.contains('hidden')) {
                navContent.classList.remove('hidden');
            } else {
                navContent.classList.add('hidden');
            }
        });
    </script>
</body>
</html>