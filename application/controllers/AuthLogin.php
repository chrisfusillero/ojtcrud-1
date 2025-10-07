<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form', 'security', 'cookie']);
        $this->load->library(['session', 'form_validation']);
        $this->load->model('login_model');
    }

    public function index()
    {
        
        if (!$this->session->userdata('logged_in')) {
            $remember_token = get_cookie('remember_token');

            if ($remember_token) {
                $user = $this->login_model->get_user_by_token($remember_token);
                if ($user) {
                    $this->session->set_userdata('user_id', $user['id']);
                    $this->session->set_userdata('user_data', $user);
                    $this->session->set_userdata('logged_in', true);
                    redirect('welcome');
                    return;
                }
            }
        }

        
        if ($this->session->userdata('logged_in')) {
            redirect('welcome');
            return;
        }

        $this->load->view('login_form');
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

                if($rememberMe) {
                    $token = bin2hex(random_bytes(16));
                    $this->login_model->save_remember_token($user_id, $token);

                    set_cookie('remember_token', $token, 60 * 60 * 24 * 7);
                }

                redirect('welcome');
                } else {
            $this->session->set_flashdata('error', 'Invalid email or password.');
            redirect('AuthLogin');
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
        
        $user_id = $this->session->userdata('user_id');
        if ($user_id) {
            $this->login_model->clear_remember_token($user_id);
        }

        delete_cookie('remember_token');
        $this->session->sess_destroy();
        redirect('AuthLogin');
    }
}
