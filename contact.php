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
    
<div class="header"  style="overflow:hidden"> 
<?php 
include 'connection.php';
session_start();
if(isset($_SESSION['mem_id']))
{
if(isset($_SESSION['mem_id'])){
$mem_id=$_SESSION['mem_id'];
}
else{
	$mem_id='Home';


}
include 'submenu.php';
?>


<center>
<div class="register" id="register" style="height: auto; margin-top: 5vh;" required/>
<center><h3 class="eventhead">CONTACT DETAILS</h3></center>
<table style="width: 90%; text-align: left; margin-bottom: 3vh;">
	<tr>
		<td style="width: 40%;"><p class="login-text2">Name of OIC</p></td><td style="width: 5%;"><p class="login-text2"> : </p></td><td style="width: 40%;"><p class="login-text2">Maj Arjun</p></td>
	</tr>
	<tr>
		<td><p class="login-text2">Contact No</p></td><td><p class="login-text2"> : </p></td><td><p class="login-text2">9885102954</p></td>
	</tr> 
	<tr>
		<td><p class="login-text2">Additional Contact No</p></td><td><p class="login-text2"> : </p></td><td> <p class="login-text2"> - </p></td>
	</tr>
	<tr>
		<td><p class="login-text2">Email Id</p></td><td><p class="login-text2"> : </p></td><td><p class="login-text2">bepta1888@gmail.com</p></td>
	</tr>  
</table>
</div>
</div>
</center>
</body>
<?php 
}
else{


	header('location:index.php');
}

 ?>
