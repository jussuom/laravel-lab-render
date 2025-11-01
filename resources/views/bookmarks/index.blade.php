<x-layout>
    @auth
        {{ __('Welcome back') }}, {{ auth()->user()->name }}!
        <hr class="my-4">
        <h2 class="text-3xl mb-4">{{ __('Your Bookmarks') }}</h2>
        <hr class="my-4">
        {{-- <h3 class="text-center">{{ __('Filter by category') }}:</h3> --}}
        @if ($bookmarks->isEmpty() == false)
            <div class="flex justify-center flex-wrap my-4">

                <div class="inline-block mx-2 my-1">
                    <a href="{{ route('bookmarks.index') }}"
                        class="px-4 py-2 @if (!$categoryId) bg-gray-700 @endif text-white rounded inline-block">{{ __('All') }}</a>
                </div>
                @foreach ($categories as $category)
                    <div class="inline-block mx-2 my-1">
                        <a href="{{ route('bookmarks.index', ['category_id' => $category->id]) }}"
                            class="px-4 py-2 @if (intval($categoryId) === $category->id) bg-gray-700 @endif text-white rounded inline-block">{{ $category->name }}</a>
                    </div>
                @endforeach
            </div>
            <hr class="my-4">
        @endif
        @if ($bookmarks->isEmpty())
            <div class="flex items-center my-8">
                <div>{{ __("You don't have any bookmarks yet.") }}</div>
                <div class="ml-4">
                    <a href="{{ route('bookmarks.create') }}" class="button">{{ __('Add Bookmark') }}</a>
                </div>
            </div>
            <hr class="my-4">
        @endif
        @foreach ($bookmarks as $bookmark)
            {{-- <x-bookmark :bookmark="$bookmark" :selectedCategoryIds="$categoryIds" /> --}}
            <x-bookmark :bookmark="$bookmark" />
        @endforeach
    @endauth
</x-layout>

<x-confirm-deletion-dialog />
