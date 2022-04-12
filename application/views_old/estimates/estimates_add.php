<div class="content-body"> 
  <!-- Page Headings Start -->
  <div class="row justify-content-between align-items-center mb-10"> 
    <!-- Page Heading Start -->
    <div class="col-12 col-lg-auto mb-20">
      <div class="page-heading">
          <h3>Add New User</h3>
      </div>
    </div><!-- Page Heading End --> 
  </div> 
  
  <div class="box">
    <div class="box-body"> 
      <div class="add-edit-product-wrap col-12">       
        <form action="#" method="POST">
          <div class="row"> 
            <div class="col-md-6">
              <div class="form-group">
                <label>Customers *</label>
                <select class="form-control">
                  <option value="1">Mr Admin</option>  
                  <option value="2">Moderator</option>
                  <option value="3">Customer</option>
                  <option value="4">Kylee Kautzer</option>
                  <option value="5">Destinee Lindgren</option>
                  <option value="6">Dr. Kayden Quigley</option>
                  <option value="7">Sven Stamm</option>
                  <option value="8">Ms. Robyn Dicki</option>
                  <option value="9">Richie Corwin</option>
                  <option value="10">Brennon Kuhn</option>
                  <option value="11">Earline Rodriguez</option>  
                  <option value="12">Clementina Heathcote</option>
                </select>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label>  Date * </label>
                <input type="date" class="form-control" name="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label> Due Date * </label>
                <input type="date" class="form-control" name="">
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label> Reference no </label>
                <input type="text" class="form-control" name="">
              </div>
            </div>
            <div class="col-md-12 ">
              <div class="table-responsive">
                <table class="table" id="estimates_product_table"> 
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Amount</th> 
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="form-group"> 
                          <select name="item" class="form-control">
                            <option value="0">Please Select</option>
                            <option value="1">Mobile</option>
                          </select>
                        </div>
                      </td>
                      <td width="100">
                        <div class="form-group"> 
                          <input type="number" class="form-control" name="" value="1">
                        </div>
                      </td>
                      <td width="150">
                        <div class="form-group"> 
                          <input type="text" class="form-control" name="" value="$0,00">
                        </div>
                      </td>
                      <td width="150">
                        <input type="text" class="form-control"  name="" value="$0,00">
                      </td>
                      <td width="50"> 
                        <button type="button" class="btn btn-sm btn-danger del_tr"><i class="zmdi zmdi-delete"></i></button> 
                      </td> 
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="text-center mt-4">
                <button type="button" class="btn btn-outline-primary" id="more_estimates_product">
                  <i class="zmdi zmdi-plus"></i> Add Product
                </button>
              </div> 
            </div>
            <div class="col-md-6 offset-md-6 mt-4"> 
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-6 col-form-label">Subtotal</label>
                    <div class="col-sm-6">
                        <span class="form-control-plaintext totalSubtotal font-weight-bold">0.00</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-6 col-form-label">Discount</label>
                    <div class="col-sm-6">
                        <input type="number" value="0" min="0" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Delivery Charge</label>
                    <div class="col-sm-6">
                        <input type="number" value="0" min="0" class="form-control">
                    </div>
                </div>
                <div id="taxItems">
                    <hr>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Tax</label>
                    <div class="col-sm-6">
                        <input type="number" value="0" min="0" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-6 col-form-label"><b> Total Amount</b></label>
                    <div class="col-sm-6">
                        <span class="form-control-plaintext" id="totalAmount"><b>0.00</b></span>
                    </div>
                </div> 
              </div> 
            <div class="col-md-12 mt-4 text-center">
              <button class="btn btn-primary" type="submit"> 
                 Save Estimate
              </button>
            </div>



          </div>
        </form>
      </div> 
    </div> 
  </div>  
</div> 


<script type="text/javascript">
  $('#more_estimates_product').click(function(){ 
    $('#estimates_product_table tbody').append('<tr><td> <div class="form-group">  <select name="item" class="form-control"> <option value="0">Please Select</option> <option value="1">Mobile</option> </select> </div> </td> <td width="100"> <div class="form-group">  <input type="number" class="form-control" name="" value="1"> </div> </td> <td width="150">  <div class="form-group">  <input type="text" class="form-control" name="" value="$0,00"> </div>  </td> <td width="150"> <input type="text" class="form-control"  name="" value="$0,00"> </td>  <td width="50"> <button type="button" class="btn btn-sm btn-danger del_tr"><i class="zmdi zmdi-delete"></i></button> </td> </tr>');
  })
  $( "#estimates_product_table tbody" ).on( "click", ".del_tr", function() { 
    $(this).closest('tr').remove();
  });
</script>