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

        $this->db->select("patient_id as id, name AS Name, address, phone");
        $this->db->like('name', $key);

        $query = $this->db->get('patients')->result_array();
        return $query;
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
    function decorate($k){
	    return "'".$k."'";
	    
    }
    
    
    function get_prescription( $patient_id, $type){	    	    
		    $data = array();
	    foreach ($type as $key => $value) {
			    $data[] = $this->decorate($value);
			    
	    }
	    
	    $exp = implode(",", $data);
	    
//	    return $type;
//	   $query = $this->db->query(
//	   	    
//			'SELECT pat.name as patient_name, p.prescription_id, p.pres_date, type.name as type
//			FROM prescription AS p
//			JOIN prescription_type AS pt ON p.prescription_id = pt.prescription_id
//			JOIN patients AS pat ON p.patient_id = pat.patient_id
//			JOIN TYPE ON pt.type_id = type.type_id
//			WHERE pt.type_id
//			IN (
//
//			SELECT type_id
//			FROM TYPE WHERE name in  ("'.$type.'")
//			)
//			AND pat.patient_id =  '.$patient_id.'
//			LIMIT 0 , 30');

	   

	    
	    
	    
$sql = "SELECT pat.name as patient_name, p.prescription_id, p.pres_date, type.name as type
			FROM prescription AS p
			JOIN prescription_type AS pt ON p.prescription_id = pt.prescription_id
			JOIN patients AS pat ON p.patient_id = pat.patient_id
			JOIN TYPE ON pt.type_id = type.type_id
			WHERE pt.type_id
			IN (

			SELECT type_id
			FROM TYPE WHERE name in (".$exp.")
			)
			AND pat.patient_id =  '6'
			LIMIT 0 , 30";

	   
	   $query = $this->db->query($sql);
	   $b = $query->result_array();
	   
	   
	   return $b;
	   
    }
    
    function hack($t){
	    var_dump($t);
    }
    
    
    function make_string( $type){
	    	    
	    $string = implode(", ", $type);
	    return $string;
    }    
}

?>
