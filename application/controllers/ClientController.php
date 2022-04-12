<?php
class ClientController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('client_model');
                $this->load->helper('url_helper');
                $this->lang->load('Client');
                $this->load->driver('cache');
                $this->load->library('email');
                
                if(!rs_valid_user('client')){
                  show_404();
                };
        }

        public function client_registration()
        {
          $this->load->view('client/client_registration');
        }
        public function client_registration_insert()
        {
          $this->form_validation->set_rules('client_name', 'client_name', 'required');
          $this->form_validation->set_rules('client_number', 'client_number', 'required');
          $this->form_validation->set_rules('client_email', 'client_email', 'required|is_unique[clients.client_email]');
           if ($this->form_validation->run() === FALSE)
           {          
             $array = array(
                     'error' => true,
                     'client_name' => form_error('client_name'),
                     'client_number' => form_error('client_number'),
                     'client_email' => form_error('client_email'),
                 );
                 echo json_encode($array);
  
          }
          else{

          $name=$data['client_name']= $this->input->post('client_name');
          $data['client_number']= $this->input->post('client_number');
          $client_email=$data['client_email']= $this->input->post('client_email');
          $data['contact_number']= $this->input->post('phone');
          $data['password']= md5($this->input->post('password'));
          $data['address']= $this->input->post('address');
          $data['city']= $this->input->post('city');
          $data['state']= $this->input->post('state');
          $data['postal_code']= $this->input->post('postal_code');
          $data['country']= $this->input->post('country');
          $data['website']= $this->input->post('website');
          $data['note']= $this->input->post('note');
          $client_pass=$this->input->post('password');
          $this->db->insert('clients', $data);
          
           //Mailing system work here---------------
           $this->db->where('group_name','General');
           $this->db->where('settings_name','company_name');
           $company_name=$this->db->get('settings')->row();
 
           $this->db->where('group_name','Email_setup');
           $settings=$this->db->get('settings')->result();

          $this->db->where('id',6);
          $email=$this->db->get('notifications')->row();
          
          $change=["{app_name}"];
          $change_to=[$company_name->settings_value];
          $system_content=str_replace($change,$change_to,$email->system_content);
         
          $login_info=$this->session->userdata('login_info');
          $notification_info['type']='User joined';
          $notification_info['content']=$system_content;   
          $notification_info['date_time']=date("Y-m-d g:i a");
          $notification_info['action_by']='0';
          $this->db->insert('notification_content',$notification_info);  

           
          $change=["{app_name}"];
          $change_to=[$company_name->settings_value];
          $email_subject=str_replace($change,$change_to,$email->mail_subject);  
        

          $source=["{receiver_name}","{name}","{app_name}"];
          $dest = [$name,$name,$company_name->settings_value];
          $email_body=str_replace($source,$dest,$email->mail_body);

          //for sending email------------- 
          rs_email($client_email,$email_subject,$email_body);

          $this->session->set_userdata('message1',lang('reg_success'));
          echo json_encode('success'); 
          }
        }
        public function index()
        {
          
          $data['all_clients']=$this->client_model->get_client();    

              // for multiple user dashboard-----------------------------------
            //data of user who are aleready logged in-------
            $login_info=$this->session->userdata('login_info');
             //for client----------
             if($login_info['user_type']=='5'){   
              $data['main_content']=$this->load->view('client/index',$data,true); 
              $this->load->view('client_dashboard',$data);
             }
             else{
                $this->db->where('id',$login_info['user_type']);
                $new_data['section']=$this->db->get('roles')->row();

                $new_data['main_content']=$this->load->view('client/index',$data,true); 
                $this->load->view('super_admin_dashboard',$new_data);  
             }
  
        }

        public function insert()
        {

          $this->form_validation->set_rules('client_name', 'client name', 'required',
               array('required' => lang('please_enter_your_client_name'))
          );
          $this->form_validation->set_rules('client_number', 'client number', 'required',
              array('required' => lang('please_enter_your_client_nubmer'))
        );
          $this->form_validation->set_rules('client_email', 'client email', 'required|is_unique[clients.client_email]',
          array(
            'required' => lang('please_enter_a_valid_email_address'),
            'is_unique'     => lang('this_already_exists')
            
            ) 
        );
        $this->form_validation->set_rules('password', 'password', 'required|min_length[8]',
        array(
          'required' => lang('please_provide_a_password'),
          'min_length'     => lang('your_password_must_be_at_least_8_characters_long') 
          )
        ); 
          $this->form_validation->set_rules('retype_password', 'retype password', 'required|min_length[8]|matches[password]',
          array(
            'required' => lang('this_field_is_required'),
            'min_length'     =>lang('our_password_must_be_at_least_8_characters_long'),
            'matches'     => lang('Please_enter_the_same_password_as_above'), 
            )   
      
         );
           if ($this->form_validation->run() === FALSE)
           {          
             $array = array(
                     'error' => true,
                     'client_name' => form_error('client_name'),
                     'client_number' => form_error('client_number'),
                     'client_email' => form_error('client_email'),
                     'password' => form_error('password'),
                     'retype_password'=>form_error('retype_password'),
                 );
                 echo json_encode($array);
  
          }
          else{

          $name=$data['client_name']= $this->input->post('client_name');
          $data['client_number']= $this->input->post('client_number');
          $client_email=$data['client_email']= $this->input->post('client_email');
          $data['contact_number']= $this->input->post('phone');
          $data['password']= md5($this->input->post('password'));
          $data['address']= $this->input->post('address');
          $data['city']= $this->input->post('city');
          $data['state']= $this->input->post('state');
          $data['postal_code']= $this->input->post('postal_code');
          $data['country']= $this->input->post('country');
          $data['website']= $this->input->post('website');
          $data['note']= $this->input->post('note');
          $client_pass=$this->input->post('password');
          $this->db->insert('clients', $data);
          
          //Mailing system work here---------------
          $this->db->where('group_name','General');
          $this->db->where('settings_name','company_name');
          $company_name=$this->db->get('settings')->row();

          $this->db->where('group_name','Email_setup');
          $settings=$this->db->get('settings')->result();
          // echo '<pre>';
          // print_r($settings);
          // die();
          $this->db->where('id',3);
          $email=$this->db->get('notifications')->row();
          
          $change=["{app_name}","{action_by}"];
          $change_to=[$company_name->settings_value,"Nazmul"];
          $email_subject=str_replace($change,$change_to,$email->mail_subject);  
          

          $source=["{receiver_name}","{email}","{password}","{app_name}"];
          $dest = [$name,$client_email,$client_pass,$company_name->settings_value];
          $email_body=str_replace($source,$dest,$email->mail_body);
          // die();

          
            //for sending email------------- 
            rs_email($client_email,$email_subject,$email_body);
           

            echo json_encode('success');  
          // $this->session->set_flashdata('info', 'Client successfully updated');
          // redirect('client_index');
          }
        }
        public function delete($id)
        { 
          $this->client_model->client_delete($id);
          $this->session->set_flashdata('warning',lang('category_delete'));        
          redirect('client_index');
        }

        public function edit($id)
        { 
          $this->db->where('id',$id);
          $datas['client_value']= $this->db->get('clients')->row();
         
          $result=$this->load->view('client/edit',$datas);
          echo json_encode($result);
        }

        public function update()
        {
          $old_email=$this->input->post('old_client_email');
          $new_email=$this->input->post('client_email');
          
          // $data = array();
          // $id= $this->input->post('client_id');
          if($old_email==$new_email){
          $id=$this->input->post('id');
          $this->form_validation->set_rules('client_name', 'client name', 'required',
          array('required' => lang('please_enter_your_client_name'))
          );
          $this->form_validation->set_rules('client_number', 'client number', 'required',
              array('required' => lang('please_enter_your_client_nubmer'))
        );
          $this->form_validation->set_rules('client_email', 'client email', 'required',
          array(
            'required' => lang('please_enter_a_valid_email_address'),
            ) 
        );
        $this->form_validation->set_rules('password', 'password', 'required|min_length[8]',
        array(
          'required' => lang('please_provide_a_password'),
          'min_length'     => lang('your_password_must_be_at_least_8_characters_long') 
          )
        ); 
          $this->form_validation->set_rules('retype_password', 'retype password', 'required|min_length[8]|matches[password]',
          array(
            'required' => lang('this_field_is_required'),
            'min_length'     =>lang('our_password_must_be_at_least_8_characters_long'),
            'matches'     => lang('Please_enter_the_same_password_as_above'), 
            )   

        );
           if ($this->form_validation->run() === FALSE)
           {          
             $array = array(
                     'error' => true,
                     'error' => true,
                     'client_name' => form_error('client_name'),
                     'client_number' => form_error('client_number'),
                     'client_email' => form_error('client_email'),
                     'password' => form_error('password'),
                     'retype_password'=>form_error('retype_password'),
                 );
                 echo json_encode($array);
  
          }
          else{
          $password=$this->input->post('password');
          // echo $password;
          // die();  
          $this->db->where('id',$id);  
          $client_row=$this->db->get('clients')->row();
          // echo '<pre>';
          // print_r($client_row);
          // die();
          if($client_row->password == $password){
            $data['client_name']= $this->input->post('client_name');
            $data['client_number']= $this->input->post('client_number');
            $data['client_email']= $this->input->post('client_email');
            $data['contact_number']= $this->input->post('phone');
            $data['address']= $this->input->post('address');
            $data['city']= $this->input->post('city');
            $data['state']= $this->input->post('state');
            $data['postal_code']= $this->input->post('postal_code');
            $data['country']= $this->input->post('country');
            $data['website']= $this->input->post('website');
            $data['note']= $this->input->post('note');
  
            $this->db->where('id',$id);
            $this->db->update('clients',$data);
  
            echo json_encode('success');
          }
          else{
            $data['client_name']= $this->input->post('client_name');
            $data['client_number']= $this->input->post('client_number');
            $data['client_email']= $this->input->post('client_email');
            $data['contact_number']= $this->input->post('phone');
            $data['password']= md5($this->input->post('password'));
            $data['address']= $this->input->post('address');
            $data['city']= $this->input->post('city');
            $data['state']= $this->input->post('state');
            $data['postal_code']= $this->input->post('postal_code');
            $data['country']= $this->input->post('country');
            $data['website']= $this->input->post('website');
            $data['note']= $this->input->post('note');
  
            $this->db->where('id',$id);
            $this->db->update('clients',$data);
  
            echo json_encode('success');
          }

          
          // $this->session->set_flashdata('info', 'Client successfully updated');
          // redirect('client_index');
          }

         }
         else{
          $id=$this->input->post('id');
          $this->form_validation->set_rules('client_name', 'client name', 'required',
          array('required' => lang('please_enter_your_client_name'))
          );
          $this->form_validation->set_rules('client_number', 'client number', 'required',
              array('required' => lang('please_enter_your_client_nubmer'))
        );
          $this->form_validation->set_rules('client_email', 'client email', 'required|is_unique[clients.client_email]',
          array(
            'required' => lang('please_enter_a_valid_email_address'),
            'is_unique'     => lang('this_already_exists')
            
            ) 
        );
        $this->form_validation->set_rules('password', 'password', 'required|min_length[8]',
        array(
          'required' => lang('please_provide_a_password'),
          'min_length'     => lang('your_password_must_be_at_least_8_characters_long') 
          )
        ); 
          $this->form_validation->set_rules('retype_password', 'retype password', 'required|min_length[8]|matches[password]',
          array(
            'required' => lang('this_field_is_required'),
            'min_length'     =>lang('our_password_must_be_at_least_8_characters_long'),
            'matches'     => lang('Please_enter_the_same_password_as_above'), 
            )   
      
          );
           if ($this->form_validation->run() === FALSE)
           {          
            $array = array(
              'error' => true,
              'error' => true,
              'client_name' => form_error('client_name'),
              'client_number' => form_error('client_number'),
              'client_email' => form_error('client_email'),
              'password' => form_error('password'),
              'retype_password'=>form_error('retype_password'),
          );
                 echo json_encode($array);
  
          }
          else{
            $password=$this->input->post('password');
            // echo $password;
            // die();  
            $this->db->where('id',$id);  
            $client_row=$this->db->get('clients')->row();
            // echo '<pre>';
            // print_r($client_row);
            // die();
            if($client_row->password == $password){
              $data['client_name']= $this->input->post('client_name');
              $data['client_number']= $this->input->post('client_number');
              $data['client_email']= $this->input->post('client_email');
              $data['contact_number']= $this->input->post('phone');
              $data['address']= $this->input->post('address');
              $data['city']= $this->input->post('city');
              $data['state']= $this->input->post('state');
              $data['postal_code']= $this->input->post('postal_code');
              $data['country']= $this->input->post('country');
              $data['website']= $this->input->post('website');
              $data['note']= $this->input->post('note');
    
              $this->db->where('id',$id);
              $this->db->update('clients',$data);
    
              echo json_encode('success');
            }
            else{
              $data['client_name']= $this->input->post('client_name');
              $data['client_number']= $this->input->post('client_number');
              $data['client_email']= $this->input->post('client_email');
              $data['contact_number']= $this->input->post('phone');
              $data['password']= md5($this->input->post('password'));
              $data['address']= $this->input->post('address');
              $data['city']= $this->input->post('city');
              $data['state']= $this->input->post('state');
              $data['postal_code']= $this->input->post('postal_code');
              $data['country']= $this->input->post('country');
              $data['website']= $this->input->post('website');
              $data['note']= $this->input->post('note');
    
              $this->db->where('id',$id);
              $this->db->update('clients',$data);
    
              echo json_encode('success');
            }

          $this->db->where('id',$id);
          $this->db->update('clients',$data);

          echo json_encode('success');
          
          // $this->session->set_flashdata('info', 'Client successfully updated');
          // redirect('client_index');
          }
         }
        }

        public function view($id)
        {

           $this->db->where('id',$id);
           $data['value']=$this->db->get('clients')->row();

          $this->db->where('client_id',$id);
          $data['invoices']=$this->db->get('invoices')->result();
 
          // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');
           //for client----------
           if($login_info['user_type']=='5'){     
            $data['main_content']=$this->load->view('client/view',$data,true);
            $this->load->view('client_dashboard',$data);
           }
           else{
            $this->db->where('id',$login_info['user_type']);
            $new_data['section']=$this->db->get('roles')->row();

            $new_data['main_content']=$this->load->view('client/view',$data,true);
            $this->load->view('super_admin_dashboard',$new_data);
           }

        }

        public function client_invoices($id)
        {
          $this->db->where('invoice_number',$id);
          $data['client_invoices']=$this->db->get('invoices')->row();
          
          $data['main_content']=$this->load->view('client/invoice_details',$data,true);
          $this->load->view('super_admin_dashboard',$data); 
        }

