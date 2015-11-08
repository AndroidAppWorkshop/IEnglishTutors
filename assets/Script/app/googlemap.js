function initMap() {
	var mapOptions = {
		zoom: 15,
		center: new google.maps.LatLng(22.5966114,120.3374047),
		scrollwheel: false,
		styles: [{
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [{
				"color": "#000000"
			}, {
					"lightness": 17
				}]
		}, {
				"featureType": "landscape",
				"elementType": "geometry",
				"stylers": [{
					"color": "#000000"
				}, {
						"lightness": 20
					}]
			}, {
				"featureType": "road.highway",
				"elementType": "geometry.fill",
				"stylers": [{
					"color": "#000000"
				}, {
						"lightness": 17
					}]
			}, {
				"featureType": "road.highway",
				"elementType": "geometry.stroke",
				"stylers": [{
					"color": "#000000"
				}, {
						"lightness": 29
					}, {
						"weight": 0.2
					}]
			}, {
				"featureType": "road.arterial",
				"elementType": "geometry",
				"stylers": [{
					"color": "#000000"
				}, {
						"lightness": 18
					}]
			}, {
				"featureType": "road.local",
				"elementType": "geometry",
				"stylers": [{
					"color": "#000000"
				}, {
						"lightness": 16
					}]
			}, {
				"featureType": "poi",
				"elementType": "geometry",
				"stylers": [{
					"color": "#000000"
				}, {
						"lightness": 21
					}]
			}, {
				"elementType": "labels.text.stroke",
				"stylers": [{
					"visibility": "on"
				}, {
						"color": "#000000"
					}, {
						"lightness": 16
					}]
			}, {
				"elementType": "labels.text.fill",
				"stylers": [{
					"saturation": 36
				}, {
						"color": "#000000"
					}, {
						"lightness": 40
					}]
			}, {
				"elementType": "labels.icon",
				"stylers": [{
					"visibility": "off"
				}]
			}, {
				"featureType": "transit",
				"elementType": "geometry",
				"stylers": [{
					"color": "#000000"
				}, {
						"lightness": 19
					}]
			}, {
				"featureType": "administrative",
				"elementType": "geometry.fill",
				"stylers": [{
					"color": "#000000"
				}, {
						"lightness": 20
					}]
			}, {
				"featureType": "administrative",
				"elementType": "geometry.stroke",
				"stylers": [{
					"color": "#000000"
				}, {
						"lightness": 17
					}, {
						"weight": 1.2
					}]
			}]
	};

	var myLatLng = new google.maps.LatLng(22.5966114,120.3374047);
		
	// Create a map object and specify the DOM element for display.
	var map = new google.maps.Map(document.getElementById('map'), mapOptions);
			
	// Create a marker and set its position.
	var marker = new google.maps.Marker({
		map: map,
		position: myLatLng,
		title: 'IEnglishTutors is here!'
	});
}