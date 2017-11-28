@extends('layouts.app')

@section('content')
<div>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

		<br><br><br><br>
    components.blade.php is showing

</div>
@endsection