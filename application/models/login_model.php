<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function validate_login($email, $password)
    {
        $this->db->select('id, password');
        $this->db->from('crud');
        $this->db->where('email', $email);
        $this->db->where('valid', 1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $user = $query->row();

            if (password_verify($password, $user->password)) {
                $this->session->set_userdata('user_id', $user->id);
                return $user->id; 
            }
        }
        return false; 
    }

    public function get_user_data($user_id)
    {
        $this->db->select('firstname, lastname, address, email, username');
        $this->db->from('crud');
        $this->db->where('id', $user_id);
        $this->db->where('valid', 1);
        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->row_array() : false;
    }

    public function create_user($data)
{
    
    $insert_data = array( 
        'firstname' => $data['firstname'],
        'lastname'  => $data['lastname'],
        'username'  => $data['username'],
        'address'   => $data['address'],
        'email'     => $data['email'],
        'password'  => password_hash($data['password'], PASSWORD_DEFAULT),
        'user'      => $data['user'],   
        'valid'     => 1
    );

    $this->db->insert('crud', $insert_data);
    return $this->db->insert_id();
}

    public function is_email_available($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('crud');
        return ($query->num_rows() == 0);
    }

    public function check_login($email, $role)
{
    $this->db->where('email', $email);
    $this->db->where('user', $role); 
    $this->db->where('valid', 1);
    $query = $this->db->get('crud');

    return $query->row_array();
}

public function update_user_profile($data)
{
    $this->db->where('id', $data['id']);
    $this->db->update('crud', $data); 
    return $this->db->affected_rows();
}



}


