<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Styles -->
        <link href="{{ asset(mix('app.css', 'vendor/admin')) }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset(mix('app.js', 'vendor/admin')) }}"></script>
    </body>
</html>
