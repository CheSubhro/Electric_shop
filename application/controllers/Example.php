<?php
ob_start();
class Example extends CI_Controller{
    
    function __construct() {
        parent::__construct();
		$this->load->model('General_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('text');
    }	
    function index()
    {
        $data['title']='Page not found';

        $this->load->view('page_404',$data);
    }

    function insert()
    {
        $data = array(

               'firstname'=> $this->input->post('firstname'),
               'lastname' => $this->input->post('lastname');
               'address'  => $this->input->post('address');
               'phone_no' => $this->input->post('phone_no');
        );

        $this->db->insert('example',$data);
    }
	

	
}