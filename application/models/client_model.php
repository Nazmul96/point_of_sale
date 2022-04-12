<?php
class client_model extends CI_Model {

          public function __construct()
          {
                  $this->load->database();
          }


         public function set()
         {
            $data = array();
            $data['client_name']= $this->input->post('client_name');
            $data['client_number']= $this->input->post('cliet_number');
            $data['client_email']= $this->input->post('client_email');
            $data['contact_number']= $this->input->post('phone');
            $data['address']= $this->input->post('address');
            $data['city']= $this->input->post('city');
            $data['state']= $this->input->post('state');
            $data['postal_code']= $this->input->post('postal_code');
            $data['country']= $this->input->post('country');
            $data['website']= $this->input->post('website');
            $data['note']= $this->input->post('note');
            
            $result=$this->db->insert('clients', $data);

            return $result;
         }
         public function get_client()
         {
              $query = $this->db->get('clients');
              return $query->result();
         }
         public function client_delete($id)
         {
              $this->db->where('id',$id);
              return $this->db->delete('clients');
         }
     //     public function client_edit($id)
     //     {
     //          $this->db->where('id',$id);
     //          $result= $this->db->get('clients')->row();
     //          echo json_encode($result);
     //     }
     
          
}   