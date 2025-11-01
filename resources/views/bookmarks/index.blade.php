<x-layout>
    @auth
        {{ __('Welcome back') }}, {{ auth()->user()->name }}!
        <hr class="my-4">
        <h2 class="text-3xl mb-4">{{ __('Your Bookmarks') }}</h2>
        <hr class="my-4">
        {{-- <h3 class="text-center">{{ __('Filter by category') }}:</h3> --}}
        <x-sections.filter-by-category-section :categories="$categories" :categoryId="$categoryId" :bookmarks="$bookmarks" />
        <x-sections.bookmark-list-section :bookmarks="$bookmarks" />
    @endauth
</x-layout>

<x-confirm-deletion-dialog />
