<?php
include 'connection.php';
session_start();
if(!empty($_FILES['event_upload']['name'])){
$name= $_FILES['event_upload']['name'];
$tmp_name= $_FILES['event_upload']['tmp_name'];
$position= strpos($name, "."); 
$fileextension= substr($name, $position + 1);
$fileextension= strtolower($fileextension);
$path= 'event_upload/';
move_uploaded_file($tmp_name, $path.$name);
$sqlch="UPDATE events SET date='".$_POST['date']."', event='".$_POST["event"]."', file_name='$name' WHERE event_id='".$_POST["id"]."'";
}
else{
    
   $sqlch="UPDATE events SET date='".$_POST['date']."', event='".$_POST["event"]."' WHERE event_id='".$_POST["id"]."'"; 
    
}
$resultch=mysqli_query($conn, $sqlch);
if($resultch)
			{
				echo '<script> alert("Successfully Updated");
				window.location="addevent.php";
				</script>';
			}
			else
			{
				echo '<script> alert("Unable to Update");
				window.location="addevent.php";
				</script>';
			}



?>