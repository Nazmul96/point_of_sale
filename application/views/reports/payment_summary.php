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
          <h3><?php echo lang('payment_summary');?></h3>
</div>
</div><!-- Page Heading End -->

</div>

<div class="box">
            <div class="box-body">
              
            
       <div class="  py-primary">       
             <table id="example1" class="table table-bordered  data-table data-table-default  ">                    <thead>
                    <tr>
                    <th><?php echo lang('Date');?></th>
                    <th><?php echo lang('invoice_number');?></th>
                    <th><?php echo lang('payment_method');?></th>
                    <th><?php echo lang('Client');?></th>
                    <th><?php echo lang('amount');?></th>                   
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($all_payments as $payments): ?>

                              <tr>
                              <td>
                                 <?php echo rs_date($payments->receive_date)?>

                              </td>        
                              <td><?php echo $payments->invoice_number?></td>
                              <td><?php echo $payments->payment_method?></td>
                              <td><?php echo $payments->client_name?></td>
                              <td>
                              <?php if($payments->amount){?>
                                 <?php rs_currency($payments->amount)?> 
                              <?php } else {?>
                                <?php rs_currency(0) ?>
                              <?php } ?>        
                              </td>                       
                             </tr>
                        <?php endforeach; ?>    
                    </tbody>                     
</table>



</div> 
</div> 
</div> 


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

