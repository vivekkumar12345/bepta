
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


<form action="changeevent.php" method="post" id="user_form" enctype="multipart/form-data">
				

<?php
include 'connection.php';
session_start();
if($_SESSION['mem_id']=='admin')
{
$sqlch="SELECT * from events where event_id='".$_POST['id']."'";
$querych=mysqli_query($conn, $sqlch);
$rowch=mysqli_fetch_assoc($querych);

 ?>		

 <div class="form-group">

				<input type="hidden" id="event_id" name="event_id" class="form-control" value="<?php echo $_POST['id']; ?>"  required>
				</div>
<div class="form-group">
 
					<label>Date*</label>
				<input type="date" id="date" name="date" class="form-control" value="<?php echo $rowch['date']; ?>"  required>
				</div>


<div class="form-group">

					<label>Event*</label>
				<input type="text" id="event" name="event" style="height:100px;" value="<?php echo $rowch['event']; ?>" class="form-control" required>
				</div>				
<div class="form-group">

					<label>File*</label>
				<input type="file" id="event_upload" name="event_upload" class="form-control">
				<img src="event_upload/<?php echo $rowch['file_name']; ?>" height="50px" width="auto">
				</div>	
					<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>" >


				
								
				
				<div class="form-group">
					<input type="submit" name="form_action" id="form_action" class="btn btn-info"   value="Change"/>
				</div>
				
			</form>

</script>
<?php 
}
else{


	header('location:index.php');
}

 ?>