<?php
   
   $this->db->where('group_name','General');
   $dollar=$this->db->get('settings')->result();

 ?>  
<div class="content-body" id="product_list">
   
          <!-- Page Headings Start -->
      <div class="row justify-content-between align-items-center mb-10">

          <!-- Page Heading Start -->
          <div class="col-12 col-lg-auto mb-20">
          <div class="page-heading">
                    <h3><?php echo lang('products')?></h3>
          </div>
          </div><!-- Page Heading End -->

          <!-- Page Button Group Start -->
          <div class="col-12 col-lg-auto mb-20">
            <div class="page-date-range">
                <a class="btn btn-primary mb-4 mr-3" href="<?php echo base_url()?>category_index"><i class="fa fa-list"></i><?php echo lang('back_to_categories');?></a>
            </div>
          </div><!-- Page Button Group End --> 
          </div>
          <button class="btn btn-primary mb-4 fixed_button" id="productmodal"> <i class="zmdi zmdi-plus"></i> </button>

          <?php
          $message=$this->session->userdata('message');
          if($message){
                    echo " <div class='alert alert-success'>$message</div>";
                    $this->session->unset_userdata('message');
          }
          ?>
         <div class="box">
            <div class="box-body"> 
              <div class="  py-primary">       
                <table id="example1" class="table table-bordered  data-table data-table-default table-striped table-sm">  
                    <thead>
                    <tr>
                     <th><?php echo lang('Image')?></th>
                    <th><?php echo lang('Name')?></th>
                    <th><?php echo lang('Code')?></th>
                    <th><?php echo lang('Category')?></th>
                    <th><?php echo lang('Price')?></th>
                    <th><?php echo lang('Action')?></th>                   
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($all_product as $row): ?>
                              
                              <tr>
                              <td><img src="<?php echo base_url('images/'.$row->image)?>" height='50px' width='50px'></td>
                              <td><?php echo $row->name?></td>
                              <td><?php echo $row->code?></td>        
                              <td><?php echo $row->category_name?></td> 
                       
                              <td>
							  <?php if($row->price){             
                              rs_currency($row->price);
                                ?>
                              <?php } else {
                                rs_currency(0)
                                ?>
                              <?php } ?>	
                              </td>

                              <td class="text-right p-2"> 
                              <div class="dropdown options-dropdown d-inline-block">
                                 <button type="button" data-toggle="dropdown" title="Actions" class="btn-option btn" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                 <circle cx="12" cy="12" r="1"></circle>
                                 <circle cx="12" cy="5" r="1"></circle>
                                 <circle cx="12" cy="19" r="1"></circle></svg></button>
                                 <div class="dropdown-menu dropdown-menu-right py-2 mt-1">
                                        <a href="#" class="dropdown-item px-4 py-2 edit" data-id="<?php echo $row->id ?>">
                                                  <?php echo lang('Edit')?>
                                        </a><a href="<?php echo base_url();?>delete_product/<?php echo $row->id?>" class="dropdown-item px-4 py-2" id="delete">
                                                 <?php echo lang('Delete')?> 
                                        </a></div></div>

                              </td>                        
                             </tr>
                        <?php endforeach; ?>       
                    </tbody>                     
          </table>
                    </div>  
                     </div>  
                      </div>  

          </div>
 
<!-- insert form-->         
<div class="content-body" id="product_add">
    <div class="page-heading mb-4">
        <h3><?php echo lang('add_new_product')?></h3>
    </div>
    <div class="add-edit-product-wrap col-12">
         <form action="<?php echo base_url()?>product_insert" method="POST" enctype="multipart/form-data" id="product_insert"> 
      
          <div class="form-group d-flex flex-column align-items-center mb-4">
            <div class="card" style="width:100%; max-width: 300px; position: relative;">   
              <div class="card-body">
                  <input id="image" type="file" name="image" class="form-control d-none image1">          
                  <label ><img id="product_image" src="<?php echo base_url()?>front-end/assets/images/no-img.jpg"></label>
                  
                </div>    
                <label for="image" style="position: absolute; width: 100%;   bottom: -19px; left:0 ;display: flex; align-items: end; height:auto; top:0"><?php echo lang('product_image')?>
                  <small class="text-muted"><?php echo lang('image_size')?></small>
                </label>          
              </div> 
           </div>
            <div class="row mt-4 pt-4"> 
              <div class="col-md-6 mb-30">
                <div class="form-group">
                  <label for="category_name"><?php echo lang('Name')?>*</label>
                  <input type="text" class="form-control" name="product_name" placeholder="<?php echo lang('Name')?>">
                  <span id="product_name" class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6 mb-30">
                <div class="form-group">
                  <label for="category_name"><?php echo lang('Code')?>*</label>
                  <input type="text" class="form-control"  name="code" placeholder="<?php echo lang('Code')?>">
                  <span id="product_code" class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6 mb-30">
                <div class="row">
                  <div class="col-10">     
                    <div class="form-group">
                       <label for="category_name"><?php echo lang('Category')?>*</label>
                       <select name="category_id" id="" class="form-control">
                          <option value="" selected><?php echo lang('choose_category')?></option>        
                              <?php foreach($category as $row): ?>
                              <option value="<?php echo $row->id?>"><?php echo $row->category_name?></option>
                              <?php endforeach; ?>
                       </select>
                       <span id="category_select" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-2 mt-4 text-end">
                      <a href="" class="btn btn-primary btn-lg" id="category_insert">+</a>
                  </div>   
                </div>
              </div>
              <div class="col-md-6 mb-30">
                <div class="form-group">
                  <label for="category_name"><?php echo lang('unit_price')?>*</label>
                  <input type="text" class="form-control" id="" name="unit_price" placeholder="<?php echo lang('unit_price')?>">
                  <span id="unit_price" class="text-danger"></span>
                </div>
              </div> 
            </div>
               
              <div class="form-group mb-30">
                <label for="category_name"><?php echo lang('Descrption')?></label>
                <textarea class="form-control textarea" name="description" rows="12"></textarea>
              </div>

            
          <div class="d-flex flex-wrap justify-content-center col mbn-10">
             <button type="button" class="btn btn-outline-danger product_show mx-2"><?php echo lang('Cancel')?></button>
             <button type="submit" class="btn btn-primary"><?php echo lang('Submit')?></button>
          </div>
         
           
          
        </form>

    </div>


    </div>
 
 

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style=" margin-left:3%;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('edit_product')?></h5></h5>
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

