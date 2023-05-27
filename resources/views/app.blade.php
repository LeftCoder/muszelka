<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title handled by Inertia Head component -->

        <!-- CSRF Token -->
        <meta name="csrf_token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="/storage/images/logo-dark.svg" media="(prefers-color-scheme: light)"/>
        <link rel="icon" type="image/svg+xml" href="/storage/images/logo-light.svg" media="(prefers-color-scheme: dark)"/>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=pacifico:400&display=swap">

        <!-- Scripts -->
        @vite('resources/js/app.ts')
        @inertiaHead
    </head>
    <body class="antialiased text-slate-500">
        @inertia
    </body>
</html>
