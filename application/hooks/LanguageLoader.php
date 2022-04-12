<?php
class LanguageLoader
{
   function initialize() {
       $ci =& get_instance();
       $ci->load->helper('language');
       $ci->db->where('group_name','General');
       $ci->db->where('settings_name','company_language');
       $value=$ci->db->get('settings')->row();
       $siteLang=$value->settings_value;
       if($siteLang==''){
         $siteLang='english';
       } 
       if ($siteLang) {
           $ci->lang->load('common',$siteLang);
           $ci->lang->load('AdminHome',$siteLang);
           $ci->lang->load('AdminProfile',$siteLang);
           $ci->lang->load('Category',$siteLang);
           $ci->lang->load('Client',$siteLang);
           $ci->lang->load('Invoice',$siteLang);
           $ci->lang->load('Payment',$siteLang);
           $ci->lang->load('Product',$siteLang);
           $ci->lang->load('Report',$siteLang);
           $ci->lang->load('Roles',$siteLang);
           $ci->lang->load('Setting',$siteLang);
           $ci->lang->load('User',$siteLang);

       } 
   }
}   