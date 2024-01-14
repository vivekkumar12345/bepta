
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


<form action="change_exe.php" method="post" id="user_form">
				

<?php
include 'connection.php';
session_start();
$sqlch="SELECT * from booking where booking_id='".$_POST['id']."'";
$querych=mysqli_query($conn, $sqlch);
$rowch=mysqli_fetch_assoc($querych);

 ?>		

 <div class="form-group">

				<input type="hidden" id="mem_idch" name="mem_idch" class="form-control" value="<?php echo $rowch['mem_id']; ?>"  required>
				</div>
<div class="form-group">
 
					<label>Date*</label>
				<input type="date" id="datech" name="datech" class="form-control" value="<?php echo $rowch['booking_date']; ?>"  required>
				</div>


<div class="form-group">

					<label>Slot*</label>
				<select type="text" id="slotch" name="slotch" class="form-control" required>
						<option value="<?php echo $rowch['slot']; ?>"><?php echo $rowch['slot']; ?></option>
							<option value="T1">T1</option>
							<option value="T10">T10</option>
							<option value="T14">T14</option>
							</select>
				</div>				
				
				<div class="form-group">
					<label>Slot Time*</label>
					<select type="text" name="timech" id="timech" class="form-control">
						<option value="<?php echo $rowch['slot_time']; ?>"><?php echo $rowch['slot_time']; ?></option>	
						<option value="">- Select -</option>			
					</select>
				</div>
				
					<input type="hidden" name="idch" value="<?php echo $_POST['id']; ?>" >


				
								
				
				<div class="form-group">
					<input type="submit" name="form_action" id="form_action" class="btn btn-info"   value="Change"/>
				</div>
				
			</form>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>

<script type="text/javascript">

$(document).ready(function(){

$(document).on('change', '#slotch', function(){
			var deptid = $('#slotch').val();
                var date = $('#datech').val();
                var mem_id = $('#mem_idch').val();
                $.ajax({
                    url: 'extracttime.php',
                    type: 'post',
                    data: {depart:deptid, date:date, mem_id:mem_id},
                    dataType: 'html',
                    success:function(data){

                    	$('#timech').html(data);

                        }
 
                });
                
            });

	});	

</script>			