<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_Main extends MY_Controller
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

        $this->template('admin_welcome', $data);
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

        $this->template('admin_crud', $data);
    }

   public function admin_edit_access($username = null) {

    if (empty($username)) {
        $username = $this->session->userdata('username');
    }

    if (empty($username)) {
        show_error('No username provided or logged in.');
        return;
    }

    $this->load->model('admin_model');
    $username = urldecode($username);
    $record = $this->admin_model->get_user_by_username($username);

    if (!$record) {
        show_404();
        return;
    }

    $session_user = $this->session->userdata('user_data')  ??  [];

    $data = [
        'record'    => $record,
        'firstname' => $session_user['firstname'] ?? 'Guest',
        'lastname'  => $session_user['lastname'] ?? '',
    ];

     $this->load->view('admin_edit_access', $data);
   }


    public function update($username)
{
    $this->load->model('admin_model');

    
    $username = urldecode($username);

    
    $user = $this->admin_model->get_user_by_username($username);

    if (!$user) {
        show_404();
        return;
    }

    
    $id = $user['id'];

    
    $data = [
        'id'        => $id,
        'firstname' => $this->input->post('firstname', true),
        'lastname'  => $this->input->post('lastname', true),
        'username'  => $this->input->post('username', true),
        'address'   => $this->input->post('address', true),
        'email'     => $this->input->post('email', true)
    ];

  
    $update_result = $this->admin_model->update_data($data);

    if ($update_result) {
        $this->session->set_flashdata('kyre', [
            'message' => 'Record updated successfully!',
            'type' => 'success'
        ]);
    } else {
        $this->session->set_flashdata('kyre', [
            'message' => 'No changes were made or update failed.',
            'type' => 'warning'
        ]);
    }

    
    redirect('admin_Main/admin_crud');
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

        $this->template('admin_calculator', $data);
    }

    public function admin_projects()
    {
        $user_id = $this->session->userdata('user_id');
        $user = $this->My_model->get_single_data($user_id) ?? [];

        $data = [
            'firstname'  => $user['firstname'] ?? 'Guest',
            'lastname'   => $user['lastname'] ?? '',
            
        ];

        $this->template('admin_projects', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('index.php/AuthLogin');
    }

    public function quizbee($quiz_id = null)
{
    $this->load->model('Quiz_model');

   
    if ($quiz_id === null) {
        $quiz = null;
    } else {
        $quiz = $this->Quiz_model->get_quiz($quiz_id);
        if (!$quiz) {
            show_404();
            return;
        }
    }

    $user_id = $this->session->userdata('user_id');
    $user = $this->Login_model->get_user_data($user_id);

    $data = [
        'quiz'      => $quiz,
        'firstname' => $user['firstname'] ?? 'Admin',
        'lastname'  => $user['lastname'] ?? '',
        'title'     => $quiz ? ($quiz['title'] . " — Quiz Bee") : "Quiz Bee"
    ];

    $this->template('quizbee', $data);
}


	public function add_quiz() 
{
    $this->load->model('Login_model');

    $user_id = $this->session->userdata('user_id');
    $user    = $this->Login_model->get_user_data($user_id);

    $data = [
        'title'     => 'Add New Quiz',
        'firstname' => $user['firstname'] ?? 'Admin',
        'lastname'  => $user['lastname']  ?? ''
    ];

    $this->template('add_quiz', $data);
}



public function save_quiz()
{
    $this->load->model('Quiz_model');

    $type      = $this->input->post('quiz_type', true);
    $group_id  = $this->input->post('group_id', true);

  
    $data = [
        'type'          => $type,
        'question'      => $this->input->post('question', true),
        'quizgroup_id' => $group_id      
    ];

    switch ($type) {
        case 'multiple_choice':

            $choices = $this->input->post('choices');
            $answer  = $this->input->post('answer', true);

            $data['choices'] = is_array($choices)
                ? json_encode($choices, JSON_UNESCAPED_SLASHES)
                : $choices;

            $data['answer']  = $answer;
            break;


        case 'true_false':
            $data['choices'] = json_encode(["True", "False"], JSON_UNESCAPED_SLASHES);
            $data['answer']  = $this->input->post('tf_answer', true);
            break;


        case 'identification':
            $data['choices'] = null;
            $data['answer']  = $this->input->post('identification_answer', true);
            break;


        case 'enumeration':
            $data['choices'] = null;
            $data['answer']  = json_encode($this->input->post('enumeration_answers'), JSON_UNESCAPED_SLASHES);
            break;
    }


    $this->Quiz_model->createQuiz($data);

    redirect('admin_Main/quiz_list');
}



    public function quiz_list()
{
    $this->load->model('Quiz_model');
    $this->load->model('Login_model');

    
    $quizzes = $this->Quiz_model->get_all_quizzes();

   
    $groups = $this->Quiz_model->get_all_quiz_groups(); 

   
    $user_id = $this->session->userdata('user_id');
    $user = $this->Login_model->get_user_data($user_id);

    $data = [
        'quizzes'   => $quizzes,
        'groups'    => $groups,    
        'firstname' => $user['firstname'] ?? 'Admin',
        'lastname'  => $user['lastname'] ?? '',
        'title'     => 'Quiz List'
    ];

    
    $this->template('quiz_list', $data);
}


public function get_quiz($id)
{
    return $this->db->get_where('quizzes', ['id' => $id])->row_array();
}


public function edit_quiz($id = null)
{
    if ($id === null) {
        show_404();
        return;
    }

    $this->load->model('quiz_model');

    $data['quiz'] = $this->quiz_model->get_quiz($id);

    if (empty($data['quiz'])) {
        show_404();
        return;
    }

    $this->load->view('admin_Main/edit_quiz', $data);
}


public function update_quiz($id)
{
    $this->load->model('quiz_model');

    $choices = $this->input->post('choices');
    $correct_index = $this->input->post('mc_correct_choice');
    $correct_answer = $choices[$correct_index] ?? null;

    $data = [
        'title'   => $this->input->post('title', true),
        'question' => $this->input->post('question', true),
        'choices' => json_encode($choices),
        'answer'  => $correct_answer,
        
    ];
    $this->Quiz_model->updateQuiz($id, $data);

    redirect('admin_Main/quiz_list');
}

public function delete_quiz($id)
{
    $this->load->model('Quiz_model');

    $this->Quiz_model->deleteQuiz($id);

    redirect('admin_Main/quiz_list');

}

    
}