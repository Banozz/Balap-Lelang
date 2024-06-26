<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 p-3 shadow">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <!-- Left Section -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="{{ route('index') }}" class="">
                        <img src="{{ asset('image_storage/logo/BalapLelangLogo.png') }}" class=" max-w-52" alt="Car Image">
                    </a>
                </div>
                <!-- Search and Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ml-10 space-x-4">
                    <div class="flex space-x-1">
                    <input type="text" placeholder="Search for cars" class="bg-gray-300 px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-black dark:focus:ring-white dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 placeholder-black">
                    <button class="text-black px-1 py-2 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4 justify-self-end">
                        <!-- Settings Dropdown for authenticated users -->
                        <div class="ml-3 relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-3xl transition duration-150 ease-in-out">
                                        <div>Auction</div>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.292 7.708a1 1 0 0 1 1.415 0L10 11l3.293-3.292a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('index')" class="dark:text-gray-200 dark:hover:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                                        {{ __('Live Auction') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('index')" class="dark:text-gray-200 dark:hover:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                                        {{ __('Featured Auction') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('index')" class="dark:text-gray-200 dark:hover:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                                        {{ __('Past Results') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                    <a href="{{ auth()->check() && auth()->user()->usertype == 'seller' ? route('cars.create') : route('register') }}" 
                        class="inline-block bg-blue-500 text-white px-4 py-2 rounded-3xl">
                        Sell a Car!
                    </a>
                    <a href="#" class="text-gray-700 hover:text-black">Watch List</a>
                    
                    @auth
                        @if(Auth::user()->usertype == 'seller')
                            <a id="editBtn" class="text-gray-500 hover:text-black dark:text-gray-300 dark:hover:text-white" href="#" role="button">Edit</a>
                        @endif
                    @endauth
                </div>
                
            </div>



            <!-- Right Section -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4 justify-self-end">
                <!-- Settings Dropdown for authenticated users -->
                @auth
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100 focus:outline-none focus:text-gray-700 dark:focus:text-gray-100 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.292 7.708a1 1 0 0 1 1.415 0L10 11l3.293-3.292a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')" class="dark:text-gray-200 dark:hover:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" class="dark:text-gray-200 dark:hover:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500">Log in</a>
                        <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500">Register</a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden dark:bg-gray-800">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')" class="dark:text-gray-200 dark:hover:bg-gray-700">
                    {{ __('Home') }}
                </x-responsive-nav-link>
            </div>
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                @auth
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500 dark:text-gray-300">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')" class="dark:text-gray-200 dark:hover:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')" class="dark:text-gray-200 dark:hover:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                @else
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500">Log in</a>
                        <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500">Register</a>
                    </div>
                @endauth
            </div>
        </div>

        
        
    </div>
    
</nav>
