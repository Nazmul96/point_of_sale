<?php

$data=$id;
?>
<form action="<?php echo base_url()?>invoice_payment_insert" method="POST" id="pay_insert">
     
      <div class="modal-body">          
          <div class="form-group">
            <label for="category_name"><?php echo lang('invoice');?> *</label>
            <input type="text" class="form-control" name="invoice_number" value="<?php echo $data;?>">
            <span id="invoice_number_error1" class="text-danger"></span>           
          </div>
          <br>
          <div class="form-group">
            <label for="category_name"><?php echo lang('receive');?></label>
            <input type="date" class="form-control" name="receive_date">
            <span id="receive_date_error" class="text-danger"></span>         
          </div>
          <br>
          <div class="form-group">
            <label for="category_name"><?php echo lang('payment_method');?> *</label>
            <select name="payment_method" id="" class="form-control">
                      <option value="">Choose a payment method</option>
                      <option value="cash">Cash</option>
            </select>
            <span id="payment_method_error" class="text-danger"></span>         
          </div>
          <br>
          <div class="form-group">
            <label for="category_name"><?php echo lang('amount');?> *</label>
            <input type="text" class="form-control" name="amount">
            <span id="amount_error" class="text-danger"></span>         
          </div>
          <br>
          <div class="form-group">
            <label for="category_name"><?php echo lang('notes');?></label>
            <textarea class="form-control textarea" name="note"></textarea>        
          </div>           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('Cancel');?></button>
        <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
      </div>
</form>

<script>
  $( document ).ready(function() {
    $('.textarea').summernote()
    
             //jquery validation---------------
         $('#pay_insert').validate({ 
           
           rules: {
             receive_date: "required",
             payment_method: "required",
             amount: {
               required: true,
               number: true  
             }
             //note: "required",
           },
           messages: {
               receive_date: "<?php echo lang('the_date_field_is_required')?>",
               payment_method: "<?php echo lang('the_payment_method_is_required')?>",
               amount: {
                 required:"<?php echo lang('the_amount_field_is_required')?>",
                 number:"<?php echo lang('please_enter_a_valid_number')?>"
               }
               //note: "The note field is required",
              
             }    
           
         });

            
            $('#pay_insert').submit(function(e){
                    //e.preventDefault();
                  if(!e.isDefaultPrevented()){  
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
                      if (data.invoice_number != '') {
                      $('#invoice_number_error1').html(data.invoice_number);  
                      }else {
                      $('#invoice_number_error1').html('');
                      }
                      }
                      else{

                      $('#receive_date_error').html('');
                      $('#payment_method_error').html('');
                      $('#amount_error').html('');
                      $('#invoice_number_error1').html('');

                      $('#pay_insert')[0].reset();
                      $('#add_payment_modal').modal('hide');
                      window.location.reload();

                      }

                        
                          
                       
                      }
                    });
                    return false;
                  }
                  return false;

             }); 

     
  });   
 
</script>