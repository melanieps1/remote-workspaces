@extends('layouts.app')

@section('content')
<div>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    You are logged in!
</div>
@endsection