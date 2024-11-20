<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div>
    @include('layouts.navigation')

    <!-- Header -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="container">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Main content -->
    <main>
        @yield('content') <!-- Hier wordt de content van de andere views weergegeven -->
    </main>
</div>
</body>
</html>
