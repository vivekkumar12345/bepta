<?php
include 'connection.php';
session_start();

$sqlch="UPDATE bookingtest SET booking_date='".$_POST['datech']."', slot_time='".$_POST["timech"]."', slot='".$_POST["slotch"]."'  WHERE booking_id='".$_POST["idch"]."'";
$resultch=mysqli_query($conn, $sqlch);
if($resultch)
			{
				echo '<script> alert("Successfully Updated");
				window.location="admin-test.php";
				</script>';
			}
			else
			{
				echo '<script> alert("Unable to Update");
				window.location="admin-test.php";
				</script>';
			}



?>