
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
<button class="print" onclick="location.href='reserve_slot.php'">Reserve</button>

<div align="center">
<form action="" method="get">
	<input type="date" name="date" value="<?php if (isset($_GET['date'])) {

		echo $_GET['date'];
		}elseif(isset($_SESSION['dates1'])){ echo $_SESSION['dates1'];} else{
	echo $d;
}  ?>" class="input-syle" style="width: 20%;" required/>
	<button type="submit" name="submit" class="buttons2" style="width: 20%;" >View Tee-off Timimg</button>
</form>
</div>
<div style="height: 3vh;"></div>
<form action="update.php" method="post">
<table>

	<thead>
		<tr>
			<td>
				Date
			</td>
			<td>
				Tee
			</td>

			<td>
				Tee-Off Time
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
	$_SESSION['dates1']=$_GET['date'];
	$date=$_SESSION['dates1'];
	$sql="select distinct slot from slotsperday where date='$date' order by slot asc";
	$query=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($query))
	{
		?><tr ><td colspan='3' style="background-color: rgba(0,0,0,0.6); font-size: 3vh; color: white; font-weight: bold; text-align: left;"><?php echo $row['slot']; ?></td> </tr>
 <?php

$sqls="select * from slotsperday where date='$date' and slot='".$row['slot']."'  order by slot_time asc";
	$querys=mysqli_query($conn, $sqls);
	while($rows=mysqli_fetch_assoc($querys))
	{
		?>
<tr style="background-color:rgba(255,255,255,0.8); color: black;">
	<td style="color: black; font-weight: 2.5vh;"><?php echo $rows['date']; ?></td> 

<td style="color: black; font-weight: 2.5vh;"><?php echo $rows['slot']; ?></td> 
<td style="color: black; font-weight: 2.5vh;"><input type="text" name="slot_time[<?php echo $val; ?>]" value="<?php echo $rows['slot_time']; ?>"></td> 
<input type="hidden" value="<?php echo $rows['slot_id']; ?>" name="slot_id[<?php echo $val; ?>]">
<input type="hidden" value="<?php echo $row['slot']; ?>" name="slot[<?php echo $val; ?>]">
<input type="hidden" value="<?php echo $date; ?>" name="date[<?php echo $val; ?>]">
<input type="hidden" value="<?php echo $rows['slot_time']; ?>" name="slot_timem[<?php echo $val; ?>]">
</tr>



<?php
$val++;
	}
}
}
elseif(isset($_SESSION['dates1'])) {
	$date=$_SESSION['dates1'];
	$sql="select distinct slot from slotsperday where date='$date' order by slot asc";
	$query=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($query))
	{
		?><tr ><td colspan='3' style="background-color: rgba(0,0,0,0.6); font-size: 3vh; color: white; font-weight: bold; text-align: left;"><?php echo $row['slot']; ?></td></tr>
 <?php

$sqls="select * from slotsperday where date='$date' and slot='".$row['slot']."'  order by slot_time asc";
	$querys=mysqli_query($conn, $sqls);
	while($rows=mysqli_fetch_assoc($querys))
	{
		?>
<tr style="background-color:rgba(255,255,255,0.8); color: black;">
<td style="color: black; font-weight: 2.5vh;"><?php echo $rows['date']; ?></td> 

<td style="color: black; font-weight: 2.5vh;"><?php echo $rows['slot']; ?></td> 
<td style="color: black; font-weight: 2.5vh;">
<input type="text" name="slot_time[<?php echo $val; ?>]" value="<?php echo $rows['slot_time']; ?>"></td> 
<input type="hidden" value="<?php echo $rows['slot_id']; ?>" name="slot_id[<?php echo $val; ?>]">
<input type="hidden" value="<?php echo $row['slot']; ?>" name="slot[<?php echo $val; ?>]">
<input type="hidden" value="<?php echo $date; ?>" name="date[<?php echo $val; ?>]">
<input type="hidden" value="<?php echo $rows['slot_time']; ?>" name="slot_timem[<?php echo $val; ?>]">
</tr>



<?php

$val++;
	}
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