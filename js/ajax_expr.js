$(document).ready(function(){	
	


 
 //console.log(filename); //.xlsx file
 
// console.log(storagename); //original name//

	var dataRecords = $('#expr_form_table').DataTable({
				"fixedHeader": {
					header: true,
				},
				  "autoWidth": false,
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
			url:"ajax_action_expr.php",
			type:"POST",
			data:{action:'listRecords',fname: filename ,sname:storagename },
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 1,6, 7],
				"orderable":false,
			},
		],
		"pageLength": 10
	});	
	
	$('#addRecord_expr').click(function(){
		//$('#recordModal_expr').modal('show');
		$('#expr_form_modal')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Record");
		
		$('#filename').val(filename);

		$('#action').val('addRecord');
		$('#save').val('Add');
	});


	
	$("#expr_form_table").on('click', '.update', function(){
		var id = $(this).attr("id");
		var action = 'getRecord';
		$.ajax({
			url:'ajax_action_expr.php',
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data){
				$('#expr_Modal').modal('show');
				$('#id').val(data.id);
				$('#Assay_Name').val(data.assay_name);
				$('#Assay_format').val(data.assay_format);
				$('#Assay_test_type').val(data.assay_test_type);				
				$('#Detection_technology').val(data.detection_technology);
				$('#Endpoint_mode').val(data.endpoint_mode);	
				$('#Medium').val(data.medium);	
				$('#Plate_type').val(data.plate_type);	
				$('#Measurement').val(data.measurement);	
				$('#Cell_density_at_plating').val(data.cell_density_at_plating);	
				$('#Time_of_treatment').val(data.time_of_treatment);	
				$('#dilution_fold').val(data.dilution_fold);	
				$('#vehicle').val(data.vehicle);	
				$('#method_dispensation').val(data.method_dispensation);	
				$('#volume_per_well').val(data.volume_per_well);	
				
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Records");
				$('#action').val('updateRecord');
				$('#save').val('Save');
			}
		})
	});
	$("#expr_Modal").on('submit','#expr_form_modal', function(event){
		event.preventDefault();
		//$('#save').attr('disabled','disabled');
		console.log("come to expr modal submit");
		var formData = $(this).serialize();
		console.log(formData);
		$.ajax({
			url:"ajax_action_expr.php",
			method:"POST",
			data:formData,
			success:function(data){				
				//$('#recordForm')[0].reset();
				//$('#recordModal').modal('hide');				
				//$('#save').attr('disabled', false);
				dataRecords.ajax.reload();
			}
		})
	});		
	$("#expr_form_table").on('click', '.delete', function(){
		var id = $(this).attr("id");		
		var action = "deleteRecord";
		if(confirm("Are you sure you want to delete this record?")) {
			$.ajax({
				url:"ajax_action_expr.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data) {					
					dataRecords.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
});