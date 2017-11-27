@extends('layouts.app')

@section('content')
<div>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

<br><br><br><br>
    You are logged in!  This is home.blade.php showing.

</div>
@endsection