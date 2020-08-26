<<!DOCTYPE html>



<title>ΕΞΟΜΟΙΩΣΗ</title>




<html>
<body>
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





</head>
<body>

<?php 






error_reporting(0);








?>

<?php
 $points = array();

 $myvar = 0.0;

  $num_of_polygons = 0;









$population=array();
$kampili=array();
$sostopopul=array();
$pinakas=array();



try{
	include('inc/db_config.php');
	 
$polygon_id =0;	
	
	
	
	if(isset($_GET['submit'])){
	
		$kappa=$_GET['hour'];
	}
	
	
	
	
	
	
	

$population=array();


  $num_query = $connection->query("SELECT popul AS population FROM stats ");


	while($mynum = mysqli_fetch_array($num_query))
	{
		
	    $mynumber1 = $mynum['population'];
	    array_push($population, $mynumber1);

	}
	
	
	
	$kampili=array();


  $num_query1 = $connection->query("SELECT demand AS dem FROM zitisi ");


	while($mynum = mysqli_fetch_array($num_query1))
	{
		
	    $mynumber = $mynum['dem'];
	    array_push($kampili, $mynumber);

	}
	
	
	
	//print_r($kampili);
}
catch(PDOEception $e){
		echo '{"error":{"text": '.$e->getMessage().'}}';
		}
		$sostopopul=array();
		
		$y=0;
		
		for ($i=0;$i<=(count($population)-4);$i++){
			
			$sostopopul[$y]=$population[$i];
			
			$y++;
			$i++;
			
		}
		
 $frpositions=0;
 $positions=100;
 $rspositions=0;
 
 
 
 
 
 
 
 
 
 
 for ($i=0;$i<count($sostopopul); $i++) {
	 
	 $frpositions=$positions - 0.2 *$sostopopul[$i] ;
	 $frpositions=$frpositions- $kampili[(24*$i)+$kappa] * $frpositions ;
	 
	 $rspositions= $positions-$frpositions;
	 $rspositions= $rspositions / $positions ;
	 

	 
	 
	$pinakas[$i]=$rspositions;	
	
if($rspositions>1)
	
	{
		
		$rspositions = 1.00;
		$pinakas[$i]=$rspositions;	
	}

    }
	  








		 
	

	 
	

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
	
	$xmlstring = "<xml> <Polygona> ";  
	
for ($i=1;$i<count($sostopopul);$i++){
	
	$xmlstring = $xmlstring."<A>
		<id>$i</id>
		<pinakas>$pinakas[$i]</pinakas>
		</A>" ;
	for ($j=0;$j<$points_per_polygon[$i];$j++){
		
		$xmlstring = $xmlstring."<A>
		<lat>$points[$j]</lat>
	</A>" ;
	
	$j++ ;
	
	$xmlstring = $xmlstring."<A>
		
		
		<lng>$points[$j]</lng>
		
		</A>" ;
	
		
		
	}
		
}
$xmlstring = $xmlstring."</Polygona>
</xml>";


$dom = new DOMDocument;
$dom->preserveWhiteSpace = FALSE;
$dom->loadXML($xmlstring);

//Save XML as a file
$dom->save('parking1.xml');

		
	

	
	
	
	

	


  
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
		
		var mypercentage =    <?php echo json_encode($pinakas); ?>;
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
  


       if(mypercentage[i]<=0.59)
		{
        var mypolygon = new google.maps.Polygon({
          paths: mycoords,
		  url: "info.php?id="+parseInt(i+1),
          strokeColor: '#3BBA54',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#3BBA54',
          fillOpacity: 0.35
        });
		
		        mypolygon.setMap(map);

		}
		
		if(mypercentage[i]>=0.60 && mypercentage[i]<=0.84 )
		{
        var mypolygon2 = new google.maps.Polygon({
          paths: mycoords,
		  url: "info.php?id="+parseInt(i+1),
          strokeColor: '#FCFC2F',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FCFC2F',
          fillOpacity: 0.35
        });
		
		     mypolygon2.setMap(map);

		}
		
		if(mypercentage[i]>=0.85)
		{
        var mypolygon3 = new google.maps.Polygon({
          paths: mycoords,
		  url: "info.php?id="+parseInt(i+1),
          strokeColor: '#FF0010',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0010',
          fillOpacity: 0.35
        });
		
		        mypolygon3.setMap(map);

		}
		
		
	
		 
		 
		 
       

		
       
		
		
		
		
		
		
		
	  }
		
		
		
		
		
		
		
		
      }
	  
	  
	  </script>
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2fZqreCYKULN15B2GfczLUoTxzVXM28Y&callback=initMap">
    </script>
	


</body>











</html>