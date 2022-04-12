<?php
if ( ! function_exists('rs_currency'))
{
	/**
	 * Formats a numbers as bytes, based on size, and adds the appropriate suffix
	 *
	 * @param	mixed	will be cast as int
	 * @param	int
	 * @return	string
	 */
	function rs_currency($num)
	{

		$CI =& get_instance();
                    $CI->db->where('group_name','General');
                    $dollar=$CI->db->get('settings')->result();
      
                    if($dollar[13]->settings_value==1){
                       if($dollar[10]->settings_value=='.'){
                         echo $dollar[9]->settings_value;
                         echo number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                       }
                       else if($dollar[10]->settings_value==',')
                       {
                        echo $dollar[9]->settings_value;
                        echo number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                       }                      
                      } 

                      if($dollar[13]->settings_value==2)
                      {
                      if($dollar[10]->settings_value=='.')
                      {
                       echo $dollar[9]->settings_value.' '; 
                       echo number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                       }
                       else if($dollar[10]->settings_value==',')
                       {
                        echo $dollar[9]->settings_value.' ';
                        echo number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value); 
                       } 
                       }
                        if($dollar[13]->settings_value==3)
                         {     
                           if($dollar[10]->settings_value=='.')
                           {
                            echo number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                            echo $dollar[9]->settings_value; 
                           }
                           else if($dollar[10]->settings_value==',')
                           {
                            echo number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                            echo $dollar[9]->settings_value;
                           }    
                           } 
                         if($dollar[13]->settings_value==4)
                         {
                           if($dollar[10]->settings_value=='.'){
                              echo number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value).' '; 
                              echo $dollar[9]->settings_value; 
                              }
                              else if($dollar[10]->settings_value==',')
                              {
                                echo number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value).' ';
                                 echo $dollar[9]->settings_value;
                              }  
                       } 
                    
                 

		return;
	}
}

if ( ! function_exists('rs_currency_new'))
{
	/**
	 * Formats a numbers as bytes, based on size, and adds the appropriate suffix
	 *
	 * @param	mixed	will be cast as int
	 * @param	int
	 * @return	string
	 */
	function rs_currency_new($num)
	{

		$CI =& get_instance();
   
                    $CI->db->where('group_name','General');
                    $dollar=$CI->db->get('settings')->result();
      
                    if($dollar[13]->settings_value==1)
                    {
                       if($dollar[10]->settings_value=='.')
                       {
                         $symbol=$dollar[9]->settings_value;
                         $money=number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                         $money_format=$symbol.$money;
                         return $money_format;
                       }
                       else if($dollar[10]->settings_value==',')
                       {
                        $symbol=$dollar[9]->settings_value;
                        $money=number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                        $money_format=$symbol.$money;
                        return $money_format;
                       }                      
                    }
                      if($dollar[13]->settings_value==2)
                      {
                        if($dollar[10]->settings_value=='.')
                          {
                        $symbol=$dollar[9]->settings_value; 
                        $money=number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                        $money_format=$symbol.' '.$money;
                        return $money_format;
                        }
                        else if($dollar[10]->settings_value==',')
                        {
                          $symbol=$dollar[9]->settings_value.' ';
                          $money=number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                          $money_format=$symbol.' '.$money;
                          return $money_format; 
                        } 
                       }
                        if($dollar[13]->settings_value==3)
                         {     
                           if($dollar[10]->settings_value=='.')
                           {
                            $money=number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                            $symbol=$dollar[9]->settings_value;
                            $money_format=$money.$symbol;
                            return $money_format; 
                           }
                           else if($dollar[10]->settings_value==',')
                           {
                            $money=number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                            $symbol=$dollar[9]->settings_value;
                            $money_format=$money.$symbol;
                            return $money_format; 
                           }
                        }    
                           
                         if($dollar[13]->settings_value==4)
                         {
                           if($dollar[10]->settings_value=='.')
                           {
                             $money=number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value); 
                             $symbol=$dollar[9]->settings_value;
                             $money_format=$money.' '.$symbol;
                             return $money_format;  
                              }
                              else if($dollar[10]->settings_value==',')
                              {
                                $money= number_format($num,$dollar[12]->settings_value,$dollar[10]->settings_value,$dollar[11]->settings_value);
                                $symbol=$dollar[9]->settings_value;
                                $money_format=$money.' '.$symbol;
                                return $money_format;
                              }  
                       }     

                      
                    
                 

		return;
	}
}

if ( ! function_exists('rs_date'))
{
	/**
	 * Formats a numbers as bytes, based on size, and adds the appropriate suffix
	 *
	 * @param	mixed	will be cast as int
	 * @param	int
	 * @return	string
	 */
	function rs_date($date)
	{

		$CI =& get_instance();
                   //$due_date = $row->due_date;
                  //echo $due_date;
                  $timestamp = strtotime($date);
                  $CI->db->where('group_name','General');
                  $dollar=$CI->db->get('settings')->result();
      
                  if ($dollar[6]->settings_value == 'DD-MM-YYYY') 
                  {

                      $new_due_date = date('d-m-y', $timestamp);
                      return $new_due_date;
                   
                   } 
                   else if ($dollar[6]->settings_value == 'MM-DD-YYYY') 
                   {

                      $new_due_date = date('m-d-y', $timestamp);
                      return $new_due_date;
                 

                  } 
                  else if ($dollar[6]->settings_value == 'YYYY-MM-DD')
                   {

                      $new_due_date = date('y-m-d', $timestamp);
                      return $new_due_date;
                

                   } 
                   else if ($dollar[6]->settings_value == 'DD/MM/YYYY')
                    {

                      $new_due_date = date('d/m/y', $timestamp);
                      return $new_due_date;
                  

                   } 
                   else if ($dollar[6]->settings_value == 'MM/DD/YYYY')
                    {

                      $new_due_date = date('m/d/y', $timestamp);
                      return $new_due_date;

                    } 
                    else if ($dollar[6]->settings_value == 'YYYY/MM/DD')
                     {

                      $new_due_date = date('y/m/d', $timestamp);
                      return $new_due_date;
                     }
                    else if ($dollar[6]->settings_value == 'DD.MM.YYYY') 
                    {

                      $new_due_date = date('d.m.y', $timestamp);
                      return $new_due_date;

                     } 
                     else if ($dollar[6]->settings_value == 'MM.DD.YYYY') 
                     {

                      $new_due_date = date('m.d.y',$timestamp);
                      return $new_due_date;

                      } 
                      else 
                      {
                      $new_due_date = date('y.m.d', $timestamp);
                      return $new_due_date;
                       } 

		return;
	}
}


if ( ! function_exists('rs_status'))
{
	/**
	 * Formats a numbers as bytes, based on size, and adds the appropriate suffix
	 *
	 * @param	mixed	will be cast as int
	 * @param	int
	 * @return	string
	 */
	function rs_status($status,$due_amount)
	{

          if (($status == 'Unpaid') && ($due_amount > 0)) {
            $unpaid='<span class="badge badge-secondary badge-pill ml-2">'
              . lang('Unpaid') .
              '</span>';
             return $unpaid;
          }
           else if (($status == 'Partially') && ($due_amount > 0)) {
            return "<span class='badge badge-primary badge-pill ml-2  '>" . lang('partially_paid') . "</span>";
          } else if (($status == 'Overdue') && ($due_amount > 0)) {
            return "<span class=' badge badge-danger badge-pill ml-2  '>" . lang('Overdue') . "</span>";
          } else {
            return "<span class='badge badge-success badge-pill ml-2  '>" . lang('paid') . "</span>";
          }

           
     
		return;
	}
}




