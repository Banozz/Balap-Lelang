<nav class="bg-gray-100 p-3 shadow">
    <div class="container flex items-center space-x-3">
        <a class="text-xl font-bold" href="#">BalapLelang</a>
        <div class="container mx-auto flex items-center space-x-2 justify-start" id="nav-content-left">
            <div class="flex space-x-1">
                <input type="text" placeholder="Search" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-black">
                <button class="text-black px-1 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
            </div>
            <a href="{{ route('cars.create') }}" class="inline-block bg-blue-500 bg-blend-multiply text-white px-4 py-2 rounded-xl">
                Sell your car!
            </a>
            <!--<a class="text-gray-700 hover:text-gray-900" href="{{ route('cars.create') }}" role="button">Add</a>-->
            <a id="editBtn" class="text-gray-500 hover:text-black" href="#" role="button">Edit</a>
        </div>
        <div class="container mx-auto flex items-center justify-end space-x-1" id="nav-content-right">
            <a id="loginBtn" class="text-gray-500 hover:text-black" href="{{ route('login') }}" role="button">Login</a>
            <p class="px-1">|</p>
            <a id="registerBtn" class="text-gray-500 hover:text-black" href="{{ route('register') }}" role="button">Register</a>
        </div>
    </div>
</nav>