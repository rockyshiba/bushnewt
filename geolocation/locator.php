<?php
    $host = "my03.winhost.com";
    $db = "mysql_95596_wp";
    $user = "";
    $pass = "";
    $charset = "utf8";

    try{
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, $user, $pass, $opt);
    }
    catch(PDOException $exec){
        print_r($exec->getMessage());
    }

    //insert new address
    if(isset($_POST["submit"])){
        $new_address = $_POST["address"];
        $new_address_query = "INSERT INTO `tf_addresses` (`Id`, `Address`, `Created_at`) VALUES (NULL, '$new_address', CURRENT_TIMESTAMP);";
        try{
        $new_stmt = $pdo->query($new_address_query);
        }
        catch(PDOException $exec){
            print_r($exec->getMessage());
        }
    }

    $get_addresses_query = "SELECT * FROM tf_addresses ORDER BY Created_at DESC LIMIT 5";

    $stmt = $pdo->query($get_addresses_query);
    $addresses = $stmt->fetchAll();
    //var_dump($addresses);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            #map{
                height: 500px;
            }
        </style>
    </head>
    <body>
        <form action="" method="post">
            <label for="address">Address: </label><input type="text" name="address"><br>
            <input type="submit" name="submit" value="Plot">
        </form>
        <ul>
            <?php foreach($addresses as $a) : ?>
                <li><?php echo $a["Address"]; ?></li>
            <?php endforeach; ?>
        </ul>
        <div id="map"></div>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEr9ejID0Nx0TBwFWPhmXeGbZn7xrMQic
        &libraries=visualization&callback=initMap">
    </script>
    <script type="text/javascript">
        function initMap()
        {
            var map = new google.maps.Map(document.getElementById('map'),
                {
                    center: {lat: 43.670218, lng: -79.386782},
                    zoom: 5,
                    styles: [{
                        featureType: 'poi',
                        stylers: [{visibility: 'off'}]  // Turn off points of interest.
                    }, {
                        featureType: 'transit.station',
                        stylers: [{visibility: 'off'}]  // Turn off bus stations, train stations, etc.
                    }],
                    disableDoubleClickZoom: false
                });
            var cities_list = [], markers =[], geocoder = new google.maps.Geocoder();
            <?php foreach($addresses as $a) : ?>
                cities_list.push('<?php echo $a["Address"];?>');
            <?php endforeach; ?>
            console.log(cities_list);
            cities_list_index = 0;
            var tick = setInterval(function()
            {
                console.log(cities_list_index);
                if(cities_list[cities_list_index] === "")
                {
                    console.log("Cities list index value is 0");
                    cities_list_index++;
                }
                else if(cities_list_index < cities_list.length)
                {
                    console.log("Placing dot on google maps");
                    place_dot(cities_list[cities_list_index]);
                    cities_list_index++;
                }
                else
                {
                    clearTimeout(tick);
                }
            }, 1000);
            function place_dot(city)
            {
                geocoder.geocode({address:city}, function (results)
                {
                    var marker = new google.maps.Marker
                    ({
                        map: map,
                        position: results[0].geometry.location
                        //add latest 10 users to an info window in future build
                    });
                })
            }
        }
    </script>
    </body>
</html>