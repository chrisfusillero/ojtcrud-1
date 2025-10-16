<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session', 'form_validation']);
        $this->load->model(['My_model', 'Login_model', 'Post_model']);
        
    }

    public function index()
{

    if (!$this->session->userdata('user_id')) {
        redirect('AuthLogin');
        return;
    }

    
    $this->load->model('Login_model');
    $this->load->model('Post_model');

   
    $user_id = $this->session->userdata('user_id');
    $user_data = $this->Login_model->get_user_data($user_id);

    
    $posts = $this->Post_model->get_all_posts();

 
    if (is_object($user_data)) {
        $user_data = (array) $user_data;
    }

    
    $data = [
        'firstname' => $user_data['firstname'] ?? '',
        'lastname'  => $user_data['lastname'] ?? '',
        'username'  => $user_data['username'] ?? '',
        'posts'     => $posts,
        'title'     => 'Welcome Page',
        'message'   => 'Welcome to your dashboard!'
    ];

    
    $this->template('welcome_message', $data);
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
 
 public function add_post()
{
  
    if (!$this->session->userdata('user_id')) {
        redirect('AuthLogin');
        return;
    }

   
    $config['upload_path']   = './assets/post_image/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['max_size']      = 6144; // 6MB limit
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

   
    $image = null;
    if (!empty($_FILES['image']['name'])) {
        if ($this->upload->do_upload('image')) {
            $uploadData = $this->upload->data();
            $image = $uploadData['file_name'];
        } else {
            echo $this->upload->display_errors();
            return;
        }
    }

   
    $data = [
        'user_id'    => $this->session->userdata('user_id'),
        'content'    => $this->input->post('content'),
        'image'      => $image,
        'created_at' => date('Y-m-d H:i:s')
    ];

    
    $this->db->insert('posts', $data);

    redirect('welcome');
}

public function delete_post($id) 
{

    $this->load->model('Post_model');

    $user_id = $this->session->userdata('user_id');
    $post = $this->Post_model->get_post_by_id($id);

    if (!$post || $post['user_id'] !== $user_id) {
        show_404();
        return;
    }

    if(!empty($post['image'])){
        $image_path = './assets/post_image/' . $post['image'];
        if(file_exists($image_path)){
            unlink($image_path);
        }
    }

    $this->Post_model->delete_post($id);
    $this->session->set_flashdata('kyre', array('message' => 'Post deleted successfully!', 'type' => 'success'));
    redirect('welcome');
}

public function edit_post($id)
{
    $this->load->model('Post_model'); // make sure naming matches your model filename

    $user_id = $this->session->userdata('user_id');
    $post = $this->Post_model->get_post_by_id($id);

    if (!$post || $post['user_id'] !== $user_id) {
        show_404();
        return;
    }

    if ($this->input->server('REQUEST_METHOD') === 'POST') {

        $content = $this->input->post('content');
        $image_name = $post['image']; // keep current image by default

        // 🖼️ Handle new image upload
        if (!empty($_FILES['image']['name'])) {

        
            $config['upload_path']   = './assets/post_image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 6144; // 6MB limit
            $config['file_name']     = time() . '_' . $_FILES['image']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
             
                if (!empty($post['image']) && file_exists('./assets/post_image/' . $post['image'])) {
                    unlink('./assets/post_image/' . $post['image']);
                }

               
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];

            } else {
            
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('welcome/edit_post/' . $id);
                return;
            }
        }

        
        $update_data = [
            'content' => $content,
            'image' => $image_name,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->Post_model->update_post($id, $update_data);

        $this->session->set_flashdata('success', 'Post updated successfully!');
        redirect('welcome');

    } else {
        $data['post'] = $post;
        $this->load->view('edit_post', $data);
    }
}


public function toggle_like($post_id)
{
    if (!$this->session->userdata('user_id')) {
        redirect('AuthLogin');
        return;
    }

    $user_id = $this->session->userdata('user_id');

    
    $this->load->model('Post_model');

   
    $status = $this->Post_model->toggle_like($post_id, $user_id);


   
    $this->session->set_flashdata('kyre', [
        'message' => ($status === 'liked') ? 'You liked the post!' : 'You unliked the post!',
        'type' => 'success'
    ]);

    redirect('welcome');
}




}
