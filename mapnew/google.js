jQuery(function($) {
	$(document).ready(function() {
		getAdress();//On page load initialize our map function.
		});
});

function getAdress() {
	jQuery(function($) {
		$("#googlemaps").html('<div id="loading"><img src="loading.gif" /></div>');
		$.ajax( {
			url : "gmap.php",
			type : "GET",
			success : function(data) {
				// get the data string and convert it to a JSON object.
				var jsonData = JSON.parse(data);
				var latitude = new Array();
				var longitude = new Array();
				var name = new Array();
				//var addressVal = new Array();
			
				
				var logo = new Array();
				var i = 0;
				var j = 0;
				var k = 0;
				var l = 0; // Address
				$.each(jsonData, function(Idx, Value) {
					 $.each(Value, function(x, y) {
					 //Creating an array of latitude, logitude
						 if(x == 'Lat')
						 {
							 i = i + 1;
							 latitude[i] = y;
						 }
						 if(x == 'Lng')
						 {
							 j = j + 1;
							 longitude[j] = y;
						 }
						 if(x == 'Name')
						 {
							 k = k + 1;
							 name[k] = y;
							 
						 }
						
						
						
						 
					 });
				});
				$("#googlemaps").html('');
				//passing the array to initialize function, where our map will be formed
				initialize(latitude,longitude,name, logo);
			}
		});
	});
}
function initialize(latitude,longitude, name, logo) {
	console.log("Lat: "+ latitude.length);
	console.log(latitude);
	console.log("Long: "+ longitude.length);
	console.log(longitude);
	console.log("Name: "+ name.length);
	console.log(name);
	console.log("logo: "+ logo.length);
	console.log(logo);
	
	//initialization of map.
	var geocoder = new google.maps.Geocoder();
	var initCenter = new google.maps.LatLng(54.0759837, -5.87765590000004);//By default Mumbai is loaded
	var map = new google.maps.Map(document.getElementById('googlemaps'), {
	    zoom: 6,
	    center: initCenter,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	});
	
	//initialization of infowindow
	var infoWindow = new google.maps.InfoWindow;
	var boxText = document.createElement("div");
	
	var j = 1;
	var image = new google.maps.MarkerImage('icon-home.png');//Setting the marker image
	
	//Infowindow is fully customizable, here we make our infowindow stylish by adding css styles to it.
	
	var myOptions = {
			 content: boxText
			,disableAutoPan: false
			,maxWidth: 181
			,zIndex: null
			,boxStyle: { 
				  background: "#FFFFFF"
				  ,color: "#000000"
				  ,width: "300px"
				  ,padding: "10px"
				  ,borderRadius: "20px"
				  ,fontFamily: "Tahoma"
				  ,opacity: "1"
				 }
			,infoBoxClearance: new google.maps.Size(1, 1)
			,isHidden: false
			,pane: "floatPane"
			,closeBoxURL: ""
			,enableEventPropagation: false
		};
	var ib = new InfoBox(myOptions);
	
	//Final for loop for creating the markers
	for(var a = 1; a < latitude.length; ++a)
	{
		
		createMarkers(geocoder, map, name[a], latitude[a], longitude[a], ib, image  );
	}
}


function createMarkers(geocoder, map, name, latitude, longitude, ib, image) {
		
		//Setting the onclick marker function
        var onMarkerClick = function() {
            var marker = this;
            var latLng = marker.getPosition();
            ib.setContent(name);
            ib.open(map, marker);
          };
          
          google.maps.event.addListener(map, 'click', function() {
        	  ib.close();
            });
          
		  //In array lat long is saved as an string, so need to convert it into int.
          var lat = parseFloat(latitude);
          var lng = parseFloat(longitude);
        
    	var marker = new google.maps.Marker({
            map: map,
            icon: image,
            position: new google.maps.LatLng(lat, lng),
            title: name
			});
    	
		//Adding the marker.
    	google.maps.event.addListener(marker, 'click', onMarkerClick);
}



