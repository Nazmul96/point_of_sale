
<div class="content-body">
          <input type="hidden" class="amazon1" value="<?php echo $email_setup[2]->settings_value?>">
          <input type="hidden" class="amazon2" value="<?php echo $email_setup[3]->settings_value?>">
          <input type="hidden" class="amazon3" value="<?php echo $email_setup[4]->settings_value?>">
          <input type="hidden" class="amazon4" value="<?php echo $email_setup[5]->settings_value?>">

          <input type="hidden" class="mailgun1" value="<?php echo $email_setup[6]->settings_value?>">
          <input type="hidden" class="mailgun2" value="<?php echo $email_setup[7]->settings_value?>">

          <input type="hidden" class="smtp1" value="<?php echo $email_setup[8]->settings_value?>">
          <input type="hidden" class="smtp2" value="<?php echo $email_setup[9]->settings_value?>">
          <input type="hidden" class="smtp3" value="<?php echo $email_setup[10]->settings_value?>">
          <input type="hidden" class="smtp4" value="<?php echo $email_setup[11]->settings_value?>">
          <!-- Page Headings Start -->
          <div class="row justify-content-between align-items-center mb-10">

          <!-- Page Heading Start -->
          <div class="col-12 col-lg-auto mb-20">
          <div class="page-heading">
                    <h3>Settings</h3>
          </div>
          </div><!-- Page Heading End -->
    </div>
   <div class=""> 
      <ul class="nav nav-tabs text-center">
          <li class="nav-item">
            <a href="<?php echo base_url();?>setting_index" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-settings h2"></i><br>
              <span>General</span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>email_setup" class="text-capitalize nav-link active">
              <i class="zmdi zmdi-email h2"></i><br>
              <span>Email Setup</span> 
            </a> 
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>payment_method" class="text-capitalize nav-link">
             <i class="zmdi zmdi-card h2"></i><br>
             <span>Payment Methods</span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>notification_index" class="text-capitalize nav-link">
              <i class="zmdi zmdi-notifications-none h2"></i><br>
              <span>Notification</span> 
            </a> 
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>invoice_setting" class="text-capitalize nav-link">
              <i class="zmdi zmdi-file-text h2"></i><br>
              <span>Invoice</span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>tax_setting" class="text-capitalize nav-link">
              <i class="zmdi zmdi-collection-plus h2"></i><br>
              <span>Tax</span> 
          </a>
          </li>
          <li class="nav-item">
            <a href="#General-0" class="text-capitalize nav-link">
              <i class="zmdi zmdi-trending-up h2"></i><br>
              <span>Update</span> 
            </a>
          </li>  
      </ul>           
    </div>
          <div class="box">
                    

             <div class="box-body">
                    <h4 class="mt-2">Email Setup</h4>
                    <hr>
                     <form action="<?php echo base_url();?>email_setup_update" method="POST" enctype="multipart/form-data" id="add_email">

                            <div class="row">
                                      
                                      <div class="col-md-3">
                                       <br>         
                                       <label for=""> Email sent from name</label>
                                      </div>
                                      <div class="col-md-8">
                                                
                                                <input type="text" class="form-control" name="sent_from_name" placeholder="Type email sent from name" value="<?php echo $email_setup[0]->settings_value?>">
                                                <span id="name" class="text-danger"></span>
                                      </div>         
                                                          
                            </div>
                            <br> 
                            
                            <div class="row">
                                      
                                      <div class="col-md-3">
                                       <br>         
                                       <label for="">Email sent from email</label>
                                      </div>
                                      <div class="col-md-8">
                                                
                                                <input type="text" class="form-control" name="sent_from_email" placeholder="Type email sent from name" value="<?php echo $email_setup[1]->settings_value?>">
                                                <span id="email" class="text-danger"></span>
                                      </div>         
                                                          
                            </div>
                            <br>
                            
                            <div class="row">
                                      
                                      <div class="col-md-3">
                                       <br>         
                                       <label for="">Supported mail services</label>
                                      </div>
                                      <div class="col-md-8">                                      
                                            <select name="email_option" id="" class="form-control suported_mail">
                                                      <option value="">Choose one</option>
                                                      <option value="1">Amazon SES</option>
                                                      <option value="2">Mailgun</option>
                                                      <option value="3">SMTP</option>
                                                      <option value="4">Sendmail</option>
                                            </select> 
                                          <span id="email_option" class="text-danger"></span>
                                      </div>                                                       
                            </div>
                            <br>
                            
                            <div class="amazon_ses">
                        
                            </div>
                             <br>
                           <button  class="btn btn-primary">Save</button>
                     </form> 
                   </div>        

          </div>



