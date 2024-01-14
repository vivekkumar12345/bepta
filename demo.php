<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width; initial-scale=1.0" >
<title>BEPTA</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="css/all.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="js/all.js"></script>
<script type="text/javascript" src="js/auto.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>
</head>

<body>
	<?php

include 'connection.php';

$sqsd="delete from session_slot where slot='".$_POST['slot']."'";
$qrsqsd=mysqli_query($conn, $sqsd);


date_default_timezone_set('Asia/Kolkata');
$time_hr1 = date("H");    
$time_min1 = date("i");
$main="select * from session_slot";
$qmain=mysqli_query($conn, $main);
while($rowmain=mysqli_fetch_assoc($qmain)){
    if($rowmain['hr']<$time_hr1){
        if($rowmain['min'] > 55){
            if($time_min1 <= 2){

            }
            else{
                $sp="delete from session_slot where slot='".$rowmain['slot']."' and hr<'$time_hr1'";
        $qsp=mysqli_query($conn, $sp);
            }
        }
        else{
        $sp="delete from session_slot where slot='".$rowmain['slot']."' and hr<'$time_hr1'";
        $qsp=mysqli_query($conn, $sp);
    }
    }
    elseif($rowmain['hr']==$time_hr1){
     if($rowmain['min']+6<$time_min1) {
         $minn=$time_min1-6;
     $sp="delete from session_slot where slot='".$rowmain['slot']."' and hr='$time_hr1' and min<'$minn' ";
     $qsp=mysqli_query($conn, $sp);
         
     }
     else{
         
     }   
    }
    else{
        
        
    }
    
}
   

session_start();

if(isset($_SESSION['mem_id']))
{

	 ?>
<div class="confirm_ds">
	<div style="height:5vh;">	</div>
		<p style="font-size: 3vh; padding-bottom: 2vh;">BOOKING STATUS</p>

<div style="height:50%;">
	<?php


$count=count($_POST['name']);
$date=date('Y-m-d');
for ($i=0; $i < $count ; $i++) { 

$sqlas="SELECT count(slot_id) as count from booking where slot_id='".$_POST['slot_id']."' and booking_date='".$_POST['date']."'";
$queryas=mysqli_query($conn, $sqlas);
$rowas=mysqli_fetch_assoc($queryas);
if($rowas['count']>=4){
    echo '<p class="book_text1">booking for ID '.$_POST['mem_id'][$i].' is Failed (Reached booking Limit) </p>';
}
else {
$m=0;
$sd=0;
$sqlsd="SELECT * from user where mem_id='".$_POST['mem_id'][$i]."'";
$querysd=mysqli_query($conn, $sqlsd);
while($rowsd=mysqli_fetch_assoc($querysd)){
    if($rowsd['mem_id']==$_POST['mem_id'][$i]){ 
        $sd++;
         } 
         else{


          }
    
}
    
if($sd>0){
    
if($_POST['mem_id'][$i]=='G' || $_POST['mem_id'][$i]=='g'){ 

}
else{
$sqlm="SELECT * from booking where mem_id='".$_POST['mem_id'][$i]."' and booking_date='".$_POST['date']."'";
$querym=mysqli_query($conn, $sqlm);
while($rowm=mysqli_fetch_assoc($querym)){
$m++;
}
}
if($m<1)
{
if(!empty($_POST['mem_id'][$i])){
    
if($_POST['mem_id'][$i]=='G' || $_POST['mem_id'][$i]=='g'){
    
$sql="INSERT into booking (mem_id, name, bymem_id, booking_date, slot, slot_time, slot_id, status) VALUES ('".$_POST['mem_id'][$i]."','".$_POST['name'][$i]."', '".$_SESSION['mem_id']."', '".$_POST['date']."', '".$_POST['slot']."', '".$_POST['slot_time']."', '".$_POST['slot_id']."', 'Placed')";
}
else{
$sqls="SELECT * from user where mem_id='".$_POST['mem_id'][$i]."'";
$querys=mysqli_query($conn, $sqls);
$rows=mysqli_fetch_assoc($querys);
$sql="INSERT into booking (mem_id, name, bymem_id, booking_date, slot, slot_time, slot_id, status) VALUES ('".$_POST['mem_id'][$i]."','".$rows['name']."', '".$_SESSION['mem_id']."', '".$_POST['date']."', '".$_POST['slot']."', '".$_POST['slot_time']."', '".$_POST['slot_id']."', 'Placed')";
}

$result=mysqli_query($conn, $sql);

if($result)
			{
				echo '<p class="book_text1">booking for ID '.$_POST['mem_id'][$i].' is Successfull </p>';
			}
			else
			{
				echo '<p class="book_text1">booking for '.$_POST['mem_id'][$i].' is Unsuccessfull </p>';
			}
}


else{


}
}
else{
 echo '<p class="book_text1">booking for ID '.$_POST['mem_id'][$i].' already exist on '.$_POST['date'].' </p>';
}
}
else{
 echo '<p class="book_text1">ID '.$_POST['mem_id'][$i].' doesnt exist in database </p>';
}

}


 
 }


 ?>
 </div>
 <button onclick="location.href='home.php'" class="buttons2" style="width: 40%;" >Go to Booking Page</button>
</div>
</body>
<?php
}
else{


	header('location:index.php');
}

 ?>