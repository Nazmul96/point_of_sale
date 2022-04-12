
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
            <a href="<?php echo base_url();?>setting_index" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-settings h2"></i><br>
              <span><?php echo lang('general');?></span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>email_setup" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-email h2"></i><br>
              <span><?php echo lang('email_setup');?></span> 
            </a> 
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>payment_method" class="text-capitalize nav-link active">
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
     <button class="btn btn-primary mb-4 fixed_button" id="payment_method">
       <i class="zmdi zmdi-plus"></i>
     </button> 
                  <div class="box"> 
                    <div class="box-body">
                       <div class="row">
                             <div class="col-md-12   mt-4">
                                <h5><?php echo lang('payment_methods');?></h5>
                             </div> 
                       </div>
                       <hr>

                    <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                    <th><?php echo lang('Name');?></th>
                    <th><?php echo lang('Status');?></th>
                    <th><?php echo lang('default');?></th>
                    <th class="text-right p-2"><?php echo lang('Action');?></th>                    
                    </tr>
                    </thead>
                    <tbody id="showdata">
                  
                    </tbody>                     
                    </table> 
                             
                    </div>
                    
                         
                    </div>  

</div>

<!-- Insert Modal -->
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('add_payment_method');?></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url()?>payment_insert" method="POST" id="payment_insert">
     
      <div class="modal-body">          
          <div class="form-group">
            <label for="category_name"><?php echo lang('Name');?></label>
            <input type="text" class="form-control" name="payment_name" placeholder="Name">
            <span id="payment_name" class="text-danger"></span>
          </div>
          <br>
          <div class="form-group">
            <label for="category_name"><?php echo lang('type');?></label>
                 
                    <select name="payment_types" id="" class="form-control payment_type">
                              <option value="">choose one</option>
                              <option value="cash">Cash</option>
                              <option value="stripe">Stripe</option>
                              <option value="paypal">paypal</option>
                              
                    </select>
                    <span id="payment_types" class="text-danger"></span>
          </div>
          <br>
          <div class="types">

   

          </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('Cancel');?></button>
        <button type="submit" id="ami" class="btn btn-primary"><?php echo lang('save');?></button>
      </div>
    </form>
    </div>
  </div>
</div> 
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="margin-top:5%; margin-left:3%;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('edit_payment');?></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div id="modal_body">

       </div>               
    </div>
  </div>
</div>

<script>

       //apending dropdown-------
       $(document).on('change', '.payment_type', function(){
          var value=$(this).val();
            if(value=='cash'){
               $('.types').empty();        
            }
            else if(value=='stripe'){
                $('.types').empty();         
                $('.types').append(' <div class="form-group"><label for="category_name"><?php echo lang('public_key');?></label><input type="text" class="form-control" name="public_key" placeholder="Public key"><span id="public_key" class="text-danger"></span></div><br><div class="form-group"><label for="category_name"><?php echo lang('secret_key');?></label><input type="password" class="form-control" name="secret_key" placeholder="Secret key"><span id="secret_key" class="text-danger"></span></div><br><div class="form-group"><div class="customized-checkbox checkbox-default"><input type="checkbox" name="mark_default" value="2"><?php echo lang('mark_as_default');?></div></div>')
            }
            else if(value=='paypal'){
                    $('.types').empty(); 
                    $('.types').append('<div class="form-group"><label for="category_name"><?php echo lang('client_id');?></label><input type="text" class="form-control" name="client_id" placeholder="client id"><span id="client_id" class="text-danger"></span></div><br><div class="form-group"><label for="category_name"><?php echo lang('secret_key');?></label><input type="password" class="form-control" name="secret_key" placeholder="Secret key"><span id="secret_key" class="text-danger"></span></div><br><div class="form-group"><label for="category_name"><?php echo lang('mode');?></label><input type="radio" name="mode" value="live">Live <input type="radio" name="mode" value="sandbox">Sandbox</div><span id="mode" class="text-danger"></span><br><div class="form-check"><input class="form-check-input" type="checkbox" name="mark_default" value="2"><?php echo lang('mark_as_default');?> </div>')
            }
            
       });             
