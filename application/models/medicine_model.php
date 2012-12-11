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
    
    
    function get_all_medicines( $medicine_id = ''){
        $this->db->select('*');
        if($medicine_id != ''){
            $this->db->where('PersonId' , $medicine_id);
        }
        $result = $this->db->get('people');
        return $result->result_array();
    }
    
    function update_medicine_information(){
        $data['Age'] = $this->input->post("Age");
        $data['pokpok'] = $this->input->post("pokpok");
        $data['Name'] = $this->input->post("Name");
        $this->db->where('PersonId',  $this->input->post('PersonId'));
        $this->db->update('people', $data);
        return true;
    }
    
    function delete_medicine_from_prescription() {
        
        $this->db->where('PersonId', $this->input->post('PersonId'));
        $this->db->delete('people');
        return true;
    }
    
    
    
    function add_medicine_to_prescription(){
        $result = mysql_query("INSERT INTO people(Name, pokpok, Age, RecordDate) VALUES('" . $_POST["Name"] . "', '".$_POST["pokpok"]."'  , " . $_POST["Age"] . ",now());");
        $result = mysql_query("SELECT * FROM people WHERE PersonId = LAST_INSERT_ID();");
        $row = mysql_fetch_array($result);
        return $row;
    }
}

?>
