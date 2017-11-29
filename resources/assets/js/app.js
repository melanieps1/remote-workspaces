// Vue Stuff

window.Vue = require('vue');

// Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',

    methods: {
    	
    	geocode(e) {
		    e.preventDefault();

		    var location = document.getElementById('location-input').value;

		    axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
		        params: {
		            address: location,
		            key: 'AIzaSyBkHa5kHr_JkqqHCf4Yz44SyYuMFDUX8Uw'
		        }
		    })

		    .then(function(response) {

		        // console.log formatted address, lat and long
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
    
    }
});