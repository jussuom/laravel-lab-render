<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body class="h-full bg-gray-900">
    <div class="h-full flex flex-col items-center justify-center">
        <h1 class="text-7xl text-gray-50 mb-6">{{ __('Welcome to Laravel Lab') }}</h1>

        <div class="mt-8">
            <a href="{{ route('bookmarks.index') }}"
                class="p-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                {{ __('Bookmarks') }}
            </a>
        </div>
    </div>
    <script src="{{ asset('js/tailwind.js') }}"></script>
</body>

</html>
