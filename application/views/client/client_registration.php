<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RS point of sale</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>front-end/assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/screen.css">
    <!-- intlTelInput CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css"  />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
    <script src="<?php echo base_url();?>front-end/assets/js/validate/jquery.validate.js"></script>

</head>

<body>
 <div class="container">         
<div class="content-body" id="product_add">
  <div class="page-heading mb-5  mt-5">
      <h3>Client Registration</h3>
    </div>

  <div class="add-edit-product-wrap col-12">
    
    <form action="<?php echo base_url()?>client_registration_insert" method="POST" id="client_reg">
                
          <div class="row">
                       
             <div class="col-md-6">
            <div class="form-group">
              <label for="category_name"><?php echo lang('client_name')?> *</label>
              <input type="text" class="form-control" name="client_name">
              <span id="client_name" class="text-danger"></span>
            </div>
            <div class="form-group">
              <label for="category_name"><?php echo lang('client_number')?> *</label>
              <input type="number" class="form-control"  name="client_number">
              <span id="client_number" class="text-danger"></span>
            </div>
            </div>
            <div class="col-md-6"> 
            <div class="form-group">
              <label for="category_name"><?php echo lang('client_email')?> *</label>
              <input type="email" class="form-control"  name="client_email">
              <span id="client_email" class="text-danger"></span>         
            </div> 
            <div class="form-group">
              <label for="category_name"><?php echo lang('contact_number')?></label>
              <input type="tel" name="phone" id="phone" class="form-control">
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="category_name"><?php echo lang('password')?> *</label>
                <input type="password" name="password" id="password" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="category_name"><?php echo lang('re_pass')?> *</label>
                <input type="password" name="retype_password" class="form-control">
              </div>
            </div> 
            <br>
            <div class="form-group">
              <label for="category_name"><?php echo lang('Address')?></label>
              <input type="text" class="form-control"  name="address">
            </div>
            <div class="row">                  
            <div class="col-md-6">  
            <div class="form-group">
              <label for="category_name"><?php echo lang('City')?></label>
              <input type="text" class="form-control"  name="city">    
            </div>
             
            <div class="form-group">
              <label for="category_name"><?php echo lang('State')?></label>
              <input type="text" class="form-control"  name="state">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
              <label for="category_name"><?php echo lang('postal_code')?></label>
              <input type="number" class="form-control"  name="postal_code">
            </div>
             
            <div class="form-group">
              <label for="category_name"><?php echo lang('Country')?></label>
              <select class=" form-control countrypicker" data-live-search="true" name="country" data-default="Bangladesh" data-flag="true">
             </select>       
            </div>
            </div>
            </div>  
            <div class="form-group">
              <label for="category_name"><?php echo lang('Website')?></label>
              <input type="text" class="form-control" name="website">
            </div>
            <div class="form-group">
              <label for="category_name"><?php echo lang('Notes')?></label>
              <input type="text" class="form-control" name="note">       
            </div>  
            
        <div class="d-flex flex-wrap justify-content-center col mbn-10">
          <button type="submit" class="btn btn-primary">Submit</button>
          <big><a href="<?php echo base_url();?>" class="ml-5">Login?</a> </big>
        </div>
        
         
      </form>
   
  </div>
 </div>
 </div> 


   

 <!-- JS
============================================ -->

    <!-- Global Vendor, plugins & Activation JS -->
  
    <script src="<?php echo base_url();?>front-end/assets/js/vendor/bootstrap.min.js"></script>
    <!--Main JS-->
    <script src="<?php echo base_url();?>front-end/assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"  ></script>
    <script src="<?php echo base_url();?>front-end/assets/js/countrypicker.js"></script>
   <script>
     generate_country_list(); 
  //jquery validation---------------
  $('#client_reg').validate({    
          rules: {
            client_name: "required",
            client_email: {
                required: true,
                email: true
              },
            phone:{
              number:true,
            }, 
            client_number: {
              required: true,
            },
            password: {
                  required: true,
		              minlength: 8,
              },
            retype_password: 
            {
                  required: true,
		              minlength: 8,
			            equalTo: "#password",    
            }
  
          },
          messages: {
              client_name: "Please enter your client_name",
              client_email: "Please enter a valid email address",
              client_number: {
                required:"Please enter your client_nubmer",
              },
              phone:{
                number:"Please enter a number",
              },
              password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
              },
              retype_password: {
              minlength: "Your password must be at least 8 characters long",
              equalTo: "Please enter the same password as above"
            },
            }    
          
        });
      $('#client_reg').submit(function(e){
         
                   if(!e.isDefaultPrevented()){                        
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

                        if (data.client_name != '') {

                        $('#client_name').html(data.client_name);  
                        }else {
                        $('#client_name').html('');
                        }
                        if (data.client_number != '') {
                        //console.log('hi');        
                        $('#client_number').html(data.client_number);  
                        }else {
                        $('#client_number').html('');
                        }
                        if (data.client_email != '') {
                        //console.log('hi');        
                        $('#client_email').html(data.client_email);  
                        }else {
                        $('#client_email').html('');
                        }

                        }
                        else{

                        $('#client_name').html('');
                        $('#client_number').html('');
                        $('#client_email').html('');
                
                        window.location.href="<?php echo base_url();?>";  
                        // $('#client_insert')[0].reset();
                        // $('#product_add').hide();
                        // $('#product_list').show();  
                        // window.location.reload();

                        }
                    }
                
                  })
                  return false;
                }
                  return false;
      })

        //country flag------
  if($('#phone').length){
  var input = document.querySelector("#phone");
     
    window.intlTelInput(input,({
    // options here
    }));
      }


   </script>

</body>

</html>