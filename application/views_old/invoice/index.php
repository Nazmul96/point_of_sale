   <?php 
    // echo '<pre>';
    // print_r($row);
    $val=$row1->invoice_number;
    
    $this->db->where('group_name','General');
    $dollar=$this->db->get('settings')->result();

    // echo $dollar[6]->settings_value;
    // die();

   ?> 
<div class="content-body" id="product_list">

  <!-- Page Headings Start -->
  <div class="row justify-content-between align-items-center mb-10">

    <!-- Page Heading Start -->
    <div class="col-12 col-lg-auto mb-20">
      <div class="page-heading">
        <h3>Invoices</h3>
      </div>
    </div><!-- Page Heading End -->
    <!-- Page Button Group Start -->
    <div class="col-12 col-lg-auto mb-20">
      <div class="page-date-range">
       
      
      </div>
    </div><!-- Page Button Group End -->

  </div>
  <button class="fixed_button btn btn-primary mb-4"  id="productmodal"> <i class="zmdi zmdi-file-plus"></i> </button>

<div class="row">
  <div class="col-12 col-md-3 col-sm-4">
     <div class="row  mb-10">
    <div class="col-sm-12 mb-2">
      <div class="top-report ml-2">
               <div class="head mb-1"> Total amount </div>
                <div class="content mb-0"> 
                       <h2 class="mb-0 text-primary">
                          <?php if($total_amount->sub_total){?>
                           <?php byte_format($total_amount->sub_total)?> <!-- helper function call -->
                           <?php } else {?>
                             <?php byte_format(0) ?>
                            <?php } ?>
                       </h2> 
                          
                </div>
      </div>
    </div>

      <div class="col-sm-12 mb-2">
          <div class="top-report ml-2">
              <div class="head mb-1"> Total paid </div>
                <div class="content mb-0">
                     
                      <h2 class="mb-0 text-success">
                        <?php if($total_amount->received_amount){?>
                          <?php byte_format($total_amount->received_amount)?><!-- helper function call -->
                           <?php } else {?>
                             <?php byte_format(0) ?>
                            <?php } ?> 
                      </h2>
              </div>
          </div>
        </div>
             
      <div class="col-sm-12 mb-2">
          <div class="top-report ml-2">
                   <div class="head mb-1"> Total due</div>
                    <div class="content mb-0">
                         
                          <h2 class="mb-0 text-warning">
                          <?php if($total_amount->due_amount){?>
                            <?php byte_format($total_amount->due_amount)?><!-- helper function call -->
                           <?php } else {?>
                             <?php byte_format(0) ?>
                            <?php } ?>  
                          </h2>
                </div>
      </div>
    </div>

  </div>
  </div>
  <div class="col-12 col-md-9 col-sm-12">
    <div class="box">
    <div class="box-body"> 
      <div class="  py-primary">       
        <table id="example1" class="table table-bordered  data-table data-table-default table-striped table-sm">
              <thead>
              <tr>
                <th>Invoice number</th>
                <th>Status</th>
                <th>Client</th>
                <th>Due date</th>
                <th>Amount</th>
                <th>Paid</th>
                <th>Amount due</th>
                <th>Action</th>                    
              </tr>
              </thead>
              <tbody>
                <?php foreach($Invoices as $key=>$row): ?>
                <?php 
                   $due_date= $row->due_date;
                   //echo $due_date;
                   $timestamp = strtotime($due_date);
                   //echo $timestamp;
                   //die();
                  // // $new_due_date = date('Y/m/d', $due_date);
                  ?>
                <tr>
                  <td><?php echo $row->invoice_number;?></td>
                  <td>
                  <?php 
              
              if(($row->status=='Unpaid')&&($row->due_amount>0)){
               echo '<span class="badge badge-secondary badge-pill ml-2">'
               .lang('Unpaid') .
               '</span>';
               
              }
              else if(($row->status=='Partially')&&($row->due_amount>0)){
               echo "<span class='badge badge-primary badge-pill ml-2  '>".lang('Partially Paid')."</span>";
              
              }
              else if(($row->status=='Overdue')&&($row->due_amount>0)){
               echo "<span class=' badge badge-danger badge-pill ml-2  '>".lang('Overdue')."</span>";
              
              }
              else{
               echo "<span class='badge badge-success badge-pill ml-2  '>".lang('paid')."</span>";
              
              }

             ?>

             </td>
             <td><?php echo $Invoices[$key]->client_name;?></td>
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
                     <?php if($Invoices[$key]->sub_total){             
                          byte_format($Invoices[$key]->sub_total);
                       ?>
                    <?php } else {
                       byte_format(0)
                      ?>
                     <?php } ?>
                    </td>

                   <td>
                     <?php if($Invoices[$key]->received_amount){             
                       byte_format($Invoices[$key]->received_amount)
                       ?>
                    <?php } else {
                       byte_format(0)
                      ?>
                     <?php } ?>
                    </td> 

                  <td>
                    <?php if($Invoices[$key]->due_amount){             
                      byte_format($Invoices[$key]->due_amount);
                       ?>
                    <?php } else {
                       byte_format(0)
                      ?>
                     <?php } ?> 
                  </td>

                  <td>
                  <div class="dropdown options-dropdown d-inline-block">
                         <button type="button" data-toggle="dropdown" title="Actions" class="btn-option btn" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                         <circle cx="12" cy="12" r="1"></circle>
                         <circle cx="12" cy="5" r="1"></circle>
                         <circle cx="12" cy="19" r="1"></circle></svg></button>
                         <div class="dropdown-menu dropdown-menu-right py-2 mt-1">
                               <a href="<?php echo base_url();?>download_invoice/<?php echo $row->invoice_number?>" class="dropdown-item px-4 py-2">
                                          Download</a>
                                <a href="<?php echo base_url();?>view_Invoices/<?php echo $row->invoice_number?>" class="dropdown-item px-4 py-2">
                                          View</a>
                                <a href="#" class="dropdown-item px-4 py-2 add_payment" data-id="<?php echo $row->invoice_number?>" >
                                Add Payment</a>
                                <a href="#" class="dropdown-item px-4 py-2 edit" data-id="<?php echo $row->id ?>" data-toggle="modal" data-target="#editModal">
                                          Edit
                                </a><a href="<?php echo base_url();?>delete_Invoices/<?php echo $row->id?>" class="dropdown-item px-4 py-2" id="delete">
                                          Delete
                                </a>
                              </div>
                            </div>
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
<div class="content-body" id="product_add">
  <div class="page-heading mb-20">
    <h3>Add New Invoice</h3>
  </div>
  <div class="box">
    <div class="box-body">
      <form action="<?php echo base_url() ?>invoice_insert" method="POST" id="invoice_insert"> 
          <div class="row mb-4">
            <div class="col-md-6">
              <div class="form-group">
                <label for="category_name">Client</label>
                <select name="client_id"  class="form-control">           
                    <option value="">Choose Clients</option>
                    <?php foreach ($Clients as $row) : ?>
                    <option value="<?php echo $row->id ?>"><?php echo $row->client_name ?></option>
                    <?php endforeach; ?>
                </select>
                <span id="client_error" class="text-danger"></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <!-- Date input -->
                <label class="control-label" for="date">Date</label>
                <input class="form-control" id="date" name="date" type="date">
                <span id="date_error" class="text-danger"></span>
              </div>
            </div> 
                
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="category_name">Status</label>
                  <select name="status" id="" class="form-control">
                    <option value="">Choose Status</option>
                    <option value="Paid">Paid</option>
                    <option value="Unpaid">Unpaid</option>
                    <option value="Partially">Partially Paid</option>
                    <option value="Overdue">Overdue</option>
                  </select>
                  <span id="status_error" class="text-danger"></span>
                </div>
              </div>        
              <div class="col-md-6" >
                <div class="form-group">
                  <label class="control-label" for="date">Due Date </label>
                  <input class="form-control" id="date" name="due_date" type="date"/>
                  <span id="due_date_error" class="text-danger"></span>
                </div>
              </div>
            </div>
                
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="category_name">Invoice Number</label>
                 
                  <input type="text" class="form-control" name="invoice_number" value="<?php echo $val+1;?>">
                   
                </div>
              </div>

              <div class="col-md-6" id="recurring">
                <div class="form-group">
                  <label for="category_name">Recurring</label>
                  <select name="recurring" id="" class="form-control">
                    <option value="">Choose Recurring</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Quaterly">Quaterly</option>
                    <option value="artially Paid">Semi Annually</option>
                    <option value="Overdue">Annually</option>
                  </select>
                </div>
              </div>
           
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="category_name">Recurring</label>
                  <div class="form-check form-switch">
                    <input class="form-check-input recur" type="checkbox" id="flexSwitchCheckDefault">

                  </div>
                </div>
              </div>

            </div>
            <br>
            <div class="row">
              <div class="col-md-4 bg-dark text-white p-1">
                <p>Product</p>
              </div>
              <div class="col-md-2 bg-dark text-white p-1">
                <p>Quantity</p>
              </div>
              <div class="col-md-2 bg-dark text-white p-1">
                <p>Price</p>
              </div>
              <div class="col-md-2 bg-dark text-white p-1">
                <p>Tax</p>
              </div>
              <div class="col-md-2 bg-dark text-white p-1">
                <p>Amount</p>
              </div>
            </div>
            <br>

            <div class="add_element"> 
              <div class="row bg-light find_element" id="row0">
                <div class="col-md-4 p-1">
                  <select name="Products_id[]"  class="form-control product_id ">                     
                   <option value="choose">Choose Products</option>
                    <?php foreach ($Products as $row) : ?>
                      <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                    <?php endforeach; ?>
                  </select>
                  <span class="text-danger" id="product_id_error"></span>
                  <input type="hidden" name="id[]" value="0">
                </div>
                <div class="col-md-2 p-1">
                   <input type="number" name="quantity[]"  placeholder="Add quantity" value="" class="form-control quantity">
                </div>
                <div class="col-md-2 p-1">
                  <input type="text" placeholder="Add price" name="price[]" class="form-control price">
                </div>
                <div class="col-md-2 p-1">
                  <select name="tax" id="" class="form-control">
                    <option value="">N/A Tax</option>
                  </select>
                </div>
                <div class="col-md-2 p-1">
                  <div class="row">
                    <div class="col-md-8">
                    <input type="text" name="amount[]" id="" class="form-control amount">
                    </div>
                    <div class="col-md-2">
                      <button type="button" name="remove" class="btn btn-danger btn-sm mt-2 btn_remove btn_hide" data-id="0"><i class="far fa-trash-alt"></i></button>
                    </div>
                  </div>
                </div>                 
              </div>
            </div>
                
            <a class="btn btn-primary btn-sm mt-1 mr-2" href="#" style="float:right;" id="add_more"> + Add More
            </a>
            <br><br>


            <div class="row">
             <div class="col-sm-6"> </div>
             <div class="col-sm-6">
              <div style="width:100%;">
             
                <div class="text-size-16 border-bottom mb-2">
                  <div class="d-flex align-items-center justify-content-between py-2">
                    <p class="text-muted mb-0">Sub total</p>
                    <input type="hidden" name="sub_total" class="sub_total"><p class="mb-0 sub_total">$ 0.00</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between py-2">
                    <p class="text-muted mb-0">Tax</p>
                    <p class="mb-0">$ 0.00</p>
                  </div>
                  <div class="row align-items-center justify-content-between py-2">
                    <div class="col-7">
                      <div>
                        <select id="discount_type" name="discount_type" class="custom-select choose" style="background-image: url(&quot;https://billar.gainhq.com/images/chevron-down.svg&quot;);">
                          <option value="none">Choose discount type</option>
                          <option value="fixed">Fixed</option>
                          <option value="percentage">Percentage</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-5">  
                      <div>
                        <input type="number" name="formdata_discount" id="formData_discount" placeholder=""  autocomplete="off" class="form-control" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                  <h4 class="text-muted mb-0">Total</h4>
                  <input type="hidden" name="total" class="total"><h4 class="mb-0 total">$ 0.00</h4>
                </div>
                <div class="row d-flex align-items-center justify-content-between py-2">
                  <div class="col-7">
                    <p class="text-muted mb-0">Received amount</p>
                  </div>
                  <div class="col-5">
                    <div>
                      <input type="number" name="received_amount" id="formData_received_amount" placeholder="" autocomplete="off" class="form-control ">
                      <!---->
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-between py-2">
                  <p class="text-muted mb-0">Return amount</p>
                  <h4 class="mb-0 return_amount">$ 0.00</h4>
                </div>
                <div class="d-flex align-items-center justify-content-between py-2">
                  <p class="text-muted mb-0">Due amount</p>
                  <input type="hidden" name="due_amount" class="due_amount">
                  <h4 class="mb-0 due_amount">$ 0.00</h4>
                </div> 
              </div>
              </div>
            </div> 
            <div class="d-flex flex-wrap justify-content-center col mb-10 mt-4">
              <button type="button" class="btn btn-outline-danger product_show mx-2">cancel</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>


    
    

    <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style=" ">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div id="modal_body">

       </div>               
    </div>
  </div>
