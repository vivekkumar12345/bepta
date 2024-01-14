<?php

include 'connection.php';
session_start();
$id=$_POST['id'];
$sql = "DELETE FROM booking WHERE booking_id='$id' ";
$query=mysqli_query($conn, $sql);

if($query)
{

echo "<script>
	
	alert ('successfully Cancelled your Booking');
	window.location.replace('recentbook.php');
</script>";



}

else{
	
echo "<script>
	
	alert ('Sorry Unable to Cancel Your request');
	window.location.replace('recentbook.php');
</script>";


}

?>