</script>
<script>
        showAll_payment_setting();
        
        $('#payment_method').click(function(){
          $('#my_modal').modal('show');      
        })
         
          function showAll_payment_setting() {
                $.ajax({
                    url: '<?php echo base_url() ?>all_payment_data',
                    dataType: 'json',
                    success: function(data) {
                              //console.log(data);
                              var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {

                            html += '<tr>'+
                            '<td>' + data[i].name + '</td>' +
                            '<td>' +(data[i].status == 1 ? "<span class='badge badge-success badge-pill ml-2 p-2'><?php echo lang('active');?></span>":"<span class='badge badge-danger badge-pill ml-2 p-2'><?php echo lang('inactive');?></span>")+ '</td>' +
                            '<td>'+(data[i].default_field == 1 ? "No":"Yes")+'</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="#" class="btn btn-primary btn-sm edit payment_editModal mr-2" id="" data-id="' + data[i].id + '"><i class="fas fa-edit"></i></a>' + 
                            '<a href="#" class="btn btn-danger btn-sm payment_delete"" data_id="' + data[i].id + '"><i class="fas fa-trash"></i></a>' +
                            '</td>' +
                            '</tr>';
                        }
                        $('#showdata').html(html);
                    },
                    error: function() {
                        alert('Could not get Data from Database');     
                    }
                    
                });
            } 


          $( document ).ready(function() {
             //jquery validation---------------
              $('#payment_insert').validate({    
                rules: {
                  payment_name: "required",
                  payment_types: "required",

                  //stripe option-------
                  public_key: "required",
                  secret_key: "required",
                  //paypal option-------
                  client_id: "required",
                },
                messages: {
                    payment_name: "<?php echo lang('the_name_field_is_required')?>",
                    payment_types: "<?php echo lang('the_type_field_is_required')?>",

                    //stripe option-------
                    public_key: "<?php echo lang('the_public_key_field_is_required')?>",
                    secret_key: "<?php echo lang('the_secret_key_field_is_required')?>",

                    //paypal option-------
                    client_id: "<?php echo lang('the_client_id_field_is_required')?>",
                  }    
                
              });
               $('#payment_insert').submit(function(e){
                         //alert('hi');
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

                       if (data.error) {
               
                            if (data.name != '') {
                              $('#payment_name').html(data.name);  
                            }else {
                                $('#payment_name').html('');
                            }
                            if (data.types != '') {
                              $('#payment_types').html(data.types);  
                            }else {
                                $('#payment_types').html('');
                            }
                            //for stripe ------
                            if (data.public_key != '') {
                              $('#public_key').html(data.public_key);  
                            }else {
                                $('#public_key').html('');
                            }
                            if (data.secret_key != '') {
                              $('#secret_key').html(data.secret_key);  
                            }else {
                                $('#secret_key').html('');
                            }
                            //for paypal------
                            if (data.client_id != '') {
                              $('#client_id').html(data.client_id);  
                            }else {
                                $('#client_id').html('');
                            }
                            if (data.mode != '') {
                              $('#mode').html(data.mode);  
                            }else {
                                $('#mode').html('');
                            }
                            
                            
                          }
                        else{
     
                              $('#payment_name').html('');
                              $('#payment_types').html('');
                              //for stripe--------
                              $('#public_key').html('');
                              $('#secret_key').html('');
                              //paypal------
                              $('#mode').html('');
                              $('#client_id').html('');

                              $('#payment_insert')[0].reset();
                              $('#my_modal').modal('hide');       
                              showAll_payment_setting(); 
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
   //payment mthods delete-------
  $( document ).ready(function() {       
      $('#showdata').on('click', '.payment_delete', function(e){
        
        e.preventDefault();
      
        var id=$(this).attr('data_id');
        $.ajax({  
              url: '<?php echo base_url() ?>payment_stting_delete',
              data: {
                        id:id
              },
              dataType: 'json',
              success: function(data) {

                showAll_payment_setting();
              }
        });
      });
    //payment edit------
    $('#showdata').on('click', '.edit', function(e){
      $('#editModal').modal('show'); 
        e.preventDefault();
        let id=$(this).attr('data-id');
        $.ajax({  
              url: '<?php echo base_url() ?>payment_setting_edit',
              data:{
                  id:id
              },
              success: function(data) {
                // console.log(data);
                //showAll_payment_setting();
                $('#modal_body').html(data);

              }
        });
      });  
});
</script>
