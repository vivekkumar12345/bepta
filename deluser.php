<?php
include 'connection.php';
$query = "DELETE FROM user WHERE user_id = '".$_GET['user_id']."' ";
$result=mysqli_query($conn,$query);

if($result)
			{
				echo '<script> alert("Successfully Deleted");
				window.location="user_detl.php";
				</script>';
			}
			else
			{
				echo '<script> alert("Successfully Deleted");
				window.location="user_detl.php";
				</script>';
			
			}

				?>