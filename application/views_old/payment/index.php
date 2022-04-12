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
                    <h3>Payments</h3>
          </div>
          </div><!-- Page Heading End -->

          <!-- Page Button Group Start -->
          <div class="col-12 col-lg-auto mb-20">
          <div class="page-date-range">
          <button class="btn btn-primary mb-4 fixed_button" data-toggle="modal" data-target="#paymentModal">  <i class="zmdi zmdi-plus"></i> </button>
          </div>
          </div><!-- Page Button Group End -->

          </div>

<div class="row">
  <div class="col-12 col-md-3 col-sm-4">
    
<div class="row mb-10">
  <div class="col-sm-12">
    <div class="top-report ml-2">
      <div class="head mb-0"> Total amount </div>
      <div class="content mb-0"> 
         <h2 class="mb-0 text-primary"> 
         <?php if($total_amount->amount){ ?>            
              <?php byte_format($total_amount->amount);?>
          <?php } else { ?>
              <?php byte_format(0)?>
          <?php } ?> 
         </h2>
       </div>
     </div>
  </div>
</div> 
  </div>
  <div class="col-12 col-md-9 col-sm-8">
          <?php
          $message=$this->session->userdata('message');
          if($message){
                    echo " <div class='alert alert-success'>$message</div>";
                    $this->session->unset_userdata('message');
          }
          ?>
          <div class="box">
            <div class="box-body">
          <div class="py-primary">       
             <table id="example1" class="table table-bordered data-table data-table-default  ">
                    <thead>
                    <tr>
                      <th>Invoice number</th>
                      <th>Client</th>
                      <th>Date</th>
                      <th>Payment Method</th>
                      <th>Amount</th>
                      <th>Action</th>        
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
                              <td><?php echo $Payments->invoice_number?></td>        
                              <td><?php echo $Payments->client_name?></td>
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
                              <td>
                                <?php echo $Payments->payment_method?>
                             </td>
                              <td>
                                <?php if($Payments->amount){   ?>            
                                   <?php byte_format($Payments->amount);?>
                                <?php } else { ?>
                                    <?php byte_format(0)?>
                                <?php } ?>                         
                              </td>

                              <td class="text-right p-2"> 
                              <div class="dropdown options-dropdown d-inline-block">
                                 <button type="button" data-toggle="dropdown" title="Actions" class="btn-option btn" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                 <circle cx="12" cy="12" r="1"></circle>
                                 <circle cx="12" cy="5" r="1"></circle>
                                 <circle cx="12" cy="19" r="1"></circle></svg></button>
                                 <div class="dropdown-menu dropdown-menu-right py-2 mt-1">
                                        <a href="#" class="dropdown-item px-4 py-2 payment_edit" data-id="<?php echo $Payments->id ?>">
                                                  Edit
                                        </a><a href="<?php echo base_url();?>delete_payment/<?php echo $Payments->id?>" class="dropdown-item px-4 py-2" id="delete">
                                                  Delete
                                        </a></div></div>

                              </td>                         
                             </tr>
                        <?php endforeach; ?>
                    </tbody>                     
          </table>
          
</div> 
</div> 
</div> 

</div>
</div>

</div> 

<!-- Insert Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top:9%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <form action="<?php echo base_url()?>invoice_payment_insert" method="POST" id="pay_insert">
          
          <div class="modal-body">          
          <div class="form-group">
                    <label for="invoice_number">Invoice*</label>
                    <select name="invoice_number" class="form-control">
                          <option value="">Choose an invoice</option>
                    <?php foreach($all_invoice as $rows): ?>
                       <option value="<?php echo $rows->invoice_number?>"><?php echo $rows->invoice_number?></option>
                     <?php endforeach; ?>   
                    </select>    
          </div>
          <br>
          <div class="form-group">
                    <label for="category_name">Receive on</label>
                    <input type="date" class="form-control" name="receive_date">
                    <span id="receive_date_error" class="text-danger"></span>          
          </div>
          <br>
          <div class="form-group">
                    <label for="category_name">Payment Method*</label>
                    <select name="payment_method" id="" class="form-control">
                              <option value="">Choose a payment method</option>
                              <option value="cash">Cash</option>
                    </select>
                    <span id="payment_method_error" class="text-danger"></span>          
          </div>
          <br>
          <div class="form-group">
                    <label for="category_name">Amount*</label>
                    <input type="text" class="form-control" name="amount">
                    <span id="amount_error" class="text-danger"></span>          
          </div>
          <br>
          <div class="form-group">
                    <label for="category_name">Notes*</label>
                    <textarea class="form-control textarea" name="note"></textarea>        
          </div>           
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
          </div>
          </form>
    </div>
  </div>
</div> 


<!-- Edit Modal -->
<div class="modal fade" id="payment_editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="margin-top:5%; margin-left:3%;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Payment</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div id="modal_body">

       </div>               
    </div>
  </div>
</div>

<script>
$( document ).ready(function() {
            //payment_insert--------
            $('#pay_insert').submit(function(e){
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var request =$(this).serialize();
                    $.ajax({
                      url:url,
                      type:'post',
                      async:false,
                      data:request,
                      dataType: 'JSON',
                    success:function(data){

                      if (data.error) {

                      if (data.receive_date != '') {

                      $('#receive_date_error').html(data.receive_date);  
                      }else {
                      $('#receive_date_error').html('');
                      }

                      if (data.payment_method != '') {
                      $('#payment_method_error').html(data.payment_method);  
                      }else {
                      $('#payment_method_error').html('');
                      }

                      if (data.amount != '') {
                      $('#amount_error').html(data.amount);  
                      }else {
                      $('#amount_error').html('');
                      }

                      }
                      else{

                      $('#receive_date_error').html('');
                      $('#payment_method_error').html('');
                      $('#amount_error').html('');

                      $('#pay_insert')[0].reset();
                      $('#add_payment_modal').modal('hide');
                      window.location.reload();

                      }

                        
                          
                       
                      }
                    });


             }); 

     
  });   

  $('.payment_edit').click(function(e){ 
  e.preventDefault();
  $('#payment_editModal').modal('show');
  let id=$(this).attr('data-id');
  $.get("payment_edit/"+id,function(data){

    $('#modal_body').html(data)
      
  });
  });
</script>