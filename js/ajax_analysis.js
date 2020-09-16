$(document).ready(function(){	
	
	var analysis_Records = $('#analysis_form_table').DataTable({
							
				 "autoWidth": true,
				"scrollX": true,
				deferRender: true,
				scrollY: 450,
				scrollCollapse: true,
				scroller: true,		


		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',		
		"order":[],
		"ajax":{
			url:"ajax_action_analysis.php",
			type:"POST",
			data:{action:'listRecords',fname: filename ,sname:storagename},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0],
				"orderable":false,
			},
		],
		"pageLength": 10
	});	
	
	$('#addRecord_analysis').click(function(){
						$('#filename_an').val(filename);


		//$('#recordModal').modal('show');
		$('#analysis_form_modal')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Record");
		$('#action_an').val('addRecord');
		$('#save_an').val('Add');
	});		
	$("#analysis_form_table").on('click', '.update', function(){
		var id = $(this).attr("id");
		var action = 'getRecord';
		$.ajax({
			url:'ajax_action_analysis.php',
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data){
				$('#analysis_Modal').modal('show');

				$('#id_an').val(data.id);
				$('#Analysis_Normalization').val(data.analysis_normalization);
				$('#Analysis_Formulas').val(data.analysis_formulas);
				$('#Citation').val(data.citation);
				$('#Analysis_result').val(data.analysis_result);				
				$('#Analysis_pipeline_name').val(data.analysis_pipeline_name);
				$('#Analysis_pipeline_Address').val(data.analysis_pipeline_address);
				$('#min_concentration').val(data.min_concentration);	
				$('#max_concentration').val(data.max_concentration);	
				
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Records");
				$('#action_an').val('updateRecord');
				$('#save_an').val('Save');
			}
		})
	});
	$("#analysis_Modal").on('submit','#analysis_form_modal', function(event){
		event.preventDefault();
		//$('#save_an').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"ajax_action_analysis.php",
			method:"POST",
			data:formData,
			success:function(data){				
				//$('#recordForm')[0].reset();
				//$('#recordModal').modal('hide');				
				//$('#save').attr('disabled', false);
				analysis_Records.ajax.reload();
			}
		})
	});		
	$("#analysis_form_table").on('click', '.delete', function(){
		var id = $(this).attr("id");		
		var action = "deleteRecord";
		if(confirm("Are you sure you want to delete this record?")) {
			$.ajax({
				url:"ajax_action_analysis.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data) {					
					analysis_Records.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
});