<?php
class ForgotpasswordController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('admin_model');
                $this->load->helper('string'); 
                $this->lang->load(array('AdminHome','AdminProfile'));  
        }

       public function forgot_password_index()
       {
          $this->load->view('forget_password/index');
             
       } 

       public function reset_password()
       {
          $this->form_validation->set_rules('email', 'Email', 'required');

          if ($this->form_validation->run() === FALSE)
          {          
            $array = array(
                    'error' => true,
                    'email' => form_error('email'),
                );    
                echo json_encode($array);   
          }
          else{

             $email=$datas['email']=$this->input->post('email');
             $this->db->where('email',$email);
             $valid_email=$this->db->get('users')->row();
             //echo $email;
          //    print_r($valid_email);
          //    die();
             if(!empty($valid_email)){
                  $token=random_string('alnum', 8);
                  $new_data['password_reset_token']=$token;
                  $this->db->where('email',$valid_email->email);
                  $this->db->update('users',$new_data); 
            
                  //Mailing system work here---------------
                  $this->db->where('group_name','General');
                  $this->db->where('settings_name','company_name');
                  $company_name=$this->db->get('settings')->row();

                  $this->db->where('group_name','Email_setup');
                  $settings=$this->db->get('settings')->result();

                  $this->db->where('id',2);
                  $email=$this->db->get('notifications')->row();

                  $change=["{app_name}"];
                  $change_to=[$company_name->settings_value];
                  $email_subject=str_replace($change,$change_to,$email->mail_subject);  
                    
                  $link=base_url().'reset_password_url/'.$token; 
                  $source=["{receiver_name}","{app_name}","{link}"];
                  $dest = [$valid_email->first_name,$company_name->settings_value,$link];
                  echo $email_body=str_replace($source,$dest,$email->mail_body);

                  
                  // die();
                  //for sending email------------- 
                  rs_email($email,$email_subject,$email_body);

                 echo json_encode('success');  
             }
             else{
                    $array = array(
                              'error' => true,
                              'email' => 'No user found of that email address',
                          );    
                    echo json_encode($array);    
             }     
                   
          }

       }

       public function reset_password_done($token)
       {
               $this->db->where('password_reset_token',$token);
               $token_match=$this->db->get('users')->row();
               $data['token']=$token;
          //      echo '<pre>';
          //      print_r($data);
          //      die();     
               if(!empty($token_match)){
                    $this->load->view('forget_password/confirm_password',$data,'');      
               }
               else{
 
                  $this->load->view('forget_password/invalid_token');
               }
       }

       public function reset_password_update()//confirm_password
       {
          $this->form_validation->set_rules('password', 'Password', 'required');
          $this->form_validation->set_rules('confirm_password','confirm_password', 'required|matches[password]');
          if ($this->form_validation->run() === FALSE)
          {          
            $array = array(
                    'error' => true,
                    'password' => form_error('password'),
                    'confirm_password' => form_error('confirm_password'),
                );    
                echo json_encode($array);   
          }
          else{
              $token=$this->input->post('token');
                
              $datas['password']=md5($this->input->post('password'));
              $datas['password_reset_token']='';
          //     echo '<pre>';
          //     print_r($datas);
          //     die();     
             $this->db->where('password_reset_token',$token);
             $this->db->update('users',$datas);    
             echo json_encode('success');      
          }
       }

}        