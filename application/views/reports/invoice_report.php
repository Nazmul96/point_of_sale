<?php
        //for dollar sign-------
    $this->db->where('group_name','General');
    $dollar=$this->db->get('settings')->result();
?>
<div class="content-body">

<!-- Page Headings Start -->
<div class="row justify-content-between align-items-center mb-10">

<!-- Page Heading Start -->
<div class="col-12 col-lg-auto mb-20">
<div class="page-heading">
          <h3><?php echo lang('invoice_report');?></h3>
</div>
</div><!-- Page Heading End -->

</div>

 <div class="box">
            <div class="box-body">
              
            
       <div class="  py-primary">       
             <table id="example1" class="table table-bordered  data-table data-table-default  ">
                    <thead>
                    <tr>
                    <th><?php echo lang('Status');?></th>
                    <th><?php echo lang('invoice_number');?></th>
                    <th><?php echo lang('Date');?></th>
                    <th><?php echo lang('Client');?></th>
                    <th><?php echo lang('amount');?></th>
                    <th><?php echo lang('paid');?></th>
                    <th><?php echo lang('amount_due');?></th>                   
                    </tr>
                    </thead>
                    <tbody>

                              <?php foreach($all_invoices as $invoices): ?>
                                        <?php 
                                      // $due_date= $invoices->date;
                                      // echo $due_date;
                                      // die();
                                      // $timestamp = strtotime($due_date);
                                      // // $new_due_date = date('Y/m/d', $due_date);
                                      ?>
                                        <tr>
                                        <td>     
                                        <?php echo rs_status($invoices->status,$invoices->due_amount);?>  
                                        </td>
                                    
                                        <td><?php echo $invoices->invoice_number?></td>
                                        <td>
                                         <?php echo rs_date($invoices->date)?>
                                        </td>
                                        <td><?php echo $invoices->client_name; ?></td>                                       
                                        <td>
                                        <?php if($invoices->sub_total){?>
                                          <?php rs_currency($invoices->sub_total)?> 
                                        <?php } else {?>
                                          <?php rs_currency(0) ?>
                                        <?php } ?>    
                                       </td>   
                                        <td>
                                        <?php if($invoices->received_amount){?>
                                          <?php rs_currency($invoices->received_amount)?> 
                                        <?php } else {?>
                                          <?php rs_currency(0) ?>
                                        <?php } ?> 
                                       </td>                                     
                                        <td>
                                        <?php if($invoices->due_amount){?>
                                          <?php rs_currency($invoices->due_amount)?> 
                                        <?php } else {?>
                                          <?php rs_currency(0) ?>
                                        <?php } ?>  
                                       </td>
                                      </tr>
                              <?php endforeach; ?>       
                    </tbody>                     
</table>




</div> </div> </div> 

</div> 

<script>
  $(document).ready(function() {
    $('.data-table-default').DataTable({
      responsive: true,
      language: {
        paginate: {
          previous: '<i class="zmdi zmdi-chevron-left"></i>',
          next: '<i class="zmdi zmdi-chevron-right"></i>'
        }
      }
    });
  });
</script>
