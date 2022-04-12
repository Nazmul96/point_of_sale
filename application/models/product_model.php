<?php
class product_model extends CI_Model {

          public function __construct()
          {
              $this->load->database();     
          }

          public function set()
          {
                    $data = array();
                    $data['name']= $this->input->post('product_name');
                    $data['category_id']= $this->input->post('category_id');
                    $data['code']= $this->input->post('code');
                    $data['price']= $this->input->post('unit_price');
                    $data['description']= $this->input->post('description');
                    
                     //for image insert------
                             
                     $config['upload_path']   = 'images/';
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
                    $result=$this->db->insert('products', $data);

                    return $result;
          }
}