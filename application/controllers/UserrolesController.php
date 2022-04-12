<?php
class UserrolesController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('user_roles_model');
                $this->load->helper('url_helper');
                $this->lang->load('User');
                
                if(!rs_valid_user('user_roles')){
                        show_404();
                      };
        }

        public function user_roles_index()
        {
          $data['all_user']=$this->db->get('users')->result();
          $data['all_roles']=$this->db->get('roles')->result();
          
           // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');
          //for client----------
          if($login_info['user_type']=='5'){ 
                $data['main_content']=$this->load->view('user/user_list',$data,true);
                $this->load->view('clientdashboard',$data);
          }
          else{
                $this->db->where('id',$login_info['user_type']);
                $new_data['section']=$this->db->get('roles')->row(); 

                $new_data['main_content']=$this->load->view('user/user_list',$data,true);
                $this->load->view('super_admin_dashboard',$new_data);  
          }
        }

        public function user_role_insert()
        {
          $this->form_validation->set_rules('first_name','First name', 'required',
              array('required' => lang('the_first_name_field_is_required'))
          );
          $this->form_validation->set_rules('last_name','Last name', 'required',
             array('required' => lang('the_last_name_field_is_required'))
          );
          $this->form_validation->set_rules('email_address','Email', 'required|valid_email|is_unique[users.email]',
          array(
                  'required' => lang('the_email_field_is_required'),
                  'valid_email'=>lang('please_enter_a_valid_email_address'),
                  'is_unique'=>lang('the_email_field_must_contain_unique_email')
                  
                  )
          );
          $this->form_validation->set_rules('password','Password', 'required',
          array(
                  'required' => lang('the_password_is_required'),)
          );
          if ($this->form_validation->run() === FALSE)
          {          
            $array = array(
                    'error' => true,
                    'first_name' => form_error('first_name'),
                    'last_name' => form_error('last_name'),
                    'email_address' => form_error('email_address'),
                    'password' => form_error('password'),
                );    
                echo json_encode($array);   
         }
         else{ 
             
          $data = array();
          $data['first_name']= $this->input->post('first_name');
          $data['last_name']= $this->input->post('last_name');
          $data['email']= $this->input->post('email_address');
          $data['password']= md5($this->input->post('password'));
          $data['user_type']= $this->input->post('user_type');
          $data['status']= $this->input->post('status');

          // echo '<pre>';
          // print_r($data);
          // die();
           //for image insert------
                   
           $config['upload_path']   = 'images/user';
           $config['allowed_types'] = 'gif|jpg|png';
          
           $this->load->library('upload', $config);
           
           if ( $this->upload->do_upload('image'))
           {       
                   
                   $sdata =  $this->upload->data();
                   $data['image']=$sdata['file_name'];
           }
           else
           {       
              
                   $error = $this->upload->display_errors();

                   
           }
      //     echo '<pre>';
      //     print_r($data);
          $result=$this->db->insert('users', $data);

              echo json_encode('success');   
         }
        }

        public function delete_user($id)
        {
          $this->db->where('id',$id);
          $result=$this->db->get('users')->row();

          if(file_exists('images/user/'.$result->image)){
                        
                  unlink('images/user/'.$result->image);       
            }

          $this->db->where('id',$id);
          $this->db->delete('users');

          $this->session->set_flashdata('warning',  lang('user_delete'));
          redirect('user_roles_index');
        }

        public function edit_user($id)
        {
                $datas['roles']=$this->db->get('roles')->result();
                // echo '<pre>';
                // print_r($datas);
                // die();
                $this->db->where('id',$id);
                $datas['user_edit']= $this->db->get('users')->row();
                //$datas['category']=$this->db->get('categories')->result();
                //$this->load->view('product/edit',$datas);
                $result=$this->load->view('user/edit',$datas);
                echo json_encode($result); 
        }
        public function user_update()
        {
                // echo '<pre>';
                // print_r($_FILES);
                // print_r($_POST);
                // die();
                $id=$this->input->post('user_id');
                $this->form_validation->set_rules('first_name','First name', 'required',
                array('required' => lang('the_first_name_field_is_required'))
                );
                $this->form_validation->set_rules('last_name','Last name', 'required',
                array('required' => lang('the_last_name_field_is_required'))
                );
                $this->form_validation->set_rules('email_address','Email', 'required|valid_email|is_unique[users.email]',
                array(
                        'required' => lang('the_email_field_is_required'),
                        'valid_email'=>lang('please_enter_a_valid_email_address'),
                        'is_unique'=>lang('the_email_field_must_contain_unique_email')
                        
                        )
                );
                $this->form_validation->set_rules('password','Password', 'required',
                array(
                        'required' => lang('the_password_is_required'),)
                );
                if ($this->form_validation->run() === FALSE)
                {          
                  $array = array(
                          'error' => true,
                          'first_name' => form_error('first_name'),
                          'last_name' => form_error('last_name'),
                          'email_address' => form_error('email_address'),
                          'password' => form_error('password'),
                      );    
                      echo json_encode($array);   
               }

               else{
                       $password=$this->input->post('password');
 
                       $this->db->where('id',$id);    
                       $old_password=$this->db->get('users')->row();
                //        echo '<pre>';
                //        print_r($old_password);
                //        die();
                        if($old_password->password == $password)
                        {
                                $data['first_name']= $this->input->post('first_name');
                                $data['last_name']= $this->input->post('last_name');
                                $data['email']= $this->input->post('email_address');        
                                $data['user_type']= $this->input->post('user_type');
                                $data['status']= $this->input->post('status');

        
                                $image=$_FILES['new_image']['name'];
                                // echo $image;
                                //die();
                                $old_image=$this->input->post('old_image');
                                // echo $old_image;
                                // die();
                                if($image)
                                {
                                        
                                        if(file_exists('images/user/'.$old_image)){
                                                unlink('images/user/'.$old_image);     
                                        }
        
                                        $config['upload_path']   = 'images/user/';
                                        $config['allowed_types'] = 'gif|jpg|png';
                                        $sdata=array();
                                        $this->load->library('upload', $config);
        
                                        if ( $this->upload->do_upload('new_image'))
                                        {       
                                                
                                                $sdata =  $this->upload->data();
                                                $data['image']=$sdata['file_name'];
                                        }
                                        else
                                        {       
                                                $error = $this->upload->display_errors();
                        
                                                
                                        }
                
                                        $this->db->where('id',$id);
                                        $this->db->update('users',$data);       
                                }
                                else{
                                        
                                $data['image']=$old_image;
                                $this->db->where('id',$id);
                                $this->db->update('users',$data);
        
                                }
                         
                                echo json_encode('success');  
                        }
                        else{
                                $data['first_name']= $this->input->post('first_name');
                                $data['last_name']= $this->input->post('last_name');
                                $data['password']=md5($this->input->post('password'));
                                $data['email']= $this->input->post('email_address');        
                                $data['user_type']= $this->input->post('user_type');
                                $data['status']= $this->input->post('status');
                                 

                                $image=$_FILES['new_image']['name'];
                                // echo $image;
                                //die();
                                $old_image=$this->input->post('old_image');
                                // echo $old_image;
                                // die();
                                if($image)
                                {
                                        
                                        if(file_exists('images/user/'.$old_image)){
                                                unlink('images/user/'.$old_image);     
                                        }
        
                                        $config['upload_path']   = 'images/user/';
                                        $config['allowed_types'] = 'gif|jpg|png';
                                        $sdata=array();
                                        $this->load->library('upload', $config);
        
                                        if ( $this->upload->do_upload('new_image'))
                                        {       
                                                
                                                $sdata =  $this->upload->data();
                                                $data['image']=$sdata['file_name'];
                                        }
                                        else
                                        {       
                                                $error = $this->upload->display_errors();
                        
                                                
                                        }
                
                                        $this->db->where('id',$id);
                                        $this->db->update('users',$data);       
                                }
                                else{
                                        
                                $data['image']=$old_image;
                                $this->db->where('id',$id);
                                $this->db->update('users',$data);
        
                                }
                         
                                echo json_encode('success');
                        } 
             
                        
                }       
                
        }



}        