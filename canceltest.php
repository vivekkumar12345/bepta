<?php
include 'connection.php';
session_start();

$query = "UPDATE bookingtest SET status='Cancelled' WHERE booking_id='".$_GET['booking_id']."'";
$result=mysqli_query($conn,$query);

if($result)
			{
				echo '<script> alert("Successfully Cancelled");
				window.location="admin-test.php";
				</script>';
			}
			else
			{
				echo '<script> alert("Unable Cancell");
				window.location="admin-test.php";
				</script>';
			
			}

				?>