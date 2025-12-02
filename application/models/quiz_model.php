<?php

class Quiz_model extends CI_Model {

    public function createQuizGroup($data)
{
    // Prevent duplicated quiz group titles
    $this->db->where('group_title', $data['group_title']);
    $existing = $this->db->get('quiz_groups')->row();

    if ($existing) {
        return [
            'status' => 'duplicate',
            'group_id' => $existing->id
        ];
    }

    $insertData = [
        'group_title'       => $data['group_title'],
        'description'       => $data['description'] ?? null,
        'date_created'      => date("Y-m-d H:i:s"),
        'duration_minutes'  => $data['duration_minutes'] ?? 0
    ];

    $this->db->insert('quiz_groups', $insertData);
    
    return [
        'status' => 'success',
        'group_id' => $this->db->insert_id()
    ];
}



   
    public function createQuizQuestion($data)
    {
        if (empty($data['group_id']) || empty($data['type']) || empty($data['question'])) {
            return false;
        }

        $group = $this->db->where('group_id', $data['group_id'])
                          ->get('quiz_groups')
                          ->row_array();
        if (!$group) return false;

        $this->db->trans_start();

        // Insert question
        $insertQuestion = [
            'question_type' => $data['type'],
            'question'      => $data['question'],
            'choices'       => $data['choices'] ?? null,
            'answer'        => $data['answer']
        ];
        $this->db->insert('quiz_questions', $insertQuestion);
        $question_id = $this->db->insert_id();

        // Link to group
        $this->db->insert('quiz_group_questions', [
            'group_id'    => $data['group_id'],
            'question_id' => $question_id
        ]);

        // Update question count
        $this->db->set('question_amount', 'question_amount + 1', false)
                 ->where('group_id', $data['group_id'])
                 ->update('quiz_groups');

        $this->db->trans_complete();

        return $this->db->trans_status() ? $question_id : false;
    }




    public function get_quiz($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('quiz_questions')
            ->row_array();
    }


    public function get_quiz_group($group_id)
    {
        return $this->db->where('group_id', $group_id)
                        ->get('quiz_groups')
                        ->row_array();
    }


    
    public function get_all_quizzes()
    {
        $this->db->select('quiz_questions.*, quiz_groups.group_title');
        $this->db->from('quiz_questions');
        $this->db->join(
            'quiz_group_questions',
            'quiz_group_questions.question_id = quiz_questions.id',
            'left'
        );
        $this->db->join(
            'quiz_groups',
            'quiz_groups.group_id = quiz_group_questions.group_id',
            'left'
        );
        $this->db->order_by('quiz_questions.id', 'DESC');

        return $this->db->get()->result_array();
    }


    public function updateQuiz($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('quiz_questions', $data);
    }


    
    public function deleteQuiz($id)
    {
        $this->db->delete('quiz_group_questions', ['question_id' => $id]);
        return $this->db->delete('quiz_questions', ['id' => $id]);
    }


   
    public function get_all_quiz_groups()
    {
        return $this->db
            ->order_by('group_id', 'DESC')
            ->get('quiz_groups')
            ->result_array();
    }


   

    public function get_questions_by_group($group_id)
    {
        return $this->db
            ->select('quiz_questions.id, quiz_questions.question, quiz_questions.question_type')
            ->from('quiz_group_questions')
            ->join('quiz_questions', 'quiz_questions.id = quiz_group_questions.question_id')
            ->where('quiz_group_questions.group_id', $group_id)
            ->order_by('quiz_questions.id', 'ASC')
            ->get()
            ->result();
    }


    public function get_single_question($id)
    {
    return $this->db->where('question_id', $id)
                    ->get('quiz_questions')
                    ->row();
    }



  
    public function get_quiz_groups_with_count()
    {
        $this->db->select('quiz_groups.*, COUNT(quiz_group_questions.question_id) AS total_questions');
        $this->db->from('quiz_groups');
        $this->db->join(
            'quiz_group_questions',
            'quiz_group_questions.group_id = quiz_groups.group_id',
            'left'
        );
        $this->db->group_by('quiz_groups.group_id');
        $this->db->order_by('quiz_groups.group_id', 'DESC');

        return $this->db->get()->result_array();
    }



    public function get_group_with_questions($group_id)
    {
        $group = $this->get_quiz_group($group_id);
        if (!$group) return null;

        $group['questions'] = $this->get_questions_by_group($group_id);

        return $group;
    }


    
    public function update_quiz_group($group_id, $data)
    {
        return $this->db
            ->where('group_id', $group_id)
            ->update('quiz_groups', $data);
    }


    
    public function update_quiz_question($question_id, $data)
    {
        return $this->db
            ->where('id', $question_id)
            ->update('quiz_questions', $data);
    }



 
    public function deleteQuestionsByGroup($group_id)
    {
        
        $this->db->where('group_id', $group_id)
                ->delete('quiz_group_questions');
    }

    
    public function deleteGroup($group_id)
    {
        $this->db->where('group_id', $group_id)
                ->delete('quiz_groups');
    }


    

}
