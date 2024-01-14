<div class="booking_card"> 
<?php 
include 'connection.php';
if (isset($_GET['hole1']) && isset($_GET['date1']))
{
$slot1=$_GET['hole1'];
$date1=$_GET['date1'];
$_SESSION['date1']=$_GET['date1'];
$_SESSION['hole1']=$_GET['hole1'];
$sql="SELECT * from slotsperday_test where slot_time='$slot1' and date='$date1' and status='Open'";
$query=mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($query))
{

$sqls="SELECT count(booking_id) as count from bookingtest where slot_time='$slot1' and slot='".$row['slot']."' and booking_date='$date1' and status!='Cancelled'";
$querys=mysqli_query($conn, $sqls);
$rows=mysqli_fetch_assoc($querys);

?>

<form class="book_dis" action="books_test.php" method="post">
	<div class="book_dis_left">
		<p class="book_text" ><?php echo $date1; ?></p>
		<input type="hidden" name="date" value="<?php echo $date1; ?>" />
		<p class="book_text" style="font-size: 2.5vh; font-weight: bold;"><?php echo $row['slot_time']; ?> Hrs</p>
		<input type="hidden" name="slot_time" value="<?php echo $row['slot_time']; ?>" />
		<p class="book_text" style="font-weight: bold; font-size: 4vh;"><?php echo $row['slot']; ?></p>
	</div>
	<div class="book_dis_right" style="background-color: <?php if($rows['count']<=2) { ?> rgb(213,255,204);  <?php } elseif($rows['count']==3){ ?> rgb(255,255,230);  <?php } else { ?> rgb(255,204,204); <?php } ?>">
		

		<input type="hidden" name="slot" value="<?php echo $row['slot']; ?>" />


<?php  
$sqlv="SELECT * from bookingtest where slot_time='$slot1' and slot='".$row['slot']."' and booking_date='$date1' and status!='Cancelled'";
$queryv=mysqli_query($conn, $sqlv);
while($rowv=mysqli_fetch_assoc($queryv))
{
$sqla="SELECT * from user where mem_id='".$rowv['mem_id']."' ";
$querya=mysqli_query($conn, $sqla);
$rowa=mysqli_fetch_assoc($querya);

?>

<p class="book_text" style="padding-top:0px; padding-bottom:0px; color: black;"> <?php echo $rowa['name']; ?> </p>

<?php


}


  ?>


		
		<input type="hidden" name="slot_id" value="<?php echo $row['slot_id']; ?>" />
	<?php if($rows['count']>=1){ } else { ?><button type="submit" name="submit" class="buttons2">Book</button><?php } ?>
	 </div>
</form>

<?php

 } ?>

	</div>
<?php }
elseif (isset($_SESSION['hole1']) && isset($_SESSION['date1'])){
$sql="SELECT * from slotsperday_test where slot_time='".$_SESSION['hole1']."' and date='".$_SESSION['date1']."' and status='Open'";
$query=mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($query))
{
$sqls="SELECT count(booking_id) as count from bookingtest where slot_time='".$_SESSION['hole1']."' and slot='".$row['slot']."' and booking_date='".$_SESSION['date1']."' and status!='Cancelled'";
$querys=mysqli_query($conn, $sqls);
$rows=mysqli_fetch_assoc($querys);
?>
<form class="book_dis" action="books_test.php" method="post">
	<div class="book_dis_left">
		<p class="book_text" ><?php echo $_SESSION['date1']; ?></p>
		<input type="hidden" name="date" value="<?php echo $_SESSION['date1']; ?>" />
		<p class="book_text" style="font-size: 2.5vh; font-weight: bold;"><?php echo $row['slot_time']; ?> Hrs</p>
		<input type="hidden" name="slot_time" value="<?php echo $row['slot_time']; ?>" />
		<p class="book_text" style=" font-weight: bold; font-size: 4vh;"><?php echo $row['slot']; ?></p>
	</div>
	<div class="book_dis_right" style="background-color: <?php if($rows['count']<=2) { ?> rgb(213,255,204);  <?php } elseif($rows['count']==3){ ?> rgb(255,255,230);  <?php } else { ?> rgb(255,204,204); <?php } ?>">
		

		<input type="hidden" name="slot" value="<?php echo $row['slot']; ?>" />

<?php  
$sqlv="SELECT * from bookingtest where slot_time='".$_SESSION['hole1']."' and slot='".$row['slot']."' and booking_date='".$_SESSION['date1']."' and status!='Cancelled'";
$queryv=mysqli_query($conn, $sqlv);
while($rowv=mysqli_fetch_assoc($queryv))
{

$sqla="SELECT * from user where mem_id='".$rowv['mem_id']."' ";
$querya=mysqli_query($conn, $sqla);
$rowa=mysqli_fetch_assoc($querya);


?>

<p class="book_text" style="padding-top:0px; padding-bottom:0px; color: black;"> <?php echo $rowv['name']; ?> </p>

<?php


}


  ?>





		
		<input type="hidden" name="slot_id" value="<?php echo $row['slot_id']; ?>" />
	<?php if($rows['count']>=1){ } else { ?><button type="submit" name="submit" class="buttons2" style="padding-top:0px; padding-bottom:0px; color: white;">Book</button><?php } ?>
	 </div>
</form>

<?php
}
}
else{


}

 ?>
