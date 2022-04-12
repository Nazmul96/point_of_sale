     
    <form action="<?php echo base_url()?>user_update" id="user_update" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="hidden" name="user_id" value="<?php echo $user_edit->id ?>">
          <div class="row"> 
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo lang('first_name');?> *</label>
                <input type="text" class="form-control" name="first_name" placeholder="<?php echo lang('first_name');?>" value="<?php echo $user_edit->first_name ?>">
                <p id="first_name1" class="text-danger"></p> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo lang('last_name');?> *</label>
                <input type="text" class="form-control" name="last_name" placeholder="<?php echo lang('last_name');?>"  value="<?php echo $user_edit->last_name;?>">
                <p id="last_name1" class="text-danger"></p> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo lang('email_address');?> *</label>
                <input type="email" class="form-control" name="email_address" placeholder="<?php echo lang('email_address');?>"  value="<?php echo $user_edit->email?>">
                <p id="email_address1" class="text-danger"></p> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo lang('password');?> *</label>
                <input type="password" class="form-control" name="password" placeholder="<?php echo lang('password');?>" value="<?php echo $user_edit->password;?>">
                <p id="password1" class="text-danger"></p> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label><?php echo lang('user_type');?></label>
                  <select  class="form-control" name="user_type">
                    <?php foreach($roles as $row){?>
                    <option value="<?php echo $row->id;?>"<?php if($user_edit->user_type == $row->id)echo "selected";?>><?php echo $row->roles_name?></option>
                    <?php } ?>  
                  </select>
                   
              </div>
            </div>
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Cerca de</label>
                <input type="text" class="form-control" name="">
              </div>
            </div> -->
            <div class="col-md-12">
              <div class="form-group">
                <label><?php echo lang('Status');?> *</label>
                <div class="d-flex">

                      <?php if($user_edit->status == 'active') { ?>
                        <label class="radio-inline mr-2">
                      <input type="radio" name="status" value="active" checked="checked" id="status">Active
                      <input type="radio" name="status" value="inactive" id="status"> Inactive
                      </label> 
                      <?php } else {?> 
                    <label class="radio-inline">
                    <input type="radio" name="status" value="active" id="status">Active
                    <input type="radio" name="status" value="inactive" id="status"  checked="checked">Inactive</label>
                    <?php } ?> 
                </div> 
             
              </div>
            </div>
            <div class="col-md-12">
              <label><?php echo lang('image');?></label>
              <div class="form-group d-flex  align-items-center mb-4 pb-4">
                <div class="card" style="width:100%; max-width: 200px; position: relative;">   
                  <div class="card-body">
                      <input id="new_image" type="file" name="new_image" class="form-control d-none">
                      <label ><img id="user_image1" src="<?php echo base_url('images/user/' . $user_edit->image) ?>"></label>
                    </div>    
                    <label for="new_image" style="position: absolute; width: 100%;   bottom: -19px; left:0   height=auto; bottom:-40px"><?php echo lang('user_image');?><br>
                      <small class="text-muted"><?php echo lang('image_size');?></small>
                  </label>         
                </div> 
                <input type="hidden" value="<?= $user_edit->image;?>" name="old_image"> 
              </div>
            </div>
            
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('Cancel');?></button>
              <button class="btn btn-primary" type="submit"><?php echo lang('add_user');?></button>
            </div>
          </div>
        </div>

</form>

<script>
window.addEventListener('load', function() {
          //for logo -----          
    
          document.querySelector('#new_image').addEventListener('change', function() { 
          if (this.files && this.files[0]) {
                    var img = document.querySelector('#user_image1');        
                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
                 
          }
          });
          
      });

$( document ).ready(function() {

  $('#user_update').validate({  
           rules: {
             first_name: "required",
             last_name: "required",
             password: "required",
             email_address: {
                required: true,
                email: true 
             }
            
           },
           messages: {
               first_name: "<?php echo lang('the_first_name_field_is_required')?>",
               last_name: "<?php echo lang('the_last_name_field_is_required')?>",
               password: "<?php echo lang('the_password_is_required')?>",
               email_address: {
                 required:"T<?php echo lang('the_email_field_is_required')?>",
                 email:"<?php echo lang('please_enter_a_valid_email_address')?>"
               }
               //note: "The note field is required",
              
             }    
           
         });
 //user update------
    $('#user_update').submit(function(e){
     //e.preventDefault();
     if(!e.isDefaultPrevented()){    
     var url = $(this).attr('action');
     var element = new FormData(document.getElementById("user_update"));
     console.log(element);
     $.ajax({
       url:url,
       method:'POST',
       data: element,
       processData: false,  // tell jQuery not to process the data
       contentType: false,   // tell jQuery not to set contentType
       dataType: 'JSON',
       success:function(data){
       console.log(data); 
       if (data.error) {

       if (data.first_name != '') {

       $('#first_name1').html(data.first_name);  
       }else {
       $('#first_name1').html('');
       }
       if (data.last_name != '') {

      $('#last_name1').html(data.last_name);  
      }else {
      $('#last_name1').html('');
      }
       if (data.email_address != '') {
       //console.log('hi');        
       $('#email_address1').html(data.email_address);  
       }else {
       $('#email_address1').html('');
       }
       if (data.password != '') {       
       $('#password1').html(data.password);  
       }else {
       $('#password1').html('');
       }

       }
       else{

       $('#first_name1').html('');
       $('#last_name1').html('');
       $('#email_adreess1').html('');
       $('#password1').html('');


       $('#user_update')[0].reset();
       $('#user_editModal').modal('hide');  
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
<script>
 
</script>
  
