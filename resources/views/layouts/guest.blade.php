
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Plant Nursery') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 px-4 py-8">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
