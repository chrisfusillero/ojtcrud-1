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

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_form');
        } else {
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);

            $user_id = $this->login_model->validate_login($email, $password);

            if ($user_id) {
                $user_data = $this->login_model->get_user_data($user_id);

                $this->session->set_userdata('user_id', $user_id);
                $this->session->set_userdata('user_data', $user_data);
                $this->session->set_userdata('logged_in', true);

                echo '<script>';
                echo 'history.replaceState(null, "", "' . base_url('index.php/welcome') . '");';
                echo 'window.location.href = "' . base_url('index.php/welcome') . '";';
                echo '</script>';
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password.');
                echo '<script>';
                echo 'history.replaceState(null, "", "' . base_url('index.php/AuthLogin') . '");';
                echo 'window.location.href = "' . base_url('index.php/AuthLogin') . '";';
                echo '</script>';
            }
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
                'firstname' => $this->input->post('firstname'), 'lastname'  => $this->input->post('lastname'),
                'username'  => $this->input->post('username'), 'address'   => $this->input->post('address'),
                'email'     => $this->input->post('email'), 'password'  => $this->input->post('password') 
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
