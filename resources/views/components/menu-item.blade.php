@props(['title', 'targetRoute'])

{{-- This Blade component represents a menu item that conditionally displays a link based on the current route. --}}
{{-- If the current route is not the target route, it renders an anchor tag with the specified title and route. --}}

<a href="{{ route($targetRoute) }}" @class(['mx-2 p-2 rounded', 'bg-gray-800' => Route::currentRouteName() === $targetRoute, 'bg-gray-600' => Route::currentRouteName() !== $targetRoute])>{{ $title }}</a>
