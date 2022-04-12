
<div class="content-body">

          <input type="hidden" class="smtp1" value="<?php echo $email_setup[3]->settings_value?>">
          <input type="hidden" class="smtp2" value="<?php echo $email_setup[4]->settings_value?>">
          <input type="hidden" class="smtp3" value="<?php echo $email_setup[5]->settings_value?>">
          <input type="hidden" class="smtp4" value="<?php echo $email_setup[6]->settings_value?>">
          <input type="hidden" class="mailpath" value="<?php echo $email_setup[7]->settings_value?>">
          <!-- Page Headings Start -->
          <div class="row justify-content-between align-items-center mb-10">

          <!-- Page Heading Start -->
          <div class="col-12 col-lg-auto mb-20">
          <div class="page-heading">
                    <h3><?php echo lang('settings');?></h3>
          </div>
          </div><!-- Page Heading End -->
    </div>
   <div class=""> 
      <ul class="nav nav-tabs text-center">
          <li class="nav-item">
            <a href="<?php echo base_url();?>setting_index" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-settings h2"></i><br>
              <span><?php echo lang('general');?></span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>email_setup" class="text-capitalize nav-link active">
              <i class="zmdi zmdi-email h2"></i><br>
              <span><?php echo lang('email_setup');?></span> 
            </a> 
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>payment_method" class="text-capitalize nav-link">
             <i class="zmdi zmdi-card h2"></i><br>
             <span><?php echo lang('payment_methods');?></span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>notification_index" class="text-capitalize nav-link">
              <i class="zmdi zmdi-notifications-none h2"></i><br>
              <span><?php echo lang('notification');?></span> 
            </a> 
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>invoice_setting" class="text-capitalize nav-link">
              <i class="zmdi zmdi-file-text h2"></i><br>
              <span><?php echo lang('invoice');?></span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>tax_setting" class="text-capitalize nav-link">
              <i class="zmdi zmdi-collection-plus h2"></i><br>
              <span><?php echo lang('tax');?></span> 
          </a>
          </li>
          <li class="nav-item">
            <a href="#General-0" class="text-capitalize nav-link">
              <i class="zmdi zmdi-trending-up h2"></i><br>
              <span><?php echo lang('update');?></span> 
            </a>
          </li>  
      </ul>           
    </div>
          <div class="box">
                    

             <div class="box-body">
                    <h4 class="mt-2"><?php echo lang('email_setup');?></h4>
                    <hr>
                     <form action="<?php echo base_url();?>email_setup_update" method="POST" enctype="multipart/form-data" id="add_email">

                            <div class="row">
                                      
                                      <div class="col-md-3">
                                       <br>         
                                       <label for=""><?php echo lang('email_sent_from_name');?></label>
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
                                       <label for=""><?php echo lang('email_sent_from_email');?></label>
                                      </div>
                                      <div class="col-md-8">
                                                
                                                <input type="text" class="form-control" name="sent_from_email" placeholder="Type email sent from name" value="<?php echo $email_setup[2]->settings_value?>">
                                                <span id="email" class="text-danger"></span>
                                      </div>         
                                                          
                            </div>
                            <br>
                            
                            <div class="row">
                                      
                                      <div class="col-md-3">
                                       <br>         
                                       <label for=""><?php echo lang('supported_mail_services');?></label>
                                      </div>
                                      <div class="col-md-8">                                      
                                            <select name="supported_mail_services" id="" class="form-control suported_mail">
                                                      <option value="">Choose one</option> 
                                                      <option value="smtp">SMTP</option>
                                                      <option value="sendmail">Sendmail</option>
                                                      <option value="mail">Mail</option>
                                            </select> 
                                          <span id="email_option" class="text-danger"></span>
                                      </div>                                                       
                            </div>
                            <br>
                            
                            <div class="amazon_ses">
                        
                            </div>
                             <br>
                           <button  class="btn btn-primary"><?php echo lang('save');?></button>
                     </form> 
                   </div>        

          </div>



