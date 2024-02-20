<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'Laravel' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        @include('components.layouts._partials.navbar')
        @include('components.layouts._partials.sidebar')
        <div class="mt-20 ml-52 p-8 bg-gray-50">
            <div class="min-h-[calc(100vh-210px)]">
                {{ $slot }}
            </div>
            @include('components.layouts._partials.footer')
        </div>
    </body>
</html>
