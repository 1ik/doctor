$(document).ready(function() {

	$('#no_prescription_info').hover(function() {
		$(this).css({
			color : '#127acf',
			cursor : 'pointer'
		});
		$('#prescription_image').html('<img id="prescription_icon" width="50px" height="80px" src="http://localhost/doctor/assets/imgs/prescription_active.png" />');
	}, function() {
		$(this).css({
			color : '#CCCCCC'
		});
		$('#prescription_image').html('<img id="prescription_icon" width="50px" height="80px" src="http://localhost/doctor/assets/imgs/prescription.png") />');
	});

	$('#patient_id').keyup(function(event) {
		if ($('#patient_id').val() == "") {
			nopatient();
			return;
		}

		if (event.keyCode != 13) {
			$("#patient_information > span").html('');
			$('#patient_image').html('<img style="margin-left: 50px; margin-top: 50px" src = "http://localhost/doctor/assets/imgs/ajax-loader.gif"/>');
		}
	});

	$('#no_prescription_info').click(function() {
		var patient_id = $('#patient_id').val();
		if (patient_id.length == 0) {
			alert("Please Select a Patient");
			return;
		}

		var tags = jQuery.map($("#disease_type").tagit("tags"), function(obj, index) {
			return obj.value;
		});

		if (tags.length == 0) {
			alert("Please Select Disease type for Patient.");
			return;
		}

		var prescription_title = $('#prescription_title').val();
		if (prescription_title.length < 10) {
			alert('please give a valid prescription title with a minimum length 10');
			return;
		}

		// alert("we are now ready to proceed");
		// return;

		/* SENDING AJAX REQUEST FOR MAKING A NEW PRESCRIPTION*/

		$.ajax({
			url : 'doctor/add_prescription',
			type : "post",
			data : {
				tagList : tags,
				title : prescription_title,
				id : patient_id
			},
			success : function(response) {
				$('#prescription_div_container').html('<div class="grid_15" id="prescription_div"> <div id="PeopleTableContainer" style="width: 600px;"></div> </div> ');
				$('#prescription_div_container').append('<div class="grid_15 id="prescription_controle_div"> <input id="add_medicine" type="button" value = "add new medicine" /> <input id="del_prescription" type="button" onClick = "document.location.reload(true)" value = "Delete Prescription" /> </div>');

				$('#add_medicine').button({
				});

				$('#del_prescription').button({
				});
				
				$('#del_prescription').click(function(){
					ajax({
						url:'doctor/delete_prescription',
						type : "post",
						success:function(data){
							document.location.reload(true);
						}
					});
				});
				

				$('#PeopleTableContainer').jtable({
					title : 'Table of people',
					deleteConfirm : true,
					paging : true,
					pageSize : 2,
					selecting : true,
					selectingCheckboxes : true,
					selectOnRowClick : true,
					deleteConfirmMessege : "Are you sure that you want to delete this entry?",
					addRecordButton : $('#add_medicine'),
					actions : {
						listAction : 'http://localhost/doctor/profile/doctor/medicineList',
						createAction : 'http://localhost/doctor/profile/doctor/add_medicine',
						updateAction : 'http://localhost/doctor/profile/doctor/update_medicine',
						deleteAction : 'http://localhost/doctor/profile/doctor/delete_medicine'
					},
					formCreated : function(event, data){
						$(".medicine_name").autocomplete({
		// source: [{label : "Anik Hasan" , value : "anik"}, {label : 'Dipankar Chaki Joy' , value : "joy"} , {label : "Fahim Al Hasnaeen" , value : "fahim"}]
							source : function(request, response) {
								$.ajax({
									url : "doctor/ajax_medicinelist",
									type : "post",
									data : {
										key : request.term
									},
									success : function(data) {
										obj = jQuery.parseJSON(data);
										response($.map(obj, function(item) {
											return {
												label : item.medicine_name + "_" + item.company  +"_"+ item.power,
												value : item.medicine_name + "_" + item.company  +"_"+ item.power
											}
										}));
									}
								});
							},
					
							select : function(event, ui) {
								//$('#pat_name').html("<label > Patient Name : " + ui.item.Name + "</label>");
							}
						});
					},
					fields : {
						medicine_name : {
							title : 'Name',
							width : '17%',
							inputClass : "medicine_name"
						},
						For : {
							title : 'For',
							width : '20%'
						},
						Does : {
							title : 'Does',
							width : '26%'
						},
						Duration : {
							title : 'Duration',
							width : '13%',
							type : 'text',
						},

						comment : {
							title : 'Comment about medicine',
							type : 'textarea',
							edit : true,
							list : false,
							display : false,
						}

					}
				});

				//Load person list from server
				$('#PeopleTableContainer').jtable('load');
			}
		});
	});

	//Prepare jTable

	function give_title() {
		if ($('#prescription_title').val() == '') {
			return 'no title';
		} else {
			return $('#prescription_title').val();
		}
	}

});
