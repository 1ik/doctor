<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of medicine_model
 *
 * @author insane
 */
class Medicine_model extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function get_medicines($term){
        //please return the medicine name , company name, and power in an array ..
        //for demo.. see doctor controller's ajax_medicinelist function
    }






    function get_all_medicines( ) {
        $prescription_id = $this->session->userdata("cur_prescrip_id");
        
        //now return all the medicines that have this prescription id.
        //Then return the rows.
    }
    
    
    
    
/*working example of jTable list all people*/
//    function get_all_medicines($medicine_id = '') {
//        $this->db->select('*');
//        if ($medicine_id != '') {
//            $this->db->where('PersonId', $medicine_id);
//        }
//        $result = $this->db->get('people');
//        return $result->result_array();
//    }
    

    /* called from doctor controller'update_medicine() */

    function update_medicine_information() {
        // cur_patient_id
        //cur_prescrip_id
        $prescription_id = $this->session->userdata("cur_prescrip_id");
        //$data = $this->input->post();
        //available Post datas are : medicine_name,For,Does,Duration,comment
        //seperated by comma. Use exactly what is given, for example $data['For'] , $data['comment']
        // get the medicineid by medicine name from medicine table then update the row where medicine_id and prescription_id is = given ones.
        //good luck.
        return true;
    }

    function delete_medicine_from_prescription() {
        $prescription_id = $this->session->userdata('cur_prescrip_id');
        $medicine_name = $this->input->post('medicine_name');
        //get the medicine id from medicine table then delete prescribed_medicine row which has the given prescription_id and medicine_name.
        //good luck.
        //return false, if deletion fails.
        return true;
    }

    function add_medicine_to_prescription() {
        //Take , medicine_name,For,Does,Duration,comment from post array.
        //Remeber , that if you do $this->input->post('medicine_name') , you'll name in a format like, napa_25mg_beximco . So you've to seperate the names and insert in the indivisual coloumn.
        //Then find the medicine_id of the medicine Name.
        $prescription_id = $this->session->userdata('cur_prescrip_id');
        //use this prescription_id .
        
        //insert into the prescribed_medicine table.
        
        //use this example to insert.
        //please return the $row exactly how it is returned. No edik shedik.
//        $result = mysql_query("INSERT INTO people(Name, pokpok, Age, RecordDate) VALUES('" . $_POST["Name"] . "', '" . $_POST["pokpok"] . "'  , " . $_POST["Age"] . ",now());");
//        $result = mysql_query("SELECT * FROM people WHERE PersonId = LAST_INSERT_ID();");
        $row = mysql_fetch_array($result);
        return $row;
    }
    

    /* working demo of jTable delete */
//    function delete_medicine_from_prescription() {
//        
//        $this->db->where('PersonId', $this->input->post('PersonId'));
//        $this->db->delete('people');
//        return true;
//    }


    /* working demo of jTable addition. */
//    function add_medicine_to_prescription(){
//        $result = mysql_query("INSERT INTO people(Name, pokpok, Age, RecordDate) VALUES('" . $_POST["Name"] . "', '".$_POST["pokpok"]."'  , " . $_POST["Age"] . ",now());");
//        $result = mysql_query("SELECT * FROM people WHERE PersonId = LAST_INSERT_ID();");
//        $row = mysql_fetch_array($result);
//        return $row;
//    }
}

?>
