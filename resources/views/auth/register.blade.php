<x-layout>
    <h2>Rekisteröidy</h2>
    <form method="POST" action="{{ route('auth.register') }}">
        @csrf

        <div>
            <label for="name">Nimi</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Sähköposti</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">Salasana</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">Vahvista salasana</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <div class="flex justify-between items-center py-4">
            <div>
                <button type="submit">
                    Rekisteröidy
                </button>
            </div>
            <div>
                Onko sinulla jo tunnus?
                <a href="{{ route('login') }}" class="border border-gray-300 p-2 rounded ms-1">
                    Kirjaudu sisään
                </a>
            </div>
        </div>
    </form>
</x-layout>
