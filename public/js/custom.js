var baseUrl = $('#baseUrl').val() + '/admin';
$(document).ready(function() {
    setTimeout(function() {
        $('#remove_msg').html("");
        // location.reload();
    }, 3000);
});
$(document).ready(function() {
    $("#m_datetimepicker_5").datetimepicker({
        format: "dd-mm-yyyy HH:ii P",
        showMeridian: !0,
        todayHighlight: !0,
        autoclose: !0,
        pickerPosition: "bottom-right"
    })
});

function initAutocomplete(contry_lat,contry_lng,user_lat,user_lng) {
    var contry_lat = contry_lat == '' ? 1.352083 : contry_lat;
    var contry_lng = contry_lng == '' ? 103.819839  : contry_lng;
    var user_lat = user_lat == '' ? 1.352083 : user_lat;
    var user_lng = user_lng == '' ? 103.819839 : user_lng;

    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: parseFloat(contry_lat),
            lng: parseFloat(contry_lng)
        },
        zoom: 13,
        gestureHandling: 'greedy',
        mapTypeId: 'roadmap'
    });
    var marker = new google.maps.Marker({
        position: {
            lat: parseFloat(user_lat),
            lng: parseFloat(user_lng)
        },
        map: map,
        draggable: true
    });
    google.maps.event.addListener(marker, "dragend", function(event) {
        var latitude = this.position.lat();
        var longitude = this.position.lng();
        $("#lat").val(latitude);
        $("#lng").val(longitude);
        //    console.log(latitude);
        //    console.log(longitude);
    });
    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });
    // more details for that place.
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();
        if (places.length == 0) {
            return;
        }
        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            if (marker) {
                marker.setPosition(place.geometry.location);
            }
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            //    console.log(lat);
            //    console.log(lng);
            $("#lat").val(lat);
            $("#lng").val(lng);
            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}