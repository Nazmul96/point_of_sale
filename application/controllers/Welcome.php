<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
	        parent::__construct();
	        $this->load->model('admin_model');
	        $this->load->helper('url_helper');
	        $this->lang->load('AdminHome');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$login_info=$this->session->userdata('login_info');
		
		// if($login_info['email']){
		//    redirect(base_url('dashboard'));
		// }
		$this->load->view('welcome_message');

          //$data['main_content']=$this->load->view('reports/payment_summary',$data);
          // $this->load->view('dashboard',$data); 
	}
	// public function user_roles()
	// { 
	// 	  $abcs=[];
          // $data['main_content']=$this->load->view('user/user_list',$abcs,true);
          // $this->load->view('dashboard',$data); 
	// }
	// public function user_add()
	// { 
	// 	  $abcs=[];
          // $data['main_content']=$this->load->view('user/user_add',$abcs,true);
          // $this->load->view('dashboard',$data); 
	// }
	// public function estimates()
	// { 
	// 	  $abcs=[];
          // $data['main_content']=$this->load->view('estimates/estimates_list',$abcs,true);
          // $this->load->view('dashboard',$data); 
	// }
	// public function estimates_add()
	// { 
	// 	  $abcs=[];
          // $data['main_content']=$this->load->view('estimates/estimates_add',$abcs,true);
          // $this->load->view('dashboard',$data); 
	// } 

	 
}
