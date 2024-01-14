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


}?>
<div id="user_dialog" style="display: none;">
</div>
<div class="header"  style="overflow-y: scroll;">

<?php 

include 'menu.php';

?>

<form action="addevents.php" method="post" enctype="multipart/form-data">
<table style="width: 100%;">
<tr><td><p class="login-text1">Enter Event Date</p></td>
<td><input type="date" name="event_date" class="input-syle" style="width: 100%;" required/></td>
<td><p class="login-text1">Enter Event</p></td>
<td><input type="text" name="event_text" class="input-syle" style="width: 100%;" required/></td>
<td><p class="login-text1">Upload File</p></td>
<td><input type="file" name="event_upload" style="width: 100%;" required/></td>
<td><button type="submit" name="sign" class="buttons" style="margin-left: 30%; width:70%;">Add Event</button>
</td>

</tr>
</table>
</form>

<div style="height: 3vh;"></div>
<table>

	<thead>
		<tr>
			<td colspan="1">
				S No
			</td>
			<td colspan="5">
				Event
			</td>

			<td colspan="2">
				Event Date
			</td>
			<td colspan="1">
				Edit
			</td>
			<td colspan="1">
				Delete
			</td>


			
			
		</tr>


	</thead >
	</table>
	<div class="monster">
<table>
<tbody style="postion:fixed;">
	

	<?php

	include 'connection.php';
	$ser=1;
$sql="SELECT * from events order by event_id DESC";

$query=mysqli_query($conn, $sql);
 while($row=mysqli_fetch_assoc($query)){
	 ?>
<tr style="background-color:rgba(255,255,255,0.8);">
	<td colspan="1" style="color: black;"><?php echo $ser; ?></td>
	<td colspan="5" style="color: black;">
		<?php echo $row['event']; ?>
	</td>
	<td colspan="2" style="color: black;">
		<?php echo $row['date']; ?>
	</td>
	<td colspan="1" style="color: black;">
	<button style="border-style: none; background-color: transparent;" class="edit" name="edit" id="<?php echo $row['event_id']; ?>"><i class="fa fa-edit"></i></button></i>
	</td>
	<td colspan="1" style="color: red;">
		<button id="del" style=" background-color: transparent; border-style: none;" name="del" onclick="location.href='del.php?event_id=<?php echo $row['event_id']; ?>'"><i class="fa fa-times"></i></button>
	</td>

</tr>
	 <?php

	 $ser++; 
 }

 ?>



</tbody>

</table>
</div>


<script type="text/javascript">
$(document).ready(function(){  

$("#user_dialog").dialog({
		autoOpen:false,
		width:550,
	});

$(document).on('click', '.edit', function(event){
		var id = $(this).attr('id');
		$.ajax({
			url:"editevent.php",
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