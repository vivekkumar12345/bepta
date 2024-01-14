$(document).ready(function(){  

	load_data();
    
	function load_data()
	{
		$.ajax({
			url:"includes/med_alloted_fetch.php",
			method:"POST",
			success:function(data)
			{
				$('#user_data').html(data);
			}
		});
	}
	
							
	
	$("#user_dialog").dialog({
		autoOpen:false,
		width:'800',
		maxWidth:600,
		height:'600'
	});


$(document).on('click', '.view', function(){


		var id = $(this).attr('id');
		$.ajax({
			url:"includes/med_alloted_action.php",
			method:"POST",
			data:{id:id},
			dataType:"html",
			success:function(data)
			{
				$('#user_dialog').dialog('open');
				$('#user_dialog').html(data);
			}
		});
	});


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
	count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox"></td>'; 
		htmlRows += '<td style="color: black;">'+count+'</td>'; 
		htmlRows += '<td><input type="text" name="med_name[]" id="med_name_'+count+'" class="form-control" autocomplete="off"></td>';         
		
		htmlRows += '<td><input type="text" name="weight[]" id="weight_'+count+'" class="form-control" autocomplete="off"></td>';	
		htmlRows += '<td><input type="text" name="dose[]" id="dose_'+count+'" class="form-control" autocomplete="off"></td>';
		htmlRows += '<td><input type="text" name="days[]" id="days_'+count+'" class="form-control" autocomplete="off"></td>';
		htmlRows += '</tr>';
		$('#medicines').append(htmlRows);
	}); 


});