window.addEventListener('load', function() {
          //for logo -----          
    
          document.querySelector('.image1').addEventListener('change', function() { 
          if (this.files && this.files[0]) {
                    var img = document.querySelector('#product_image');        
                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
                 
          }
          });
          
      }); 

$( document ).ready(function() {
  $('.data-table-default').DataTable({ 
    responsive: true, 
    language: { paginate: { previous: '<i class="zmdi zmdi-chevron-left"></i>', next:     '<i class="zmdi zmdi-chevron-right"></i>' } } 
                            });
  //jquery validation---------------
  $('#product_insert').validate({    
          rules: {
            product_name: "required",
            code: {
                required: true,
              },
            category_id: "required",
            unit_price:  {
               required:true,
               number: true
            }
          },
          messages: {
              product_name: "<?php echo lang('please_enter_your_product_name')?>",
              code: "<?php echo lang('please_enter_a_code')?>",
              category_id: "<?php echo lang('please_select_category')?>",
              unit_price: {
                required:"<?php echo lang('please_enter_your_unit_price')?>",
                number:"<?php echo lang('please_enter_a_valid_number')?>"
              }
            }    
          
        });
 
                //product_insert------
                 $('#product_insert').submit(function(e){
                   // e.preventDefault();
                   if(!e.isDefaultPrevented()){     
                    var url = $(this).attr('action');
                    var element = new FormData(document.getElementById("product_insert"));
                    $.ajax({
                      url:url,
                      method:'POST',
                      data: element,
                      processData: false,  // tell jQuery not to process the data
                      contentType: false,   // tell jQuery not to set contentType
                      dataType: 'JSON',
                    success:function(data){

                      if (data.error) {

                      if (data.product_name != '') {

                      $('#product_name').html(data.product_name);  
                      }else {
                      $('#product_name').html('');
                      }
                      if (data.product_code != '') {
                      //console.log('hi');        
                      $('#product_code').html(data.product_code);  
                      }else {
                      $('#product_code').html('');
                      }
                      if (data.unit_price != '') {       
                      $('#unit_price').html(data.unit_price);  
                      }else {
                      $('#unit_price').html('');
                      }

                      if (data.category_select != '') {       
                      $('#category_select').html(data.category_select);  
                      }else {
                      $('#category_select').html('');
                      }

                      }
                      else{

                      $('#product_name').html('');
                      $('#product_code').html('');
                      $('#unit_price').html('');
                      $('#category_select').html('');


                      $('#product_insert')[0].reset();
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


    $('.edit').click(function(e){
      e.preventDefault();
      let product_id=$(this).attr('data-id');
      $('#editModal').modal('show'); 
      $.get("edit_product/"+product_id,function(data){
          
          $('#modal_body').html(data)
          
      });
    });

    // $('body').on('click','.edit',function(e){
    //   e.preventDefault();
    //   $('#editModal').modal('show'); 
    //   var client_id=$(this).attr('data-id');
    //   $.get("edit_client/"+client_id,function(data){ 

    //      $('#modal_body').html(data);
    //      generate_country_list();
          
    //   });
    // });

    //category-insert-----
$('#category_insert').click(function(e){
      e.preventDefault();
      $('#categoryModal').modal('show');
            $('#category_submit').submit(function(e){
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

                      if (data.category_name != '') {

                      $('#category_name').html(data.category_name);  
                      }else {
                      $('#category_name').html('');
                      }

                      }
                      else{

                      $('#category_name').html('');

                      $('#category_submit')[0].reset();
                      $('#categoryModal').modal('hide');

                      }

                        
                          
                       
                      }
                    });


             }); 

});

});
</script>