<?php
//   echo '<pre>';
//   print_r($invoice_setting[0]);
//   die();        

?>


<div class="content-body">

<!-- Page Headings Start -->
<div class="row justify-content-between align-items-center mb-10">

<!-- Page Heading Start -->
<div class="col-12 col-lg-auto mb-20">
<div class="page-heading">
          <h3>Settings</h3>
</div>
</div>
</div>
<!-- Page Heading End -->

  <div class=""> 
      <ul class="nav nav-tabs text-center">
          <li class="nav-item">
            <a href="<?php echo base_url();?>setting_index" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-settings h2"></i><br>
              <span>General</span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>email_setup" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-email h2"></i><br>
              <span>Email Setup</span> 
            </a> 
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>payment_method" class="text-capitalize nav-link ">
             <i class="zmdi zmdi-card h2"></i><br>
             <span>Payment Methods</span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>notification_index" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-notifications-none h2"></i><br>
              <span>Notification</span> 
            </a> 
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>invoice_setting" class="text-capitalize nav-link active">
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
        <h4 class="mt-2">Invoice</h4>
         <hr>
         <form action="<?php echo base_url();?>invoice_setting_update" id="invoice_update"  method="POST" enctype="multipart/form-data">
             
            <div class="row position-relative">
                        <div class="col-md-3">
                        <b>Invoice logo</b>
                        
                        <small>(Recommended size: 200 x 200 px)</small>
                        </div>
                        <div class="col-md-8" >
                                 <img src="<?php echo base_url('images/invoice/' .$invoice_setting[0]->settings_value) ?>" alt="" id="invoice_logo" height="200px" width="200px">
                                 
                        </div>
                        <input type="file" class="logo1" name="invoice_logo">
                        <input type="hidden" name="old_invoice_logo" value="<?php echo $invoice_setting[0]->settings_value?>">
            </diV>
            <br>
            <div class="row position-relative">
                                  <div class="col-md-3">
                                  <b>Invoice starting number</b>
                                  </div>
                                  <div class="col-md-8">
                                  <input type="number" value="<?php echo $invoice_setting[1]->settings_value?>" name="invoice_starting_number" class="form-control">
                                  <span id="invoice_no" class="text-danger"></span>     
                                  </div>
                                  
              </div>
              <br>
              <button  class="btn btn-primary">Save</button>
         </form>
    </div>
  </div>
</div>
<style>
.logo1{
          position: absolute;
          left: 0;
          width: 100%;
          top: 0;
          height: 200px;
          opacity: 0;
}
</style>
<script>
            window.addEventListener('load', function() {
          //for logo -----          
    
          document.querySelector('.logo1').addEventListener('change', function() { 
          if (this.files && this.files[0]) {
                    var img = document.querySelector('#invoice_logo');        
                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
                 
          }
          });
          
      });

      //invoice_setting update-------
      $( document ).ready(function() {

               $('#invoice_update').on('submit',function(e){
                    e.preventDefault();     
                    var url = $(this).attr('action');
                    var element = new FormData(document.getElementById("invoice_update"));
                    $.ajax({
                      url:url,
                      method:'POST',
                      data: element,
                      processData: false,  // tell jQuery not to process the data
                      contentType: false,   // tell jQuery not to set contentType
                      dataType: 'JSON',
                    success:function(data){
                       if (data.error) {
                              if (data.invoice_number != '') {
                              $('#invoice_no').html(data.invoice_number);  
                              }else {
                              $('#invoice_no').html('');
                              }
         
                       } 
                       else{
     
                          $('#invoice_no').html('');
                        
                         }    
                                                  
                  }
              
                  });
 

             });     
          });
</script>                      