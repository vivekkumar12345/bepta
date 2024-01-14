$(document).ready(function(){  

	load_data();
    
	function load_data()
	{
		$.ajax({
			url:"includes/med_fetch.php",
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

	$("#user_dialog1").dialog({
		autoOpen:false,
		width:'700',
		height:'600'
	});
		$("#user_dialog2").dialog({
		autoOpen:false,
		width:'700',
		height:'600'
	});
		$("#user_dialog3").dialog({
		autoOpen:false,
		width:'500',
		height:'600'
	});

$(document).on('click', '.view', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"includes/med_action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#diag').val(data.diag);
				$('#ids').val(data.ids);
				$('#user_dialog').attr('title', 'Edit Data');
				$('#user_dialog').dialog('open');
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

  $(document).on('click', '.diag1', function(){


		var id = $(this).attr('id');
		$.ajax({
			url:"includes/biodata_fetch.php",
			method:"POST",
			data:{id:id},
			dataType:"html",
			success:function(data)
			{
				$('#user_dialog1').dialog('open');
				$('#user_dialog1').html(data);
			}
		});
	});
$(document).on('click', '.med', function(){


		var id = $(this).attr('id');
		$.ajax({
			url:"includes/med_alloted_action.php",
			method:"POST",
			data:{id:id},
			dataType:"html",
			success:function(data)
			{
				$('#user_dialog2').dialog('open');
				$('#user_dialog2').html(data);
			}
		});
	});
$(document).on('click', '.test', function(){


		var id = $(this).attr('id');
		$.ajax({
			url:"includes/result_view_enter.php",
			method:"POST",
			data:{id:id},
			dataType:"html",
			success:function(data)
			{
				$('#user_dialog3').dialog('open');
				$('#user_dialog3').html(data);
			}
		});
	});

});
