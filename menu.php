			<div class="menu">
		<a onclick="submenu1()">Bookings</a>
		<a onclick="submenu()">Edit Tee-Off Times</a>
		<a href="addmem.php">Add Member</a>
		<a href="user_detl.php">Member's List</a>
		<a href="logout.php">logout</a>
		<a href="addevent.php">Add Event</a>
		</div>
		<div id="user-logout1" class="user-logout" style="display: none; left: 14.5%;">
	<a href="admin.php">Tee Off</a>
	<a href="admin-test.php">Driving Range</a>

</div>

	<div id="user-logout" class="user-logout" style="display: none; left: 30%;">
	<a href="editmaintime.php">Tee Off</a>
	<a href="editdrivingtime.php">Driving Range</a>

</div>
<script type="text/javascript">
	
function submenu(){

	var x=document.getElementById('user-logout');

	if(x.style.display=='none')
	{

		x.style.display='block'

	}
	else{


		x.style.display='none'
	}



}




function submenu1(){

	var x=document.getElementById('user-logout1');

	if(x.style.display=='none')
	{

		x.style.display='block'

	}
	else{


		x.style.display='none'
	}



}

</script>