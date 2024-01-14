
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

</head>

<body>


<div class="header">

<<!-- div class="mainhead">	<a class="bepta">BEPTA </a>
</div> -->
	<div class="login-container" align="center">
		<form class="login-form" target="" method="get" enctype="multipart/formdata">
			<div style="height: 6vh;"> </div>
			<p class="login-text">Enter Member Id or Email Id</p>
		<input type="text" name="username" class="login-input" required/>
		<p class="login-text">Password</p>
		<input type="Password" name="password" class="login-input" required/>
		<button type="submit" name="submit" class="buttons">Login</button>

	</form>






			
	</div>
	<div class="events" id="events">
	<h3 class="eventhead">BULLETIN BOARD</h3>
<?php 

include 'connection.php';
$date=date('Y-m-d');
$sql="SELECT * from events where date>='$date' order by date ASC limit 6";
$query=mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($query)){

?>

<div class="event">
<a href="event_upload/<?php echo $row['file_name']; ?>"><div class="eventleft"><p class="book_text"><?php echo $row['date']; ?></p></div></a>
<a href="event_upload/<?php echo $row['file_name']; ?>"><div class="eventright"><p class="book_text"><?php echo $row['event']; ?></p></div></a>


</div>

<?php
}
?>
		</div>


</div>

<?php 
session_start();
include('connection.php');
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
   



if(isset($_GET['username']) || isset($_GET['password'])){
if($_GET['username']=='admin' && $_GET['password']=='admin@123'){
$_SESSION['mem_id']='admin';
header('location:user_detl.php');
	}
else{
if(!empty($_GET['username']) && !empty($_GET['password'])){
$username=$_GET['username'];
$password=$_GET['password'];

$sql="SELECT * FROM user where (mem_id='$username' or email='$username') && password='$password'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
$count=1;
while($row=mysqli_fetch_assoc($result)){
	$_SESSION['mem_id']=$row['mem_id'];
	$_SESSION['name']=$row['name'];
	$_SESSION['dob']=$row['dob'];
	$_SESSION['username']=$row['username'];
	$_SESSION['user_type']=$row['user_type'];
$count++;
}
if($count>1){
header('location:home.php');
}
else {	


}
}

else{

}
}}
else{
    
}
 ?>







 <script type="text/javascript">
	function reg(){

var x=document.getElementById('register').style.display='block';		
	}
		function regrc(){

var x=document.getElementById('register').style.display='none';		
	}


</script>
<script type="text/javascript">
  function check() {
        var password = $("#pwd1").val();
        var confirmPassword = $("#pwd2").val();
        if (password == confirmPassword)
        {
            var x=document.getElementById('message').style.color='green';
        }
        else
        {
            var x=document.getElementById('message').style.color='red';
        }
    }

</script>



<?php 
include 'timeslots.php';
include 'timeslot_test.php';

?>
</body>
</html>