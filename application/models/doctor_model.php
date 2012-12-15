<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of doctor_model
 *
 * @author insane
 */
class Doctor_model extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function get_all_people() {
        $result = mysql_query("SELECT * FROM people;");

        //Add all records to an array
        $rows = array();
        while ($row = mysql_fetch_array($result)) {
            $rows[] = $row;
        }

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $rows;
        return $jTableResult;
    }

    /**
     * For the given key returns the list of patient in format, id, Name, address, phone
     * @param type input field from UI
     * @return type 
     */
    function get_patient_autocomplete($key) {
        $base_url = base_url() . 'assets/imgs/profile/patients/';
        $sql = "select patient_id as id, age, name as Name, address, patient_email, blood_group,  phone, CONCAT('" . $base_url . "' , image_url) as image_url from patients where name like '%" . $key . "%'";
        $query_result = $this->db->query($sql);
        $result_array = $query_result->result_array();
        return $result_array;
    }

    /**
     * For the given key, reutrns the list of types in the format id, name
     * @param type input field from the UI
     * @return type 
     */
    function get_type_autocomplete($key) {

        $this->db->select("type_id as id, name");
        $this->db->like('name', $key);

        $query = $this->db->get('type')->result_array();
        return $query;
    }

    function decorate($k) {
        return "'" . $k . "'";
    }

    function get_prescription($patient_id, $type) {
        $data = array();
        foreach ($type as $key => $value) {
            $data[] = $this->decorate($value);
        }

        $exp = implode(",", $data);
        $sql = "SELECT pat.name as patient_name, p.prescription_id, p.pres_date, type.name as type
			FROM prescription AS p
			JOIN prescription_type AS pt ON p.prescription_id = pt.prescription_id
			JOIN patients AS pat ON p.patient_id = pat.patient_id
			JOIN TYPE ON pt.type_id = type.type_id
			WHERE pt.type_id
			IN (

			SELECT type_id
			FROM TYPE WHERE name in (" . $exp . ")
			)
			AND pat.patient_id =  '6'
			LIMIT 0 , 30";
        $query = $this->db->query($sql);
        $b = $query->result_array();
        return $b;
    }

    function hack($t) {
        var_dump($t);
    }

    function make_string($type) {
        $string = implode(", ", $type);
        return $string;
    }

    /*WORKING!!!*/
    function add_prescription($doctor_id, $patient_id, $prescription_title) {
        $time = date('Y-m-d H:i:s');
        $data = array('doctor_id' => $doctor_id, 'patient_id' => $patient_id, 'title' => $prescription_title, 'pres_date' => $time);
        $this->db->insert('prescription', $data);
        return $this->db->insert_id();
    }
    
    /*WORKING!!!*/
    function add_tags($tags , $prescription_id){
        foreach ($tags as $tag ) {
            $sql = "INSERT INTO `doctors_project`.`prescription_type` (`prescription_id`, `type_id`, `description`) VALUES (".$prescription_id.", (SELECT type_id FROM type WHERE type.name = '".$tag."') , '');";
            $this->db->query($sql);
        }
    }

}

?>
