/**
 * @author insane
 */

$(document).ready(function() {
	
	$('#PersonTableContainer').jtable({
		title : 'Table of people',
		actions : {
			listAction : 'doctor/prescription',
			createAction : 'doctor/add_entry',
			updateAction : 'doctor/update_entry',
			deleteAction : 'doctor/delete_entry'
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
				width : '40%'
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
			}
		}
	});

	$('#PersonTableContainer').jtable('load');
});




 