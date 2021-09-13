
<x-guest-layout> <!-- laravel/breeze -->
    <script src="{{ asset('js/script.js') }}" ></script>
    <x-auth-card >

        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <x-slot name="head">
            <h2 class="text-white bg-black bg-blend-color py-3 px-20 block rounded ">
                Rigester
            </h2>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form autocomplete="off" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mt-4">
                <x-label for="name" :value="__('First Name')" />
                <x-input id="first_name" type="text" class="block mt-1 w-full " name="first_name" :value="old('first_name')" required autocomplete="first_name" placeholder="Enter Your First Name" autofocus />
            </div>
            <!-- first name -->

            <div class="mt-4">
                <x-label for="name" :value="__('Last Name')" />
                <x-input id="middle_name" type="text" class="block mt-1 w-full" name="middle_name" :value="old('middle_name')" required autocomplete="middle_name" placeholder="Enter Your Last Name" autofocus />

            </div>
            <!-- Last Name -->

            <div class="mt-4">
                <x-label for="name" :value="__('E-Mail Address')" />

                <x-input id="email" type="email" class="block mt-1 w-full" name="email" :value="old('email')" required autocomplete="email" placeholder="Enter Your Email" autofocus />

            </div>
            <!-- email -->

            <div class="mt-4">
                <x-label for="name" :value="__('Phone Number')" />

                <x-input id="phone" type="tel" class="block mt-1 w-full" name="phone" :value="old('phone')" autocomplete="phone" placeholder="Enter Your Phone Number" autofocus />
            </div>

        <div class="mt-4 ">
                <x-label for="name" :value="__('Country')" />

                <div class=" col-6 autocomplete border-danger ">
                    <select class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="country">
                        @foreach ($countries as $country)
                            <option :value="{{$country->code}}"  >{{$country->name}} - {{$country->code}}</option>
                        @endforeach
                    </select>
                 </div>
        </div>
            <!-- Contry -->
                    <div class="mt-4">
                <x-label for="name" :value="__('Password')" />

                <x-input id="password" type="password" class="block mt-1 w-full" name="password" required autocomplete="new-password" />

        </div><!-- Password -->

        <div class="mt-4">
                <x-label for="name" :value="__('Confirm Password')" />

       <x-input id="password-confirm" type="password" class="block mt-1 w-full" name="password_confirmation" required autocomplete="new-password" />
                <div class="custom-control custom-switch">
                <x-input class="custom-control-x-input text-danger bg-dark" id="customSwitchRegister" type="checkbox" onclick="ShowAndHideRegisterPassword()" />Show Password
                </div>
        </div> <!-- retype password -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>

            <div class="row row-xs">
                <h2 class="text-center mt-2"> Or </h2>
                <a href="{{ route('register') }}" class="py-1 px-3 text-center bg-gray hover:bg-blue-900 rounded border border-red-900 block mt-3 text-black hover:text-white">
                   {{ __("Register With") }} <i class="fab fa-facebook-f px-2 py-2 mr-2 rounded hover:bg-black bg-blue-900 text-white"></i>
               </a>
               <a href="{{ route('register') }}" class="  py-1 px-3 text-center bg-gray hover:bg-blue-400 rounded border border-red-900 block mt-3 text-black hover:text-white">
                    {{ __("Register With") }} <i class="fab fa-twitter px-2 py-2 mr-2 rounded hover:bg-black bg-blue-400 text-white"></i>
               </a>
            </div>
        </form>

    </x-auth-card>
</x-guest-layout>
