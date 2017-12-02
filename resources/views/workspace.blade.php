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
            <input class="searchBarSm" type="text" placeholder="Enter a location (city or zip code)" name="location-search-bar">
        </div>
      <input name="_method" type="hidden" value="POST">
      {{ csrf_field() }}
      <button type="submit" name="button" value="search" class="searchBtnSm">
        <i class="fa fa-search searchIconSm" aria-hidden="true"></i>
        Modify Search
      </button>
    </form>
  </div>

  <div class="workspaceMain">
  	<div>
  		<h2>{{ $workspace->name }}</h2>
  		<div class="rating-sm">
        <p class="ratings-text">{{ $overallRating }}</p>
      </div>
    </div>
  	<h5>{{ $workspace->category->name }}</h5>
  	<p>{{ $workspace->address }}</p>
	@if ($workspace->website === null)
		<!-- TODO: This isn't working yet -->
	@else
  	<a href="{{ $workspace->website }}" target="_blank" class="blueLink"><i class="fa fa-external-link" aria-hidden="true"></i>View Website</a>
	@endif
		<p>{{ $workspace->description }}</p>
		<hr>

		<h3>Reviews</h3>

		<ul>
			
		@foreach ($ratings as $rating)
			<li>
				<p>
					{{ $rating->review }}
					<br><br>
					{{ $rating->user->username }} • {{ $rating->updated_at->format('F Y') }} • {{ $rating->average }}
				</p>
			</li>
		@endforeach

		</ul>
	</div>

  <div class="sidebar">
    
    <div class="mapContainerSm">
      <div id="map"></div>
    </div>

    <script>    
      function initMap() {
        var center = {lat: <?php echo $workspace['latitude'] ?>, lng: <?php echo $workspace['longitude'] ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          center: center,
          zoom: 15
        });

        var image = "{{ asset('images/marker-orange.png') }}";
          image.height = 23;
          image.width = 41;

        var location = new google.maps.LatLng(<?php echo $workspace['latitude']; ?>, <?php echo $workspace['longitude']; ?>);
        
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: image
        });
        
        map.setCenter(marker.getPosition());
        
      }
    </script>

    <div class="ratingSection">
      <div class="rating-sm">
        <p class="ratings-text">Overall Rating: {{ $overallRating }}</p>
      </div>
      
    @if ($ratingsCount === 1)
      <p>{{ $ratingsCount }} Total Review</p>
    @else
      <p>{{ $ratingsCount }} Total Reviews</p>
    @endif
      
      <p>Wifi Speed: {{ $wifiRating }}</p>
      <p>Location: {{ $locationRating }}</p>
      <p>Noise Level: {{ $noiseRating }}</p>
      <p>Outlet Access: {{ $outletRating }}</p>
      <p>Seating: {{ $seatRating }}</p>
      <p>Hours: {{ $hoursRating }}</p>
      <button>Add a Review</button>
    </div>
  </div>

</div>
@endsection