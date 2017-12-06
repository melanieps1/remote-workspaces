@extends('layouts.map')

@section('content')
<div>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif


  <div class="smallSearch">
    <form method="POST" action="/workspaces/search" id="location-form">
        <div class="searchDiv">
            <div class="orangeAccentSm"></div>
            <input class="searchBarSm" type="text" placeholder="Enter a location (city or zip code)" value="{{ $formattedAddress }}" name="location-search-bar">
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
    <div class="results-container">

    @if (count($workspaces) > 0)

      @foreach ($workspaces as $workspace)
      	
        <div class="results-card" onclick="document.location='/workspaces/{{ $workspace->id }}'">
          <h3>{{ $workspace->name }}</h3>
          <h5>{{ $workspace->category->name }}</h5>
          <div class="results-card-desc-container">
            <div class="rating-sm">
            @if ($workspace->ratingsCount === 0)
              <p class="ratings-text">--</p>
            @else
              <p class="ratings-text">{{ $workspace->overallRating }}</p>
            @endif
            </div>
          @if ($workspace->ratingsCount === 1)
            <p class="results-card-desc">{{ $workspace->ratingsCount }} total review</p>
          @else
            <p class="results-card-desc">{{ $workspace->ratingsCount }} total reviews</p>
          @endif
          </div>
        </div>

      @endforeach

    @else
      <div class="zeroState">
      @if (Auth::guest())
        <p class="zeroStateText">No workspaces in {{ $formattedAddress }} yet!</p>
      @else
        <p class="zeroStateText">No workspaces in {{ $formattedAddress }} yet!</p>
        <p class="zeroStateSubText">Would you like to add one?</p>
        <br>
        <a href="{{ url('/workspaces/create') }}" class="primary-btn-inline">Add a Workspace</a>
      @endif
      </div>

    @endif

    </div>

  </div>

  <div class="mapContainer">
    <div id="map"></div>
  </div>

  <script>

    function initMap() {
      var lat = <?php echo $lat ?>;
      var lng = <?php echo $lng ?>;
      var searchedArea = {lat, lng};

      var map = new google.maps.Map(document.getElementById('map'), {
        center: searchedArea,
        zoom: 12
      });

      var image = "{{ asset('images/marker-orange.png') }}";
        image.height = 23;
        image.width = 41;

      <?php foreach($workspaces as $workspace){ ?>

          var location_<?php echo $workspace['id']; ?> = new google.maps.LatLng(<?php echo $workspace['latitude']; ?>, <?php echo $workspace['longitude']; ?>);
          
          var marker_<?php echo $workspace['id']; ?> = new google.maps.Marker({
              position: location_<?php echo $workspace['id']; ?>,
              map: map,
              icon: image
          });
          
          map.setCenter(marker_<?php echo $workspace['id']; ?>.getPosition());

          var infoWindow_<?php echo $workspace['id']; ?> = new google.maps.InfoWindow({
            content: "<?php echo $workspace['name']; ?>"
          });

          marker_<?php echo $workspace['id']; ?>.addListener('click', function() {
            infoWindow_<?php echo $workspace['id']; ?>.open(map, marker_<?php echo $workspace['id']; ?>);
          });

      <?php } ?>

      // function closeInfos(){
      //   if(infos.length > 0){     
      //     // detach the info-window from the marker
      //     infos[0].set("marker", null);
      //     // close it
      //     infos[0].close();
      //     // set infos to 0
      //     infos.length = 0;
      //   }
      // }
      
    }

  </script>

</div>
@endsection