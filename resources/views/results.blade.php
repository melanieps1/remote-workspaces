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
      var markers = [
        {
          coordinates: {lat: 38.04216,lng: -84.4925379999999}
        },
        {
          coordinates: {lat: 38.059781,lng: -84.491893}
        },
        {
          coordinates: {lat: 38.032872,lng: -84.5017179999999}
        }
      ];

      // loop through markers
      for (var i = 0; i < markers.length; i++) {
        addMarker(markers[i]);
      }

      // function
      function addMarker(props) {
        var marker = new google.maps.Marker({
          position: props.coordinates,
          map: map
      });
      }

      // tooltip for marker
      // var infoWindow = new google.maps.InfoWindow({
      //   content: '<p><strong>Awesome Inc</strong></p>'
      // });

      // event listener for tooltip to show up on click
      // marker.addListener('click', function() {
      //   infoWindow.open(map, marker);
      // });
    }

  </script>

</div>
@endsection