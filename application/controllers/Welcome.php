<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session', 'form_validation']);
        $this->load->model(['My_model', 'Login_model']);
    }

    public function index()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('AuthLogin');
            return;
        }

        $user_id = $this->session->userdata('user_id');
        $user_data = $this->Login_model->get_user_data($user_id);

        $data = [
            'firstname' => $user_data['firstname'] ?? '',
            'lastname'  => $user_data['lastname'] ?? '',
            'username'  => $user_data['username'] ?? '',
            'title'     => 'Welcome Page',
            'message'   => 'Welcome to your dashboard!'
        ];

        $this->load->view('welcome_message', $data);
    }

    public function delete($id)
    {
        if (!is_numeric($id)) {
            show_error('Invalid ID.');
            return;
        }

        $result = $this->My_model->soft_delete_data((int)$id);

        $this->session->set_flashdata('kyre', [
            'type' => $result ? 'success' : 'danger',
            'message' => $result ? 'Record deleted successfully.' : 'Failed to delete record.'
        ]);

        redirect('welcome/crud_details');
    }

    public function edit($username) {
    
    $this->load->model('My_model');

    
    $username = urldecode($username);

    
    $user = $this->My_model->get_user_by_username($username);

    
    if (!$user) {
        
        show_404(); 
        return;
    }

   
    $data['record'] = $user;
    $this->load->view('edit_view', $data);
}

    public function update($username) {
    
    $this->load->model('My_model');

    
    $username = urldecode($username);

    
    $user = $this->My_model->get_user_by_username($username);

    
    if (!$user) {
        
        show_404(); 
        return;
    }

    $id = $user['id'];

    
    $firstname = $this->input->post('firstname');
    $lastname = $this->input->post('lastname');
    $username = $this->input->post('username');
    $address = $this->input->post('address');
    $email = $this->input->post('email');

    
    $data = array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'username' => $username,
        'address' => $address,
        'email' => $email
    );

    
    $this->My_model->update_record($id, $data);

    
    $this->session->set_flashdata('kyre', array('message' => 'Record updated successfully!', 'type' => 'success'));

    
    redirect('welcome/settings');
}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('AuthLogin');
    }

    public function crud_details()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('AuthLogin');
            return;
        }

        $user_id = $this->session->userdata('user_id');
        $user_data = $this->Login_model->get_user_data($user_id);

        $data = [
            'firstname'     => $user_data['firstname'],
            'lastname'      => $user_data['lastname'],
            'username'      => $user_data['username'],
            'getUsers'      => $this->My_model->get_users(),
            'records'       => $this->My_model->getdata(),
            'valid_records' => $this->My_model->get_valid_records()
        ];

        $this->load->view('crud_details', $data);
    }

    public function settings()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('AuthLogin');
            return;
        }

        $user_id = $this->session->userdata('user_id');
        $user = $this->My_model->get_single_data($user_id);

        $data = [
            'user'          => $this->My_model->get_user_data($user_id),
            'firstname'     => $user['firstname'] ?? 'Guest',
            'lastname'      => $user['lastname'] ?? '',
            'email'         => $user['email'] ?? 'guest@example.com',
            'getUsers'      => $this->My_model->get_users(),
            'records'       => $this->My_model->getdata(),
            'valid_records' => $this->My_model->get_valid_records()
        ];

        $this->load->view('settings', $data);
    }

    public function calculator()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('AuthLogin');
            return;
        }

        $user_id = $this->session->userdata('user_id');
        $user = $this->My_model->get_single_data($user_id);

        $data = [
            'firstname'  => $user['firstname'] ?? 'Guest',
            'lastname'   => $user['lastname'] ?? '',
            'result'     => null,
            'expression' => null
        ];

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $expression = $this->input->post('expression', true);
            $expression = preg_replace('/^0+/', '', $expression); // remove leading zeros
            $safe_expression = preg_replace('/[^0-9+\-*\/().]/', '', $expression);

            try {
                $data['result'] = $this->My_model->calculate($safe_expression);
            } catch (Exception $e) {
                $data['result'] = 'Error';
            }

            $data['expression'] = $expression;
        }

        $this->load->view('calculator', $data);
    }
}
