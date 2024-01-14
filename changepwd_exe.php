<?php
include 'connection.php';
session_start();
$sqlch="SELECT * from user where mem_id='".$_POST["user_id"]."'";
$resultch=mysqli_query($conn, $sqlch);
$rowch=mysqli_fetch_assoc($resultch);

if ($_POST['new_pwd']==$_POST['cnf_pwd'])
{
if($_POST['old_pwd']==$rowch['password']){


$sql="UPDATE user SET password='".$_POST['new_pwd']."' WHERE mem_id='".$_POST["user_id"]."'";
$result=mysqli_query($conn, $sql);
if($result)
			{
				echo '<script> alert("Successfully Updated");
				window.location="user_info.php";
				</script>';
			}
			else
			{
				echo '<script> alert("Sorry Unable to Update");
				window.location="user_info.php";
				</script>';
			}


}
else {
		echo '<script> alert("Sorry Wrong Old Password");
				window.location="user_info.php";
				</script>';
			}
}
else{
echo '<script> alert("Sorry Password Did not matched");
				window.location="user_info.php";
				</script>';

}
?>