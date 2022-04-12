<?php

//  echo '<pre>';
//  print_r($data['generel']);
//  die();
?>
<div class="content-body">

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
            <a href="<?php echo base_url();?>setting_index" class="text-capitalize nav-link active">
              <i class="zmdi zmdi-settings h2"></i><br>
              <span><?php echo lang('general');?></span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>email_setup" class="text-capitalize nav-link">
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
    <div class="box ">
      <div class="box-body">
         <h4 class="mt-2"><?php echo lang('general');?></h4>
             <hr>
         <form action="<?php echo base_url();?>general_update" method="POST" enctype="multipart/form-data">

                  
                  
                  <p class="text-primary"><?php echo lang('company_info');?></p>
                  <div class="row">
                          
                            <div class="col-md-3">
                            <b> <?php echo lang('company_name');?></b>
                            </div>
                            <div class="col-md-8">
                                      
                                      <input type="text" class="form-control" name="company_name" value="<?php echo $generel[0]->settings_value?>">
                            </div>         
                                                
                  </div>
                  <br>  
                  <div class="row position-relative">
                            <div class="col-md-3">
                            <b> <?php echo lang('company_logo');?></b>
                            
                            <small><?php echo lang('logo_size');?></small>
                            </div>
                            <div class="col-md-8" >
                                     <img src="<?php echo base_url('images/profile/' .$generel[1]->settings_value) ?>" alt="" id="company_logo" height="200px" width="200px">
                                     
                            </div>
                            <input type="file" class="logo1" name="company_logo">
                            <input type="hidden" name="old_company_logo" value="<?php echo $generel[1]->settings_value?>">
                            
                  </div>
                  <br>
                  <div class="row position-relative">
                            <div class="col-md-3">
                            <b> <?php echo lang('company_icon');?></b>
                            
                            <small><?php echo lang('icon_size');?></small>
                            </div>
                            <div class="col-md-8">
                              <img src="<?php echo base_url('images/profile/' .$generel[2]->settings_value) ?>" alt="" id="company_icon" height="200px" width="200px">
                             
                            </div>
                            <input type="file" class="icon" name="company_icon">
                            <input type="hidden" name="old_company_icon" value="<?php echo $generel[2]->settings_value?>">
                           
                  </div>
                  <br>  
                  <div class="row position-relative">
                            <div class="col-md-3">
                            <b> <?php echo lang('company_banner');?></b>
                            
                            <small><?php echo lang('banner_size');?></small>
                            </div>
                            <div class="col-md-8">
                               <img src="<?php echo base_url('images/profile/' .$generel[3]->settings_value) ?>" alt="" id="company_banner" height="200px" width="200px">
                            </div>
                            <input type="file" class="banner" name="company_banner">
                            <input type="hidden" name="old_company_banner" value="<?php echo $generel[3]->settings_value?>">
                  </div>
                  <br>
                  <div class="row">
                            <div class="col-md-3">
                            <b><?php echo lang('language');?></b>
                            </div>
                            <div class="col-md-8">
                                  <select name="company_language" id="" class="form-control">
                                      <option value="bangla" <?php if($generel[4]->settings_value=='bangla')echo "selected";?>>Bangla</option>
                                      <option value="english" <?php if($generel[4]->settings_value=='english')echo "selected";?>>English</option>
                                      <option value="french" <?php if($generel[4]->settings_value=='french')echo "selected";?>>French</option>
        
                                  </select>
                            </div>
                  </div>
                  <br>
                  <div class="row">
                            <div class="col-md-3">
                            <b><?php echo lang('layout');?></b>
                           
                            </div>
                            <div class="col-md-8">
                            <div class="radio-button-group">
                              <div data-toggle="buttons" class="btn-group btn-group-toggle">
                                    <input type="hidden" class="company_layout" value="<?php echo $generel[5]->settings_value;?>">
                                    <label class="btn layout layout3">
                                    <input type="radio" name="company_layout" id="company_layout" value="LTR"> 
                                    <span><?php echo lang('ltr');?></span>
                                   </label>
                             
                              <label class="btn layout1 layout3">
                              <input type="radio" name="company_layout" id="company_layout1" value="RTL">
                               <span><?php echo lang('rtl');?></span>
                              </label>
                              
                              </div>
                           </div> 
                            </div>
                  </div>
                  <br>
                  <p class="text-primary"><?php echo lang('date_and_time_setting');?></p>
                  <div class="row">
                            <div class="col-md-3">
                            <b><?php echo lang('date_format');?></b>
                           
                            </div>
                            <div class="col-md-8">
                            <div class="col-md-8">
                                  <select name="company_date" id="" class="form-control">
                                            <option value="DD-MM-YYYY" <?php if($generel[6]->settings_value=='DD-MM-YYYY')echo "selected";?>>DD-MM-YYYY</option>
                                            <option value="MM-DD-YYYY" <?php if($generel[6]->settings_value=='MM-DD-YYYY')echo "selected";?>>MM-DD-YYYY</option>
                                            <option value="YYYY-MM-DD" <?php if($generel[6]->settings_value=='YYYY-MM-DD')echo "selected";?>>YYYY-MM-DD</option>
                                            <option value="DD/MM/YYYY" <?php if($generel[6]->settings_value=='DD/MM/YYYY')echo "selected";?>>DD/MM/YYYY</option>
                                            <option value="MM/DD/YYYY" <?php if($generel[6]->settings_value=='MM/DD/YYYY')echo "selected";?>>MM/DD/YYYY</option>
                                            <option value="YYYY/MM/DD" <?php if($generel[6]->settings_value=='YYYY/MM/DD')echo "selected";?>>YYYY/MM/DD</option>
                                            <option value="DD.MM.YYYY" <?php if($generel[6]->settings_value=='DD.MM.YYYY')echo "selected";?>>DD.MM.YYYY</option>
                                            <option value="MM.DD.YYYY" <?php if($generel[6]->settings_value=='MM.DD.YYYY')echo "selected";?>>MM.DD.YYYY</option>
                                            <option value="YYYY.MM.DD" <?php if($generel[6]->settings_value=='YYYY.MM.DD')echo "selected";?>>YYYY.MM.DD</option>
                                  </select>
                            </div>   
                            </div>
                  </div>
                  <br>
                  <div class="row">
                            <div class="col-md-3">
                            <b><?php echo lang('time_format');?></b>
                           
                            </div>
                            <div class="col-md-8">
                              <div data-toggle="buttons" class="btn-group btn-group-toggle">
                              <input type="hidden" class="com_time" value="<?php echo $generel[7]->settings_value;?>">
                                          <label class="btn company_time company_time3">
                                          <input type="radio" name="company_time" id="company_time" value="12 Hours"> 
                                          <span>12 Hours</span>
                                    </label>
                                    <label class="btn company_time1 company_time3">
                                    <input type="radio" name="company_time" id="company_time1" value="24 Hours">
                                    <span>24 Hours</span>
                                    </label>
                                    </div> 
                            </div>
                  </div>
                  <br>
                  <div class="row">
                            <div class="col-md-3">
                            <b><?php echo lang('time_zone');?></b>
                           
                            </div>
                            <div class="col-md-8">
                                  <select name="company_time_zone" id="" class="form-control">
                                  <?php foreach($timezone as $row): ?>
                                  <option value="<?php echo $row->value?>" <?php if ($row->value == $generel[8]->settings_value) echo "selected"; ?>><?php echo $row->value?></option>
                                  <?php endforeach; ?>
                                  </select> 
                            </div>
                  </div>
                  <br>
                  <br>
                  <p class="text-primary"><?php echo lang('currency_setting');?></p>
                  <div class="row">
                            <div class="col-md-3">
                            <b><?php echo lang('currency_symbol');?></b>
                           
                            </div>
                            <div class="col-md-8">
                                 <input type="text" name="currency_symbol" class="form-control" value="<?php echo $generel[9]->settings_value;?>">  
                            </div>
                  </div>
                  <br>
                  <div class="row">
                            <div class="col-md-3">
                            <b><?php echo lang('decimal_separator');?></b>
                           
                            </div>
                            <div class="col-md-8">

                                    <div data-toggle="buttons" class="btn-group btn-group-toggle">
                                          <input type="hidden" class="deci_separator" value="<?php echo $generel[10]->settings_value;?>">
                                          <label class="btn decimal_separator1" id="decimal_separator1">
                                          <input type="radio" name="decimal_separator" id="decimal_dot" value="."> 
                                          <span><?php echo lang('dot');?>(.)</span>
                                          </label>
                                          <label class="btn decimal_separator2" id="decimal_separator2">
                                          <input type="radio" name="decimal_separator" id="decimal_coma" value=",">
                                          <span><?php echo lang('comma');?>(,)</span>
                                          </label>
                                    </div>  
                            </div>
                  </div>
                  <br>
                  <div class="row">
                            <div class="col-md-3">
                            <b><?php echo lang('thousand_separator');?></b>
                           
                            </div>
                            <div class="col-md-8">
                                  <div data-toggle="buttons" class="btn-group btn-group-toggle">
                                          <input type="hidden" class="thou_separator" value="<?php echo $generel[11]->settings_value;?>">
                                          <label class="btn thousands_separator1" id="thousands_separator1">
                                          <input type="radio" name="thousand_separator" id="thousands_dot" value="."> 
                                          <span><?php echo lang('dot');?>(.)</span>
                                          </label>
                                          <label class="btn thousands_separator2" id="thousands_separator2">
                                          <input type="radio" name="thousand_separator" id="thousands_comma" value=",">
                                          <span><?php echo lang('comma');?>(,)</span>
                                          </label>
                                          <label class="btn thousands_separator3" id="thousands_separator3">
                                          <input type="radio" name="thousand_separator" id="appSettings_time_format-1" value=" ">
                                          <span><?php echo lang('space');?></span>
                                          </label>
                                    </div> 
                            </div>
                  </div>
                  <br>
                  <div class="row">
                            <div class="col-md-3">
                            <b><?php echo lang('number_of_decimal');?></b>
                           
                            </div>
                            <div class="col-md-8">
                               <div data-toggle="buttons" class="btn-group btn-group-toggle">
                                          <input type="hidden" class="num_decimal" value="<?php echo $generel[12]->settings_value;?>">
                                          <label class="btn btn-primary number_decimal number_decimal3">
                                          <input type="radio" name="number_decimal" id="number_decimal" value="0"> 
                                          <span><?php echo lang('zero');?> (0)</span>
                                          </label>
                                          <label class="btn number_decimal1 number_decimal3">
                                          <input type="radio" name="number_decimal" id="number_decimal1" value="2">
                                          <span><?php echo lang('two');?> (2)</span>
                                          </label>
                                          
                                    </div>  
                            </div>
                  </div>
                  <br>
                  <div class="row">
                            <div class="col-md-3">
                            <b><?php echo lang('currency_position');?></b>
                           
                            </div>
                            <div class="col-md-8">
                               <div data-toggle="buttons" class="btn-group btn-group-toggle">
                                          <input type="hidden" class="currency_position" value="<?php echo $generel[13]->settings_value;?>">
                                          <label class="btn btn-primary currency_position1 currency_position5">
                                          <input type="radio" name="currency_position" id="currency_position1" value="1"> 
                                          <span>$180.00</span>
                                          </label>
                                          <label class="btn currency_position2 currency_position5">
                                          <input type="radio" name="currency_position" id="currency_position2" value="2">
                                          <span>$ 180.00</span>
                                          </label>
                                          <label class="btn currency_position3 currency_position5">
                                          <input type="radio" name="currency_position" id="currency_position3" value="3"> 
                                          <span>180.00$</span>
                                          </label>
                                          <label class="btn currency_position4 currency_position5">
                                          <input type="radio" name="currency_position" id="currency_position4" value="4">
                                          <span>180.00 $</span>
                                          </label>
                                          
                                    </div>     
                            </div>
                  </div>
                  <br>
                  <button  class="btn btn-primary"><?php echo lang('save');?></button>
          </form>     
        </div> 
    </div>


