<form action="<?php echo base_url()?>client_update" method="POST" id=client_update>
   <input type="hidden" class="update_id" data-id="<?php echo $client_value->id?>">
      <div class="modal-body">
                
           <div class="row">
                     
           <div class="col-md-6">
          <div class="form-group">
            <label for="category_name"><?php echo lang('Client Name')?>*</label>
            <input type="text" class="form-control"  name="client_name" value="<?php echo $client_value->client_name?>">
            <span id="client_name1" class="text-danger"></span>        
          </div>
          <div class="form-group">
            <label for="category_name"><?php echo lang('Client Number')?>*</label>
            <input type="number" class="form-control"  name="client_number" value="<?php echo $client_value->client_number?>">
            <span id="client_number1" class="text-danger"></span>        
          </div>
          </div>
          <div class="col-md-6"> 
          <div class="form-group">
            <label for="category_name"><?php echo lang('Client Email')?>*</label>
            <input type="email" class="form-control" name="client_email" value="<?php echo $client_value->client_email?>">
            <input type="hidden" value="<?php echo $client_value->client_email?>" name="old_client_email">
            <span id="client_email1" class="text-danger"></span>       
          </div> 
          <div class="form-group">
            <label for="category_name"><?php echo lang('Contact Number')?></label>
            <input type="tel" name="phone" id="phone" class="form-control" value="<?php echo $client_value->contact_number?>">
          </div>
          </div>
          </div>
           
          <div class="form-group">
            <label for="category_name"><?php echo lang('Adress')?></label>
            <input type="text" class="form-control" id="address" name="address"  value="<?php echo $client_value->address?>">
          </div>
          <div class="row">                  
          <div class="col-md-6">  
          <div class="form-group">
            <label for="category_name"><?php echo lang('City')?></label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo $client_value->city?>">        
          </div>
           
          <div class="form-group">
            <label for="category_name"><?php echo lang('State')?></label>
            <input type="text" class="form-control" id="state" name="state" value="<?php echo $client_value->state?>">
          </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
            <label for="category_name"><?php echo lang('Postal Code')?></label>
            <input type="number" class="form-control" id="postal_code" name="postal_code" value="<?php echo $client_value->postal_code?>">
          </div>
           
          <div class="form-group">
            <label for="category_name"><?php echo lang('Country')?></label>
            <select class="form-control  countrypicker" data-live-search="true" name="country" data-default="<?php echo $client_value->country?>" data-flag="true">
           </select>          
          </div>
          </div>
          </div>  
          <div class="form-group">
            <label for="category_name"><?php echo lang('Website')?></label>
            <input type="text" class="form-control" id="website" name="website" value="<?php echo $client_value->website?>">
            
          </div>
          <div class="form-group">
            <label for="category_name"><?php echo lang('Notes')?></label>
            <input type="text" class="form-control" id="note" name="note" value="<?php echo $client_value->note?>"> 
            
          </div>  
          
      </div>
      <div class="modal-footer mb-4">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
</form>
<script>
//client update------
$( document ).ready(function() {
        $('#client_update').submit(function(e){
        e.preventDefault();     
        var id=$('.update_id').attr('data-id');
        var url = $(this).attr('action');
        var request =$(this).serialize()+'&id='+id;
        $.ajax({
        url:url,
        method:'POST',
        data: request,
        async:false,
        dataType: 'JSON',
        success: function(data) {
          //console.log(data);        

        if (data.error) {

               if (data.client_name != '') {
                       
                 $('#client_name1').html(data.client_name);  
               }else {
                   $('#client_name1').html('');
               }
               if (data.client_number != '') {
                 //console.log('hi');        
                 $('#client_number1').html(data.client_number);  
               }else {
                   $('#client_number1').html('');
               }
               if (data.client_email != '') {
                 //console.log('hi');        
                 $('#client_email1').html(data.client_email);  
               }else {
                   $('#client_email1').html('');
               }
               
             }
           else{

                 $('#client_name1').html('');
                 $('#client_number1').html('');
                 $('#client_email1').html('');
    

                 $('#client_update')[0].reset();
                 $('#editModal').modal('hide');
                 window.location.reload();      
          //        showAll_payment_setting(); 
              }

        }
        });
    });
    
});
</script>