<?php
//for dollar sign and decimal  and dot add in amount-----
$this->db->where('group_name','General');
$dollar=$this->db->get('settings')->result();

//for invoice logo-------
$this->db->where('group_name','Invoice');
$invoice_logo=$this->db->get('settings')->result();


$invoice_products = json_decode($invoice_edit->products);

   $products=array();
     foreach ($invoice_products as $key=>$invoice_product){
          $this->db->select('products.name');          
          $this->db->where('id',$invoice_product->products_id);
          $products[$key]=$this->db->get('products')->row();
     }
//     echo '<pre>';
//     print_r($products);
//     die();          
?>



<!DOCTYPE html>
<html lang="en">
          <head>
          <meta charset="utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1" />

          <title>Invoice</title>
    
          <style>

            body {
                     font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                     text-align: center;
                     color: #777;
                     background-color:#F8F8FF;
            }

            .invoice{
                    max-width: 1000px;
                    margin: auto;
                    padding: 30px;
                    border: 1px solid #eee;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                    font-size: 12px;
                    line-height: 24px;
                    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                    color: #555;
                   
                    
             }
         </style>
          </head>

          <body>
          <div class="invoice">
                    <table style="width:100%;">
                    <tr>
                    <td>
                              <table>
                              <tr>
                                        <td style="text-align:left;">
                                        <img src="<?php echo base_url('images/invoice/' .$invoice_logo[0]->settings_value) ?>" alt="" id="company_logo" height="80px" width="80px">
                                        </td>

                                        <td>
                                        <div style="float:right;">
                                        <b><?php echo lang('invoice_no');?>: <?php echo $invoice_edit->invoice_number?></b><br>
                                        <?php echo lang('Date');?>: <?php echo $invoice_edit->date?><br>
                                        <?php echo lang('due_date');?>: <?php echo $invoice_edit->due_date?>
                                        </div> 
                                        </td>
                                        
                              </tr>
                              </table>
                              <hr>              
                    </td>                   
                    </tr>

                    <tr>
                    <td>
                              <table>
                              <tr>
                                        <td style="text-align:left;">
                                        <?php echo lang('to');?>
                                        <br>
                                        <b><?php echo $clients->client_name; ?></b>
                                        </td>

                                        <td>
                                        <?php echo lang('form');?>
                                         <br>
                                         <b>Nazmul Hossain</b>
                                        
                                        </td>
                                        <td></td>
                                        
                              </tr>
                              </table>
                              <hr>              
                    </td>                   
                    </tr>
                    <tr>
                       <td>

                    <table style="width: 100%;
                    
                    text-align: left;">
                    <thead>
                    <tr style="background-color:black; color:white;">
                              <td colspan="2"><strong><?php echo utf8_encode(lang('product'));?></strong></td>
                              <td><strong><?php echo utf8_encode(lang('quantity'));?></strong></td>
                              <td><strong><?php echo lang('price');?></strong></td>
                              <td><strong><?php echo lang('tax');?></strong></td>
                              <td><strong><?php echo lang('amount');?></strong></td>
                    </tr>
                    </thead>
                   
                    <tbody>
                    <?php foreach ($invoice_products as $key=>$invoice_product) :?>
                    <tr>         
                    <td colspan="2"><?php echo $products[$key]->name?></td>
                    <td><?php echo $invoice_product->quantity?></td>
                    <td>
                    <?php if($invoice_product->price) {?>
                        <?php rs_currency($invoice_product->price)?> 
                        <?php } else {?>
                          <?php rs_currency(0)?>
                        <?php } ?>    
                    </td>
                    <td>N/A</td>
                    <td>
                    <?php if($invoice_product->amount) {?>
                        <?php rs_currency($invoice_product->amount)?> 
                        <?php } else {?>
                          <?php rs_currency(0)?>
                        <?php } ?>  
                    </td>
                    </tr> 
                    <?php endforeach;?>           
                    </tbody>
                  </table>

                   </td>
                  </tr>
                  
                  <tr>
                    <td>
                              <table>
                              <tr>
                                        <td style="text-align:left;">
                                       
                                        </td>

                                        <td>
                                        <div style="float:right;">
                                          <table>
                                             <tbody>
                                                <tr>
                                                   <td><?php echo lang('sub_total');?></td>
                                                   <td>
                                                   <?php if($invoice_edit->sub_total) {?>
                                                   <?php rs_currency($invoice_edit->sub_total)?> 
                                                   <?php } else {?>
                                                   <?php rs_currency(0)?>
                                                   <?php } ?>                              
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><?php echo lang('tax');?></td>
                                                   <td>
                                                   <?php rs_currency(0)?>               
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><?php echo lang('discount');?></td>
                                                   <td>
                                                   <?php if($invoice_edit->formdata_discount){?>
                                                   <?php rs_currency($invoice_edit->formdata_discount)?> 
                                                   <?php } else {?>
                                                   <?php rs_currency(0)?>
                                                   <?php } ?>      
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><?php echo lang('total');?></td>
                                                   <td>
                                                   <?php if($invoice_edit->total){?>
                                                   <?php rs_currency($invoice_edit->total)?> 
                                                   <?php } else {?>
                                                   <?php rs_currency(0)?>
                                                   <?php } ?>     
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><?php echo lang('paid');?></td>
                                                   <td>
                                                   <?php if($invoice_edit->received_amount){?>
                                                   <?php rs_currency($invoice_edit->received_amount)?> 
                                                   <?php } else {?>
                                                   <?php rs_currency(0)?>
                                                   <?php } ?>  
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td><?php echo lang('due_amount');?></td>
                                                   <td>
                                                   <b>
                                                   <?php if($invoice_edit->due_amount){?>
                                                   <?php rs_currency($invoice_edit->due_amount)?> 
                                                   <?php } else {?>
                                                   <?php rs_currency(0)?>
                                                   <?php } ?>     
                                                   </b>           
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                        </div> 
                                        </td>
                                        
                              </tr>
                              </table>
                                         
                    </td>                   
                    </tr>

                  

                    </table>
                 
                
            </div>  
          
          </body>
</html>