<x-guest-layout>
    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
        <div class="card card-plain mt-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Welcome</h3>
                <p class="mb-0">Enter your name, email, and password to sign up</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <label for="name">Name</label>
                    <div class="mb-3">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <label for="email">Email</label>
                    <div class="mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <label for="password">Password</label>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="confirm-password-addon" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    {{-- <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div> --}}

                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-info w-100 mt-3 mb-0">Sign Up</button>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('google.login') }}" class="btn bg-gradient-danger w-100 mt-3 mb-0">
                            <i class="fab fa-google"></i> Sign Up with Google
                        </a>
                    </div>                    
                    <div class="card-footer text-center pt-0 px-lg-2 px-1 mt-2">
                        <p class="mb-2 text-sm mx-auto">
                            Already registered?
                            <a href="{{ route('login') }}" class="text-info text-gradient font-weight-bold">Login</a>
                        </p>
                    </div>
                    {{-- <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
