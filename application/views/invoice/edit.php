<?php
$invoice_products = json_decode($invoice_edit->products);
// echo '<pre>';
  
  // print_r($invoice_products);
  // die();
  // $id= array();
  // $products_id= array();
  // $quantity= array();
  // $price= array();
  // $amount= array();

  // for($i=0; $i<count($invoicejel); $i++){
         
  //    foreach($invoicejel[$i] as $key => $value){
  //             if($key=='id'){
  //                   $id[]=$value;
  //             }
  //             if($key=='products_id'){
  //                   $products_id[]=$value;
  //             }
  //             if($key=='quantity'){
  //                   $quantity[]=$value;
  //             }
  //             if($key=='price'){
  //                   $price[]=$value;
  //             }
  //             if($key=='amount'){
  //                   $amount[]=$value;
  //             }
  //    }   
  // }
  
  // echo '<pre>';
  
  // print_r($products_id);
  // die();
?>
<?php
  //  $products_array=array();
  //    for($i=0; $i<count($products_id); $i++){
  //         $this->db->select('products.name,products.id');          
  //         $this->db->where('id',$products_id[$i]);
  //         $products_array[$i]=$this->db->get('products')->row();
          
  //    }
      
?>
<form action="<?php echo base_url() ?>invoice_update/<?php echo $invoice_edit->invoice_number ?>" method="POST" id="invoice_update">

              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="category_name"><?php echo lang('Client');?></label>
                      <select name="client_id"  class="form-control">                     
                     <option value="">Choose Clients</option>
                        <?php foreach ($clients as $row) : ?>
                          <option value="<?php echo $row->id?>" <?php if($row->id == $invoice_edit->client_id)echo "selected";?>><?php echo $row->client_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                  </div>
                  <diV class="col-md-6">
                    <div class="form-group">
                      <!-- Date input -->
                      <label class="control-label" for="date"><?php echo lang('Date') ?></label>
                      <input class="form-control" id="date" value="<?php echo $invoice_edit->date?>" name="date" type="date" />
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                 <diV class="col-md-6">
                    <div class="form-group">
                      <label for="category_name"><?php echo lang('Status');?></label>
                      <select name="status" id="" class="form-control">
                        <option value="">Choose Status</option>
                        <option value="Paid" <?php if($invoice_edit->status=='Paid')echo "selected";?>>Paid</option>
                        <option value="Unpaid" <?php if($invoice_edit->status=='Unpaid')echo "selected";?>>Unpaid</option>
                        <option value="Partially" <?php if($invoice_edit->status=='Partially')echo "selected";?>>Partially Paid</option>
                        <option value="Overdue" <?php if($invoice_edit->status=='Overdue')echo "selected";?>>Overdue</option>
                      </select>
                    </div>
                  </div>
                  <diV class="col-md-6">
                    <div class="form-group">
                      <!-- Date input -->
                      <label class="control-label" for="date"><?php echo lang('due_date');?></label>
                      <input class="form-control" id="date" value="<?php echo $invoice_edit->due_date?>" name="due_date" type="date">
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="category_name"><?php echo lang('invoice_number');?></label>
                      <input type="text" class="form-control" value="<?php echo $invoice_edit->invoice_number?>" name="invoice_number" placeholder="Invoice Number" readonly>
                    </div>
                  </div>
                  <diV class="col-md-6" id="recurring1">
                    <div class="form-group">
                      <label for="category_name"><?php echo lang('recurring');?></label>
                      <select name="recurring" id="" class="form-control">
                        <option value="">Choose Recurring</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quaterly">Quaterly</option>
                        <option value="artially Paid">Semi Annually</option>
                        <option value="Overdue">Annually</option>
                      </select>
                    </div>
                  </div>        
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="category_name"><?php echo lang('recurring');?></label>
                      <div class="form-check form-switch" id="">
                        <input class="form-check-input recur1" type="checkbox" id="flexSwitchCheckDefault">

                      </div>
                    </div>
                  </div>

                </div>
                <br>
                <div class="row">
                  <div class="col-md-4 bg-dark text-white p-1">
                    <p><?php echo lang('product');?></p>
                  </div>
                  <div class="col-md-2 bg-dark text-white p-1">
                    <p><?php echo lang('quantity');?></p>
                  </div>
                  <div class="col-md-2 bg-dark text-white p-1">
                    <p><?php echo lang('price');?></p>
                  </div>
                  <div class="col-md-2 bg-dark text-white p-1">
                    <p><?php echo lang('tax');?></p>
                  </div>
                  <div class="col-md-2 bg-dark text-white p-1">
                    <p><?php echo lang('amount');?></p>
                  </div>
                </div>
                <br>

                <div class="add_element">
                
                <?php foreach ($invoice_products as $key=>$invoice_product) :?>
                  <?php
                      $i=$key; 
                    ?>
                  <div class="row bg-light find_element" id="row<?php echo $key;?>">
                  <div class="col-md-4 p-1">
                    
                    <select name="products_id[]"  class="form-control product_id1"> 
                      
                    <?php foreach($products as $row):?>
                     <option value="<?php echo $row->id;?>" <?php if($row->id==$invoice_product->products_id)echo "selected";?>><?php echo $row->name;?></option>
                    <?php endforeach; ?>
                    </select>
                    <input type="text" name="id[]" value="<?php echo $invoice_product->id?>">
                  </div>
                  <div class="col-md-2 p-1">
                    <input type="number" name="quantity[]"  placeholder="Add quantity" value="<?php echo $invoice_product->quantity;?>" class="form-control quantity1">
                  </div>
                  <div class="col-md-2 p-1">
                    <input type="text" placeholder="Add price" name="price[]" value="<?php echo $invoice_product->price;?>" class="form-control price1">
                  </div>
                  <div class="col-md-2 p-1">
                    <select name="tax" id="" class="form-control">
                      <option value="">N/A Tax</option>
                    </select>
                  </div>
                  <div class="col-md-2 p-1">
                    <div class="row">
                      <div class="col-md-8">
                    <input type="text" name="amount[]" id="" class="form-control amount1" value="<?php echo $invoice_product->amount;?>">
                    </div>
                    <div class="col-md-2">
                    
                    <button type="button" name="remove" class="btn btn-danger btn-sm mt-2 btn_remove1" data-id="<?php echo $key; ?>"><i class="far fa-trash-alt"></i></button>
                    </div>
                    </div>
                  </div>                 
                </div>
                <?php endforeach;?>
                </div>
                
                <a class="btn btn-primary btn-sm mt-1 mr-2" href="#" style="float:right;" id="add_more1"> + <?php echo lang('add_more');?></a>
                <br><br>


                <div class="row">
                 <div class="col-sm-6"> </div>
                 <div class="col-sm-6">
                 <div style="width:100%;">
                 
          <div class="text-size-16 border-bottom mb-2">
            <div class="d-flex align-items-center justify-content-between py-2">
              <p class="text-muted mb-0"><?php echo lang('sub_total');?></p>
              <input type="text" name="sub_total" class="sub_total1" value="<?php echo $invoice_edit->sub_total;?>"><p class="mb-0 sub_total1"><?php echo $invoice_edit->sub_total;?></p>
            </div>
            <div class="d-flex align-items-center justify-content-between py-2">
              <p class="text-muted mb-0"><?php echo lang('tax');?></p>
              <p class="mb-0">$ 0.00</p>
            </div>
            <div class="row align-items-center justify-content-between py-2">
              <div class="col-7">
                <div>
                  <select id="discount_type" class="custom-select choose1" name="discount_type" style="background-image: url(&quot;https://billar.gainhq.com/images/chevron-down.svg&quot;);">
                    <option value="none" <?php if($invoice_edit->discount_type=='none')echo "selected";?>>
                      Choose discount type
                    </option>
                    <option value="fixed" <?php if($invoice_edit->discount_type=='fixed')echo "selected";?>>
                      Fixed
                    </option>
                    <option value="percentage"  <?php if($invoice_edit->discount_type=='percentage')echo "selected";?>>
                      Percentage
                    </option>
                  </select>
                </div>
              </div>
              <div class="col-5">  
                <div>
                  <input type="number" name="formdata_discount" id="formData_discount1" placeholder=""  value="<?php echo $invoice_edit->formdata_discount?>" autocomplete="off" class="form-control ">
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <h4 class="text-muted mb-0"><?php echo lang('total');?></h4>
            <input type="text" name="total" class="total" value="<?php echo $invoice_edit->total;?>"><h4 class="mb-0 total"><?php echo $invoice_edit->total;?></h4>
          </div>
          <div class="row d-flex align-items-center justify-content-between py-2">
            <div class="col-7">
              <p class="text-muted mb-0"><?php echo lang('received_amount');?></p>
            </div>
            <div class="col-5">
              <div><input type="number" name="received_amount" value="<?php echo $invoice_edit->received_amount;?>" id="formData_received_amount1" placeholder="" autocomplete="off" class="form-control ">
                <!---->
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between py-2">
            <p class="text-muted mb-0"><?php echo lang('return_amount');?></p>
            <h4 class="mb-0">$ 0.00</h4>
          </div>
          <div class="d-flex align-items-center justify-content-between py-2">
            <p class="text-muted mb-0"><?php echo lang('due_amount');?></p>
            <input type="text" name="due_amount" class="due_amount" value="<?php echo $invoice_edit->due_amount;?>">
            <h4 class="mb-0 due_amount"><?php echo $invoice_edit->due_amount;?></h4>
          </div>
        
                 </div>
                </div>
                </div>

              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo lang('Cancel');?></button>
                <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
              </div>
