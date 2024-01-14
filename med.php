
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width; initial-scale=1.0" >
<title>Medical</title>
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
<script src="script/med.js"></script>

<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
.user-logout {
width: 15%; 
height: 12vh; 
position: fixed; 
top:8vh; 
background-color: rgba(0,0,0,0.9); 
left:87%; 
}
.user-logout a{
  color: white;
  display: block;
  text-decoration: none;
  font-size: 2.5vh;
  padding-top: 1vh;
  padding-bottom: 1vh;
  padding-left: 20%;
  cursor: pointer;
}
.user-logout a:hover{

  background-color: blue;
}
</style>
</head>

<body>

	<div class="tophead"><?php include 'log.php'; ?></div>
	<div style="height: 8vh;"></div>

	<div class="body-main">
		<div class="body-left">
			<?php include 'menu.php'; 
			?>
		</div>
		<div class="body-right">
			<div id="user_data" style=" overflow-y: scroll; height: 92vh;"></div>	
			<div id="user_dialog" style="display: none;">
			
			
			<form method="post" action="med_insert.php" id="user_form" >

				<div class="form-group" style="float: left; width: 100%;">
			<div class="form-group">
			<p>Diagnosis*</p>
			<textarea type="text" id="diag" name="diag" rows="3" class="form-control" required>

			</textarea>

		</div>
	</div>
					<div style="height: 3vh;"></div>
					<input type="hidden" name="ids" id="ids">
					<table id="medicines" cellpadding="5px" style="border-spacing: 15px;">	
						<thead style="height: 7vh; text-align: center;">
						<tr >
							<td width="5%">Select</td>
							<td width="5%">S No</td>
							<td width="15%">Medicine Name*</td>
							<td width="15%">Weight*</td>
							<td width="15%">Dose per day*</td>
							<td width="15%">No days of *</td>

						</tr>
					
				</thead>
					<tr>
					<td>
						<input class="itemRow" name="checkbox" type="checkbox">
					</td>
						<td style="color: black">
						1
					</td>	
					<td>
						<select type="text" name="med_name[]" id="med_name_1" class="form-control" autocomplete="off">
							<?php
							include 'connection.php';
							$sqle1="SELECT distinct(med_name) from med_list";
							$querye1=mysqli_query($conn, $sqle1);
							while($rowe1=mysqli_fetch_assoc($querye1)){

							 ?>
							<option><?php  echo $rowe1['med_name']; ?></option><?php  } ?>
						</select>
					</td>			
					<td>
						<input type="text" name="weight[]" id="weight_1" class="form-control au" autocomplete="off">
					</td>
					<td>
						<input type="text" name="dose[]" id="dose_1" class="form-control au" autocomplete="off">
					</td>
					<td>
						<input type="text" name="days[]" id="days_1" class="form-control au" autocomplete="off">
					</td>
					
				</tr>

					</table>

			<div class="row" style="margin-right: auto; margin-left: auto; margin-top: 4vh;">
							
			<center><button class="btn btn-success" id="addRows" type="button">+ Add More</button>
	
			</div>
			
		
				<div align="center" class="form-group" style="margin-top: 5vh">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="insert"/>
				</div>
			
			</center>	
				
			</form>
		</div>
		

<div id="user_dialog1" style="display: none;">

			</div>
			<div id="user_dialog2" style="display: none;">
					
			</div>
<div id="user_dialog3" style="display: none;">
					
			</div>



		</div>


	
</body>