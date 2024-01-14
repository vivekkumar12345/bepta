<?php
include 'connection.php';
$query = "DELETE FROM events WHERE event_id = '".$_GET['event_id']."' ";
$result=mysqli_query($conn,$query);

if($result)
			{
				echo '<script> alert("Successfully Deleted");
				window.location="addevent.php";
				</script>';
			}
			else
			{
				echo '<script> alert("Successfully Deleted");
				window.location="addevent.php";
				</script>';
			
			}

				?>