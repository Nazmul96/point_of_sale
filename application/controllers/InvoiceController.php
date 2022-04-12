<?php
class InvoiceController extends CI_Controller {

          public function __construct()
          {
          parent::__construct();
          $this->load->model('invoice_model');
          $this->load->library('email');
          $this->lang->load('Invoice');  
            if(!rs_valid_user('invoice')){
              show_404();
            };
          }

          public function invoice_index()
          {
   

            $data['row1']=$this->db->select("*")->limit(1)->order_by('id',"DESC")->get("invoices")->row();
            $data['invoice']=$this->db->from("invoices")->count_all_results();

            $this->db->where('group_name','Invoice');
            $this->db->where('settings_name','invoice_starting_number');
            $invoice_starting=$this->db->get('settings')->row();

            $data['starting_invoice']= $invoice_starting;

            
            $data['clients']=$this->db->get('clients')->result(); 
            $data['products']=$this->db->get('products')->result();
            //$data['invoices']=$this->db->get('invoices')->result();
            
            $this->db->select_sum('sub_total');
            $this->db->select_sum('received_amount');
            $this->db->select_sum('due_amount');
            $data['total_amount'] = $this->db->get('invoices')->row();
            
            // for multiple user dashboard-----------------------------------
            //data of user who are aleready logged in-------
            $login_info=$this->session->userdata('login_info');
            //for client----------
            if($login_info['user_type']=='5'){
              $data['main_content']=$this->load->view('invoice/index',$data,true);
              $this->load->view('client_dashboard',$data); 
            }
            else{
              $this->db->where('id',$login_info['user_type']);
              $new_data['section']=$this->db->get('roles')->row();

              $new_data['main_content']=$this->load->view('invoice/index',$data,true);
              $this->load->view('super_admin_dashboard',$new_data);
            }
        
          }
          
          public function get_product_details()
          {
              $id=$this->input->post('id');
              
             
              $this->db->where('id',$id);      
              $result=$this->db->get('products')->row();

              echo json_encode($result);
          }

          public function invoice_insert()
          {

            $this->form_validation->set_rules('client_id', 'Client', 'required',
                array('required' => lang('the_client_field_is_required')) 
            );
            $this->form_validation->set_rules('date', 'Date', 'required',
                array('required' => lang('the_date_field_is_required')) 
            );
            $this->form_validation->set_rules('due_date', 'Due date', 'required',
                array('required' => lang('the_due_date_field_is_required')) 
            );
            $this->form_validation->set_rules('invoice_number', 'Invoice number', 'required|is_unique[invoices.invoice_number]',
               array(
                 'required'=>lang('the_invoice_number_is_required'),
                 'is_unique' => lang('is_unique')
                 )
            );
            $this->form_validation->set_rules('status', 'Status', 'required',
                array('required' => lang('the_status_field_is_required'))
              );
            
            if ($this->form_validation->run() === FALSE)
           {       
             $array = array(
                     'error' => true,
                     'client_id' => form_error('client_id'),
                     'invoice_number' => form_error('invoice_number'),
                     'date' => form_error('date'),
                     'due_date' => form_error('due_date'),
                     'status' => form_error('status'),
              
                 );
                 echo json_encode($array);
  
          }
            else
            {       
                    $status=$data['status']= $this->input->post('status');
                    $due_date=$data['due_date']= $this->input->post('due_date');
                    $today_date=date("Y-m-d");
                    if(($status == 'Overdue')&&($today_date >= $due_date)){
                        
                           $array = array(
                              'error' => true,
                              'due_date' =>'You can not select current or preivois date',   
                          );
                          echo json_encode($array); 
                         
                    }
                    else{
                      $this->invoice_model->set();
                      $id=$this->db->insert_id();
                      $this->download_invoice($id,true);
                      $attachment[]=FCPATH.'invoice_pdf/invoice_'.$id.'.pdf'; 
                      //Mailing system work here---------------
                      $due_date= $this->input->post('due_date');
                      $invoice_number= $this->input->post('invoice_number');

                      $client_id= $this->input->post('client_id');
                      // echo $client_id;
                      // die();
                      $this->db->where('id',$client_id);
                      $client_name=$this->db->get('clients')->row();
                      
                      $this->db->where('group_name','General');
                      $this->db->where('settings_name','company_name');
                      $company_name=$this->db->get('settings')->row();

                      $this->db->where('group_name','Email_setup');
                      $settings=$this->db->get('settings')->result();

                      $this->db->where('id',4);
                      $email=$this->db->get('notifications')->row();

                      $change=["{invoice_number}","{date}"];
                      $change_to=[$invoice_number,$due_date];
                      $email_subject=str_replace($change,$change_to,$email->mail_subject);
                      
                      $source=["{receiver_name}","{invoice_number}","{app_name}"];
                      $dest = [$client_name->client_name,$invoice_number,$company_name->settings_value];
                      $email_body=str_replace($source,$dest,$email->mail_body);
                      

                     //for sending email------------- 
                      rs_email($client_name->client_email,$email_subject,$email_body,$attachment);
                      $success=array(
                        'success'=>"1",
                      );
                      echo json_encode($success);
                      die();
                    }

                    
            
          }
        }

