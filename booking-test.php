<<?php
include 'connection.php';
session_start();
if(isset($_SESSION['mem_id']))
{

$date=date('Y-m-d');
$s=0;
$sqlcd="SELECT * from user where mem_id='".$_POST['mem_id']."'";
$querycd=mysqli_query($conn, $sqlcd);
while($rowcd=mysqli_fetch_assoc($querycd)){
    $s++;
}
    
    if($s>O) {
    
$sqlc="SELECT * from bookingtest where mem_id='".$_POST['mem_id']."' and booking_date='".$_POST['date']."'";
$queryc=mysqli_query($conn, $sqlc);
if($rowc=mysqli_fetch_assoc($queryc)){

echo '<script> alert("Booking with perticular ID on perticular date is already exist");
				window.location="home-test.php";
				</script>';

}

else{

if($_POST['mem_id']=='G'){
$sql="INSERT into bookingtest (mem_id, name, bymem_id, booking_date, slot, slot_time, slot_id, status) VALUES ('".$_POST['mem_id']."','".$_POST['name']."', '".$_SESSION['mem_id']."', '".$_POST['date']."', '".$_POST['slot']."', '".$_POST['slot_time']."', '".$_POST['slot_id']."', 'Placed')";

}

else{

$sqls="SELECT * from user where mem_id='".$_POST['mem_id']."'";
$querys=mysqli_query($conn, $sqls);
$rows=mysqli_fetch_assoc($querys);

$sql="INSERT into bookingtest (mem_id, name, bymem_id, booking_date, slot, slot_time, slot_id, status) VALUES ('".$_POST['mem_id']."','".$rows['name']."', '".$_SESSION['mem_id']."', '".$_POST['date']."', '".$_POST['slot']."', '".$_POST['slot_time']."', '".$_POST['slot_id']."', 'Placed')";

}
$result=mysqli_query($conn, $sql);

if($result)
			{
				echo '<script> alert("Successfully booked");
				window.location="home-test.php";
				</script>';
			}
			else
			{
				echo '<script> alert("Sorry Unable to Book");
				window.location="home-test.php";
				</script>';
			}
}
 ?>
<?php 
}  

else{  
    			echo '<script> alert("User doesnt exist in database");
				window.location="home-test.php";
				</script>';
    
}
}
else{


	header('location:index.php');
}

 ?>


 ?>