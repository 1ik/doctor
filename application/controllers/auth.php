<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth
 *
 * @author insane
 */
class Auth extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function index() {
        if($this->_logged_in('doctor')){
            redirect('profile/doctor');
        }else if($this->_logged_in('patient')){
            redirect('profile/patient');
        }
        $this->_load_view();
    }

    
    function signup() {
        if($this->input->post()){
            $captcha = $this->input->post('captcha');
            if(spam_check_answer($captcha)){
                $this->load->model('auth_model');
                if($this->auth_model->add_user() == true){
                    echo 'sign up successful';
                }else{
                    $this->_load_view();
                }
            }else{
                $data['captcha_error'] = 'You entered a wrong answer';
                $this->_load_view($data);
            }
        }else{
            $this->_load_view();
        }
    }
    
    

    
    function _load_view($data = array()) {
        $captcha = get_spam_check();
        $data['captcha_question'] = $captcha[0];
        $this->load->view('template/header', $data);
        $this->load->view('home');
        $this->load->view('template/footer', $data);
        
    }
    
    
    
    
    function user_login(){
        $this->load->model('auth_model');
        if($this->auth_model->authenticate()){
            $data['logged_in'] = TRUE;
            $data['as'] = $this->input->post('as');
            $this->session->set_userdata($data);
            redirect('');
        }else{
            $data['login_failed'] = "The email and password you provided, didn't match";
            $this->_load_view($data);
        }
    }
    
    function user_logout(){
        if($this->_logged_in()){
            $this->session->sess_destroy();
        }
        redirect('');
    }
    
    
    
    
    
    function _logged_in($as = '') {

        if ($as == '') {
            if ($this->session->userdata('logged_in') == TRUE) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            if ($this->session->userdata('logged_in') == TRUE AND $this->session->userdata('as') == $as) {
                return TRUE;
            }
        }
        return FALSE;
    }

}

?>
