<?php
 $section= explode(',',$edit_roles->all_section);

?>
<form action="<?php echo base_url() ?>roles_update" method="POST" id="roles_update">
<input type="hidden" name="id" value="<?php echo $edit_roles->id;?>">
<div class="modal-body">
  <div class="form-group">
    <label for="category_name"><?php echo lang('roles_name');?> *</label>
    <input type="text" class="form-control" name="roles_name" placeholder="<?php echo lang('Name');?>" value="<?php echo $edit_roles->roles_name;?>">
    <span id="role_name1" class="text-danger"></span>
  </div>
  <div class="form-group">
    <label for="category_name"><?php echo lang('roles_feature');?> *</label>

    <input type="checkbox" class="feature1" name="feature" value="dashboard" <?php foreach($section as $row){
           if($row=='dashboard'){
                     echo 'checked';
           }
 }?>><?php echo lang('dashboard');?>
    <input type="checkbox" class="feature1" name="feature" value="client" <?php  foreach($section as $row){
           if($row=='client'){
                     echo 'checked';
           }
 }?>><?php echo lang('clients');?>
    <input type="checkbox" class="feature1" name="feature" value="product" <?php  foreach($section as $row){
           if($row=='product'){
                     echo 'checked';
           }
 }?>><?php echo lang('products');?>
    <input type="checkbox" class="feature1" name="feature" value="invoice" <?php  foreach($section as $row){
           if($row=='invoice'){
                     echo 'checked';
           }
 }?>><?php echo lang('invoices');?>
    <input type="checkbox" class="feature1" name="feature" value="payment" <?php  foreach($section as $row){
           if($row=='payment'){
                     echo 'checked';
           }
 }?>><?php echo lang('payments');?>
    <input type="checkbox" class="feature1" name="feature" value="report" <?php  foreach($section as $row){
           if($row=='report'){
                     echo 'checked';
           }
 }?>><?php echo lang('reports');?>
    <input type="checkbox" class="feature1" name="feature" value="user_roles" <?php  foreach($section as $row){
           if($row=='user_roles'){
                     echo 'checked';
           }
 }?>><?php echo lang('users_Roles');?>
    <input type="checkbox" class="feature1" name="feature" value="setting" <?php  foreach($section as $row){
           if($row=='setting'){
                     echo 'checked';
           }
 }?>><?php echo lang('settings');?>
   
    <span id="feature1" class="text-danger"></span>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('Cancel') ?></button>
  <button type="submit" class="btn btn-primary"><?php echo lang('save') ?></button>
</div>
</form>

<script>
    $('#roles_update').validate({  
           rules: {
             roles_name: "required",
           },
           messages: {
            roles_name: "<?php echo lang('the_roles_name_field_is_required')?>",
               //note: "The note field is required",
             }    
           
         }); 
    $('#roles_update').submit(function(e){
        //e.preventDefault();     
        var data = [];
             $('.feature1').each(function(){
                if ($(this).is(":checked")) {
                    data.push($(this).val());
                }  
             });
          if(!e.isDefaultPrevented()){   
          var feature = data.toString(); 
          //console.log(feature);
          var url = $(this).attr('action');
          var request = $(this).serialize()+'&feature='+feature;
        $.ajax({
          url: url,
          type: 'post',
          async: false,
          data: request,
          dataType: 'JSON',
        success: function(data) {
          if (data.error) {

          if (data.roles_name != '') {

          $('#role_name1').html(data.roles_name);
          } else {
          $('#role_name1').html('');
          }
          if (data.feature != '') { 
          $('#feature1').html(data.feature);
          } else {
          $('#feature1').html('');
          }

          } else {

          $('#role_name1').html('');
          $('#feature1').html('');

          $('#roles_update')[0].reset();
          $('#editModal').modal('hide');
          window.location.reload();

          }             
        }
     });
     
     return false;
         }
        return false;  

   });
</script>