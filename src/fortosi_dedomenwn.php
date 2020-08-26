<?php session_start(); ob_start(); ?>

<?php  include('inc/db_config.php');  ?>
<?php
$kml=simplexml_load_file("geonode-population_data_per_block.kml") or die("Error: Cannot create object");
	 $counter=0;
	$point_id=0;
	$polygon_id=0;

foreach($kml->Document->Folder->7 as $pm){
		
$counter ++;
	 if(isset($pm->MultiGeometry->Polygon)){
$coordinates = $pm->MultiGeometry->Polygon->outerBoundaryIs->LinearRing->coordinates;
$polygon_id++;



		$desc  = $pm->description;
		$desc  = strstr($desc, 'Population');
		$mypopulation = strstr($desc, ' ');
		$mypopulation =strip_tags($mypopulation);
		$population = intval($mypopulation);
try{
	
		$db = new db();
		$db = $db->connect();


$sql1 = "INSERT INTO stats (polygon_id, popul,positions)
VALUES ('$polygon_id',$population,'100' )";

$stmt1 = $db->query($sql1);

		$stmt1->execute();
}
		catch(PDOEception $e){
		echo '{"error":{"text": '.$e->getMessage().'}}';
		}

}

		$cordsData = trim(((string) $coordinates));      
                if(isset($cordsData) && !empty($cordsData)){
                    
                    $explodedData = explode(" ", $cordsData);
                    $explodedData = array_map('trim', $explodedData);
 
                    foreach ($explodedData as $index => $coordinateString) {
					
						$points_array = array();
						$point_id++;
						
                        $coordinateSet = array_map('trim', explode(',', $coordinateString));
						
print_r($coordinateSet);

			try{
				$db = new db();
	
		$db = $db->connect();
$sql = "SELECT * FROM coordinates   ";
		$stmt = $db->query($sql);
		
		$sql = "INSERT INTO coordinates (point_id, polygon_id, lng,lat)
VALUES ('$point_id', '$polygon_id', '$coordinateSet[0]', '$coordinateSet[1]')";
				   
		
			$stmt = $db->prepare($sql);
			
			
		$stmt->execute();
}
		catch(PDOEception $e){
		echo '{"error":{"text": '.$e->getMessage().'}}';
		}
	
	
}
}
}





	
	


?>