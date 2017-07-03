var url = '../functions/functions.php';

// Insert Data
function insert() {
	$(document).ready(function(){
		$('#addorupdate').click(function(e){
			e.preventDefault();
			var id 		= $('#id').val();
			var ln 		= $('#lastname').val();
			var fn 		= $('#firstname').val();
			var mn 		= $('#middlename').val();
			$('#addorupdate').html('Please Wait');
			$.ajax({
				type  	 : 'POST',
				url   	 : url,
				data  	 : { action : 'addorupdate', id : id, firstname : fn, lastname : ln, middlename : mn },
				dataType : 'json',
				cache 	 : false,
				success:function(response) {
					switch(response.notification) {
						case 'success':
						$.amaran({
				        'theme'     :'colorful',
				        'content'   :{
				           bgcolor:'#336699',
				           color:'#fff',
				           message:'<i class="fa fa-check-circle"></i> Record has been added.'
				        },
				        'position'  :'bottom right',
				        'outEffect' :'slideBottom'
				    });
						$('#addorupdate').html('Save');
						showdata()
						break;

						case 'updated':
						$.amaran({
								'theme'     :'colorful',
								'content'   :{
									 bgcolor:'#336699',
									 color:'#fff',
									 message:'<i class="fa fa-check"></i> Record has been updated.'
								},
								'position'  :'bottom right',
								'outEffect' :'slideBottom'
						});
						$('#addorupdate').html('Update');
						showdata()
						break;

						case 'duplicated':
						$.amaran({
				        'theme'     :'colorful',
				        'content'   :{
				           bgcolor:'#ff0000',
				           color:'#fff',
				           message:'<i class="fa fa-remove"></i> First name already exist.'
				        },
				        'position'  :'bottom right',
				        'outEffect' :'slideBottom'
				    });
						$('#addorupdate').html('Save');
						break;

						default:
						break;
					}
				}
			});
		});
	});
}

//show all data in table
function showdata(){
	$.ajax({
		type: 'POST',
		url : url,
		data: { action : 'show'},
		cache : false,
		success:function(data) {
			$('div#showdata').html(data);
		}
	});
}

//Delete data by id
function del($id) {
	var id  = $id;
	$.ajax({
		type: 'POST',
		url : url,
		data: { action : 'delete', id : id },
		cache : false,
		dataType:'json',
		success:function(response) {
			if($('#id').val() == id) {
				$('#id').val('');
			}
			switch(response.notification) {
				case 'success':
				$.amaran({
						'theme'     :'colorful',
						'content'   :{
							 bgcolor:'#336699',
							 color:'#fff',
							 message:'<i class="fa fa-check"></i> Record has been deleted.'
						},
						'position'  :'bottom right',
						'outEffect' :'slideBottom'
				});
				showdata();
				break;
			}
		}
	});
}

// edit data from selected data from table
function edit($id) {
	var id = $id;
	$.ajax({
		type: 'POST',
		url : url,
		data: { action : 'edit', id : id },
		cache : false,
		dataType:'json',
		success:function(response) {
			$('#id').val(response.data[0]);
			$('#lastname').val(response.data[1]);
			$('#firstname').val(response.data[2]);
			$('#middlename').val(response.data[3]);
			$('#addorupdate').html('Update');
		}
	});
}

//Call insert function
insert();
//call showdata function
showdata();
