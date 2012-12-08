
$(document).ready(function(){
	$('#signupform').submit(function(){

		var s = document.getElementById('uname');
		var v = document.getElementById('email');
		return true;;
	});
});


function available(email) {
	
	if(check_empty(email) == false){
		return false;
	}
	
	if(valid_email(email) == false){
		return false;
	}
	
	$.ajax({
		type : "POST",
		url : "auth/check_email",
		data : "email=" + $('#email').val(),
		success : function(data) {
			if(data== '1'){
				invalid(email);
				email.setCustomValidity('This email address is not available');
				return false;
			}else{
				valid(email);
				email.setCustomValidity('');
				return true;
			}
		}
	});
}



//checks for valid age..

function valid_age(input){
	if(check_empty(input)){
	var pattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
		if(pattern.test($(input).val())){
			valid(input);
			input.setCustomValidity('');
		}else{
			invalid(input);
			input.setCustomValidity('enter valid email address');
			return false;
		}
	}
}

//checks a field is empty or not
function check_empty(input){
	if(input.value===""){
		
		invalid(input);
		input.setCustomValidity('This field is required');
		return false;
	}else{
		valid(input);
		input.setCustomValidity('');
		return true;
	}
}



//checking for valid email...
function valid_email(input){
	var pattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
	if(pattern.test($(input).val())){
		checking(input);
		input.setCustomValidity('Checking for availability');
		return true;
	}else{
		invalid(input);
		input.setCustomValidity('enter valid email address');
		return false;
	}
}





function invalid(input){
	$(input).removeClass();
	$(input).addClass('invalid');
	var prop = {'background' : 'url(http://localhost/Doctors_project/assets/images/form/cross.png) 225px no-repeat'};
	$(input).css(prop);
}

function valid(input){
	$(input).removeClass();
	$(input).addClass('valid');
	var prop = {'background' : 'url(http://localhost/Doctors_project/assets/images/form/tick.png) 225px no-repeat'};
	$(input).css(prop);
}

function checking(input){
	$(input).removeClass();
	$(input).addClass('checking');
	var prop = {'background' : 'url(http://localhost/Doctors_project/assets/images/form/loader.gif) 225px no-repeat'};
	$(input).css(prop);
}


function checkmatch(input){
	var s = document.getElementById('pass2');
	if($('#pass1').val() != $('#pass2').val()){
		s.setCustomValidity("passowrd didn't match");
	}else{
		s.setCustomValidity("");
		
	}
}



