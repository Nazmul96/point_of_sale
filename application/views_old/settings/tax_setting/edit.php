<input type="hidden" class="update" value="<?php echo $tax_stting_edit->id?>">
<form action="<?php echo base_url()?>tax_update" method="POST" id="tax_update">
     
      <div class="modal-body">          
          <div class="form-group">
            <label for="category_name">Tax name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $tax_stting_edit->tax_name?>">
            <span id="tax_name1" class="text-danger"></span> 
          </div>
          <br>
          <div class="form-group">
            <label for="category_name">Tax value</label>
            <input type="number" class="form-control" name="value" placeholder="Value" value="<?php echo $tax_stting_edit->tax_value?>">
            <span id="tax_value1" class="text-danger"></span> 
          </div>
          <br>
          <div class="form-group"><label for="category_name">Is default</label>
          <?php if($tax_stting_edit->is_default=='yes'){?>
                    <input type="radio"  name="is_default" value="yes" checked>Yes
                    <input type="radio" name="is_default" value="no">No</div> 
          <?php } else {?>
                    <input type="radio"  name="is_default" value="yes">Yes          
                    <input type="radio" name="is_default" value="no" checked>No</div>
          <?php } ?>          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>


<script>
          //payment edit------payment_update
          $( document ).ready(function() {
          $('#tax_update').submit(function(e){
          e.preventDefault();     
          let id=$('.update').val();
          var url = $(this).attr('action');
          var request =$(this).serialize()+'&id='+id;
          $.ajax({
          url:url,
          method:'POST',
          data: request,
          async:false,
          dataType: 'JSON',
          success: function(data){

                    if (data.error) {
                              if (data.name != '') {
                              $('#tax_name1').html(data.name);  
                              }else {
                              $('#tax_name1').html('');
                              }
                              if (data.value != '') {
                              $('#tax_value1').html(data.value);  
                              }else {
                              $('#tax_value1').html('');
                              }
         
                       } 
                       else{
                          console.log('hi');    
                          $('#tax_name1').html('');
                          $('#tax_value1').html('');
                          
                          $('#tax_update')[0].reset();
                          $('#editModal').modal('hide');       
                          showAll_tax_setting();  
                    }     

          }

          });

});
});

</script>
