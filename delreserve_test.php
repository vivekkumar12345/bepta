<?php
include 'connection.php';
$query = "UPDATE slotsperday_test set status = 'Open' WHERE slot_id = '".$_GET['slot_id']."' ";
$result=mysqli_query($conn,$query);

if($result)
			{
				echo '<script> alert("Successfully Cancelled Reservation");
				window.location="reserve_slot_test.php";
				</script>';
			}
			else
			{
				echo '<script> alert("Successfully Cancelled Reservation");
				window.location="reserve_slot_test.php";
				</script>';
			
			}

				?>