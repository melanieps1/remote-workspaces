<template>

	<div class="mapContainer">
    <div class="google-map" v-bind:id="map"></div>
  </div>

</template>

<script>
  
  export default {

  	name: 'google-map',
  	
  	props: ['name', 'map'],  	
  	
  	data: function() {
  		return {
  			mapName: this.name + "-map",
  		}
  	},
  	
  	mounted: function() {
  		const element = document.getElementById(this.mapName)
	    const options = {
	      zoom: 14,
	      center: new google.maps.LatLng(38.0406,-84.5037)
	    }
	    const map = new google.maps.Map(element, options);
  	}

  };

</script>

<style scoped>

	.google-map {
	  width: 80%;
	  height: 600px;
	  margin: 0 auto;
	  background: #f3f6f7;
	}

</style>