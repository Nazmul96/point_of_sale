<?php
if ( ! function_exists('rs_email'))
{
	/**
	 * Formats a numbers as bytes, based on size, and adds the appropriate suffix
	 *
	 * @param	mixed	will be cast as int
	 * @param	int
	 * @return	string
	 */
	function rs_email($client_email,$email_subject,$email_body,$attachment=[],$email_cc='')
	{
		$CI =& get_instance();

                    // echo $client_email.'<br>';
                    // echo $email_subject.'<br>';
                    // echo $email_body.'<br>';
                    // die();
                    $attach=count($attachment);
                    //echo $attach;

                

   
                    $CI->db->where('group_name','General');
                    $CI->db->where('settings_name','company_name');
                    $company_name=$CI->db->get('settings')->row();
          
                    $CI->db->where('group_name','Email_setup');
                    $settings=$CI->db->get('settings')->result();
                    
                     if($settings[1]->settings_value == 'sendmail'){
                              $config['protocol'] = 'sendmail';
                              $config['mailpath'] = $settings[7]->settings_value;
                              $config['charset'] = 'iso-8859-1';
                              $config['wordwrap'] = TRUE;

                              $CI->email->initialize($config);

                     }
                    else if($settings[1]->settings_value == 'smtp')
                    {
                              $config['protocol'] = 'smtp';  
                              $config['smtp_user'] = $settings[2]->settings_value;  
                              $config['smtp_host'] = $settings[3]->settings_value;
                              $config['smtp_port'] = $settings[4]->settings_value;
                              $config['smtp_pass'] = $settings[5]->settings_value;
                              $config['smtp_crypto'] = $settings[6]->settings_value;
                             
                              $CI->email->initialize($config);


                            
                    }

                    $CI->email->from($settings[2]->settings_value, $settings[0]->settings_value);
                    $CI->email->to($client_email);
                    if($email_cc != ''){
                        $CI->email->cc($client_email);       
                    }
                    $CI->email->subject($email_subject);
                    $CI->email->message($email_body);

                    if($attach>0){
                        
                        foreach($attachment as $result){
                         $CI->email->attach($result);
                        }
                      
                    }
                    if(!$CI->email->send()){
                        return $CI->email->print_debugger(); 
                    }else{
                        return "success";
                    }  

          }

     return;    
          
}          