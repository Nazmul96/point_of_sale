<div class="content-body">

  <!-- Page Headings Start -->
  <div class="row justify-content-between align-items-center mb-10">

    <!-- Page Heading Start -->
    <div class="col-12 col-lg-auto mb-20">
      <div class="page-heading">
        <h3><?php echo lang('roles_list')?></h3>
      </div>
    </div><!-- Page Heading End -->

    <!-- Page Button Group Start -->
    <div class="col-12 col-lg-auto mb-20">
      <div class="page-date-range">
        <a class="btn btn-primary mb-4 mr-3" href="<?php echo base_url() ?>user_roles_index"><i class="fa fa-list"></i> <?php echo lang('back_to_user')?></a>

      </div>
    </div><!-- Page Button Group End -->

  </div>

  <button class="btn btn-primary mb-4 fixed_button" id="roles_add"> <i class=" zmdi zmdi-plus"></i> </button>


  <div class="box">
    <div class="box-body">
      <div class="  py-primary">
        <table id="example1" class="table table-bordered  data-table data-table-default  ">
          <thead>
            <tr>
              <th><?php echo lang('roles_name')?></th>
              <th><?php echo lang('roles_feature')?></th>
              <th class="text-right p-2"><?php echo lang('Action') ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($all_roles as $row) : ?>       
              <tr>
                   <td><?php echo $row->roles_name;?></td>
                   <td><?php echo $row->all_section;?></td>
                   <?php if($row->is_default == '1'){?>
                    <td></td>
                   <?php }  else {?>     
                   <td class="text-right p-2">
                  <div class="dropdown options-dropdown d-inline-block">
                    <button type="button" data-toggle="dropdown" title="Actions" class="btn-option btn" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="12" cy="5" r="1"></circle>
                        <circle cx="12" cy="19" r="1"></circle>
                      </svg></button>
                    <div class="dropdown-menu dropdown-menu-right py-2 mt-1">
                      <a href="#" class="dropdown-item px-4 py-2 edit" data-id="<?php echo $row->id ?>">
                        <?php echo lang('Edit') ?>
                      </a><a href="<?php echo base_url(); ?>delete_roles/<?php echo $row->id ?>" class="dropdown-item px-4 py-2" id="delete">
                        <?php echo lang('Delete') ?>
                      </a>
                    </div>
                  </div>

                </td> 
                <?php } ?>     
                        
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>


      </div>
    </div>
  </div>

</div>

<!-- roles Insert Modal -->
<div class="modal fade" id="rolesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top:9%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> <?php echo lang('add_new_roles');?></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url() ?>roles_insert" method="POST" id="roles_submit">

        <div class="modal-body">
          <div class="form-group">
            <label for="category_name"><?php echo lang('roles_name');?> *</label>
            <input type="text" class="form-control" name="roles_name" placeholder="<?php echo lang('Name');?>">
            <span id="role_name" class="text-danger"></span>
          </div>
          <div class="form-group">
            <label for="category_name"><?php echo lang('roles_feature');?> *</label>
            <input type="checkbox" class="feature" name="feature" value="dashboard"><?php echo lang('dashboard');?>
            <input type="checkbox" class="feature" name="feature" value="client"><?php echo lang('clients');?>
            <input type="checkbox" class="feature" name="feature" value="product"><?php echo lang('products');?>
            <input type="checkbox" class="feature" name="feature" value="invoice"><?php echo lang('invoices');?>
            <input type="checkbox" class="feature" name="feature" value="payment"><?php echo lang('payments');?>
            <input type="checkbox" class="feature" name="feature" value="report"><?php echo lang('reports');?>
            <input type="checkbox" class="feature" name="feature" value="user_roles"><?php echo lang('users_Roles');?>
            <input type="checkbox" class="feature" name="feature" value="setting"><?php echo lang('settings');?>
            <span id="feature" class="text-danger"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('Cancel') ?></button>
          <button type="submit" class="btn btn-primary"><?php echo lang('save') ?></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- roles Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="  margin-left:3%;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('edit_roles') ?></h5>
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
 $(document).ready(function() {
  $('#roles_submit').validate({  
           rules: {
             roles_name: "required",
           },
           messages: {
            roles_name: "<?php echo lang('the_roles_name_field_is_required')?>",
               //note: "The note field is required",
             }    
           
         });     
     $('#roles_add').click(function(e){
         e.preventDefault();      
         $('#rolesModal').modal('show');
         $('#roles_submit').submit(function(e) {

             //e.preventDefault();

             var data = [];
             $('.feature').each(function(){
                if ($(this).is(":checked")) {
                    data.push($(this).val());
                }  
             });
           if(!e.isDefaultPrevented()){    
          var feature = data.toString(); 
          //console.log(feature);
          var url = $(this).attr('action');
          var request = $(this).serialize()+'&feature='+feature;
             $.ajax({
                    url: url,
                    type: 'post',
                    async: false,
                    data: request,
                    dataType: 'JSON',
                    success: function(data) {
                              
                              if (data.error) {

                              if (data.roles_name != '') {

                              $('#role_name').html(data.roles_name);
                              } else {
                              $('#role_name').html('');
                              }
                              if (data.feature != '') { 
                              $('#feature').html(data.feature);
                              } else {
                              $('#feature').html('');
                              }

                              } else {

                              $('#role_name').html('');
                              $('#feature').html('');

                              $('#roles_submit')[0].reset();
                              $('#rolesModal').modal('hide');
                              window.location.reload();

                              }      
                    }
            });
            return false;
         }
        return false;      
          });
     });
});
//client_edit-------
$('body').on('click','.edit',function(e){
      e.preventDefault();
      $('#editModal').modal('show'); 
      var roles_id=$(this).attr('data-id');
      $.get("edit_roles/"+roles_id,function(data){ 

         $('#modal_body').html(data);
          
      });
    });          
</script>