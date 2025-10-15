<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{
    public function insert_post($user_id, $content, $image = null)
    {
        $data = [
            'user_id'    => $user_id,
            'content'    => $content,
            'image'      => $image,
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $this->db->insert('posts', $data);
    }

    public function get_all_posts()
    {
        
        $this->db->select('posts.*, crud.firstname, crud.lastname');
        $this->db->from('posts');
        $this->db->join('crud', 'crud.id = posts.user_id', 'left');
        $this->db->order_by('posts.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
