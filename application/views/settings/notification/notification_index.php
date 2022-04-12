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

       <div class="row ml-2">
              <div class="">
                     <ul class="nav nav-tabs text-center">
                            <li class="nav-item">
                                   <a href="<?php echo base_url(); ?>setting_index" class="text-capitalize nav-link ">
                                          <i class="zmdi zmdi-settings h2"></i><br>
                                          <span><?php echo lang('general');?></span>
                                   </a>
                            </li>
                            <li class="nav-item">
                                   <a href="<?php echo base_url() ?>email_setup" class="text-capitalize nav-link ">
                                          <i class="zmdi zmdi-email h2"></i><br>
                                          <span><?php echo lang('email_setup');?></span>
                                   </a>
                            </li>
                            <li class="nav-item">
                                   <a href="<?php echo base_url() ?>payment_method" class="text-capitalize nav-link">
                                          <i class="zmdi zmdi-card h2"></i><br>
                                          <span><?php echo lang('payment_methods');?></span>
                                   </a>
                            </li>
                            <li class="nav-item">
                                   <a href="<?php echo base_url() ?>notification_index" class="text-capitalize nav-link active">
                                          <i class="zmdi zmdi-notifications-none h2"></i><br>
                                          <span><?php echo lang('notification');?></span>
                                   </a>
                            </li>
                            <li class="nav-item">
                                   <a href="<?php echo base_url() ?>invoice_setting" class="text-capitalize nav-link">
                                          <i class="zmdi zmdi-file-text h2"></i><br>
                                          <span><?php echo lang('invoice');?></span>
                                   </a>
                            </li>
                            <li class="nav-item">
                                   <a href="<?php echo base_url() ?>tax_setting" class="text-capitalize nav-link">
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
                     <br>
              </div>
             

              <div class="col-md-9 bg-light ml-4">
                     
                       <div class="row">
                             <div class="col-md-12   mt-4">
                                <h5><?php echo lang('notification');?></h5>
                             </div> 
                       </div>
                       <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                          <b><?php echo lang('event_name');?></b>
                                   </div>
                                   <div class="col-md-3">
                                          <b><?php echo lang('event_channel');?></b>
                                   </div>
                                   <div class="col-md-3">
                                          <b><?php echo lang('templates');?></b>
                                   </div>
                                
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                     <?php echo lang('password_reset');?>
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-success"><?php echo lang('mail');?></span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" data-id="2" class="btn btn-primary btn-sm edit_modal"><?php echo lang('update');?></a>
                                   </div>
                                   <div class="col-md-2">

                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                     <?php echo lang('client_credential');?>
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-success"><?php echo lang('mail');?></span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" class="btn btn-primary btn-sm edit_modal" data-id="3"><?php echo lang('update');?></a>
                                   </div>
                                   <div class="col-md-2">

                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                   <?php echo lang('invoice_sending_attachment');?>
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-success"><?php echo lang('mail');?></span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" class="btn btn-primary btn-sm edit_modal" data-id="4"><?php echo lang('update');?></a>
                                   </div>
                                   <div class="col-md-2">

                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                     <?php echo lang('invoice_payment_reminder');?>
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-success"><?php echo lang('mail');?></span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" class="btn btn-primary btn-sm edit_modal" data-id="5"><?php echo lang('update');?></a>
                                   </div>
                                   <div class="col-md-2">

                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                     <?php echo lang('user_joined');?>
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-primary"><?php echo lang('system');?></span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" class="btn btn-primary btn-sm edit_modal" data-id="6"><?php echo lang('update');?></a>
                                   </div>
                      
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                   <?php echo lang('roles_created');?>
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-primary"><?php echo lang('system');?></span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" class="btn btn-primary btn-sm edit_modal" data-id="7"><?php echo lang('update');?></a>
                                   </div>
                             
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                    <?php echo lang('roles_updated');?>
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-primary"><?php echo lang('system');?></span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" data-id="8" class="btn btn-primary btn-sm edit_modal"><?php echo lang('update');?></a>
                                   </div>
                            
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                   <?php echo lang('roles_deleted');?>
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-primary"><?php echo lang('system');?></span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" data-id="9" class="btn btn-primary btn-sm edit_modal"><?php echo lang('update');?></a>
                                   </div>
                         
                            </div>
                            <hr>
              </div>


       </div>



</div>

<!-- Insert Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
       <div class="modal-dialog" role="document">
              <div class="modal-content">
                     <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Template: User joined</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                            </button>
                     </div>
                     <form action="<?php echo base_url() ?>tax_insert" method="POST" id="tax_insert">

                            <div class="modal-body ">
                                   <label for="category_name">Notification channel</label>
                                   <div class="form-group p-4 bg-light">
                                          <select class="form-control order">
                                                 <option>orange</option>
                                                 <option>white</option>
                                                 <option>purple</option>
                                          </select>
                                   </div><br>
                                   <div class="form-group">
                                          <label for="Notification audiences">Notification audiences</label>
                                          <label for="Roles">Roles</label>
                                          <div class="form-group p-4 bg-light">

                                          </div><br>
                                          <label for="category_name">Users</label>
                                          <div class="form-group p-4 bg-light">
                                          </div>
                                   </div>
                            </div>
                            <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                                   <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                     </form>
              </div>
       </div>
</div>

<!-- editmodel -->
<!-- Insert Modal -->
<div class="modal fade" id="my_editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
       <div class="modal-dialog" role="document">
              <div class="modal-content">
                     <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
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
       //modal show-------
       $('.roles_delete').click(function() {
              $('#insertModal').modal('show');
       })

       $(document).ready(function() {
              $('.edit_modal').click(function(e) {
                     e.preventDefault();
                     $('#my_editModal').modal('show');
                     let id = $(this).attr('data-id');
                     if(id==1){
                            $('.modal-title').empty();
                          $('.modal-title').append('<?php echo lang('user_invitation1');?>');  
                     }
                     else if(id==2){
                            $('.modal-title').empty();
                            $('.modal-title').append('<?php echo lang('password_reset1');?>');     
                     }
                     else if(id==3){
                            $('.modal-title').empty();
                            $('.modal-title').append('<?php echo lang('client_credential1');?>');     
                     }
                     else if(id==4){
                            $('.modal-title').empty();
                            $('.modal-title').append('<?php echo lang('invoice_sending_attachment1');?>');     
                     }
                     else if(id==5){
                            $('.modal-title').empty();
                            $('.modal-title').append('<?php echo lang('invoice_payment_reminder1');?>');     
                     }
                     else if(id==6){
                            $('.modal-title').empty();
                            $('.modal-title').append('<?php echo lang('user_joined1');?>');     
                     }
                     else if(id==7){
                            $('.modal-title').empty();
                            $('.modal-title').append('<?php echo lang('roles_created1');?>');     
                     }
                     else if(id==8){
                            $('.modal-title').empty();
                            $('.modal-title').append('<?php echo lang('roles_updated1');?>');     
                     }
                     else if(id==9){
                            $('.modal-title').empty();
                            $('.modal-title').append('<?php echo lang('roles_deleted1');?>');     
                     }
                     $.ajax({
                            url: '<?php echo base_url() ?>notification_edit',
                            data: {
                                   id: id
                            },
                            success: function(data) {

                                   $('#modal_body').html(data);

                            }
                     });
              });
       });
</script>

<script>


</script>