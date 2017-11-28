@extends('layouts.map')

@section('content')
<div>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

<br><br><br><br>
  <div class="leftSide">
    This is results.blade.php showing.  After clicking "Search" on home.blade, the site will redirect to this page and show the results and a map.

    <ul>
    @foreach ($workspaces as $workspace)
    	<li>{{ $workspace->name }}</li>
    @endforeach
  	</ul>
  </div>

  <div id="map"></div>

  <script>
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 38.04216, lng: -84.4925379999999},
        zoom: 12
      });
    }
  </script>

</div>
@endsection