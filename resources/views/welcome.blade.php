
<html>

	<link rel="stylesheet" type="text/css" href=('../../public/css/stylehome.css')>
	<link rel="stylesheet" type="text/css" href='../../public/css/style1.css')>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	

<body style='background-image:url("../../public/image/bg.jpg"); background-size:1000px 900px;  height:100%;'>
<body style='background-color: #fff;'>

<nav>    
<ul>    
	<li><a href="home.html">Home</a></li>
	<li><a href="../../public/formsms">Presentase</a></li> 
	<li><a href="welcome.blade.php">INFO</a></li>
</ul> 
</nav>

<?php
  include "dbconfig.php";
?>
  
<!DOCTYPE html>

  <head>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqqRjJieG1mBpiXTsly3eyikRmlnLph7E "></script>
    <style>
      #map-canvas {
        width: 500px;
        height: 500px;
		padding-left: 700px;
		left:64px;
      }
    </style> 
    <script>
    var marker;
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }     
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var infoWindow = new google.maps.InfoWindow;      
        var bounds = new google.maps.LatLngBounds();
 
 
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
          function addMarker(lat, lng, info) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
            var marker = new google.maps.Marker({
                map: map,
                position: pt
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }
 
          <?php
            $query = mysql_query("select * from tbl_lokasi");
          while ($data = mysql_fetch_array($query)) {
            $lat = $data['lat'];
            $lon = $data['lng'];
            $nama = $data['nama_lokasi'];
            $kandidat1 = $data['kandidat1'];
            $kandidat2 = $data['kandidat2'];
            $kandidat3 = $data['kandidat3'];
            echo ("addMarker($lat, $lon, 'Tps : $nama<br>Kandidat 1 : $kandidat1%<br>Kandidat 2 : $kandidat2%<br>Kandidat 3 : $kandidat3%');\n");                        
          }
          ?>
        }
      google.maps.event.addDomListener(window, 'load', initialize);


    </script>
  </head>
   <body>

    <div id="map-canvas"></div>
    <br><h3><center><div class="jumlah">
        <?php include 'hitung.php';?>
      </center></h3></div>
  </body>
</html>

