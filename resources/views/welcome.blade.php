
<html>
<<<<<<< HEAD
<head>
<?php
  include "dbconfig.php";
?> 
	<link rel="stylesheet" type="text/css" href="../../public/css/stylehome.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/style1.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
=======

	<link rel="stylesheet" type="text/css" href=('../../public/css/stylehome.css')>
	<link rel="stylesheet" type="text/css" href='../../public/css/style1.css')>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	

<body style='background-image:url("../../public/image/bg.jpg"); background-size:1000px 900px;  height:100%;'>
<body style='background-color: #fff;'>

<nav>    
<ul>    
	<li><a href="home.html">Home</a></li>
	<li><a href="../../public/formsms">Maps</a></li> 
	<li><a href="welcome.blade.php">INFO</a></li>
</ul> 
</nav>

<?php
  include "dbconfig.php";
?>
  
<!DOCTYPE html>

  <head>

>>>>>>> 63d836ec1cd68dc9ba8c13e976c82047b4ed5cf1
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
          //  $query = mysql_query("select * from wilayah_jabar");
          $query = mysql_query("select wilayah.*, SUM(polling.kan1) kan1, SUM(polling.kan2) kan2, SUM(polling.kan3) kan3 
									FROM polling JOIN wilayah ON polling.desa = wilayah.wilayah_id 
									WHERE wilayah.tingkat = 4
									GROUP BY wilayah.wilayah_id");
		  while ($data = mysql_fetch_array($query)) 
            {
              $lon = $data['lng'];
			  $lat = $data['lat'];
             // $desa = $data['desa'];
              $nama = $data['nama'];
			  $kan1 = $data['kan1'];
			  $kan2 = $data['kan2'];
			  $kan3 = $data['kan3'];
              // echo ("addMarker($lon, $lat, 'Tps : $nama');\n");  
			  //echo ("addMarker($lon, $lat);\n");  
              echo ("addMarker($lon, $lat, 'Tps : $nama<br>Kandidat 1 : $kan1%<br>Kandidat 2 : $kan2%<br>Kandidat 3 : $kan3%');\n");                        
            }
          ?>
        }

      google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<style>

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;

}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 28px 26px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;

}
</style>
<body>
<div id="container">
<div id="header">
  <nav>    
    <ul>
    <a href="../../public/formsms"><img src="../../public/image/logo.png"></a>
	    <li><a href="#">HOME</a></li> 
    <li><a href="#">PEMILU</a>
	<div class="dropdown-content">
			<a href="../../public/formWalkot">WALIKOTA</a>
			<a href="../../public/formsms">GUBERNUR</a>
		</div>
	</li> 
    <li><a href="../views/welcome.blade.php">MAPS</a>
	<div class="dropdown-content">
			<a href="../../resources/views/welcome_walkot.blade.php">WALIKOTA</a>
			<a href="../../resources/views/welcome.blade.php">GUBERNUR</a>
		</div>
	</li>
	
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
        <?php include 'jumlah.php';?>
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

