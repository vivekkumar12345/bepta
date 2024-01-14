<?php
include 'connection.php';
session_start();
if(isset($_POST['event_date']) && isset($_POST['event_text']) && isset($_FILES['event_upload'])) {
    

$name= $_FILES['event_upload']['name'];
$tmp_name= $_FILES['event_upload']['tmp_name'];
$position= strpos($name, "."); 
$fileextension= substr($name, $position + 1);
$fileextension= strtolower($fileextension);
$path= 'event_upload/';
move_uploaded_file($tmp_name, $path.$name);

	$sql="INSERT into events (date, event, file_name) VALUES ('".$_POST['event_date']."', '".$_POST['event_text']."', '$name')";
	$query=mysqli_query($conn, $sql);
	if($sql)
			{
				echo '<script> alert("Successfully Added Event");
				window.location="addevent.php";
				</script>';
			}
			else
			{
				echo '<script> alert("Sorry Unable to Add Event");
				window.location="addevent.php";
				</script>';
			}

}
?>

