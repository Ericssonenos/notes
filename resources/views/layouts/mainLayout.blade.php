<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NOTES</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
        @yield('content')
    </body>
</html>
