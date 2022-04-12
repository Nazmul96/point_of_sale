<input type="hidden" id="types" value="<?php echo $payment_stting_edit->type?>">
<input type="hidden" class="update" data-id="<?php echo $payment_stting_edit->id?>">

<form action="<?php echo base_url()?>payment_setting_update" method="POST" id="payment_update">
<div class="mine mine1">

</div>
<div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button><button type="submit" id="ami" class="btn btn-primary">Save</button></div>
</form>

<script>
          var vaule=$('#types').val();
          if(vaule=='cash'){
                  $('.mine').empty();  
                  $('.mine').append('<div class="modal-body"><div class="form-group"><label for="category_name">Name</label><input type="text" class="form-control" name="payment_name" value="<?php echo $payment_stting_edit->name?>" placeholder="Name" id=""><span id="pay_ment" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Type</label><select name="payment_types" id="" class="form-control type_payment"><option value="">choose one</option><option value="cash" <?php if($payment_stting_edit->type == 'cash')echo "selected";?>>Cash</option><option value="stripe" <?php if($payment_stting_edit->type == 'stripe')echo "selected";?>>Stripe</option><option value="paypal" <?php if($payment_stting_edit->type == 'paypal')echo "selected";?>>paypal</option></select><span id="payment_types" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Payment Status</label><?php if($payment_stting_edit->status == '1'){?><input type="radio" name="status" value="1" checked>Active <input type="radio" name="status" value="2">Inactive<?php } else {?><input type="radio" name="status" value="1">Active <input type="radio" name="status" value="2" checked> Inactive<?php } ?></div>'); 
                
          }
          else if(vaule=='stripe'){
                    $('.mine').empty();  
                  $('.mine').append('<div class="modal-body"><div class="form-group"><label for="category_name">Name</label><input type="text" class="form-control" name="payment_name" value="<?php echo $payment_stting_edit->name?>" placeholder="Name"><span id="pay_ment" class="text-danger payment_name1"></span></div><br><div class="form-group"><label for="category_name">Type</label><select name="payment_types" id="" class="form-control type_payment"><option value="">choose one</option><option value="cash" <?php if($payment_stting_edit->type == 'cash')echo "selected";?>>Cash</option><option value="stripe" <?php if($payment_stting_edit->type == 'stripe')echo "selected";?>>Stripe</option><option value="paypal" <?php if($payment_stting_edit->type == 'paypal')echo "selected";?>>paypal</option></select><span id="payment_types" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Payment Status</label><?php if($payment_stting_edit->status == '1'){?><input type="radio" name="status" value="1" checked>Active <input type="radio" name="status" value="2">Inactive<?php } else {?><input type="radio" name="status" value="1">Active <input type="radio" name="status" value="2" checked> Inactive<?php } ?></div><br><div class="form-group"><label for="category_name">Public key</label><input type="text" class="form-control" name="public_key" value="<?php echo $payment_stting_edit->public_key?>" placeholder="Public key"><span id="public_key1" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Secret key</label><input type="password" class="form-control" value="<?php echo $payment_stting_edit->secret_key?>"name="secret_key" placeholder="Secret key"><span id="secret_key1" class="text-danger"></span></div><br><div class="form-group"><div class="customized-checkbox checkbox-default"><?php if($payment_stting_edit->default_field ==2){?><input type="checkbox" name="mark_default" value="2" checked> Mark as default<?php } else {?><input type="checkbox" name="mark_default" value="2"> Mark as default<?php } ?></div></div> </div>'); 
          }
          else{
                  $('.mine').empty();  
                  $('.mine').append('<div class="modal-body"><div class="form-group"><label for="category_name">Name</label><input type="text" class="form-control" name="payment_name" value="<?php echo $payment_stting_edit->name?>" placeholder="Name"><span id="pay_ment" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Type</label><select name="payment_types" id="" class="form-control type_payment"><option value="">choose one</option><option value="cash" <?php if($payment_stting_edit->type == 'cash')echo "selected";?>>Cash</option><option value="stripe" <?php if($payment_stting_edit->type == 'stripe')echo "selected";?>>Stripe</option><option value="paypal" <?php if($payment_stting_edit->type == 'paypal')echo "selected";?>>paypal</option></select><span id="payment_types" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Payment Status</label><?php if($payment_stting_edit->status == '1'){?><input type="radio" name="status" value="1" checked>Active <input type="radio" name="status" value="2">Inactive<?php } else {?><input type="radio" name="status" value="1">Active <input type="radio" name="status" value="2" checked> Inactive<?php } ?></div><br><div class="form-group"><label for="category_name">Client id</label><input type="text" class="form-control" name="client_id" value="<?php echo $payment_stting_edit->client_id?>" placeholder="Client id"><span id="client_id1" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Secret key</label><input type="password" class="form-control" value="<?php echo $payment_stting_edit->secret_key?>"name="secret_key" placeholder="Secret key"><span id="secret_key1" class="text-danger"></span></div><br><br><div class="form-group"><label for="category_name">Mode</label><?php if($payment_stting_edit->mode=='live'){?><input type="radio" name="mode" value="live" checked>Live <input type="radio" name="mode" value="sandbox">Sandbox<?php } else {?><input type="radio" name="mode" value="live">Live <input type="radio" name="mode" value="sandbox" checked>Sandbox<?php }?></div><span id="mode" class="text-danger"></span><br><div class="form-group"><div class="customized-checkbox checkbox-default"><?php if($payment_stting_edit->default_field ==2){?><input type="checkbox" name="mark_default" value="2" checked> Mark as default<?php } else {?><input type="checkbox" name="mark_default" value="2">Mark as default<?php } ?></div></div> </div>'); 
          }
            
            
