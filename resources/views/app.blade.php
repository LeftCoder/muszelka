<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- No index in development -->
        <meta name="robots" content="noindex,follow" />
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- CSRF Token -->
        <meta name="csrf_token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/ico" href="/favicon.ico"/>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=pacifico:400&display=swap">

        <!-- Scripts -->
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="antialiased text-slate-500">
        @inertia
    </body>
</html>
