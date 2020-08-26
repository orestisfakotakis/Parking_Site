
<?php session_start(); ob_start(); ?>

<?php  include('inc/db_config.php');  ?>




<?php

 $num_of_polygons = 0;
 $demand=0;
$mypolygons=[""];
$k=0;
$l=0;
try{
		
		$num_query = $connection->query("SELECT MAX(polygon_id) AS mymax FROM coordinates");

		
  
  $mypolygons = mysqli_fetch_array($num_query);
  
  $num_of_polygons =$mypolygons["mymax"];
  
   
	
	
	
for($i=0;$i<($num_of_polygons);$i++){
	
	
	
	
	
	
	for($j=0;$j<24;$j++){
		
	$db = new db();
	
		$db = $db->connect();
$sql = "SELECT * FROM zitisi   ";
		$stmt = $db->query($sql);
		$stmt->execute();
		$sql = "INSERT INTO zitisi (polygon_id, hour,demand) VALUES ( '$i', '$j', '$demand')";

		
		
			$stmt = $db->prepare($sql);
			
			$stmt->bindParam(':polygon_id',$i);
			$stmt->bindParam(':hour',$j);
			if($j==0){
				$demand=0.75;

				$stmt->bindParam(':demand',$demand);
			}
			
			if($j==1){
				$demand=0.55;
				$stmt->bindParam(':demand',$demand);
			}
			
			
			if($j==2){
				$demand=0.46;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==3){
				$demand=0.19;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==4){
				$demand=0.2;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==5){
				$demand=0.39;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==6){
				$demand=0.55;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==7){
				$demand=0.67;
				$stmt->bindParam(':demand',$demand);
			}if($j==8){
				$demand=0.8;
				$stmt->bindParam(':demand',$demand);
			}if($j==9){
				$demand=0.95;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==10){
				$demand=0.9;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==11){
				$demand=0.95;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==12){
				$demand=0.9;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==13){
				$demand=0.88;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==14){
				$demand=0.83;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==15){
				$demand=0.7;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==16){
				$demand=0.62;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==17){
				$demand=0.74;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==18){
				$demand=0.8;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==19){
				$demand=0.8;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==20)
			{
				$demand=0.95;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==21){
				$demand=0.92;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==22){
				$demand=0.76;
				$stmt->bindParam(':demand',$demand);
			}
			if($j==23){
				$demand=0.9;
				$stmt->bindParam(':demand',$demand);
			}
			
			
		$stmt->execute();
	
	
	
	
	
	
}
 
}}
		catch(PDOEception $e){
		
		}

?>