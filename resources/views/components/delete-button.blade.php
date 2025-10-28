@props(['destroyRoute', 'resourceId', 'confirmText'])

<form action="{{ route($destroyRoute, $resourceId) }}" method="POST">
    @method('DELETE')
    @csrf

    {{-- Use a button to trigger the confirmation dialog. Button needs to be inside a form
                    so that the form can be submitted when the user confirms the deletion. The "event" parameter
                    contains the "form" element. --}}

    <button class="delete"
        onclick="confirmDelete(event, '{{ $confirmText }}', '{{ __('Yes') }}', '{{ __('No, cancel') }}')">{{ __('Delete') }}</button>
</form>
