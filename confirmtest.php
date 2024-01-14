<?php
include 'connection.php';
$query = "UPDATE bookingtest SET status='Confirmed' WHERE booking_id='".$_POST['booking_id']."'";
$result=mysqli_query($conn,$query);

if($result)
			{
				echo '<script> alert("Successfully Confirmed");
				window.location="admin-test.php";
				</script>';
			}
			else
			{
				echo '<script> alert("Unable to Confirm");
				window.location="admin-test.php";
				</script>';
			}

				?>