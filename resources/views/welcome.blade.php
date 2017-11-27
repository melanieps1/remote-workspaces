<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Remote Workspaces</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div>
            @if (Route::has('login'))

            <nav>
                <div class="nav-logo">
                    <a href="/"><img src="{{ asset('images/remoteworkspaces.svg') }}" alt="Remote Workspaces" id="logo"></a>
                </div>

                <div class="nav-buttons">
                        @if (Auth::check())

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
                        @else

                            <a href="{{ route('login') }}" class="log-in-out-btn">Log In</a>
                            <a href="{{ route('register') }}" class="log-in-out-btn">Sign Up</a>

                        @endif
                </div>
            </nav>

            @endif

            <br><br><br><br>
            You are logged out!  This is welcome.blade.php showing.

        </div>
    </body>
</html>
