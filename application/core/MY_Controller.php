<?php 

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form', 'security']);

        $this->userdata = $this->session->userdata();
    }

    public function template($view, $data = [])
    {
        
        
        $layout['header'] = 'layout/header';
        $layout['footer'] = 'layout/footer';

        if($this->userdata['role'] == 'admin'){
            $layout['header'] = 'layout/admin_header';
                $layout['footer'] = 'layout/admin_footer';
        }else{
            $layout['header'] = 'layout/header';
                $layout['footer'] = 'layout/footer';
        }

       
        
        $this->load->view($layout['header'], $data);
        $this->load->view($view, $data);
        $this->load->view($layout['footer'], $data);
    }
}