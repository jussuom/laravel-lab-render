<x-layout>
    <div class="w-1/2 m-auto">
        <h2>{{ __('Add Category') }}</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="py-1">
                <label for="name">{{ __('Name') }}:</label>
            </div>
            <input type="text" name="name" spellcheck="false" value="{{ old('name') }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <button>{{ __('Save') }}</button>
        </form>
    </div>
</x-layout>
