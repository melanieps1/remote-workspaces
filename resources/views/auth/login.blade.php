@extends('layouts.app')

@section('content')
<div class="panel-heading">Login</div>

    <div>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span>
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>

                <div>
                    <input id="password" type="password" name="password" required>

                    @if ($errors->has('password'))
                        <span>
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div>
                <div>
                    <div>
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <button type="submit">
                        Login
                    </button>

                    <a href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