<script>
  	$(document).ready(function() {

  //jquery validation-------------  
  $('#add_email1').validate({  
           rules: {
             sent_from_name: "required",
             supported_mail_services: "required",
             sent_from_email:{
                required: true,
                email: true, 
             },
             //smtp option form-----
             smtp_host: "required",
             port: "required",
             password_access: "required",
             encryption_type: "required",
             mailpath:"required",

             //mailpath option form-----
             mailpath:"required",
           },
           messages: {
            sent_from_name: "<?php echo lang('the_sent_from_name_field_is_required')?>",
            supported_mail_services: "<?php echo lang('the_email_option_is_required')?>", 
               sent_from_email: {
                  required:"<?php echo lang('the_sent_from_email_field_is_required')?>",
                  email:"<?php echo lang('please_enter_a_valid_email_address')?>"
               },
 
            //smtp option form-----
            smtp_host: "<?php echo lang('the_smtp_host_field_is_required')?>",
            port: "<?php echo lang('the_port_field_is_required')?>",
            password_access: "<?php echo lang('the_password_access_field_is_required')?>",
            encryption_type: "<?php echo lang('the_encryption_type_field_is_required')?>",
            //mailpath------
            mailpath:"<?php echo lang('the_mailpath_field_is_required')?>",
          }
         });
	


    //email setup update------
    $('#add_email').submit(function(e){
          //e.preventDefault();
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
              //var abc=JSON.parse(data);
              //console.log(data);
              //console.log(data.error);
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

                            if (data.mailpath != '') {
                              $('#mailpath_error').html(data.mailpath);  
                            }else {
                                $('#mailpath_error').html('');
                            }
                            
                            
              }
              else{
                    
                      $('#name').html('');
                      $('#email').html('');
                      $('#host_name').html('');
                      $('#access_key_name').html('');
                      $('#secret_access').html('');
                      $('#region').html('');
                      $('#mailpath_error').html('');
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
           return false;
          }
          return false;
        });

      });       
</script>

<script>
          $(document).on('change', '.suported_mail', function(){
                   var value=$(this).val();
                  //alert(value);
                   if(value=='smtp'){

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
                     $('.amazon_ses').append('<div class="row"><div class="col-md-3"><br><label for=""><?php echo lang('smtp_host');?></label></div><div class="col-md-8"><input type="text" class="form-control sm_tp1" name="smtp_host" placeholder="Type SMTP host" value=""><span id="smtp_host" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for=""><?php echo lang('port');?></label></div><div class="col-md-8"><input type="number" class="form-control sm_tp2" name="port" placeholder="Type port number" value=""><span id="port" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for=""><?php echo lang('password_to_access');?></label></div><div class="col-md-8"><input type="password" class="form-control sm_tp3" name="password_access" placeholder="Type password to access" value=""><span id="password_access" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for=""><?php echo lang('encryption_type');?></label></div><div class="col-md-8"><div class="form-group"><?php if($email_setup[6]->settings_value=='tls'){?><input type="radio" name="encryption_type" value="tsl" checked>TLS <input type="radio" name="encryption_type" value="ssl">SSL<?php }else {?><input type="radio" name="encryption_type" value="tsl" checked>TLS <input type="radio" name="encryption_type" value="ssl" checked>SSL</div><?php } ?><span id="encryption_type" class="text-danger"></span></div></div>');     
                   }
                   else if(value=='sendmail')
                   {
                    var Mailpath_data=$('.mailpath').val();
                    $(document).ready(function() {                 
                    $('#mailpath').val(Mailpath_data);
                    });  
                     $('.amazon_ses').empty();
                     $('.amazon_ses').append('<div class="row"><div class="col-md-3"><labelfor="">Mailpath</label></div><div class="col-md-8"><input type="text" id="mailpath" name="mailpath" class="form-control"><span id="mailpath_error" class="text-danger"></span></div></div>');
                   }
                   else{
                     $('.amazon_ses').empty();       
                   }
          });
</script> 
