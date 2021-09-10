<nav x-data="{ open: false }" class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            {{-- <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                    aria-controls="mobile-menu">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div> --}}

            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto" src="{{ asset('images/logos/favicon.PNG') }}" alt="logo">
                    <img class="hidden lg:block h-8 w-auto" src="{{ asset('images/logos/favicon.PNG') }}"
                        alt="Workflow">
                </div>

                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                            <x-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                                :href="route('dashboard')" :active="request()->routeIs('dashboard')" >
                                {{ ('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link class="text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                                :href="config('chatify.routes.prefix')" :active="request()->routeIs('dashboard')">
                                {{ __('Chat') }}
                            </x-nav-link>
                            @else
                            <x-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                                :href="route('login')" :active="request()->routeIs('login')">
                                {{ __('Log in') }}
                            </x-nav-link>
                            @if (Route::has('register'))
                            <x-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                                :href="route('register')" :active="request()->routeIs('register')">
                                {{ __('Register') }}
                            </x-nav-link>
                            @endif
                            @endauth
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Mobile menu, show/hide based on menu state. -->
    <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <div class="pt-4 pb-1 border-t border-gray-200">
                @if (Route::has('login'))
                @auth
                <x-responsive-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                    :href="route('dashboard')">
                    {{ ('Dashboard') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                    :href="config('chatify.routes.prefix')">
                    {{ __('Chat') }}
                </x-responsive-nav-link>

                @else
                <x-responsive-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                    :href="route('login')">
                    {{ __('Log in') }}
                </x-responsive-nav-link>

                @if (Route::has('register'))
                <x-responsive-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                    :href="route('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
</nav>
