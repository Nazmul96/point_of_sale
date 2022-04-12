
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
  <div class=""> 
      <ul class="nav nav-tabs text-center">
          <li class="nav-item">
            <a href="<?php echo base_url();?>setting_index" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-settings h2"></i><br>
              <span>General</span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>email_setup" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-email h2"></i><br>
              <span>Email Setup</span> 
            </a> 
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>payment_method" class="text-capitalize nav-link ">
             <i class="zmdi zmdi-card h2"></i><br>
             <span>Payment Methods</span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>notification_index" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-notifications-none h2"></i><br>
              <span>Notification</span> 
            </a> 
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>invoice_setting" class="text-capitalize nav-link ">
              <i class="zmdi zmdi-file-text h2"></i><br>
              <span>Invoice</span> 
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>tax_setting" class="text-capitalize nav-link active">
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
    </div> 
     <button class="btn btn-primary mb-4 fixed_button" id="add_tax"> <i class="zmdi zmdi-plus"></i> </button>   
    <div class="box"> 
        <div class="box-body">
                 <div class="row">
                           <div class="col-md-4 mt-4">
                              <h5>Tax</h5>
                           </div>
                           <div class="col-md-6">
                                     
                           </div>
                            
                 </div>
                 <hr>

                 <table id="example1" class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                <th>Name</th>
                <th>Value</th>
                <th>Default</th>
                <th class="text-right p-2">Actions</th>                    
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
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Category</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url()?>tax_insert" method="POST" id="tax_insert">
     
      <div class="modal-body">          
          <div class="form-group">
            <label for="category_name">Tax name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
            <span id="tax_name" class="text-danger"></span> 
          </div>
          <br>
          <div class="form-group">
            <label for="category_name">Tax value</label>
            <input type="number" class="form-control" name="value" placeholder="Value">
            <span id="tax_value" class="text-danger"></span> 
          </div>
          <br>
          <div class="form-group"><label for="category_name">Is default</label><input type="radio"  name="is_default" value="yes">Yes <input type="radio" name="is_default" value="no">No</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Tax</h5>
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
                            '<a href="#" class="btn btn-danger btn-sm tax_delete"" data_id="' + data[i].id + '"><i class="fas fa-trash"></i></a>' +
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
           $('#tax_insert').submit(function(e){
                    // alert('hi');
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