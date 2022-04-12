<?php
class Cron_Controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Cron_model');
                $this->load->library('email');

        }

        public function cron_index()
        {

          $today_date=date("Y-m-d");

          $this->db->set('status', 'Overdue');
          $this->db->where('due_date <=',$today_date);
          $this->db->where('status','Partially');
          $this->db->or_where('status','Unpaid');
          $this->db->update('invoices');
          
          echo 'success';

       }  
       
       public function invoice_payment_reminder()
       {
         $today_date=date("Y-m-d");       
         $after_3days = date('Y-m-d', strtotime('+3 days'));
         $this->db->where('due_date =',$after_3days);
         $this->db->where('due_amount >',0);
         $payment_reminder=$this->db->get('invoices')->result();
        //  echo '<pre>';
        // print_r($payment_reminder);
        // die(); 
             

        //Mailing system work here---------------
        $this->db->where('group_name','General');
        $this->db->where('settings_name','company_name');
        $company_name=$this->db->get('settings')->row();
         
        $this->db->where('id',5);
        $email=$this->db->get('notifications')->row();

        $client_name=array();
        foreach($payment_reminder as $key=>$result){
               $this->db->select('clients.client_name,clients.client_email');          
               $this->db->where('id',$result->client_id);
               $client_name[$key]=$this->db->get('clients')->row(); 

        }
       
      
        foreach($payment_reminder as $key=>$result){
            $change=["{invoice_number}"];
            $change_to=[$result->invoice_number];
            $email_subject=str_replace($change,$change_to,$email->mail_subject);

            $source=["{receiver_name}","{app_name}"];
            $dest = [$client_name[$key]->client_name,$company_name->settings_value];
            $email_body=str_replace($source,$dest,$email->mail_body);

            //for sending email------------- 
            rs_email($client_name[$key]->client_email,$email_subject,$email_body);    
               
         }

       }
}