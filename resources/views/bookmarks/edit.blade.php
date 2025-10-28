<x-layout>
    <div class="container">
        <h2>{{ __('Edit bookmark') }}</h2>
        <form action="{{ route('bookmarks.update', $bookmark->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" name="title" id="title" value="{{ old('title', $bookmark->title) }}"
                    {{-- required --}} spellcheck="false">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="url">{{ __('URL') }}</label>
                <input type="url" name="url" id="url" value="{{ old('url', $bookmark->url) }}"
                    {{-- required --}} spellcheck="false">
                @error('url')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-2">
                {{ __('Categories') }}:
                <x-category-checkboxes :categories="$categories" :categoryIds="$bookmark->categories->pluck('id')->toArray()" />
            </div>

            <button type="submit">{{ __('Update bookmark') }}</button>
            <a href="{{ route('bookmarks.index') }}" class="mx-2">{{ __('Cancel') }}</a>
        </form>
    </div>
</x-layout>
