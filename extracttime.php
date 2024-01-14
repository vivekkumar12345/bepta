<?php
session_start();
include "connection.php";
$departid = $_POST['depart'];
$date=$_POST['date'];
$mem_id=$_POST['mem_id'];

$check="SELECT * FROM user WHERE mem_id='$mem_id'";

$resultcheck = mysqli_query($conn, $check);
$rowcheck=mysqli_fetch_array($resultcheck);

$sql = "SELECT * FROM slotsperday WHERE date='$date' and slot='$departid' and user='".$rowcheck['user_type']."'";

$result = mysqli_query($conn, $sql);

while( $row = mysqli_fetch_array($result) ){
 $sqlmb = "SELECT count(booking_id) as count FROM bookingtest WHERE booking_date='$date'and slot='$departid' and slot_time='".$row['slot_time']."'";
$resultmb = mysqli_query($conn, $sqlmb);
$rowmb=mysqli_fetch_assoc($resultmb);  
if($rowmb['count']<4)
{

}
    $slot_time= $row['slot_time'];
    $count= $rowmb['count'];

    echo "<option value='$slot_time'>$slot_time</option>";
    

}

?>