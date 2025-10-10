<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        // Load any necessary helpers, libraries, or models here
        $this->load->helper('url', 'form','security');
        $this->load->library('session');
        $this->load->model('My_model');
        $this->load->model('Login_model');
        // $this->load->model('My_model');

        $this->load->library('form_validation');
    }

    /**
     * Default method (e.g., accessed by /mycontroller)
     */
public function index()
{
    if (!$this->session->userdata('user_id')) {
        redirect('AuthLogin');
        return;
    }

    $user_id = $this->session->userdata('user_id');

   
    $this->load->model('Login_model');
    $user_data = $this->Login_model->get_user_data($user_id);

    if ($user_data) {
        $data['firstname'] = $user_data['firstname'];
        $data['lastname']  = $user_data['lastname'];
        $data['username']  = $user_data['username'];
    } else {
        $data['firstname'] = '';
        $data['lastname']  = '';
        $data['username']  = '';
    }

    $data['title'] = 'Welcome Page';
    $data['message'] = 'Welcome to your dashboard!';
    
    $this->load->view('welcome_message', $data);
}

    /**
     * Another method (e.g., accessed by /mycontroller/another_method)
     * @param string $param1 Optional parameter
     */


    public function delete($id) {

    if (!is_numeric($id)) {
        show_error('Invalid ID.');
        return;
    }

    $id = intval($id);

    $result = $this->My_model->soft_delete_data($id);

    if ($result) {
        $this->session->set_flashdata('kyre', [
            'type' => 'success',
            'message' => 'Record deleted successfully.'
        ]);
    } else {
        $this->session->set_flashdata('kyre', [
            'type' => 'danger',
            'message' => 'Failed to delete record.'
        ]);
    }

    echo '<script>';
    echo 'window.location.replace("' . base_url('index.php/welcome/crud_details') . '");';
    echo '</script>';
}

  public function edit($id) 
  {

    $this->load->model('My_model');

    $data['record'] = $this->My_model->get_single_record($id);

    if (empty($data['record'])) {
        show_error('Record not found.');
        return;
    }

    $data['firstname'] = $this->session->userdata('firstname');
    $data['lastname']  = $this->session->userdata('lastname');
    $data['username']  = $this->session->userdata('username');

    $this->load->view('edit_view', $data);
  }


    public function update($id) {
    if (!is_numeric($id)) {
        show_error('Invalid ID.');
        return;
    }

    $id = intval($id);

    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'trim');

    if ($this->form_validation->run() == FALSE) {
        $data['record'] = $this->My_model->get_data_by_id($id);
        $this->load->view('edit_view', $data);
    } else {
        $data = array(
            'id' => $id,
            'firstname' => $this->input->post('name', true),
            'email' => $this->input->post('email', true),
            'address' => $this->input->post('address', true)
        );

        $result = $this->My_model->update_data($data);

       if ($result) {
        $this->session->set_flashdata('kyre', [
            'type' => 'success',
            'message' => 'Record updated successfully.'
        ]);
    } else {
        $this->session->set_flashdata('kyre', [
            'type' => 'danger',
            'message' => 'Failed to update record.'
        ]);
    }

        echo '<script>';
        echo 'window.location.replace("' . base_url('index.php/welcome/crud_details') . '");';
        echo '</script>';
    }
}

    public function logout() {
        // $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        redirect('index.php/AuthLogin');
        return;

    }


   public function crud_details() {

    if (!$this->session->userdata('user_id'))  {
        redirect('AuthLogin');
        return;
    }

    $this->load->model('My_model');
    $this->load->model('Login_model');

    $user_id = $this->session->userdata('user_id');
    $user_data = $this->Login_model->get_user_data($user_id);

    $data['firstname'] = $user_data['firstname'];
    $data['lastname']  = $user_data['lastname'];
    $data['username']  = $user_data['username'];

    $data['getUsers']      = $this->My_model->get_users();
    $data['records']       = $this->My_model->getdata();    
    $data['valid_records'] = $this->My_model->get_valid_records();

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
    $data['user'] = $this->My_model->get_user_data($this->session->userdata('user_id'));


    $data['firstname']     = $user['firstname'] ?? 'Guest';
    $data['lastname']      = $user['lastname'] ?? '';
    $data['email']         = $user['email'] ?? 'guest@example.com';
    $data['getUsers']      = $this->My_model->get_users();
    $data['records']       = $this->My_model->getdata();
    $data['valid_records'] = $this->My_model->get_valid_records();

    $this->load->view('settings', $data);
}

public function calculator() {

    if (!$this->session->userdata('user_id')) {
        redirect('AuthLogin');
        return;
    }

    $user_id = $this->session->userdata('user_id');


    $user = $this->My_model->get_single_data($user_id);

    $data['firstname']     = $user['firstname'] ?? 'Guest';
    $data['lastname']      = $user['lastname'] ?? '';
    $data['result'] = null;
    $data['expression'] = null;

    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $expression = $this->input->post('expression', true);

        
        if (strlen($expression) > 1 && strpos($expression, '0') === 0) {
            
            $expression = substr($expression, 1);
        }

        
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