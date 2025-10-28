<x-layout>
<div class="container">
    <h2>{{ __('Edit category') }}</h2>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title">{{ __('Name') }}</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $category->name) }}"
                {{-- required --}}
                spellcheck="false">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">{{ __('Update category') }}</button>
        <a href="{{ route('categories.index') }}" class="mx-2">{{ __('Cancel') }}</a>
    </form>
</div>
</x-layout>
