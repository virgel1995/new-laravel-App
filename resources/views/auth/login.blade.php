<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <x-slot name="head">
            <h2 class="text-white bg-black bg-blend-color py-3 px-20 block rounded ">
                Login
            </h2>
        </x-slot>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
<script>
    function ShowAndHidePassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
};
</script>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="show_password" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="showPassword"  onclick="ShowAndHidePassword()">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Show Password') }}</span>
                </label>

                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
                <br>
            </div>
        </form>

        <a href="{{ route('register') }}" class="py-1 px-3 text-center bg-gary hover:bg-indigo-700 rounded border border-red-900 block mt-3 text-black hover:text-white">
            {{ __("Didn't Have Account ? Rigester") }} <i class="fas fa-user-plus px-2 py-2 mr-2 rounded hover:bg-black bg-blue-400 text-white"></i>
        </a>

        <h2 class="text-center mt-2"> Or </h2>
         <a href="{{ route('register') }}" class="py-1 px-3 text-center bg-gray hover:bg-blue-900 rounded border border-red-900 block mt-3 text-black hover:text-white">
            {{ __("Login With") }} <i class="fab fa-facebook-f px-2 py-2 mr-2 rounded hover:bg-black bg-blue-900 text-white"></i>
        </a>
        <a href="{{ route('register') }}" class="  py-1 px-3 text-center bg-gray hover:bg-blue-400 rounded border border-red-900 block mt-3 text-black hover:text-white">
             {{ __("Login With") }} <i class="fab fa-twitter px-2 py-2 mr-2 rounded hover:bg-black bg-blue-400 text-white"></i>
        </a>








    </x-auth-card>
</x-guest-layout>
