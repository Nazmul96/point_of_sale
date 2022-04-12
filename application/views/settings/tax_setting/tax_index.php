
<div class="content-body">

<!-- Page Headings Start -->
<div class="row justify-content-between align-items-center mb-10">

<!-- Page Heading Start -->
<div class="col-12 col-lg-auto mb-20">
<div class="page-heading">
          <h3><?php echo lang('settings');?></h3>
</div>
</div>
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
            <a href="<?php echo base_url()?>payment_method" class="text-capitalize nav-link ">
             <i class="zmdi zmdi-card h2"></i><br>
             <span><?php echo lang('payment_methods');?></span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>notification_index" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-notifications-none h2"></i><br>
              <span><?php echo lang('notification');?></span> 
            </a> 
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>invoice_setting" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-file-text h2"></i><br>
              <span><?php echo lang('invoice');?></span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>tax_setting" class="text-capitalize nav-link active">
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
     <button class="btn btn-primary mb-4 fixed_button" id="add_tax"> <i class="zmdi zmdi-plus"></i> </button>   
    <div class="box"> 
        <div class="box-body">
                 <div class="row">
                           <div class="col-md-4 mt-4">
                              <h5><?php echo lang('tax');?></h5>
                           </div>
                           <div class="col-md-6">
                                     
                           </div>
                            
                 </div>
                 <hr>

                 <table id="example1" class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                <th><?php echo lang('Name');?></th>
                <th><?php echo lang('value');?></th>
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
<div class="modal fade" id="taxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top:9%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('add_new_category');?></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url()?>tax_insert" method="POST" id="tax_insert">
     
      <div class="modal-body">          
          <div class="form-group">
            <label for="category_name"><?php echo lang('tax_name');?></label>
            <input type="text" class="form-control" name="name" placeholder="Name">
            <span id="tax_name" class="text-danger"></span> 
          </div>
          <br>
          <div class="form-group">
            <label for="category_name"><?php echo lang('tax_value');?></label>
            <input type="number" class="form-control" name="value" placeholder="Value">
            <span id="tax_value" class="text-danger"></span> 
          </div>
          <br>
          <div class="form-group"><label for="category_name"><?php echo lang('is_default');?></label><input type="radio"  name="is_default" value="yes"><?php echo lang('yes');?> <input type="radio" name="is_default" value="no"><?php echo lang('no');?></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('Cancel');?></button>
        <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
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
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('edit_tax');?></h5>
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
      showAll_tax_setting(); 

             $('#add_tax').click(function(){
                 $('#taxModal').modal('show');      
             })

             function showAll_tax_setting() {
              $.ajax({
                    url: '<?php echo base_url() ?>all_tax_data',
                    dataType: 'json',
                    success: function(data) {
                      var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {

                            html += '<tr>'+
                            '<td>' + data[i].tax_name + '</td>' +
                            '<td>' + data[i].tax_value + '</td>' +
                            '<td>'+(data[i].is_default == 'yes' ? "Yes":"No")+'</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="#" class="btn btn-primary btn-sm edit payment_editModal mr-2" id="" data-id="' + data[i].id + '"><i class="fas fa-edit"></i></a>' + 
                            '<a href="#" class="btn btn-danger btn-sm tax_delete" data_id="' + data[i].id + '"><i class="fas fa-trash"></i></a>' +
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
           //tax_insert--------
           $( document ).ready(function() {
              //jquery validation---------------
              $('#tax_insert').validate({    
                rules: {
                  name: "required",
                  value: "required",      
                },
                messages: {
                   name: "<?php echo lang('the_name_field_is_required')?>",
                   value: "<?php echo lang('the_value_field_is_required')?>", 
                  }    
                
              });

           $('#tax_insert').submit(function(e){
                    // alert('hi');
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
                      console.log(data);
                      if (data.error) {
                              if (data.name != '') {
                              $('#tax_name').html(data.name);  
                              }else {
                              $('#tax_name').html('');
                              }
                              if (data.value != '') {
                              $('#tax_value').html(data.value);  
                              }else {
                              $('#tax_value').html('');
                              }
         
                       } 
                       else{
     
                          $('#tax_name').html('');
                          $('#tax_value').html('');
                          
                          $('#tax_insert')[0].reset();
                          $('#taxModal').modal('hide');       
                          showAll_tax_setting();  
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
      $('#showdata').on('click', '.tax_delete', function(e){
        e.preventDefault();
        var id=$(this).attr('data_id');
        $.ajax({  
              url: '<?php echo base_url() ?>tax_stting_delete',
              data: {
                        id:id
              },
              dataType: 'json',
              success: function(data) {

                showAll_tax_setting();
              }
        });
      });

       //tax edit------
    $('#showdata').on('click', '.edit', function(e){
      $('#editModal').modal('show'); 
        e.preventDefault();
        let id=$(this).attr('data-id');
        $.ajax({  
              url: '<?php echo base_url() ?>tax_setting_edit',
              data:{
                  id:id
              },
              success: function(data) {
                $('#modal_body').html(data);

              }
        });
      });  
    });

</script>