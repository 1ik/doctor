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
    
    function ajax_medicinelist(){
        $data[] = array('medicine_name' => 'antazol' , 'company' => 'beximco' , 'power' => '25mg');
        $data[] = array('medicine_name' => 'alatrol' , 'company' => 'Acme' , 'power' => '65mg');
        $data[] = array('medicine_name' => 'antacid plus' , 'company' => 'beximco' , 'power' => '100mg');
        $data[] = array('medicine_name' => 'Napa' , 'company' => 'Orion' , 'power' => '30mg');
        $data[] = array('medicine_name' => 'Naprox' , 'company' => 'ACI' , 'power' => '500mg');
        echo json_encode($data);
        
    }






    /*WORKING!!*/
    function add_prescription() {
        return;
        if ($this->input->post()) {
            $tag_array = $this->input->post("tagList");
            $patient_id = $this->input->post("id");
            $prescription_title = $this->input->post("title");
            $this->load->model("doctor_model");
            $prescription_id = $this->doctor_model->add_prescription($this->session->userdata('id'), $patient_id, $prescription_title);
            $tags = $tag_array;
            $this->doctor_model->add_tags($tags, $prescription_id);
        }
    }
    
    function delete_prescription(){
        $prescription_id = $this->session->userdata('cur_prescip_id');
        //now clean datas in the table which are related to this prescription id.
        //Then delete the prescription which has this id in the prescription table.
        //then unset prescription related userdata from prescription..
        $data = array('cur_prescrip_id' , 'cur_patient_id');
        $this->session->unset_userdata($data);
        
        
    }
    
    /**
     * Gets the  
     */
    /*WORKING!!*/
    function patients() {
        if ($this->input->post()) {
            $key = $this->input->post("key");
            $patient_list = $this->doctor_model->get_patient_autocomplete($key);
            echo json_encode($patient_list);
        } else {
            show_404();
        }
    }
    
    /*WORKING!!*/
    function disease_types() {
        if ($this->input->post()) {
            $key = $this->input->post("key");
            $type = $this->doctor_model->get_type_autocomplete($key);
            echo json_encode($type);
        }
    }
    
      /**PREVIOUS WORKING VERSION OF PRESCRIPTION ADDING FUNCTION**/
//    function add_prescription() {
//        $prescripton_data = $this->input->post("prescription_data");
//        $data = json_decode($prescripton_data);
//        $title = $data->title;
//        $patient_id = $data->id;
//        $this->load->model("doctor_model");
//        $prescription_id = $this->doctor_model->add_prescription($this->session->userdata('id'), $patient_id, $title);
//        $tags = $data->tagList;
//        $this->doctor_model->add_tags($tags, $prescription_id);
//        $data['cur_patient_id'] = $patient_id;
//        $data['cur_prescip_id'] = $prescription_id;
//        $this->session->set_userdata($data);
//    }
    

    /*working demo of listing medicines...*/
   /* function medicineList() {
        $medicine_list = $this->medicine_model->get_all_medicines();
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $medicine_list;
        print json_encode($jTableResult);
    } */
    
    function medicineList(){
        $this->load->model('medicine_model');
        $prescription = array();
        $prescription["Result"] = "OK";
        $prescription["Records"] = $this->medicine_model->get_all_medicines();
        
//        print json_encode($prescription); <-- This should print data in the following printed format. go to get_all_medicines() to complete this function. make sure it is printing the data in the given format.

        echo '{"TotalRecordCount" : "4", "Result" : "OK", "Records":[
            {"medicine_name":"antazol","For":"Hachchi","Does":"2 times a week","Duration":"1 week","comment":"Stop having this if Hachchi is gone"},
            {"medicine_name":"Napa","For":"Fever and cough","Does":"morning day night before meal","Duration":"5 Days","comment":"Try to avoid it as much as possible"},
            {"medicine_name":"tofen","For":"pain in the ear","Does":"only at morning and day before meal","Duration":"2 comment","pokpok":"avoid this if you gas forms."},
            {"medicine_name":"alatrol","For":"Hachchi and hapani","Does":"before meal at night","Duration":"15 Days","comment":"if you feel pain in back, stop having this and contact me"}]}';
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

    
    function add_medicine() {
        $medicine_list = $this->medicine_model->add_medicine_to_prescription();
        $jTableResult['Result'] = "OK";
        $jTableResult['Record'] = $medicine_list;
        print json_encode($jTableResult);
    }
    
/**  working demo for jTable */
//    function update_medicine() {
//        $jTableResult = array();
//        if ($this->medicine_model->update_medicine_information()) {
//            $jTableResult['Result'] = "OK";
//        } else {
//            $jTableResult['Result'] = "ERROR";
//        }
//        print json_encode($jTableResult);
//    }
    
    
    function delete_medicine() {
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
