<div class="content-body"> 
  <!-- Page Headings Start -->
  <div class="row justify-content-between align-items-center mb-10"> 
    <!-- Page Heading Start -->
    <div class="col-12 col-lg-auto mb-20">
      <div class="page-heading">
          <h3>Estimates List</h3>
      </div>
    </div><!-- Page Heading End --> 
  </div>  
  <a href="<?php echo base_url()?>estimates_add" class="fixed_button btn btn-primary mb-4"><i class="zmdi zmdi-file-plus"></i></a>
  <div class="box">
    <div class="box-body"> 
      <div class="  py-primary">       
        <table id="example1" class="table table-bordered  data-table data-table-default  ">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Date</th>
              <th>Payment Status</th>
              <th>Paid Amount</th>
              <th>Due Amount</th>
              <th>Total Amount</th>
              <th>Action</th>                  
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td>1</td>
                  <td>Moderator</td>
                  <td>26 May 2021</td>
                  <td>Unpaid</td>
                  <td>$0.00</td>
                  <td>$7,375.00</td>
                  <td>$7,375.00</td>
                  <td>
                    <div class="dropdown options-dropdown d-inline-block">
                         <button type="button" data-toggle="dropdown" title="Actions" class="btn-option btn" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i></button>
                         <div class="dropdown-menu dropdown-menu-right py-2 mt-1">
                               <a href="<?php echo base_url();?>download_invoice/<?php echo $row->invoice_number?>" class="dropdown-item px-4 py-2">
                                          Download</a>
                                <a href="<?php echo base_url();?>view_Invoices/<?php echo $row->invoice_number?>" class="dropdown-item px-4 py-2">
                                          View</a>
                                <a href="#" class="dropdown-item px-4 py-2 add_payment" data-id="<?php echo $row->invoice_number?>" data-toggle="modal" data-target="#add_payment">
                                Add Payment</a>
                                <a href="#" class="dropdown-item px-4 py-2 edit" data-id="<?php echo $row->id ?>" data-toggle="modal" data-target="#editModal">
                                          Edit
                                </a><a href="<?php echo base_url();?>delete_Invoices/<?php echo $row->id?>" class="dropdown-item px-4 py-2" id="delete">
                                          Delete
                                </a>
                              </div>
                            </div>
                  </td>
              </tr> 
          </tbody>
        </table>  
      </div> 
    </div> 
  </div>  
</div> 