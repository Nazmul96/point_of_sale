<?php
//   echo '<pre>';
//   echo ($admin_data[0]->image);
//   die();
?>

<div class="content-body">

      <!-- Page Headings Start -->
      <div class="row justify-content-between align-items-center mb-10">

            <!-- Page Heading Start -->
            <div class="col-12 col-lg-auto mb-20">
                  <div class="page-heading">
                        <h3><?php echo lang('my_profile');?></h3>
                  </div>
            </div><!-- Page Heading End -->

      </div>
      <div class="container">
            <div class="row" style="margin-bottom:3%;">
                  <div class="col-md-5 p-3 bg-light" style="box-shadow: 0 0 3px rgba(0,246,246,246);">
                        <form enctype="multipart/form-data" action="<?php echo base_url();?>profile_image_update" id="image_update" method="POST">
                              <img class="rounded-circle" id="picture" alt="Cinque Terre" src="<?php echo base_url('images/user/' . $admin_data->image) ?>" alt="" height="150px" width="150px" style="float:left;margin-right:50px;">   
                              <input id="fileinput" type="file" name="profile_image" style="display:none" />

                              <input type="submit" name="button" value="Submit" style="display:none;"/>
                        </form>
                        <div style="margin-top:7%;">
                              <b><?php echo $admin_data->first_name;?> <?php echo $admin_data->last_name;?></b> <br>
                              <p><?php echo $admin_data->email;?></p> 
                              <h4 class="badge badge-success p-2"><?php echo lang('active');?></h4>
                        </div>
                  </div>
                  <div class="col-md-6 bg-light" style="box-shadow: 0 0 3px rgba(0,246,246,246);">
                        <div class="row">
                              <div class="col-md-6 p-3">
                                    <img style="float:left;margin-right:20px;" src="images/svg_file/phone.svg" alt="" height="30px" width="30px">
                                    <p><?php echo lang('contact');?>:</p>
                                    <?php if($admin_data->contact_number == ''){?>
                                       <p><?php echo lang('not_available');?></p>
                                    <?php } else {?>
                                     <?php echo $admin_data->contact_number;?>  
                                    <?php } ?>         
                              </div>
                              <div class="col-md-6 p-3">
                                    <img style="float:left;margin-right:20px;" src="images/svg_file/calendar.svg" alt="" height="30px" width="30px">
                                    <p><?php echo lang('created');?>: </p>     
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-6 p-3">
                                    <img style="float:left;margin-right:20px;" src="images/svg_file/location.svg" alt="" height="30px" width="30px">
                                    <p><?php echo lang('address');?>:</p>
                                    <?php if($admin_data->address == ''){?>
                                       <p><?php echo lang('not_available');?></p>
                                    <?php } else {?>
                                     <?php echo $admin_data->address;?>  
                                    <?php } ?> 
                              </div>
                              <div class="col-md-6 p-3">
                                    <img style="float:left;margin-right:20px;" src="images/svg_file/gift.svg" alt="" height="30px" width="30px">
                                    <p><?php echo lang('date_of_birth');?>:</p>
                                    <?php if($admin_data->date_of_birth == ''){?>
                                       <p><?php echo lang('not_available');?></p>
                                    <?php } else {?>
                                     <?php echo $admin_data->date_of_birth;?>  
                                    <?php } ?> 
                              </div>
                        </div>


                  </div>
            </div>
      </div>
      <div class="container">
            <div class="row mt-5">
                  <div class="col-md-2 bg-light" style="box-shadow: 0 0 3px rgba(0, 0, 0, 0.15);">
                        <img style="margin-top:5%; margin-left:30%;" src="images/svg_file/user.svg" alt="" height="50px" width="50px">
                        <hr>
                        <div class="div tab-menu">
                              <a href="<?php echo base_url();?>admin_profile" class="text-capitalize tab-item-link d-flex justify-content-between my-2 my-sm-3 active">
                                    <span><?php echo lang('personal_info');?></span>
                              </a>
                              <a href="<?php echo base_url()?>admin_password_change" class="text-capitalize tab-item-link d-flex justify-content-between my-2 my-sm-3">
                                    <span><?php echo lang('password_change');?></span>
                              </a>
                        </div>
                  </div>

                  <div class="col-md-9 ml-4 bg-light" style="box-shadow: 0 0 3px rgba(0, 0, 0, 0.15);">
                        <form action="<?php echo base_url();?>admin_password_update" id="admin_password_update" method="POST">
                              <h4 class="mt-2"><?php echo lang('password_change');?></h3>
                                    <hr>

                                    <div class="row">
                                          <div class="col-md-3">
                                            <?php echo lang('old_password');?>
                                          </div>
                                          <div class="col-md-9">
                                                <input type="password" name="old_password" class="form-control" placeholder="<?php echo lang('current_password');?>">
                                                <span id="old_password" class="text-danger">
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                           <?php echo lang('new_password');?>
                                          </div>
                                          <div class="col-md-9">
                                                <input type="password" name="new_password" class="form-control" placeholder="<?php echo lang('new_password1');?>">
                                                <span id="new_password" class="text-danger">
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                           
                                          </div>
                                          <div class="col-md-9 p-4" style="background-color:#FAEBD7">
                                                <p><?php echo lang('text');?></p>
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                           <?php echo lang('confirm_password');?>
                                          </div>
                                          <div class="col-md-9">
                                                <input type="password" name="retype_new_password" class="form-control" placeholder="<?php echo lang('re_type');?>">
                                                <span id="retype_new_password" class="text-danger">
                                          </div>
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
                        </form><br>
                  </div>

            </div>
      </div>
