@props(['bookmark'])

@php
    $bookmarkTitleWithQuotes = "\"{$bookmark->title}\"";
@endphp

{{-- This Blade component displays a bookmark with options to edit or delete it. --}}
{{-- It uses the provided $bookmark prop to render the bookmark's title and URL. --}}

{{-- The component shows a confirmation dialog for deletion, which is triggered by a button click. --}}
{{-- The dialog asks the user to confirm the deletion of the bookmark. --}}

<div class="mb-4 p-4 bg-gray-700 rounded">
    <div class="flex items-center justify-between">
        <h3>
            <a href="{{ $bookmark->url }}" target="blank" class="underline">
                {{ $bookmark->title }}
            </a>
        </h3>

        <div class="flex items-baseline">
            <x-edit-button editRoute="bookmarks.edit" :resourceId="$bookmark->id" />
            <x-delete-button destroyRoute="bookmarks.destroy" :resourceId="$bookmark->id"
                confirmText="{{ __('Are you sure you want to remove') }} {{ $bookmarkTitleWithQuotes }}?" />
        </div>
    </div>
    @foreach ($bookmark->categories as $category)
        <a href="{{ route('bookmarks.index', ['category_id' => $category->id]) }}">
            <span class="mr-2 px-2 py-1 bg-gray-600 rounded text-sm">{{ $category->name }}</span>
        </a>
    @endforeach
</div>
