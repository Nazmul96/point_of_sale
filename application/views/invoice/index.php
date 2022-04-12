   <?php
    // echo '<pre>';
    // print_r($starting_invoice->settings_value);
    // die();
    $val = $row1->invoice_number;

    $this->db->where('group_name', 'General');
    $dollar = $this->db->get('settings')->result();

    // echo $dollar[6]->settings_value;
    // die();

    ?>
   <div class="content-body" id="product_list">

     <!-- Page Headings Start -->
     <div class="row justify-content-between align-items-center mb-10">

       <!-- Page Heading Start -->
       <div class="col-12 col-lg-auto mb-20">
         <div class="page-heading">
           <h3><?php echo lang('invoices') ?></h3>
         </div>
       </div><!-- Page Heading End -->
       <!-- Page Button Group Start -->
       <div class="col-12 col-lg-auto mb-20">
         <div class="page-date-range">


         </div>
       </div><!-- Page Button Group End -->

     </div>
     <button class="fixed_button btn btn-primary mb-4" id="productmodal"> <i class="zmdi zmdi-file-plus"></i> </button>

     <div class="row">
       <div class="col-12 col-md-3 col-sm-4">
         <div class="row  mb-10">
           <div class="col-sm-12 mb-2">
             <div class="top-report ml-2">
               <div class="head mb-1"><?php echo lang('total_amount') ?></div>
               <div class="content mb-0">
                 <h2 class="mb-0 text-primary">
                   <?php if ($total_amount->sub_total) { ?>
                     <?php rs_currency($total_amount->sub_total) ?>
                     <!-- helper function call -->
                   <?php } else { ?>
                     <?php rs_currency(0) ?>
                   <?php } ?>
                 </h2>

               </div>
             </div>
           </div>

           <div class="col-sm-12 mb-2">
             <div class="top-report ml-2">
               <div class="head mb-1"><?php echo lang('total_paid') ?></div>
               <div class="content mb-0">

                 <h2 class="mb-0 text-success">
                   <?php if ($total_amount->received_amount) { ?>
                     <?php rs_currency($total_amount->received_amount) ?>
                     <!-- helper function call -->
                   <?php } else { ?>
                     <?php rs_currency(0) ?>
                   <?php } ?>
                 </h2>
               </div>
             </div>
           </div>

           <div class="col-sm-12 mb-2">
             <div class="top-report ml-2">
               <div class="head mb-1"><?php echo lang('total_due') ?></div>
               <div class="content mb-0">

                 <h2 class="mb-0 text-warning">
                   <?php if ($total_amount->due_amount) { ?>
                     <?php rs_currency($total_amount->due_amount) ?>
                     <!-- helper function call -->
                   <?php } else { ?>
                     <?php rs_currency(0) ?>
                   <?php } ?>
                 </h2>
               </div>
             </div>
           </div>

         </div>
       </div>
       <div class="col-12 col-md-9 col-sm-12">
         <div class="box">
           <div class="box-body">
             <div class="  py-primary">
               <table id="example" class="table table-bordered  data-table data-table-default table-striped table-sm">
                 <thead>
                   <tr>
                     <th><?php echo lang('invoice_number') ?></th>
                     <th><?php echo lang('Status') ?></th>
                     <th><?php echo lang('Client') ?></th>
                     <th><?php echo lang('due_date') ?></th>
                     <th><?php echo lang('Amount') ?></th>
                     <th><?php echo lang('Paid') ?></th>
                     <th><?php echo lang('amount_due') ?></th>
                     <th><?php echo lang('Action') ?></th>      
                   </tr>
                 </thead>
                 <tbody>
                 

                 </tbody>
               </table>

             </div>
           </div>
         </div>
       </div>
     </div>



   </div>








   <!-- Insert Modal -->
   <div class="content-body" id="product_add">
     <div class="page-heading mb-20">
       <h3><?php echo lang('add_new_invoice') ?></h3>
     </div>
     <div class="box">
       <div class="box-body">
         <form action="<?php echo base_url() ?>invoice_insert" method="POST" id="invoice_insert">
           <div class="row mb-4">
             <div class="col-md-6">
               <div class="form-group">
                 <label for="category_name"><?php echo lang('Client') ?></label>
                 <select name="client_id" class="form-control">
                   <option value="">Choose Clients</option>
                   <?php foreach ($clients as $row) : ?>
                     <option value="<?php echo $row->id ?>"><?php echo $row->client_name ?></option>
                   <?php endforeach; ?>
                 </select>
                 <span id="client_error" class="text-danger"></span>
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                 <!-- Date input -->
                 <label class="control-label"><?php echo lang('Date') ?></label>
                 <input class="form-control"  name="date" type="date">
                 <span id="date_error" class="text-danger"></span>
               </div>
             </div>
            </div>       
             <div class="row">
               <div class="col-md-6">
                 <div class="form-group">
                   <label for="category_name"><?php echo lang('Status') ?></label>
                   <select name="status" id="" class="form-control">
                     <option value="">Choose Status</option>
                     <option value="Paid">Paid</option>
                     <option value="Unpaid">Unpaid</option>
                     <option value="Partially">Partially Paid</option>
                     <option value="Overdue">Overdue</option>
                   </select>
                   <span id="status_error" class="text-danger"></span>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="form-group">
                   <label class="control-label"><?php echo lang('due_date');?></label>
                   <input class="form-control" name="due_date" type="date" />
                   <span id="due_date_error" class="text-danger"></span>
                 </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-6">
                 <div class="form-group">
                   <label for="category_name"><?php echo lang('invoice_number');?></label>
                   <?php if($invoice == '0'){?>
                    <input type="text" class="form-control" name="invoice_number" value="<?php echo $starting_invoice->settings_value; ?>">
                   <?php } else{?>
                    <input type="text" class="form-control" name="invoice_number" value="<?php echo $val+1; ?>"> 
                    <?php } ?>
                   <span id="invoice_number_error" class="text-danger"></span> 
                 </div>
               </div>

               <div class="col-md-6" id="recurring">
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
                   <div class="form-check form-switch">
                     <input class="form-check-input recur" type="checkbox" id="flexSwitchCheckDefault">

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
               <div class="row bg-light find_element" id="row0">
                 <div class="col-md-4 p-1">
                   <select name="products_id[]" class="form-control product_id ">
                     <option value="">Choose Products</option>
                     <?php foreach ($products as $row) : ?>
                       <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                     <?php endforeach; ?>
                   </select>
                   <span class="text-danger" id="product_id_error"></span>
                   <input type="hidden" name="id[]" value="0">
                 </div>
                 <div class="col-md-2 p-1">
                   <input type="number" name="quantity[]" placeholder="Add quantity" value="" class="form-control quantity">
                 </div>
                 <div class="col-md-2 p-1">
                   <input type="text" placeholder="Add price" name="price[]" class="form-control price">
                 </div>
                 <div class="col-md-2 p-1">
                   <select name="tax" id="" class="form-control">
                     <option value="">N/A Tax</option>
                   </select>
                 </div>
                 <div class="col-md-2 p-1">
                   <div class="row">
                     <div class="col-md-8">
                       <input type="text" name="amount[]" id="" class="form-control amount">
                     </div>
                     <div class="col-md-2">
                       <button type="button" name="remove" class="btn btn-danger btn-sm mt-2 btn_remove btn_hide" data-id="0"><i class="far fa-trash-alt"></i></button>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

             <a class="btn btn-primary btn-sm mt-1 mr-2" href="#" style="float:right;" id="add_more"> + <?php echo lang('add_more');?>
             </a>
             <br><br>


             <div class="row">
               <div class="col-sm-6"> </div>
               <div class="col-sm-6">
                 <div style="width:100%;">

                   <div class="text-size-16 border-bottom mb-2">
                     <div class="d-flex align-items-center justify-content-between py-2">
                       <p class="text-muted mb-0"><?php echo lang('sub_total');?></p>
                       <input type="hidden" name="sub_total" class="sub_total">
                       <p class="mb-0 sub_total">$ 0.00</p>
                     </div>
                     <div class="d-flex align-items-center justify-content-between py-2">
                       <p class="text-muted mb-0"><?php echo lang('tax');?></p>
                       <p class="mb-0">$ 0.00</p>
                     </div>
                     <div class="row align-items-center justify-content-between py-2">
                       <div class="col-7">
                         <div>
                           <select id="discount_type" name="discount_type" class="custom-select choose" style="background-image: url(&quot;https://billar.gainhq.com/images/chevron-down.svg&quot;);">
                             <option value="none">Choose discount type</option>
                             <option value="fixed">Fixed</option>
                             <option value="percentage">Percentage</option>
                           </select>
                         </div>
                       </div>
                       <div class="col-5">
                         <div>
                           <input type="number" name="formdata_discount" id="formData_discount" placeholder="" autocomplete="off" class="form-control" disabled>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="d-flex align-items-center justify-content-between">
                     <h4 class="text-muted mb-0"><?php echo lang('total');?></h4>
                     <input type="hidden" name="total" class="total">
                     <h4 class="mb-0 total">$ 0.00</h4>
                   </div>
                   <div class="row d-flex align-items-center justify-content-between py-2">
                     <div class="col-7">
                       <p class="text-muted mb-0"><?php echo lang('received_amount');?></p>
                     </div>
                     <div class="col-5">
                       <div>
                         <input type="number" name="received_amount" id="formData_received_amount" placeholder="" autocomplete="off" class="form-control ">
                         <!---->
                       </div>
                     </div>
                   </div>
                   <div class="d-flex align-items-center justify-content-between py-2">
                     <p class="text-muted mb-0"><?php echo lang('return_amount');?></p>
                     <h4 class="mb-0 return_amount">$ 0.00</h4>
                   </div>
                   <div class="d-flex align-items-center justify-content-between py-2">
                     <p class="text-muted mb-0"><?php echo lang('due_amount');?></p>
                     <input type="hidden" name="due_amount" class="due_amount">
                     <h4 class="mb-0 due_amount">$ 0.00</h4>
                   </div>
                 </div>
               </div>
             </div>
             <div class="d-flex flex-wrap justify-content-center col mb-10 mt-4">
               <button type="button" class="btn btn-outline-danger product_show mx-2"><?php echo lang('Cancel');?></button>
               <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
             </div>
           </div>
         </form>
       </div>
     </div>
   </div>





   <!-- Edit Modal -->
   <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
     <div class="modal-dialog modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('edit_invoice');?></h5>
           <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div id="modal_body">

         </div>
       </div>
     </div>
   </div>

   <!-- Payment Model -->
   <div class="modal fade" id="add_payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLongTitle"><?php echo lang('add_payment');?></h5>
           <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div id="payment_body">

         </div>
       </div>
     </div>
   </div>


   <script>
     $(document).ready(function() {
     
      $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "<?php echo base_url().'invoice_index_datatable';?>",
            type: "POST",
            dataType: 'JSON',
        },
        "columns": [
            { "data": "invoice_number" },
            { "data": "status" },
            { "data": "client_name" },
            { "data": "due_date" },
            { "data": "sub_total" },
            { "data": "received_amount" },
            { "data": "due_amount" },
            { "data": "action" }
        ],

        // "columnDefs": [
        //     {
        //         // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
            //     "render": function ( data, type, row ) {
            //        console.log(data);
            //        console.log(row);
            //         return '<a href="edit/'+ row['invoice_number']+'">Edit</a>';
            //     },
            //     "targets": 8
            // },
            //{ "visible": false,  "targets": [ 3 ] }
        // ]
      
    } );
    

    //for hide show at form--------
       $('#recurring').hide();

       $('.recur').on('change', function() {
         $('#recurring').toggle();
       })
      //jquery validation---------------
         $('#invoice_insert').validate({ 
          rules: {
            client_id: "required",
            date: "required",
            due_date: "required",  
            status: "required",
            "products_id[]": "required",
            "quantity[]": "required",
            "price[]": "required",
            "amount[]": "required",
          },
          messages: {
              client_id: "<?php echo lang('the_client_field_is_required')?>",
              date: "<?php echo lang('the_date_field_is_required')?>",
              due_date: "<?php echo lang('the_due_date_field_is_required')?>",
              status: "<?php echo lang('the_status_field_is_required')?>",
              "products_id[]":"<?php echo lang('the_product_field_is_required')?>",
              "quantity[]":"<?php echo lang('the_quantity_field_is_required')?>",
              "price[]":"<?php echo lang('the_price_field_is_required')?>",
              "amount[]":"<?php echo lang('the_amount_field_is_required')?>",
            } 
          });

       //invoice_insert---------
       $('#invoice_insert').submit(function(e) {
          //jquery validation---------------
   
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
             console.log(data);
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
               if (data.status != '') {
                 $('#status_error').html(data.status);
               } else {
                 $('#status_error').html('');
               }
               if (data.invoice_number != '') {
                 $('#invoice_number_error').html(data.invoice_number);
               } else {
                 $('#invoice_number_error').html('');
               }



             } else {

               $('#client_error').html('');
               $('#date_error').html('');
               $('#currency_error').html('');
               $('#date_error').html('');
               $('#status_error').html('');
               $('#product_id_error').html('');
               $('#invoice_number_error').html(''); 

               $('#invoice_insert')[0].reset();
               $('#product_add').hide();
               $('#product_list').show();
               window.location.reload();

             }




           }
         });
         return false;
        }
        return false;
       });


     });


     //choose product-----
     $(document).on('change', '.product_id', function() {

       var id = $(this).val();
       var me = $(this);
       $.ajax({
         url: '<?php echo base_url() ?>get_product_details',
         data: {
           id: id,
         },
         type: 'post',
         success: function(data) {

           var abc = JSON.parse(data);

           var button_id = $(this).attr("data-id");
           let quantityel = me.parent().parent().find('.quantity').val('1');
           let pricel = me.parent().parent().find('.price').val(abc.price);
           let amountel = me.parent().parent().find('.amount').val(abc.price);
           pricel = pricel.val();
           $('.sub_total').text(pricel);
           $('.sub_total').val(pricel);
           $('.total').text(pricel);
           $('.total').val(pricel);
           $('.due_amount').text(pricel);
           //$('.due_amount').val(pricel);

           calculate();


         }
       });
     });

     //quntity increment on change product----------
     $(document).on('click', '.quantity', function() {
       quantityel = $(this).val();
       var pricel = $(this).parent().parent().find('.price').val();
       amountel = pricel * quantityel;
       $(this).parent().parent().find('.amount').val(amountel);
       //  $('.sub_total').text(amountel);
       //  $('.sub_total').val(amountel);
       //  $('.total').text(amountel);
       //  $('.total').val(amountel);
       //  $('.due_amount').text(amountel);
       //$('.due_amount').val(amountel);

       calculate();

     })

     //calculate amount place to sub_total,,,total,,,,,,due_amount,,,
     function calculate() {
       var sum = 0;
       $('.amount').each(function() {

         var total = $(this).val();
         if (total == null || total == '') {
           total = 0;
         }
         sum = sum + parseFloat(total);
         //console.log(sum);
         $('.sub_total').text(sum);
         $('.total').text(sum);
         $('.due_amount').text(sum);
         $('.sub_total').val(sum);
         $('.total').val(sum);
         $('.due_amount').val(sum);
       })


     }


     $(document).on('change', '.choose', function() {
       var value = $(this).val();

       if (value == 'none') {
         $('#formData_discount').attr('disabled', 'disabled');
         var ab = $('.sub_total').val();

         $('.total').text(ab);
         $('.total').val(ab);
         $('.due_amount').text(ab);
         $('.due_amount').val(ab);

         //receive amount-----
         var receieve_amount = $('#formData_received_amount').val();
         if (receieve_amount != '') {
           receive_amount();
         }
       } else if (value == 'fixed') {
         $('#formData_discount').removeAttr('disabled');

         var abc = $('#formData_discount').val();
         var total = $('.sub_total').val() - abc;
         $('.total').text(total);
         $('.total').val(total);
         $('.due_amount').text(total);
         $('.due_amount').val(total);

         //receive amount-----
         var receieve_amount = $('#formData_received_amount').val();
         if (receieve_amount != '') {
           receive_amount();
         }

         $('#formData_discount').keyup(function() {
           var abc = parseFloat($(this).val());
           var sub_total = parseFloat($('.sub_total').val());
           var return_amount = abc - sub_total;
           var new_total = sub_total - abc;
           if (abc > sub_total) {

             $('.due_amount').text('0.00');
             $('.return_amount').text(return_amount);
             $('.total').text(new_total);
           } else {
             var total = $('.sub_total').val() - abc;
             $('.return_amount').text('0.00');
             $('.total').text(total);
             $('.total').val(total);
             $('.due_amount').text(total);
             $('.due_amount').val(total);
           }
         });

       } else if (value == 'percentage') {
         $('#formData_discount').removeAttr('disabled');

         var cal = $('#formData_discount').val();
         var total = $('.sub_total').val();
         var perchantage = total - ((cal / 100) * total);
         $('.total').text(perchantage);
         $('.total').val(perchantage);
         $('.due_amount').text(perchantage);
         $('.due_amount').val(perchantage);

         //receive amount-----
         var receieve_amount = $('#formData_received_amount').val();
         if (receieve_amount != '') {
           receive_amount();
         }

         $('#formData_discount').keyup(function() {
           var cal = parseFloat($(this).val());

           var su_total = parseFloat($('.sub_total').val());
           //console.log('su_total',su_total);
           var perchantage = parseFloat(su_total - ((cal / 100) * su_total));
           //console.log('perchantage',perchantage);
           if (perchantage > 0) {
             $('.total').text(perchantage);
             $('.total').val(perchantage);
             $('.due_amount').text(perchantage);
             $('.due_amount').val(perchantage);

           } else {
             $('.total').text(perchantage);
             $('.due_amount').text('0.00');
             $('.return_amount').text(parseFloat(((cal / 100) * su_total)) - su_total)
           }
         });
       }
     })

     //due_amount section------
     $('#formData_received_amount').keyup(function() {
       var receieve_amount = $(this).val();
       var total_val = $('.total').val();
       var total_due_amount = parseFloat(total_val) - parseFloat(receieve_amount);
       if (total_due_amount < 0) {
         $('.due_amount').text('$0.00');
         $('.due_amount').val('0');
         var return_amount = parseFloat(receieve_amount) - parseFloat(total_val);
         $('.return_amount').text(return_amount);
       } else {
         $('.due_amount').text(total_due_amount);
         $('.due_amount').val(total_due_amount);
       }

     });

     //received amount section---------
     function receive_amount() {
       var receieve_amount = $('#formData_received_amount').val();
       var total_val = $('.total').val();
       var total_due_amount = parseFloat(total_val) - parseFloat(receieve_amount);
       $('.due_amount').text(total_due_amount);
       $('.due_amount').val(total_due_amount);
     }



     //Add More Option added here--------     
     $(document).ready(function() {

       $('.btn_hide').hide();
       var i = 0;
       //$('#valid0').rules("add", "required");
       $('#add_more').click(function() {
     
         $('.btn_hide').show();
         i++;
         $('.add_element').append('<div class="row bg-light find_element" id="row' + i + '"><div class="col-md-4 p-1"><select id="valid_product'+i+'" name="products_id[]"  class="form-control product_id "><option value="">Choose Products</option><?php foreach ($products as $row) : ?><option value="<?php echo $row->id ?>"><?php echo $row->name ?></option><?php endforeach; ?></select><span class="text-danger"></span><input type="hidden" class="delete_id" name="id[]" value="' + i + '"></div><div class="col-md-2 p-1"><input type="number" name="quantity[]" placeholder="Add quantity" class="form-control quantity" id="valid_quantity'+i+'"></div><div class="col-md-2 p-1"><input id="valid_price'+i+'" type="text" placeholder="Add price" name="price[]"  class="form-control price"></div><div class="col-md-2 p-1"><select name="tax" id="" class="form-control"><option value="">N/A Tax</option></select></div><div class="col-md-2 p-1"><div class="row"><div class="col-md-8"><input id="valid_amount'+i+'" type="text" name="amount[]" class="form-control amount"></div><div class="col-md-2"><a type="button" href="#" name="remove" data-id="' + i + '" class="btn btn-danger btn-sm mt-2 btn_remove btn_hide1"><i class="far fa-trash-alt"></i></a></div></div></div></div>');
          
          $('#valid_product'+i+'').rules("add", "required");
          $('#valid_quantity'+i+'').rules("add", "required");
          $('#valid_price'+i+'').rules("add", "required");
          $('#valid_amount'+i+'').rules("add", "required");

       });
       //add more option delete here-------btn delete
       $(document).on('click', '.btn_remove', function() {
         var myarray = [];
         $('.delete_id').each(function() {
           let value = $(this).val();
           myarray.push(value);
         });
         let length = myarray.length;
         var abc = length--;
         //alert(abc); 
         var button_id = $(this).attr("data-id");
         if (abc == 1) {
           //alert('delete');
           $('.btn_hide').hide();
           $('.btn_hide1').hide();
         }
         $('#row' + button_id + '').remove();
         var sum = 0;
         $('.amount').each(function() {

           var total = $(this).val();
           sum = sum + parseFloat(total);
           $('.sub_total').text(sum);
           $('.total').text(sum);
           $('.due_amount').text(sum);
           $('.sub_total').val(sum);
           $('.total').val(sum);
           $('.due_amount').val(sum);
         })


       });
     });

     //edit_invoice---------
     $(document).on('click', '.edit', function(e) {
       e.preventDefault();
       //alert('hi');
       $('#editModal').modal('show');
       let invoice_id = $(this).attr('data-id');
       $.get("edit_invoices/" + invoice_id, function(data) {

         $('#modal_body').html(data)

       });
     });

     //add payment form work here-------
     $(document).on('click', '.add_payment', function(e) {
       e.preventDefault();
       let incoice_number = $(this).attr('data-id');
       $('#add_payment_modal').modal('show');
       $.get("add_payment/" + incoice_number, function(data) {

         $('#payment_body').html(data)

       });

     });
   </script>