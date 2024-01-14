
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width; initial-scale=1.0" >
<title>BEPTA</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="css/all.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="js/all.js"></script>
<script type="text/javascript" src="js/auto.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>
</head>

<body>


<form action="changepwd_exe.php" method="post" id="user_form">
				

<?php
include 'connection.php';
session_start();
if(isset($_SESSION['mem_id']))
{

 ?>		

 <div class="form-group">

				<input type="text" id="user_id" name="user_id" class="form-control" value="<?php echo $_POST['id']; ?>"  required>
				</div>
<div class="form-group">
 
					<label>Enter Old Password*</label>
				<input type="text" id="old_pwd" name="old_pwd" class="form-control"  required>
				</div>


<div class="form-group">

					<label>Enter New Password*</label>
				<input type="text" id="new_pwd" name="new_pwd" class="form-control" required>
				</div>	
<div class="form-group">

					<label>Confirm Password*</label>
				<input type="text" id="cnf_pwd" name="cnf_pwd" class="form-control" required>
				</div>			
	
					<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>" >


				
								
				
				<div class="form-group">
					<input type="submit" name="form_action" id="form_action" class="btn btn-info"   value="Change"/>
				</div>
				
			</form>

<?php 
}
else{


	header('location:index.php');
}

 ?>