<script>
  	$(document).ready(function() {
			toastr.options = {
				'closeButton': true,
				'debug': false,
				'newestOnTop': false,
				'progressBar': false,
				'positionClass': 'toast-top-right',
				'preventDuplicates': false,
				'showDuration': '1000',
				'hideDuration': '1000',
				'timeOut': '5000',
				'extendedTimeOut': '1000',
				'showEasing': 'swing',
				'hideEasing': 'linear',
				'showMethod': 'fadeIn',
				'hideMethod': 'fadeOut',
			}
		});

 
 //toaster.success('abc');
    //email setup update------
    $('#add_email').submit(function(e){
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
              //var abc=JSON.parse(data);
              console.log(data);
              console.log(data.error);
              if (data.error) {
                //console.log('hi');
                            if (data.name != '') {
                              $('#name').html(data.name);  
                            }else {
                                $('#name').html('');
                            }
                            if (data.sent_from_email != '') {
                              $('#email').html(data.email);  
                            }else {
                                $('#email').html('');
                            }
                            if (data.host_name != '') {
                              $('#host_name').html(data.host_name);  
                            }else {
                                $('#host_name').html('');
                            }
                            if (data.access_key_id != '') {
                              $('#access_key').html(data.access_key_id);  
                            }else {
                                $('#access_key_name').html('');
                            }
                            if (data.secret_access_key != '') {
                              $('#secret_access').html(data.secret_access_key);  
                            }else {
                                $('#secret_access').html('');
                            }
                            if (data.region != '') {
                              $('#region').html(data.region);  
                            }else {
                                $('#region').html('');
                            }
                            
                          

                            //for Mailgun validation-------
                             
                            if (data.name != '') {
                              $('#name').html(data.name);  
                            }else {
                                $('#name').html('');
                            }
                            if (data.sent_from_email != '') {
                              $('#email').html(data.email);  
                            }else {
                                $('#email').html('');
                            }
                            if (data.domain_name != '') {
                              $('#domain_name').html(data.domain_name);  
                            }else {
                                $('#domain_name').html('');
                            }
                            if (data.api_key != '') {
                              $('#api_key').html(data.api_key);  
                            }else {
                                $('#api_key').html('');
                            }

                            //for Smtp validation-------
                            if (data.name != '') {
                              $('#name').html(data.name);  
                            }else {
                                $('#name').html('');
                            }
                            if (data.sent_from_email != '') {
                              $('#email').html(data.email);  
                            }else {
                                $('#email').html('');
                            } 
                            if (data.smtp_host != '') {
                              $('#smtp_host').html(data.smtp_host);  
                            }else {
                                $('#smtp_host').html('');
                            }
                            if (data.port != '') {
                              $('#port').html(data.port);  
                            }else {
                                $('#port').html('');
                            }

                            if (data.password_access != '') {
                              $('#password_access').html(data.password_access);  
                            }else {
                                $('#password_access').html('');
                            }
                            if (data.encryption_type != '') {
                              $('#encryption_type').html(data.encryption_type);  
                            }else {
                                $('#encryption_type').html('');
                            }
                            
                            
              }
              else{
                    
                      $('#name').html('');
                      $('#email').html('');
                      $('#host_name').html('');
                      $('#access_key_name').html('');
                      $('#secret_access').html('');
                      $('#region').html('');

                      //for Mailgun validation-------
                      $('#domain_name').html('');
                      $('#api_key').html('');

                       //for Smtp validation-------
                       $('#smtp_host').html('');
                      $('#port').html('');
                      $('#password_access').html('');
                      $('#encryption_type').html('');
                      
                } 
             
            }
          });
        });
</script>

