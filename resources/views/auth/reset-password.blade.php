{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')
    
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full bg-pink-50 border border-pink-200 text-gray-900 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input id="password" class="block mt-1 w-full bg-pink-50 border border-pink-200 text-gray-900 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Konfirmasi Password')"/>
            <x-text-input id="password" class="block mt-1 w-full bg-pink-50 border border-pink-200 text-gray-900 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        {{-- <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>
        </div> --}}
    
        {{-- <div>
            <label for="password">Password Baru</label>
            <input id="password" type="password" name="password" required>
        </div> --}}
    
        {{-- <div>
            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div> --}}
    
        {{-- <button type="submit" class="btn bg-gradient-info text-black mt-4 py-2 px-4 rounded-lg">
            {{ __('Reset Password') }}
        </button>
    </form>    
</x-guest-layout> --}}

<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <h3 class="text-center mb-3">Reset Password</h3>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="{{ old('email', $email) }}" required autofocus autocomplete="username">
                    @error('email')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    @error('password')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                    @error('password_confirmation')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sync-alt"></i> Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- FontAwesome untuk ikon -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</x-guest-layout>
