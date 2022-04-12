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
                              <h4 class="badge badge-success p-2"><?php echo lang('update');?><?php echo lang('active');?></h4>
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
                        <form action="<?php echo base_url();?>admin_personal_info" id="admin_info" method="POST">
                              <h4 class="mt-2"><?php echo lang('personal_info');?></h3>
                                    <hr>

                                    <div class="row">
                                          <div class="col-md-3">
                                               <?php echo lang('first_name');?>
                                          </div>
                                          <div class="col-md-9">
                                                <input type="text" name="first_name" class="form-control" value="<?php echo $admin_data->first_name?>">
                                                <span id="first_name" class="text-danger">
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                             <?php echo lang('last_name');?>
                                          </div>
                                          <div class="col-md-9">
                                                <input type="text" name="last_name" class="form-control" value="<?php echo $admin_data->last_name?>">
                                                <span id="last_name" class="text-danger">
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                             <?php echo lang('email');?>
                                          </div>
                                          <div class="col-md-9">
                                                <input type="text" name="admin_email" class="form-control" value="<?php echo $admin_data->email?>">
                                                <span id="admin_email" class="text-danger">
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                             <?php echo lang('gender');?>
                                          </div>
                                          <div class="col-md-9">
                                               <?php if($admin_data->gender == 'male'){?>
                                                <div class="form-check form-check-inline">
                                                      <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1" checked>
                                                      <label class="form-check-label" for="inlineRadio1"><?php echo lang('male');?></label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                      <input class="form-check-input" type="radio" name="gender" value="femail" id="flexRadioDefault1">
                                                      <label class="form-check-label" for="inlineRadio1"><?php echo lang('female');?></label>
                                                </div>
                                                <?php } else{?>
                                                      <div class="form-check form-check-inline">
                                                      <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1">
                                                      <label class="form-check-label" for="inlineRadio1"><?php echo lang('male');?></label>
                                                </div>      
                                                <div class="form-check form-check-inline">
                                                      <input class="form-check-input" type="radio" name="gender" value="femail" id="flexRadioDefault1" checked>
                                                      <label class="form-check-label" for="inlineRadio1"><?php echo lang('female');?></label>
                                                </div>
                                                <?php } ?>
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                            <?php echo lang('contact_number');?>
                                          </div>
                                          <div class="col-md-9">
                                                <input type="tel" name="admin_phone" id="phone" class="form-control" value="<?php echo $admin_data->contact_number?>">
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                             <?php echo lang('address');?>
                                          </div>
                                          <div class="col-md-9">
                                          <textarea class="form-control" name="admin_address"><?php echo $admin_data->address?></textarea>
                                          </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                          <div class="col-md-3">
                                            <?php echo lang('date_of_birth');?>
                                          </div>
                                          <div class="col-md-9">
                                                <input type="date" name="birth_date" class="form-control" value="<?php echo $admin_data->date_of_birth?>">
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
      

       //admin_info insert here by ajax-----
        //jquery validation---------------
        $('#admin_info').validate({    
          rules: {
            first_name: "required",
            admin_email: {
                required: true,
                email: true
              },
            last_name: "required",
  
          },
          messages: {
              first_name: "the first name field is required",
              last_name: "the last name field is required",
              admin_email:{
                 required:"The email field is required",
                 email:"Please enter a valid email address",
              }    
            }    
          
        });     

       $('#admin_info').on('submit', function(e) {
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
                        if (data.admin_email != '') {
                        $('#admin_email').html(data.admin_email);  
                        }else {
                              $('#admin_email').html('');
                        }
                     
                        
                        
                        }
                  else{

                        $('#first_name').html('');
                        $('#paylast_namement_types').html('');
                        $('#admin_email').html('');
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