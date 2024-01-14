<?php
include 'connection.php';
session_start();

$sql="UPDATE user SET dob='".$_POST['date']."', name='".$_POST['name']."', email='".$_POST["email"]."', ph_no='".$_POST["phone"]."', user_type='".$_POST["service"]."' WHERE user_id='".$_POST["user_id"]."'";
$result=mysqli_query($conn, $sql);
if($result)
			{
				echo '<script> alert("Successfully Updated");
				window.location="user_info.php";
				</script>';
			}
			else
			{
				echo '<script> alert("Unable to Update");
				window.location="user_info.php";
				</script>';
			}



?>