<?php
if ( ! function_exists('rs_valid_user'))
{
	/**
	 * Formats a numbers as bytes, based on size, and adds the appropriate suffix
	 *
	 * @param	mixed	will be cast as int
	 * @param	int
	 * @return	string
	 */
	function rs_valid_user($current_section) //current_section='invoice'
	{
                    $CI =& get_instance();

                    $login_info=$CI->session->userdata('login_info');
                    $user_type=$login_info['user_type'];

                    $CI->db->where('id',$user_type);
                    $feature=$CI->db->get('roles')->row();

		$all_feature=explode(',',$feature->all_section);
                    // echo '<pre>';
                    // print_r($all_feature);
		// die();
		if(in_array($current_section,$all_feature)){
			return true;
		}
		else{
			return false;		
		}	
		

		
          }

      return;  		
}         