//for ajax server side datatable--------------
public function client_index_datatable()
{
      $draw=$this->input->post('draw');
      $offset=$this->input->post('start');
      $limit=$this->input->post('length');
      if($draw){
        $data['draw']= $draw;
      }
      else{
        $data['draw']= 1;
      }

      $count_data=$this->db->from('clients')->count_all_results();
      $data['recordsTotal']= $count_data;
      $data['recordsFiltered']= $count_data;
      if($offset){
        $this->db->offset($offset);
      }
      else{
        $this->db->offset(0);//default 10
      }
      if($limit){
        $this->db->limit($limit);
      }
      else{
        $this->db->limit(10);//default 0
      }
      //for search-------- 
      $search=$this->input->post('search[value]');
      //$search='dfgdg';
      if($search){
      $this->db->like(array('client_name'=>$search));
      $this->db->or_like(array('client_number'=>$search));
      $this->db->or_like(array('client_email'=>$search));
      $this->db->or_like(array('contact_number'=>$search));
      $this->db->or_like(array('address'=>$search));
      $this->db->or_like(array('city'=>$search));
      $this->db->or_like(array('state'=>$search));
      $this->db->or_like(array('country'=>$search));
      }
      $data['data']=$this->client_model->get_client();    
      //$this->cache->apc->save('super_admin_dashboard', $data, 10);  
      echo json_encode($data);
}




       


          
       

}       