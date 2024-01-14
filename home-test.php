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

</head>

<body>


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
$datees = strtotime(date("Y-m-d", strtotime("+2 day")));

?>
<div class="header">
<?php include 'submenu.php' ?>
		<div class="book" id="book" align="center">
				<div class="book-form">
					<div style="height: 2.5vh;"></div>
				
				<form action="" method="get">
		<div style="display: flex; width: 100%;">
				<div class="ll1">
				<?php
	date_default_timezone_set('Asia/Kolkata');
				$dts = date("Y-m-d", strtotime("+2 days"));
				$dtr = date("Y-m-d", strtotime("+1 days"));
				$time = date("H");
		if($time>17){		
				?>
				<a class="book-text" id="hide">Select Date of Booking</a>
			<select name="date1" id="date1" class="book-input" >
				<option><?php echo $dts; ?></option>
					</select>
				<?php }
				
				elseif ($time<14){ ?>
				<a class="book-text" id="hide">Select Date of Booking</a>
				<select name="date1" id="date1" class="book-input" >
				<option><?php echo $dtr; ?></option>
					</select>
				    
			<?php	}
				else{
				?>
        	<a class="book-text">Booking starts at 1800 hrs</a>
				<?php } ?>
						
		</div>
			<div class="ll2">	<a class="book-text" id="hide">Enter Time</a>
				<select type="text" name="hole1" id="hole1" class="book-input" onchange="checkDate()" required/>
				<?php if(isset($_GET['hole1'])){?> <option value="<?php echo $_GET['hole1']; ?>"><?php echo $_GET['hole1']; ?></option>
					

				 <?php } elseif (isset($_SESSION['hole1'])){?><option value="<?php echo $_SESSION['hole1']; ?>"><?php echo $_SESSION['hole1']; ?></option> <?php } else { 
					?>
				<option value="0700-0800">0700-0800</option> <?php } ?>
				<option value="0800-0900">0800-0900</option>
				<option value="0900-1000">0900-1000</option>
				<option value="1000-1100">1000-1100</option>
				<option value="1500-1600">1500-1600</option>
				<option value="1600-1700">1600-1700</option>
				<option value="1700-1800">1700-1800</option>
			</select>
			<button type="submit" name="submit" class="buttons1"><i class="fa fa-search"></i></button>

</div>
</div>
		</form>
		</div>

	<div id="hole" style="width: 100%; height: 77vh; overflow-y: scroll;"><?php include 'holes-test.php';?></div>


</div>

<script type="text/javascript">
	function book(){

var x=document.getElementById('book').style.display='block';		
	}

</script>



</html>

<?php 
}
else{


	header('location:index.php');
}

 ?>