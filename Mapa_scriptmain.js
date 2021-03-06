var map;
var markers = [];
var infoWindow;	
	function displayLocation(position){
		// var latitude = position.coords.latitude;
		// var longitude = position.coords.longitude;
		
		// var pLocation = document.getElementById("location");
		// pLocation.innerHTML += latitude + "," + longitude + "<br>";
		// showMap(position.coords);

		 var uluru = {lat: -25.344, lng: 131.036};
		// var mapOptions = {
		// 	zoom: 11,
		// 	center:uluru,
		// 	mapTypeId:google.maps.MapTypeId.ROADMAP
		// };
		// var mapDiv = document.getElementById("map");
		// map = new google.maps.Map(mapDiv, mapOptions);
		// // var map = new google.maps.Map(
		// // 	document.getElementById('map'), {zoom: 4, center: uluru});
        // var marker = new google.maps.Marker({position: uluru, map: map});
        createMarker(uluru);
		
	}
     function showMap(coords){
		 var googleLatLong = new google.maps.LatLng(coords.latitude, coords.longitude);
		 var mapOptions = {
			 zoom: 11,
			 center:googleLatLong,
			 mapTypeId:google.maps.MapTypeId.ROADMAP
		 };
		 var mapDiv = document.getElementById("map");
		 map = new google.maps.Map(mapDiv, mapOptions);
		 markerOptions = {
			position: latLng,
			map: map,
			clickable: true
		};
		 
		 //infoWindow = new google.maps.InfoWindow
		 
		//  google.maps.event.addListener(map, "click", function(event){
		// 	 var latitude = event.latLng.lat();
		// 	 var longitude = event.latLng.lng();
			 
		// 	 var pLocation = document.getElementById("location");
		// 	 pLocation.innerHTML = latitude + ", " + longitude;
		// 	 map.panTo(event.latLng);
			 
		// 	 createMarker(event.latLng);
			 
		//  });

	 }
	 
	function createMarker(latLng){
		markerOptions = {
			position: latLng,
			map: map,
			clickable: false
		};
		var marker = new google.maps.Marker(markerOptions);
		markers.push(marker);
		// google.maps.event.addListener(marker,"click",function(event){
		// 	infoWindow.setContent("location: " + event.latLng.lat().toFixed(2) + ", " + event.latLng.lng().toFixed(2));
		// 	infoWindow.open(map, marker);
		// });
		
		
	}
	 
	function displayError(error){
		var errors = ["Unknow error", "Permission Denied by User", "Position not available", "Timeout Error"];
		var message = errors[error.code];
		console.warn("Error Getting your location: " + message, error.message);
		
	}
        
	window.onload = function(){
		if (navigator.geolocation){
			navigator.geolocation.getCurrentPosition(displayLocation, displayError);
		}else{
			alert("Sorry, this browser doesn't support geolocation");
		}
		
	}