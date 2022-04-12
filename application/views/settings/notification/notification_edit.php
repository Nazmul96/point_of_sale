<style>
    li.nshift {
      list-style: none;
      display: inline;
      padding: 20px 20px;
      border: 2px transparent;
      cursor: pointer;
    }

    li.nshift.active {
      border-bottom: solid blue;
    }
  </style>

  <!-- for system-->
  <?php if ($notification_edit->id > 5) { ?>
    <div class="element">
      <form action="<?php echo base_url() ?>notification_update" method="POST" id="notification_update">
        <input type="hidden" name="id" id="add_system" value="<?php echo $notification_edit->id ?>">
        <div class="modal-body">
          <ul class="new_class">

            <li class="nshift active nshift1" attr=""><i class="far fa-bell"></i></i> <?php echo lang('system');?></li>
            <li class="nshift nshift2 " attr=""><i class="far fa-envelope"></i> <?php echo lang('mail');?></li>


          </ul>
          <br>
          <div class="form-group">
            <label for="category_name"><?php echo lang('content');?></label>
            <input type="text" class="form-control add_contents" name="system_content" value="<?php echo $notification_edit->system_content ?>">
          </div>
          <br>
          <div class="form-group">
            <?php
            $val = $notification_edit->system_tags;
            $str_arr = explode(",", $val);
            ?>

            <?php foreach ($str_arr as $key => $value) { ?>
              <a href="#" class="mb-5 btn btn-primary btn-sm add_item">{<?php echo $value ?>}</a>
            <?php } ?>

          </div>
        </diV>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('Cancel');?></button>
          <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
        </div>
      </form>
    </div>
    <div class="element1">
      <form action="<?php echo base_url() ?>notification_update" method="POST" id="notification_emailupdate">
        <input type="hidden" name="id" id="add_system" value="<?php echo $notification_edit->id ?>">
        <div class="modal-body">
          <ul class="new_class">
            <li class="nshift nshift1" attr=""><i class="far fa-bell"></i></i> <?php echo lang('system');?></li>
            <li class="nshift active nshift2 " attr=""><i class="far fa-envelope"></i> <?php echo lang('mail');?></li>
          </ul>
          <br>

          <div class="element1">
            <div class="form-group">
              <label for="category_name"><?php echo lang('mail_subject');?></label>
              <small><?php echo lang('small_tag');?></small>
              <input type="text" class="form-control" name="mail_subject" value="<?php echo $notification_edit->mail_subject ?>">
            </div>
            <br>
            <div class="form-group">
              <label for="category_name"><?php echo lang('content');?></label>
              <textarea class="form-control textarea" name="content">
          <?php echo $notification_edit->mail_body ?>
         </textarea>
            </div><br>
            <div class="form-group">
              <?php
              $val = $notification_edit->tags;
              $str_arr = explode(",", $val);
              ?>

              <?php foreach ($str_arr as $key => $value) { ?>
                <a href="#" class="mb-5 btn btn-primary btn-sm add_action">{<?php echo $value ?>}</a>
              <?php } ?>


            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('Cancel');?></button>
          <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
        </div>
      </form>
    </div>
  <?php } else { ?>
    <!------ for mail ------->
    <form action="<?php echo base_url() ?>notification_update" method="POST" id="notification_update">
      <input type="hidden" name="id" id="add_system" value="<?php echo $notification_edit->id ?>">
      <div class="modal-body">
        <ul class="new_class">


          <li class="nshift active" attr="">
            <i class="far fa-envelope"></i> <?php echo lang('mail');?>
          </li>
        </ul>
        <br>
        <div class="form-group">
          <label for="category_name"><?php echo lang('mail_subject');?></label>
          <small><?php echo lang('small_tag');?></small>
          <input type="text" class="form-control" name="mail_subject" value="<?php echo $notification_edit->mail_subject ?>">
        </div>
        <br>
        <div class="form-group">
          <label for="category_name"><?php echo lang('content');?></label>
          <textarea class="form-control textarea" name="content">
          <?php echo $notification_edit->mail_body ?>
      </textarea>
        </div><br>
        <div class="form-group">
          <?php
          $val = $notification_edit->tags;
          $str_arr = explode(",", $val);
          ?>

          <?php foreach ($str_arr as $key => $value) { ?>
            <a href="#" class="mb-5 btn btn-primary btn-sm add_action">{<?php echo $value ?>}</a>
          <?php } ?>


        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('Cancel');?></button>
        <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
      </div>
    </form>
  <?php } ?>

  <script>
    $('.textarea').summernote()
  </script>
  <script>

    $(document).ready(function() {
      //for update-----   
      $('#notification_update').submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var request = $(this).serialize();
        $.ajax({
          url: url,
          method: 'POST',
          data: request,
          async: false,
          dataType: 'JSON',
          success: function(data) {
            $('#notification_update')[0].reset();
            $('#my_editModal').modal('hide');
          }
        });
      });
      //for mail update-----   
      $('#notification_emailupdate').submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var request = $(this).serialize();
        $.ajax({
          url: url,
          method: 'POST',
          data: request,
          async: false,
          dataType: 'JSON',
          success: function(data) {
            $('#notification_update')[0].reset();
            $('#my_editModal').modal('hide');
          }
        });
      });

      //for adding action-----
      $('.add_action').click(function(e) {
        var a = $(this).text();
        if (a == '{app_logo}') {
          $('.textarea').summernote('pasteHTML', '<img src="#" alt="app_logo" height="50px" style="border:1px solid black;">');
        } else {
          $('.textarea').summernote('editor.insertText', a);
        }

      });

    });
    //for alerm and mail tabs-------
    $('.element1').hide();

    $('.nshift1').on('click', function(e) { //system---
      e.preventDefault();

      $('.element').show();
      $('.element1').hide();
    });

    $('.nshift2').on('click', function(e) { //mail----
      e.preventDefault();
      $('.element1').show();
      $('.element').hide();

    });

        //apend system input field-----
        $('.add_item').click(function(e) {
          e.preventDefault();
         var valuee=$(this).text();
          var input = $(".add_contents");
          input.val(input.val() + valuee);
      
    })
  
  </script>

