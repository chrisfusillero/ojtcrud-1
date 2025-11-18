<?php

class Quiz_model extends CI_Model {

    public function createQuiz($data)
    {
        $data = [
            'question' => $data['question'],
            'choices'  => json_encode($data['choices']),
            'answer'   => $data['answer']
        ];
        return $this->db->insert('quizzes', $data);
    }

   public function get_quiz($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->get('quizzes')
                    ->row_array();
    }

    
    public function get_all_quizzes()
    {
        return $this->db->get('quizzes')->result_array();
    }

    public function updateQuiz($id, $data)
    {
        return $this->db->where('id', $id)->update('quizzes', $data);
    }

    public function deleteQuiz($id)
    {
        return $this->db->delete('quizzes', ['id' => $id]);
    }
}
