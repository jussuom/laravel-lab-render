<x-layout>
    <h2>{{ __('Change Password') }}</h2>
    <form method="POST" action="{{ route('auth.changePassword') }}">
        @csrf

        <div>
            <label for="current_password">{{ __('Current Password') }}</label>
            <input id="current_password" type="password" name="current_password" required>
            @error('current_password')
                <x-error :message="$message" />
            @enderror
        </div>

        <div class="mt-4">
            <label for="new_password">{{ __('New Password') }}</label>
            <input id="new_password" type="password" name="new_password" required>
            @error('new_password')
                <x-error :message="$message" />
            @enderror
        </div>

        <div class="mt-4">
            <label for="new_password_confirmation">{{ __('Confirm New Password') }}</label>
            <input id="new_password_confirmation" type="password" name="new_password_confirmation" required>
            @error('new_password_confirmation')
                <x-error :message="$message" />
            @enderror
        </div>

        @error('password_change_error')
            <x-error :message="$message" />
        @enderror

        <div class="flex justify-between items-center py-4">
            <div>
                <button type="submit">
                    {{ __('Change Password') }}
                </button>
            </div>
        </div>
    </form>
</x-layout>
