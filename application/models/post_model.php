<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // ✅ ensures database connection
    }

   public function insert_post($user_id, $firstname, $lastname, $content, $image = null)
{
    $data = [
        'user_id'    => $user_id,
        'firstname'  => $firstname,
        'lastname'   => $lastname,
        'content'    => $content,
        'image'      => $image,
        'created_at' => date('Y-m-d H:i:s')
    ];

    return $this->db->insert('posts', $data);
}


  public function get_all_posts()
{
    $this->db->select('*');
    $this->db->from('posts');
    $this->db->order_by('created_at', 'DESC');
    return $this->db->get()->result_array();
}
}
