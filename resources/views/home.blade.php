@extends('layouts.app')

@section('content')
<div class="homeBlade">
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

	<div class="floatingForm">
		<h2>Find workspaces in your city</h2>
            <div>
                <form method="POST" action="/results" id="location-form">
                    <div class="searchDiv">
                        <div class="orangeAccent"></div>
                        <input class="searchBarHome" id="location-input" type="text" placeholder="Enter a location (city or zip code)">
                    </div>
                	<input name="_method" type="hidden" value="POST">
                    <button type="submit">test</button>
                	{{ csrf_field() }}
    			    <button type="submit" name="button" value="search" class="searchBtnHome">
                        <i class="fa fa-search" aria-hidden="true"></i>
    			    	Search
    			    </button>
              	</form>
            </div>
        <p class="grayText">
            Whether you are in your hometown or a new city, use Remote Workspaces to find a spot that fits your needs so you can confidently work from anywhere.
        </p>
	</div>

    <script>
        // calls geocode function
        // geocode();

        // get location form
        var locationForm = document.getElementById('location-form');

        // listen for submission
        locationForm.addEventListener('submit', geocode);

        // defines geocode function
        function geocode(e) {
            e.preventDefault();

            var location = document.getElementById('location-input').value;
            // var location = '348 e main st, lexington, ky';

            axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
                params: {
                    address: location,
                    key: 'AIzaSyBkHa5kHr_JkqqHCf4Yz44SyYuMFDUX8Uw'
                }
            })

            .then(function(response) {

                // pull formatted address, lat and long
                var formattedAddress = response.data.results[0].formatted_address;
                console.log("Formatted Address: ", formattedAddress);

                var latitude = response.data.results[0].geometry.location.lat;
                console.log("Latitude: ", latitude);

                var longitude = response.data.results[0].geometry.location.lng;
                console.log("Longitude: ", longitude);

                // address components
                var addressComponents = response.data.results[0].address_components;
                var addressComponentsOutput = '';
                for (var i = 0; i < addressComponents.length; i++) {
                    addressComponentsOutput += `${addressComponents[i].types[0]}: ${addressComponents[i].long_name}, `;
                }
                console.log("Address Components: ", addressComponentsOutput);
            })

            .catch(function(error) {
                console.log(error);  
            });
        }
    </script>

</div>
@endsection