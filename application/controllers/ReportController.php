<?php
class ReportController extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('report_model');
                $this->load->helper('url_helper');
                $this->lang->load('Report'); 

                if(!rs_valid_user('report')){
                  show_404();
                };
        }

      
        public function payment_summary()
        {
        
          $this->db->select('payments.*,clients.client_name');
          $this->db->from('payments');         
          $data['all_payments']=$this->db->join('clients','clients.id=payments.client_id')
          ->get()->result();

          // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');
          //for client----------
          if($login_info['user_type']=='5'){ 
              
            $data['main_content']=$this->load->view('reports/payment_summary',$data,true);
            $this->load->view('client_dashboard',$data);
            }
          else{
            $this->db->where('id',$login_info['user_type']);
            $new_data['section']=$this->db->get('roles')->row();

            $new_data['main_content']=$this->load->view('reports/payment_summary',$data,true);
            $this->load->view('super_admin_dashboard',$new_data);
          }  


        }

        public function client_statement()
        {
          $data['all_invoices']=$this->db->order_by('invoice_number',"asc")->get('invoices')->result();

          // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');
          //for client----------
          if($login_info['user_type']=='5'){ 
            $data['main_content']=$this->load->view('reports/client_statement',$data,true);
            $this->load->view('client_dashboard',$data);
            }
          else{
            $this->db->where('id',$login_info['user_type']);
            $new_data['section']=$this->db->get('roles')->row();

            $new_data['main_content']=$this->load->view('reports/client_statement',$data,true);
            $this->load->view('super_admin_dashboard',$new_data); 
          }  
      
            
        }

        public function invoice_report()
        {
          $this->db->select('invoices.*,clients.client_name');
          $this->db->from('invoices');         
          $data['all_invoices']=$this->db->join('clients','clients.id=invoices.client_id')->order_by('invoice_number',"asc")
          ->get()->result();

           // for multiple user dashboard-----------------------------------
          //data of user who are aleready logged in-------
          $login_info=$this->session->userdata('login_info');     
          //for client----------
          if($login_info['user_type']=='5'){ 
            $data['main_content']=$this->load->view('reports/invoice_report',$data,true);
            $this->load->view('client_dashboard',$data);
            }
          else{
          $this->db->where('id',$login_info['user_type']);
          $new_data['section']=$this->db->get('roles')->row();

          $new_data['main_content']=$this->load->view('reports/invoice_report',$data,true);
          $this->load->view('super_admin_dashboard',$new_data);
          }  
       
        }


          
       

}       