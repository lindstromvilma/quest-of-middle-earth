<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Quest of Middle-earth') }}</title>

				<!-- Favicon -->
        <link rel="icon" href="{{ asset('images/one-ring.png') }}" type="image/png">

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-raleway text-moria-gray subpixel-antialiased">
        @inertia
    </body>
</html>