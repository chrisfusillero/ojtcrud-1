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

   public function admin_edit_profile()
{
    $user_id = $this->session->userdata('user_id');
    $user = $this->admin_model->get_data_by_id($user_id);

    $data = [
        'firstname' => $user['firstname'],
        'lastname'  => $user['lastname'],
        'username'  => $user['username'],
        'email'     => $user['email'],
        'address'   => $user['address'],
    ];

    $this->load->view('admin_edit_profile', $data);
}

public function update_admin_profile()
{
    $user_id = $this->session->userdata('user_id');

    $data = [
        'firstname' => $this->input->post('firstname'),
        'lastname'  => $this->input->post('lastname'),
        'username'  => $this->input->post('username'),
        'email'     => $this->input->post('email'),
        'address'   => $this->input->post('address')
    ];

    $this->My_model->update_admin_profile($user_id, $data);

    $this->session->set_flashdata('kyre', [
        'type' => 'success',
        'message' => 'Admin profile updated successfully!'
    ]);

    redirect('index.php/admin_Main/admin_settings');
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

        $this->load->view('admin_calculator', $data);
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


	

/* quiz group creation flow= */

public function add_quiz($group_id = null)
{
    $this->load->model('Login_model');

    $user_id = $this->session->userdata('user_id');
    $user    = $this->Login_model->get_user_data($user_id);

    $data = [
        'title'     => 'Create Quiz Group',
        'firstname' => $user['firstname'] ?? 'Admin',
        'lastname'  => $user['lastname']  ?? '',
        'group_id'  => $group_id // Will be null if not created yet
    ];

    $this->template('add_quiz', $data);
}


/* 
save final quiz group
*/
public function save_quiz_group_final()
{
    $this->load->model('Quiz_model');

    $data = [
        'group_title'      => $this->input->post('group_title'),
        'description'      => $this->input->post('description'),
        'duration_minutes' => (int)$this->input->post('time_limit_minutes_total')
    ];

    $result = $this->Quiz_model->createQuizGroup($data);

    if ($result['status'] === 'duplicate') {
        echo json_encode([
            'status'    => 'duplicate',
            'group_id'  => $result['group_id'],
            'message'   => 'Quiz group already exists'
        ]);
        return;
    }

    if ($result['status'] === 'success') {
        echo json_encode([
            'status'   => 'success',
            'group_id' => $result['group_id']
        ]);
        return;
    }

    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to create quiz group'
    ]);
}




/* 
load questions under a group
*/
public function get_questions_by_group($group_id)
{
    $this->db->select('quiz_questions.*, quiz_questions.question_type AS type');
    $this->db->from('quiz_group_questions');
    $this->db->join('quiz_questions', 'quiz_questions.id = quiz_group_questions.question_id');
    $this->db->where('quiz_group_questions.group_id', $group_id);

    echo json_encode($this->db->get()->result());
}



/* question (no redirect) */

public function save_quiz()
{
    $type     = $this->input->post('quiz_type');
    $group_id = $this->input->post('group_id');
    $question = $this->input->post('question');

    $choices_json = null;
    $answer = "";

    /* ------------------ MULTIPLE CHOICE ------------------ */
    if ($type == 'multiple_choice') {
        $choices = $this->input->post('choices');
        $correct = $this->input->post('mc_correct_choice');

        $choices_json = json_encode($choices);
        $answer       = $choices[$correct] ?? '';
    }

    /* ------------------ TRUE OR FALSE ------------------ */
    else if ($type == 'true_false') {
        $choices_json = json_encode(["True", "False"]);
        $answer = $this->input->post('tf_answer');
    }

    /* ------------------ IDENTIFICATION ------------------ */
    else if ($type == 'identification') {
        $answer = $this->input->post('identification_answer');
    }

    /* ------------------ ENUMERATION ------------------ */
    else if ($type == 'enumeration') {
        $enum_answers = $this->input->post('enumeration_answers');
        $choices_json = json_encode($enum_answers);
        $answer       = json_encode($enum_answers);
    }

    /* ------------------ INSERT QUESTION ------------------ */
    $question_data = [
        'question_type' => $type,
        'question'      => $question,
        'choices'       => $choices_json,
        'answer'        => $answer
    ];

    $this->db->insert('quiz_questions', $question_data);
    $question_id = $this->db->insert_id();

    /* ------------------ LINK TO GROUP ------------------ */
    $this->db->insert('quiz_group_questions', [
        'group_id'    => $group_id,
        'question_id' => $question_id
    ]);

    
    echo "OK";
}



/* quiz list */

public function quiz_list()
{
    $this->load->model('Quiz_model');
    $this->load->model('Login_model');

    $quizzes = $this->Quiz_model->get_all_quizzes();
    $groups  = $this->Quiz_model->get_all_quiz_groups();

    $user_id = $this->session->userdata('user_id');
    $user    = $this->Login_model->get_user_data($user_id);

    $data = [
        'quizzes'   => $quizzes,
        'groups'    => $groups,
        'firstname' => $user['firstname'] ?? 'Admin',
        'lastname'  => $user['lastname'] ?? '',
        'title'     => 'Quiz List'
    ];

    $this->load->view('quiz_list', $data);
}

