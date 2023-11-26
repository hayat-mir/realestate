// let map;
let marker; // Declare a variable for the marker

function initMap() {
	var latt = parseFloat(document.getElementById("latitude").innerHTML);
	var lngg = parseFloat(document.getElementById("longitude").innerHTML);

	let options = {
		center: { lat: latt, lng: lngg },
		zoom: 15,
	};

	map = new google.maps.Map(document.getElementById("map"), options);

	// Create a marker and set its position
	marker = new google.maps.Marker({
		position: { lat: latt, lng: lngg },
		map: map, // Set the map on which the marker will be displayed
		title: "Marker Title", // Optional: Add a title to the marker
	});
}
