

<div class="booking_card"> 
<?php 
include 'connection.php';
if (isset($_GET['hole']) && isset($_GET['date']))
{
$slot=$_GET['hole'];
$date=$_GET['date'];
$_SESSION['date']=$_GET['date'];
$_SESSION['hole']=$_GET['hole'];
$sql="SELECT * from slotsperday where slot='$slot' and date='$date' and status='Open' order by slot_time ASC";
$query=mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($query))
{
$sqls="SELECT count(booking_id) as count from booking where slot='$slot' and slot_time='".$row['slot_time']."' and booking_date='$date' and status!='Cancelled'";
$querys=mysqli_query($conn, $sqls);
$rows=mysqli_fetch_assoc($querys);

?>

<form class="book_dis" action="books.php" method="post">
	<div class="book_dis_left" style="<?php if($row['slot_time']<1200){ echo "background-color:orange";?>; <?php } else{ }?>">
		<p class="book_text" ><?php echo $date; ?></p>
		<input type="hidden" name="date" value="<?php echo $date; ?>" />
		<p class="book_text" style="font-size: 2vh; font-weight: bold;"><?php echo $row['slot_time']; ?> Hrs</p>
			<p class="book_text" style="font-size: 2vh; font-weight: bold;"><?php if($row['slot_time']<1200){ echo 'Morning'; } else{ echo 'Afternoon'; }; ?></p>
		<input type="hidden" name="slot_time" value="<?php echo $row['slot_time']; ?>" />
		<input type="hidden" name="count" value="<?php echo 4-$rows['count']; ?>" />
		<p class="book_text" style="font-weight: bold; font-size: 3.5vh;"><?php echo $slot; ?></p>
	</div>
	<div class="book_dis_right" style="background-color: <?php if($rows['count']<=2) { ?> rgb(213,255,204);  <?php } elseif($rows['count']==3){ ?> rgb(255,255,230);  <?php } else { ?> rgb(255,204,204); <?php } ?>">
		

		<input type="hidden" name="slot" value="<?php echo $slot; ?>" />


<?php  
$sqlv="SELECT * from booking where slot='$slot' and slot_time='".$row['slot_time']."' and booking_date='$date' and status!='Cancelled'";
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


		<?php if($rows['count']<=3) { ?>
		<span class="book_text" style="padding-top:0px; padding-bottom:0px; color: black;"><?php echo 4-$rows['count']; ?> Vacant Seats</span>
	<?php } ?>
	<?php if($rows['count']<4) { ?>
		<input type="hidden" name="slot_id" value="<?php echo $row['slot_id']; ?>" />
	<button type="submit" name="submit" class="buttons2">Book</button>
<?php } else { } ?> 
	 </div>
</form>

<?php

 } ?>

	</div>
<?php }
elseif (isset($_SESSION['hole']) && isset($_SESSION['date'])){
$sql="SELECT * from slotsperday where slot='".$_SESSION['hole']."' and date='".$_SESSION['date']."' and status='Open' order by slot_time ASC";
$query=mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($query))
{
$sqls="SELECT count(booking_id) as count from booking where slot='".$_SESSION['hole']."' and slot_time='".$row['slot_time']."' and booking_date='".$_SESSION['date']."' and status!='Cancelled'";
$querys=mysqli_query($conn, $sqls);
$rows=mysqli_fetch_assoc($querys);
?>
<form class="book_dis" action="books.php" method="post">
	<div class="book_dis_left" style="<?php if($row['slot_time']<1200){ echo "background-color:orange";?>; <?php } else{ }?>">
		<p class="book_text" ><?php echo $_SESSION['date']; ?></p>
		<input type="hidden" name="date" value="<?php echo $_SESSION['date']; ?>" />
		<p class="book_text" style="font-size: 3.5vh; font-weight: bold;"><?php echo $row['slot_time']; ?> Hrs</p>
					<p class="book_text" style="font-size: 2vh; font-weight: bold;"><?php if($row['slot_time']<1200){ echo 'Morning'; } else{ echo 'Afternoon'; }; ?></p>
		<input type="hidden" name="slot_time" value="<?php echo $row['slot_time']; ?>" />
		<input type="hidden" name="count" value="<?php echo 4-$rows['count']; ?>" />
		<p class="book_text" style=" font-weight: bold; font-size: 3.5vh;"><?php echo $_SESSION['hole']; ?></p>
	</div>
	<div class="book_dis_right" style="background-color: <?php if($rows['count']<=2) { ?> rgb(213,255,204);  <?php } elseif($rows['count']==3){ ?> rgb(255,255,230);  <?php } else { ?> rgb(255,204,204); <?php } ?>">
		

		<input type="hidden" name="slot" value="<?php echo $_SESSION['hole']; ?>" />

<?php  
$sqlv="SELECT * from booking where slot='".$_SESSION['hole']."' and slot_time='".$row['slot_time']."' and booking_date='".$_SESSION['date']."' and status!='Cancelled'";
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





		<?php if($rows['count']<=3) { ?>
		<span class="book_text" style="padding-top:0px; padding-bottom:0px; color: black;"><?php echo 4-$rows['count']; ?> Vacant Seats</span>
	<?php } ?>
	<?php if($rows['count']<4) { ?>
		<input type="hidden" name="slot_id" value="<?php echo $row['slot_id']; ?>" />
	<button type="submit" name="submit" class="buttons2" style="padding-top:0px; padding-bottom:0px; color: white;">Book</button>
<?php } else { } ?> 
	 </div>
</form>

<?php
}
}
else{


}
 ?>
