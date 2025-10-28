<x-layout>
    <h2>{{ __('Login') }}</h2>
    <form method="POST" action="{{ route('auth.login') }}">
        @csrf

        <div>
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        @error('invalid_credentials')
            <div class="error my-2">{{ $message }}</div>
        @enderror

        <div class="flex justify-between items-center py-4">
            <div>
                <button type="submit">
                    Login
                </button>
            </div>
            <div>
                {{ __('Don\'t have an account') }}?
                <a href="{{ route('auth.showRegistrationForm') }}" class="border border-gray-300 p-2 rounded ms-1">
                    {{ __('Register') }}
                </a>
            </div>
        </div>
    </form>
</x-layout>
