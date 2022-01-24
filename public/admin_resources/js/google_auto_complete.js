var map;


    function initMap() {
        var latitude = -33.8688; // YOUR LATITUDE VALUE
        var longitude = 151.2195; // YOUR LONGITUDE VALUE
        


        // var latitude = 27.7172453; // YOUR LATITUDE VALUE
        // var longitude = 85.3239605; // YOUR LONGITUDE VALUE
        
        var myLatLng = {lat: latitude, lng: longitude};
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 14,
          disableDoubleClickZoom: true, // disable the default map zoom on double click
        });
        
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: latitude + ', ' + longitude 
        }); 
        
        google.maps.event.addListener(map,'click',function(event) {  
            
            var marker = new google.maps.Marker({
              position: event.latLng, 
              map: map, 
              title: event.latLng.lat()+', '+event.latLng.lng()
            });
            
            document.getElementById('lat').value = event.latLng.lat();
            document.getElementById('lng').value =  event.latLng.lng();
            
            // document.getElementById('latclicked').innerHTML = event.latLng.lat();
            // document.getElementById('longclicked').innerHTML =  event.latLng.lng();
        });
        
    }

// function initMap() {
//     if ($('#lat').val() !== '' && $('#lng').val() !== ''){
//         var lat = parseFloat($('#lat').val());
//         var lng = parseFloat($('#lng').val());
//     } else{
//         var lat = -33.8688;
//         var lng = 151.2195;
//     }
//     var mapProp= {
//     center:new google.maps.LatLng(51.508742,-0.120850),
//     zoom:5,
//     };
//     var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    
//     google.maps.event.addListener(map, 'click', function(event) {
//     alert(event.latLng.lat() + ", " + event.latLng.lng());
//     });
// }

    
//     console.log(lat, lng);
//     var map = new google.maps.Map(document.getElementById('map'), {
//         center: {lat: lat, lng: lng},
//         zoom: 13
//     });

//     var card = document.getElementById('pac-card');
//     var input = document.getElementById('pac-input');
//     var types = document.getElementById('type-selector');
//     var strictBounds = document.getElementById('strict-bounds-selector');

//     map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

//     var autocomplete = new google.maps.places.Autocomplete(input);
//     autocomplete.bindTo('bounds', map);

//     autocomplete.setFields(
//         ['address_components', 'geometry', 'icon', 'name']);

//     var infowindow = new google.maps.InfoWindow();
//     var infowindowContent = document.getElementById('infowindow-content');
//     infowindow.setContent(infowindowContent);
//     var marker = new google.maps.Marker({
//         map: map,
//         anchorPoint: new google.maps.Point(0, -29)
//     });

//     autocomplete.addListener('place_changed', function() {
//         infowindow.close();
//         marker.setVisible(false);
//         var place = autocomplete.getPlace();
//         if (!place.geometry) {
//             window.alert("No details available for input: '" + place.name + "'");
//             return;
//         }
//         if (place.geometry.viewport) {
//             map.fitBounds(place.geometry.viewport);
//         } else {
//             map.setCenter(place.geometry.location);
//             map.setZoom(17); 
//         }
//         marker.setPosition(place.geometry.location);
//         marker.setVisible(true);

//         var address = '';
//         var item_Lat =place.geometry.location.lat();
//         var item_Lng= place.geometry.location.lng();
//         var item_Location = place.formatted_address;
//         // alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"_____Location="+item_Location);
//         $("#lat").val(item_Lat);
//         $("#lng").val(item_Lng);

//         if (place.address_components) {
//             address = [
//                 (place.address_components[0] && place.address_components[0].short_name || ''),
//                 (place.address_components[1] && place.address_components[1].short_name || ''),
//                 (place.address_components[2] && place.address_components[2].short_name || '')
//             ].join(' ');
//         }

//         infowindowContent.children['place-icon'].src = place.icon;
//         infowindowContent.children['place-name'].textContent = place.name;
//         infowindowContent.children['place-address'].textContent = address;
//         infowindow.open(map, marker);
//     });
 
//     function setupClickListener(id, types) {
//         var radioButton = document.getElementById(id);
//         radioButton.addEventListener('click', function() {
//             autocomplete.setTypes(types);
//         });
//     }

//     setupClickListener('changetype-all', []);
//     setupClickListener('changetype-address', ['address']);
//     setupClickListener('changetype-establishment', ['establishment']);
//     setupClickListener('changetype-geocode', ['geocode']);

//     document.getElementById('use-strict-bounds')
//         .addEventListener('click', function() {
//             console.log('Checkbox clicked! New state=' + this.checked);
//             autocomplete.setOptions({strictBounds: this.checked});
//         });
// }