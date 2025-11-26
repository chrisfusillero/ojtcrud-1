<?php

class Quiz_model extends CI_Model {

    
    public function createQuizGroup($data)
    {
        $insertData = [
            'group_title'       => $data['group_title'],
            'description'      => $data['description'] ?? null,
            'date_created'     => date("Y-m-d H:i:s"),
            'duration_minutes' => $data['duration_minutes'] ?? 0
        ];

        $this->db->insert('quiz_groups', $insertData);
        return $this->db->insert_id();
    }

    
    public function createQuizQuestion($data)
    {
        
        $insertQuestion = [
            'question_type' => $data['type'],
            'question'      => $data['question'],
            'choices'       => $data['choices'] ?? null,
            'answer'        => $data['answer']
        ];

        $this->db->insert('quiz_questions', $insertQuestion);
        $question_id = $this->db->insert_id();

    
        $this->db->insert('quiz_group_questions', [
            'group_id'    => $data['group_id'],
            'question_id' => $question_id
        ]);

        return $question_id;
    }

   
    public function get_quiz($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->get('quiz_questions')
                    ->row_array();
    }

    
    public function get_all_quizzes()
    {
        $this->db->select('quiz_questions.*, quiz_groups.group_title');
        $this->db->from('quiz_questions');
        $this->db->join('quiz_group_questions', 'quiz_group_questions.question_id = quiz_questions.id', 'left');
        $this->db->join('quiz_groups', 'quiz_groups.id = quiz_group_questions.group_id', 'left');
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
            ->order_by('id', 'DESC')
            ->get('quiz_groups')
            ->result_array();
    }

}
