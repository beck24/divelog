<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/fontawesome-free-6.0.0-web/css/all.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="page-wrapper">
        <nav>
            <div class="container">
                <div class="flex flex-row items-center">
                    <a class="navbar-brand" href="{{ url('/') }}" title="{{ config('app.name') }}">
                        <img src="{{ asset('img/logo.svg') }}" class="layout-logo">
                    </a>

                    <div class="font-bold text-2xl pl-4">
                        Divelog
                    </div>

                    <ul class="flex flex-row items-center ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (!Route::has('login'))
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a href="{{ route('logout') }}"
                                    title="logout"
                                    class="flex w-10 h-10 border border-white items-center justify-center text-lg mx-1"
                                >
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
