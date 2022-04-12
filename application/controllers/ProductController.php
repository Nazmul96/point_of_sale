<?php
class ProductController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('product_model');
                $this->load->helper('url_helper');
                $this->lang->load('Product');
                
                if(!rs_valid_user('product')){
                        show_404();
                      };
        }


        public function product_index()
        {

          $this->db->select('products.*,categories.category_name');
          $this->db->from('products');      
          $data['all_product']=$this->db->join('categories','categories.id=products.category_id')->get()->result();       
          $data['category']=$this->db->get('categories')->result();       
          
           // for multiple user dashboard-----------------------------------
            //data of user who are aleready logged in-------
            $login_info=$this->session->userdata('login_info');         
                //for client----------
                if($login_info['user_type']=='5'){ 
                        
                $data['main_content']=$this->load->view('product/index',$data,true);
                $this->load->view('client_dashboard',$data);
                }
                else{
                        $this->db->where('id',$login_info['user_type']);
                        $new_data['section']=$this->db->get('roles')->row();

                        $new_data['main_content']=$this->load->view('product/index',$data,true);
                        $this->load->view('super_admin_dashboard',$new_data);    
                }
   
        }

        public function insert()
        {
          
          $this->form_validation->set_rules('product_name', 'Product', 'required',
                array(
                        'required' => lang('please_enter_your_product_name'),  
                 )    
          );
          $this->form_validation->set_rules('code', 'Code', 'required|is_unique[products.code]',
          array(
                'required' => lang('please_enter_a_code'),
                'is_unique' => lang('the_code_field')
          )      
        );
          $this->form_validation->set_rules('unit_price', 'Unit', 'required|numeric',
          array(
                'required' => lang('please_enter_your_unit_price'),
                'numeric' =>lang('the_unit_field_must_contain_only_numbers')
          )     
        
        );
          //$this->form_validation->set_rules('description', 'Description', 'required');
          $this->form_validation->set_rules('category_id', 'Category select', 'required',
          array(
                'required' => lang('please_select_category'),  
          )   
        );

          if ($this->form_validation->run() === FALSE)
          {          
            $array = array(
                    'error' => true,
                    'product_name' => form_error('product_name'),
                    'product_code' => form_error('code'),
                    'unit_price' => form_error('unit_price'),
                    'category_select' => form_error('category_id'),
                );
                echo json_encode($array);
 
         }
          else
          {       
             
                  $this->product_model->set();
                  echo json_encode('success');   
          }
        }

        public function delete($id)
        {       
                $this->db->where('id',$id);
                $result=$this->db->get('products')->row();
                if(file_exists('images/'.$result->image)){
                              
                        unlink('images/'.$result->image);       
                  }

                $this->db->where('id',$id);
                $this->db->delete('products');
      
                $this->session->set_flashdata('warning', lang('product_delete'));
                redirect('product_index');   
        }

        public function edit($id)
        { 
               
                $this->db->where('id',$id);
                $datas['result']= $this->db->get('products')->row();
                $datas['category']=$this->db->get('categories')->result();
                //$this->load->view('product/edit',$datas);
                $result=$this->load->view('product/edit',$datas);
                echo json_encode($result);  
        }

        public function update($id)
        {
                
                $old_code=$this->input->post('old_code');
                $new_code=$this->input->post('code');

        if($old_code == $new_code){
                      
          $this->form_validation->set_rules('product_name', 'Product', 'required',
          array(
                  'required' => lang('please_enter_your_product_name'),  
           )    
        );
        $this->form_validation->set_rules('code', 'Code', 'required',
        array(
                'required' => lang('please_enter_a_code'),
        )      
        );
        $this->form_validation->set_rules('unit_price', 'Unit', 'required|numeric',
        array(
                'required' => lang('please_enter_your_unit_price'),
                'numeric' =>lang('the_unit_field_must_contain_only_numbers')
        )     
        
        );
        //$this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('category_id', 'Category select', 'required',
        array(
                'required' => lang('please_select_category'),  
        )   
        );
      
                if ($this->form_validation->run() === FALSE)
                {          
                  $array = array(
                          'error' => true,
                          'product_name' => form_error('product_name'),
                          'product_code' => form_error('code'),
                          'unit_price' => form_error('unit_price'),
                      );
                      echo json_encode($array);
       
               }
                else
                {       
                        
                        $data = array();
                        $data['name']= $this->input->post('product_name');
                        $data['category_id']= $this->input->post('category_id');
                        $data['code']= $this->input->post('code');
                        $data['price']= $this->input->post('unit_price');
                        $data['description']= $this->input->post('description');
                        
                        // echo '<pre>';
                        // print_r($data);
                        
                        $image=$_FILES['image']['name'];
                        // echo $image;
                        
                        $old_image=$this->input->post('old_image');
                        // echo $old_image;
                        // die();
                        if($image)
                        {
                                
                                if(file_exists('images/'.$old_image)){
                                        unlink('images/'.$old_image);     
                                }

                                $config['upload_path']   = 'images/';
                                $config['allowed_types'] = 'gif|jpg|png';
                                $sdata=array();
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
        
                                $this->db->where('id',$id);
                                $this->db->update('products',$data);       
                        }
                        else{
                                
                        $data['image']=$old_image;
                        $this->db->where('id',$id);
                        $this->db->update('products',$data);

                        }
                 
                        echo json_encode('success');   
                }
              }
              else{
                      
          $this->form_validation->set_rules('product_name', 'Product', 'required',
          array(
                  'required' => lang('please_enter_your_product_name'),  
           )    
        );
        $this->form_validation->set_rules('code', 'Code', 'required|is_unique[products.code]',
        array(
                'required' => lang('please_enter_a_code'),
                'is_unique' => lang('the_code_field')
        )      
        );
        $this->form_validation->set_rules('unit_price', 'Unit', 'required|numeric',
        array(
                'required' => lang('please_enter_your_unit_price'),
                'numeric' =>lang('the_unit_field_must_contain_only_numbers')
        )     
        
        );
        //$this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('category_id', 'Category select', 'required',
        array(
                'required' => lang('please_select_category'),  
        )   
        );
      
                if ($this->form_validation->run() === FALSE)
                {          
                  $array = array(
                          'error' => true,
                          'product_name' => form_error('product_name'),
                          'product_code' => form_error('code'),
                          'unit_price' => form_error('unit_price'),
                      );
                      echo json_encode($array);
       
               }
                else
                {       
                        
                        $data = array();
                        $data['name']= $this->input->post('product_name');
                        $data['category_id']= $this->input->post('category_id');
                        $data['code']= $this->input->post('code');
                        $data['price']= $this->input->post('unit_price');
                        $data['description']= $this->input->post('description');
                        
                        // echo '<pre>';
                        // print_r($data);
                        
                        $image=$_FILES['image']['name'];
                        // echo $image;
                        
                        $old_image=$this->input->post('old_image');
                        // echo $old_image;
                        // die();
                        if($image)
                        {
                                
                                if(file_exists('images/'.$old_image)){
                                        unlink('images/'.$old_image);     
                                }

                                $config['upload_path']   = 'images/';
                                $config['allowed_types'] = 'gif|jpg|png';
                                $sdata=array();
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
        
                                $this->db->where('id',$id);
                                $this->db->update('products',$data);       
                        }
                        else{
                                
                        $data['image']=$old_image;
                        $this->db->where('id',$id);
                        $this->db->update('products',$data);

                        }
                 
                        echo json_encode('success');   
                }    
              }

        }

}       