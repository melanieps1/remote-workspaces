<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Remote Workspaces') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav>
            <div class="nav-logo">
                <a href="/home"><img src="{{ asset('images/remoteworkspaces.svg') }}" alt="Remote Workspaces" id="logo"></a>
            </div>

            <div class="nav-buttons">
                    @if (Auth::guest())
                        <a href="{{ route('login') }}" class="log-in-out-btn">Log In</a>
                        <a href="{{ route('register') }}" class="log-in-out-btn">Sign Up</a>
                    @else

                        <a href="#" class="primary-btn">
                            Add a Workspace
                        </a>

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"
                            class="log-in-out-btn">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                        </form>
                    @endif
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkHa5kHr_JkqqHCf4Yz44SyYuMFDUX8Uw&callback=initMap" async defer></script>
</body>
</html>
