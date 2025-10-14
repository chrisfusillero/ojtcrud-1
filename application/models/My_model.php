<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // You can load database library or other resources here if needed
        // $this->load->database();
    }

    

    public function insert_data($data)
    {

        // echo print_r($data);exit;
        return $this->db->insert('crud', $data);
    }


    public function soft_delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->update('crud', ['valid' => 0]);

        return $this->db->affected_rows();
    }

    public function get_valid_records() {
        $this->db->where('valid', 1);
        $query = $this->db->get('crud');
        return $query->result();
    }




    public function edit_data($id)
    {
        $this->db->select('*');
        $this->db->from('crud');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_single_record($id) {

        return $this->db->get_where('crud', ['id' => $id])->row_array();
    }

    public function get_record_by_id($id)
{
    return $this->db->get_where('crud', ['id' => $id])->row_array();
}


    public function get_single_data($id)
    {
        $this->db->select('*');
        $this->db->from('crud');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_user_data($id)
    {
        $this->db->where('id', $id);    
        $query = $this->db->get('crud'); 

        return $query->row_array(); 
    }

    public function update_data($data)
    {
        $this->db->trans_start();
        $this->db->where('id', $data['id']);
        $this->db->set('address', $data['address']);
        $this->db->set('firstname', $data['firstname']);
        $this->db->set('lastname', $data['lastname']);
        $this->db->set('email', $data['email']);
        $this->db->update('crud');

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {  
            return false; // generate an error. . or use the log_message() function to log your error
        }

        return true;
    }


    public function update_record($id, $data) {
    $this->db->where('id', $id);
    $this->db->update('crud', $data);
}
    public function get_users()
    {
         $this->db->select('*');     
        $this->db->from('crud AS a');
        $this->db->where('a.valid', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdata()
    {

        $this->db->select('*');     
        $this->db->from('crud AS a');
        $this->db->where('a.valid', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_user_by_username($username) 
    {
    $this->db->where('username', $username);
    $query = $this->db->get('crud'); 

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return null;
    }
}

    public function calculate($expression) {
    
    $expression = preg_replace('/[^0-9+\-*\/().]/', '', $expression);

    try {
        
        $result = eval('return ' . $expression . ';');

        if ($result === null) {
            throw new Exception("Invalid Expression");
        }

        return $result;
    } catch (Exception $e) {
        return "Error";
    }
}



}
    


    

