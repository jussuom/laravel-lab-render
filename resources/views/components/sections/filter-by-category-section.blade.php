@props(['categories', 'categoryId', 'bookmarks'])

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
