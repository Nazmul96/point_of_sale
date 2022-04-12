<?php
class invoice_model extends CI_Model {

          public function __construct()
          {
                  $this->load->database();
          }

        public function set()
        {
                
                $data = array();

                $data['client_id']= $this->input->post('client_id');
                $data['date']= $this->input->post('date');
                $data['status']= $this->input->post('status');
                $data['due_date']= $this->input->post('due_date');
                $data['invoice_number']= $this->input->post('invoice_number');
                $data['recurring']= $this->input->post('recurring');
                $data['sub_total']= $this->input->post('sub_total');
                $data['total']= $this->input->post('total');
                $data['due_amount']= $this->input->post('due_amount');
                $data['discount_type']= $this->input->post('discount_type');
                $data['formdata_discount']= $this->input->post('formdata_discount');
                $data['received_amount']= $this->input->post('received_amount');
                // echo '<pre>';
                // print_r($data);
                // die();
                $ids=$products_ids= $this->input->post('id');
                $products_ids= $this->input->post('products_id');
                $quantitys= $this->input->post('quantity');
                $prices= $this->input->post('price');
                $amounts= $this->input->post('amount');
               
              
        $mainarray =[];  
         for($i=0; $i < count($ids); $i++){
                $invoice_product_info = [];
                $invoice_product_info['id']= $ids[$i];
                $invoice_product_info['products_id']= $products_ids[$i];
                $invoice_product_info['quantity']= $quantitys[$i];
                $invoice_product_info['price']= $prices[$i];
                $invoice_product_info['amount']= $amounts[$i];
                $mainarray[]=  $invoice_product_info;

            }
            $data['products'] = json_encode($mainarray);       
       
            $result=$this->db->insert('invoices', $data);

            return $result;    
        }
     
          
}   