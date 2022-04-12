<?php
$invoice_Products = json_decode($invoice_edit->Products);

?>
<?php
  //  $Products_array=array();
  //    for($i=0; $i<count($Products_id); $i++){
  //         $this->db->select('Products.name,Products.id');          
  //         $this->db->where('id',$Products_id[$i]);
  //         $Products_array[$i]=$this->db->get('Products')->row();
          
  //    }
      
?>
<form action="<?php echo base_url() ?>invoice_update/<?php echo $invoice_edit->invoice_number ?>" method="POST">

              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="category_name">Client</label>
                      <select name="client_id"  class="form-control">                     
                     <option value="">Choose Clients</option>
                        <?php foreach ($Clients as $row) : ?>
                          <option value="<?php echo $row->id?>" <?php if($row->id == $invoice_edit->client_id)echo "selected";?>><?php echo $row->client_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                  </div>
                  <diV class="col-md-6">
                    <div class="form-group">
                      <!-- Date input -->
                      <label class="control-label" for="date">Date</label>
                      <input class="form-control" id="date" value="<?php echo $invoice_edit->date?>" name="date" type="date" />
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                <diV class="col-md-6">
                    <div class="form-group">
                      <label for="category_name">Status</label>
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
                      <label class="control-label" for="date">Due Date</label>
                      <input class="form-control" id="date" value="<?php echo $invoice_edit->due_date?>" name="due_date" type="date">
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="category_name">Invoice Number</label>
                      <input type="text" class="form-control" value="<?php echo $invoice_edit->invoice_number?>" name="invoice_number" placeholder="Invoice Number" readonly>
                    </div>
                  </div>

                  <diV class="col-md-6" id="recurring1">
                    <div class="form-group">
                      <label for="category_name">Recurring</label>
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
                      <label for="category_name">Recurring</label>
                      <div class="form-check form-switch" id="">
                        <input class="form-check-input recur1" type="checkbox" id="flexSwitchCheckDefault">

                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-4 bg-dark text-white p-1">
                    <p>Product</p>
                  </div>
                  <div class="col-md-2 bg-dark text-white p-1">
                    <p>Quantity</p>
                  </div>
                  <div class="col-md-2 bg-dark text-white p-1">
                    <p>Price</p>
                  </div>
                  <div class="col-md-2 bg-dark text-white p-1">
                    <p>Tax</p>
                  </div>
                  <div class="col-md-2 bg-dark text-white p-1">
                    <p>Amount</p>
                  </div>
                </div>
                <br>

                <div class="add_element bg-light ">
                
                <?php foreach ($invoice_Products as $key=>$invoice_product) :?>
                  <?php
                      echo $i=$key; 
                    ?>
                  <div class="row find_element" id="row<?php echo $key;?>">
                  <div class="col-md-4 p-1">
                    
                    <select name="Products_id[]"  class="form-control product_id1"> 
                      
                    <?php foreach($Products as $row):?>
                     <option value="<?php echo $row->id;?>" <?php if($row->id==$invoice_product->Products_id)echo "selected";?>><?php echo $row->name;?></option>
                    <?php endforeach; ?>
                    </select>
                    <input type="text" name="id[]" value="<?php echo $i;?>">
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
                
                <a class="btn btn-primary btn-sm mt-1 mr-2" href="#" style="float:right;" id="add_more1"> + Add More</a>
                <br><br>


                <div class="row">
                 <div class="col-sm-6"> </div>
                 <div class="col-sm-6">
                 <div style="width:100%;">
                 
          <div class="text-size-16 border-bottom mb-2">
            <div class="d-flex align-items-center justify-content-between py-2">
              <p class="text-muted mb-0">Sub total</p>
              <input type="text" name="sub_total" class="sub_total1" value="<?php echo $invoice_edit->sub_total;?>"><p class="mb-0 sub_total1"><?php echo $invoice_edit->sub_total;?></p>
            </div>
            <div class="d-flex align-items-center justify-content-between py-2">
              <p class="text-muted mb-0">Tax</p>
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
            <h4 class="text-muted mb-0">Total</h4>
            <input type="text" name="total" class="total1" value="<?php echo $invoice_edit->total;?>"><h4 class="mb-0 total1"><?php echo $invoice_edit->total;?></h4>
          </div>
          <div class="row d-flex align-items-center justify-content-between py-2">
            <div class="col-7">
              <p class="text-muted mb-0">Received amount</p>
            </div>
            <div class="col-5">
              <div><input type="number" name="received_amount" value="<?php echo $invoice_edit->received_amount;?>" id="formData_received_amount1" placeholder="" autocomplete="off" class="form-control ">
                <!---->
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between py-2">
            <p class="text-muted mb-0">Return amount</p>
            <h4 class="mb-0 return_amount1">$ 0.00</h4>
          </div>
          <div class="d-flex align-items-center justify-content-between py-2">
            <p class="text-muted mb-0">Due amount</p>
            <input type="text" name="due_amount" class="due_amount1" value="<?php echo $invoice_edit->due_amount;?>">
            <h4 class="mb-0 due_amount1"><?php echo $invoice_edit->due_amount;?></h4>
          </div>
        
                 </div>
                </div>
                </div>

              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
