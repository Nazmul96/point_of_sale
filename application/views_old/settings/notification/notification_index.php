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

       <div class="row ml-2">
              <div class="">
                     <ul class="nav nav-tabs text-center">
                            <li class="nav-item">
                                   <a href="<?php echo base_url(); ?>setting_index" class="text-capitalize nav-link ">
                                          <i class="zmdi zmdi-settings h2"></i><br>
                                          <span>General</span>
                                   </a>
                            </li>
                            <li class="nav-item">
                                   <a href="<?php echo base_url() ?>email_setup" class="text-capitalize nav-link ">
                                          <i class="zmdi zmdi-email h2"></i><br>
                                          <span>Email Setup</span>
                                   </a>
                            </li>
                            <li class="nav-item">
                                   <a href="<?php echo base_url() ?>payment_method" class="text-capitalize nav-link">
                                          <i class="zmdi zmdi-card h2"></i><br>
                                          <span>Payment Methods</span>
                                   </a>
                            </li>
                            <li class="nav-item">
                                   <a href="<?php echo base_url() ?>notification_index" class="text-capitalize nav-link active">
                                          <i class="zmdi zmdi-notifications-none h2"></i><br>
                                          <span>Notification</span>
                                   </a>
                            </li>
                            <li class="nav-item">
                                   <a href="<?php echo base_url() ?>invoice_setting" class="text-capitalize nav-link">
                                          <i class="zmdi zmdi-file-text h2"></i><br>
                                          <span>Invoice</span>
                                   </a>
                            </li>
                            <li class="nav-item">
                                   <a href="<?php echo base_url() ?>tax_setting" class="text-capitalize nav-link">
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
                     <br>
              </div>
             

              <div class="col-md-9 bg-light ml-4">
                     
                       <div class="row">
                             <div class="col-md-12   mt-4">
                                <h5>Payment Methods</h5>
                             </div> 
                       </div>
                       <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                          <b>Event name</b>
                                   </div>
                                   <div class="col-md-3">
                                          <b>Event Channel</b>
                                   </div>
                                   <div class="col-md-3">
                                          <b>Templates</b>
                                   </div>
                                   <div class="col-md-2">
                                          <b>Action</b>
                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                          user invitation
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-success">Mail</span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" data-id="1" class="btn btn-primary btn-sm edit_modal">Update</a>
                                   </div>
                                   <div class="col-md-2">

                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                          Password reset
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-success">Mail</span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" data-id="2" class="btn btn-primary btn-sm edit_modal">Update</a>
                                   </div>
                                   <div class="col-md-2">

                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                          Client credential
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-success">Mail</span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" class="btn btn-primary btn-sm edit_modal" data-id="3">Update</a>
                                   </div>
                                   <div class="col-md-2">

                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                          Invoice sending attachment
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-success">Mail</span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" class="btn btn-primary btn-sm edit_modal" data-id="4">Update</a>
                                   </div>
                                   <div class="col-md-2">

                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                          Invoice payment reminder
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-success">Mail</span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" class="btn btn-primary btn-sm edit_modal" data-id="5">Update</a>
                                   </div>
                                   <div class="col-md-2">

                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                          User joined
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-primary">System</span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" class="btn btn-primary btn-sm edit_modal" data-id="6">Update</a>
                                   </div>
                                   <div class="col-md-2">
                                          <span>
                                                 <div role="group" aria-label="Default action" class="btn-group btn-group-action roles_delete"><button type="button" data-toggle="tooltip" data-placement="top" title="" class="btn" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                                                      <circle cx="12" cy="12" r="3"></circle>
                                                                      <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                                               </svg></button></div>
                                          </span>
                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                          Roles created
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-primary">System</span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" class="btn btn-primary btn-sm edit_modal" data-id="7">Update</a>
                                   </div>
                                   <div class="col-md-2">
                                          <span>
                                                 <div role="group" aria-label="Default action" class="btn-group btn-group-action roles_delete"><button type="button" data-toggle="tooltip" data-placement="top" title="" class="btn" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                                                      <circle cx="12" cy="12" r="3"></circle>
                                                                      <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                                               </svg></button></div>
                                          </span>
                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                          Roles updated
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-primary">System</span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" data-id="8" class="btn btn-primary btn-sm edit_modal">Update</a>
                                   </div>
                                   <div class="col-md-2">
                                          <span>
                                                 <div role="group" aria-label="Default action" class="btn-group btn-group-action roles_delete"><button type="button" data-toggle="tooltip" data-placement="top" title="" class="btn" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                                                      <circle cx="12" cy="12" r="3"></circle>
                                                                      <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                                               </svg></button></div>
                                          </span>
                                   </div>
                            </div>
                            <hr>
                            <div class="row">
                                   <div class="col-md-4">
                                          Password reset
                                   </div>
                                   <div class="col-md-3">
                                          <span class="badge badge-primary">System</span>
                                   </div>
                                   <div class="col-md-3">
                                          <a href="#" data-id="9" class="btn btn-primary btn-sm edit_modal">Update</a>
                                   </div>
                                   <div class="col-md-2">
                                          <span>
                                                 <div role="group" aria-label="Default action" class="btn-group btn-group-action roles_delete"><button type="button" data-toggle="tooltip" data-placement="top" title="" class="btn" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                                                      <circle cx="12" cy="12" r="3"></circle>
                                                                      <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                                               </svg></button></div>
                                          </span>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Template: Roles deleted</h5>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Template: Roles deleted</h5>
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
                     $('#my_editModal').modal('show');
                     e.preventDefault();
                     let id = $(this).attr('data-id');
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