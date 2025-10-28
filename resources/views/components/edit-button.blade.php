@props(['editRoute', 'resourceId'])

<a href="{{ route($editRoute, $resourceId) }}" class="edit mr-2">
    {{ __('Edit') }}
</a>
