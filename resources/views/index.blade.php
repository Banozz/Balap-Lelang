<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front Page</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
    <style>
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
<body>
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
                                    <p class="text-gray-700">{{ $car->Description }}</p>
                                    <p class="text-sm text-gray-500">{{ $car->Location }}</p>
                                    <div class="inline-flex items-center space-x-1">
                                        <div class="bg-green-400 bg-opacity-85 p-1 rounded ">
                                            Bid: ${{ $car->Price }} 
                                        </div>
                                        <div class="p-1 rounded inline-flex items-center space-x-2 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            3:12:20
                                        </div>
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