
<html> 
"<form method = 'post'>
 '<div class="form-group">
  <label for="exampleFormControlInput1">01:00</label>
  <input type="number"  name ="ena" min="0" step=0.1 max="1"required value = ""placeholder="0,5""/>
  <label for="exampleFormControlInput1">02:00</label>
  <input type="number"  name ="duo"  min="0" max="1"required value = ""placeholder="0,7""/>
  <label for="exampleFormControlInput1">03:00</label>
  <input type="number"  name ="tria"  min="0" max="1"required value = ""placeholder="0,9"/>
  <label for="exampleFormControlInput1"/>04:00</label>
  <input type="number"  name ="tessera"  min="0" max="1"required value = ""placeholder="0,3"/>
  <div class="form-group"/>
  <label for="exampleFormControlInput1">05:00</label>
  <input type="number" name ="pente"  min="0" max="1"required value = ""placeholder="0,6"/>
  <label for="exampleFormControlInput1">06:00</label>
  <input type="number"  name ="exi"  min="0" max="1"required value = ""placeholder="0,7"/>
  <label for="exampleFormControlInput1">07:00</label>
  <input type="number"  name ="efta"  min="0" max="1"required value = ""placeholder="AEK"/>
  <label for="exampleFormControlInput1">08:00</label>
  <input type="number"  name ="oxto"  min="0" max="1"required value = ""placeholder="0,7"/>
  <div class="form-group"/>
  <label for="exampleFormControlInput1">09:00</label>
  <input type="number"  name ="enia"  min="0" max="1"required value = ""placeholder="0,8"/>
  <label for="exampleFormControlInput1">10:00</label>
  <input type="number"  name ="deka"  min="0" max="1"required value = ""placeholder="0,9"/>
  <label for="exampleFormControlInput1">11:00</label>
  <input type='number'  name ='enteka'  min='0' max='1'required value = ''placeholder="0.8"/>
  <label for='exampleFormControlInput1'>12:00</label>
  <input type='number'  name ='dodeka'  min='0' max='1'required value = ''placeholder="0,8"/>
  <div class='form-group'/>
  <label for='exampleFormControlInput1'>13:00</label>
  <input type='number'  name ='dekatria'  min='0' max='1'required value = ''placeholder="0,8"/>
  <label for='exampleFormControlInput1'>14:00</label>
  <input type='number'  name ='dekatessera'  min='0' max='1'required value = ''placeholder="AEK"/>
  <label for='exampleFormControlInput1'>15:00</label>
  <input type='number'  name ='dekapente'  min='0' max='1'required value = ''placeholder="0,7"/>
  <label for='exampleFormControlInput1'>16:00</label>
  <input type='number'  name ='dekaexi'  min='0' max='1'required value = ''placeholder="0,3"/>
  <div class='form-group'/>
  <label for='exampleFormControlInput1'>17:00</label>
  <input type='number'  name ='dekaefta'  min='0' max='1'required value = ''placeholder="0,9"/>
  <label for='exampleFormControlInput1'>18:00</label>
  <input type='number'  name ='dekaoxto'  min='0' max='1'required value = ''placeholder="0,7"/>
  <label for='exampleFormControlInput1'>19:00</label>
  <input type='number'  name ='dekaenia'  min='0' max='1'required value = ''placeholder="0,1"/>
  <label for='exampleFormControlInput1'>20:00</label>
  <input type='number'  name ='ikosi'  min='0' max='1'required value = ''placeholder="0,2"/>
  <div class='form-group'/>
  <label for='exampleFormControlInput1'>21:00</label>
  <input type='number'  name ='ikosiena'  min='0' max='1'required value = ''placeholder="0.9"/>
  <label for='exampleFormControlInput1'>22:00</label>
  <input type='number'  name ='ikosiduo'  min='0' max='1'required value = ''placeholder="0,7"/>
  <label for='exampleFormControlInput1'>23:00</label>
  <input type='number'  name ='ikositria'  min='0' max='1'required value = ''placeholder="0,7"/>
  <label for='exampleFormControlInput1'>00:00</label>
  <input type='number'  name ='ikositessera'  min='0' max='1'required value = ''placeholder="AEK"/>
  <input type='number'  name ='result'  min='0' max='1'required value = ''/>	
  <label >Πλήθως Θέσεων Πάρκινγκ</label>				
  <img src='gia.jpg' alt='bckgound' class='bg' />
  <input type = 'submit' name ='update' value = 'Ανενέωση'/>



 <?php
 
include('inc/db_config.php');  
	error_reporting(0);
	
if (isset($_GET["id"])) {
$event_id = $_GET["id"];

}
	 $i=$event_id*24;
  $k=$event_id*24+23;
$kampili=array();
	$num_query1 = $connection->query("SELECT demand AS dem FROM zitisi ");


	while($mynum = mysqli_fetch_array($num_query1))
	{
		
	    $mynumber = $mynum['dem'];
	    array_push($kampili, $mynumber);

	}	
	



  
  
  ?>

</html>