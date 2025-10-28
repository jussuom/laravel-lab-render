<x-layout>
    @auth
        {{ __('Welcome back') }}, {{ auth()->user()->name }}!
        <hr class="my-4">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl">{{ __('Your bookmark categories') }}</h2>
            <div>
                <a href="{{ route('categories.create') }}" class="button">{{ __('Add new bookmark category') }}</a>
            </div>
        </div>
        <hr class="my-4">
        @if ($categories->isEmpty())
            <p>{{ __("You don't have any bookmark categories yet.") }}</p>
            <hr class="my-4">
        @endif
        @foreach ($categories as $category)
            <x-category :category="$category" />
        @endforeach
    @endauth
</x-layout>

<x-confirm-deletion-dialog />
