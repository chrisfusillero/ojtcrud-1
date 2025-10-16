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

    public function get_post_by_id($id)
    {
        return $this->db->get_where('posts', ['id' => $id])->row_array();
    }

    public function update_post($id, $data)
    {
        return $this->db->where('id', $id)->update('posts', $data);
    }

    public function delete_post($id)
    {
        return $this->db->where('id', $id)->delete('posts');
    }

    public function toggle_like($post_id, $user_id)
    {
       
        $query = $this->db->get_where('post_likes', [
            'post_id' => $post_id,
            'user_id' => $user_id
        ]);

        if ($query->num_rows() > 0) {
          
            $this->db->delete('post_likes', [
                'post_id' => $post_id,
                'user_id' => $user_id
            ]);
            return 'unliked';
        } else {
            
            $this->db->insert('post_likes', [
                'post_id' => $post_id,
                'user_id' => $user_id,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            return 'liked';
        }
    }

    public function get_like_count($post_id)
    {
        return $this->db->where('post_id', $post_id)->count_all_results('post_likes');
    }

    public function user_liked_post($post_id, $user_id)
    {
        return $this->db->get_where('post_likes', [
            'post_id' => $post_id,
            'user_id' => $user_id
        ])->num_rows() > 0;
    }
}
