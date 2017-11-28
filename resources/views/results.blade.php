@extends('layouts.app')

@section('content')
<div>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

<br><br><br><br>
    This is results.blade.php showing.  After clicking "Search" on home.blade, the site will redirect to this page and show the results and a map.

</div>
@endsection