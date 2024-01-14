 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width; initial-scale=1.0" >
<title>BEPTA</title> <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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

   <div>
			<form method="post" action="booking-test.php" id="user_form" >
			
			<div>
				<div>
					<div style="height: 3vh;"></div>
					<table id="invoiceItem">	
						<thead style="height: 7vh; text-align: center;">
						<tr>
							<td width="100%">Enter User details</td>

						</tr>
					
				</thead>

					<input type="hidden" name="date" value="<?php echo $_POST['date'] ?>">
					<input type="hidden" name="slot_time" value="<?php echo $_POST['slot_time'] ?>">
					<input type="hidden" name="slot" value="<?php echo $_POST['slot'] ?>">
					<input type="hidden" name="slot_id" value="<?php echo $_POST['slot_id'] ?>">
					<tr>
					<td style="color:black; text-align:left;">Member ID 'G' for Guests*</td>
					</tr>
					<tr>						
					<td>
						<input type="text" name="mem_id" id="mem_id" class="form-control" autocomplete="off" value="<?php session_start(); echo $_SESSION['mem_id']; ?>" required>
					</td>	
					</tr>
					<tr>
					<td style="color:black; text-align:left;">Member's Name</td>
					</tr>
					<tr>		
					<td>
						<input type="text" name="name" id="name" class="form-control au" autocomplete="off" value="<?php echo $_SESSION['name']; ?>" required>
					</td>

					
				</tr>

					</table>
				</div>
			</div>


			
		<center>
				<div class="form-group" style="margin-top: 5vh">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="insert"/>
				</div>
			
			</div>
				
				</center>
			</form>
		</div>
	</div>
	</main>
			
	</div>
</div>
	<link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
<script type="text/javascript">


$(document).ready(function(){
	$(document).on('click', '#checkAll', function() {          	
		$(".itemRow").prop("checked", this.checked);
	});	
	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', false);
		}
	});  
	var count = $(".itemRow").length;
	$(document).on('click', '#addRows', function() { 
		if (count<=3)
			{count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox"></td>'; 
		htmlRows += '<td style="color: black;">'+count+'</td>'; 
		htmlRows += '<td><input type="text" name="mem_id[]" id="mem_id_'+count+'" class="form-control" autocomplete="off"></td>';         
		
		htmlRows += '<td><input type="text" name="name[]" id="name_'+count+'" class="form-control" autocomplete="off"></td>';	
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
	}

	else {


	}
	}); 
});	

   </script> 