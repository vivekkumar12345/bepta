<?php
include 'connection.php';
session_start();
if(isset($_POST['event_date']) && isset($_POST['event_text'])) {
    

$name= $_FILES['event_upload']['name'];
$tmp_name= $_FILES['event_upload']['tmp_name'];
$position= strpos($name, "."); 
$fileextension= substr($name, $position + 1);
$fileextension= strtolower($fileextension);
$path= '/';
move_uploaded_file($tmp_name, $path.$name);

echo $name;

}
?>

