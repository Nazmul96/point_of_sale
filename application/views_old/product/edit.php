<form action="<?php echo base_url() ?>product_update/<?php echo $result->id ?>" method="POST" enctype="multipart/form-data" id="product_update">

  <div class="modal-body">


       <div class="form-group d-flex flex-column align-items-center mb-4">
        <div class="card" style="width:100%; max-width: 300px; position: relative;">
        <div class="card-body">
          <input class="form-control--uploader d-none" name="image" type="file" id="image-token" accept="image/*" onchange="sloadFile(event)">
          <label for="image-token" class="remix-icon ri-upload-cloud-fill color-white upload-inner" title="Upload photo"> <span> <?php echo lang('Upload photo')?></span></label>
          <img id="soutput" src="<?php echo base_url('images/' . $result->image) ?>" class="img-fluid" />
          <small class="text-muted"><?php echo lang('image_size')?></small>
        </div>
        <input type="hidden" value="<?= $result->image; ?>" name="old_image">
      </diV>
     </div>
      <br>
      <div class="form-group">
        <label for="category_name"><?php echo lang('Name')?>*</label>
        <input type="text" class="form-control" name="product_name" value="<?php echo $result->name ?>" placeholder="name">
        <span id="product_name1" class="text-danger"></span>
      </div>
      <br>
      <div class="form-group">
        <label for="category_name"><?php echo lang('Code')?>*</label>
        <input type="hidden" name="old_code" value="<?php echo $result->code ?>">
        <input type="text" class="form-control" name="code" value="<?php echo $result->code ?>" placeholder="code">
        <span id="product_code1" class="text-danger"></span>
      </div>
      <br>
      <div class="row">
        <div class="col-md-10">
          <div class="form-group">
            <label for="category_name"><?php echo lang('Category')?>*</label>
            <select name="category_id" id="" class="form-control">
              <?php foreach ($category as $row) : ?>
                <option value="<?php echo $row->id ?>" <?php if ($row->id == $result->category_id) echo "selected"; ?>><?php echo $row->category_name ?></option>
              <?php endforeach; ?>
            </select>
            <span id="" class="text-danger"></span>
          </div>
        </div>
      </div>
      <br>
      <div class="form-group">
        <label for="category_name"><?php echo lang('Unit Price')?>*</label>
        <input type="text" class="form-control" name="unit_price" value="<?php echo $result->price ?>" placeholder="unit price">
        <span id="unit_price1" class="text-danger"></span>
      </div>
      <br>
      <div class="form-group">
        <label for="category_name"><?php echo lang('Descrption')?></label>
        <textarea class="form-control textarea" id="description" name="description"><?php echo $result->description ?></textarea>
      </div>

    </div>


    <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo lang('Cancel')?></button>
    <button type="submit" class="btn btn-primary"><?php echo lang('Submit')?></button>
    </div>
</form>

<script>
  // window.addEventListener('load', function() {
  //         //for logo -----          

  //         document.querySelector('.image2').addEventListener('change', function() { 
  //         if (this.files && this.files[0]) {
  //                   var img = document.querySelector('#edit_product_image');        
  //                   img.src = URL.createObjectURL(this.files[0]); // set src to blob url

  //         }
  //         });

  //     });

  $('#soutput').on('click', function() {
                  $('#image-token').trigger('click');
                 // $('#image_update').trigger('submit');
  });

  var sloadFile = function(event) {
    var doutput = document.getElementById('soutput');
    doutput.src = URL.createObjectURL(event.target.files[0]);
    doutput.onload = function() {
      URL.revokeObjectURL(doutput.src) // free memory
    }
  };


  $(document).ready(function() {
    /*Summernote*/
    if ($('.textarea').length) {
      $('.textarea').summernote({
        height: 250,
      });
    }
    //product_insert------
    $('#product_update').submit(function(e) {
      e.preventDefault();
      var url = $(this).attr('action');
      var element = new FormData(document.getElementById("product_update"));
      $.ajax({
        url: url,
        method: 'POST',
        data: element,
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        dataType: 'JSON',
        success: function(data) {

          if (data.error) {

            if (data.product_name != '') {

              $('#product_name1').html(data.product_name);
            } else {
              $('#product_name1').html('');
            }
            if (data.product_code != '') {
              //console.log('hi');        
              $('#product_code1').html(data.product_code);
            } else {
              $('#product_code1').html('');
            }
            if (data.unit_price != '') {
              $('#unit_price1').html(data.unit_price);
            } else {
              $('#unit_price1').html('');
            }

          } else {

            $('#product_name1').html('');
            $('#product_code1').html('');
            $('#unit_price1').html('');


            $('#product_update')[0].reset();
            $('#product_add').hide();
            $('#product_list').show();
            window.location.reload();

          }




        }
      });


    });

    //category-insert-----
    $('#category_insert').click(function(e) {
      e.preventDefault();
      $('#categoryModal').modal('show');
      $('#category_submit').submit(function(e) {
        e.preventDefault();
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

            }




          }
        });


      });

    });

  });
</script>