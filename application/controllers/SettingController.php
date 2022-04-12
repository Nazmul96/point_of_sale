<?php
class SettingController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('setting_model');
                $this->load->helper('url_helper');
                $this->lang->load(array('Setting','Common'));
                
                if(!rs_valid_user('setting')){
                        show_404();
                      };
        }

      
      
        public function setting_index()
        {
          $this->db->where('group_name','General');
          $data['generel']=$this->db->get('settings')->result();
        
          $data['timezone']=$this->db->get('timzones')->result();

         // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');
          //for client----------
          if($login_info['user_type']=='5'){ 
                      
                $data['main_content']=$this->load->view('settings/index',$data,true);
                $this->load->view('client_dashboard',$data); 
          }
          else{
                $this->db->where('id',$login_info['user_type']);
                $new_data['section']=$this->db->get('roles')->row(); 

                $new_data['main_content']=$this->load->view('settings/index',$data,true);
                $this->load->view('super_admin_dashboard',$new_data);   
          }
   
        }

        public function general_update()
        {       
               
                  $logo=$_FILES['company_logo']['name'];
                  $icon=$_FILES['company_icon']['name'];
                  $banner=$_FILES['company_banner']['name'];
                  
          //         $old_logo=$this->input->post('old_company_logo');  
                  $post=$this->input->post();
                //   echo '<pre>';
                //   print_r($post);
                //   die();
                  $old_logo=$post['old_company_logo'];
                  $old_icon=$post['old_company_icon'];
                  $old_banner=$post['old_company_banner'];
               
               
               //for logo-------
                  if($logo)
                  {       
                                                                    
                           if(file_exists('images/profile/'.$old_logo)){
                                    
                                    unlink('images/profile/'.$old_logo);     
                              }
                          $target_path = 'images/profile/';
                        //   $config['allowed_types'] = 'gif|jpg|png';

                          $sdata=array();
                        //   $this->load->library('upload', $config);
                           $config1=array(
                                'image_library' =>'gd2',
                                'source_image' =>$_FILES['company_logo']['tmp_name'],
                                'width' =>'50',
                                'height'=>'50',
                                'quality'=>'60%',
                                'new_image'=>FCPATH.$target_path.$logo,
                               );
                               $this->load->library('image_lib');
                               $this->image_lib->initialize($config1);
                               $this->image_lib->resize();
                               $this->image_lib->clear();    
                               $post['company_logo']=$logo;

                  }

                  else{
                           
                    $post['company_logo']=$old_logo;
                    
                  }

                   //for icon------
                  if($icon)
                  {    
                    
                                                                               
                           if(file_exists('images/profile/'.$old_icon)){
                                    
                                unlink('images/profile/'.$old_icon);     
                              }
                          $target_path1 = 'images/profile/';
                          $config2=array(
                                'image_library' =>'gd2',
                                'source_image' =>$_FILES['company_icon']['tmp_name'],
                                'width' =>'50',
                                'height'=>'50',
                                'quality'=>'60%',
                                'new_image'=>FCPATH.$target_path1.$icon,
                               );
                           
                        $this->load->library('image_lib');
                        $this->image_lib->initialize($config2);
                        $this->image_lib->resize();
                        $this->image_lib->clear();    
                        $post['company_icon']=$icon;
                             

                  }

                  else{
                           
                    $post['company_icon']=$old_icon;
                    
                    
                  }
                  //for banner---------
                  if($banner)
                  {    
                    
                                                                               
                           if(file_exists('images/profile/'.$old_banner)){
                              
                                unlink('images/profile/'.$old_banner);     
                              }
                         $config['upload_path']   = 'images/profile/';
                         $config['allowed_types'] = 'gif|jpg|png';
                          $sdata=array();
                          $this->load->library('upload', $config);
                           
                          if ( $this->upload->do_upload('company_banner'))
                          {       
                              //     echo 'hi';
                                  $sdata =  $this->upload->data();
                                  $post['company_banner']=$sdata['file_name'];
                                  
                          }
                          else
                          {       
                                  $error = $this->upload->display_errors();
          
                                  
                          } 

                             

                  }

                  else{
                           
                    $post['company_banner']=$old_banner;
                  
                    
                  }
                  foreach ($post as $key=>$row){     
                        $this->db->where('group_name','General');
                        $this->db->where('settings_name',$key);
                        $this->db->update('settings',['settings_value'=>$row]);
                       }
                  $this->session->set_flashdata('info', 'General successfully updated');
                    redirect('setting_index');
          //         echo '<pre>';   
          //         print_r($post);
          //         die();
          
                   

          //         $language=$this->input->post('language');
          //         $symbol=$this->input->post('currency_symbol');
          //         $date_format=$this->input->post('date_format');
                  
          //         $this->db->where('group_name','General');
          //         $this->db->where('settings_name','company_name');
          //         $this->db->update('settings',['settings_value'=>$compnay_name]);
        }

        //Email setup------------------

        public function email_setup()
        {
                $this->db->where('group_name','Email_setup');
                $data['email_setup']=$this->db->get('settings')->result();
                // echo '<pre>';
                // print_r($data);
                // die();        
                
        // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');
          //for client----------
          if($login_info['user_type']=='5'){ 
                      
                $data['main_content']=$this->load->view('settings/email_setup',$data,true);
                $this->load->view('client_dashboard',$data); 
          }
          else{
                $this->db->where('id',$login_info['user_type']);
                $new_data['section']=$this->db->get('roles')->row();

                $new_data['main_content']=$this->load->view('settings/email_setup',$data,true);
                $this->load->view('super_admin_dashboard',$new_data);
          }

        }

       public function email_setup_update()
       {        
        //$this->load->library('form_validation');
               
             $email_setup=$this->input->post();
        //      print_r($email_setup);
        //      die();
        //      echo $email_setup['value1'];
        //      echo $email_setup['value2'];


     if($email_setup['supported_mail_services']=='smtp'){
        $this->form_validation->set_rules('sent_from_name', 'Name', 'required',
            array('required' => lang('the_sent_from_name_field_is_required'))     
         );
        $this->form_validation->set_rules('sent_from_email', 'Email', 'required',
         array('required' => lang('the_sent_from_email_field_is_required'))
        );       
        $this->form_validation->set_rules('smtp_host','Smtp_host', 'required',
        array('required' => lang('the_smtp_host_field_is_required')) 
        );
        $this->form_validation->set_rules('port', 'Port','required',
        array('required' => lang('the_port_field_is_required'))
        );   
        $this->form_validation->set_rules('password_access','Password_access', 'required',
        array('required' => lang('the_password_access_field_is_required'))
        );
        $this->form_validation->set_rules('encryption_type', 'Encryption_type', 'required',
        array('required' => lang('the_encryption_type_field_is_required'))
        );

        if ($this->form_validation->run() === FALSE)
        {          
           //echo 'hi';
           $array = array(
                   'error' => true,
                   'name' => form_error('sent_from_name'),
                   'email' => form_error('sent_from_email'),
                   'smtp_host' => form_error('smtp_host'),
                   'port' => form_error('port'),
                   'password_access' => form_error('password_access'),
                   'encryption_type' => form_error('encryption_type'),
               );
               echo json_encode($array);

        }
        else{

                foreach ($email_setup as $key=>$row){     
                        $this->db->where('group_name','Email_setup');
                        $this->db->where('settings_name',$key);
                        $this->db->update('settings',['settings_value'=>$row]);
                       }
                       echo json_encode('success');  
        }   
     }
     else if($email_setup['supported_mail_services']=='sendmail')
     {    
        $this->form_validation->set_rules('mailpath', 'mailpath', 'required',
           array('required' => lang('the_mailpath_field_is_required')) 
        );
        $this->form_validation->set_rules('sent_from_name', 'Name', 'required',
            array('required' => lang('the_sent_from_name_field_is_required'))     
         );
        $this->form_validation->set_rules('sent_from_email', 'Email', 'required',
         array('required' => lang('the_sent_from_email_field_is_required'))
        ); 
        if ($this->form_validation->run() === FALSE)
        {          
           //echo 'hi';
           $array = array(
                   'error' => true,
                   'name' => form_error('sent_from_name'),
                   'email' => form_error('sent_from_email'),
                   'mailpath' => form_error('mailpath'),
               );
               echo json_encode($array);

        }
        else{

                foreach ($email_setup as $key=>$row){     
                        $this->db->where('group_name','Email_setup');
                        $this->db->where('settings_name',$key);
                        $this->db->update('settings',['settings_value'=>$row]);
                       }
                       echo json_encode('success');    
        }  

     }
     else
     {
          foreach ($email_setup as $key=>$row){     
                $this->db->where('group_name','Email_setup');
                $this->db->where('settings_name',$key);
                $this->db->update('settings',['settings_value'=>$row]);
               }
               echo json_encode('success');  
     }
       
       
       

     }

     //settings Payment Method------

     public function payment_method()
     {      

            // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');
          //for client----------
          if($login_info['user_type']=='5'){ 
                      
                $data['main_content']=$this->load->view('settings/payment_setting/payment_method','',true);
                $this->load->view('client_dashboard',$data); 
          }
          else{
                $this->db->where('id',$login_info['user_type']);
                $new_data['section']=$this->db->get('roles')->row();

                $new_data['main_content']=$this->load->view('settings/payment_setting/payment_method','',true);
                $this->load->view('super_admin_dashboard',$new_data);   
          }
     }

     public function payment_insert()
     {
         
         $types=$this->input->post('payment_types');

         if($types=='cash'){
        $this->form_validation->set_rules('payment_name', 'Payment_name', 'required',
          array('required' => lang('the_name_field_is_required'))
       );
        $this->form_validation->set_rules('payment_types', 'Payment_types', 'required',
        array('required' => lang('the_type_field_is_required'))
      );
         if ($this->form_validation->run() === FALSE)
         {          
           $array = array(
                   'error' => true,
                   'name' => form_error('payment_name'),
                   'types' => form_error('payment_types'),
               );
               echo json_encode($array);

        }
        else
        {  
           $datas['name']= $this->input->post('payment_name');
           $datas['type']= $this->input->post('payment_types');
           $this->db->insert('settings_payment', $datas);     
           echo json_encode('success');
                
 
        }
       }
       else if($types=='stripe'){
                $this->form_validation->set_rules('payment_name', 'Payment_name', 'required',
                array('required' => lang('the_name_field_is_required'))
                );
                $this->form_validation->set_rules('public_key', 'Public_key', 'required',
                array('required' => lang('the_public_key_field_is_required'))
                );
                $this->form_validation->set_rules('secret_key', 'Secret_key', 'required',
                array('required' => lang('the_secret_key_field_is_required'))
                );
                if ($this->form_validation->run() === FALSE)
                {          
                  $array = array(
                          'error' => true,
                          'name' => form_error('payment_name'),
                          'public_key' => form_error('public_key'),
                          'secret_key' => form_error('secret_key'),
                      );
                      echo json_encode($array);
       
               }
               else {
                $default=$this->input->post('mark_default');
                if($default){
                        $datas['name']= $this->input->post('payment_name');
                        $datas['type']= $this->input->post('payment_types');
                        $datas['public_key']= $this->input->post('public_key');
                        $datas['secret_key']= md5($this->input->post('secret_key'));
                        $datas['default_field']= $this->input->post('mark_default');
                        $this->db->insert('settings_payment', $datas);   
                        echo json_encode('success');  
                }
                else{
                        $datas['name']= $this->input->post('payment_name');
                        $datas['type']= $this->input->post('payment_types');
                        $datas['public_key']= $this->input->post('public_key');
                        $datas['secret_key']= md5($this->input->post('secret_key'));
                        $this->db->insert('settings_payment', $datas);   
                        echo json_encode('success'); 
                }
                  
               
               }  
       }
       else {
                $this->form_validation->set_rules('payment_name', 'Payment_name', 'required',
                  array('required' => lang('the_name_field_is_required'))
                );
                $this->form_validation->set_rules('payment_types', 'Payment_types', 'required',
                 array('required' => lang('the_type_field_is_required'))
               );
                $this->form_validation->set_rules('client_id', 'Client_id', 'required',
                 array('required' => lang('the_client_id_field_is_required'))
                );
                $this->form_validation->set_rules('secret_key', 'Secret_key', 'required',
                 array('required' => lang('the_secret_key_field_is_required'))
                );
                $this->form_validation->set_rules('mode', 'Mode', 'required',
                array('required' => lang('please_enter_your_client_name'))
               );
                if ($this->form_validation->run() === FALSE)
                {          
                $array = array(
                        'error' => true,
                        'name' => form_error('payment_name'),
                        'types' => form_error('payment_types'),
                        'client_id' => form_error('client_id'),
                        'secret_key' => form_error('secret_key'),
                        'mode' => form_error('mode'),
                );
                echo json_encode($array);

               }
               else{
                $default=$this->input->post('mark_default');
                if($default){        
                $datas['name']= $this->input->post('payment_name');
                $datas['type']= $this->input->post('payment_types');
                $datas['client_id']= $this->input->post('client_id');
                $datas['secret_key']= md5($this->input->post('secret_key'));
                $datas['default_field']= $this->input->post('mark_default');
                $datas['mode']= $this->input->post('mode');
                $this->db->insert('settings_payment', $datas);         
                echo json_encode('success');
                }
                else{
                        $datas['name']= $this->input->post('payment_name');
                        $datas['type']= $this->input->post('payment_types');
                        $datas['client_id']= $this->input->post('client_id');
                        $datas['secret_key']= md5($this->input->post('secret_key'));
                        $datas['mode']= $this->input->post('mode');
                        $this->db->insert('settings_payment', $datas);         
                        echo json_encode('success');    
                }      
               }     
       }

     }

    public function all_payment()
    {
          $payments=$this->db->order_by('id',"DESC")->get('settings_payment')->result();
          echo json_encode($payments);  
    } 
    public function payment_stting_delete()
    {
        $id=$this->input->get('id');
      
        $this->db->where('id',$id);
        $this->db->delete('settings_payment');
        echo json_encode('payment method has beben delete successfully');  
    }
    
    public function payment_setting_edit()
    {   
        $id=$this->input->get('id');

        $this->db->where('id',$id);
        $datas['payment_stting_edit']= $this->db->get('settings_payment')->row();

        $result=$this->load->view('settings/payment_setting/payment_method_edit',$datas);
        echo json_encode($result);
        
    }
    
    public function payment_setting_update()
    {   
        $id=$this->input->post('id');
        $types=$this->input->post('payment_types');
        // echo $types;
        // die();
        if($types=='cash'){
                $this->form_validation->set_rules('payment_name', 'Payment_name', 'required',
                array('required' => lang('the_name_field_is_required'))
             );
              $this->form_validation->set_rules('payment_types', 'Payment_types', 'required',
              array('required' => lang('the_type_field_is_required'))
            );
                 if ($this->form_validation->run() === FALSE)
                 {          
                   $array = array(
                           'error' => true,
                           'name' => form_error('payment_name'),
                           'types' => form_error('payment_types'),
                       );
                       echo json_encode($array);
        
                }
                else
                {  
                   $datas['name']= $this->input->post('payment_name');
                   $datas['type']= $this->input->post('payment_types');
                   $datas['status']= $this->input->post('status');
                   $this->db->where('id',$id);
                    $this->db->update('settings_payment', $datas);     
                   echo json_encode('success');

                }
        }
        else if($types=='stripe'){
                $this->form_validation->set_rules('payment_name', 'Payment_name', 'required',
                array('required' => lang('the_name_field_is_required'))
                );
                $this->form_validation->set_rules('public_key', 'Public_key', 'required',
                array('required' => lang('the_public_key_field_is_required'))
                );
                $this->form_validation->set_rules('secret_key', 'Secret_key', 'required',
                array('required' => lang('the_secret_key_field_is_required'))
                );
                if ($this->form_validation->run() === FALSE)
                {          
                  $array = array(
                          'error' => true,
                          'name' => form_error('payment_name'),
                          'public_key' => form_error('public_key'),
                          'secret_key' => form_error('secret_key'),
                      );
                      echo json_encode($array);
       
               }
               else {

                $default=$this->input->post('mark_default');
                if($default){
                        $datas['name']= $this->input->post('payment_name');
                        $datas['type']= $this->input->post('payment_types');
                        $datas['status']= $this->input->post('status');
                        $datas['public_key']= $this->input->post('public_key');
                        $datas['secret_key']= md5($this->input->post('secret_key'));
                        $datas['default_field']= $this->input->post('mark_default');
                        $this->db->where('id',$id);
                        $this->db->update('settings_payment', $datas); 
                        echo json_encode('success');  
                }
                else{
                        $datas['name']= $this->input->post('payment_name');
                        $datas['type']= $this->input->post('payment_types');
                        $datas['status']= $this->input->post('status');
                        $datas['public_key']= $this->input->post('public_key');
                        $datas['secret_key']= md5($this->input->post('secret_key'));
                        $datas['default_field']='1';
                        $this->db->where('id',$id);
                        $this->db->update('settings_payment', $datas);  
                        echo json_encode('success'); 
                }
                  
               
               }  
        }
        else {
                $this->form_validation->set_rules('payment_name', 'Payment_name', 'required',
                  array('required' => lang('the_name_field_is_required'))
                );
                $this->form_validation->set_rules('payment_types', 'Payment_types', 'required',
                 array('required' => lang('the_type_field_is_required'))
               );
                $this->form_validation->set_rules('client_id', 'Client_id', 'required',
                 array('required' => lang('the_client_id_field_is_required'))
                );
                $this->form_validation->set_rules('secret_key', 'Secret_key', 'required',
                 array('required' => lang('the_secret_key_field_is_required'))
                );
                $this->form_validation->set_rules('mode', 'Mode', 'required',
                array('required' => lang('please_enter_your_client_name'))
               );
                if ($this->form_validation->run() === FALSE)
                {          
                $array = array(
                        'error' => true,
                        'name' => form_error('payment_name'),
                        'types' => form_error('payment_types'),
                        'client_id' => form_error('client_id'),
                        'secret_key' => form_error('secret_key'),
                        'mode' => form_error('mode'),
                );
                echo json_encode($array);

               }
               else{
                $default=$this->input->post('mark_default');
                if($default){        
                $datas['name']= $this->input->post('payment_name');
                $datas['type']= $this->input->post('payment_types');
                $datas['status']= $this->input->post('status');
                $datas['client_id']= $this->input->post('client_id');
                $datas['secret_key']= md5($this->input->post('secret_key'));
                $datas['default_field']= $this->input->post('mark_default');
                $datas['mode']= $this->input->post('mode');
                $this->db->where('id',$id);
                $this->db->update('settings_payment', $datas);  
                echo json_encode('success'); 
                }
                else{
                        $datas['name']= $this->input->post('payment_name');
                        $datas['type']= $this->input->post('payment_types');
                        $datas['status']= $this->input->post('status');
                        $datas['client_id']= $this->input->post('client_id');
                        $datas['secret_key']= md5($this->input->post('secret_key'));
                        $datas['default_field']='1';
                        $datas['mode']= $this->input->post('mode');
                        $this->db->where('id',$id);
                        $this->db->update('settings_payment', $datas);  
                        echo json_encode('success');    
                }      
               }     
       }
 
    }
    //notification setting-----
    public function notification_index()
    {

        // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');
          //for client----------
          if($login_info['user_type']=='5'){ 
                      
                $data['main_content']=$this->load->view('settings/notification/notification_index','',true);
                $this->load->view('client_dashboard',$data); 
          }
          else{
                $this->db->where('id',$login_info['user_type']);
                $new_data['section']=$this->db->get('roles')->row();  

                $new_data['main_content']=$this->load->view('settings/notification/notification_index','',true);
                $this->load->view('super_admin_dashboard',$new_data);   
          }
    
    }
    public function notification_edit()
    {   
        $id=$this->input->get('id');

        $this->db->where('id',$id);
        $datas['notification_edit']= $this->db->get('notifications')->row();
        // echo '<pre>';
        // echo($notification_edit->tags);
        // die();
        $result=$this->load->view('settings/notification/notification_edit',$datas);
        echo json_encode($result);
    }

    public function notification_update()
    {
        $id=$this->input->post('id');
        $mail_subject=$datas['mail_subject']= $this->input->post('mail_subject'); 
        if(!empty($mail_subject)){
            $datas['mail_body']= $this->input->post('content');
            $this->db->where('id',$id);
            $this->db->update('notifications', $datas);     
            echo json_encode('success');      
        }
        else{
           $data['system_content']= $this->input->post('system_content');
           $this->db->where('id',$id);
           $this->db->update('notifications', $data);     
           echo json_encode('success');     
        }
          
    }

    //invoice_setting-------

    public function invoice_setting_index()
    {
        $this->db->where('group_name','Invoice');
        $data['invoice_setting']=$this->db->get('settings')->result();

          // for multiple user dashboard-----------------------------------
            //data of user who are aleready logged in-------
            $login_info=$this->session->userdata('login_info');
             //for client----------
          if($login_info['user_type']=='5'){ 
               
              $data['main_content']=$this->load->view('settings/invoice_setting',$data,true);
              $this->load->view('client_dashboard',$data);
             }
          else{ 
              $this->db->where('id',$login_info['user_type']);
              $new_data['section']=$this->db->get('roles')->row();

              $new_data['main_content']=$this->load->view('settings/invoice_setting',$data,true); 
              $this->load->view('super_admin_dashboard',$new_data); 
             }

    }

    public function invoice_setting_update()
    {
        $invoice=$this->db->from("invoices")->count_all_results();
        if($invoice > 0){
                $this->session->set_flashdata('warning', lang('Invoice number already in use but others settings saved successfully'));
                echo json_encode('success');   
        } 
        else{
                $post=$this->input->post();
                $image=$_FILES['invoice_logo']['name'];
             
                $this->form_validation->set_rules('invoice_starting_number', 'Invoice Number', 'required',
                array('required' => lang('the_invoice_number_field_is_required'))
                );
                if ($this->form_validation->run() === FALSE)
                {          
                $array = array(
                        'error' => true,
                        'invoice_number' => form_error('invoice_starting_number'),
                );
                echo json_encode($array);
        
                }
                else
                {  
                        if($image){
                                if(file_exists('images/invoice/'.$post['old_invoice_logo'])){
                                        unlink('images/invoice/'.$post['old_invoice_logo']);     
                                      }
                                $config['upload_path']   = 'images/invoice/';
                                $config['allowed_types'] = 'gif|jpg|png';
                                $sdata=array();
                                $this->load->library('upload', $config);
                                
                                if ( $this->upload->do_upload('invoice_logo'))
                                  {       
                                          $sdata =  $this->upload->data();
                                          $post['invoice_logo']=$sdata['file_name'];
                                          
                                  }
                                  else
                                  {       
                                          $error = $this->upload->display_errors();
                  
                                          
                                  }
                                  foreach ($post as $key=>$row){     
                                        $this->db->where('group_name','Invoice');
                                        $this->db->where('settings_name',$key);
                                        $this->db->update('settings',['settings_value'=>$row]);
                                        
                                       }  
                                      
                        }
                        else{
                                $data['invoice_logo']=$post['old_invoice_logo'];
                                foreach ($post as $key=>$row){     
                                          $this->db->where('group_name','Invoice');
                                          $this->db->where('settings_name',$key);
                                          $this->db->update('settings',['settings_value'=>$row]);
                                         }
                        }
                        
                        
                        echo json_encode('success');    
                }    
        } 
       


        
    }

    //tax setting--------
    public function tax_setting_index()
    {
         // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');
          //for client----------
          if($login_info['user_type']=='5'){ 
                      
                $data['main_content']=$this->load->view('settings/tax_setting/tax_index','',true);
                $this->load->view('client_dashboard',$data); 
          }
          else{
                $this->db->where('id',$login_info['user_type']);
                $new_data['section']=$this->db->get('roles')->row(); 

                $new_data['main_content']=$this->load->view('settings/tax_setting/tax_index','',true);
                $this->load->view('super_admin_dashboard',$new_data);     
          }
    }

    public function tax_insert()
    {
        $this->form_validation->set_rules('name', 'Tax Name', 'required',
            array('required' => lang('the_name_field_is_required'))
       );
        $this->form_validation->set_rules('value', 'Tax value', 'required',
            array('required' => lang('the_value_field_is_required'))
        );
         if ($this->form_validation->run() === FALSE)
         {          
           $array = array(
                   'error' => true,
                   'name' => form_error('name'),
                   'value' => form_error('value'),
               );
               echo json_encode($array);

        }
        else
        {  
           $datas['tax_name']= $this->input->post('name');
           $datas['tax_value']= $this->input->post('value');
           $datas['is_default']= $this->input->post('is_default');

           $this->db->insert('setting_taxs', $datas);     
           echo json_encode('success');
                
 
        }
    }

    public function all_tax_data()
    {
        $all_tax=$this->db->order_by('id',"DESC")->get('setting_taxs')->result();
        echo json_encode($all_tax); 
    }

    public function tax_stting_delete()
    {
        $id=$this->input->get('id');
      
        $this->db->where('id',$id);
        $this->db->delete('setting_taxs');
        echo json_encode('Taxs has beben delete successfully');  
    }

    public function tax_setting_edit()
    {
        $id=$this->input->get('id');

        $this->db->where('id',$id);
        $datas['tax_stting_edit']= $this->db->get('setting_taxs')->row();

        $result=$this->load->view('settings/tax_setting/edit',$datas);
        echo json_encode($result);   
    }

    public function tax_update()
    {
        $id=$this->input->post('id');

        $this->form_validation->set_rules('name', 'Tax Name', 'required',
        array('required' => lang('the_name_field_is_required'))
        );
        $this->form_validation->set_rules('value', 'Tax value', 'required',
                array('required' => lang('the_value_field_is_required'))
        );
         if ($this->form_validation->run() === FALSE)
         {          
           $array = array(
                   'error' => true,
                   'name' => form_error('name'),
                   'value' => form_error('value'),
               );
               echo json_encode($array);

        }
        else
        {  
           $datas['tax_name']= $this->input->post('name');
           $datas['tax_value']= $this->input->post('value');
           $datas['is_default']= $this->input->post('is_default');

           $this->db->where('id',$id);
           $this->db->update('setting_taxs', $datas);     
           echo json_encode('success');
                
 
        }
        
    }

} 