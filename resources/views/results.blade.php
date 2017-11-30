@extends('layouts.map')

@section('content')
<div>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

  <div class="smallSearch">
    <form method="POST" action="/workspaces/results" id="location-form">
        <div class="searchDiv">
            <div class="orangeAccentSm"></div>
            <input class="searchBarSm" type="text" placeholder="Enter a location (city or zip code)" value="{{ $formattedAddress }}" v-model="location">
        </div>
      <input name="_method" type="hidden" value="POST">
      {{ csrf_field() }}
    <button type="submit" name="button" value="search" class="searchBtnSm">
      <i class="fa fa-search searchIconSm" aria-hidden="true"></i>
      Modify Search
    </button>
    </form>
  </div>

  <div class="leftSide">
    This is results.blade.php showing.
    <br><br>
    Workspaces in database:

    <ul>
    @foreach ($workspaces as $workspace)
    	<li>{{ $workspace->name }}, {{ $workspace->address }}</li>
    @endforeach
  	</ul>
  </div>

  <div class="mapContainer">
    <div id="map"></div>
  </div>

  <script>

    function initMap() {
      // var searchedArea = {lat: 38.0406, lng: -84.5037};
      var searchedArea = "<?php echo $lat,$lng ?>";

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