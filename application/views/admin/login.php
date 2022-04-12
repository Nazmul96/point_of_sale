<?php
   
   $this->db->where('group_name','General');
   $back_image=$this->db->get('settings')->result();

  //  echo '<pre>';
  //  print_r($data);

  //  echo $data[3]->settings_value;
  //  die(); 
  //  echo '<pre>';
  //  print_r($data);

  //  $val=$generel[3]->settings_value;
  //  echo $val;
  //  die();
  //  echo $general[3]->settings_value;
  //  $backGround = "images/backgrounds/$generel[3]->settings_value)";
?>
<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
          <p class="login-box-msg">Admin Login Panel</p>
          <p>
             <?php
                    $message=$this->session->userdata('message');
                    if($message){
                          echo "<span class='alert alert-danger'>$message</span>";
                          $this->session->unset_userdata('message');
                    }
             ?>
          </p>
          <form action="<?php base_url()?>admin_logged" method="post">
            
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email" value="" required autocomplete="email" autofocus>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>


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
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
            
          <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
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