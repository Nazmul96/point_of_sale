<?php

$data=$id;
?>
<form action="<?php echo base_url()?>invoice_payment_insert" method="POST" id="pay_insert">
     
      <div class="modal-body">          
          <div class="form-group">
            <label for="category_name">Invoice*</label>
            <input type="text" class="form-control" name="invoice_number" value="<?php echo $data;?>">         
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
</form>

<script>
  $( document ).ready(function() {
    $('.textarea').summernote()
    
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
 
</script>