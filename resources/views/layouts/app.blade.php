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

    <!-- Favicon -->
    <link rel="shortcut icon" href="../images/favicon.png">

    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/e81701c933.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <div id="app">
        <nav>
            <div class="nav-logo">
                <a href="/home"><img src="../images/remoteworkspaces.svg" alt="Remote Workspaces" id="logo"></a>
            </div>

            <div class="nav-buttons">
                    @if (Auth::guest())
                        <a href="{{ route('login') }}" class="log-in-out-btn">Log In</a>
                        <a href="{{ route('register') }}" class="log-in-out-btn">Sign Up</a>
                    @else

                        <a href="{{ url('/workspaces/create') }}" class="primary-btn">
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

            <div class="nav-hamburger">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
