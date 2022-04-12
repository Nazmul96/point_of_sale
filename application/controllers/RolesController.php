<?php
class RolesController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('roles_model');
                $this->load->helper('url_helper');
                $this->load->library('email');
                $this->lang->load('Roles'); 
               
        }

        public function roles_index()
        {
          $data['all_roles']=$this->db->get('roles')->result();


           // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');

          //for client----------
          if($login_info['user_type']=='5'){ 
            $data['main_content']=$this->load->view('roles/index',$data,true);
            $this->load->view('client_dashboard',$data);
          }
          else{
            $this->db->where('id',$login_info['user_type']);
            $new_data['section']=$this->db->get('roles')->row();

            $new_data['main_content']=$this->load->view('roles/index',$data,true);
            $this->load->view('super_admin_dashboard',$new_data);
          }
        }

        public function roles_insert()
        {
                    $this->form_validation->set_rules('roles_name', 'Roles Name', 'required',
                    array('required' => lang('the_roles_name_field_is_required'))
                   );
                    $this->form_validation->set_rules('feature', 'Roles feature', 'required',
                    array('required' => lang('the_feature_field_is_required'))
                    );
                    if ($this->form_validation->run() === FALSE)
                    {          
                    $array = array(//
                              'error' => true,
                              'roles_name' => form_error('roles_name'),
                              'feature' => form_error('feature'),
                    );    
                    echo json_encode($array);   
                    }
                    else{      
                              $roles_name=$data['roles_name'] =$this->input->post('roles_name');
                              $data['all_section'] =$this->input->post('feature'); 
                              $this->db->insert('roles',$data);

                               //Mailing system work here---------------
                              $this->db->where('group_name','Email_setup');
                              $settings=$this->db->get('settings')->result();

                              $this->db->where('group_name','General');
                              $this->db->where('settings_name','company_name');
                              $company_name=$this->db->get('settings')->row();

                              $this->db->where('id',7);
                              $element=$this->db->get('notifications')->row();
                            
                              $change=["{name}"];
                              $change_to=[$roles_name];
                              $system_content=str_replace($change,$change_to,$element->system_content);

                              $login_info=$this->session->userdata('login_info');
                              $notification_info['type']='Roles created';
                              $notification_info['content']=$system_content;   
                              $notification_info['date_time']=date("Y-m-d g:i a");
                              $notification_info['action_by']=$login_info['id'];
                              $this->db->insert('notification_content',$notification_info);
                              
                              //receiver name------
                              $this->db->where('user_type','super admin');
                              $receiver=$this->db->get('users')->result();
                             

                              foreach($receiver as $row){

                                $change=["{app_name}"];
                                $change_to=[$company_name->settings_value];
                                $email_subject=str_replace($change,$change_to,$element->mail_subject);
                                
                                $link=base_url().'roles_index/';  
                                $source=["{receiver_name}","{name}","{link}","{app_name}"];
                                $dest = [$row->first_name,$roles_name,$link,$company_name->settings_value];
                                $email_body=str_replace($source,$dest,$element->mail_body);

                                //for sending email------------- 
                                rs_email($row->email,$email_subject,$email_body);
                              }
 
                              echo json_encode('success');
                              die();                            

                    }  
        }

        public function edit_roles($id)
        {
          $this->db->where('id',$id);
          $datas['edit_roles']= $this->db->get('roles')->row();

          $result=$this->load->view('roles/edit',$datas);
          echo json_encode($result); 
        }

        public function roles_update()
        {
          $this->form_validation->set_rules('roles_name', 'Roles Name', 'required',
          array('required' => lang('the_roles_name_field_is_required'))
         );
          $this->form_validation->set_rules('feature', 'Roles feature', 'required',
          array('required' => lang('the_feature_field_is_required'))
          );
          if ($this->form_validation->run() === FALSE)
          {          
          $array = array(//
                    'error' => true,
                    'roles_name' => form_error('roles_name'),
                    'feature' => form_error('feature'),
          );    
          echo json_encode($array);   
          }
          else{        
          $id=$this->input->post('id');
          $roles_name=$data['roles_name'] =$this->input->post('roles_name');
          $data['all_section'] =$this->input->post('feature');
          
           $this->db->where('id',$id);
           $this->db->update('roles',$data);

           //Mailing system work here---------------
           $this->db->where('group_name','Email_setup');
           $settings=$this->db->get('settings')->result();

           $this->db->where('group_name','General');
           $this->db->where('settings_name','company_name');
           $company_name=$this->db->get('settings')->row();

          $this->db->where('id',8);
          $element=$this->db->get('notifications')->row();
          
          $change=["{name}"];
          $change_to=[$roles_name];
          $system_content=str_replace($change,$change_to,$element->system_content);

          $login_info=$this->session->userdata('login_info');
          $notification_info['type']='Roles updated';
          $notification_info['content']=$system_content;   
          $notification_info['date_time']=date("Y-m-d g:i a");
          $notification_info['action_by']=$login_info['id'];

          $this->db->insert('notification_content',$notification_info);

                //receiver name------
                $this->db->where('user_type','super admin');
                $receiver=$this->db->get('users')->result();
               

                foreach($receiver as $row){

                  $change=["{app_name}"];
                  $change_to=[$company_name->settings_value];
                  $email_subject=str_replace($change,$change_to,$element->mail_subject);
                  
                  $link=base_url().'roles_index/';  
                  $source=["{receiver_name}","{name}","{link}","{app_name}"];
                  $dest = [$row->first_name,$roles_name,$link,$company_name->settings_value];
                  $email_body=str_replace($source,$dest,$element->mail_body);
                
                  //for sending email------------- 
                  rs_email($row->email,$email_subject,$email_body);
                }
               
              echo json_encode('success');
              die();
          }
        }

        public function delete_role($id)
        {
          $this->db->where('id',$id);
          $this->db->delete('roles');
          
          //Mailing system work here---------------
          $this->db->where('id',$id);
          $roles_name=$this->db->get('roles')->row();

          //Mailing system work here---------------
          $this->db->where('group_name','Email_setup');
          $settings=$this->db->get('settings')->result();

          $this->db->where('group_name','General');
          $this->db->where('settings_name','company_name');
          $company_name=$this->db->get('settings')->row();

          $this->db->where('id',9);
          $element=$this->db->get('notifications')->row();
       
          $change=["{name}"];
          $change_to=[$roles_name->roles_name];
          $system_content=str_replace($change,$change_to,$element->system_content);

          $login_info=$this->session->userdata('login_info');
          $notification_info['type']='Roles deleted';
          $notification_info['content']=$system_content;   
          $notification_info['date_time']=date("Y-m-d g:i a");
          $notification_info['action_by']=$login_info['id'];
          $this->db->insert('notification_content',$notification_info);

                 //receiver name------
                 $this->db->where('user_type','super admin');
                 $receiver=$this->db->get('users')->result();
                
 
                 foreach($receiver as $row){
 
                   $change=["{app_name}"];
                   $change_to=[$company_name->settings_value];
                   echo $email_subject=str_replace($change,$change_to,$element->mail_subject);
                   
                   $source=["{receiver_name}","{name}","{app_name}"];
                   $dest = [$row->first_name,$roles_name->roles_name,$company_name->settings_value];
                   echo $email_body=str_replace($source,$dest,$element->mail_body);
                  
                   //for sending email------------- 
                   rs_email($row->email,$email_subject,$email_body);
                 }
                 

          $this->session->set_flashdata('warning','Roles deleted successfully');
          redirect('roles_index');  
        }

}