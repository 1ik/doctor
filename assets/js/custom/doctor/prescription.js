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
	
	

	$('#no_prescription_info').click(function() {

		$('#prescription_div_container').html('<div class="grid_15" id="prescription_div"> <div id="PeopleTableContainer" style="width: 600px;"></div> </div>');

		$('#PeopleTableContainer').jtable({
			title : 'Table of people',
			actions : {
				listAction : 'http://localhost/doctor/profile/doctor/medicineList',
				createAction : 'http://localhost/doctor/profile/doctor/add_medicine',
				updateAction : 'http://localhost/doctor/profile/doctor/update_medicine',
				deleteAction : 'http://localhost/doctor/profile/doctor/delete_medicine'
			},
			fields : {
				PersonId : {
					key : true,
					create : false,
					edit : false,
					list : false
				},
				Name : {
					title : 'Author Name',
					width : '20%'
				},
				Age : {
					title : 'Age',
					width : '20%'
				},
				RecordDate : {
					title : 'Record date',
					width : '30%',
					type : 'date',
					create : false,
					edit : false
				},
				pokpok : {
					title : 'Pok Pok',
					width : '30%'
				}
			}
		});

		//Load person list from server
		$('#PeopleTableContainer').jtable('load');

	});

	//Prepare jTable

	function give_title() {
		if ($('#prescription_title').val() == '') {
			return 'no title';
		} else {
			return $('#prescription_title').val();
		}
	}


	$('#submit').click(function() {

	});

	/*

	 $('#PeopleTableContainer').jtable({
	 title : give_title(),
	 actions : {
	 listAction : 'http://localhost/doctor/profile/doctor/medicineList',
	 createAction : 'http://localhost/doctor/profile/doctor/add_medicine',
	 updateAction : 'http://localhost/jtable/Codes/PersonActions.php?action=update',
	 deleteAction : 'http://localhost/jtable/Codes/PersonActions.php?action=delete'
	 },
	 fields : {
	 medicine_id : {
	 width : '4%',
	 title : "ID",
	 create : false,
	 key : true,
	 edit : false,
	 list : true
	 },
	 medicine_name : {
	 title : 'Medicine Name',
	 width : '15%',
	 input : function(data) {
	 if (data.record) {
	 return '<input name = "medicine_name" type="text" id="medicine_name" style="width:200px" value="' + data.record.medicine_name + '" />';
	 } else {
	 return '<input name = "medicine_name" type="text" style="width:200px" placeholder="enter your name here" />';
	 }
	 }
	 },
	 For : {
	 title : 'For',
	 width : '10%',
	 input : function(data) {
	 if (data.record) {
	 return '<input name = "medicine_for" type="text" id="medicine_for" style="width:200px" value="' + data.record.For + '" />';
	 } else {
	 return '<input name = "medicine_for" type="text" style="width:200px" placeholder="" />';
	 }
	 }
	 },
	 Dose : {
	 title : 'Dose',
	 width : '5%',
	 input : function(data) {
	 if (data.record) {
	 return '<input name = "medicine_dose" type="text" id="medicine_dose" style="width:200px" value="' + data.record.Dose + '" />';
	 } else {
	 return '<input name = "medicine_dose" type="text" style="width:200px" placeholder="e.g. 25mg" />';
	 }
	 }
	 },

	 Duration : {
	 title : 'Duration',
	 width : '5%',
	 input : function(data) {
	 if (data.record) {
	 return '<input name = "medicine_duration" type="text" id="medicine_duration" style="width:200px" value="' + data.record.Duration + '" />';
	 } else {
	 return '<input name = "medicine_duration" type="text" style="width:200px" placeholder="e.g. 4 days" />';
	 }
	 }
	 },

	 company : {
	 title : 'company',
	 width : '5%',
	 input : function(data) {
	 if (data.record) {
	 return '<input name = "medicine_company" type="text" id="medicine_company" style="width:200px" value="' + data.record.company + '" />';
	 } else {
	 return '<input name = "medicine_company" type="text" style="width:200px" placeholder="e.g. Beximco" />';
	 }
	 }
	 },
	 comment : {
	 title : 'Comment about medicine',
	 width : '7%',
	 type : 'textarea',
	 edit : true,
	 list : false,
	 display : false,
	 }	 }
	 });

	 //Load person list from server
	 $('#PeopleTableContainer').jtable('load');

	 // $('#PeopleTableContainer').jtable({
	 // title : give_title(),
	 // dialogShowEffect : 'bounce',
	 // actions : {
	 // listAction : 'http://localhost/doctor/profile/doctor/medicineList',
	 // createAction : 'http://localhost/ci_jtable/jtable/records',
	 // updateAction : 'http://localhost/jtable/Codes/PersonActions.php?action=update',
	 // deleteAction : 'http://localhost/jtable/Codes/PersonActions.php?action=delete'
	 // },
	 // fields : {
	 //

	 //

	 //
	 // company : {
	 // title : 'company',
	 // width : '5%',
	 // input : function(data) {
	 // if (data.record) {
	 // return '<input name = "medicine_company" type="text" id="medicine_company" style="width:200px" value="' + data.record.company + '" />';
	 // } else {
	 // return '<input name = "medicine_company" type="text" style="width:200px" placeholder="e.g. Beximco" />';
	 // }
	 // }
	 // },
	 //
	 // comment : {
	 // title : 'Comment about medicine',
	 // width : '7%',
	 // type : 'textarea',
	 // edit : true,
	 // list : false,
	 // display : false,
	 // }
	 // }
	 // });
	 //
	 // ('#PeopleTableContainer').jtable('load');	 */

});
