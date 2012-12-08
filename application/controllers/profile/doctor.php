<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of doctor
 *
 * @author insane
 */
class Doctor extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('doctor_model');
    }

    function index() {
        $this->load->view('doctor/home');
    }

    function dump($exp) {
        var_dump($exp);
        die;
    }
    

    function get_prescription() {
        if ($this->input->post()) {
            $json_data = $this->input->post("info");
            $data = json_decode($json_data);
//            echo $data->patient_id;
            $prescription_data = array(
                array(
                    "patient_name" => "Anik Hasan" , 
                    "prescription_id" => 2 , 
                    "prescription_title" => "prescription for fever" , 
                    "date" => '2-12-2012',
                    "types" => array('cancer' , 'fever')),
                array(
                    "patient_name" => "Anik Hasan" , 
                    "prescription_id" => 4 , 
                    "prescription_title" => "prescription for Headache" , 
                    "date" => '2-12-2012',
                    "types" => array('cancer' , 'tumor')),
            );
            echo (json_encode($prescription_data));
        }
    }
    
    
    /**
     * Gets the  
     */
    function patients() {
        if ($this->input->post()) {
            $key = $this->input->post("key");
            $patient_list = $this->doctor_model->get_patient_autocomplete($key);
            echo json_encode($patient_list);
        } else {
            show_404();
        }
    }

    function disease_types() {
        if ($this->input->post()) {
            $key = $this->input->post("key");
            $type = $this->doctor_model->get_type_autocomplete($key);
            echo json_encode($type);
        }
    }

    function load_prescription() {
        echo 'This is application form';
    }

    function load_medicine_test() {
        echo 'This is medical test form';
    }

    function load_account() {
        echo 'This is account form';
    }

    function prescription() {
        $this->load->model('doctor_model');
        $result = $this->doctor_model->get_all_people();
        echo json_encode($result);
    }

    function update_entry() {
        
    }

    function delete_entry() {
        
    }

    function delete_patient() {
        
    }

    function add_entry() {
        
    }

}

?>