</div>

<!-- Payment Model -->
<div class="modal fade" id="add_payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style=" ">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Payment</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div id="payment_body">

       </div>               
    </div>
  </div>
</div>

  
    <script>
      $(document).ready(function() {
        $('#recurring').hide();

        $('.recur').on('change',function() {
          $('#recurring').toggle();
        })

        //invoice_insert---------product_error
                $('#invoice_insert').submit(function(e){
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

                          if (data.client_id != '') {
                          $('#client_error').html(data.client_id);  
                          }else {
                          $('#client_error').html('');
                          }

                          if (data.date != '') {
                          $('#date_error').html(data.date);  
                          }else {
                          $('#date_error').html('');
                          }

                          if (data.due_date != '') {
                          $('#due_date_error').html(data.due_date);  
                          }else {
                          $('#due_date_error').html('');
                          }

                          if (data.currency != '') {
                          $('#currency_error').html(data.currency);  
                          }else {
                          $('#currency_error').html('');
                          }

                          if (data.status != '') {
                          $('#status_error').html(data.status);  
                          }else {
                          $('#status_error').html('');
                          }

                          if (data.product != '') {
                          $('#product_id_error').html(data.product);  
                          }else {
                          $('#product_id_error').html('');
                          }

                          }
                          else{

                          $('#client_error').html('');
                          $('#date_error').html('');
                          $('#currency_error').html('');
                          $('#date_error').html('');
                          $('#status_error').html('');
                          $('#product_id_error').html('');
                         

                          $('#invoice_insert')[0].reset();
                          $('#product_add').hide();
                          $('#product_list').show();  
                          window.location.reload();

                          }

                            
                              
                          
                          }
                        });


                }); 

        
          });


        //choose product-----
       $(document).on('change', '.product_id', function(){
         
         var id = $(this).val();
         var me=$(this);
         $.ajax({
           url: '<?php echo base_url()?>get_product_details',
           data:{
              id:id,
           },
           type: 'post',
           success: function(data) {
             
            var abc=JSON.parse(data);
      
            var button_id = $(this).attr("data-id");              
             let quantityel=me.parent().parent().find('.quantity').val('1');
             let pricel=me.parent().parent().find('.price').val(abc.price);
             let amountel=me.parent().parent().find('.amount').val(abc.price);
             pricel= pricel.val();
             $('.sub_total').text(pricel);
             $('.sub_total').val(pricel);            
             $('.total').text(pricel);
             $('.total').val(pricel);
             $('.due_amount').text(pricel);
             //$('.due_amount').val(pricel);
        
               calculate();
         
             
           }
        });
       });
    
       //quntity increment on change product----------
       $(document).on('click', '.quantity', function(){
               quantityel=$(this).val();
               var pricel=$(this).parent().parent().find('.price').val();
               amountel=pricel*quantityel;
               $(this).parent().parent().find('.amount').val(amountel);
              //  $('.sub_total').text(amountel);
              //  $('.sub_total').val(amountel);
              //  $('.total').text(amountel);
              //  $('.total').val(amountel);
              //  $('.due_amount').text(amountel);
               //$('.due_amount').val(amountel);
            
               calculate();

             })
      
       //calculate amount place to sub_total,,,total,,,,,,due_amount,,,
       function calculate()
       {
                  var sum=0;
                        $('.amount').each(function(){
                          
                          var total=$(this).val( );
                          if(total==null || total == ''){
                            total=0;
                          }
                          sum=sum +parseFloat(total);
                          //console.log(sum);
                          $('.sub_total').text(sum);
                          $('.total').text(sum);
                          $('.due_amount').text(sum);
                          $('.sub_total').val(sum);
                          $('.total').val(sum);
                          $('.due_amount').val(sum);
                        })
            
            
              }
       
      
       $(document).on('change', '.choose', function(){
                var value=$(this).val();
                
                if(value=='none'){
                  $('#formData_discount').attr('disabled','disabled');
                  var ab=$('.sub_total').val();
                
                  $('.total').text(ab);
                  $('.total').val(ab);
                  $('.due_amount').text(ab);
                  $('.due_amount').val(ab);

                  //receive amount-----
                  var receieve_amount=$('#formData_received_amount').val();
                  if(receieve_amount != ''){
                    receive_amount();
                  }           
                }
                else if(value=='fixed'){
                  $('#formData_discount').removeAttr('disabled');

                   var abc=$('#formData_discount').val();
                    var total=$('.sub_total').val() - abc;
                    $('.total').text(total);
                    $('.total').val(total);
                    $('.due_amount').text(total);
                    $('.due_amount').val(total);
                    
                  //receive amount-----
                  var receieve_amount=$('#formData_received_amount').val();
                  if(receieve_amount != ''){
                    receive_amount();
                  }

                  $('#formData_discount').keyup(function(){
                    var abc=parseFloat($(this).val());
                    var sub_total=parseFloat($('.sub_total').val());
                    var return_amount= abc - sub_total;
                    var new_total=sub_total-abc;
                      if(abc > sub_total){

                        $('.due_amount').text('0.00');
                        $('.return_amount').text(return_amount);
                        $('.total').text(new_total);
                      }
                      else{
                      var total=$('.sub_total').val() - abc;
                      $('.return_amount').text('0.00');
                      $('.total').text(total);
                      $('.total').val(total);
                      $('.due_amount').text(total);
                      $('.due_amount').val(total);
                      }
                  });
                  
                }
                else if(value=='percentage'){
                  $('#formData_discount').removeAttr('disabled');

                    var cal=$('#formData_discount').val();
                    var total=$('.sub_total').val();
                    var perchantage=total-((cal/100)*total);
                    $('.total').text(perchantage);
                    $('.total').val(perchantage);
                    $('.due_amount').text(perchantage);
                    $('.due_amount').val(perchantage);

                  //receive amount-----
                  var receieve_amount=$('#formData_received_amount').val();
                  if(receieve_amount != ''){
                    receive_amount();
                  }

                  $('#formData_discount').keyup(function(){
                    var cal=parseFloat($(this).val());
                    
                    var su_total=parseFloat($('.sub_total').val());
                    //console.log('su_total',su_total);
                    var perchantage=parseFloat(su_total-((cal/100)*su_total));
                    //console.log('perchantage',perchantage);
                    if(perchantage > 0){
                      $('.total').text(perchantage);
                      $('.total').val(perchantage);
                      $('.due_amount').text(perchantage);
                      $('.due_amount').val(perchantage);
  
                    }
                    else{
                      $('.total').text(perchantage);  
                      $('.due_amount').text('0.00');
                      $('.return_amount').text(parseFloat(((cal/100)*su_total))-su_total)
                    }
                  });
                }
        })
      
        //due_amount section------
        $('#formData_received_amount').keyup(function(){
            var receieve_amount=$(this).val();
            var total_val=$('.total').val();
            var total_due_amount=parseFloat(total_val) - parseFloat(receieve_amount);
            if(total_due_amount<0){
              $('.due_amount').text('$0.00');
              $('.due_amount').val('0');
              var return_amount=parseFloat(receieve_amount) - parseFloat(total_val);
              $('.return_amount').text(return_amount);
            }
            else{
              $('.due_amount').text(total_due_amount);
              $('.due_amount').val(total_due_amount); 
            }
                   
          });

          //received amount section---------
          function receive_amount(){
                  var receieve_amount=$('#formData_received_amount').val();
                  var total_val=$('.total').val();
                  var total_due_amount=parseFloat(total_val) - parseFloat(receieve_amount);
                  $('.due_amount').text(total_due_amount);
                  $('.due_amount').val(total_due_amount); 
          }

          
   
     //Add More Option added here--------     
      $(document).ready(function() {

        $('.btn_hide').hide();
        var i=0;
        $('#add_more').click(function() {

          $('.btn_hide').show();
          i++;
          
          $('.add_element').append('<div class="row bg-light find_element" id="row'+i+'"><div class="col-md-4 p-1"><select name="Products_id[]"  class="form-control product_id "><option value="choose">Choose Products</option><?php foreach ($Products as $row) : ?><option value="<?php echo $row->id ?>"><?php echo $row->name ?></option><?php endforeach; ?></select><span class="text-danger"></span><input type="hidden" class="delete_id" name="id[]" value="'+i+'"></div><div class="col-md-2 p-1"><input type="number" name="quantity[]" placeholder="Add quantity" class="form-control quantity"></div><div class="col-md-2 p-1"><input type="text" placeholder="Add price" name="price[]"  class="form-control price"></div><div class="col-md-2 p-1"><select name="tax" id="" class="form-control"><option value="">N/A Tax</option></select></div><div class="col-md-2 p-1"><div class="row"><div class="col-md-8"><input type="text" name="amount[]" class="form-control amount"></div><div class="col-md-2"><a type="button" href="#" name="remove" data-id="'+i+'" class="btn btn-danger btn-sm mt-2 btn_remove btn_hide1"><i class="far fa-trash-alt"></i></a></div></div></div></div>');
        });
        //add more option delete here-------btn delete
        $(document).on('click', '.btn_remove', function(){
          var myarray=[];
          $('.delete_id').each(function(){
          let value = $(this).val();
          myarray.push(value);
        });
        let length=myarray.length;
          var abc=length--;
          //alert(abc); 
            var button_id = $(this).attr("data-id");
            if(abc == 1){
              //alert('delete');
              $('.btn_hide').hide();
              $('.btn_hide1').hide();     
            }   
            $('#row'+button_id+'').remove();
              var sum=0;
               $('.amount').each(function(){
                 
                 var total=$(this).val( );
                 sum=sum +parseFloat(total);
                 $('.sub_total').text(sum);
                 $('.total').text(sum);
                 $('.due_amount').text(sum);
                 $('.sub_total').val(sum);
                 $('.total').val(sum);
                 $('.due_amount').val(sum);
               })
          
           
       });  
      });
 
    //edit_invoice---------
    $(document).on('click', '.edit', function(e){ 
      e.preventDefault();
      //alert('hi');
      let invoice_id=$(this).attr('data-id');
      $.get("edit_Invoices/"+invoice_id,function(data){
        
          $('#modal_body').html(data)
          
      });
    });

   //add payment form work here-------
   $(document).on('click', '.add_payment', function(e){ 
    e.preventDefault();
    let incoice_number=$(this).attr('data-id');
    $('#add_payment_modal').modal('show');
    $.get("add_payment/"+incoice_number,function(data){
        
      $('#payment_body').html(data)
        
    });
    
  });


</script>







  