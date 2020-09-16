$(document).ready(function(){	
	$.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) { 
    console.log(message);
};

	var cell_Records = $('#cell_form_table').DataTable({
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
			url:"ajax_action_cell.php",
			type:"POST",
			data:{action_c:'listRecords',fname: filename ,sname:storagename},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 6],
				"orderable":false,
			},
		],
		"pageLength": 10
		



	});	
	
	
	
	
	$('#addRecord_cell').click(function(){
		
				$('#filename_c').val(filename);


		//$('#recordModal').modal('show');
		$('#cell_form_modal')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Record");
		$('#action_c').val('addRecord');
		$('#save_c').val('Add');
	});	



	
	$("#cell_form_table").on('click', '.update', function(){
		var id = $(this).attr("id");
		var action = 'getRecord';
		$.ajax({
			url:'ajax_action_cell.php',
			method:"POST",
			data:{id_c:id, action_c:action},
			dataType:"json",
			success:function(data){
				
				
				$('#cell_Modal').modal('show');

				$('#id_c').val(data.id);
				$('#Cell_line_name').val(data.cell_line_name);
				$('#Cell_line_provenance').val(data.cell_line_provenance);
				$('#CID').val(data.CID);				
				$('#Cell_type').val(data.cell_type);
				$('#Cell_line_organism').val(data.cell_line_organism);	
				$('#Passage_number').val(data.passage_number);	
				$('#Modifications').val(data.modifications);	
				$('#Age').val(data.age);	
				$('#Sex').val(data.sex);	
				$('#Diagnosis').val(data.diagnosis);	
				$('#Sample_material').val(data.sample_material);	
				$('#Date_of_evaluation').val(data.date_of_evaluation);	
				$('#Date_of_sampling').val(data.date_of_sampling);	
				
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Records");
				$('#action_c').val('updateRecord');
				$('#save_c').val('Save');
			}
		})
	});
	
	
	
	
	
	$("#cell_Modal").on('submit','#cell_form_modal', function(event){
		event.preventDefault();
		//$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"ajax_action_cell.php",
			method:"POST",
			data:formData,
			success:function(data){				
				//$('#cell_form_modal')[0].reset();
				//$('#recordModal').modal('hide');				
				//$('#save').attr('disabled', false);
				cell_Records.ajax.reload();
			}
		})
	});		
	
	
	
	
	
	$("#cell_form_table").on('click', '.delete', function(){
		var id = $(this).attr("id");		
		var action = "deleteRecord";
		if(confirm("Are you sure you want to delete this record?")) {
			$.ajax({
				url:"ajax_action_cell.php",
				method:"POST",
				data:{id:id, action_c:action},
				success:function(data) {					
					cell_Records.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
});