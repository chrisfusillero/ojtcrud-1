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
    $this->db->where('posts.valid', 1);
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
    
    return $this->db->where('id', $id)
                    ->update('posts', ['valid' => 0]);
}


   public function toggle_reaction($post_id, $user_id, $reaction_type)
{
    $columns = [
        'like' => 'like_count',
        'heart' => 'heart_count',
        'laugh' => 'laugh_count',
        'sad' => 'sad_count'
    ];

    // check if user already reacted
    $existing = $this->db->get_where('post_reactions', [
        'post_id' => $post_id,
        'user_id' => $user_id
    ])->row();

    if ($existing) {
        // same reaction clicked again → remove it
        if ($existing->reaction_type === $reaction_type) {
            $this->db->where('id', $existing->id)->delete('post_reactions');

            if (isset($columns[$reaction_type])) {
                $col = $columns[$reaction_type];
                $this->db->set($col, "$col - 1", FALSE)
                         ->where('id', $post_id)
                         ->update('posts');
            }

            return 'removed';
        } 
        else { // different reaction → update
            if (isset($columns[$existing->reaction_type])) {
                $oldCol = $columns[$existing->reaction_type];
                $this->db->set($oldCol, "$oldCol - 1", FALSE)
                         ->where('id', $post_id)
                         ->update('posts');
            }

            if (isset($columns[$reaction_type])) {
                $newCol = $columns[$reaction_type];
                $this->db->set($newCol, "$newCol + 1", FALSE)
                         ->where('id', $post_id)
                         ->update('posts');
            }

            $this->db->where('id', $existing->id)->update('post_reactions', [
                'reaction_type' => $reaction_type
            ]);
            return 'updated';
        }
    } 
    else { // new reaction → insert
        $this->db->insert('post_reactions', [
            'post_id' => $post_id,
            'user_id' => $user_id,
            'reaction_type' => $reaction_type,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if (isset($columns[$reaction_type])) {
            $col = $columns[$reaction_type];
            $this->db->set($col, "$col + 1", FALSE)
                     ->where('id', $post_id)
                     ->update('posts');
        }

        return 'added';
    }
}


    
    public function get_reaction_counts($post_id)
{
    $this->db->select('reaction_type, COUNT(*) as count');
    $this->db->where('post_id', $post_id);
    $this->db->group_by('reaction_type');
    $query = $this->db->get('post_reactions');

    $counts = ['like' => 0, 'heart' => 0, 'laugh' => 0, 'sad' => 0];
    foreach ($query->result() as $row) {
        $counts[$row->reaction_type] = $row->count;
    }

    return $counts;
}

    
    public function user_reaction_type($post_id, $user_id)
{
    $row = $this->db->get_where('post_reactions', [
        'post_id' => $post_id,
        'user_id' => $user_id
    ])->row();

    return $row ? $row->reaction_type : null;
}


}