</form>

<script>
  //jquery validation---------------
  // $('#invoice_update').validate({    
  //         rules: {
  //           client_id: "required",
  //           date: "required",
  //           due_date: "required",  
  //           status: "required",
  //           "products_id[]": "required",
  //         },
  //         messages: {
              client_id: "<?php echo lang('the_client_field_is_required')?>",
              date: "<?php echo lang('the_date_field_is_required')?>",
              due_date: "<?php echo lang('the_due_date_field_is_required')?>",
              status: "<?php echo lang('the_status_field_is_required')?>",
              "products_id[]":"<?php echo lang('the_product_field_is_required')?>",
              "quantity[]":"<?php echo lang('the_quantity_field_is_required')?>",
              "price[]":"<?php echo lang('the_price_field_is_required')?>",
              "amount[]":"<?php echo lang('the_amount_field_is_required')?>",
  //           }     
          
  //       });

  $('#invoice_update').submit(function(e) {
     alert('hi');
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

               if (data.client_id != '') {
                 $('#client_error').html(data.client_id);
               } else {
                 $('#client_error').html('');
               }

               if (data.date != '') {
                 $('#date_error').html(data.date);
               } else {
                 $('#date_error').html('');
               }

               if (data.due_date != '') {
                 $('#due_date_error').html(data.due_date);
               } else {
                 $('#due_date_error').html('');
               }

               if (data.currency != '') {
                 $('#currency_error').html(data.currency);
               } else {
                 $('#currency_error').html('');
               }

               if (data.status != '') {
                 $('#status_error').html(data.status);
               } else {
                 $('#status_error').html('');
               }

               if (data.product != '') {
                 $('#product_id_error').html(data.product);
               } else {
                 $('#product_id_error').html('');
               }

             } else {

               $('#client_error').html('');
               $('#date_error').html('');
               $('#currency_error').html('');
               $('#date_error').html('');
               $('#status_error').html('');
               $('#product_id_error').html('');


               $('#invoice_insert')[0].reset();
               $('#product_add').hide();
               $('#product_list').show();
               window.location.reload();

             }




           }
         });
     
       });

      $(document).ready(function() {
        $('#recurring1').hide();

        $('.recur1').click(function() {
          $('#recurring1').toggle();
        })
 
       $(document).on('change', '.product_id1', function(){
         var id = $(this).val();
         var me=$(this);
         
         $.ajax({
           url: '<?php echo base_url()?>get_product_details',
           data:{
              id:id,
           },
           type: 'post',
           success: function(data) {
            var abc=JSON.parse(data);
            console.log(abc);
             var button_id = $(this).attr("data-id");              
             let quantityel=me.parent().parent().find('.quantity1').val('1');
             let pricel=me.parent().parent().find('.price1').val(abc.price);
             let amountel=me.parent().parent().find('.amount1').val(abc.price);
            //  //pricel= pricel.val();
            //  $('.sub_total').text(pricel);
            //  $('.sub_total').val(pricel);            
            //  $('.total').text(pricel);
            //  $('.total').val(pricel);
            //  $('.due_amount').text(pricel);
            //  $('.due_amount').val(pricel);
             calculate(); 
             
             $('.quantity1').click(function(){
                
               quantityel1=$(this).val();
               var pricel1=me.parent().parent().find('.price1').val();

               amountel=pricel1*quantityel1;
               me.parent().parent().find('.amount1').val(amountel);
            //    $('.sub_total').text(amountel);
            //    $('.sub_total').val(amountel);
            //    $('.total').text(amountel);
            //    $('.total').val(amountel);
            //    $('.due_amount').text(amountel);
            //    $('.due_amount').val(amountel);
               calculate();
               
             })
           }
        });
       });

     //without product change product working------
      //  $('.quantity1').click(function(){
      //         var pricel1=$('.product_id1').parent().parent().find('.price1').val();
      //         //alert(pricel1);
      //         //var amountel=me.parent().parent().find('.amount').val();  
      //         quantityel2=$(this).val();
      //         //alert( quantityel2); 
      //         //var amountel=pricel*quantityel;
      //         //  me.parent().parent().find('.amount').val(amountel);
      //         //  $('.sub_total').text(amountel);
      //         //  $('.sub_total').val(amountel);
      //         //  $('.total').text(amountel);
      //         //  $('.total').val(amountel);
      //         //  $('.due_amount').text(amountel);
      //         //  $('.due_amount').val(amountel);
      //         //  calculate();
               
      //        })
     
      //select section code-------      
      $(document).on('change', '.choose1', function(){
                
                var value=$(this).val();
                // alert(value);
                if(value=='none'){
                  $('#formData_discount1').attr('disabled','disabled');
                  var ab=$('.sub_total1').val();
                
                  $('.total').text(ab);
                  $('.total').val(ab);
                  $('.due_amount').text(ab);
                  $('.due_amount').val(ab);

                  //receive amount-----
                  var receieve_amount=$('#formData_received_amount1').val();
                  if(receieve_amount != ''){
                    receive_amount();
                  }           
                }
                // else if(value=='fixed'){
                //   $('#formData_discoun1').removeAttr('disabled');

                //    var abc=$('#formData_discount1').val();
                //     var total=$('.sub_total1').val() - abc;
                //     $('.total').text(total);
                //     $('.total').val(total);
                //     $('.due_amount').text(total);
                //     $('.due_amount').val(total);
                    
                //   //receive amount-----
                //   var receieve_amount=$('#formData_received_amount').val();
                //   if(receieve_amount != ''){
                //     receive_amount();
                //   }

                //   $('#formData_discount1').keyup(function(){
                //     var abc=$(this).val();
                //     var total=$('.sub_total1').val() - abc;
                //     $('.total').text(total);
                //     $('.total').val(total);
                //     $('.due_amount').text(total);
                //     $('.due_amount').val(total);
                //   });
                  
                // }
                // else if(value=='percentage'){
                //   $('#formData_discount1').removeAttr('disabled');

                //     var cal=$('#formData_discount1').val();
                //     var total=$('.sub_total1').val();
                //     var perchantage=total-((cal/100)*total);
                //     $('.total').text(perchantage);
                //     $('.total').val(perchantage);
                //     $('.due_amount').text(perchantage);
                //     $('.due_amount').val(perchantage);

                //   //receive amount-----
                //   var receieve_amount=$('#formData_received_amount').val();
                //   if(receieve_amount != ''){
                //     receive_amount();
                //   }

                //   $('#formData_discount').keyup(function(){
                //     var cal=$(this).val();
                //     var total=$('.sub_total1').val();
                //     var perchantage=total-((cal/100)*total);
                //     $('.total').text(perchantage);
                //     $('.total').val(perchantage);
                //     $('.due_amount').text(perchantage);
                //     $('.due_amount').val(perchantage);
                //   });
                // }
        })  




             //calculate amount place to sub_total,,,total,,,,,,due_amount,,,
             function calculate(){

                  var sum=0;
                        $('.amount1').each(function(){
                          
                          var total=$(this).val( );
                          sum=sum +parseFloat(total);
                          //console.log(sum);
                          $('.sub_total1').text(sum);
                          $('.total').text(sum);
                          $('.due_amount').text(sum);
                          $('.sub_total1').val(sum);
                          $('.total').val(sum);
                          $('.due_amount').val(sum);
                        })
            
              }  



        //add more invoice-------
        var i=<?php echo $i?>;
  
        $('#add_more1').click(function() {

          i++;
   
          $('.add_element').append('<div class="row bg-light find_element" id="row'+i+'"><div class="col-md-4 p-1"><select name="products_id[]"  class="form-control product_id1"><option value="">Choose Products</option><?php foreach ($products as $row) : ?><option value="<?php echo $row->id ?>"><?php echo $row->name ?></option><?php endforeach; ?></select><input type="text" name="id[]" value="'+i+'"></div><div class="col-md-2 p-1"><input type="number" name="quantity[]" placeholder="Add quantity" class="form-control quantity1"></div><div class="col-md-2 p-1"><input type="text" placeholder="Add price" name="price[]"  class="form-control price1"></div><div class="col-md-2 p-1"><select name="tax" id="" class="form-control"><option value="">N/A Tax</option></select></div><div class="col-md-2 p-1"><div class="row"><div class="col-md-8"><input type="text" name="amount[]" class="form-control amount1"></div><div class="col-md-2"><a type="button" href="#" name="remove" data-id="'+i+'" class="btn btn-danger btn-sm mt-2 btn_remove1"><i class="far fa-trash-alt"></i></a></div></div></div></div>');
        });

        $(document).on('click', '.btn_remove1', function(){
            var button_id = $(this).attr("data-id");   
            $('#row'+button_id+'').remove();
            if(button_id==2){
              $('.btn_hide').hide();
            }
       });  


});
</script>
     