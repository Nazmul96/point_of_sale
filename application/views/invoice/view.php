<?php

//for invoice logo-------
$this->db->where('group_name','Invoice');
$invoice_logo=$this->db->get('settings')->result();

//for dollar sign-------
$this->db->where('group_name','General');
$dollar=$this->db->get('settings')->result();

$invoicejel = json_decode($invoice_edit->products);

?>
<?php
   $products=array();
   foreach ($invoicejel as $key=>$invoice_product):
          $this->db->select('products.name');          
          $this->db->where('id',$invoice_product->products_id);
          $products[$key]=$this->db->get('products')->row();       
   endforeach;
   
?>

<div class="content-body">

          <!-- Page Headings Start -->
          <div class="row justify-content-between align-items-center mb-10">

              <!-- Page Heading Start -->
              <div class="col-12 col-lg-auto mb-20">
                  <div class="page-heading">
                      <h3><?php echo lang('invoice_details');?></h3>
                  </div>
              </div><!-- Page Heading End -->

               

          </div>
          <div class="row">
            <div class="col-12 col-md-3 col-sm-4">
                
                  <button class="btn btn-block btn-lg btn-secondary mb-2 mr-2 edit" data-id="<?php echo $invoice_edit->id ?>" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i> <?php echo lang('Edit');?></button>
                  <a class="btn btn-block  btn-lg btn-primary mb-2 mr-2" href="<?php echo base_url();?>download_invoice/<?php echo $invoice_edit->id?>"><i class="fas fa-download"></i> <?php echo lang('Download');?></a>
                  <button class="btn  btn-lg btn-block btn-success mb-2" data-toggle="modal" data-target="#categoryModal"><i class="far fa-paper-plane"></i> <?php echo lang('send');?></button>
                
            </div>
            <div class="col-12 col-md-9 col-sm-8">
                 <div class="container bg-light" >
              <div class="row">
                  <div class="col-md-6 mt-4">
                  

                  <img src="<?php echo base_url('images/invoice/' .$invoice_logo[0]->settings_value) ?>" alt="" id="company_logo" height="80px" width="80px">           
                  
                  </div>
                  <div class="col-md-6 mt-4">
                        <div class="div float-end mr-4">
                        <b><?php echo lang('invoice_no');?>: <?php echo $invoice_edit->invoice_number?></b><br>
                        <?php echo lang('Date');?>: <?php echo $invoice_edit->date?><br>
                        <?php echo lang('due_date');?>: <?php echo $invoice_edit->due_date?>
                        </div>
                  
                  </div>
              </div> 
              <hr>   
              <div class="row">
                        <div class="col-md-6">
                                  <p><?php echo lang('to');?></p>
                                  <h5><?php echo $clients->client_name; ?></h5>
                        </div>
                        <div class="col-md-6">
                                  <p><?php echo lang('form');?></p>
                                  <h5>Nazmul Hossain</h5>
                        </div>
                        <hr>
              </div>

              <div class="row">
                        <div class="col-md-4 bg-dark text-white p-2">
                                  <p><?php echo lang('product');?></p>
                        </div>
                        <div class="col-md-2 bg-dark text-white p-2">
                                  <p><?php echo lang('quantity');?></p>
                        </div>
                        <div class="col-md-2 bg-dark text-white p-2">
                                  <p><?php echo lang('price');?></p>
                        </div>
                        <div class="col-md-2 bg-dark text-white p-2">
                                  <p><?php echo lang('tax');?></p>
                        </div>
                        <div class="col-md-2 bg-dark text-white p-2">
                                  <p><?php echo lang('amount');?></p>
                        </div>
              </div>
              <br>
              <?php foreach ($invoicejel as $key=>$invoice_product): ?>
              <div class="row">
                        <div class="col-md-4">
                        <p><?php echo $products[$key]->name;?></p>
                        </div>
                        <div class="col-md-2">
                        <p><?php echo $invoice_product->quantity;?></p>
                        </div>
                        <div class="col-md-2"> 
                        <p>
                        <?php rs_currency($invoice_product->price)?> 
                        </p>

                        </div>
                        <div class="col-md-2">
                        N/A
                        </div>
                        <div class="col-md-2">                   
                        <p>
                        <?php rs_currency($invoice_product->amount)?>      
                        </p>
                        </div>
              </div>
              <br>
              <?php endforeach; ?>
              
            <div class="row">
               <div class="col-sm-5"> </div>
               <div class="col-sm-6">
                <div style="width:100%;">
                 
                  <div class="text-size-16 border-bottom mb-2">
                    <div class="d-flex align-items-center justify-content-between py-2">
                      <p class="text-muted mb-0"><?php echo lang('sub_total');?></p>
                      <p>
                      <?php if($invoice_edit->sub_total) {?>
                        <?php rs_currency($invoice_edit->sub_total)?> 
                        <?php } else {?>
                          <?php rs_currency(0)?>
                        <?php } ?>  
                        
                      </p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between py-2">
                      <p class="text-muted mb-0"><?php echo lang('tax');?></p>
                      <p>
                       <?php rs_currency(0)?>             
                      </p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between py-2">
                      <p class="text-muted mb-0"><?php echo lang('discount');?></p> 
                      <p>
                        <?php if($invoice_edit->formdata_discount) {?>
                        <?php rs_currency($invoice_edit->formdata_discount)?>
                        <?php } else {?>
                          <?php rs_currency(0)?>
                        <?php } ?>         
                      </p>
                    </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <p class="text-muted mb-0"><?php echo lang('total');?></p>
                    <p>               
                     <?php if($invoice_edit->total) {?>
                        <?php rs_currency($invoice_edit->total)?>
                        <?php } else {?>
                          <?php rs_currency(0)?>
                        <?php } ?>  
                    </p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between py-2">
                      <p class="text-muted mb-0"><?php echo lang('paid');?></p> 
                      <p>
                      <?php if($invoice_edit->received_amount) {?>
                        <?php rs_currency($invoice_edit->received_amount)?>
                        <?php } else {?>
                          <?php rs_currency(0)?>
                        <?php } ?>      
                      </p>
                    </div>
                 
                  <div class="d-flex align-items-center justify-content-between py-2">
                    <p class="text-muted mb-0"><?php echo lang('due_amount');?></p>
                    <h4 class="mb-0 due_amount">
                    
                    <?php if($invoice_edit->due_amount) {?>
                      <?php rs_currency($invoice_edit->due_amount)?>
                        <?php } else {?>
                          <?php rs_currency(0)?>
                        <?php } ?>        
                  </h4>
                  </div>
        
                 </div>
                </div>
              </div>
            </div>

          </div>
            </div>
          </div>
       

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="margin-top:5%; margin-left:3%;">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div id="modal_body">

       </div>               
    </div>
  </div>
</div>

<script>
  $('.edit').click(function(e){ 
  e.preventDefault();

   let invoice_id=$(this).attr('data-id');

  $.get("edit_invoices/"+invoice_id,function(data){
      
      //$('#modal_body').html(data)
      
  });
});
</script>