</script>
<script>
       $(document).on('change', '.type_payment', function(){
           var values1=$(this).val();
           if(values1=='cash'){
              $('.mine1').empty();
              $('.mine1').append('<div class="modal-body"><div class="form-group"><label for="category_name">Name</label><input type="text" class="form-control" name="payment_name" placeholder="Name"><span id="pay_ment1" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Type</label><select name="payment_types" id="" class="form-control type_payment"><option value="">choose one</option><option value="cash" selected>Cash</option><option value="stripe">Stripe</option><option value="paypal">paypal</option></select><span id="payment_types" class="text-danger"></span></div>');           
           }
           else if(values1=='stripe'){
                    $('.mine1').empty();
                    $('.mine1').append('<div class="modal-body"><div class="form-group"><label for="category_name">Name</label><input type="text" class="form-control" name="payment_name" value="" placeholder="Name"><span id="pay_ment1" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Type</label><select name="payment_types" id="" class="form-control type_payment"><option value="">choose one</option><option value="cash">Cash</option><option value="stripe" selected>Stripe</option><option value="paypal">paypal</option></select><span id="payment_types" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Public key</label><input type="text" class="form-control" name="public_key" value="" placeholder="Public key"><span id="public_key2" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Secret key</label><input type="password" class="form-control" value="" name="secret_key" placeholder="Secret key"><span id="secret_key2" class="text-danger"></span></div><br><div class="form-group"><div class="customized-checkbox checkbox-default"><input type="checkbox" name="mark_default" value="2"> Mark as default</div></div> </div>');      
           }
           else{
                  $('.mine1').empty();  
                  $('.mine1').append('<div class="modal-body"><div class="form-group"><label for="category_name">Name</label><input type="text" class="form-control" name="payment_name" value="" placeholder="Name"><span id="pay_ment1" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Type</label><select name="payment_types" id="" class="form-control type_payment"><option value="">choose one</option><option value="cash">Cash</option><option value="stripe">Stripe</option><option value="paypal" selected>paypal</option></select><span id="payment_types" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Client id</label><input type="text" class="form-control" name="client_id" value="" placeholder="Client id"><span id="client_id2" class="text-danger"></span></div><br><div class="form-group"><label for="category_name">Secret key</label><input type="password" class="form-control" value=""name="secret_key" placeholder="Secret key"><span id="secret_key2" class="text-danger"></span></div><br><br><div class="form-group"><label for="category_name">Mode</label><input type="radio" name="mode" value="live">Live <input type="radio" name="mode" value="sandbox">Sandbox</div><span id="mode" class="text-danger"></span><br><div class="form-check"><input class="form-check-input" type="checkbox" name="mark_default" value="2"> Mark as default</div>');      
           }
       });    
</script>

<script>
//payment edit------payment_update
$( document ).ready(function() {
        $('#payment_update').submit(function(e){
        e.preventDefault();     
        let id=$('.update').attr('data-id');
        var url = $(this).attr('action');
        var request =$(this).serialize()+'&id='+id;
        $.ajax({
        url:url,
        method:'POST',
        data: request,
        async:false,
        dataType: 'JSON',
        success: function(data) {
        //showAll_payment_setting();
        // $('#modal_body').html(data);
        if (data.error) {
               if (data.name != '') {
                 //console.log('hi');        
                 $('#pay_ment').html(data.name);  
               }else {
                   $('#pay_ment').html('');
               }
               if (data.name != '') {
                 //console.log('hi');        
                 $('#pay_ment1').html(data.name);  
               }else {
                   $('#pay_ment1').html('');
               }

               //for stripe ------
               if (data.public_key != '') {
                 $('#public_key1').html(data.public_key);  
               }else {
                   $('#public_key1').html('');
               }
               if (data.public_key != '') {
                 $('#public_key2').html(data.public_key);  
               }else {
                   $('#public_key2').html('');
               }
               if (data.secret_key != '') {
                 $('#secret_key1').html(data.secret_key);  
               }else {
                   $('#secret_key1').html('');
               }
               if (data.secret_key != '') {
                 $('#secret_key2').html(data.secret_key);  
               }else {
                   $('#secret_key2').html('');
               }
        //        //for paypal------
               if (data.client_id != '') {
                 $('#client_id1').html(data.client_id);  
               }else {
                   $('#client_id1').html('');
               }
               if (data.client_id != '') {
                 $('#client_id2').html(data.client_id);  
               }else {
                   $('#client_id2').html('');
               }
        //        if (data.mode != '') {
        //          $('#mode').html(data.mode);  
        //        }else {
        //            $('#mode').html('');
        //        }
               
               
             }
           else{

                 $('#pay_ment').html('');
                 $('#pay_ment1').html('');
                //  $('#payment_types').html('');
                //  //for stripe--------
                 $('#public_key1').html('');
                 $('#secret_key1').html('');
                 $('#public_key2').html('');
                 $('#secret_key2').html('');
                //  //paypal------
                //  $('#mode').html('');
                 $('#client_id1').html('');
                 $('#client_id2').html('');

                 $('#payment_update')[0].reset();
                 $('#editModal').modal('hide');       
                 showAll_payment_setting(); 
           }

        }
        });
    });
    
});

</script>