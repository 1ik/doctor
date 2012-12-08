$(document).ready(function(){
	window.slideDown = true;
	
	$('.signinup').click(function(){
		window.slide();
	});
	
	window.slide = function slide(){
		var animate;
		if(window.slideDown){
			animate = '+=560px';
			window.slideDown=false;
		}else{
			animate = '-=560px';
			window.slideDown=true;
		}
		
		$('#main_container').animate({
			marginTop : animate
		}, 200, function() {
			// Animation complete.
		});		
	}

	
	
	
});
