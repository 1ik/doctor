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
        $this->load->model('medicine_model');
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
                    "patient_name" => "Anik Hasan",
                    "prescription_id" => 2,
                    "prescription_title" => "prescription for fever",
                    "date" => '2-12-2012',
                    "types" => array('cancer', 'fever')),
                array(
                    "patient_name" => "Anik Hasan",
                    "prescription_id" => 4,
                    "prescription_title" => "prescription for Headache",
                    "date" => '2-12-2012',
                    "types" => array('cancer', 'tumor')),
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

    function add_prescription() {
        $prescripton_data = $this->input->post("prescription_data");
        $data = json_decode($prescripton_data);
        $title = $data->title;
        $patient_id = $data->id;
        $this->load->model("doctor_model");
        $prescription_id = $this->doctor_model->add_prescription($this->session->userdata('id'), $patient_id, $title);
        $tags = $data->tagList;
        $this->doctor_model->add_tags($tags, $prescription_id);
        echo $prescription_id;
    }

    function medicineList() {
//        $result = mysql_query("SELECT * FROM people;");
//
//        //Add all records to an array
//        $rows = array();
//        while ($row = mysql_fetch_array($result)) {
//            $rows[] = $row;
//        }
//
//        //Return result to jTable
//        $jTableResult = array();
//        $jTableResult['Result'] = "OK";
//        $jTableResult['Records'] = $rows;
//        print json_encode($jTableResult);
        $medicine_list = $this->medicine_model->get_all_medicines();
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $medicine_list;
        print json_encode($jTableResult);
    }

    function add_medicine() {
        $medicine_list = $this->medicine_model->add_medicine_to_prescription();
        $jTableResult['Result'] = "OK";
        $jTableResult['Record'] = $medicine_list;
        print json_encode($jTableResult);
    }

    function update_medicine() {
        $jTableResult = array();
        if ($this->medicine_model->update_medicine_information()) {
            $jTableResult['Result'] = "OK";
        } else {
            $jTableResult['Result'] = "ERROR";
        }
        print json_encode($jTableResult);
    }
    
    
    function delete_medicine() {
        //Delete from database
//        $result = mysql_query("DELETE FROM people WHERE PersonId = " . $_POST["PersonId"] . ";");
        //Return result to jTable
        $jTableResult = array();
        if($this->medicine_model->delete_medicine_from_prescription()){
            $jTableResult['Result'] = "OK";
        }else{
            $jTableResult['Result'] = "ERROR";
        }
        
        print json_encode($jTableResult);
    }

}

?>