</form>

<script>
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

             calculate(); 
           }
        });
       });
  });


              //quntity increment on change product----------
              $(document).on('click', '.quantity1', function(){
                //alert('hi');
               quantityel1=$(this).val();
               //alert(quantityel1);
               var pricel1=$(this).parent().parent().find('.price1').val();
                //alert(pricel1);
               amountel1=pricel1*quantityel1;
               $(this).parent().parent().find('.amount1').val(amountel1);
            
               calculate();

             })

    //  $('#formData_discount1').click(function(e){
    //    alert('hi');
    //  })
      //select section code-------      
      $(document).on('change', '.choose1', function(){
                
                var value=$(this).val();
                //alert(value);
                if(value=='none'){
                  $('#formData_discount1').attr('disabled','disabled');
                  var ab=$('.sub_total1').val();
                
                  $('.total1').text(ab);
                  $('.total1').val(ab);
                  $('.due_amount1').text(ab);
                  $('.due_amount1').val(ab);

                  //receive amount-----
                  var receieve_amount=$('#formData_received_amount1').val();
                  if(receieve_amount != ''){
                    receive_amount();
                  }           
                }
                else if(value=='fixed'){
                  //console.log('helllo');
                  $('#formData_discount1').removeAttr('disabled');

                   var abc=parseFloat($('#formData_discount1').val());
                   var sub_total=parseFloat($('.sub_total1').val());
                    var total=sub_total - abc;
                    $('.total1').text(total);
                    $('.total1').val(total);
                    $('.due_amount1').text(total);
                    $('.due_amount1').val(total);
                    
                  //receive amount-----
                  var receieve_amount=$('#formData_received_amount1').val();
                  if(receieve_amount != ''){
                    receive_amount();
                  }

               
                  
                }
                else if(value=='percentage'){
                  alert('hi');
                  $('#formData_discount1').removeAttr('disabled');

                    var cal=$('#formData_discount1').val();
                    var total=$('.sub_total1').val();
                    var perchantage=total-((cal/100)*total);
                    $('.total1').text(perchantage);
                    $('.total1').val(perchantage);
                    $('.due_amount1').text(perchantage);
                    $('.due_amount1').val(perchantage);

                  //receive amount-----
                  var receieve_amount=$('#formData_received_amount1').val();
                  if(receieve_amount != ''){
                    receive_amount();
                  }

                }
        })
        

          $('#formData_discount1').keyup(function(){
                             // alert('hi');
           var discount_type=$('.choose1').val();
           //alert(discount_type);
              if(discount_type == 'fixed'){

                    // var total=$('.sub_total1').val() - abc;
                    // $('.total1').text(total);
                    // $('.total1').val(total);
                    // $('.due_amount1').text(total);
                    // $('.due_amount1').val(total);

                    var abc=parseFloat($(this).val());
                    var sub_total=parseFloat($('.sub_total1').val());
                    var return_amount= abc - sub_total;
                    alert(sub_total);
                    var new_total=sub_total-abc;
                    alert(new_total);
                      if(abc > sub_total){
                        alert('hi');
                        $('.due_amount1').text('0.00');
                        $('.due_amount1').val('0');
                        $('.return_amount1').text(return_amount);
                        $('.total1').text(new_total);
                         
                      }
                      else{
                      var total=$('.sub_total1').val() - abc;
                      $('.return_amount1').text('0.00');
                      $('.total1').text(total);
                      $('.total1').val(total);
                      $('.due_amount1').text(total);
                      $('.due_amount1').val(total);
                      }

                     //receive amount-----
                    // var receieve_amount=$('#formData_received_amount1').val();
                    // if(receieve_amount != ''){
                    //   receive_amount();
                    // }

              }

              else if(discount_type == 'percentage'){
                    var cal=$(this).val();
                    var total=$('.sub_total1').val();
                    var perchantage=total-((cal/100)*total);
                    $('.total1').text(perchantage);
                    $('.total1').val(perchantage);
                    $('.due_amount1').text(perchantage);
                    $('.due_amount1').val(perchantage);

                     //receive amount-----
                     var receieve_amount=$('#formData_received_amount1').val();
                    if(receieve_amount != ''){
                      receive_amount();
                    }
       
              }
      
            });
        
            //received_amount keyup section------

          $('#formData_received_amount1').keyup(function(){

              var receieve_amount=$(this).val();
              console.log('receieve_amount:',receieve_amount)
              var total_val=$('.total1').val();
              console.log('total_val:',total_val);
              var total_due_amount=parseFloat(total_val) - parseFloat(receieve_amount);
              if(total_due_amount<0){
                $('.due_amount1').text('$0.00');
                $('.due_amount1').val('0');
                var return_amount=parseFloat(receieve_amount) - parseFloat(total_val);
                $('.return_amount1').text(return_amount);
              }
              else{
                $('.due_amount1').text(total_due_amount);
                $('.due_amount1').val(total_due_amount); 
              }
                    
            });

          //received amount section---------
          function receive_amount(){
                  var receieve_amount=$('#formData_received_amount1').val();
                  var total_val=$('.total1').val();
                  var total_due_amount=parseFloat(total_val) - parseFloat(receieve_amount);
                  $('.due_amount1').text(total_due_amount);
                  $('.due_amount1').val(total_due_amount); 
          }     

             //calculate amount place to sub_total,,,total,,,,,,due_amount,,,
             function calculate(){

                  var sum=0;
                        $('.amount1').each(function(){
                          
                          var total=$(this).val( );
                          if(total==null || total == ''){
                            total=0;
                          }
                          //console.log(total,'totaltotal');
                          sum=sum +parseFloat(total);
                          //console.log(sum);
                          //alert(sum);
                          $('.sub_total1').text(sum);
                          $('.total1').text(sum);
                          $('.due_amount1').text(sum);
                          $('.due_amount1').val(sum);
                          $('.sub_total1').val(sum);
                          $('.total1').val(sum);
                          
                        })
            
              }  



        //add more invoice-------
       
        var i=<?php echo $i?>;      
        $('#add_more1').click(function() {
 
          i++;
          //var a=i++;
          //alert(a);
   
          $('.add_element').append('<div class="row bg-light find_element" id="row'+i+'"><div class="col-md-4 p-1"><select name="Products_id[]"  class="form-control product_id1"><option value="">Choose Products</option><?php foreach ($Products as $row) : ?><option value="<?php echo $row->id ?>"><?php echo $row->name ?></option><?php endforeach; ?></select><input type="text" name="id[]" value="'+i+'"></div><div class="col-md-2 p-1"><input type="number" name="quantity[]" placeholder="Add quantity" class="form-control quantity1"></div><div class="col-md-2 p-1"><input type="text" placeholder="Add price" name="price[]"  class="form-control price1"></div><div class="col-md-2 p-1"><select name="tax" id="" class="form-control"><option value="">N/A Tax</option></select></div><div class="col-md-2 p-1"><div class="row"><div class="col-md-8"><input type="text" name="amount[]" class="form-control amount1"></div><div class="col-md-2"><a type="button" href="#" name="remove" data-id="'+i+'" class="btn btn-danger btn-sm mt-2 btn_remove1"><i class="far fa-trash-alt"></i></a></div></div></div></div>');
        });

        $(document).on('click', '.btn_remove1', function(){
          alert('hi');
            var button_id = $(this).attr("data-id");   
            $('#row'+button_id+'').remove();
            if(button_id==2){
              $('.btn_hide').hide();
            }
       });  



</script>
     