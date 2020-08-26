
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Polygon</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
  
  
  


  
 <?php include('inc/db_config.php');?>
  
  <?php

  
  $points = array();
  
  $myvar = 0.0;
  
  $num_of_polygons = 0;


	$coord_query = $connection->query("SELECT * FROM coordinates ORDER BY polygon_id ASC");
	while($coords = mysqli_fetch_array($coord_query))
	{
		
	    $myvar = $coords['lat'];
	    array_push($points, $myvar);

	    $myvar = $coords['lng'];
	    array_push($points, $myvar);
		
   
	}
  
  
  $num_query = $connection->query("SELECT MAX(polygon_id) AS mymax FROM coordinates");
  
  $mypolygons = mysqli_fetch_array($num_query);
  
  $num_of_polygons =$mypolygons["mymax"];
  
  
  
  
  
  
  $points_per_polygon = array();
  
    $num_of_points = $connection->query("SELECT COUNT(*) AS mycount FROM coordinates GROUP BY polygon_id");
	
	

	while($mynum = mysqli_fetch_array($num_of_points))
	{
		
	    $mynumber = $mynum['mycount'];
	    array_push($points_per_polygon, $mynumber);

	   
    
	}
	
  

  
	?>
  
  
  
  
  
    <div id="map"></div>
    <script>

     

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: {lat: 40.63333782733654, lng: 22.942996767349115},
          
        });

   var mypoints = <?php echo json_encode($points); ?>;		
		var myvar=<?php echo $points[0] ?>;
		
		
	   var points_per_polygon = <?php echo json_encode($points_per_polygon); ?>;		
	
	
	
	var k =0;
		
		var numpolygons = <?php echo $num_of_polygons?>;
        // Define the LatLng coordinates for the polygon's path.
		
		for(var i=0;i<numpolygons;i++)
		{ 
	
	
	       	     var mycoords=[];
    
	
	       for(var j=0;j< parseInt(points_per_polygon[i]);j++)
	  
	  {
		  
		  
		  mycoords[j] = {lat: parseFloat(mypoints[k]), lng: parseFloat(mypoints[k+1])};
		 
		 
		;

		 
		 k= k+2;

	  }
  


        // Construct the polygon.
        var mypolygon = new google.maps.Polygon({
          paths: mycoords,
		  url: "form.php?id=" +parseInt(i+1),
		 
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#808080',
          fillOpacity: 0.35
        });
		
		
		mypolygon.addListener('click', function() {
          
		  window.location.href = this.url;
		 
		 
		 
		 
        });

		
        mypolygon.setMap(map);
		
		
		
		
		
		
	  }
		
		
		
		
		
		
		
		
      }
	  
	  
	  </script>
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2fZqreCYKULN15B2GfczLUoTxzVXM28Y&callback=initMap">
    </script>
	
	 </body>
</html>