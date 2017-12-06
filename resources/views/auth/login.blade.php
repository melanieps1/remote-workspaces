@extends('layouts.app')

@section('content')
<div class="logIn">
    <div class="floatingFormLogIn">
        <h2 class="formHeader">Log In</h2>
    
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div>
                <label for="email">Email</label>
                <div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email" class="logInInput" required>

                    @if ($errors->has('email'))
                        <span>
                            <br><strong>{{ $errors->first('email') }}</strong>
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

            <div class="rememberMe">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
            
            <button type="submit" class="authBtn">
                Log In
            </button>

        </form>

        <p class="grayTextLogIn">
            Don't have an account yet? <a href="{{ route('register') }}" class="blueLink">Sign up here</a>.
        </p>

    </div>
</div>
@endsection
