function setMarkers(markers_data) {
	var markers = L.markerClusterGroup();
	for (var i = 0; i < markers_data.length; i++) {
		var marker = markers_data[i];
		// define icon by the event type
		var icon = new mainIcon({iconUrl: themePath + '/img/mi.png'});
		var m = L.marker([marker['lat'], marker['lng']], {icon : icon})
		m.bindPopup('<a href="' + marker['url'] + '" target="_blank">' + marker['title'] + '</a>').openPopup();
		markers.addLayer(m);
	}
	return markers
};
function get_bounds(markers_data){
	var data = []
	for (var i = 0; i < markers_data.length; i++) {
		var marker = markers_data[i];
		data.push([marker['lat'], marker['lng']])
	}
	return data
}
var mainIcon = L.Icon.extend({
	options: {
		iconSize: [15, 15]
	}
});
function get_leaflet_map(markers_data, themePath, map_element, zoom){
	
	if(markers_data.length == 1){
		var url_lat = markers_data[0]['lat'];
		var url_lng = markers_data[0]['lng'];
	}else{
		var url_lat = 50.0999191;
		var url_lng = 14.4347581;
	}	
	var zoom = zoom;
	// get the array of locations opn global map, or just a location on detail
	

	var map = L.map(map_element,{
		fullscreenControl: true,
		fullscreenControlOptions: {
			position: 'topleft'
		},
		gestureHandling: true,
		scrollWheelZoom: false
	})

	// add attributions to map
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '<a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, '
	}).addTo(map);

	
	// add location control
	// L.control.locate({
	// 	strings: {
	// 		title: "Najdi mě na mapě."
	// 	}
	// }).addTo(map);
	// add markers
	var markers = setMarkers(markers_data);
	map.addLayer(markers);
	// close all popups
	map.closePopup(); 

	// set the center and zoom
	bounds_data = get_bounds(markers_data);
	map.fitBounds(bounds_data)
	// map.setView([url_lat, url_lng], zoom);
	
}
