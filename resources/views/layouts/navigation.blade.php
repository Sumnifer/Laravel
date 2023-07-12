<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 py-2">
    <!-- Primary Navigation Menu -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" width="300px" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-lime-600 font-bold hover:text-lime-500" >
                        <i class="fa-solid fa-house "></i>
                    </x-nav-link>
                    <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.index')" class="text-lime-600 font-bold hover:text-lime-500">
                        {{ __('Clients') }}
                    </x-nav-link>

                    <x-nav-link :href="route('tickets.index')" :active="request()->routeIs('tickets.index')" class="text-lime-600 font-bold hover:text-lime-500">
                        {{ __('Tickets') }}
                    </x-nav-link>
                    <x-nav-link :href="route('interventions.index')" :active="request()->routeIs('interventions.index')" class="text-lime-600 font-bold hover:text-lime-500">
                        {{ __('Interventions') }}
                    </x-nav-link>
                    <x-nav-link :href="route('opportunities.index')" :active="request()->routeIs('opportunities.index')" class="text-lime-600 font-bold hover:text-lime-500">
                        {{ __('Opportunités') }}
                    </x-nav-link>
                    <x-nav-link :href="route('materials.index')" :active="request()->routeIs('materials.index')" class="text-lime-600 font-bold hover:text-lime-500">
                        {{ __('Matériels') }}
                    </x-nav-link>
                    <x-nav-link :href="route('workshop.index')" :active="request()->routeIs('workshop.index')" class="text-lime-600 font-bold hover:text-lime-500">
                        {{ __('Atelier') }}
                    </x-nav-link>
                </div>
            </div>
            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-6 mb-4 transition-all w-[98%] text-center rounded-lg duration-100 absolute top-1 right-1/2 translate-x-1/2 success z-10">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                    @if (session('showCancelButton'))
                    <form action="{{ session('cancelUrl') }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="underline font-bold">
                            Annuler
                        </button>
                    </form>
                    @endif
                </div>
            @endif








            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <button class="cursor-pointer mr-4 relative before:content-['4'] before:absolute before:top-[-10px] before:right-[-10px] before:bg-blue-500 before:rounded-full before:w-4 before:text-[.6rem] before:aspect-square before:grid before:place-items-center before:text-white">
                    <i class="fa-solid fa-message text-[20px] text-lime-600"></i>
                </button>
                <button class="cursor-pointer mr-4 relative before:content-['2'] before:absolute before:top-[-10px] before:right-[-10px] before:bg-blue-500 before:rounded-full before:w-4 before:text-[.6rem] before:aspect-square before:grid before:place-items-center before:text-white">
                    <i class="fa-solid fa-bell text-[20px] text-lime-600"></i>
                </button>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger" class="flex items-center">

                        <button class="px-4 py-2 bg-lime-600 text-white inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md dark:text-gray-400 dark:bg-gray-800 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div class="">
                                <i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
                            </div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('logs.custom')">
                            {{ __('Logs') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('logs.custom')">
                            {{ __('Paramètres') }}
                        </x-dropdown-link>


                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Deconnexion') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
