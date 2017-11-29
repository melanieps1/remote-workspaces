@extends('layouts.map')

@section('content')
<div>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

  <div class="leftSide">
    <br><br><br><br>
    This is results.blade.php showing.  After clicking "Search" on home.blade, the site will redirect to this page and show the results and a map.

    <ul>
    @foreach ($workspaces as $workspace)
    	<li>{{ $workspace->name }}, {{ $workspace->address }}</li>
    @endforeach
  	</ul>

    <br><br>
    <p>Location from search:</p>
    <p></p>
  </div>

  <google-map name="test"></google-map>

</div>
@endsection