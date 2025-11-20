<?php

class Quiz_model extends CI_Model {

    public function createQuiz($data)
{
    $common = [
        'type'     => $data['type'],
        'question' => $data['question']
    ];

    switch ($data['type']) {
        case 'multiple choice':
            $choices = $data['choices'];
           
            if (!is_string($choices)) {
                $choices = json_encode($choices, JSON_UNESCAPED_SLASHES);
            }
            $insertData = array_merge($common, [
                'choices' => $choices,
                'answer'  => $data['answer']
            ]);
            break;

        case 'true_false':
            $insertData = array_merge($common, [
                'choices' => json_encode(['True', 'False'], JSON_UNESCAPED_SLASHES),
                'answer'  => $data['answer']
            ]);
            break;

        case 'identification':
        case 'enumeration':
            $insertData = array_merge($common, [
                'choices' => null,
                'answer'  => $data['answer']
            ]);
            break;

        default:
            $insertData = $common;
            break;
    }

  
    $insertData['answer'] = stripslashes($insertData['answer']);

    return $this->db->insert('quizzes', $insertData);
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
