
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
       <table id="example1" class="table table-bordered  data-table data-table-default  ">
         
            <thead>
                <tr>
                  <th><?php echo lang('Name')?></th>
                  <th><?php echo lang('Client Number')?></th>
                  <th><?php echo lang('Email')?></th>
                  <th><?php echo lang('Phone')?></th>
                  <th><?php echo lang('City')?></th>
                  <th><?php echo lang('State')?></th>
                  <th><?php echo lang('Postal Code')?></th>
                  <th><?php echo lang('Country')?></th>
                  <th><?php echo lang('Address')?></th>
                  <th><?php echo lang('Website')?></th>
                  <th><?php echo lang('Notes')?></th>
                  <th><?php echo lang('Action')?></th>                    
                </tr>
              </thead>
              <tbody>
                <?php foreach($all_Clients as $row): ?>
                        
                        <tr>
                        <td><?php echo $row->client_name?></td>        
                        <td><?php echo $row->client_number?></td>
                        <td><?php echo $row->client_email?></td>
                        <td><?php echo $row->contact_number?></td>
                        <td><?php echo $row->city?></td>
                        <td><?php echo $row->state?></td>
                        <td><?php echo $row->postal_code?></td>
                        <td><?php echo $row->country?></td>
                        <td><?php echo $row->address?></td>
                        <td><?php echo $row->website?></td>
                        <td><?php echo $row->note?></td>
                        
                        <td> 
                          <a href="<?php echo base_url();?>view_client/<?php echo $row->id?>" class="btn btn-primary">
                          <?php echo lang('View')?>
                          </a>
                          <a href="#" class="btn btn-success edit" data-id="<?php echo $row->id?>">
                          <?php echo lang('Edit')?>
                            </a>
                            <a href="<?php echo base_url();?>delete_client/<?php echo $row->id?>" class="btn btn-danger" id="delete">
                            <?php echo lang('Delete')?>
                            </a>

                        </td>                        
                       </tr>
                  <?php endforeach; ?>
                </tbody>                     
              </table>
         </div>  
      </div>
    </div>

</div>
<!-- insert modal-->
<div class="content-body" id="product_add">
  <div class="page-heading mb-20">
      <h3><?php echo lang('Add New Client')?></h3>
    </div>
  <div class="add-edit-product-wrap col-12">
    
    <form action="<?php echo base_url()?>client_insert" method="POST" id="client_insert">
                
          <div class="row">
                       
             <div class="col-md-6">
            <div class="form-group">
              <label for="category_name"><?php echo lang('Client Name')?>*</label>
              <input type="text" class="form-control" id="category_name" name="client_name">
              <span id="client_name" class="text-danger"></span>
            </div>
            <div class="form-group">
              <label for="category_name"><?php echo lang('Client Number')?>*</label>
              <input type="number" class="form-control" id="category_name" name="client_number">
              <span id="client_number" class="text-danger"></span>
            </div>
            </div>
            <div class="col-md-6"> 
            <div class="form-group">
              <label for="category_name"><?php echo lang('Client Email')?>*</label>
              <input type="email" class="form-control" id="category_name" name="client_email">
              <span id="client_email" class="text-danger"></span>         
            </div> 
            <div class="form-group">
              <label for="category_name"><?php echo lang('Contact Number')?></label>
              <input type="tel" name="phone" id="phone" class="form-control">
           
            </div>
            </div>
            </div>
             
            <div class="form-group">
              <label for="category_name"><?php echo lang('Adress')?></label>
              <input type="text" class="form-control" id="category_name" name="address">
             
            </div>
            <div class="row">                  
            <div class="col-md-6">  
            <div class="form-group">
              <label for="category_name"><?php echo lang('City')?></label>
              <input type="text" class="form-control" id="category_name" name="city">
                     
            </div>
             
            <div class="form-group">
              <label for="category_name"><?php echo lang('State')?></label>
              <input type="text" class="form-control" id="category_name" name="state">
             
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
              <label for="category_name"><?php echo lang('Postal Code')?></label>
              <input type="number" class="form-control" id="category_name" name="postal_code">
              
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
              <input type="text" class="form-control" id="category_name" name="website">
              
            </div>
            <div class="form-group">
              <label for="category_name"><?php echo lang('Notes')?></label>
              <input type="text" class="form-control" id="category_name" name="note"> 
              
            </div>  
            
        <div class="d-flex flex-wrap justify-content-center col mbn-10">
           <button type="button" class="btn btn-outline-danger product_show mx-2">Cancle</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
         
      </form>
  </div>
 </div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="  margin-left:3%;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('Edit Client')?></h5>
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
                //client_insert------
                 $('#client_insert').submit(function(e){
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


                      $('#client_insert')[0].reset();
                      $('#product_add').hide();
                      $('#product_list').show();  
                      window.location.reload();

                      }

                        
                          
                       
                      }
                    });


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