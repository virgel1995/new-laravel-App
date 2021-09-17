<nav x-data="{ open: false }" class="bg-gray-800 ">
    <div class="">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" aria-controls="mobile-menu">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        </div>

        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <div class="absolute ml-10">
                <a id="openbtn" class="openbtn top-0 left-0 p-2 text-white rounded hover:bg-indigo-400 hover:text-white bg-black hidden">☰ </a>

                <a href="javascript:void(0)" id="closebtn" class="closebtn top-0 left-0 p-2 text-white rounded hover:bg-indigo-400 hover:text-white bg-black" >×</a>
            </div>
            <div class="flex-shrink-0 flex items-center">

            <img class="block lg:hidden h-8 w-auto" src="{{ asset('images/logos/favicon.PNG') }}" alt="logo">
            <img class="hidden lg:block h-8  ml-20 w-auto" hidden src="{{ asset('images/logos/favicon.PNG') }}" alt="Workflow">
          </div>

          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
                @if (Route::has('login'))
                @auth
                <x-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ ('Home') }}
                </x-nav-link>
                <x-nav-link class="text-red-50 px-3 py-2 rounded-md text-sm font-medium" :href="config('chatify.routes.prefix')" :active="request()->routeIs('dashboard')">
                    {{ __('Chat') }}
                </x-nav-link>
                @else
                <x-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                    :href="route('login')">
                    {{ __('Log in') }}
                </x-nav-link>

                @if (Route::has('register'))
                <x-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                    :href="route('register')">
                    {{ __('Register') }}
                </x-nav-link>
                @endif
                @endauth
                @endif
            </div>
          </div>

        </div>

        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <!-- Profile dropdown -->
          <div class="ml-3 relative">
             @if (Route::has('login'))
                @auth
            <x-dropdown align="right" width="48">

                <x-slot name="trigger">
                    <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img src="{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.Auth::user()->avatar) }}" class="h-8 w-8 rounded-full"  alt="user_logo">
                      </button>
                </x-slot>

                <x-slot name="content">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('user.index')" >
                            {{ __('profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('user.all')" >
                            {{ __('All Users') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('user.online')" >
                            {{ __('Online Users') }}
                        </x-dropdown-link>
                        <x-dropdown-link class="text-red-500" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>


            </x-dropdown>
                @endauth
                @endif
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
            <div class="px-4">
                <div class="font-medium text-base text-red-50">{{ Auth::user()->first_name }}</div>
                <div class="font-medium text-sm text-red-50">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <x-responsive-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                :href="route('dashboard')">
                {{ ('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link class=" text-red-50 px-3 py-2 rounded-md text-sm font-medium"
                :href="config('chatify.routes.prefix')">
                {{ __('Chat') }}
            </x-responsive-nav-link>

            {{-- <form method="POST" action="{{ route('logout') }}">
                @csrf
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link  class=" text-red-500 px-3 py-2 rounded-md text-sm font-medium"
                    :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form> --}}
            </div>
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
            @endif
        </div>
      </div>
    </div>
  </nav>
