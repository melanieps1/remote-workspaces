@extends('layouts.app')

@section('content')
<div class="signUp">

    <div class="floatingFormSignUp">
        <h2 class="formHeader">Sign Up</h2>

            <p class="grayText">
                Welcome to Remote Workspaces!  Sign up here to unlock new site features.
                Already have an account? <a href="{{ route('login') }}" class="blueLink">Log in here</a>.
            </p>

                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div>
                        <label for="name">Name</label>
                        <div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Enter name" class="logInInput" required autofocus>

                            @if ($errors->has('name'))
                                <span>
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label for="email">E-Mail Address</label>
                        <div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email" class="logInInput" required>

                            @if ($errors->has('email'))
                                <span>
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label for="username">Username</label>
                        <div>
                            <input id="username" type="username" name="username" value="{{ old('username') }}" placeholder="Enter desired username" class="logInInput" required>

                            @if ($errors->has('username'))
                                <span>
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <div>
                            <input id="password" type="password" name="password" placeholder="Enter password" class="logInInput" required>

                            @if ($errors->has('password'))
                                <span>
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label for="password-confirm">Confirm Password</label>
                        <div>
                            <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm password" class="logInInput" required>
                        </div>
                    </div>

                    <button type="submit" class="authBtn">
                        Sign Up
                    </button>

                </form>
            </div>
    
    </div>
@endsection
