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
                       $('.amazon_ses').append('<div class="row"><div class="col-md-3"><br><label for=""><?php echo lang('host_name');?></label></div><div class="col-md-8"><input type="text" class="form-control amazon_ses1" name="host_name" placeholder="Type host name" value=""> <span id="host_name" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for=""><?php echo lang('access_key_id');?></label></div><div class="col-md-8"><input type="text" class="form-control amazon_ses2" name="access_key_id" placeholder="Type access key id" value=""> <span id="access_key" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for=""><?php echo lang('secret_access_key');?></label></div><div class="col-md-8"><input type="text" class="form-control amazon_ses3" name="secret_access_key" placeholder="Type secret access key" value=""> <span id="secret_access" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for=""><?php echo lang('region');?></label></div><div class="col-md-8"><input type="text" class="form-control amazon_ses4" name="region" value=""> <span id="region" class="text-danger"></span><input type="hidden" name="value1" value="1"></div> </div>');      
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
                    $('.amazon_ses').append('<div class="row"><div class="col-md-3"><br><label for=""><?php echo lang('domain_name');?></label></div><div class="col-md-8"><input type="text" class="form-control mail_gun1" name="domain_name" placeholder="Type domain name" value=""><span id="domain_name" class="text-danger"></span></div></div><br><div class="row"><div class="col-md-3"><br><label for=""><?php echo lang('api_key');?></label></div><div class="col-md-8"><input type="text" class="form-control mail_gun2" name="api_key" placeholder="Type api key" value=""><span id="api_key" class="text-danger"></span><input type="hidden" name="value2" value="2"></div></div>');      
                   }