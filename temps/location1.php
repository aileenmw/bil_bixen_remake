<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Webservices_3</title>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASSmyQxuIBwK-7tVql-0Y5C7yYiC2cbyQ&libraries=places" 
        type="text/javascript"></script>
    </head>
    <body>
        <?php
        ?>

        <div class="location_wrapper">
            <h2>Find nærmeste forhandler</h2>
            <input type="text" id="mapsearch" placeholder="Enter name of place">
            <div id="map-canvas"></div>
        </div>
        <script>

            var map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {
                    lat: 55.34194669999999,
                    lng: 10.320272899999964
                },
                zoom: 12
            });
            var marker = new google.maps.Marker({
                position: {
                    lat: 55.34194669999999,
                    lng: 10.320272899999964
                },
                map: map,
                draggable: true
            });

            var searchBox = new google.maps.places.SearchBox(document.getElementById('mapsearch'));

            //place change event on searchbox
            google.maps.event.addListener(searchBox, 'places_changed', function () {


                //console.log(searchBox.getPlaces()); 

                var places = searchBox.getPlaces();

                //bound
                var bounds = new google.maps.LatLngBounds();
                var i, place;

                for (i = 0; place = places[i]; i++) {
                    // console.log(place.geometry.location);
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }
                map.fitBounds(bounds);
                map.setZoom(15);
            });

        </script>
