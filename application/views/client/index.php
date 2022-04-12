
<div class="content-body" id="product_list"> 
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Clients</h3>
            </div>
        </div><!-- Page Heading End --> 
    </div>

    <button class="fixed_button btn btn-primary mb-4"  id="productmodal"> <i class="zmdi zmdi-account-add"></i></button>
    <?php
        $message=$this->session->userdata('message');
        if($message){
              echo " <div class='alert alert-success'>$message</div>";
              $this->session->unset_userdata('message');
        }
    ?>
    <div class="box">
      <div class="box-body">  
        <div class="py-primary">
      <div class="table-responsive">       
       <table id="example" class="table table-bordered  data-table data-table-default">
         
            <thead>
                <tr>
                  <th><?php echo lang('Name')?></th>
                  <th><?php echo lang('client_number')?></th>
                  <th><?php echo lang('Email')?></th>
                  <th><?php echo lang('Phone')?></th>
                  <th><?php echo lang('City')?></th>
                  <th><?php echo lang('State')?></th>
                  <th><?php echo lang('postal_code')?></th>
                  <th><?php echo lang('Country')?></th>
                  <th><?php echo lang('Address')?></th>
                  <th><?php echo lang('Website')?></th>
                  <th><?php echo lang('Notes')?></th>
                  <th><?php echo lang('Action')?></th>                                       
                </tr>
              </thead>
              <tbody>
  
              </tbody>                     
              </table>
            </div>  
         </div>  
      </div>
    </div>

</div>
<!-- insert modal-->
<div class="content-body" id="product_add">
  <div class="page-heading mb-20">
      <h3><?php echo lang('add_new_client')?></h3>
    </div>
  <div class="add-edit-product-wrap col-12">
    
    <form action="<?php echo base_url()?>client_insert" method="POST" id="client_insert">
                
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
                <span id="password_error" class="text-danger"></span> 
              </div>
              <div class="col-md-6">
                <label for="category_name"><?php echo lang('re_pass')?> *</label>
                <input type="password" name="retype_password" class="form-control">
                <span id="retype_password_error" class="text-danger"></span> 
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
           <button type="button" class="btn btn-outline-danger product_show mx-2"><?php echo lang('Cancel')?></button>
          <button type="submit" class="btn btn-primary"><?php echo lang('save')?></button>
        </div>
        
         
      </form>
  </div>
 </div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="  margin-left:3%;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('edit_client')?></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal_body">

      </div>   
    </div>
  </div>
</div> 

<script type="text/javascript">

$( document ).ready(function() {
    
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "<?php echo base_url().'client_index_datatable';?>",
            type: "POST",
            dataType: 'JSON',
        },
        "columns": [
            { "data": "client_name" },
            { "data": "client_number" },
            { "data": "client_email" },
            { "data": "contact_number" },
            { "data": "city" },
            { "data": "state" },
            { "data": "postal_code" },
            { "data": "country"},
            { "data": "address"},
            { "data": "website"},
            { "data": "note"},
        ],

        "columnDefs": [
        {
            // The `data` parameter refers to the data for the cell (defined by the
            //`data` option, which defaults to the column being worked with, in
            //this case `data: 0`.
            "render": function ( data, type, row ) {
                // console.log(data);
                // console.log(row);
                // return '<a href="edit/'+ row['id']+'">Edit</a>';
                return '<a href="<?php echo base_url();?>view_client/'+row['id']+'"class="btn btn-primary"><?php echo lang('View')?></a> <a href="#" class="btn btn-success edit" data-id="'+row['id']+'"><?php echo lang('Edit')?></a> <a href="<?php echo base_url();?>delete_client/'+row['id']+'"class="btn btn-danger" id="delete"><?php echo lang('Delete')?></a>';
            },
            "targets": 11
        },
       ]
  
    } );
     
  //jquery validation---------------
        $('#client_insert').validate({    
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
              client_name: "<?php echo lang('please_enter_your_client_name')?>",
              client_email: "<?php echo lang('please_enter_a_valid_email_address')?>",
              client_number: {
                required:"<?php echo lang('please_enter_your_client_nubmer')?>",
              },
              phone:{
                number:"<?php echo lang('please_enter_a_number')?>",
              },
              password: {
                required: "<?php echo lang('please_provide_a_password')?>",
                minlength: "<?php echo lang('your_password_must_be_at_least_8_characters_long')?>"
              },
              retype_password: {
              required: "<?php echo lang('this_field_is_required')?>",  
              minlength: "<?php echo lang('our_password_must_be_at_least_8_characters_long')?>",
              equalTo: "<?php echo lang('Please_enter_the_same_password_as_above')?>"
            },
            }    
          
        });
                //client_insert------retype_password_error
                 $('#client_insert').submit(function(e){
                    //e.preventDefault();
                    //console.log(e.isDefaultPrevented());
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

                      if (data.password != '') {
                      //console.log('hi');        
                      $('#password_error').html(data.password);  
                      }else {
                      $('#password_error').html('');
                      }

                      if (data.retype_password != '') {
                      //console.log('hi');        
                      $('#retype_password_error').html(data.retype_password);  
                      }else {
                      $('#retype_password_error').html('');
                      }

                      }
                      else{

                      $('#client_name').html('');
                      $('#client_number').html('');
                      $('#client_email').html('');
                      $('#password_error').html('');  
                      $('#retype_password_error').html('');

                      $('#client_insert')[0].reset();
                      $('#product_add').hide();
                      $('#product_list').show();  
                      window.location.reload();

                      }

                        
                          
                       
                      }
                    });
                    
                    return false;
                  }
                  return false;
             });
                 
             
                 

  //client_edit-------
    $('body').on('click','.edit',function(e){
      e.preventDefault();
      $('#editModal').modal('show'); 
      var client_id=$(this).attr('data-id');
      $.get("edit_client/"+client_id,function(data){ 

         $('#modal_body').html(data);
         generate_country_list();
          
      });
    });

    generate_country_list();
  }); //payment edit------
      // $(document).on('click', '.edit', function(){
      //   e.preventDefault();
      //   alert('hi');
      // $('#editModal').modal('show'); 
      //   let id=$(this).attr('data-id');
      //   $.ajax({  
      //         url: 'payment_setting_edit',
      //         data:{
      //             id:id
      //         },
      //         success: function(data) {
      //           // console.log(data);
      //           //showAll_payment_setting();
      //           $('#modal_body').html(data);

      //         }
      //   });
      // }); 
</script>