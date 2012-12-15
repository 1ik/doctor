<?php

/**
 * Handles adding new users, deleting user, updating user, etc..
 *
 * @author insane
 */
class Auth_model extends CI_Model {

    //put your code here
    private $salt;

    function __construct() {
        parent::__construct();
        $this->salt = 'sd!A09.3Dnn4524fHGgK23NV&6%$&.>WV';
    }

    function add_user() {
        $signup_data = $this->input->post();
        $this->load->library('form_validation');
        if ($this->form_validation->RUN('signup') == TRUE) {
            //do the job
            $cred = $this->input->post();
            $data['patient_email'] = $cred['email'];
            $data['patient_pass'] = $cred['pass'];
            $data['name'] = $cred['username'];
            return $this->db->insert('patients', $data);
        } else {
            return false;
        }
    }

    function authenticate() {
        $this->load->library('form_validation');
        if ($this->form_validation->RUN('login') == TRUE) {
            $login_data = $this->input->post();
            $prefix = $login_data['as'] . '_';
            $data[$prefix . 'email'] = $login_data['login_email'];
            $data[$prefix . 'pass'] = $login_data['login_pass'];
            $this->db->where($data);
            $query = $this->db->get($login_data["as"] . 's');
            return $query->num_rows > 0;
        }
    }

    function get_id($email, $type) {
        if ($type == 'patient') {
            $this->db->select('patient_id');
            $this->db->where('patient_email', $email);
            $query = $this->db->get('patients');
            $row = $query->row();
            return $row->patient_id;
        } else {
            $this->db->select('doctor_id');
            $this->db->where('doctor_email', $email);
            $query = $this->db->get('doctors');
            $row = $query->row();
            return $row->doctor_id;
        }
    }

}

?>
