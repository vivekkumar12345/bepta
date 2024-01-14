<button class="print" onclick="test()">Print</button>
<div id="user_data">

<?php
date_default_timezone_set("Asia/Kolkata");


 echo date("Y-m-d h:i:sa"); ?>
	<center>
	<h1> LIST OF BOOKED SLOTS ON <?php echo $_GET['date']; ?> </h1>
 <table border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" width="90%">
 	<th>
 		<tr style="font-size: 1.5vh; text-align: center; font-weight: bold; background-color: lightgrey;">
 			<td style="padding: 1vh 2%;">Ser No</td>
 		<td style="padding: 1vh 2%;">Member ID</td>
 		<td style="padding: 1vh 2%;">Booked By</td>
 		<td style="padding: 1vh 2%;">Name</td>
 		<td style="padding: 1vh 2%;">slot</td>
 		<td style="padding: 1vh 2%;">Booking Status</td>
</tr>
 	</th>
 	<?php

 	include 'connection.php';
$ser=1;
$sqlsd="select distinct slot_time from bookingtest where booking_date='".$_GET['date']."'";
	$querysd=mysqli_query($conn, $sqlsd);
	while($rowsd=mysqli_fetch_assoc($querysd))
	{ ?>
	
	<tr>
		<td width="100%"  colspan="6" style="padding: 1vh 2%;"> <?php echo $rowsd['slot_time'];  ?></td>
	</tr>
<?php
$sqls="select * from bookingtest where booking_date='".$_GET['date']."' and slot_time='".$rowsd['slot_time']."'order by slot ASC";
	$querys=mysqli_query($conn, $sqls);
	while($rows=mysqli_fetch_assoc($querys))
	{

	?>

<tr style="font-size: 1.5vh; text-align: center;">
	<td width="10%" style="padding: 1vh 2%;"><?php echo $ser;  ?></td>
	<td width="10%" style="padding: 1vh 2%;"> <?php echo $rows['mem_id'];  ?></td>
	<td width="10%" style="padding: 1vh 2%;"> <?php echo $rows['bymem_id'];  ?></td>
	<td width="30%" style="padding: 1vh 2%;"> <?php echo $rows['name'];  ?></td>
	<td width="10%" style="padding: 1vh 2%;"> <?php echo $rows['slot'];  ?></td>
	<td width="15%" style="padding: 1vh 2%;"> <?php echo $rows['status'];  ?></td>
</tr>
	<?php
$ser++;
	}
	}
 ?>
</table>
</center>

</div>

<script>
	


      function test() {
       
        var pr = document.getElementById('user_data').innerHTML;
        var body=document.body.innerHTML;
        document.body.innerHTML=pr;

        window.print();    
        document.body.innerHTML=body;

           }
    </script>
