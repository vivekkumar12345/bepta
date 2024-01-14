
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
if($_SESSION['mem_id']=='admin')
{
if(isset($_SESSION['mem_id'])){
 $mem_id=$_SESSION['mem_id'];
}
else{
	$mem_id='Home';


}
$d = date('Y-m-d');
?>
<div class="header"  style="overflow-y: scroll;">
	<?php include 'menu.php'; ?>
<button onclick="location.href='index.php'" class="buttons3" style="width: auto; position: absolute; right: 0px; width: 5%; top: -3vh;" ><i class="fa fa-home"></i></button>
<button class="print" onclick="location.href='reserve_slot_test.php'">Reserve</button>

<div align="center">
<form action="" method="get">
	<input type="date" name="date" value="<?php if(isset($_GET['date'])){

		echo $_GET['date'];

		}elseif(isset($_SESSION['dates2'])){ echo $_SESSION['dates2'];} else{
	echo $d;
}  ?>" class="input-syle" style="width: 20%;" required/>
	<button type="submit" name="submit" class="buttons2" style="width: 20%;" >View Driving Timimg</button>
</form>
</div>
<div style="height: 3vh;"></div>
<form action="update_test.php" method="post">
<table>

	<thead>
		<tr>
			<td>
				Date
			</td>
			<td>
				Driving Range Time
			</td>

			<td>
				Ammend Time
			</td>
			
		</tr>


	</thead >
	</table>
	<div class="monster">
<table>
<tbody style="postion:fixed;">
	
	<?php 
	$val=1;

	if(isset($_GET['date'])){
	$_SESSION['dates2']=$_GET['date'];
	$date=$_SESSION['dates2'];
	$sql="select distinct slot_time from slotsperday_test where date='$date' order by slot_time asc";
	$query=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($query))
	{
		?><tr >
			<td style="background-color: rgba(0,0,0,0.6); font-size: 3vh; color: white; font-weight: bold; text-align: center;"><?php echo $date; ?></td>
			<td style="background-color: rgba(0,0,0,0.6); font-size: 3vh; color: white; font-weight: bold; text-align: center;"><?php echo $row['slot_time']; ?></td>
		<input type="hidden" value="<?php echo $row['slot_time']; ?>" name="slot_time[<?php echo $val; ?>]">
		<input type="hidden" value="<?php echo $date; ?>" name="date">
		<td style="background-color: rgba(0,0,0,0.6); font-size: 3vh; color: black; z-index: +1; font-weight: bold; text-align: center;"><input type="text" value="<?php echo $row['slot_time']; ?>" name="slot_timeto[<?php echo $val; ?>]"></td>
	</tr>

<?php
$val++;
}
}
elseif(isset($_SESSION['dates2'])) {
	$date=$_SESSION['dates2'];
	$sql="select distinct slot_time from slotsperday_test where date='$date' order by slot_time asc";
	$query=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($query))
	{
		?><tr >
			<td style="background-color: rgba(0,0,0,0.6); font-size: 3vh; color: white; font-weight: bold; text-align: center;"><?php echo $date; ?></td>
			<td style="background-color: rgba(0,0,0,0.6); font-size: 3vh; color: white; font-weight: bold; text-align: center;"><?php echo $row['slot_time']; ?></td>
		<input type="hidden" value="<?php echo $row['slot_time']; ?>" name="slot_time[<?php echo $val; ?>]">
		<input type="hidden" value="<?php echo $date; ?>" name="date">
		<td style="background-color: rgba(0,0,0,0.6); font-size: 3vh; z-index: +1; color: black; font-weight: bold; text-align: center;"><input type="text" value="<?php echo $row['slot_time']; ?>" name="slot_timeto[<?php echo $val; ?>]"></td>
	</tr>

<?php

$val++;
}

}


else
{


}




	?>






</tbody>

</table>
<input type="hidden" name="val" value="<?php echo $val; ?>">
<button class="buttons2" style="margin-left: 30%; margin-top: 0px;"> UPDATE</submit>
</form>
</div>
</body>
</html>
</script>
<?php 
}
else{


	header('location:index.php');
}

 ?>