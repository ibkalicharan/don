		function getAliss(map, location){
			var markers = []
			$.ajax({
				dataType: "jsonp",
				url: "http://www.aliss.org/api/resources/search/?callback=?", 
				data: {
					location: location
				}, 
				success: function(data) {
					console.log("request succeeded");
					$.each(data.data.results, function (item) {
						$.each(zip(item.locations, item.locationnames), function (loc) {
							markers.push(new google.maps.Marker({
								position: new gooogle.maps.LatLng(loc[0][0], loc[0][1]),
								map: map,
								title: "<a href=\"" + item.uri + "\">" + item.title + "</a><br/>" + loc[1] 
							}));
							console.log("<a href=\"" + item.uri + "\">" + item.title + "</a><br/>" + loc[1] )
						});
					});
				}
			});
			return markers;
		}

// VERY WIP
// needs jquery and underscore.js