<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>index</title>
		<meta name="author" content="insane" />
		<!-- Date: 2012-12-04 -->
		<script type="text/javascript" src="<?php echo site_url('assets/js/plugins/jquery_core/jquery-1.8.3.min.js'); ?>" ></script>
		<!--jQuery UI libraries-->
		<link rel="stylesheet" media="screen" href="<?php echo site_url('assets/plugins/jquery_ui/jquery-ui-1.9.2.custom.min.css'); ?>" />
		<script type="text/javascript" src="<?php echo site_url('assets/plugins/jquery_ui/jquery-ui-1.9.2.custom.min.js'); ?>"></script>
		<!--jQuery UI libraries-->

		<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/css/frameworks/960Gs/code/css/min/960_24_col.css" />
		<link href='http://fonts.googleapis.com/css?family=Trocchi' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" media="screen" href="<?php  echo base_url(); ?>assets/css/custom/doctor/style.css" />

		<script type="text/javascript" src="<?php echo site_url('assets/js/custom/doctor/tab_content.js'); ?>"></script>

		<script type="text/javascript" src="<?php echo site_url('assets/plugins/tag/tagit.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/plugins/tag/tagit-simple-grey.css'); ?>" />

		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/json2/20110223/json2.js"></script>

		<!-- <link href="http://localhost/ci_jtable/assets/plugins/jtable/scripts/jtable/themes/standard/blue/jtable_blue.css" rel="stylesheet" type="text/css" /> -->
		
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/plugins/jtable/themes/lightcolor/jtable_lightcolor_base.css'); ?>" /> -->
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/plugins/jtable/themes/lightcolor/gray/jtable.css'); ?>" />
		<script src="http://localhost/ci_jtable/assets/plugins/jtable/scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/js/custom/doctor/prescription.js'); ?>"></script>

	</head>
	<body>
		<div class="container_24">
			<div class=" heading ">
				<ul id="links">
					<li>
						<?php echo anchor('auth/user_logout','sign out') ?>
					</li>
					<li>
						Notices
					</li>
					<li>
						doctor@domain.com (Mr. Joker)
					</li>
				</ul>
			</div>

			<div class="grid_24 main_content">
				<div id="tabs" class="grid_24">
					<ul>
						<li>
							<a href="#tab0">Prescription</a>
						</li>
						<li>
							<a href="#tab1"> Medicines & Tests </a>
						</li>
						<li>
							<a href="#tab2">Account</a>
						</li>

						<li>
							<a href="#tab3">Patient History</a>
						</li>
					</ul>

					<div id="tab0">
						<div class="selection container_24">
							
							<div class="grid_22">
								<div class="grid_5" id="select_patient" >
									<label>Search By Patient Name :</label>
									<br/>
									<input class="ui-autocomplete-input" placeholder="Patient ID" type="text" id="patient_id" size="10" />
									<br />
								</div>
								
								<div class="grid_15" id="prescription_title_div">
									<label>Prescription Title : </label> <br />
									<input type="text" id="prescription_title" class="" name = "prescription_title" size="50" />
								</div>
							</div>
							
							<div class="grid_22" id="disease_type_div">
								<label> Disease Types : </label>
								<ul id="disease_type" data-name="disease_type"> </ul>
							</div>
							
							<div class="grid_23" id="input_type_div">
								<input type="button" name="submit" id="submit" value="" />
							</div>
							
							<div class="grid_24" id="profile_and_prescription_div">
								<div class="grid_16" id="prescription_div">
									sdf
									<div id="PeopleTableContainer" style="width: 600px;"></div>
								</div>
								
								<div class="grid_7" id="profile_div" style="border: 2px dashed green">
									sdf
								</div>


							</div>
				
						</div>

					</div>

					<div id="tab1">

					</div>

					<div id="tab2">

					</div>

					<div id="tab3">

						<div id="tab3contents">
							<div id="search_control">
								<fieldset>
									<legend>
										Having :
									</legend>

									<label> Medicines : </label>
									<input type="id" id="medicine_name_having"  />
									<br/>
									<label> Tests : </label>
									<input type="id" id="test_name_having"  />
								</fieldset>

								<fieldset>
									<legend>
										Not Having :
									</legend>

									<label> Medicines : </label>
									<input type="id" id="medicine_name_not_having" />
									<br />
									<label> Tests : </label>
									<input type="id" id="test_name_not_having"  />
								</fieldset>

								<input type="id" id="test_name" placeholder="tests" />

								<ul id="disease_type_search" data-name="disease_type_search"></ul>

								<input type="button" value="show prescriptions" id="find_prescription" />
							</div>

							<div id="search_person_info" >
								<input type="text" id="patient_id_search" placeholder="Patient name" />

							</div>

						</div>
						<!--tab3 contents end -->

					</div>
				</div>

			</div>
		</div>
	</body>
</html>