<script>
      //for layout-----
      var layout=$('.company_layout').val();
      if(layout=='LTR'){
            //alert('hi');
          $('.layout').addClass('btn-primary');
          $('#company_layout').attr('checked','checked');
          $('.layout1').removeClass('btn-primary');  
      }
      else{
            $('.layout1').addClass('btn-primary');
            $('#company_layout1').attr('checked','checked');
            $('.layout').removeClass('btn-primary');   
      }

      $(document).ready(function(){
      $('.layout3').click(function(e){
            e.preventDefault();
            let that = $(this);
            $('.layout3').each(function() {
            $(this).removeClass('btn-primary');
           
          });
          that.addClass('btn-primary');
      });
     });
      //comapany tine-----

      var time=$('.com_time').val();
      // alert(time);
      if(time=='12 HOURS'){
            //alert('hi');
          $('.company_time').addClass('btn-primary');
          $('#company_time').attr('checked','checked');
          $('.company_time1').removeClass('btn-primary');  
      }
      else{
            $('.company_time1').addClass('btn-primary');
            $('#company_time1').attr('checked','checked');
            $('.company_time').removeClass('btn-primary');   
      }

      $('.company_time3').click(function(e){
            e.preventDefault();
            let that = $(this);
            $('.company_time3').each(function() {
            $(this).removeClass('btn-primary');
           
          });
          that.addClass('btn-primary');
      });

      //decimal seperator-----
      var deci_separator=$('.deci_separator').val();
      if(deci_separator=='.'){
          $('#decimal_dot').attr('checked','checked');
          $('.decimal_separator1').addClass('btn-primary');
          $('.decimal_separator2').removeClass('btn-primary');  
      }
      else{
          $('#decimal_coma').attr('checked','checked');
          $('.decimal_separator1').removeClass('btn-primary');
          $('.decimal_separator2').addClass('btn-primary');   
      }
      $('#decimal_separator1').click(function(e){
            e.preventDefault();
            $(this).addClass('btn-primary');
            $('#decimal_separator2').removeClass('btn-primary') 
            $('#thousands_comma').attr('checked','checked');
            $('#thousands_separator2').addClass('btn-primary');
            $('#thousands_separator1').removeClass('btn-primary');
            $('#thousands_separator3').removeClass('btn-primary');
            
      });
      $('#decimal_separator2').click(function(e){
            e.preventDefault();
            $(this).addClass('btn-primary');
            $('#thousands_dot').attr('checked','checked');
            $('#thousands_separator1').addClass('btn-primary');
            $('#thousands_separator2').removeClass('btn-primary');
            $('#thousands_separator3').removeClass('btn-primary');
            $('#decimal_separator1').removeClass('btn-primary') 
      });

      //Thousand separator-------
      var thou_separator=$('.thou_separator').val();
      if(thou_separator=='.'){
           
          $('#thousands_dot').attr('checked','checked');
          $('.thousands_separator1').addClass('btn-primary');
          $('.thousands_separator2').removeClass('btn-primary');
          $('.thousands_separator3').removeClass('btn-primary');    
      }
      else if(thou_separator ==',') 
      {
            
          $('#thousands_comma').attr('checked','checked'); 
          $('.thousands_separator1').removeClass('btn-primary');
          $('.thousands_separator2').addClass('btn-primary');
          $('.thousands_separator3').removeClass('btn-primary'); 
      } 
      else{
          $('.thousands_separator1').removeClass('btn-primary');
          $('.thousands_separator2').removeClass('btn-primary');
          $('.thousands_separator3').removeClass('btn-primary');  
      }
      $('#thousands_separator1').click(function(e){
            e.preventDefault();
            $(this).addClass('btn-primary');
            $('#decimal_coma').attr('checked','checked');
            $('#thousands_separator2').removeClass('btn-primary');
            $('#thousands_separator3').removeClass('btn-primary');
            $('#decimal_separator1').removeClass('btn-primary') 
            $('#decimal_separator2').addClass('btn-primary');
            
             
      });

      $('#thousands_separator2').click(function(e){
            e.preventDefault();
            $(this).addClass('btn-primary');
            $('#decimal_dot').attr('checked','checked');
            $('#thousands_separator1').removeClass('btn-primary');
            $('#thousands_separator3').removeClass('btn-primary');
            $('#decimal_separator2').removeClass('btn-primary'); 
            $('#decimal_separator1').addClass('btn-primary') 
             
      });

      $('#thousands_separator3').click(function(e){
            e.preventDefault();
            $(this).addClass('btn-primary');
            // $('#thousands_dot').removeAttr('checked');
            // $('#thousands_comma').removeAttr('checked'); 
            $('#thousands_separator1').removeClass('btn-primary');
            $('#thousands_separator2').removeClass('btn-primary'); 
             
      });
          
           
      //     });
      //     that.addClass('btn-primary');
      // });

      //number of decimal-----
       
       var num_decimal=$('.num_decimal').val();
      if(num_decimal=='0'){
            //alert('hi');
          $('.number_decimal').addClass('btn-primary');
          $('#number_decimal').attr('checked','checked');
          $('.number_decimal1').removeClass('btn-primary');  
      }
      else{
            $('.number_decimal1').addClass('btn-primary');
            $('#number_decimal1').attr('checked','checked');
            $('.number_decimal').removeClass('btn-primary');   
      }
      $('.number_decimal3').click(function(e){
            e.preventDefault();
            let that = $(this);
            $('.number_decimal3').each(function() {
            $(this).removeClass('btn-primary');
           
          });
          that.addClass('btn-primary');
      });

      //currency position------
      var currency_position=$('.currency_position').val();
      console.log(currency_position);
      if(currency_position=='1'){
            //alert('hi');
          $('#currency_position1').attr('checked','checked');
          $('.currency_position1').addClass('btn-primary');
          $('.currency_position2').removeClass('btn-primary');
          $('.currency_position3').removeClass('btn-primary');
          $('.currency_position4').removeClass('btn-primary');  
        
        
      }
      else if(currency_position=='2')
      {
          $('#currency_position2').attr('checked','checked');  
          $('.currency_position1').removeClass('btn-primary');
          $('.currency_position2').addClass('btn-primary');
          $('.currency_position3').removeClass('btn-primary');
          $('.currency_position4').removeClass('btn-primary');  
          
      }
      else if(currency_position=='3')
      {
          $('#currency_position3').attr('checked','checked');  
          $('.currency_position1').removeClass('btn-primary');
          $('.currency_position2').removeClass('btn-primary');
          $('.currency_position3').addClass('btn-primary');
          $('.currency_position4').removeClass('btn-primary');  
          
      }
      else{
          $('#currency_position4').attr('checked','checked');  
          $('.currency_position1').removeClass('btn-primary');
          $('.currency_position2').removeClass('btn-primary');
          $('.currency_position3').removeClass('btn-primary');
          $('.currency_position4').addClass('btn-primary'); 
      }

      $('.currency_position5').click(function(e){
            e.preventDefault();
            let that = $(this);
            $('.currency_position5').each(function() {
            $(this).removeClass('btn-primary');
           
          });
          that.addClass('btn-primary');
      });
</script>

<script>
          
          window.addEventListener('load', function() {
          //for logo -----          
    
          document.querySelector('.logo1').addEventListener('change', function() {
          if (this.files && this.files[0]) {
                    var img = document.querySelector('#company_logo');        
                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
                 
          }
          });
          //for icon------
      
          document.querySelector('.icon').addEventListener('change', function() {
          if (this.files && this.files[0]) {
                    var img = document.querySelector('#company_icon');        
                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
          }
          });
          //for banner------
          
          document.querySelector('.banner').addEventListener('change', function() {
          if (this.files && this.files[0]) {
                    var img = document.querySelector('#company_banner');        
                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
          }
          });
          
          });

       
        
</script>

<style>
.logo1{
          position: absolute;
          left: 0;
          width: 100%;
          top: 0;
          height: 200px;
          opacity: 0;
          max-width: 420px;
}
.icon{
          position: absolute;
          left: 0;
          width: 100%;
          top: 0;
          height: 200px;
          opacity: 0;
}
.banner{
          position: absolute;
          left: 0;
          width: 100%;
          top: 0;
          height: 200px;
          opacity: 0;
}
</style>