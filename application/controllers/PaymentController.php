<?php
class PaymentController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('payment_model');
                $this->load->helper('url_helper');
                $this->lang->load('Payment'); 

                if(!rs_valid_user('payment')){
                        show_404();
                };
        }

      
        public function add_payment($id)
        {
           
           $data['id']=$id;       
           $this->load->view('invoice/add_payment',$data);
        }

        public function payment_insert()
        {
          $this->form_validation->set_rules('invoice_number','Invoice number', 'required',
              array('required' => lang('the_invoice_number_is_required'))
          );      
          $this->form_validation->set_rules('payment_method', 'Payment', 'required',
             array('required' => lang('the_payment_method_is_required'))  
          );
          $this->form_validation->set_rules('amount', 'Amount', 'required|numeric',
              array(
                      'required' => lang('the_amount_field_is_required'),
                      'numeric' => lang('the_amount_field_must_contain_only_numbers'),
                )   
           );
          $this->form_validation->set_rules('receive_date','Date', 'required',
             array('required' => lang('the_date_field_is_required')) 
          );
          if ($this->form_validation->run() === FALSE)
          {          
            $array = array(
                    'error' => true,
                    'receive_date' => form_error('receive_date'),
                    'payment_method' => form_error('payment_method'),
                    'amount' => form_error('amount'),
                    'invoice_number'=> form_error('invoice_number'),
                );
                echo json_encode($array);
         }
          else
          {       
                  $datas=array();
                  $invoice_no=$datas['invoice_number']=$this->input->post('invoice_number');
                  $datas['receive_date']=$this->input->post('receive_date');
                  $datas['payment_method']=$this->input->post('payment_method');
                  $amount=$datas['amount']=$this->input->post('amount');
                  $datas['notes']=$this->input->post('note');

                   
                  $this->db->where('invoice_number',$invoice_no);
                  $one_invoice=$this->db->get('invoices')->row();
                 
                  $due_amount=$one_invoice->due_amount;
                  $receive_amount=$one_invoice->received_amount;

                  $new_receive_amount=$receive_amount+$amount;
                  $new_due= ($due_amount - $amount);

                  $data['received_amount']=$new_receive_amount;
                  $data['due_amount']=$new_due;

                //   echo '<pre>';
                //   print_r($data);
                //   die();
                  if($data['due_amount']<=0){
                      $data['status']='Paid';
                      $this->db->where('invoice_number',$invoice_no);
                      $this->db->update('invoices', $data);    
                  }
                  $this->db->where('invoice_number',$invoice_no);
                  $this->db->update('invoices', $data);
                  
                  $datas['client_id']=$one_invoice->client_id;
                        
                  $this->db->insert('payments', $datas); 
                 
                  echo json_encode('success');
          } 
        }

        public function payment_index()
        {
          $this->db->select('payments.*,clients.client_name');
          $this->db->from('payments');         
          $data['all_payments']=$this->db->join('clients','clients.id=payments.client_id')->order_by('id',"DESC")
          ->get()->result();
         
          $data['all_invoice']=$this->db->get('invoices')->result();
          //  echo'<pre>';
          // print_r($data);
          // die();
          $this->db->select_sum('amount');
          $data['total_amount'] = $this->db->get('payments')->row();
          // echo $result->amount;
          // die();

          // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');
          //for client----------
        if($login_info['user_type']=='5'){
                $data['main_content']=$this->load->view('payment/index',$data,true);
                $this->load->view('client_dashboard',$data);      
        }
        else{
                $this->db->where('id',$login_info['user_type']);
                $new_data['section']=$this->db->get('roles')->row();

                $new_data['main_content']=$this->load->view('payment/index',$data,true);
                $this->load->view('super_admin_dashboard',$new_data);   
        }

        
        }

        public function delete_payment($id)
        {
          $this->db->where('id',$id);
          $this->db->delete('payments');
          $this->session->set_flashdata('warning',  lang('payment_delete'));
          redirect('payment_index');
        }


        public function payment_edit($id)
        {
               $this->db->where('id',$id);
               $data['result']=$this->db->get('payments')->row();
              
               $data['all_invoice']=$this->db->get('invoices')->result(); 
               $this->load->view('payment/edit',$data);

        }

        public function payment_update($id)
        {
             
                $this->form_validation->set_rules('amount', 'Amount', 'required|numeric',
                        array(
                                'required' => lang('the_amount_field_is_required'),
                                'numeric' => lang('the_amount_field_must_contain_only_numbers'),
                        )   
                );
                if ($this->form_validation->run() === FALSE)
                {          
                $array = array(
                        'error' => true,
                        'amount' => form_error('amount'),
                        );
                        echo json_encode($array);
                }
                else{

                        $this->db->where('id',$id);
                        $result=$this->db->get('payments')->row();

                        // echo $result->amount;
                        // die();
                        $invoice_no=$datas['invoice_number']=$this->input->post('invoice_number');
                        $datas['receive_date']=$this->input->post('receive_date');
                        $datas['payment_method']=$this->input->post('payment_method');
                        $amount=$datas['amount']=$this->input->post('amount');
                        $datas['notes']=$this->input->post('note');

                        $this->db->where('invoice_number',$invoice_no);
                        $one_invoice=$this->db->get('invoices')->row();
                        $due_amount=$one_invoice->due_amount;
                         $receive_amount=$one_invoice->received_amount;

                         $datas['client_id']=$one_invoice->client_id;
                        
                        if($amount == $result->amount ){
                                // echo '<pre>';
                                // print_r($datas);
                                // die();   
                             $this->db->where('id',$id);
                             $this->db->update('payments', $datas);
                 
                              echo json_encode('success');   
                        }
                        else if($amount>$result->amount){
                                $new_amount=$amount - $result->amount;
                                // echo $new_amount.'<br>';
                                $new_receive_amount=$receive_amount+$new_amount;
                                $new_due_amount=$due_amount - $new_amount;
                                $data['received_amount']=$new_receive_amount;
                                $data['due_amount']=$new_due_amount;
                                // echo $new_receive_amount.'<br>';
                                // echo $new_due_amount;
                                // die();
                                $this->db->where('invoice_number',$invoice_no);
                                $this->db->update('invoices', $data);

                                $this->db->where('id',$id);
                                $this->db->update('payments', $datas);
                 
                                echo json_encode('success'); 
                        }
                        else if($amount<$result->amount){
                                $new_amount=$result->amount - $amount;
                                // echo $new_amount.'<br>';
                                $new_receive_amount=$receive_amount - $new_amount;
                                $new_due_amount=$due_amount + $new_amount;
                                $data['received_amount']=$new_receive_amount;
                                $data['due_amount']=$new_due_amount;
                                // echo $new_receive_amount.'<br>';
                                // echo $new_due_amount;
                                // die();

                                $this->db->where('invoice_number',$invoice_no);
                                $this->db->update('invoices', $data);

                                $this->db->where('id',$id);
                                $this->db->update('payments', $datas);
                 
                                echo json_encode('success'); 
                        }
 
                }

        }

          
       

}       