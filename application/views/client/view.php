<?php
//  echo '<pre>';
//  print_r($view);
//  die();
?>
<div class="content-body">

<!-- Page Headings Start -->
<div class="row justify-content-between align-items-center mb-10">

    <!-- Page Heading Start -->
    <div class="col-12 col-lg-auto mb-20">
        <div class="page-heading">
            <h3><?php echo lang('client_details')?></h3>
        </div>
    </div><!-- Page Heading End -->



</div>
<div class="card-body">

 <div class="row">
      <div class="col-md-4">
        <div class="box">
            <div class="box-body">
                <div class="email">
                <h5><i class="zmdi zmdi-email"></i> <?php echo $value->client_email ?></h5>
                    <?php                
                        if ($value->contact_number == "") {
                      ?>
                       <?php  echo "Not added yet" ?>          
                        
                      <?php
                        } else {
                      ?>
                        <h5><i class="zmdi zmdi-phone"></i> <?php echo $value->contact_number ?></h5>
                      <?php
                        }
                   ?> 
           </div>         
           <table class="table">
                  <tr>
                      <td><b><?php echo lang('City')?></b></td>
                      <td><?php echo $value->city ?></td>
                  </tr>
                  <tr>
                      <td><b><?php echo lang('State')?></b></td>
                      <td><?php echo $value->state ?></td>
                  </tr> 
                  <tr>
                      <td><b><?php echo lang('postal_code')?></b></td>
                      <td><?php echo $value->postal_code ?></td>
                  </tr>
                  <tr>
                      <td><b><?php echo lang('Country')?></b></td>
                      <td><?php echo $value->country ?></td>
                  </tr>
                  <tr>
                      <td><b><?php echo lang('Website')?></b></td>
                      <td><?php echo $value->website ?></td>
                  </tr>
                  <tr>
                      <td><b><?php echo lang('Notes')?></b></td>
                      <td><?php echo $value->note ?></td>
                  </tr>      
           </table>
            </div>
        </div>
           
                  
         </div>
          <div class="col-md-8">
                
               <table class="table table-bordered  data-table data-table-default ">
                       <thead>
                           <tr>
                                    <th><?php echo lang('invoice_number')?></th>
                                    <th><?php echo lang('Status')?></th>
                                    <th><?php echo lang('Date')?></th>
                                    <th><?php echo lang('due_date')?></th>
                                    <th><?php echo lang('Amount')?></th>
                                    <th><?php echo lang('Action')?></th> 
                           </tr>
                       </thead>
                       <tbody>
                       <?php foreach($invoices as $key=>$row): ?> 
                           <tr>
                               <td><?php echo $row->invoice_number;?></td>
                               <td>
                               <?php echo rs_status($row->status,$row->due_amount);?> 
                               </td>
                               <td><?php echo rs_date($row->date);?></td>
                               <td><?php echo rs_date($row->due_date);?></td>
                               <td>
                                    
                               <?php if($row->sub_total){             
                                    rs_currency($row->sub_total);
                                ?>
                                <?php } else {
                                rs_currency(0);
                                }?>  

                               </td>
                               <td class="text-center">
                                <a href="<?php echo base_url();?>view_invoices/<?php echo $row->id?>"><i class="fas fa-eye"></i></a>
                               </td>
                           </tr>
                           <?php endforeach; ?>   
                           </tbody>
                     </table> 
                
                          
          </div>   

        </div>
</div>
            

          
</div>           