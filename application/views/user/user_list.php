<div class="content-body" id="product_list"> 
  <!-- Page Headings Start -->
  <div class="row justify-content-between align-items-center mb-10"> 
    <!-- Page Heading Start -->
    <div class="col-12 col-lg-auto mb-20">
      <div class="page-heading">
          <h3><?php echo lang('user_list');?></h3>
      </div>
    </div><!-- Page Heading End --> 
      <!-- Page Button Group Start -->
     <div class="col-12 col-lg-auto mb-20">
        <div class="page-date-range">
            <a class="btn btn-primary mb-4 mr-3" href="<?php echo base_url()?>roles_index"><i class="fa fa-list"></i> <?php echo lang('back_to_roles');?></a>
        </div>
      </div>
  </div>  
  <a class="fixed_button btn btn-primary mb-4" id="productmodal"><i class="zmdi zmdi-account-add"></i></a>
  <div class="box">
    <div class="box-body"> 
      <div class="  py-primary">       
        <table id="example1" class="table table-bordered  data-table data-table-default  ">
          <thead>
            <tr>
              <th><?php echo lang('sl_no');?></th>
              <th><?php echo lang('image');?></th>
              <th><?php echo lang('user_name');?></th>
              <th><?php echo lang('email_address');?></th>
              <th><?php echo lang('user_type');?></th>
              <th><?php echo lang('last_login');?></th>
              <th><?php echo lang('last_logout');?></th>
              <th><?php echo lang('ip_address');?></th>
              <th><?php echo lang('Status');?></th>
              <th><?php echo lang('Action');?></th>                   
            </tr>
          </thead>
          <tbody>
          <?php foreach($all_user as $key=>$row): ?>
            <?php
            $this->db->where('group_name','General');
            $generel=$this->db->get('settings')->result();

            $datestring = $row->last_login;
            $datestring1=$row->last_logout;         
            $login_date = date('Y-m-d H:i:s',strtotime($datestring .$generel[8]->settings_value));
            $logout_date = date('Y-m-d H:i:s',strtotime($datestring1 .$generel[8]->settings_value));
            
            ?>
              <tr>
                <td><?php echo $key+1; ?></td>
                <td><img src="<?php echo base_url('images/user/'.$row->image)?>" height='50px' width='50px'></td>
                <td><?php echo $row->first_name?> <?php echo $row->last_name?></td>
                <td><?php echo $row->email?></td>
                <td><?php echo $row->user_type?></td>
                <td><?php echo $login_date?></td>
                <td><?php echo $logout_date?></td>
                <td><?php echo $row->ip_address?></td>
                <?php if($row->status == 'active'){?>
                <td><span class="badge badge-pill badge-success"><?php echo lang('active');?></span></td>
                <?php } else{?>
                  <td><span class="badge badge-pill badge-danger"><?php echo lang('inactive');?></span></td>
                <?php } ?>
                <td>  
                  <a href="#" data-id="<?php echo $row->id; ?>" class="btn btn-sm btn-success user_edit" ><?php echo lang('Edit');?> </a>
                  <a href="<?php echo base_url();?>delete_user/<?php echo $row->id?>" class="btn btn-sm btn-danger" id="delete"> <?php echo lang('Delete');?> </a> 
                </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>  
      </div> 
    </div> 
  </div>  
</div>

