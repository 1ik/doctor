<?php

$config = array(
	'login' => array(
		array ('field' => 'login_email' , 'label' => 'User email', 'rules' => 'required|xss_clean'),
		array ('field' => 'login_pass' , 'label' => 'User Password', 'rules' => 'required')
	),
    
	'signup' => array(
            array ('field' => 'username' , 'label' => 'User Name', 'rules' => 'required|xss_clean|max_length[90]'),
            array ('field' => 'email' , 'label' => 'Email address', 'rules' => 'required|xss_clean|max_length[90]|valid_email|is_unique[patients.patient_email]'),
            array ('field' => 'pass' , 'label' => 'Password', 'rules' => 'required|max_length[25]'),
            array ('field' => 'pass2' , 'label' => 'Confirm Password', 'rules' => 'required|matches[pass]')
        )
);
