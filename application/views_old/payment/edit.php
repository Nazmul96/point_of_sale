<form action="<?php echo base_url()?>payment_update/<?php echo $result->id?>" method="POST" id="pay_updated">
     
      <div class="modal-body">          
          <div class="form-group">
             <label for="invoice_number">Invoice*</label>
                    <select name="invoice_number" id="" class="form-control">
                        <option value="">Choose an invoice</option>
                            <?php foreach($all_invoice as $rows): ?>
                              <option value="<?php echo $rows->invoice_number?>" <?php if($rows->invoice_number == $result->invoice_number)echo "selected";?>><?php echo $rows->invoice_number?></option>
                            <?php endforeach; ?>   
                    </select>     
          </div>
          <br>
          <div class="form-group">
            <label for="category_name">Receive on</label>
            <input type="date" class="form-control" name="receive_date" value="<?php echo $result->receive_date?>">
            <span id="receive_date_error1" class="text-danger"></span>          
          </div>
          <br>
          <div class="form-group">
            <label for="category_name">Payment Method*</label>
            <select name="payment_method" id="" class="form-control">
                      <option value="">Choose a payment method</option>
                      <option value="cash" <?php if($result->payment_method == 'cash')echo "selected";?>>Cash</option>
            </select>
            <span id="payment_method_error1" class="text-danger"></span>          
          </div>
          <br>
          <div class="form-group">
            <label for="category_name">Amount*</label>
            <input type="text" class="form-control" name="amount" value="<?php echo $result->amount?>">
            <span id="amount_error1" class="text-danger"></span>        
          </div>
          <br>
          <div class="form-group">
            <label for="category_name">Notes*</label>
            <textarea class="form-control textarea" name="note"><?php echo $result->notes?></textarea>        
          </div>           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
</form>
<script>
 $( document ).ready(function() {
   //plugin------
    $('.textarea').summernote()

     //payment_insert--------
              $('#pay_updated').submit(function(e){
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


             }); 

     
  });   
 
</script>