<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if (Auth::user()->role == "Admin" && request()->routeIs('dashboard'))
                        <x-nav-link :href="route('accounts')" :active="request()->routeIs('accounts')">
                            All accounts
                        </x-nav-link>
                    @endif
                    @if (Auth::user()->role == "Admin" && request()->routeIs('dashboard'))
                        <x-nav-link :href="route('logs')" :active="request()->routeIs('logs')">
                            Action Log
                        </x-nav-link>
                    @endif
                    @if (Auth::user()->role == "Teacher" && request()->routeIs('dashboard'))
                        <x-nav-link :href="route('create')" :active="request()->routeIs('create')">
                            Create class
                        </x-nav-link>
                    @endif
                    @if (request()->routeIs('dashboard'))
                        <x-nav-link :href="route('join')" :active="request()->routeIs('join')">
                            Join class
                        </x-nav-link>
                    @endif
                    @if (Auth::user()->role == "Teacher" && request()->routeIs('class'))
                        <x-nav-link :href="route('code', ['class' => $class ?? request()->route('class')])">
                            See class code
                        </x-nav-link>
                    @endif
                    @if (Auth::user()->role == "Teacher" && request()->routeIs('class') || Auth::user()->role == "Teacher" && request()->routeIs('homework'))
                        <x-nav-link :href="route('homework', ['class' => $class ?? request()->route('class')])">
                            Make a task
                        </x-nav-link>
                    @endif
                    @if (Auth::user())
                        <x-nav-link :href="route('icon')" :active="request()->routeIs('accounts')">
                            Profile Picture
                        </x-nav-link>
                    @endif
                </div>
<!-- Right Side: Profile -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Profile Picture -->
                 <div class="flex items-center me-3">
    @if (Auth::user()->icon)
        <img src=" {{ asset('uploads/'.Auth::user()->icon) }}" 
             alt="Profile Picture" 
             class="w-12 h-12 rounded-full object-cover ring-2 ring-gray-700">
    @else
        <div class="w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center text-white text-sm font-bold">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
    @endif
</div>
<x-theme-toggle />

                <!-- Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ms-1 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Menu -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="..."> <!-- your existing hamburger code --> </button>
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
