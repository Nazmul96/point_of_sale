<?php
class admin_model extends CI_Model {

          public function __construct()
          {
                  $this->load->database();
          }

          public function admin_info($email,$password)
          {
              // echo $email.'<br>';
              // echo $password.'<br>';
            
              $this->db->where('email',$email) ;
              $this->db->where('password',$password);
             // $this->db->where('user_type','super admin');
              $query=$this->db->get('users');
              $result=$query->row();
              // echo '<pre>';
              // print_r($result);
              
              // if($result == null){
              //   echo 'client';
              //   $this->db->where('email',$email) ;
              //   $this->db->where('password',$password);
                // $this->db->where('user_type','client');
              //   $query=$this->db->get('users');
              //   $result=$query->row();
              //   echo '<pre>';
              //   print_r($result);
                
                
              // }
              // else if($result == null){
              //   echo 'moderator';
              //   $this->db->where('email',$email) ;
              //   $this->db->where('password',$password);
                // $this->db->where('user_type','moderator');
              //   $query=$this->db->get('users');
              //   $result=$query->row();
              // }
              // else if($result == null){
              //   echo 'admin';
              //   $this->db->where('email',$email) ;
              //   $this->db->where('password',$password);
                // $this->db->where('user_type','admin');
              //   $query=$this->db->get('users');
              //   $result=$query->row();
              
              // }

              // echo 'ase ny' ;
              // die();
            //   $this->db->or_where('user_type','client');
            //   $this->db->or_where('user_type','super admin');
            //   $this->db->or_where('user_type','moderator');
            //   $query=$this->db->get('users');
            //   $result=$query->row();
            //   echo $this->db->last_query();
            //   die();
              return $result;

          }
     
          
}                   