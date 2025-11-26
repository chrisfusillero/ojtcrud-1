<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_users()
    {
        $this->db->where('valid', 1);
        $query = $this->db->get('crud');
        return $query->result_array();
    }

    public function getdata()
    {
        $this->db->where('valid', 1);
        $query = $this->db->get('crud');
        return $query->result_array();
    }

    public function get_valid_records()
    {
        $this->db->where('valid', 1);
        $query = $this->db->get('crud');
        return $query->result();
    }

    public function edit_data($id)
    {
        $this->db->where('id', $id);
        $q = $this->db->get('crud');
        return $q->row_array();
    }

    
    public function get_data_by_id($id)
    {
        return $this->edit_data($id);
    }

  public function update_data($data)
{
    if (empty($data['id'])) {
        return false; 
    }

    $update_fields = [
        'firstname' => $data['firstname'] ?? null,
        'lastname'  => $data['lastname'] ?? null,
        'username'  => $data['username'] ?? null,
        'address'   => $data['address'] ?? null,
        'email'     => $data['email'] ?? null
    ];

    $this->db->where('id', $data['id']);
    $this->db->update('crud', $update_fields);

    return ($this->db->affected_rows() >= 0);
}


    public function soft_delete_data($id)
    {
        $this->db->where('id', $id)->update('crud', ['valid' => 0]);
        return $this->db->affected_rows();
    }


    public function get_user_by_username($username) {
    $this->db->where('username', $username);
    $query = $this->db->get('crud');
    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return null;
    }
}

    public function get_admin_by_id($id) {

        return $this->$db->where('id', $id)->row_array();
    }

    public function update_admin_profile($id, $data) {

        $update_fields = [
            'firstname' => $data['firstname'] ?? null,
            'lastname'  => $data['lastname'] ?? null,
            'username'  => $data['username'] ?? null,
            'email'     => $data['email'] ?? null,
            'address'   => $data['address'] ?? null
        ];

        $this->db->where('id', $id);
        $this->db->update('crud', $update_fields);

        return ($this->db->affected_rows() >= 1);
    }
    

 
}