<x-layout>
    <h2>{{ __('Add bookmark') }}</h2>
    <form action="{{ route('bookmarks.store') }}" method="POST">
        @csrf
        <div class="py-1">
            <label for="title">{{ __('Name') }}</label>
        </div>
        <input type="text" name="title" spellcheck="false" value="{{ old('title') }}" required>
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror

        <div class="py-1 mt-2">
            <label for="title">{{ __('Website URL') }}:</label>
        </div>
        <input type="text" name="url" spellcheck="false" value="{{ old('url', 'https://') }}" required>
        @error('url')
            <div class="error">{{ $message }}</div>
        @enderror

        <div class="mt-2">
            {{ __('Categories') }}:
            <x-category-checkboxes :categories="$categories" />
        </div>

        <button>{{ __('Add bookmark') }}</button>
        <a href="{{ route('bookmarks.index') }}" class="ml-1 px-4 py-2 text-white">{{ __('Cancel') }}</a>
    </form>
</x-layout>
