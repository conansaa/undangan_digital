<x-guest-layout>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')
    
        <input type="hidden" name="token" value="{{ $token }}">
    
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
    
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-black py-2 px-4 rounded-lg">
            {{ __('Reset Password') }}
        </button>
    </form>    
</x-guest-layout>
