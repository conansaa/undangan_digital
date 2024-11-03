<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="bg-gradient-to-br from-pink-100 via-blue-100 to-purple-100">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-center text-2xl font-semibold text-gray-800 mb-6">{{ __('Login') }}</h2>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full bg-pink-50 border border-pink-200 text-gray-900 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-600" />
                    <x-text-input id="password" class="block mt-1 w-full bg-pink-50 border border-pink-200 text-gray-900 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

    {{-- <form class="login100-form validate-form flex-sb flex-w">
        <span class="login100-form-title p-b-51">
            Login
        </span>


        <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
            <input class="input100" type="text" name="username" placeholder="Username">
            <span class="focus-input100"></span>
        </div>


        <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
            <input class="input100" type="password" name="pass" placeholder="Password">
            <span class="focus-input100"></span>
        </div>

        <div class="flex-sb-m w-full p-t-3 p-b-24">
            <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                <label class="label-checkbox100" for="ckb1">
                    Remember me
                </label>
            </div>

            <div>
                <a href="#" class="txt1">
                    Forgot?
                </a>
            </div>
        </div>

        <div class="container-login100-form-btn m-t-17">
            <button class="login100-form-btn">
                Login
            </button>
        </div>

    </form> --}}
