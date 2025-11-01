@props(['bookmarks'])

@if ($bookmarks->isEmpty())
    {{-- If there are no bookmarks so this section --}}
    <div class="flex items-center my-8">
        <div>{{ __("You don't have any bookmarks yet.") }}</div>
        <div class="ml-4">
            <a href="{{ route('bookmarks.create') }}" class="button">{{ __('Add Bookmark') }}</a>
        </div>
    </div>
    <hr class="my-4">
@endif

{{-- Show the list of bookmarks --}}
@foreach ($bookmarks as $bookmark)
    {{-- <x-bookmark :bookmark="$bookmark" :selectedCategoryIds="$categoryIds" /> --}}
    <x-bookmark :bookmark="$bookmark" />
@endforeach
