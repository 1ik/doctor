function nopatient() {
	$('#patient_image').html('<img src = "http://localhost/doctor/assets/imgs/profile/patients/default.jpg"/>');
	$('#patient_information').html('<p class = "no_patient">No Patient Selected</p>');
}


$(document).ready(function() {
	nopatient();
	
	$('#find_prescription').click(function(){
		var taglist = $("#disease_type_search").tagit("tags");
		var tags = jQuery.map(taglist , function(obj, index){
			return obj.value;
		});
		
		var data = {taglists : tags , patient_id : $('#patient_id_search').val()};
		var json_data = JSON.stringify(data);
		
		$.ajax({
			url : 'doctor/get_prescription',
			type : "post",
			data : {info :  json_data},
			success : function(data){
				alert(data);
			}
		});
	});
	
	
	//
	$('#disease_type').tagit({
		tagSource : function(request, response) {
			$.ajax({
				url : "doctor/disease_types",
				type : "post",
				data : {
					key : request.term
				},
				success : function(data) {
					obj = jQuery.parseJSON(data);
					response($.map(obj, function(item) {
						return {
							label : item.name,
							value : item.name
						}
					}));
				}
			});
		}
	});



	//patient id autocomplete..
	$("#patient_id").autocomplete({
		// source: [{label : "Anik Hasan" , value : "anik"}, {label : 'Dipankar Chaki Joy' , value : "joy"} , {label : "Fahim Al Hasnaeen" , value : "fahim"}]
		source : function(request, response) {
			$.ajax({
				url : "doctor/patients",
				type : "post",
				data : {
					key : request.term
				},
				success : function(data) {
					obj = jQuery.parseJSON(data);
					response($.map(obj, function(item) {
						return {
							info : item,
							Name : item.Name,
							label : item.Name + " " + item.address + " " + item.phone,
							value : item.id
						}
					}));
				}
			});
		},

		select : function(event, ui) {
		
			$('#patient_information')
			.html('<span  id="patient_name"> </span> <span id="patient_age"> </span><br/> <span id="patient_blood_group"></span><br /> <span id="patient_phone"></span><br /> <span id="patient_email"></span><br /> <span id="patient_address"></span><br />');
			var patient = ui.item.info;
			$('#patient_image').html('<img src="' + patient.image_url + '"/>');
			$('#patient_name').html('<p>' + patient.Name + '</p>');
			$('#patient_age').html("Age : " + patient.age);
			$('#patient_blood_group').html("Blood Group : " + patient.blood_group);
			$('#patient_phone').html("Mobile : " + patient.phone);
			$('#patient_email').html("Email : " + patient.patient_email);
			$('#patient_address').html(patient.address);
		}
	});
	
	// patient id autocomplete..... //

	/*serch tab's contents */

	/*making the patient type autocomplete.*/
	$("#patient_id_search").autocomplete({
		// source: [{label : "Anik Hasan" , value : "anik"}, {label : 'Dipankar Chaki Joy' , value : "joy"} , {label : "Fahim Al Hasnaeen" , value : "fahim"}]
		source : function(request, response) {
			$.ajax({
				url : "doctor/patients",
				type : "post",
				data : {
					key : request.term
				},
				success : function(data) {
					obj = jQuery.parseJSON(data);
					response($.map(obj, function(item) {
						return {
							Name : item.Name,
							label : item.Name + " " + item.address  + item.phone,
							value : item.id
						}
					}));
				}
			});
		},

		select : function(event, ui) {
			$('#pat_name').html("<label > Patient Name : " + ui.item.Name + "</label>");
		}
	});
	/* patient's type autocomplete */

	/*patient's disease type autocomplete */
	$('#disease_type_search').tagit({
		tagSource : function(request, response) {
			$.ajax({
				url : "doctor/disease_types",
				type : "post",
				data : {
					key : request.term
				},
				success : function(data) {
					obj = jQuery.parseJSON(data);
					response($.map(obj, function(item) {
						return {
							label : item.name,
							value : item.name
						}
					}));
				}
			});
		}
	});

	/*patient's disease type autocomplete */

	$('#tabs').tabs({
	});
	
	
	
});

