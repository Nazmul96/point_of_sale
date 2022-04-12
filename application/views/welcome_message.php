<?php
   
   $this->db->where('group_name','General');
   $back_image=$this->db->get('settings')->result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body style='background-image:url("<?php echo base_url('images/profile/' .$back_image[3]->settings_value) ?>"); background-repeat: no-repeat;  background-size: cover;   background-attachment: fixed;'>
 <div class="container" style="margin-top:10%; width:40%;">
     
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg"><?php echo lang('admin_login_panel');?></p>
          <p>
             <?php
                    $message=$this->session->userdata('message1');
                    if($message){
                          echo "<span class='alert alert-success'>$message</span>";
                          $this->session->unset_userdata('message1');
                    }
             ?>
          </p>
          <form action="<?php base_url()?>admin_logged" method="post">
            
          <label for=""><?php echo lang('email');?></label>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email" value="" required autocomplete="email" autofocus>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>

            <label for=""><?php echo lang('password');?></label>        
            <div class="input-group mb-3">
              <input id="password" type="password" class="form-control" placeholder="Password" name="password" required autocomplete="current-password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>

         
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox"  name="remember" id="remember">
                  <label for="remember">
                  <?php echo lang('remember_me');?>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block"><?php echo lang('sign_in');?></button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
            
          <p class="mb-1">
            <a href="<?php base_url()?>forgot_password"><?php echo lang('i_forgot_my_password');?></a>
            <a  class="ml-5" href="<?php base_url()?>client_registration">Registration?</a>
          </p>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
</div>  
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
 
<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
  
</script>  