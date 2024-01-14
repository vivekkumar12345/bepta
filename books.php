 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width; initial-scale=1.0" >
<title>BEPTA</title> <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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

<?php
include 'connection.php';
$ssd=0;
$ssl="SELECT slot from session_slot where slot='".$_POST['slot']."' and time='".$_POST['slot_time']."' and date='".$_POST['date']."'";
$queryssl=mysqli_query($conn,$ssl);
while($rowssl=mysqli_fetch_assoc($queryssl)){
$ssd++;    
}

if($ssd>0)

{
           echo '<script> alert("One session is already created on this slot");
				window.location="home.php";
				</script>'; 
    
}
else
{


date_default_timezone_set('Asia/Kolkata');
$time_hr = date("H");    
$time_min = date("i"); 

$sd="INSERT INTO session_slot (slot, time, date, hr, min) values ('".$_POST['slot']."', '".$_POST['slot_time']."', '".$_POST['date']."', '$time_hr', '$time_min')";
$qrsd=mysqli_query($conn, $sd);
$sspd=0;
$ssld="SELECT * from booking where slot='".$_POST['slot']."' and slot_time='".$_POST['slot_time']."' and booking_date='".$_POST['date']."'";
$queryssld=mysqli_query($conn,$ssld);
while($rowssl=mysqli_fetch_assoc($queryssld)){
$sspd++;    
}

if($sspd<4)
{
$time_hr1 = date("H");    
$time_min1 = date("i");
$main="select * from session_slot";
$qmain=mysqli_query($conn, $main);
while($rowmain=mysqli_fetch_assoc($qmain)){
     if($rowmain['hr']<$time_hr1){
        if($rowmain['min'] > 55){
            if($time_min1 <= 2){

            }
            else{
                $sp="delete from session_slot where slot='".$rowmain['slot']."' and hr<'$time_hr1'";
        $qsp=mysqli_query($conn, $sp);
            }
        }
        else{
        $sp="delete from session_slot where slot='".$rowmain['slot']."' and hr<'$time_hr1'";
        $qsp=mysqli_query($conn, $sp);
    }
    }
    elseif($rowmain['hr']==$time_hr1){
     if($rowmain['min']+6<$time_min1) {
         $minn=$time_min1-6;
     $sp="delete from session_slot where slot='".$rowmain['slot']."' and hr='$time_hr1' and min<'$minn' ";
     $qsp=mysqli_query($conn, $sp);
         
     }
     else{
         
     }   
    }
    else{
        
        
    }
    
}
    
    
    
?>
   <div>
			<form method="post" action="booking.php" id="user_form" >
			
			<div>
				<div>
					<div style="height: 1vh;"></div>
					<?php include 'timer.php';  ?>
					<div style="height: 1vh;"></div>
					<table id="invoiceItem">	
						<thead style="height: 7vh; text-align: center;">
						<tr >
							<!-- <td width="10%">Select</td> -->
							<td width="100%">Add User Info</td>

						</tr>
					
				</thead>

					<input type="hidden" name="date" value="<?php echo $_POST['date']; ?>">
					<input type="hidden" name="slot_time" value="<?php echo $_POST['slot_time']; ?>">
					<input type="hidden" name="slot" value="<?php echo $_POST['slot']; ?>">
					<input type="hidden" name="slot_id" value="<?php echo $_POST['slot_id']; ?>">
					<input type="hidden" id= "count" name="count" value="<?php echo $_POST['count']; ?>">
					<tr>
						<td style="color: black">
						<input class="itemRow" name="checkbox" type="checkbox">
						User No : 1
					</td>	
					</tr>
					<tr>
					<td style="color:black; text-align:left;">Member ID 'G' for Guests*</td>
					</tr>
					<tr>
					<td>
						<input type="text" name="mem_id[]" id="mem_id_1" class="form-control" autocomplete="off" value="<?php session_start(); echo $_SESSION['mem_id']; ?>" required>
					</td>
					</tr>
					<tr>
					<td style="color:black; text-align:left;">Member's Name</td>
					</tr>
					<tr>			
					<td>
						<input type="text" name="name[]" id="name_1" class="form-control au" autocomplete="off" value="<?php echo $_SESSION['name']; ?>" required>
					</td>

					</tr>
					<tr><td>
						<hr style="height:5px;  background-image: linear-gradient(to right, #fdfdfd, #ff0000, #fdfdfd);" noshade>
					</td></tr>
				

					</table>
				</div>
			</div>


			<div class="row" style="margin-right: auto; margin-left: auto; margin-top: 4vh;">
							
								<center><button class="btn btn-success" id="addRows" type="button">+ Add More</button>
	
						</div>
			
		
				<div align="center" class="form-group" style="margin-top: 5vh">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="insert"/>
				</div>
			
			</div>
			</center>	
				
			</form>
		</div>
	</div>
	</main>
			
	</div>
</div>
	<link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
<script type="text/javascript">


$(document).ready(function(){
	$(document).on('click', '#checkAll', function() {          	
		$(".itemRow").prop("checked", this.checked);
	});	
	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', false);
		}
	});  
	var count = $(".itemRow").length;
			var x = document.getElementById('count').value;
	$(document).on('click', '#addRows', function() { 

		if (count<x)
			{
				count++;
		var htmlRows = '';
		htmlRows += '<tr><td style="color: black;"><input class="itemRow" type="checkbox">'; 
		htmlRows += ''+count+'</td></tr>'; 
		htmlRows += '<tr><td style="color:black; text-align:left;">Member ID, G for Guests*</td>					</tr>';
		htmlRows += '<tr><td><input type="text" placeholder="User Id Please fill Correctly" name="mem_id[]" id="mem_id_'+count+'" class="form-control" autocomplete="off" required></td></tr>';         
		htmlRows += '<tr><td style="color:black; text-align:left;">Member Name</td></tr>';
		htmlRows += '<tr><td><input type="text" placeholder="Name of Member/ Guest" name="name[]" id="name_'+count+'" class="form-control" autocomplete="off" required></td></tr>';	
		htmlRows += '<tr><td><hr style="height:5px;  background-image: linear-gradient(to right, #fdfdfd, #ff0000, #fdfdfd);" noshade></td></tr>';
		$('#invoiceItem').append(htmlRows);
	}

	else {


	}
	}); 
});	

  </script> 

<?php
}
else{
    
     echo '<script> alert("Four members already booked the slot");
				window.location="home.php";
				</script>'; 
    
}
}

?>   
      