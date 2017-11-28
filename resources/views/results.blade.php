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
    	<li>{{ $workspace->name }}</li>
    @endforeach
  	</ul>
  </div>

  <div class="mapContainer">
    <div id="map"></div>
  </div>

  <script>

    function initMap() {
      var searchedArea = {lat: 38.0406, lng: -84.5037};
      var map = new google.maps.Map(document.getElementById('map'), {
        center: searchedArea,
        zoom: 14
      });

      // add a marker
      var marker = new google.maps.Marker({
        position: {lat: 38.04216,lng: -84.4925379999999},
        map: map
      });

      // tooltip for marker
      var infoWindow = new google.maps.InfoWindow({
        content: '<p><strong>Awesome Inc</strong></p>'
      });

      // event listener for tooltip to show up on click
      marker.addListener('click', function() {
        infoWindow.open(map, marker);
      });
    }

  </script>

</div>
@endsection