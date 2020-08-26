<!DOCTYPE html>
<html>
<body>
<?php session_start(); ob_start(); ?>

<?php  include('inc/db_config.php');  ?>
<?php



try{
				$db = new db();
	
		$db = $db->connect();
			
			
			$sql2 = "DELETE FROM coordinates";
		$stmt = $db->query($sql2);	
			$sql3  = "DELETE FROM stats";
			$stmt1 = $db->query($sql3);
			
			
			$sql4 = "DELETE FROM zitisi";
		$stmt = $db->query($sql4);	
		
			$stmt1 = $db->prepare($sql3);
			$stmt = $db->prepare($sql2);
			$stmt->execute();
}
		catch(PDOEception $e){
		echo '{"error":{"text": '.$e->getMessage().'}}';
		}
			
			
			?>
			
</body>
</html>