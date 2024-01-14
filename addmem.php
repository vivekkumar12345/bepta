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

</head>

<body>


<div class="header">
<?php 
include 'connection.php';
session_start();
if($_SESSION['mem_id']=='admin')
{
include 'menu.php'; 

?>
<div class="register" id="register" style="display: block; left: 20%;" required/>

<form action="register.php" method="post">
<div style="height: 100%; width: 50%; float: left; text-align: center;  margin-bottom: 5vh;">
<p class="login-text1">Full Name</p>
<input type="text" name="name1" class="input-syle" required/>
<p class="login-text1">Member ID</p>
<input type="text" name="mem_id1" class="input-syle" required/>
<p class="login-text1">DOB</p>
<input type="date" name="date1" class="input-syle" required/>
<p class="login-text1">Email Id</p>
<input type="text" name="email1" class="input-syle" required/>
</div>
<div style="height: 100%; width: 50%; float: right; text-align: center; margin-bottom: 5vh;">
<p class="login-text1">Service Type</p>
<select name="service" id="service" class="input-syle" required/>
<option value="Veteran" style="color: black;">Veteran</option>
<option value="Serving" style="color: black;">Serving</option>
</select>
<p class="login-text1">Phone No</p>
<input type="text" name="phone1" class="input-syle" required/>
<p class="login-text1">password</p>
<input type="password" name="pwd1" id="pwd1" class="input-syle" required/>
<p class="login-text1">Confirm password</p>
<input type="text" name="pwd2" class="input-syle" id="pwd2" onkeyup="check();" required/>
<span id='message' style="position: fixed; color: red;"><i class="fa fa-check"> </i></span></br>

</div>

<button type="submit" name="sign" class="buttons" style="margin-left: 30%; float: left;">Signup</button>
</form>
</div>

		</div>



 <script type="text/javascript">
	function reg(){

var x=document.getElementById('register').style.display='block';		
	}
		function regrc(){

var x=document.getElementById('register').style.display='none';		
	}


</script>
<script type="text/javascript">
  function check() {
        var password = $("#pwd1").val();
        var confirmPassword = $("#pwd2").val();
        if (password == confirmPassword)
        {
            var x=document.getElementById('message').style.color='green';
        }
        else
        {
            var x=document.getElementById('message').style.color='red';
        }
    }

</script>



<?php 
include 'timeslots.php';

?>
</body>
</html>
</script>
<?php 
}
else{


    header('location:index.php');
}

 ?>