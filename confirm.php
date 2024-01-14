<?php
include 'connection.php';
$query = "UPDATE booking SET status='Confirmed' WHERE booking_id='".$_POST['booking_id']."'";
$result=mysqli_query($conn,$query);

if($result)
			{
				echo '<script> alert("Successfully Confirmed");
				window.location="admin.php";
				</script>';
			}
			else
			{
				echo "<p>check your query</p>";
			}

				?>