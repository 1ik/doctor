<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of patient
 *
 * @author insane
 */
class Patient extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->view('doctor/home');
    }
    
}

?>
