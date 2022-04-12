
<form action="<?php echo base_url()?>payment_update/<?php echo $result->id?>" method="POST" id="pay_updated">
     
      <div class="modal-body">          
          <div class="form-group">
             <label for="invoice_number"><?php echo lang('invoice');?> *</label>
                    <select name="invoice_number" id="" class="form-control">
                        <option value="">Choose an invoice</option>
                            <?php foreach($all_invoice as $rows): ?>
                              <option value="<?php echo $rows->invoice_number?>" <?php if($rows->invoice_number == $result->invoice_number) echo "selected";?>
                              > <?php echo $rows->invoice_number?></option>
                            <?php endforeach; ?>   
                    </select>     
          </div>
          <br>
          <div class="form-group">
            <label for="category_name"><?php echo lang('receive');?></label>
            <input type="date" class="form-control" name="receive_date" value="<?php echo $result->receive_date?>">
            <span id="receive_date_error1" class="text-danger"></span>          
          </div>
          <br>
          <div class="form-group">
            <label for="category_name"><?php echo lang('payment_method');?> *</label>
            <select name="payment_method" id="" class="form-control">
                      <option value="">Choose a payment method</option>
                      <option value="cash" <?php if($result->payment_method == 'cash')echo "selected";?>>Cash</option>
            </select>
            <span id="payment_method_error1" class="text-danger"></span>          
          </div>
          <br>
          <div class="form-group">
            <label for="category_name"><?php echo lang('amount');?> *</label>
            <input type="text" class="form-control" name="amount" value="<?php echo $result->amount?>">
            <span id="amount_error1" class="text-danger"></span>        
          </div>
          <br>
          <div class="form-group">
            <label for="category_name"><?php echo lang('note');?> *</label>
            <textarea class="form-control textarea" name="note"><?php echo $result->notes?></textarea>        
          </div>           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('Cancel');?></button>
        <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
      </div>
</form>
<script>
 $( document ).ready(function() {
   //plugin------
    $('.textarea').summernote()
             //jquery validation---------------
          $('#pay_updated1').validate({ 
           
           rules: {
             invoice_number: "required",
             receive_date: "required",
             payment_method: "required",
             amount: {
               required: true,
               number: true  
             }
            
           },
           messages: {
               invoice_number: "<?php echo lang('the_invoice_number_is_required')?>",
               receive_date: "<?php echo lang('the_date_field_is_required')?>",
               payment_method: "<?php echo lang('the_payment_method_is_required')?>",
               amount: {
                 required:"<?php echo lang('the_amount_field_is_required')?>",
                 number:"<?php echo lang('please_enter_a_valid_number')?>"
               }
               //note: "The note field is required",
              
             }    
           
         });
     //payment_insert--------
              $('#pay_updated').submit(function(e){
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


                      if (data.amount != '') {
                      $('#amount_error1').html(data.amount);  
                      }else {
                      $('#amount_error1').html('');
                      }

                      }
                      else{


                      $('#amount_error1').html('');

                      $('#pay_updated')[0].reset();
                      $('#payment_editModal').modal('hide');
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