<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid pe-0">
                        <img src="{{ asset('landingpage/media/logo.svg') }}" alt="logo" width="100px">
                        <div class="">
                            <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                                <li class="nav-item">
                                <a class="nav-link d-flex align-items-center me-2 active text-dark fs-6" aria-current="page" href="{{ route('client.landingpage') }}">
                                        Home
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
        <div class="card card-plain mt-8">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Welcome</h3>
                <p class="mb-0">Enter your email and password to login</p>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
                    <label for="email">Email</label>
                    <div class="mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <label for="password">Password</label>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="form-check form-switch d-flex justify-content-between align-items-center">
                        <div>
                            <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request', ['token' => 'dummy-token']) }}" class="text-info font-weight-bold" style="text-decoration: none;">Forget Password?</a>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-info w-100 mt-3 mb-0">Login</button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('google.login') }}" class="btn bg-gradient-danger w-100">
                            <i class="fab fa-google me-2"></i> Login with Google
                        </a>
                    </div>                    
                    <div class="card-footer text-center pt-0 px-lg-2 px-1 mt-2">
                        <p class="mb-4 text-sm mx-auto">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-info text-gradient font-weight-bold">Sign up</a>
                        </p>
                    </div>
                </form>
            </div>
            {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                Don't have an account?
                <a href="javascript:;" class="text-info text-gradient font-weight-bold">Sign up</a>
                </p>
            </div> --}}
        </div>
    </div>

    {{-- <div class="bg-gradient-to-br from-pink-100 via-blue-100 to-purple-100">
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
                        <a class="underline text-sm text-gray-600 hover:text-indigo-500" href="{{ route('password.reset', ['token' => 'dummy-token']) }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div> --}}
</x-guest-layout>
