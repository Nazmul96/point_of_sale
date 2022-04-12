<?php
class AdminController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('admin_model');
                $this->load->helper('url_helper');
                $this->lang->load(array('AdminHome','AdminProfile')); 
                
                // if(!rs_valid_user('dashboard')){
                //         show_404();
                //       };
        }

      
        // public function login()
        // {       
        //         $login_info=$this->session->userdata('login_info');
        //         echo '<pre>';
        //         print_r($login_info['email']);
        //         die(); 
        //         // if($this->session->userdata('email')){
        //         //         redirect(base_url('dashboard'));       
        //         // }
        //         // $this->load->view('admin/login');
                  
        // }
        public function dashbaord()
        {
                $this->db->where('group_name','General');
                $this->db->where('settings_name','company_logo');
                $logo=$this->db->get('settings')->row();
                // echo '<pre>';
                // print_r($project_logo);
                // die();

                $this->session->set_userdata('logo',$logo);
               // for multiple user dashboard-----------------------------------
                //data of user who are aleready logged in-------
                $login_info=$this->session->userdata('login_info');
                //calculation for for graph in dashboard       
                $this->db->select_sum('sub_total');
                $this->db->select_sum('received_amount');
                $this->db->select_sum('due_amount');
                $new_data['total_amount'] = $this->db->get('invoices')->row();
                
                //for calculationg total pending amount-------
                $this->db->where('status','Partially');
                $this->db->select_sum('due_amount');
                $partially=$this->db->get('invoices')->row();

                $this->db->where('status','Unpaid');
                $this->db->select_sum('due_amount');
                $unpaid=$this->db->get('invoices')->row();

                $new_data['all_pending_amounnt']=$partially->due_amount + $unpaid->due_amount;

                //calculating all paid received amount----------
                $this->db->where('status','Paid');
                $this->db->select_sum('received_amount');
                $new_data['paid']=$this->db->get('invoices')->row();

                //for calculating every month sales for graph in dashboard
                $this->db->select('YEAR(date) as new_year');
                $this->db->from('invoices')->order_by('id','desc')->limit(1);
                $query=$this->db->get()->result();        
                // echo '<pre>';
                // print_r($query[0]->new_year); 
                // die(); 
                for($i=1; $i<=12; $i++){
                $this->db->where('YEAR(date)',$query[0]->new_year);
                $this->db->where('MONTH(date)',$i);
                $this->db->select_sum('sub_total');
                $monthly_sales[$i]=$this->db->get('invoices')->row();
                } 
                $new_data['monthly_sales'] = $monthly_sales;

    
                //for client----
                if($login_info['user_type'] == '5'){
                        $new_data['main_content']=$this->load->view('client_dashboard/client_home','',true);       
                        $this->load->view('client_dashboard/client_dashboard1',$new_data);  
                }
                else{

                        $this->db->where('id',$login_info['user_type']);
                        $new_data['section']=$this->db->get('roles')->row();
                        $new_data['main_content']=$this->load->view('super_admin_dashboard/super_admin_home','',true);       
                        $this->load->view('super_admin_dashboard/super_admin_dashboard1',$new_data);    
                }
    
        }

        public function admin()
        {                 


               // date_default_timezone_set($generel[8]->settings_value);

                $email=$this->input->post('email');

                $password=md5($this->input->post('password'));
                // echo $password;
                // die();
                $result=$this->admin_model->admin_info($email,$password);
               
                if($result){
                        $data=array();
                        $data['id']=$result->id;
                        $data['first_name']=$result->first_name;
                        $data['last_name']=$result->last_name;
                        $data['email']=$result->email;
                        $data['user_type']=$result->user_type;
                        $data['image']=$result->image;
                        // echo '<pre>';
                        // print_r($data);
                        // die();
                        $this->session->set_userdata('login_info',$data);
                       
                        $datas['ip_address']=$ipaddress = getenv("REMOTE_ADDR"); 
                        $datas['last_login']=date('Y-m-d h:i:s');
                        $this->db->where('email',$email);
                        $this->db->update('users',$datas);
  
         
                                redirect('dashboard');
    
                }
                else{   
                        $this->session->set_flashdata('error',lang('login_message'));
                        redirect(base_url());
                }
        }
        //admin_logout-------
        public function admin_logout()
        {
                //date_default_timezone_set('Asia/Dhaka'); 
                $login_info=$this->session->userdata('login_info');


                $datas['last_logout']=date('Y-m-d h:i:s');
                $this->db->where('email',$login_info['email']);
                $this->db->update('users',$datas);
                
                $this->session->unset_userdata('login_info');
                $this->session->set_flashdata('success', lang('logout_message'));
                redirect(base_url());
        }
        //admin profile-------
        public function admin_profile()
        {       
                $login_info=$this->session->userdata('login_info');
                // echo '<pre>';
                // print_r($login_info[]);
                // die();
                $this->db->where('email',$login_info['email']);
                $data['admin_data']=$this->db->get('users')->row();

                 // for multiple user dashboard-----------------------------------
                //for client----
                if($login_info['user_type'] == '5'){
                    $data['main_content']=$this->load->view('admin/admin_profile',$data,true);     
                    $this->load->view('client_dashboard',$data);  
                }
                else{
                        $this->db->where('id',$login_info['user_type']);
                        $new_data['section']=$this->db->get('roles')->row();

                        $new_data['main_content']=$this->load->view('admin/admin_profile',$data,true);
                        $this->load->view('super_admin_dashboard',$new_data);   
                }

        }

        public function profile_image_update()
        { 
           $login_info=$this->session->userdata('login_info');
              
           $this->db->where('email',$login_info['email']);     
           $old_image=$this->db->get('users')->row();
        //    echo '<pre>';
        //    print_r($old_image);
        //    die(); 
           
           $image = $_FILES['profile_image']['name'];

           if ($image) {
                   
                if (file_exists('images/user/' . $old_image->image)) {
                        unlink('images/user/' . $old_image->image);
                }
                $config['upload_path']   = 'images/user/';
                $config['allowed_types'] = 'gif|jpg|png';
                $sdata = array();
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profile_image')) {
                        $sdata =  $this->upload->data();
                        $data['image'] = $sdata['file_name'];
                } else {
                        $error = $this->upload->display_errors();
                }
                $this->db->where('email',$login_info['email']);  
                $this->db->update('users',$data);
          }
           
        }

        public function admin_personal_info()
        {
                $login_info=$this->session->userdata('login_info');

                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                $this->form_validation->set_rules('admin_email', 'Email', 'valid_email');

                if ($this->form_validation->run() === FALSE) {
                        $array = array(
                                'error' => true,
                                'first_name' => form_error('first_name'),
                                'last_name' => form_error('last_name'),
                                'admin_email' => form_error('admin_email'),
                        );
                        echo json_encode($array);
                } else {
                        $datas['first_name'] = $this->input->post('first_name');
                        $datas['last_name'] = $this->input->post('last_name');
                        $datas['email'] = $this->input->post('admin_email');
                        $datas['gender'] = $this->input->post('gender');
                        $datas['contact_number'] = $this->input->post('admin_phone');
                        $datas['address'] = $this->input->post('admin_address');
                        $datas['date_of_birth'] = $this->input->post('birth_date');
                        // echo '<pre>';
                        // print_r($datas);
                        // die();
                        $this->db->where('email',$login_info['email']); 
                        $this->db->update('users',$datas);
                        echo json_encode('success');
                }
                        
        }

        public function admin_password_change()
        {       
                $login_info=$this->session->userdata('login_info');

                $this->db->where('email',$login_info['email']); 
                $data['admin_data']=$this->db->get('users')->row();

                  // for multiple user dashboard-----------------------------------
                //for client----
                if($login_info['user_type'] == '5'){
                    $data['main_content']=$this->load->view('admin/admin_password_change',$data,true);   
                    $this->load->view('client_dashboard',$data);  
                }
                else{
                        $this->db->where('id',$login_info['user_type']);
                        $new_data['section']=$this->db->get('roles')->row();

                        $new_data['main_content']=$this->load->view('admin/admin_password_change',$data,true);
                        $this->load->view('super_admin_dashboard',$new_data);   
                }

                
        }

        public function admin_password_update()
        {
                // echo 'hgjkashd';
         

                $this->form_validation->set_rules('old_password', 'old pasword', 'callback_old_password'
                );
                $this->form_validation->set_rules('new_password', 'new password','callback_new_password');
                      
                $this->form_validation->set_rules('retype_new_password', 'Password Confirmation', 'required|matches[new_password]',
                        array(
                                'required'=>'This field is required',                   
                        )
                 );  
            
                if ($this->form_validation->run() === FALSE) {
                        // echo 'hi';
                        // die();
                        $array = array(
                                'error' => true,
                                'old_password' => form_error('old_password'),
                                'new_password' => form_error('new_password'),
                                'retype_new_password' => form_error('retype_new_password'),
                        );
                        echo json_encode($array);
                } else {
                        
                        $login_info=$this->session->userdata('login_info');
                         
                         $datas['password']=md5($this->input->post('new_password'));
                        //  echo '<pre>';
                        //  print_r($datas);
                        //  die();
                         $this->db->where('email',$login_info['email']);  
                         $this->db->update('users',$datas);
                         
                        $this->session->set_userdata('message1',lang('password_change_success')); 
                        echo json_encode('success');
                }

        }
        public function new_password($password)
        {
                //echo 'hi friends';              
                $regex_lowercase = '/[a-z]/';
                $regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

                if($password ==''){
                        $this->form_validation->set_message('new_password', 'This field is required'); 
                        return FALSE;   
                }
                else if (preg_match_all($regex_lowercase, $password) < 1)
                {
                        $this->form_validation->set_message('new_password', 'strong password needed');
                        return FALSE;
                }
                if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('new_password', 'strong password needed');

			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('new_password', 'strong password needed');

			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1)
		{
			$this->form_validation->set_message('new_password', 'strong password needed');

			return FALSE;
		}

		if (strlen($password) < 8)
		{
			$this->form_validation->set_message('new_password', 'strong password needed');

			return FALSE;
		}


		return TRUE;


        }

        public function old_password($password1)
        {
                $login_info=$this->session->userdata('login_info');

                $this->db->where('email',$login_info['email']);  
                $pass=$this->db->get('users')->row();
                $password=$pass->password;
    
                // echo $password;
                // die();
              
             if($password1 ==''){
                        $this->form_validation->set_message('old_password', 'This field is required'); 
                        return FALSE;   
                }
            if(md5($password1) != $password){    
                $this->form_validation->set_message('old_password', 'Your old password is not correct'); 
                return FALSE;   
            }     

           return TRUE;    
        }
       

}       