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
                        <h3>My Profile</h3>
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
                              <h4 class="badge badge-success p-2">Active</h4>
                        </div>
                  </div>
                  <div class="col-md-6 bg-light" style="box-shadow: 0 0 3px rgba(0,246,246,246);">
                        <div class="row">
                              <div class="col-md-6 p-3">
                                    <img style="float:left;margin-right:20px;" src="images/svg_file/phone.svg" alt="" height="30px" width="30px">
                                    <p>Contact:</p>
                                    <?php if($admin_data->contact_number == ''){?>
                                       <p>Not available</p>
                                    <?php } else {?>
                                     <?php echo $admin_data->contact_number;?>  
                                    <?php } ?>         
                              </div>
                              <div class="col-md-6 p-3">
                                    <img style="float:left;margin-right:20px;" src="images/svg_file/calendar.svg" alt="" height="30px" width="30px">
                                    <p>Created: </p>     
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-md-6 p-3">
                                    <img style="float:left;margin-right:20px;" src="images/svg_file/location.svg" alt="" height="30px" width="30px">
                                    <p>Address:</p>
                                    <?php if($admin_data->address == ''){?>
                                       <p>Not available</p>
                                    <?php } else {?>
                                     <?php echo $admin_data->address;?>  
                                    <?php } ?> 
                              </div>
                              <div class="col-md-6 p-3">
                                    <img style="float:left;margin-right:20px;" src="images/svg_file/gift.svg" alt="" height="30px" width="30px">
                                    <p>Date of birth:</p>
                                    <?php if($admin_data->date_of_birth == ''){?>
                                       <p>Not available</p>
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
                                    <span>Personal Info</span>
                              </a>
                              <a href="<?php echo base_url()?>admin_password_change" class="text-capitalize tab-item-link d-flex justify-content-between my-2 my-sm-3">
                                    <span>Password Change</span>
                              </a>
                        </div>
                  </div>

                  <div class="col-md-9 ml-4 bg-light" style="box-shadow: 0 0 3px rgba(0, 0, 0, 0.15);">
                        <form action="<?php echo base_url();?>admin_password_update" id="admin_password_update" method="POST">
                              <h4 class="mt-2">Password Change</h3>
                                    <hr>

                                    <div class="row">
                                          <div class="col-md-3">
                                             Old password
                                          </div>
                                          <div class="col-md-9">
                                                <input type="text" name="old_password" class="form-control" placeholder="type your current password">
                                                <span id="old_password" class="text-danger">
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                            New password
                                          </div>
                                          <div class="col-md-9">
                                                <input type="text" name="new_password" class="form-control" placeholder="type your new password">
                                                <span id="new_password" class="text-danger">
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                           
                                          </div>
                                          <div class="col-md-9 p-4" style="background-color:#FAEBD7">
                                                <p>The password should contain one upper case, one lower case, one special character, and numbers. It should be a minimum of 8 characters.</p>
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                           Confirm password
                                          </div>
                                          <div class="col-md-9">
                                                <input type="text" name="retype_new_password" class="form-control" placeholder="re-type your new password">
                                                <span id="retype_new_password" class="text-danger">
                                          </div>
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-primary">Save</button>
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
     $('#admin_password_update').on('submit', function(e) {
                  e.preventDefault();
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
                        window.location.reload();
                  
                  }

                  }
                  });

            });    

});
</script>