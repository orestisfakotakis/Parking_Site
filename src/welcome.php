<?php  session_start();

if(empty($_SESSION['LOGINID']) && empty($_SESSION['LOGINNM']) ){

	header("Location:index.php");
}

$flag= "";

if(isset($_GET['flag']))
{
	$flag = $_GET['flag'];
}

if ($flag == "edit") {
	$msg = "Record Edited Successfully";
}

if ($flag == "add") {
	$msg = "Record Added Successfully";
}
if ($flag == "del") {
	$msg = "Record Deleted Successfully";
}
if ($flag == "success") {
	$msg = "Login Successful";
}


//if(!empty($flag)){
	//header("refresh:2,url=welcome.php"}

 ?>
<?php  include 'header.php';

if (isset($_POST['btn_search'])) {

	$keyword= trim($_POST['txtSearch']);

	$searchQry = "SELECT u.user_id,u.user_name, u.user_password, u.login_time, u.logout_time,u.ip_address,u.login_counter,u.browser_name,ut.user_type_name FROM tbl_user u INNER JOIN tbl_user_type ut ON u.user_type_id = ut.user_type_id AND u.user_type_id=2 AND (u.user_name LIKE '$keyword%' OR u.browser_name LIKE '$keyword%' OR u.login_counter LIKE '$keyword' OR u.user_password LIKE '$keyword%' OR u.user_id LIKE '$keyword')";

	$sqlSelectedAll = mysqli_query($connection, $searchQry);



	
	
}else{
	$sqlSelectAll = "SELECT u.user_id,u.user_name, u.user_password, u.login_time, u.logout_time,u.ip_address,u.login_counter,u.browser_name,ut.user_type_name FROM tbl_user u INNER JOIN tbl_user_type ut ON u.user_type_id = ut.user_type_id AND u.user_type_id=2 ";



                               $sqlSelectedAll = mysqli_query($connection, $sqlSelectAll);
}

  ?>
<div class="welcome_main clearfix">
    <div class="welcome_wrap clearfix">
        <div class="container">
            <h1 class="page-header text-center">Welcome Admin/user
                <?php  if($_SESSION['LOGINID'] == 1){ ?>
                
                <?php } ?>
            </h1>
            <span class="col-md-10">
			    	
			    		
            </span>
            </span>
            <br>
            <span class="col-md-2"><a href="logout.php" class="btn btn-danger pull-right">logout</a></span>

            <hr>

            <hr>


            <?php 
                    if(!empty($msg)){
			 	 ?>


            <div class="alert alert-success">
                <?php echo $msg; ?>
            </div>

            <?php 
			 	}
			 	  ?>

            <table class="table table-responsive  table-bordered table-striped table-hover">
                <thead>
                    <div class="btn-group">
  <button id="but1"  onclick="location.href='http://localhost/try2/try22/fortosi_dedomenwn.php';"">φόρτωση δεδομενων</button> 
  <button id="but2" onclick="location.href='http://localhost/try2/try22/diagrafh_dedomenwn.php';"">διαγραφη δεδομενων</button>
  <button id="but3" onclick="location.href='http://localhost/try2/try22/apeikonisi.php';"">Απεικoνιση στοιχειων</button>
  <button id="but4" onclick="location.href='http://localhost/try2/try22/enarxi.php';"">εξομοίωση</button>
  <button id="but4" onclick="location.href='http://localhost/try2/try22/diaxirisi.php';"">διαχείρηση</button>
  
</div>

		<p></p><p></p><p></p><p></p>
			<thead>
		<img src="ae.jpg" alt="parkpic" width="900" height="350">


			</thead>
				
				
				
				
                <tbody>
				
                    <?php 
                               
                                
                               while ($list = mysqli_fetch_object($sqlSelectedAll)) {

                                    
                                   
                                    $user_id = $list->user_id;
                                    $user_name = $list->user_name;
                                    $user_password = $list->user_password;
                                    $login_time = $list->login_time;
                                    $logout_time = $list->logout_time;
                                    $ip_address = $list->ip_address;
                                    $login_counter = $list->login_counter;
                                    $browser_name = $list->browser_name;
                                    $user_type = $list->user_type_name;
							   }  ?> 
				                
				                   

                    


                </tbody>
            </table>


        <div>
		<?php  include 'footer.php';  ?>
    </div>
</

