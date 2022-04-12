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
           <center>     
          <p class="login-box-msg">Forgot password?</p>
          <p class="login-box-msg">Enter your email address to reset your password</p>
          </center>  
          <form action="<?php base_url()?>reset_password" method="post" id="reset_password">
            
          <label for=""><?php echo lang('email');?></label>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email" value=""  autocomplete="email" autofocus>
            </div>
            <span id="email_error" class="text-danger"></span> 
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
            
          <p class="mb-1 ml-2">
            If you remember your password?        
            <a href="<?php echo base_url();?>">Login?</a>        
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

<script>
 $( document ).ready(function() {
            $('#reset_password').submit(function(e){ 
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

                              if (data.email != '') {

                              $('#email_error').html(data.email);  
                              }else {
                              $('#email_error').html('');
                              }

                              }
                              else{

                              $('#email_error').html('');

                              }     
                    }
          });
      });          
}); 
</script>  