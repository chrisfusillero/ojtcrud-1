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

    $this->load->library('session');
     $firstname = $this->session->userdata('firstname');
    $user_id = $this->session->userdata('user_id');
    $user_data = $this->Login_model->get_user_data($user_id);

    
    

    $posts = $this->Post_model->get_all_posts();

 
    if (is_object($user_data)) {
        $user_data = (array) $user_data;
    }

    $user =$this->My_model->get_user_by_id($user_id);

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

    public function update($username)
{
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

 
    $data = [
        'firstname' => $firstname,
        'lastname'  => $lastname,
        'username'  => $username,
        'address'   => $address,
        'email'     => $email
    ];

    
    if (!empty($_FILES['avatar']['name'])) {
        $config['upload_path'] = './assets/avatars/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size'] = 2048;
        $config['file_name'] = time() . '_' . $_FILES['avatar']['name'];
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('avatar')) {
            $uploadData = $this->upload->data();
            $data['avatar'] = $uploadData['file_name'];

            
            if (!empty($user['avatar']) && file_exists('./uploads/avatars/' . $user['avatar'])) {
                unlink('./uploads/avatars/' . $user['avatar']);
            }
        } else {
            $this->session->set_flashdata('kyre', [
                'message' => $this->upload->display_errors(),
                'type' => 'danger'
            ]);
            redirect('welcome/settings');
            return;
        }
    }

 
    $this->My_model->update_record($id, $data);

    $this->session->set_flashdata('kyre', [
        'message' => 'Profile updated successfully!',
        'type' => 'success'
    ]);

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

    // Ensure the post exists and belongs to the logged-in user
    if (!$post || $post['user_id'] !== $user_id) {
        show_404();
        return;
    }

    // Perform soft delete (set valid = 0)
    $this->Post_model->delete_post($id);

    // Keep image file for potential restoration or audit purposes
    // (Optional: you can remove it if you truly want to)
    
    $this->session->set_flashdata('kyre', [
        'message' => 'Post deleted successfully (soft delete applied)!',
        'type' => 'success'
    ]);

    redirect('welcome');
}

public function edit_post($post_id)
{
    $this->load->model('Post_model');

    $content = $this->input->post('content');
    $remove_image = $this->input->post('remove_image') ? true : false;
    $new_image_name = null;

    // Handle new image upload if provided
    if (!empty($_FILES['image']['name'])) {
        $config['upload_path']   = './assets/post_image/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size']      = 4096;
        $config['file_name']     = 'post_' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $upload_data = $this->upload->data();
            $new_image_name = $upload_data['file_name'];
        } else {
            // optional: set flash message if upload fails
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('welcome');
            return;
        }
    }

    // Prepare data for update
    $data = ['content' => $content, 'updated_at' => date('Y-m-d H:i:s')];

    // Use model to handle all logic (clean)
    $this->Post_model->update_post($post_id, $data, $remove_image, $new_image_name);

    $this->session->set_flashdata('success', 'Post updated successfully!');
    redirect('welcome');
}


public function update_post($id)
{
    $content = $this->input->post('content');
    $this->Post_model->update_post($id, ['content' => $content]);
    redirect('welcome'); 
}







public function react($post_id, $reaction_type)
{
    if (!$this->session->userdata('user_id')) {
        redirect('AuthLogin');
        return;
    }

    $user_id = $this->session->userdata('user_id');
    $this->load->model('Post_model');

    $status = $this->Post_model->toggle_reaction($post_id, $user_id, $reaction_type);

    $reactionLabels = [
        'like'  => 'You liked the post!',
        'heart' => 'You loved the post!',
        'laugh' => 'You laughed at the post!',
        'sad'   => 'You reacted sadly to the post!'
    ];

    if ($status === 'removed') {
        $message = 'You removed your reaction.';
    } elseif ($status === 'updated') {
        $message = $reactionLabels[$reaction_type] ?? 'Reaction changed!';
    } else {
        $message = $reactionLabels[$reaction_type] ?? 'Reaction added!';
    }

    $this->session->set_flashdata('kyre', [
        'message' => $message,
        'type' => 'success'
    ]);

    redirect('welcome');
}


public function quizbee_user()
{
    if (!$this->session->userdata('user_id')) {
        redirect('AuthLogin');
        return;
    }

    $user_id = $this->session->userdata('user_id');
    $user = $this->My_model->get_single_data($user_id);

    $data = [
        'firstname' => $user['firstname'] ?? 'Guest',
        'lastname'  => $user['lastname'] ?? ''
    ];

    $this->template('quizbee_user', $data);
}

public function quizbee_proper()
{


    $data = [
        'firstname' => $user['firstname'] ?? 'Guest',
        'lastname'  => $user['lastname'] ?? ''
    ];

    $this->load->model('quiz_model');

    // get all quizzes
    $data['quizzes'] = $this->quiz_model->get_all_quizzes();

    // Load view
    $this->template('quizbee_proper', $data);
}

    


}
