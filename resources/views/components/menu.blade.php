<div class="border-gray-400 p-8">
    @auth
        <x-menu-item title="{{ __('Bookmarks') }}" targetRoute="bookmarks.index" />
        <x-menu-item title="{{ __('Categories') }}" targetRoute="categories.index" />
        <x-menu-item title="{{ __('Add Bookmark') }}" targetRoute="bookmarks.create" />
        <x-menu-item title="{{ __('Add Category') }}" targetRoute="categories.create" />
        <x-menu-item title="{{ __('Logout') }}" targetRoute="auth.logout" />
    @endauth
    {{-- @guest
        @if (Route::currentRouteName() !== 'auth.showRegistrationForm')
            <a href="{{ route('auth.showRegistrationForm') }}" class="button me-4">Rekisteröidy</a>
        @endif
        @if (Route::currentRouteName() !== 'auth.showLoginForm')
            <a href="{{ route('auth.showLoginForm') }}" class="button">Kirjaudu sisään</a>
        @endif
    @endguest --}}
</div>