public function quiz_questions_list($group_id = 0)
{
    $group_id = (int) $group_id;

    if ($group_id <= 0) {
        redirect('admin_Main/quiz_list'); 
        return;
    }

    $this->load->model('Quiz_model');

    
    $group = $this->Quiz_model->get_group_with_questions($group_id);

    if (!$group) {
        redirect('admin_Main/quiz_list'); 
        return;
    }

    $data = [
        'group'     => $group,
        'questions' => $group['questions'] ?? [],
        'title'     => "Questions for " . ($group['group_title'] ?? 'Untitled Group')
    ];

   
    $this->load->view('quiz_questions_list', $data);
}





/* edit, update and delete quiz */

public function get_quiz($id)
{
    return $this->db->get_where('quizzes', ['id' => $id])->row_array();
}

public function edit_quiz($group_id = 0)
{
    
    $group_id = (int) $group_id;
    if ($group_id <= 0) {
        show_404();
        return;
    }

    $this->load->model('Quiz_model');

    // Fetch quiz group (uses group_id NOT id)
    $group = $this->Quiz_model->get_quiz_group($group_id);
    if (!$group) {
        show_404();
        return;
    }

    // Fetch all questions linked to this group
    $questions = $this->Quiz_model->get_questions_by_group($group_id);

    $data = [
        'group'     => $group,
        'questions' => $questions
    ];

    // Load edit view
    $this->load->view('admin_Main/edit_quiz', $data);
}




public function update_quiz($id)
{
    $this->load->model('Quiz_model');

    $choices = $this->input->post('choices');
    $correct = $this->input->post('mc_correct_choice');

    $data = [
        'title'    => $this->input->post('title'),
        'question' => $this->input->post('question'),
        'choices'  => json_encode($choices),
        'answer'   => $choices[$correct] ?? ''
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

public function delete_quiz_question($question_id, $group_id)
{
    $this->load->model('Quiz_model');
    $this->Quiz_model->deleteQuiz($question_id);
    redirect('admin_Main/quiz_questions_list/' . $group_id);
}



public function create_temp_group()
{
    $this->load->model('Quiz_model');

    $group_title = $this->input->post('group_title');
    $description = $this->input->post('description');
    $duration    = (int) $this->input->post('time_limit_minutes_total');

    if (empty($group_title)) {
        echo json_encode(['status' => 'error', 'message' => 'Group title required']);
        return;
    }

    // Model now returns an array with status + group_id
    $result = $this->Quiz_model->createQuizGroup([
        'group_title'       => $group_title,
        'description'       => $description,
        'duration_minutes'  => $duration
    ]);

    if ($result['status'] === 'duplicate') {
        echo json_encode([
            'status'    => 'duplicate',
            'group_id'  => $result['group_id'],
            'message'   => 'Quiz group already exists'
        ]);
        return;
    }

    if ($result['status'] === 'success') {
        echo json_encode([
            'status'    => 'success',
            'group_id'  => $result['group_id']
        ]);
        return;
    }

    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to create quiz group'
    ]);
}



public function temp_add_question()
{
    $this->load->model('Quiz_model');

    $group_id = (int) $this->input->post('group_id');
    $type     = $this->input->post('quiz_type');
    $question = trim($this->input->post('question'));

    // Validate base input
    if ($group_id <= 0 || empty($question)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Group ID or question is missing.'
        ]);
        return;
    }

    // Validate that the group exists
    $group = $this->Quiz_model->get_quiz_group($group_id);
    if (!$group) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Quiz group does not exist.'
        ]);
        return;
    }

    $choices_json = null;
    $answer = "";

    switch ($type) {
        case 'multiple_choice':
            $choices = $this->input->post('choices'); // array
            $correct = $this->input->post('mc_correct_choice');

            if (!is_array($choices) || count($choices) < 2) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Multiple choice requires at least 2 choices.'
                ]);
                return;
            }

            $choices_json = json_encode(array_values($choices));
            $answer = $choices[$correct] ?? '';
            break;

        case 'true_false':
            $choices_json = json_encode(["True", "False"]);
            $answer = $this->input->post('tf_answer') === "True" ? "True" : "False";
            break;

        case 'identification':
            $answer = trim($this->input->post('identification_answer'));
            if (empty($answer)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Identification answer cannot be empty.'
                ]);
                return;
            }
            break;

        case 'enumeration':
            $enum_answers = $this->input->post('enumeration_answers'); // array
            if (!is_array($enum_answers) || empty($enum_answers)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Enumeration must have at least one answer.'
                ]);
                return;
            }
            $choices_json = json_encode(array_values($enum_answers));
            $answer = json_encode(array_values($enum_answers));
            break;

        default:
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid question type.'
            ]);
            return;
    }

    // Insert into DB
    $question_id = $this->Quiz_model->createQuizQuestion([
        'group_id' => $group_id,
        'type'     => $type,
        'question' => $question,
        'choices'  => $choices_json,
        'answer'   => $answer
    ]);

    if ($question_id) {
        echo json_encode([
            'status' => 'success',
            'question_id' => $question_id
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to add question.'
        ]);
    }
}


    
}