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
          <h3>Client statement</h3>
</div>
</div><!-- Page Heading End -->

</div>

 <div class="box">
            <div class="box-body">
              
            
       <div class="  py-primary">       
             <table id="example1" class="table table-bordered  data-table data-table-default  ">
                    <thead>
                    <tr>
                    <th>Date</th>
                    <th>Activity</th>
                    <th>Invoices</th>
                    <th>Payments</th>
                    <th>Balance</th>                   
                    </tr>
                    </thead>
                    <tbody>

                              <?php foreach($all_Invoices as $Invoices): ?>
                                <?php 
                              $due_date= $Invoices->date;
                              // echo $due_date;
                              // die();
                               $timestamp = strtotime($due_date);
                              // // $new_due_date = date('Y/m/d', $due_date);
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
                                  <td><span class='badge badge-success badge-pill ml-2'>Payment Received</span></td>
                                  <td><?php echo $Invoices->invoice_number?></td>

                                  <td>
                                  <?php if($Invoices->received_amount){?>
                                    <?php byte_format($Invoices->received_amount)?> 
                                  <?php } else {?>
                                    <?php byte_format(0) ?>
                                  <?php } ?>                           
                                 </td>
                                 
                                  <td>
                                  <?php if($Invoices->due_amount){?>
                                      <?php byte_format($Invoices->due_amount)?> 
                                    <?php } else {?>
                                      <?php byte_format(0) ?>
                                    <?php } ?>      
                                  </td>  
                                </tr>
                              <?php endforeach; ?>       
                    </tbody>                     
</table>



</div> </div> </div> 


</div> 

<script>
//   $('.data-table-default').DataTable( {
//     "order": [[ 2, 'asc' ]],
//     "ordering": false,
// } );
// </script>
