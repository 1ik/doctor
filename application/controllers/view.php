<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of view
 *
 * @author insane
 */
class View extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function about() {
        $this->_load_view('about');
    }
    
    function peoples(){
        $this->_load_view('peoples');
    }
    
    
    function _load_view($page, $data = array()) {
        $captcha = get_spam_check();
        $data['captcha_question'] = $captcha[0];
        $this->load->view('template/header', $data);
        $this->load->view($page);
        $this->load->view('template/footer', $data);
    }
    
}


?>
