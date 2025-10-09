<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session', 'form_validation']);
        $this->load->model('login_model');
    }

    public function index()
    {
        $data['title'] = 'Welcome to My Controller';
        $data['message'] = 'This is the default method.';
        $data['userdata'] = $this->session->userdata();
        $data['info'] = $this->session->userdata();

        
        if (isset($data['info']['user_id'])) {
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('user_data');
            $this->session->userdata('logged_in'); {
                redirect('welcome');
                return;
            }
        }

        $this->load->view('login_form', $data);
    }

   public function login() {

    //collect input
    $email = trim($this->input->post('email'));
    $password = trim($this->input->post('password'));
    $selected_role = trim($this->input->post('role'));


    //validate required fields
    if (empty($email) || empty($password) || empty($selected_role)) {
        $this->session->set_flashdata('error', 'All fields are required.');
        redirect('AuthLogin');
        return;
    }

    //check user credentials
    $user = $this->login_model->check_login($email, $selected_role);

    //verify if user exists
    if(!$user) {
        $this->session->set_flashdata('error', 'No account found with those credentials or role.');
        redirect('AuthLogin');
        return;
    }

    //optional
    if (isset($user['valid']) && $user['valid'] != 1) {
        $this->session->set_flashdata('error', 'Your account is not active. ');
        redirect('AuthLogin');
        return;
    }

    //save session data
    $this->session->set_userdata([
        'user_id' => $user['id'],
        'email' => $user['email'],
        'role' => $user['user'],
        'logged_in' => true
    ]);

    //redirect based on role
    switch (strtolower($user['user'])) {
        case 'admin':
            redirect('admin_Main');
            break;

        case 'regular':
            redirect('welcome');
            break;

        default:
            $this->session->set_flashdata('error', 'Unknown user type, please contact support');
            redirect('AuthLogin');
            break;
    }
   }



    public function signup()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[crud.email]'
        );
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('signup');
        } else {
            if (!$this->login_model->is_email_available($this->input->post('email'))) {
                $this->session->set_flashdata('error', 'This email address is already registered.');
                redirect('AuthLogin/signup');
                return;
            }

            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname'  => $this->input->post('lastname'),
                'username'  => $this->input->post('username'),
                'address'   => $this->input->post('address'),
                'email'     => $this->input->post('email'),
                'password'  => $this->input->post('password'),
                'user'      => $this->input->post('role')
            );

            $user_id = $this->login_model->create_user($data);

            if ($user_id) {
                $this->session->set_flashdata('success', 'Signup successful! Please log in.');
                redirect('AuthLogin');
            } else {
                $this->session->set_flashdata('error', 'There was an error creating your account. Please try again.');
                redirect('AuthLogin/signup');
            }
        }
    }

    public function signup_form()
    {
        $this->load->view('signup');
    }

    public function login_form()
    {
        $this->load->view('login_form');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('AuthLogin');
    }
}






