<?php
ob_start();
class Category extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		//****************************backtrace prevent*** START HERE*************************
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		$this->load->library('form_validation');
		$this->load->model('General_model');
		$this->load->helper('url');
		$this->load->library('image_lib');
		$this->load->helper('string');
		$this->load->library('session');
		if(!$this->session->userdata('is_logged_in')==1)
		{
		redirect('superpanel','refresh');
		}
		//Admin Access
		$query = $this->General_model->show_data_id('admin_access',$this->session->userdata('access_id'),'admin_id','get','');
		if($query[0]->category == 0 || $query[0]->category == NULL)
		{
		redirect('superpanel/home');
		}
		//End of Admin Access
	}
	public function index()
	{
		$data['category']=$this->General_model->show_data_id('category','','','get','');
		$data['title']   ="Category || Tapas Electric";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/category');
		$this->load->view('superpanel/footer');
	}
	
	public function add()
	{
		$data['title']="Add Category || Tapas Electric";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/add_category');
		$this->load->view('superpanel/footer');
	}

	//========================= Insert Category =================================
	public function insert()
	{
		$this->form_validation->set_rules('slug','slug', 'required|is_unique[category.slug]');
		if ($this->form_validation->run() == FALSE)
		{
		$this->session->set_flashdata('error', 'Category slug already exists on database !');
		redirect('superpanel/category/add');
		}
		else
		{

		$data =$this->input->post();
		$data1= array();

		//For Slug
		$slug =strtolower($data['slug']);
		$slug = preg_replace('/[^a-zA-Z0-9-_\.]/','_',$slug);
		//End Slug

		$config = array(
				'upload_path'   => "uploads/category/",
				'upload_url'    =>  base_url()."uploads/category/",
				'allowed_types' => "gif|jpg|png|jpeg"
				);

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("category_img")) {
		$data['category_img'] = $this->upload->data();

		$configer = array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $data['category_img']['full_path'],
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  1920,
                  'height'          =>  450,
                );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();
		$data1['slug']                = $data['slug'];
		$data1['category_name']       = $data['category_name'];
		$data1['category_img']        = base_url().'uploads/category/'.$data['category_img']['file_name'];
		$data1['category_description']= $data['category_description'];
		$data1['meta_keyword']        = $data['meta_keyword'];
		$data1['meta_description']    = $data['meta_description'];
		$data1['status']              = $data['status'];
		$data1['created_at']          = date('Y/m/d h:i:s');

		$result=$this->General_model->show_data_id('category','','','insert', $data1);
		$this->session->set_flashdata('success', 'Category Page Insert successfully.');
		redirect('superpanel/category');
		}
		}
	}
	//========================= End Insert Category =================================

	//========================= Edit Category =======================================
	public function edit($id)
	{
		$data['category']=$this->General_model->show_data_id('category',$id,'category_id','get','');
		$data['title']="Edit Category || Tapas Electric";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/edit_category');
		$this->load->view('superpanel/footer');
	}
	//========================= End Edit Category ==================================

	//========================= Update Category ====================================
	public function update($id)
	{
		$data =$this->input->post();
		$data1= array();

		$config = array(
				'upload_path'   => "uploads/category/",
				'upload_url'    =>  base_url()."uploads/category/",
				'allowed_types' => "gif|jpg|png|jpeg"
				);

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("category_img")) {
		$data['category_img'] = $this->upload->data();

		$configer = array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $data['category_img']['full_path'],
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  1920,
                  'height'          =>  450,
                );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();

		$data1['category_img']        = base_url().'uploads/category/'.$data['category_img']['file_name'];
		$data1['category_name']       = $data['category_name'];
		$data1['category_description']= $data['category_description'];
		$data1['meta_keyword']        = $data['meta_keyword'];
		$data1['meta_description']    = $data['meta_description'];
		$data1['status']              = $data['status'];
		$data1['created_at']          = date('Y/m/d h:i:s');

		$query=$this->General_model->show_data_id('category',$id,'category_id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->category_img));

        $result=$this->General_model->show_data_id('category',$id,'category_id','update', $data1);
		}else{

		$data1['category_name']       = $data['category_name'];
		$data1['category_description']= $data['category_description'];
		$data1['meta_keyword']        = $data['meta_keyword'];
		$data1['meta_description']    = $data['meta_description'];
		$data1['status']              = $data['status'];
		$data1['created_at']          = date('Y/m/d h:i:s');

		$result=$this->General_model->show_data_id('category',$id,'category_id','update', $data1);
		}
		$this->session->set_flashdata('success', 'Category Page Update successfully.');
		redirect('superpanel/category');
	}
	//========================= End Update Category =================================

	
}