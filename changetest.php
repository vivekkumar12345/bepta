
<form action="changetest_exe.php" method="post" id="user_form">
				

<?php
include 'connection.php';
session_start();
$sqlch="SELECT * from bookingtest where booking_id='".$_POST['id']."'";
$querych=mysqli_query($conn, $sqlch);
$rowch=mysqli_fetch_assoc($querych);

 ?>		
 <div class="form-group">

				<input type="hidden" id="mem_idch" name="mem_idch" class="form-control" value="<?php echo $rowch['mem_id']; ?>"  required>
				</div>

 
<div class="form-group">
 
					<label>Date*</label>
				<input type="date" id="datech" name="datech" class="form-control" value="<?php echo $rowch['booking_date']; ?>"  required>
				</div>


<div class="form-group">

					<label>Slot*</label>
				<select type="text" id="slotch" name="slotch" class="form-control" required>
						<option><?php echo $rowch['slot']; ?></option>
							<?php for($i=1;$i<=8;$i++) 
							{?>
							<option>S<?php echo $i;?></option>
							<?php }	?>
							</select>
				</div>				
				
				<div class="form-group">
					<label>Slot Time*</label>
					<select type="text" name="timech" id="timech" class="form-control">
						<option><?php echo $rowch['slot_time']; ?></option>
						<option>select</option>
					</select>
				</div>
				
					<input type="hidden" name="idch" value="<?php echo $_POST['id']; ?>" >


				
								
				
				<div class="form-group">
					<input type="submit" name="form_action" id="form_action" class="btn btn-info"   value="Change"/>
				</div>
				
			</form>

			<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>

<script type="text/javascript">

$(document).ready(function(){

$(document).on('change', '#slotch', function(){
			var deptid = $('#slotch').val();
                var date = $('#datech').val();
                var mem_id = $('#mem_idch').val();
                $.ajax({
                    url: 'extracttimetest.php',
                    type: 'post',
                    data: {depart:deptid, date:date, mem_id:mem_id},
                    dataType: 'html',
                    success:function(data){

                    	$('#timech').html(data);

                        }
 
                });
                
            });

	});	

</script>			