<!-- user insert modal -->
<div class="content-body" id="product_add"> 
  <!-- Page Headings Start -->
  <div class="row justify-content-between align-items-center mb-10"> 
    <!-- Page Heading Start -->
    <div class="col-12 col-lg-auto mb-20">
      <div class="page-heading">
          <h3><?php echo lang('add_new_user');?></h3>
      </div>
    </div><!-- Page Heading End --> 
  </div> 
  
  <div class="box">
    <div class="box-body"> 
      <div class="add-edit-product-wrap col-12">       
        <form action="<?php echo base_url()?>user_role_insert" id="user_role_insert" method="POST" enctype="multipart/form-data">
          <div class="row"> 
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo lang('first_name');?> *</label>
                <input type="text" class="form-control" name="first_name" placeholder="<?php echo lang('first_name');?>">
                <p id="first_name" class="text-danger"></p> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo lang('last_name');?> *</label>
                <input type="text" class="form-control" name="last_name" placeholder="<?php echo lang('last_name');?>">
                <p id="last_name" class="text-danger"></p> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo lang('email_address');?> *</label>
                <input type="email" class="form-control" name="email_address" placeholder="<?php echo lang('email_address');?>">
                <p id="email_address" class="text-danger"></p> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo lang('password');?> *</label>
                <input type="password" class="form-control" name="password" placeholder="<?php echo lang('password');?>">
                <p id="password" class="text-danger"></p> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label><?php echo lang('user_type');?></label>
                  <select  class="form-control" name="user_type">
                    <?php foreach($all_roles as $row){ ?>
                          <option value="<?php echo $row->id;?>"><?php echo $row->roles_name;?></option>
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
                    <label class="radio-inline mr-2"> 
                      <input type="radio" name="status" value="active" checked="checked" id="status">Active 
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="status" value="inactive" id="status"> Inactive 
                    </label> 
                </div> 
              </div>
            </div>
            <div class="col-md-12">
              <label><?php echo lang('image');?></label>
              <div class="form-group d-flex  align-items-center mb-4 pb-4">
                <div class="card" style="width:100%; max-width: 200px; position: relative;">   
                  <div class="card-body">
                      <input id="image" type="file" name="image" class="form-control d-none">
                      <label ><img id="user_image" src="<?php echo base_url()?>front-end/assets/images/no-img.jpg"></label>
                    </div>    
                    <label for="image" style="position: absolute; width: 100%;   bottom: -19px; left:0   height=auto; bottom:-40px"><?php echo lang('user_image');?><br>
                      <small class="text-muted"><?php echo lang('image_size');?></small>
                  </label>          
                </div> 
              </div>
            </div>
            
            <div class="col-md-12 mt-4">
             <button type="button" class="btn btn-outline-danger product_show mx-2"><?php echo lang('Cancel');?></button>
              <button class="btn btn-primary" type="submit"><?php echo lang('add_user');?></button>
            </div>
          </div>
        </form>
      </div> 
    </div> 
  </div>  
</div> 
<!-- user edit modal -->
<div class="modal fade" id="user_editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="  margin-left:3%;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('edit_user');?></h5>
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
  
window.addEventListener('load', function() {
          //for logo -----          
    
          document.querySelector('#image').addEventListener('change', function() { 
          if (this.files && this.files[0]) {
                    var img = document.querySelector('#user_image');        
                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
                 
          }
          });
          
      });
      
$( document ).ready(function() {
              //jquery validation---------------
        $('#user_role_insert').validate({  
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
 //product_insert------
  $('#user_role_insert').submit(function(e){
    //alert('hi');
     //e.preventDefault();
     if(!e.isDefaultPrevented()){    
     var url = $(this).attr('action');
     var element = new FormData(document.getElementById("user_role_insert"));
     console.log(element);
     $.ajax({
       url:url,
       method:'POST',
       data: element,
       processData: false,  // tell jQuery not to process the data
       contentType: false,   // tell jQuery not to set contentType
       dataType: 'JSON',
     success:function(data){

       if (data.error) {

       if (data.first_name != '') {

       $('#first_name').html(data.first_name);  
       }else {
       $('#first_name').html('');
       }
       if (data.last_name != '') {

      $('#last_name').html(data.last_name);  
      }else {
      $('#last_name').html('');
      }
       if (data.email_address != '') {
       //console.log('hi');        
       $('#email_address').html(data.email_address);  
       }else {
       $('#email_address').html('');
       }
       if (data.password != '') {       
       $('#password').html(data.password);  
       }else {
       $('#password').html('');
       }

       }
       else{

       $('#first_name').html('');
       $('#last_name').html('');
       $('#email_adreess').html('');
       $('#password').html('');


       $('#user_role_insert')[0].reset();
       $('#product_add').hide();
       $('#product_list').show();  
       window.location.reload();

       }   
        
       }
     });
     return false;
    }
    return false;
});

//user edit-------------------
$('.user_edit').click(function(e){ 
  // alert('hi');
  e.preventDefault();
  $('#user_editModal').modal('show');
  var id=$(this).attr('data-id');
  $.get("edit_user/"+id,function(data){
    $('#modal_body').html(data);        
  });
  });

});  

</script>