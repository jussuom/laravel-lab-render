@props(['categories', 'categoryIds' => []])

{{-- This Blade component renders a list of categories as checkboxes. --}}
{{-- It uses the provided $categories prop to generate each checkbox with its corresponding label. --}}

@foreach ($categories as $category)
    <div class="my-2">
        <span>
            <input type="checkbox" @if (in_array($category->id, $categoryIds)) checked @endif id="categories-{{ $category->id }}"
                name="category_id[]" value="{{ $category->id }}" style="width: 20px">
            <label for="categories-{{ $category->id }}">{{ $category->name }}</label>
        </span>
    </div>
@endforeach
