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

</head>

<body>


<?php 
include 'connection.php';
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
if(isset($_SESSION['mem_id'])){
 $mem_id=$_SESSION['mem_id'];
}
else{
	$mem_id='Home';
}
$d=date('Y-m-d');

?>
<div class="header">
<?php include 'submenu.php' ?>
		<div class="book" id="book" align="center">
				<div class="book-form">
					<div style="height: 2.5vh;"></div>
				
				<form action="" method="get">
				<div style="display: flex; width: 100%;">

				<div class="ll1">
					
				
				<?php
				date_default_timezone_set('Asia/Kolkata');
				$dts = date("Y-m-d", strtotime("+2 days"));
				$dtr = date("Y-m-d", strtotime("+1 days"));
				$time = date("H");
		if($time>17){		
				?>
				<a class="book-text" id="hide">Select Date of Booking</a>
				<select name="date" id="date" class="book-input" >
				<option><?php echo $dts; ?></option>
					</select>
				<?php }
				
                else if($time<12){		
				?>
				<a class="book-text" id="hide">Select Date of Booking</a>
				<select name="date" id="date" class="book-input" >
				<option><?php echo $dtr; ?></option>
					</select>
				<?php }
				else{
				?>
				<a class="book-text">Booking starts at 1800 hrs</a>
				<?php } ?>
			
		</div >
			<div class="ll2"><a class="book-text" id="hide">Enter Hole</a>
				<select type="text" name="hole" id="hole" class="book-input"  onchange="checkDate()" required/>
				<?php if(isset($_GET['hole'])){ ?> <option value="<?php echo $_GET['hole']; ?>"><?php echo $_GET['hole']; ?></option>
				 <?php } elseif (isset($_SESSION['hole'])){?><option value="<?php echo $_SESSION['hole']; ?>"><?php echo $_SESSION['hole']; ?></option> <?php } else {  } ?>
				<option value="T1">T1</option>
				<option value="T5">T5</option>
				<option value="T10">T10</option>
				<option value="T14">T14</option>
			</select>
			<button type="submit" name="submit" class="buttons1"><i class="fa fa-search"></i></button>
</div>
</div>
		</form>
		</div>

	<div id="hole" style="width: 100%; height: 77vh; overflow-y: scroll;"><?php include 'holes.php';?></div>


</div>

<script type="text/javascript">
	function book(){

var x=document.getElementById('book').style.display='block';		
	}

</script>


</html>

<?php 


}
else{


	header('location:index.php');
}

 ?>