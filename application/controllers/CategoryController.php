<?php
class CategoryController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('category_model');
                $this->load->helper('url_helper');
                $this->lang->load('Category');
        }


        public function category_index()
        {
          $data['all_category']=$this->db->get('categories')->result();


              // for multiple user dashboard-----------------------------------
            //data of user who are aleready logged in-------
            $login_info=$this->session->userdata('login_info');
                  //for client----------
                  if($login_info['user_type']=='5'){ 
                    
                  $new_data['main_content']=$this->load->view('category/index',$data,true);
                  $this->load->view('client_dashboard',$new_data);
                  }
                  else{
                    $this->db->where('id',$login_info['user_type']);
                    $new_data['section']=$this->db->get('roles')->row();

                    $new_data['main_content']=$this->load->view('category/index',$data,true);
                    $this->load->view('super_admin_dashboard',$new_data);
                  }

            
        }

        public function insert()
        {
          $this->form_validation->set_rules('category_name', 'Category', 'required|is_unique[categories.category_name]',
          array(
            'required' => lang('the_category_field_is_required'),
            'is_unique' => lang('is_unique')
            )
         );

           if ($this->form_validation->run() === FALSE)
           {          
             $array = array(
                     'error' => true,
                     'category_name' => form_error('category_name'),
                 );    
                 echo json_encode($array);   
          }
          else{      
                      
                  $datas=array();
                  $datas['category_name']=$this->input->post('category_name');
                  $this->db->insert('categories', $datas);
                  echo json_encode('success');
                  //echo 'hi';
          }     
        }

        public function delete($id)
        {
          $this->db->where('id',$id);
          $this->db->delete('categories');
          $this->session->set_flashdata('warning', lang('category_delete'));
          redirect('category_index');
        }

        public function edit($id)
        { 
          $this->db->where('id',$id);
          $result= $this->db->get('categories')->row();
          echo json_encode($result);     
        }

        public function update()
        {
          $data = array();
          $id= $this->input->post('category_id');
          $new_category=$this->input->post('category_name');
          $old_category=$this->input->post('old_category');

          if($new_category == $old_category){
            $datas=array();
            $datas['category_name']=$this->input->post('category_name');
            $this->db->where('id',$id);
            $this->db->update('categories',$datas);
            echo json_encode('success');
          }
          else
          {
            $this->form_validation->set_rules('category_name', 'Category', 'required|is_unique[categories.category_name]',
            array(
              'required' => lang('the_category_field_is_required'),
              'is_unique' => lang('is_unique')
              )
           );

          if ($this->form_validation->run() === FALSE)
          {          
            $array = array(
                    'error' => true,
                    'category_name' => form_error('category_name'),
                );    
                echo json_encode($array);   
         }
         else{      
                     
                 $datas=array();
                 $datas['category_name']=$this->input->post('category_name');
                 $this->db->where('id',$id);
                 $this->db->update('categories',$datas);
                 echo json_encode('success');
                 
         }

        }
         
        }

}       