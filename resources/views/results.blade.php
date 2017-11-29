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
  </div>

  <div class="mapContainer">
    <div id="map"></div>
    <!-- JS code for this is in resources/js/app.js -->
  </div>

</div>
@endsection