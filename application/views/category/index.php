<div class="content-body">

  <!-- Page Headings Start -->
  <div class="row justify-content-between align-items-center mb-10">

    <!-- Page Heading Start -->
    <div class="col-12 col-lg-auto mb-20">
      <div class="page-heading">
        <h3><?php echo lang('categories') ?></h3>
      </div>
    </div><!-- Page Heading End -->

    <!-- Page Button Group Start -->
    <div class="col-12 col-lg-auto mb-20">
      <div class="page-date-range">
        <a class="btn btn-primary mb-4 mr-3" href="<?php echo base_url() ?>product_index"><i class="fa fa-list"></i><?php echo lang('back_to_products') ?></a>

      </div>
    </div><!-- Page Button Group End -->

  </div>

  <button class="btn btn-primary mb-4 fixed_button" id="category_insert"> <i class=" zmdi zmdi-plus"></i> </button>
  <?php
  $message = $this->session->userdata('message');
  if ($message) {
    echo " <div class='alert alert-success'>$message</div>";
    $this->session->unset_userdata('message');
  }
  ?>

  <div class="box">
    <div class="box-body">
      <div class="  py-primary">
        <table id="example1" class="table table-bordered  data-table data-table-default  ">
          <thead>
            <tr>
              <th><?php echo lang('Name') ?></th>
              <th class="text-right p-2"><?php echo lang('Action') ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($all_category as $row) : ?>

              <tr>
                <td><?php echo $row->category_name ?></td>


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
                      </a><a href="<?php echo base_url(); ?>delete_category/<?php echo $row->id ?>" class="dropdown-item px-4 py-2" id="delete">
                        <?php echo lang('Delete') ?>
                      </a>
                    </div>
                  </div>

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>


      </div>
    </div>
  </div>

</div>

<!-- category Insert Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top:9%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('add_new_category') ?></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url() ?>category_insert" method="POST" id="category_submit">

        <div class="modal-body">
          <div class="form-group">
            <label for="category_name"><?php echo lang('Name') ?>*</label>
            <input type="text" class="form-control" name="category_name" placeholder="<?php echo lang('Name');?>">
            <span id="category_name" class="text-danger"></span>
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


<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top:9%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('edit_category') ?></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url() ?>category_update" method="POST" id="cat_update">

        <div class="modal-body">
          <div class="form-group">
            <label for="category_name"><?php echo lang('Name') ?> *</label>
            <input type="text" class="form-control" id="category_name1" name="category_name" placeholder="<?php echo lang('Name') ?>">
            <input type="hidden" class="form-control" id="category_id1" name="category_id" placeholder="Name">
            <input type="hidden" class="form-control" id="category_name2" name="old_category">
            <span id="cat_name1" class="text-danger"></span>
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


<script type="text/javascript">
  $(document).ready(function() {
    $('.data-table-default').DataTable({
      responsive: true,
      language: {
        paginate: {
          previous: '<i class="zmdi zmdi-chevron-left"></i>',
          next: '<i class="zmdi zmdi-chevron-right"></i>'
        }
      }
    });

      //jquery validation---------------
      $('#category_submit').validate({    
            rules: {
              category_name: "required",
                   
            },
            messages: {
              category_name: "<?php echo lang('the_category_field_is_required')?>",
              }    
            
          });
    //category-insert-----
    $('#category_insert').click(function(e) {
      e.preventDefault();
      $('#categoryModal').modal('show');
      $('#category_submit').submit(function(e) {
        //e.preventDefault();
      if(!e.isDefaultPrevented()){ 
        var url = $(this).attr('action');
        var request = $(this).serialize();
        $.ajax({
          url: url,
          type: 'post',
          async: false,
          data: request,
          dataType: 'JSON',
          success: function(data) {

            if (data.error) {

              if (data.category_name != '') {

                $('#category_name').html(data.category_name);
              } else {
                $('#category_name').html('');
              }

            } else {

              $('#category_name').html('');

              $('#category_submit')[0].reset();
              $('#categoryModal').modal('hide');
              window.location.reload();

            }




          }
        });
        return false;
       }
       return false;

      });

    });

    //category_edit-------
    $('body').on('click', '.edit', function(e) {
      e.preventDefault();
      let category_id = $(this).attr('data-id');
      $('#editModal').modal('show');
      $.get("edit_category/" + category_id, function(data) {
        var abc = JSON.parse(data);
        $('#category_id1').val(abc.id);
        $('#category_name1').val(abc.category_name);
        $('#category_name2').val(abc.category_name);
      });
    });


    //category update---------
    $('#cat_update').validate({    
            rules: {
              category_name: "required",
                   
            },
            messages: {
              category_name: "<?php echo lang('the_category_field_is_required')?>",
              }    
            
          });
    $('#cat_update').submit(function(e) {
      //e.preventDefault();
     if(!e.isDefaultPrevented()){ 
      var url = $(this).attr('action');
      var request = $(this).serialize();
      $.ajax({
        url: url,
        type: 'post',
        async: false,
        data: request,
        dataType: 'JSON',
        success: function(data) {

          if (data.error) {

            if (data.category_name != '') {

              $('#cat_name1').html(data.category_name);
            } else {
              $('#cat_name1').html('');
            }

          } else {

            $('#cat_name1').html('');
            $('#cat_update')[0].reset();
            $('#editModal').modal('hide');
            window.location.reload();

          }




        }
      });
      return false;
      }
       return false;

    });

  });
</script>