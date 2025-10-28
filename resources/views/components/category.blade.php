@props(['category'])

@php
    $categoryTitleWithQuotes = "\"{$category->name}\"";
@endphp

{{-- This Blade component displays a category with options to edit or delete it. --}}
{{-- It uses the provided $category prop to render the category's name. --}}

{{-- The component shows a confirmation dialog for deletion, which is triggered by a button click. --}}
{{-- The dialog asks the user to confirm the deletion of the category. --}}

<div class="flex items-center justify-between mb-4 p-4 bg-gray-700 rounded">
    <h3>
        {{ $category->name }}
    </h3>
    <div class="flex items-baseline">
       <x-edit-button editRoute="categories.edit" :resourceId="$category->id" />
        <x-delete-button
            destroyRoute="categories.destroy"
            :resourceId="$category->id"
            confirmText="{{ __('Are you sure you want to remove') }} {{ $categoryTitleWithQuotes }}?"
        />
    </div>
</div>
