<?php
//for dollar sign and decimal  and dot add in amount-----
$this->db->where('group_name', 'General');
$dollar = $this->db->get('settings')->result();

//for invoice logo-------
$this->db->where('group_name', 'Invoice');
$invoice_logo = $this->db->get('settings')->result();



$invoice_Products = json_decode($invoice_edit->Products);

$Products = array();
foreach ($invoice_Products as $key => $invoice_product) {
   $this->db->select('Products.name');
   $this->db->where('id', $invoice_product->Products_id);
   $Products[$key] = $this->db->get('Products')->row();
}
//     echo '<pre>';
//     print_r($Products);
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
         background-color: #F8F8FF;
      }

      .invoice {
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
                        <img src="<?php echo base_url('images/invoice/' . $invoice_logo[0]->settings_value) ?>" alt="" id="company_logo" height="80px" width="80px">
                     </td>

                     <td>
                        <div style="float:right;">
                           <b>Invoice No: <?php echo $invoice_edit->invoice_number ?></b><br>
                           Date: <?php echo $invoice_edit->date ?><br>
                           Due date: <?php echo $invoice_edit->due_date ?>
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
                        To
                        <br>
                        <b><?php echo $Clients->client_name; ?></b>
                     </td>

                     <td>
                        Form
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
                        <td colspan="2"><strong>Product</strong></td>
                        <td><strong>Quantity</strong></td>
                        <td><strong>Unit price</strong></td>
                        <td><strong>Tax</strong></td>
                        <td><strong>Total</strong></td>
                     </tr>
                  </thead>

                  <tbody>
                     <?php foreach ($invoice_Products as $key => $invoice_product) : ?>
                        <tr>
                           <td colspan="2"><?php echo $Products[$key]->name ?></td>
                           <td><?php echo $invoice_product->quantity ?></td>
                           <td>
                              <?php byte_format($invoice_product->price) ?>
                           </td>
                           <td>N/A</td>
                           <td>
                              <?php byte_format($invoice_product->amount) ?>
                           </td>
                        </tr>
                     <?php endforeach; ?>
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
                                    <td>Sub total</td>
                                    <td>
                                       <?php if($invoice_edit->sub_total){?>
                                       <?php byte_format($invoice_edit->sub_total) ?>
                                       <?php } else {?>
                                          <?php byte_format(0) ?>
                                       <?php } ?>
                                    </td>   
                                 </tr>
                                 <tr>
                                    <td>Tax</td>
                                    <td>
                                       <?php byte_format(0) ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Discount</td>
                                    <td>
                                       <?php if($invoice_edit->formdata_discount){?>
                                          <?php byte_format($invoice_edit->formdata_discount) ?>
                                       <?php } else {?>
                                          <?php byte_format(0) ?>
                                       <?php } ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Total</td>
                                    <td>          
                                       <?php if($invoice_edit->total){?>
                                          <?php byte_format($invoice_edit->total) ?>
                                       <?php } else {?>
                                          <?php byte_format(0) ?>
                                       <?php } ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Paid</td>
                                    <td>
                                       <?php if($invoice_edit->received_amount){?>
                                          <?php byte_format($invoice_edit->received_amount) ?>
                                       <?php } else {?>
                                          <?php byte_format(0) ?>
                                       <?php } ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Due amount</td>
                                    <td>
                                       <b>
                                          <?php if($invoice_edit->due_amount){?>
                                             <?php byte_format($invoice_edit->due_amount) ?>
                                       <?php } else {?>
                                          <?php byte_format(0) ?>
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