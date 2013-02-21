function getAliss(map, location, count, terms){
	$.ajax({
		dataType: "jsonp",
		url: "http://www.aliss.org/api/resources/search/?callback=?", 
		data: {
			location: location,
			max: count,
			query: terms
		}, 
		success: function(data) {
			$.each(data.data[0].results, function (i, item) {
				var locParts = item.locations[0].split(', ')
				var pos = new google.maps.LatLng(parseFloat(locParts[0]), parseFloat(locParts[1]))
				var marker = new google.maps.Marker({
					position: pos,
					map: map,
					title: item.title
				});

				var infowindow = new google.maps.InfoWindow({
					content: "<a href=\"" + item.uri + "\">" + item.title + "</a><br/>" + item.locationnames[0]
				});

				google.maps.event.addListener(marker, 'click', function () {
					infowindow.open(map, marker);
				});
			});
		}
	});
}

// count : number of items to retrieve
// location: place to focus on (presumably edinburgh)
// terms: search text

// needs jquery and underscore.js