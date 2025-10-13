<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

  
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session', 'form_validation']);

        $this->load->model('admin_model');
        $this->load->model(['My_model', 'Login_model']);

       
        $user_role = $this->session->userdata('role') ?? null;
        $user_id   = $this->session->userdata('user_id') ?? null;

        if (!$user_id || $user_role !== 'admin') {
            
            redirect('AuthLogin');
            return; 
        }
    }

    public function index()
    {

        $user_id = $this->session->userdata('user_id');

        
        $user_data = $this->Login_model->get_user_data($user_id);

        $data = [
            'firstname' => $user_data['firstname'] ?? '',
            'lastname'  => $user_data['lastname'] ?? '',
            'username'  => $user_data['username'] ?? '',
            'title'     => 'Admin Dashboard',
            'message'   => 'Welcome to the admin dashboard'
        ];

        $this->load->view('admin_welcome', $data);
    }

    public function admin_crud()
    {
        $user_id = $this->session->userdata('user_id');

        $user_data = $this->Login_model->get_user_data($user_id);

        $data = [
            'firstname'      => $user_data['firstname'] ?? '',
            'lastname'       => $user_data['lastname'] ?? '',
            'username'       => $user_data['username'] ?? '',
            'getUsers'       => $this->My_model->get_users(),
            'records'        => $this->My_model->getdata(),
            'valid_records'  => $this->My_model->get_valid_records()
        ];

        $this->load->view('admin_crud', $data);
    }

    public function admin_edit_access($username) {
    
    $this->load->model('admin_model');

    
    $username = urldecode($username);

    
    $record = $this->admin_model->get_user_by_username($username);

    
    if (!$record) {
        
        show_404(); // Or redirect to an error page
        return;
    }

    $session_user = $this->session->userdata('user_data') ?? [];
    $data = [
        'record' => $record,
        'firstname' => $session_user['firstname'] ?? 'Guest',
        'lastname'  => $session_user['lastname'] ?? ''
    ];

    $this->load->view('admin_edit_access', $data);
}
   public function admin_edit_profile($username) {
    
    $this->load->model('admin_model');

    $username = urldecode($username);


    $record = $this->admin_model->get_user_by_username($username);

    
    if (!$record) {
        
        show_404(); 
        return;
    }

    $session_user = $this->session->userdata('user_data') ?? [];
    $data = [
        'record' => $record,
        'firstname' => $session_user['firstname'] ?? 'Guest',
        'lastname'  => $session_user['lastname'] ?? ''
    ];

    $this->load->view('admin_edit_profile', $data);
}

    public function update($username) {
    
    $this->load->model('admin_model');

    
    $username = urldecode($username);

    
    $user = $this->admin_model->get_user_by_username($username);

    
    if (!$user) {
        
        show_404(); 
        return;
    }

    $id = $user['id'];

    
    $firstname = $this->input->post('name');
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

    
    $this->admin_model->update_data($data);

    
    $this->session->set_flashdata('kyre', array('message' => 'Record updated successfully!', 'type' => 'success'));

    
    redirect('admin_Main/admin_settings');
}
    public function delete($id)
    {
        if (!is_numeric($id)) {
            show_error('Invalid ID.');
            return;
        }

        $id = intval($id);
        $result = $this->My_model->soft_delete_data($id);

        if ($result) {
            $this->session->set_flashdata('kyre', [
                'type'    => 'success',
                'message' => 'Record deleted successfully.'
            ]);
        } else {
            $this->session->set_flashdata('kyre', [
                'type'    => 'danger',
                'message' => 'Failed to delete record.'
            ]);
        }

        redirect('admin_Main/admin_crud');
    }

    public function admin_settings()
    {
        $user_id = $this->session->userdata('user_id');

        $user = $this->My_model->get_single_data($user_id) ?? [];

        $data = [
            'firstname'     => $user['firstname'] ?? 'Guest',
            'lastname'      => $user['lastname'] ?? '',
            'email'         => $user['email'] ?? 'guest@example.com',
            'getUsers'      => $this->My_model->get_users(),
            'records'       => $this->My_model->getdata(),
            'valid_records' => $this->My_model->get_valid_records()
        ];

        $this->load->view('admin_settings', $data);
    }

    public function admin_calculator()
    {
        $user_id = $this->session->userdata('user_id');
        $user = $this->My_model->get_single_data($user_id) ?? [];

        $data = [
            'firstname'  => $user['firstname'] ?? 'Guest',
            'lastname'   => $user['lastname'] ?? '',
            'result'     => null,
            'expression' => null
        ];

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $expression = $this->input->post('expression', true);

           
            $safe_expression = preg_replace('/[^0-9+\-*\/().]/', '', $expression);

           
            $data['result'] = $this->My_model->calculate($safe_expression);
            $data['expression'] = $expression;
        }

        $this->load->view('admin_calculator', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('index.php/AuthLogin');
    }
}