        public function delete_invoices($id)
        {
          $this->db->where('id',$id);
          $this->db->delete('invoices');
          $this->session->set_flashdata('warning',  lang('invoice_delete'));
          redirect('invoice_index');
        }

        public function view_invoices($id)
        {   
            $this->db->where('id',$id);
            $data['invoice_edit']=$this->db->get('invoices')->row();
            
            $this->db->where('id',$data['invoice_edit']->client_id);
            $data['clients']=$this->db->get('clients')->row();

            $this->db->where('group_name','General');
            $data['generel']=$this->db->get('settings')->result();

            // for multiple user dashboard-----------------------------------
            //data of user who are aleready logged in-------
            $login_info=$this->session->userdata('login_info');
             //for client----------
             if($login_info['user_type']=='5'){ 
               
              $data['main_content']=$this->load->view('invoice/view',$data,true);
              $this->load->view('client_dashboard',$data);
             }
             else{
                $this->db->where('id',$login_info['user_type']);
                $new_data['section']=$this->db->get('roles')->row();

                $new_data['main_content']=$this->load->view('invoice/view',$data,true);
                $this->load->view('super_admin_dashboard',$new_data);
             }
           
        }

        public function edit_invoices($id)
        {
          //echo $id;
          $data['clients']=$this->db->get('clients')->result(); 
          $data['products']=$this->db->get('products')->result();

          $this->db->where('id',$id);
          $data['invoice_edit']=$this->db->get('invoices')->row();
          // echo '<pre>';
  
          // print_r($data);
          // die();  
          //$data['val']=$this->db->select("*")->limit(1)->order_by('id',"DESC")->get("invoices")->row();

           $this->load->view('invoice/edit',$data);
          //$this->load->view('dashboard',$data); 
        }

        public function invoice_update($id)
        {
          echo 'hi';

          
      //     $this->form_validation->set_rules('client_id', 'Client', 'required',
      //     array('required' => lang('the_client_field_is_required')) 
      // );
      // $this->form_validation->set_rules('date', 'Date', 'required',
      //     array('required' => lang('the_date_field_is_required')) 
      // );
      // $this->form_validation->set_rules('due_date', 'Due date', 'required',
      //     array('required' => lang('the_due_date_field_is_required')) 
      // );
      // $this->form_validation->set_rules('invoice_number', 'Invoice number', 'required|is_unique[invoices.invoice_number]',
      //    array(
      //      'required'=>lang('the_invoice_number_is_required'),
      //      'is_unique' => lang('is_unique')
      //      )
      // );
      // $this->form_validation->set_rules('status', 'Status', 'required',
      //     array('required' => lang('the_status_field_is_required'))
      //   );
      //     $data = array();
      //     $data['client_id']= $this->input->post('client_id');
      //     $data['date']= $this->input->post('date');
      //     //$data['currency']= $this->input->post('currency');
      //     $data['due_date']= $this->input->post('due_date');
      //     $data['invoice_number']= $this->input->post('invoice_number');
      //     $data['status']= $this->input->post('status');
      //     $data['recurring']= $this->input->post('recurring');
      //     $data['sub_total']= $this->input->post('sub_total');
      //     $data['total']= $this->input->post('total');
      //     $data['due_amount']= $this->input->post('due_amount');
      //     $data['discount_type']= $this->input->post('discount_type');
      //     $data['formdata_discount']= $this->input->post('formdata_discount');
      //     $data['received_amount']= $this->input->post('received_amount');

      //     $ids=$products_ids= $this->input->post('id');
      //     $products_ids= $this->input->post('products_id');
      //     $quantitys= $this->input->post('quantity');
      //     $prices= $this->input->post('price');
      //     $amounts= $this->input->post('amount');
         
    
      // $mainarray =[];  
      // for($i=0; $i < count($ids); $i++){
      //     $invoice_product_info = [];
      //     $invoice_product_info['id']= $ids[$i];
      //     $invoice_product_info['products_id']= $products_ids[$i];
      //     $invoice_product_info['quantity']= $quantitys[$i];
      //     $invoice_product_info['price']= $prices[$i];
      //     $invoice_product_info['amount']= $amounts[$i];
      //     $mainarray[]=  $invoice_product_info;

      // }
      // $data['products'] = json_encode($mainarray);       
      // // echo '<pre>';
      // // print_r($data);
      // // die();
      // $this->db->where('invoice_number',$id);
      // $this->db->update('invoices', $data);

      // $this->session->set_flashdata('info', 'Invoice successfully updated');
      // redirect('invoice_index'); 
        }

