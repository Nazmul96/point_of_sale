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
          <h3>payment summary</h3>
</div>
</div><!-- Page Heading End -->

</div>

<div class="box">
            <div class="box-body">
              
            
       <div class="  py-primary">       
             <table id="example1" class="table table-bordered  data-table data-table-default  ">                    <thead>
                    <tr>
                    <th>Date</th>
                    <th>Invoice number</th>
                    <th>Payment Method</th>
                    <th>Client</th>
                    <th>Amount</th>                   
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($all_Payments as $Payments): ?>
                              <?php 
                              $date= $Payments->receive_date;
                              $timestamp = strtotime($date); 
                              // $new_date = date('d-m-Y', $timestamp);
                              ?>
                              <tr>
                              <td>

                              <?php if($dollar[6]->settings_value=='DD-MM-YYYY'){
                                
                                 
                                $new_due_date = date('d-m-y', $timestamp);
                                echo $new_due_date;

                                ?>
                              <?php } else if($dollar[6]->settings_value=='MM-DD-YYYY'){
                                      
                                      $new_due_date = date('m-d-y', $timestamp);
                                    echo $new_due_date;
                                ?>

                            <?php } else if($dollar[6]->settings_value=='YYYY-MM-DD'){
                                   
                                    $new_due_date = date('y-m-d', $timestamp);
                                    echo $new_due_date;
                              ?>

                            <?php } else if($dollar[6]->settings_value=='DD/MM/YYYY'){
                                   
                                    $new_due_date = date('d/m/y', $timestamp);
                                    echo $new_due_date;
                              ?>
                              
                            <?php } else if($dollar[6]->settings_value=='MM/DD/YYYY'){
                                   
                                  $new_due_date = date('m/d/y', $timestamp);
                                  echo $new_due_date;
                              ?>
                              
                            <?php } else if($dollar[6]->settings_value=='YYYY/MM/DD'){
                              
                                  $new_due_date = date('y/m/d', $timestamp);
                                  echo $new_due_date;
                              ?>
                              
                            <?php } else if($dollar[6]->settings_value=='DD.MM.YYYY'){
                            
                                  $new_due_date = date('d.m.y', $timestamp);
                                  echo $new_due_date;
                              
                              ?>
                              
                            <?php } else if($dollar[6]->settings_value=='MM.DD.YYYY'){
                                 
                                    $new_due_date = date('m.d.y', $due_dtimestampate);
                                    echo $new_due_date;
                              ?>
                            
                            <?php } else{
                                     
                                    $new_due_date = date('y.m.d', $timestamp);
                                    echo $new_due_date;
                              ?>   
                            <?php } ?>
                             




                              </td>        
                              <td><?php echo $Payments->invoice_number?></td>
                              <td><?php echo $Payments->payment_method?></td>
                              <td><?php echo $Payments->client_name?></td>
                              <td>
                              <?php if($Payments->amount){?>
                                 <?php byte_format($Payments->amount)?> 
                              <?php } else {?>
                                <?php byte_format(0) ?>
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


