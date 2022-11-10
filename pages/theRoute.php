

<div id="wrapper">
    <div id="map_canvas" style="position:static!important;margin-bottom: -100px;"></div>

    <!-- STARTING MAP DEFINITION -->
    <script type="text/javascript" src="http://maps.google.dk/maps/api/js?sensor=true&language=da"></script>
    <script type="text/javascript">
        var rendererOptions = {
            draggable: true
        };
        var map;
        var start = new google.maps.LatLng(0.0, 0.0);
        var geocoder;
        geocoder = new google.maps.Geocoder();

        // Initalize your map
        function initialize() {
            var myOptions = {
                zoom: zoom,
                mapTypeId: google.maps.MapTypeId.TERRAIN,
                center: start
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        }

        // Collect entered data and open Google Maps in a new browser tab
        function showRoute() {
            var start= document.getElementById("address").value;
            start = encodeURI(start);
             //var daChars = '\306\330\305-\346\370\345'; = æøåÆØÅ
             //var chars = { 'æ': '\306', 'ø': '\330',  'å': '\305','Æ': '\346', 'Ø': '\370', 'Å': '\345',' ': '\u0020'};        
            // start = start.replace(/[æøåÆØÅ ]/g, m => chars[m]);
             //alert(start);
            var dest_url = "http://maps.google.dk/maps?saddr=" + start + "&daddr=" + destination;
            window.open(dest_url, '_blank');
        }
   
        // Define infobox widget
        function codeAddress() {
            var address = destination;
           
            geocoder.geocode({'address': address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    var coordInfoWindow = new google.maps.InfoWindow({
                        
                        content: "<h2>Ruteplan</h2><p><b> Din destination er: " + address + "</b><b><p>Skriv din startposition</p></b><input id='address' type='textbox' value='' style='border: 1px solid #f0f0f0;-webkit-border-radius: 8px;-moz-border-radius: 8px;border-radius: 8px;'> <input type='button' value='Start' onClick='showRoute();'>",
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    alert("Geocode not available: " + status);
                }
            });
        }

        // Automatic geo localisation
        function codeLatLng() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = new google.maps.LatLng(position.coords.latitude,
                            position.coords.longitude);

                    geocoder.geocode({'latLng': pos}, function (results, status) {

                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[1]) {
                                document.getElementById("address").value = results[1].formatted_address;
                            } else {
                                // alert("No results found");
                            }
                        } else {
                            // alert("Geocoder failed due to: " + status);
                        }
                    });

                }, function () {
                    //
                });
            }
        }

    </script>

    <script>
        // DO NOT CHANGE CODE ABOVE!

        // Change custom parameters starting from here:

        // function, som henter variabel, der blev sendt med fra sidste side
        function getQueryVariable(variable)
        {
            var query = window.location.search.substring(1);
            var vars = query.split("&");
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split("=");
                if (pair[0] == variable) {
                    return pair[1];
                }
            }
            return(false);
        }

        var address = getQueryVariable("address");

        var chars = {'|': ' '};
        address = address.replace(/[|]/g, m => chars[m]);
        
        var zoom = 11; // map zoom
        var destination = address; // destination, your address
        document.getElementById('map_canvas').style.width = '100%'; // map width
        document.getElementById('map_canvas').style.height = '100vh'; // map height
        initialize();
        codeAddress();
        codeLatLng();
    </script>
    <!-- END OF MAP DEFINITION -->

</div>