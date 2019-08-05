<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
        <link href="{{ asset(mix('app.css', 'vendor/admin')) }}" rel="stylesheet">

        <script>
          window.App = @json([
            'errors' => $errors->toArray(),
            'oldInput' => session()->getOldInput(),
          ])
        </script>
    </head>
    <body class="bg-gray-300 text-gray-900 font-sans">
        @yield('body')

        <!-- Scripts -->
        <script src="{{ asset(mix('app.js', 'vendor/admin')) }}"></script>
    </body>
</html>
