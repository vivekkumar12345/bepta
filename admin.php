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
$d =date('Y-m-d');

?>

<div id="user_dialog" style="display: none;">
<?php include 'change.php' ?>


</div>

<div class="header"  style="overflow-y: scroll;">
	<?php include 'menu.php'; ?>
<button onclick="location.href='index.php'" class="buttons3" style="width: auto; position: absolute; right: 0px; width: 5%; top: -3vh;" ><i class="fa fa-home"></i></button>
<button class="print" onclick="location.href='print.php?date=<?php if(isset($_GET['date'])){ echo $_GET['date'];} elseif(isset($_SESSION['dates'])){
	echo $_SESSION['dates'];
} 
else{

	echo $d ;
} ?>'">Print</button>

<div align="center">
<form action="" method="get">
	<input type="date" name="date" value="<?php if(isset($_GET['date'])){ echo $_GET['date'];} elseif(isset($_SESSION['dates'])){
	echo $_SESSION['dates'];
} 
else{

	echo $d ;
} ?>" class="input-syle" style="width: 20%;" required/>
	<button type="submit" name="submit" class="buttons2" style="width: 20%;" >Generate Report</button>
</form>
</div>
<div style="height: 3vh;"></div>
<table>

	<thead>
		<tr>
			<td>
				Edit
			</td>
			<td>
				ID
			</td>
			<td>
				Name
			</td>

			<td colspan='2' >
				Email
			</td>
			<td>
				Mob
			</td>
			<td>
				Time
			</td>

			<td>
				Confirm
			</td>
			<td>
				Cancel
			</td>
			
		</tr>


	</thead >
	</table>
	<div class="monster">
<table>
<tbody style="postion:fixed;">
	
	<?php 
	if(isset($_GET['date'])){
	$_SESSION['dates']=$_GET['date'];
	$booking_date=$_GET['date'];
	$sql="select distinct slot from booking where booking_date='$booking_date' order by slot asc";
	$query=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($query))
	{
		?><tr ><td colspan='9' style="background-color: rgba(0,0,0,0.6); font-size: 3vh; color: white; font-weight: bold; text-align: left;"><?php echo $row['slot']; ?></td> </tr>
 <?php

$sqls="select * from booking where booking_date='$booking_date' and slot='".$row['slot']."'  order by slot_time asc";
	$querys=mysqli_query($conn, $sqls);
	while($rows=mysqli_fetch_assoc($querys))
	{
		?>

		<tr style="background-color:rgba(255,255,255,0.8); color: black;">
		<td style="color: black;"><button style="border-style: none; background-color: transparent;" class="booking_id" name="booking_id" id="<?php echo $rows['booking_id']; ?>"><i class="fa fa-edit"></i></button></i></td>
<form action="confirm.php" method="POST">
	

	<td style="color: black; font-weight: 2.5vh;"><?php echo $rows['mem_id']; ?></td> 
	<?php 

$sqla="select * from user where mem_id='".$rows['mem_id']."'";
	$querya=mysqli_query($conn, $sqla);
	$rowa=mysqli_fetch_assoc($querya);
	?>
<td style="color: black; font-weight: 2.5vh;"><?php echo $rows['name']; ?></td> 
<td style="color: black; font-weight: 2.5vh;" colspan="2"><?php echo $rowa['email']; ?></td> 
<td style="color: black; font-weight: 2.5vh;"><?php echo $rowa['ph_no']; ?></td> 
<td style="color: black; font-weight: 2.5vh;"><?php echo $rows['slot_time']; ?></td> 
<td style="color: black; font-weight: 2.5vh;">
<?php if($rows['status']=='Confirmed'){ ?> <i class="fa fa-check-circle" style="color:green;"></i><?php } else { ?>
<button type="submit" id="booking_id" name="booking_id" value="<?php  echo $rows['booking_id'];?>"><i class="fa fa-check-circle"></i></button></i></td> 
<?php } ?> 
</form>
<td style="color: black; font-weight: 2.5vh;">
<?php if($rows['status']=='Cancelled'){ ?> <i class="fa fa-times" style="color:red;"></i><?php } else { ?>
<button id="booking_id" name="booking_id" onclick="location.href='cancel.php?booking_id=<?php echo $rows['booking_id']; ?>'"><i class="fa fa-times"></i></button></td> 
<?php } ?> 



</tr>



<?php
	}
}

} 
elseif(isset($_SESSION['dates'])){
	$date=$_SESSION['dates'];
	$sql="select distinct slot from booking where booking_date='$date'";
	$query=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($query))
	{
		?><tr ><td colspan='9' style="background-color: rgba(0,0,0,0.6); font-size: 3vh; color: white; font-weight: bold; text-align: left;"><?php echo $row['slot']; ?></td> </tr>
 <?php

$sqls="select * from booking where booking_date='$date' and slot='".$row['slot']."'";
	$querys=mysqli_query($conn, $sqls);
	while($rows=mysqli_fetch_assoc($querys))
	{
		?>
		<tr style="background-color:rgba(255,255,255,0.8); color: black;">
	<td style="color: black;"><button style="border-style: none; background-color: transparent;" class="booking_id" name="booking_id" id="<?php echo $rows['booking_id']; ?>"><i class="fa fa-edit"></i></button></i></td>
		<form action="confirm.php" method="POST">

	<td style="color: black; font-weight: 2.5vh;"><?php echo $rows['mem_id']; ?></td> 
	<?php 

$sqla="select * from user where mem_id='".$rows['mem_id']."'";
	$querya=mysqli_query($conn, $sqla);
	$rowa=mysqli_fetch_assoc($querya);
	?>
<td style="color: black; font-weight: 2.5vh;"><?php echo $rows['name']; ?></td> 
<td style="color: black; font-weight: 2.5vh;" colspan="2"><?php echo $rowa['email']; ?></td> 
<td style="color: black; font-weight: 2.5vh;"><?php echo $rowa['ph_no']; ?></td> 
<td style="color: black; font-weight: 2.5vh;"><?php echo $rows['slot_time']; ?></td> 
<td style="color: black; font-weight: 2.5vh;">
<?php if($rows['status']=='Confirmed'){ ?> <i class="fa fa-check-circle" style="color:green;"></i><?php } else { ?>
<button type="submit" id="booking_id" name="booking_id" value="<?php  echo $rows['booking_id'];?>"><i class="fa fa-check-circle"></i></button></i></td> 
<?php } ?>

</form>
<td style="color: black; font-weight: 2.5vh;">
<?php if($rows['status']=='Cancelled'){ ?> <i class="fa fa-times" style="color:red;"></i><?php } else { ?>
<button id="booking_id" name="booking_id" onclick="location.href='cancel.php?booking_id=<?php echo $rows['booking_id']; ?>'"><i class="fa fa-times"></i></button></i></td> 
<?php } ?> 



</tr>



<?php
	}
}

}

else
{


}

	?>







</tbody>

</table>
</div>


<script type="text/javascript">
$(document).ready(function(){  
$("#user_dialog").dialog({
		autoOpen:false,
		width:300
	});

$(document).on('click', '.booking_id', function(event){
		var id = $(this).attr('id');
		$.ajax({
			url:"change.php",
			method:"POST",
			data:{id:id},
			success:function(data)
			{

				$("#user_dialog").dialog('open');
				$("#user_dialog").html(data);
			}

	});
	});	
});
</script>
<?php 
}
else{


	header('location:index.php');
}

 ?>