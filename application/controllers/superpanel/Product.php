<?php
ob_start();
class Product extends CI_Controller {
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
		if($query[0]->product == 0 || $query[0]->product == NULL)
		{
		redirect('superpanel/home');
		}
		//End of Admin Access
	}
	public function index()
	{
		$data['product'] =$this->General_model->show_data_id('product','','','get','');
		$data['category']=$this->General_model->show_data_id('category','','category_id','get','');
		$data['title']   ="Product || Tapas Electric";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/product');
		$this->load->view('superpanel/footer');
	}
	
	public function add()
	{
		$data['category']=$this->General_model->show_data_id('category','','category_id','get','');
		$data['title']="Add Product || Tapas Electric";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/add_product');
		$this->load->view('superpanel/footer');
	}

	//========================= Insert Product =================================
	public function insert()
	{
		$this->form_validation->set_rules('slug','slug', 'required|is_unique[product.slug]');
		if ($this->form_validation->run() == FALSE)
		{
		$this->session->set_flashdata('error', 'Product slug already exists on database !');
		redirect('superpanel/product/add');
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
				'upload_path'   => "uploads/product/",
				'upload_url'    =>  base_url()."uploads/product/",
				'allowed_types' => "gif|jpg|png|jpeg"
				);

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("product_img")) {
		$data['product_img'] = $this->upload->data();

		$configer = array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $data['product_img']['full_path'],
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  1920,
                  'height'          =>  450,
                );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();
        $product_name=ucwords(strtolower($this->input->post('product_name')));
		$data1['slug']                = $data['slug'];
		$data1['category_id']         = $data['category_id'];
		$data1['product_code']        = $data['product_code'];
		$data1['product_name']        = $product_name;
		$data1['product_description'] = $data['product_description'];
		$data1['product_img']         = base_url().'uploads/product/'.$data['product_img']['file_name'];

		$data1['video']               = $data['video'];
		$data1['quantity']            = $data['quantity'];
		$data1['color']               = $data['color'];
		$data1['price']               = $data['price'];
		$data1['sales_price']         = $data['sales_price'];

		$data1['shipping_charge']     = $data['shipping_charge'];
		$data1['taxes']               = $data['taxes'];

		$data1['meta_keyword']        = $data['meta_keyword'];
		$data1['meta_description']    = $data['meta_description'];

		$data1['featured']            = $data['featured'];
		$data1['stock']               = $data['stock'];
		$data1['status']              = $data['status'];
		$data1['created_at']          = date('Y/m/d h:i:s');

		$result=$this->General_model->show_data_id('product','','','insert', $data1);
		$this->session->set_flashdata('success', 'Product Page Insert successfully.');
		redirect('superpanel/product');
		}
		}
	}
	//========================= End Insert Product =================================

	//========================= Edit Product =======================================
	public function edit($id)
	{
		$data['product']=$this->General_model->show_data_id('product',$id,'id','get','');
		$data['title']="Edit Product || Tapas Electric";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/edit_product');
		$this->load->view('superpanel/footer');
	}
	//========================= End Edit Product ==================================

	//========================= Update Product ====================================
	public function update($id)
	{
		$data =$this->input->post();
		$data1= array();

		$config = array(
				'upload_path'   => "uploads/product/",
				'upload_url'    =>  base_url()."uploads/product/",
				'allowed_types' => "gif|jpg|png|jpeg"
				);

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("product_img")) {
		$data['product_img'] = $this->upload->data();

		$configer = array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $data['product_img']['full_path'],
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  1920,
                  'height'          =>  450,
                );

        $this->image_lib->clear();
        $this->image_lib->initialize($configer);
        $this->image_lib->resize();
        $product_name=ucwords(strtolower($this->input->post('product_name')));

		$data1['product_code']        = $data['product_code'];
		$data1['product_name']        = $product_name;
		$data1['product_description'] = $data['product_description'];
		$data1['product_img']         = base_url().'uploads/product/'.$data['product_img']['file_name'];

		$data1['video']               = $data['video'];
		$data1['quantity']            = $data['quantity'];
		$data1['color']               = $data['color'];
		$data1['price']               = $data['price'];
		$data1['sales_price']         = $data['sales_price'];

		$data1['shipping_charge']     = $data['shipping_charge'];
		$data1['taxes']               = $data['taxes'];

		$data1['meta_keyword']        = $data['meta_keyword'];
		$data1['meta_description']    = $data['meta_description'];

		$data1['featured']            = $data['featured'];
		$data1['stock']               = $data['stock'];
		$data1['status']              = $data['status'];
		$data1['created_at']          = date('Y/m/d h:i:s');

		$query=$this->General_model->show_data_id('product',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->product_img));

        $result=$this->General_model->show_data_id('product',$id,'id','update', $data1);
		}else{

		$data1['product_code']        = $data['product_code'];
		$data1['product_name']        = $product_name;
		$data1['product_description'] = $data['product_description'];

		$data1['video']               = $data['video'];
		$data1['quantity']            = $data['quantity'];
		$data1['color']               = $data['color'];
		$data1['price']               = $data['price'];
		$data1['sales_price']         = $data['sales_price'];

		$data1['shipping_charge']     = $data['shipping_charge'];
		$data1['taxes']               = $data['taxes'];

		$data1['meta_keyword']        = $data['meta_keyword'];
		$data1['meta_description']    = $data['meta_description'];

		$data1['featured']            = $data['featured'];
		$data1['stock']               = $data['stock'];
		$data1['status']              = $data['status'];
		$data1['created_at']          = date('Y/m/d h:i:s');

		$result=$this->General_model->show_data_id('product',$id,'id','update', $data1);
		}
		$this->session->set_flashdata('success', 'Product Page Update successfully.');
		redirect('superpanel/product');
	}
	//========================= End Update Product =================================

	//========================= Delete product =================================
    public function delete_product($id)
     { 
        $query=$this->General_model->show_data_id('product',$id,'id','get','');
        @unlink(str_replace(base_url(),'',$query[0]->product_img));

        $query1=$this->General_model->show_data_id('product',$id,'id','delete','');
        $this->session->set_flashdata('success', 'Product Deleted successfully.');
        redirect('superpanel/product');
    
     }
    //=========================End Delete product ================================= 

	
}