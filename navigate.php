<?php
$outlet = "";
if(isset($_GET['o'])) {
    $outlet = $_GET['o'];
}

?>

<!DOCTYPE html>
<html>
    <head>

    </head>
<!--    <input id = "clickMe" type="button" value = "clickme" onclick = "loadScript(50.935,-1.396);"/>-->
    <body>
        <div id="googleMap"></div>



        <script>
            var long, lat;
            var myLong, myLat;

            <?php
            if($outlet == "piazza") {
                echo "lat = 50.9343606;\n";
                echo "long = -1.3972823;\n";
            } elseif($outlet == "terrace") {
                echo "lat = 50.9352341;\n";
                echo "long = -1.3976905;\n";
             } elseif ($outlet == "arlott") {
                echo "lat = 50.934794;\n";
                echo "long = -1.3982056;\n";
            }




            ?>

            var getGeoLocation = function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition)
                } else {
                    console.log("Geolocation is not supported by this browser.");
                }
            }

            function showPosition(position) {
                myLat = position.coords.latitude;
                myLong = position.coords.longitude;
            }

            function loadScript()
            {
                getGeoLocation();
                var script = document.createElement("script");
                script.type = "text/javascript";
                script.src = "http://maps.googleapis.com/maps/api/js?key=&sensor=false&callback=initialize";
                document.body.appendChild(script);
            }

            function initialize()
            {
                var mapProp = {
                    center: new google.maps.LatLng(myLat,myLong),
                    zoom:18,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

                var blueMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(myLat, myLong),
                    icon: "blueMarker.png"
                });
                blueMarker.setMap(map);

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat,long),
                });
                marker.setMap(map);

            }

            document.getElementById('googleMap').setAttribute("style","height:" + window.innerHeight + "px;width:" + window.innerWidth + "px");

            loadScript();
            
        </script>
    </body>
</html>