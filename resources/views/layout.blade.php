<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
        <link href="{{ asset(mix('app.css', 'vendor/admin')) }}" rel="stylesheet">
    </head>
    <body class="bg-gray-300 text-gray-900 font-sans">
        <div id="app">
            <div class="flex min-h-screen">
                <div class="bg-blue-800">
                    <div class="h-full w-48 py-6 px-5 flex flex-col content-between">
                        <div class="flex-grow">
                            @include('admin.menu')
                        </div>

                        <div>
                            <a
                                class="flex items-center text-sm text-white hover:text-blue-400"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                <svg-icon icon="close-outline" class="text-blue-400 h-4 w-4 mr-3"></svg-icon>
                                <span>Wyloguj się</span>
                            </a>

                            <form id="logout-form" class="hidden" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

                <div class="flex-grow p-10">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset(mix('app.js', 'vendor/admin')) }}"></script>
    </body>
</html>