<script>
          $(document).on('change', '.suported_mail', function(){
                   var value=$(this).val();
                   if(value==1){
                    var amazon1=$('.amazon1').val();

                    $(document).ready(function() {
                    $('.amazon_ses1').val(amazon1);
                    
                  });
                    var amazon2=$('.amazon2').val();

                    $(document).ready(function() {
                    $('.amazon_ses2').val(amazon2);
                     });

                    var amazon3=$('.amazon3').val();

                    $(document).ready(function() {
                    $('.amazon_ses3').val(amazon3);
                     });
                     var amazon4=$('.amazon4').val();
                     $(document).ready(function() {
                    $('.amazon_ses4').val(amazon4);
                     });
                    
                    $('.amazon_ses').empty();       
                       $('.amazon_ses').append('<div class="row"><div class="col-md-3"><br><label for="">Host name</label></div><div class="col-md-8"><input type="text" class="form-control amazon_ses1" name="host_name" placeholder="Type host name" value=""> <span id="host_name" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for="">Access key id</label></div><div class="col-md-8"><input type="text" class="form-control amazon_ses2" name="access_key_id" placeholder="Type access key id" value=""> <span id="access_key" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for="">Secret access key</label></div><div class="col-md-8"><input type="text" class="form-control amazon_ses3" name="secret_access_key" placeholder="Type secret access key" value=""> <span id="secret_access" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for="">Region</label></div><div class="col-md-8"><input type="text" class="form-control amazon_ses4" name="region" value=""> <span id="region" class="text-danger"></span><input type="hidden" name="value1" value="1"></div> </div>');      
                   }
                   else if(value==2){
                    var mailgun1=$('.mailgun1').val();
                    
                    $(document).ready(function() {
                    $('.mail_gun1').val(mailgun1);
                     });

                     var mailgun2=$('.mailgun2').val();
                    //alert(mailgun2);
                    $(document).ready(function() {
                    $('.mail_gun2').val(mailgun2);
                     });

                    $('.amazon_ses').empty();         
                    $('.amazon_ses').append('<div class="row"><div class="col-md-3"><br><label for="">Domain name</label></div><div class="col-md-8"><input type="text" class="form-control mail_gun1" name="domain_name" placeholder="Type domain name" value=""><span id="domain_name" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for="">Api key</label></div><div class="col-md-8"><input type="text" class="form-control mail_gun2" name="api_key" placeholder="Type api key" value=""><span id="api_key" class="text-danger"></span><input type="hidden" name="value2" value="2"></div></div>');      
                   }
                   else if(value==3){

                    var smtp1=$('.smtp1').val();                 
                    $(document).ready(function() {
                    $('.sm_tp1').val(smtp1);
                     });

                     var smtp2=$('.smtp2').val();                 
                    $(document).ready(function() {
                    $('.sm_tp2').val(smtp2);
                     });

                     var smtp3=$('.smtp3').val();                 
                    $(document).ready(function() {
                    $('.sm_tp3').val(smtp3);
                     });

                     var smtp4=$('.smtp4').val();                 
                    $(document).ready(function() {
                    $('.sm_tp4').val(smtp4);
                     });

                    $('.amazon_ses').empty();         
                     $('.amazon_ses').append('<div class="row"><div class="col-md-3"><br><label for="">SMTP host</label></div><div class="col-md-8"><input type="text" class="form-control sm_tp1" name="smtp_host" placeholder="Type SMTP host" value=""><span id="smtp_host" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for="">Port</label></div><div class="col-md-8"><input type="number" class="form-control sm_tp2" name="port" placeholder="Type port number" value=""><span id="port" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for="">Password to access</label></div><div class="col-md-8"><input type="text" class="form-control sm_tp3" name="password_access" placeholder="Type password to access" value=""><span id="password_access" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for="">Encryption type</label></div><div class="col-md-8"><input type="text" class="form-control sm_tp3" name="encryption_type" placeholder="encryption type" value=""><span id="encryption_type" class="text-danger"></span><input type="hidden" name="value3" value="3"></div></div>');     
                   }
                   else{
                     $('.amazon_ses').empty();       
                   }
          });
</script> 