        public function download_invoice($id, $generate=false)
        {
          $this->db->where('id',$id);
          $data['invoice_edit']=$this->db->get('invoices')->row();

          $this->db->where('id',$data['invoice_edit']->client_id);
          $data['clients']=$this->db->get('clients')->row();
          
          $this->db->where('group_name','General');
          $data['generel']=$this->db->get('settings')->result();

          //$this->load->view('invoice/download_invoice',$data);
          $this->load->library('TCPDF');

          $html=$this->load->view('invoice/download_invoice',$data,true);
          $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
      
          // $fontname = TCPDF_FONTS::addTTFfont(FCPATH.'application/libraries/tff/kalpurush_ANSI.ttf', 'TrueTypeUnicode', '', 96);
          // $pdf->SetFont($fontname, '', 8, '', false);
          
          $pdf->SetTitle('Pdf Example');
          $pdf->SetHeaderMargin(30);
          $pdf->SetTopMargin(20);
          $pdf->setFooterMargin(20);
          $pdf->SetAutoPageBreak(true);
          $pdf->SetAuthor('Author');
          $pdf->SetDisplayMode('real', 'default');
          $pdf->addpage();
          //$pdf->Write(5, 'CodeIgniter TCPDF Integration');
          //$pdf->Write(0, $html, '', 0, 'C', true, 0, false, false, 0);
          // $pdf->Write(0, $html, '', 0, 'L', true, 0, false, false, 0);
          $pdf->writeHTML($html,true,0,false,false,'L');

          if($generate){
            $pdf->Output(FCPATH.'invoice_pdf/invoice_'.$id.'.pdf', 'F');
          }else{
             $pdf->Output('invoice_'.$id.'.pdf', 'I');
          }
          
        }

        //for ajax server side datatable---------
        public function invoice_index_datatable()
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
          $count_data=$this->db->from('invoices')->count_all_results();
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
          $this->db->like(array('invoice_number'=>$search));
          $this->db->or_like(array('status'=>$search));
          $this->db->or_like(array('client_name'=>$search));
          }
          // $this->db->like(array('invoice_number'=>$search));
          // $this->db->or_like(array('status'=>$search));
          // $this->db->or_like(array('client_id'=>$search));  
          $this->db->select('invoices.*,clients.client_name');
          $this->db->from('invoices');  
          $v=[];
          $results=$this->db->join('clients','clients.id=invoices.client_id')->order_by('id',"DESC")
           ->get()->result();
           $i=0;
           
          //  echo $this->db->last_query();
          //  die();
           foreach($results as $result)
           {
            //  print_r($result);
            //  die();
            
            $v[$i]['invoice_number'] = $result->invoice_number;
            $v[$i]['status'] = rs_status($result->status,$result->due_amount);
            $v[$i]['due_date'] = rs_date($result->due_date);
            $v[$i]['client_name'] = $result->client_name;
            $v[$i]['sub_total'] =($result->sub_total)?rs_currency_new($result->sub_total):rs_currency_new(0);
            $v[$i]['received_amount'] =($result->received_amount)?rs_currency_new($result->received_amount):rs_currency_new(0);
            $v[$i]['due_amount'] =($result->due_amount)?rs_currency_new($result->due_amount):rs_currency_new(0);
            $v[$i]['action'] ='<div class="dropdown options-dropdown d-inline-block">
            <button type="button" data-toggle="dropdown" title="Actions" class="btn-option btn" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle>
            </svg></button><div class="dropdown-menu dropdown-menu-right py-2 mt-1">
            <a href="'.base_url().'download_invoice/'. $result->id .'" class="dropdown-item px-4 py-2">'.lang('Download').'</a>
            <a href="'.base_url().'view_invoices/'. $result->id .'" class="dropdown-item px-4 py-2">'.lang('View') .'</a>
            <a href="#" class="dropdown-item px-4 py-2 add_payment" data-id="'.$result->invoice_number.'">'.lang('add_payment') .'</a>
            <a href="#" class="dropdown-item px-4 py-2 edit" data-id="'.$result->id.'">'.lang('Edit') .'</a>
            <a href="'.base_url().'delete_invoices/'. $result->id .'" class="dropdown-item px-4 py-2" id="delete">'.lang('Delete') .'</a>
            </div>
          </div>';
             $i++;
           }
          //  print_r($v);
          //  die();
           $data['data']= $v;

          // $count_data=$data['data']->num_rows();
          // echo '<pre>';
          // echo $count_data;
         
           echo json_encode($data);
        }

}