</div>

<script>

$(document).ready(function() {
      $(function() {
            $('#picture').on('click', function() {
                  $('#fileinput').trigger('click');
                 // $('#image_update').trigger('submit');
            });
            $('#fileinput').change(function() {
                 $('#image_update').trigger('submit');
            });
      });

      //for image show-----
      window.addEventListener('load', function() {
          document.querySelector('#fileinput').addEventListener('change', function() { 
          if (this.files && this.files[0]) {
                    var img = document.querySelector('#picture');       
                    img.src = URL.createObjectURL(this.files[0]);

                 
          }
          });
          
      });

      //image_update ajax call-----
            $('#image_update').on('submit', function(e) {
                  e.preventDefault();
                  var url = $(this).attr('action');
                  var element = new FormData(document.getElementById("image_update"));
                  $.ajax({
                        url: url,
                        method: 'POST',
                        data: element,
                        processData: false, // tell jQuery not to process the data
                        contentType: false, // tell jQuery not to set contentType
                        dataType: 'JSON',
                        success: function(data) {
                         

                        }

                  });

            });

     //admin password update------
        //jquery validation---------------
        $('#admin_password_update').validate({    
          rules: {
            old_password: "required",
            new_password: {
                  required: true,
		      minlength: 8,
              },
            retype_new_password: 
            {
                  required: true,
		      minlength: 8,
			equalTo: "#new_password",    
            }
  
          },
          messages: {
            old_password: "<?php echo lang('the_old_password_field_is_required');?>",
            new_password: {
                  required: "<?php echo lang('please_provide_a_new_password');?>",
                  minlength: "<?php echo lang('your_password_must_be_at_least_8_characters_long');?>"
            },
		retype_new_password: {
                  required: "<?php echo lang('please_provide_a_confirm_password');?>",
                  minlength: "<?php echo lang('your_password_must_be_at_least_8_characters_long');?>",
                  equalTo: "<?php echo lang('please_enter_the_same_password_as_above');?>"
            },   
            }    
          
        });
     $('#admin_password_update').on('submit', function(e) {
                  //e.preventDefault();
                  if(!e.isDefaultPrevented()){ 
                  var url = $(this).attr('action');
                  var request = $(this).serialize();
                  $.ajax({
                  url: url,
                  method: 'POST',
                  data: request,
                  async: false,
                  dataType: 'JSON',
                  success: function(data) {
                        console.log(data);
                        if (data.error) {
               
                        if (data.old_password != '') {
                        $('#old_password').html(data.old_password);  
                        }else {
                              $('#old_password').html('');
                        }
                        if (data.new_password != '') {
                        $('#new_password').html(data.new_password);  
                        }else {
                              $('#new_password').html('');
                        }
                        if (data.retype_new_password != '') {
                        $('#retype_new_password').html(data.retype_new_password);  
                        }else {
                              $('#retype_new_password').html('');
                        }
                     
                        
                        
                        }
                  else{

                        $('#old_password').html('');
                        $('#new_pasword').html('');
                        $('#retype_new_password').html('');
                        window.location.href="<?php echo base_url();?>";  
                  
                  }

                  }
                  });
                  return false;
               }
               return false;
            });    

});
</script>