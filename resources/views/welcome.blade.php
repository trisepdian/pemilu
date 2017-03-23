
<html>
<head>
<?php
  include "dbconfig.php";
?> 
	<link rel="stylesheet" type="text/css" href="../../public/css/stylehome.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/style1.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqqRjJieG1mBpiXTsly3eyikRmlnLph7E "></script>
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
            $query = mysql_query("select * from location");
          while ($data = mysql_fetch_array($query)) 
            {
              $lat = $data['lat'];
              $lon = $data['lng'];
              $nama = $data['nama_desa'];
              // $kandidat1 = $data['kandidat1'];
             // $kandidat2 = $data['kandidat2'];
              //$kandidat3 = $data['kandidat3'];
              echo ("addMarker($lat, $lon, 'Tps : $nama');\n");  
              //echo ("addMarker($lat, $lon, 'Tps : $nama<br>Kandidat 1 : $kandidat1%<br>Kandidat 2 : $kandidat2%<br>Kandidat 3 : $kandidat3%');\n");                        
            }
          ?>
        }

      google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<div id="container">
<div id="header">
  <nav>    
    <ul>
    <a href="../../public/formsms"><img src="../../public/image/logo.png"></a>
    <li><a href="../../public/formsms">FORM</a></li> 
    <li><a href="../views/welcome.blade.php">MAPS</a></li>
    <li><a href="../views/test.html">INFO</a></li>
  </ul> 
  </nav>
</div>

<div id="body">
<div id="tabs">
  <div id="map-canvas"></div> 
    <div id="map-hasil" >
        <table style="width:100%">
        <tr>
        <td style="width: 5px"> </td>
        <td> <?php include 'jumlah.php';?></td>
        </tr>
        </table> 
    </div> 

    <div id="map-jumlah" >
        <table>
        <tr style="height: 25px">
        <td > </td>
        <td> </td>
        </tr>
        <tr>
        <td><?php include 'jumlah.php';?></td>
        <td></td>
        </tr>
        </table>   
    </div>
</div>
</div>

<footer>
<div id="footer"> <br/><br/><br/>
        Institut Teknologi Bandung<br/>
        Jalan Ganesha no 10<br/>
        Bandung<br/><br/>
        <a href="www.facebook.com"><img src="../../public/image/sosmedFb.png" width="30px" height="30px"></a>
        <a href="www.twitter.com"><img src="../../public/image/sosmedTwit.png" width="30px" height="30px"></a>
        <a href="www.google.com"><img src="../../public/image/sosmedGugel.png" width="30px" height="30px"></a>
</div>​​​​​​​​​
</footer>

</body>
</html>

