<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Laravel Lab') }}: {{ __('Bookmarks Application') }}</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body class="bg-gray-800 text-gray-50">
    <div class="bg-gray-900 w-full flex justify-between items-center text-gray-50">
        <div class="ms-4 text-3xl"><a href="/"><u>{{ __('Laravel Lab') }}</u>:</a> {{ __('Bookmarks Application') }}</div>
        <x-menu />
    </div>
    <div class="w-3/4 mx-auto my-4">
        {{ $slot }}
    </div>
</body>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<x-success-toast />

<script src="{{ asset('js/tailwind.js') }}"></script>

</html>
