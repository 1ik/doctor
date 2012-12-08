
<div class="container_16">
	
	<link href='http://fonts.googleapis.com/css?family=Scada' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url(); ?>assets/css/custom/about.css' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Inder' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Gentium+Book+Basic' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?php echo site_url('assets/js/plugins/jquery.expander.min.js');  ?>"></script>
	<script type="text/javascript">
		$(function() {
			$("#tabs").tabs({
				active : 1,	
			});
		});

		
		$('#pat').click(function(){
			alert('hello');
		});

	</script>
	
	<script type="text/javascript">
	
		$.expander.defaults.slicePoint = 120;
		
		$(document).ready(function() {
			$('.fact_text').expander({
				slicePoint : 80, // default is 100
				expandText : '....Read More', // default is 'read more'
				collapseTimer : 8000, // re-collapses after 5 seconds; default is 0, so no re-collapsing
				userCollapseText : '....Read Less', // default is 'read less'
				moreClass: 'read-more',
  				lessClass: 'read-less'
			});
			
		});
		
	</script>
	
	
	<style type="text/css">
		.tab_text{
			margin-right: 15px;
		}
		
		#tabs{
			margin-top: 10px;
			margin-bottom: 30px;
		}
		
		
		
		.first_tab{
			margin-top:30px;
		}
		
		#tabs img{
			padding:5px;
			background-color: #fff;
			box-shadow: 0 2px 6px rgba(0, 0, 0, .2);
			-webkit-background-clip: padding;
			-moz-background-clip: padding;     
			background-clip: padding-box;
			border: 10px solid #fff;
			border: 10px solid rgba(255, 255, 255, 0.9);
			outline: none;
			margin-bottom: 40px;
		}
		
		.fact_title{
			font-family: 'Inder', sans-serif;
			color: #777777;
		}
		
		.fact_text{
			font-family: 'Gentium Book Basic', serif;
			font-size: 13px;
			padding-bottom:10px;
			border-bottom: 1px dotted black;	
		}
		
		.fact_title{
			margin:0;
			padding:0;
		}
		
		.read-more a{
			color: #1d75d6;
		}
		
		.read-less a{
			color: #1d75d6;
		}
		
		
	</style>
	
	
	
	
	<div class="container_24">
		<div class="grid_24" id="about_heading">
			<h2 style="font-family: 'Scada', sans-serif;">Why Should You Use This Application?</h2>
			
			<div id="tabs" class="grid_24">
			    <ul>
			        <li><a href="#doctor">Doctors</a></li>
			        <li id="pat"><a href="#patient">Patients</a></li>

			    </ul>
			    
			    <div id="doctor">
			    	<div class="grid_10 tab_text">
			    		
			    		<div class="grid_9 fact first_tab ">
			    			<h3 class="fact_title"> sit amet et sem. Aenean fermentum pe</h3>
			    			<p class="fact_text"> Maecenas sed enim ac ligula rutrum elementum sit amet et sem. Aenean fermentum pellentesque eleifend. Integer feugiat, mauris ut blandit congue, lectus ipsum tristique augue, non consectetur turpis nibh id est. Cras blandit, quam convallis ornare lacinia, libero magna adipiscing erat, sit amet porta magna leo ac ante. Mauris iaculis quam et orci placerat ut bibendum nunc porta. Aliquam aliquet, felis q </p>
			    		</div>
			    		
			    		<div class="grid_9 fact ">
			    			<h3 class="fact_title"> ligula rutrum elementum sit a</h3>
			    			<p class="fact_text"> Maecenas sed enim ac ligula rutrum elementum sit amet et sem. Aenean fermentum pellentesque eleifend. Integer feugiat, mauris ut blandit congue, lectus ipsum tristique augue, non consectetur turpis nibh id est. Cras blandit, quam convallis ornare lacinia, libero magna adipiscing erat, sit amet porta magna leo ac ante. Mauris iaculis quam et orci placerat ut bibendum nunc porta. Aliquam aliquet, felis q </p>
			    		</div>
			    		
			    		<div class="grid_9 fact">
			    			<h3 class="fact_title"> et et sem. Aenean fermentum pell</h3>
			    			<p class="fact_text"> Maecenas sed enim ac ligula rutrum elementum sit amet et sem. Aenean fermentum pellentesque eleifend. Integer feugiat, mauris ut blandit congue, lectus ipsum tristique augue, non consectetur turpis nibh id est. Cras blandit, quam convallis ornare lacinia, libero magna adipiscing erat, sit amet porta magna leo ac ante. Mauris iaculis quam et orci placerat ut bibendum nunc porta. Aliquam aliquet, felis q </p>
			    		</div>
			    		
			    		<div class="grid_9 fact">
			    			<h3 class="fact_title"> rutrum elementum sit amet et sem. Ae</h3>
			    			<p class="fact_text"> Maecenas sed enim ac ligula rutrum elementum sit amet et sem. Aenean fermentum pellentesque eleifend. Integer feugiat, mauris ut blandit congue, lectus ipsum tristique augue, non consectetur turpis nibh id est. Cras blandit, quam convallis ornare lacinia, libero magna adipiscing erat, sit amet porta magna leo ac ante. Mauris iaculis quam et orci placerat ut bibendum nunc porta. Aliquam aliquet, felis q</p>
			    		</div>
			    		
			    		<div class="grid_9 fact">
			    			<h3 class="fact_title">nas sed enim ac ligula rut</h3>
			    			<p class="fact_text"> Maecenas sed enim ac ligula rutrum elementum sit amet et sem. Aenean fermentum pellentesque eleifend. Integer feugiat, mauris ut blandit congue, lectus ipsum tristique augue, non consectetur turpis nibh id est. Cras blandit, quam convallis ornare lacinia, libero magna adipiscing erat, sit amet porta magna leo ac ante. Mauris iaculis quam et orci placerat ut bibendum nunc porta. Aliquam aliquet, felis q </p>
			    		</div>
			    	</div>
			    	
			    	<div class="grid_12 tab_image">
			    		<img src="<?php echo site_url('assets/imgs/about/doctors_prescripton.jpg'); ?>" />
			    	</div>
			    	
			    </div>
			    
			    
			    
			    <div id="patient">
			    	
			        <div class="grid_10 tab_text">
			        	<div class="grid_9 fact first_tab ">
			    			<h3 class="fact_title"> sit amet et sem. Aenean fermentum pe</h3>
			    			<p class="fact_text"> Maecenas sed enim ac ligula rutrum elementum sit amet et sem. Aenean fermentum pellentesque eleifend. Integer feugiat, mauris ut blandit congue, lectus ipsum tristique augue, non consectetur turpis nibh id est. Cras blandit, quam convallis ornare lacinia, libero magna adipiscing erat, sit amet porta magna leo ac ante. Mauris iaculis quam et orci placerat ut bibendum nunc porta. Aliquam aliquet, felis q </p>
			    		</div>
			    		
			    		<div class="grid_9 fact">
			    			<h3 class="fact_title"> et et sem. Aenean fermentum pell</h3>
			    			<p class="fact_text"> Maecenas sed enim ac ligula rutrum elementum sit amet et sem. Aenean fermentum pellentesque eleifend. Integer feugiat, mauris ut blandit congue, lectus ipsum tristique augue, non consectetur turpis nibh id est. Cras blandit, quam convallis ornare lacinia, libero magna adipiscing erat, sit amet porta magna leo ac ante. Mauris iaculis quam et orci placerat ut bibendum nunc porta. Aliquam aliquet, felis q </p>
			    		</div>

			    		<div class="grid_9 fact">
			    			<h3 class="fact_title"> rutrum elementum sit amet et sem. Ae</h3>
			    			<p class="fact_text"> Maecenas sed enim ac ligula rutrum elementum sit amet et sem. Aenean fermentum pellentesque eleifend. Integer feugiat, mauris ut blandit congue, lectus ipsum tristique augue, non consectetur turpis nibh id est. Cras blandit, quam convallis ornare lacinia, libero magna adipiscing erat, sit amet porta magna leo ac ante. Mauris iaculis quam et orci placerat ut bibendum nunc porta. Aliquam aliquet, felis q</p>
			    		</div>
			    		
			    		
			        </div>
			        
			        <div class="grid_12 tab_image">
			    		<img src="<?php echo site_url('assets/imgs/about/patient_page.jpg'); ?>" />
			    	</div>
			        
			    </div>
			</div>
						
			
		</div>
	</div>
	
	
</div>
