<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
<html>
	<head>
		<!-- loading scripts -->
		<!-- loading plugins... -->
		<script type="text/javascript" src="<?php  echo base_url();?>assets/js/plugins/jquery_core/jquery-1.8.3.min.js"></script>
		<!-- loading plugins... -->
		<!--loading custom scripts -->
		<script type="text/javascript" src="<?php  echo base_url();?>assets/js/custom/bodyslide.js"></script>
<!-- 		<script type="text/javascript" src="<?php  echo base_url();?>assets/js/custom/form/validation.js"></script> -->
		<!-- loading custom scripts -->
		<!-- loading scripts -->
		<!-- loading css -->
		<!--loading frameworks -->
		<link rel="stylesheet" media="screen" href="<?php  echo base_url();?>assets/css/frameworks/960Gs/code/css/min/960_24_col.css"  />
		<!--loading frameworks -->
		<!--loading custom css -->
		<link rel="stylesheet" media="screen" href="<?php  echo base_url();?>assets/css/custom/basic_style.css"  />
		<link rel="stylesheet" media="screen" href="<?php  echo base_url();?>assets/css/custom/form.css"  />
		<link rel="stylesheet" media="screen" href="<?php  echo base_url();?>assets/css/custom/home.css"  />
		<!--loading custom css -->
		
		<!--loading slideshow css -->
		<link rel="stylesheet" media="screen" href="<?php  echo base_url();?>assets/css/slideshow/jmpress.css"  />
		<!-- loading css -->
		

		
		<!--slideshow -->
				<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Slideshow with jmpress.js</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Slideshow with jmpress.js" />
        <meta name="keywords" content="jmpress, slideshow, container, plugin, jquery, css3" />
        <meta name="author" content="for Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
		<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/style_ie.css" />
		<![endif]-->
		<!-- jQuery -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<!-- jmpress plugin -->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jmpress.min.js"></script>
		<!-- jmslideshow plugin : extends the jmpress plugin -->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jmslideshow.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/modernizr.custom.48780.js"></script>
		<link rel="stylesheet" media="screen" href="<?php  echo base_url();?>assets/css/custom/basic_style.css"  />
		<noscript>
			<style>
			.step {
				width: 100%;
				position: relative;
			}
			.step:not(.active) {
				opacity: 1;
				filter: alpha(opacity=99);
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=99)";
			}
			.step:not(.active) a.jms-link{
				opacity: 1;
				margin-top: 40px;
			}
			</style>
		</noscript>
		
		<!--slideshow -->
		
		<?php if(validation_errors() != '' || isset($login_failed) || isset($captcha_error) ) { ?>
			<script type="text/javascript">
				$(document).ready(function(){
					window.slide();
				});
			</script>
		<?php } ?>
		
	</head>
		<body>
			
			
		<link href='http://fonts.googleapis.com/css?family=Share' rel='stylesheet' type='text/css'>
		<div id="hidden">
			<div class="container_24">
				<h1 id="hidden_title">We have taken a Step to make the relationship between
				<br/>
				your Doctor and Patients
				more closer in a smart and technical way. </h1>
				<div class="grid_7 signup ">
					<?php  echo form_open('auth/signup', array('name' => 'signup', 'method' => 'post', 'id' => 'signupform'));?>
					<legend>
						Join Us
					</legend>
					<ul>
						<li>
							<label class="<?php if(form_error('username') != '') echo 'form_error_label'  ?>" for="username">Username : (<span class="form_error_label">*required</span>) </label>
							<input class="" type="text" required="required" id="uname" name="username" placeholder="your full name" autocomplete="off" required="required" "/>
						</li>
						
						<li>
							<label class="<?php if(form_error('email') != '') echo 'form_error_label'  ?>"  for="email">Email : (<span class="form_error_label">*required</span>)</label>
							<input name="email" class="email" id="email" required="required" type="email" autocomplete="off" placeholder="somebody@example.com" onkeyup="available(this)"/>
						</li>
						<li>
							<label class="<?php if(form_error('pass') != '') echo 'form_error_label'  ?>" for="pass" >Password : (<span class="form_error_label">*required</span>)</label>
							<input name="pass" class="pass" id="pass1" autocomplete="off" type="password" required="required" onkeyup="checkmatch(this)" />
						</li>
						<li>
							<label class = "<?php if(form_error('pass2') != '') echo 'form_error_label' ?>"  for="pass2" >Confirm password : (<span class="form_error_label">*required</span>) </label>
							<input name="pass2" class="pass" id="pass2" type="password" autocomplete="off" required="required" onkeyup="checkmatch(this)" />
						</li>
						<li>
					<!--		4 + 5 = -->
							<span class="captcha_label "> 	<?php echo $captcha_question ; ?> </span>	
							<input name="captcha" size="5" />
						</li>
						<li>
							<input type="submit" id="submit" value="submit" />
						</li>
						<li>
							<span class="form_error_label">
							<?php
								echo validation_errors();	
								if(isset($captcha_error)){
									echo $captcha_error;
								}
							?>
							<span/>
						</li>
						
					</ul>
					<?php  echo form_close();?> <!-- end of signup form !-->
				</div>
				<!-- signup div ends -->
				
				
				
				
				<div class="grid_6 loginform">
					<?php  echo form_open('auth/user_login', array('id' => 'loginform', 'method' => 'post'));?>
					<legend>
						Already a Member?
					</legend>
					<li>
						<label for="login_email">Email : </label>
						<input type="text" class="email" id="login_email" name="login_email" autocomplete="off" required="required" />
					</li>
					<li>
						<label for="login_pass" > Password </label>
						<input class="pass" id="login_pass" autoomplete="off" type="password" name="login_pass" required="required"/>
					</li>
					
					<li>

						<span> Log in as :</span>
						<select name="as" id="as">
							<option value="patient">patient </option>
							<option value="doctor"> doctor</option>
						</select>

					</li>
					
					<li>
						<input type="submit" id="submit_blue" value="submit" />
					</li>
					<li>
						<span class= "form_error_label">
							
						<?php 
							if(isset($login_failed)){
								echo $login_failed;
							}
						 ?>
						 </span>
					</li>
					<?php echo form_close();?>
				</div>
				<!--end of login form -->
			</div>
			<!-- end of container_24 class -->
		</div>
		<!-- end of hidden div -->
		
		
		<div id="main_container" >
			<div class="container_24 head">
				<div class="grid_24 site_head">		
					<div class="site_head grid_8">
						<div class="signinup">
						<h4>	Login | signup  </h4>
						</div>
						<div class="grid_4" id="contact_us">
							<?php echo anchor('auth/contact_us' , 'Contact Us') ?> 
						</div>
					</div>
				</div>
			</div>
			<!-- End of Head -->
			
        <div class="container">
        	
 			<header>
				<h1>  <span>Online Prescription Management </span></h1>
				<h2>Make your Medical Life smooth and Easier</h2>
				<nav class="codrops-demos">
					<a href="<?php echo site_url("view/about"); ?>">About</a>
					<a class="current-demo" href="<?php echo base_url(); ?>">Welcome</a>
					<a href="<?php echo site_url("view/peoples") ?>">Peoples</a>
				</nav>
			</header>







