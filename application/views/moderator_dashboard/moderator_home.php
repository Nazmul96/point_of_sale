 
<div class="content-body">
    <div class="box mb-20">
        <div class="box-head">
            <h4 class="title">Quinck Link</h4>
        </div>
        <div class="box-body">
            <a href="<?php echo base_url()?>client_index" id="client_add" class="btn btn-outline-primary mr-2"> 
                <i class="zmdi zmdi-account"></i> <?php echo lang('add_clients')?> 
            </a>
            <a href="<?php echo base_url()?>product_index" class="btn btn-outline-primary mr-2"> 
                <i class="ti-package"></i> <?php echo lang('add_product')?>
            </a>
            <a href="<?php echo base_url()?>invoice_index" class="btn btn-outline-primary mr-2"> 
                <i class="far fa-file-alt"></i> <?php echo lang('add_invoice')?> 
            </a>
            <a href="<?php echo base_url()?>payment_summary" class="btn btn-outline-primary mr-2"> 
                <i class="fas fa-dollar-signt"></i> <?php echo lang('payment_summary')?>
            </a>
            <a href="<?php echo base_url()?>client_statement" class="btn btn-outline-primary mr-2"> 
                <i class="zmdi zmdi-account"></i> <?php echo lang('client_statement')?>
            </a>
            <a href="<?php echo base_url()?>invoice_report" class="btn btn-outline-primary mr-2"> 
                <i class="far fa-file-alt"></i> <?php echo lang('invoice_report')?>
            </a>
          

        </div>
    </div>
    <?php
        $total_client=$this->db->get('clients')->num_rows();
        $total_invoice=$this->db->get('invoices')->num_rows();
        $total_products=$this->db->get('products')->num_rows();

        //how many paid invoice exist at invoice table--------
        $this->db->where('status','Paid');
        $total_paid=$this->db->get('invoices')->num_rows();

        //how many Overdue invoice exist at invoice table--------
        $this->db->where('status','Overdue');
        $total_overdue=$this->db->get('invoices')->num_rows();

        //how many Partially invoice exist at invoice table--------
        $this->db->where('status','Partially');
        $total_partially=$this->db->get('invoices')->num_rows();

        //how many Unpaid invoice exist at invoice table--------
        $this->db->where('status','Unpaid');
        $total_unpaid=$this->db->get('invoices')->num_rows();


        //sum all subtotal amount for total payments of admin_home--------
            $this->db->select_sum('sub_total');
            $total_amount= $this->db->get('invoices')->row();
            // echo '<pre>';
            // print_r($total_amount);
            // die();
        
    ?>
	<div class="row"> 
        <div class="col-md-6">
            <div class="row">
                 <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-primary"><?php echo lang('total_clients')?></h4>
                            <a href="#" class="view"><i class="zmdi zmdi-accounts-outline"></i></a>
                        </div> 
                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2><?php echo $total_client; ?></h2>
                        </div>   
                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-warning"> <?php echo lang('total_invoices')?></h4>
                            <a href="#" class="view"><i class="zmdi zmdi-file-text"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2><?php echo $total_invoice; ?></h2>
                        </div>  
                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-success"><?php echo lang('total_payments')?></h4>
                            <a href="#" class="view"><i class="zmdi zmdi-card"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2>
                                <?php if($total_amount->sub_total){             
                                rs_currency($total_amount->sub_total);
                                ?>
                                <?php } else {
                                rs_currency(0)
                                ?>
                                <?php } ?>
                           </h2>
                        </div>  

                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-danger"><?php echo lang('total_products')?></h4>
                            <a href="#" class="view"><i class="zmdi zmdi-shopping-cart"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2><?php echo $total_products;?></h2>
                        </div>  
                    </div>
                </div>
                <!-- Top Report End -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report  bg-primary ">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-white"><?php echo lang('paid_invoices')?></h4>
                            <a href="#" class="view text-white"><i class="zmdi zmdi-shield-check"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2 class="text-white"><?php echo $total_paid;?></h2>
                        </div>  
                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report  bg-warning ">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-white"><?php echo lang('unpaid_invoices')?></h4>
                            <a href="#" class="view text-white"><i class="zmdi zmdi-alert-octagon"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2 class="text-white"><?php echo $total_unpaid;?></h2>
                        </div>  
                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report  bg-success ">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-white"><?php echo lang('partially_paid')?></h4>
                            <a href="#" class="view text-white"><i class="zmdi zmdi-card"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2 class="text-white"><?php echo $total_partially;?></h2>
                        </div>  
                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report  bg-danger ">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-white"><?php echo lang('overdue_invoices')?></h4>
                            <a href="#" class="view text-white"><i class="zmdi zmdi-arrow-missed"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2 class="text-white">
                                <?php echo $total_overdue?>
                            </h2>
                        </div>  
                    </div>
                </div>
                <!-- Top Report End -->
            </div>
        </div>
       
       

        <!-- Revenue Statistics Chart Start -->
        <div class="col-md-8 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title"><?php echo lang('yearly_income_overview')?></h4>
                </div>
                <div class="box-body">
                    <div class="chart-legends-1 row">
                        <div class="chart-legend-1 col-12 col-sm-4">
                            <h5 class="title"><?php echo lang('total_sale')?></h5>
                            <h3 class="value text-secondary">
                                <?php if($total_amount->sub_total){             
                                rs_currency($total_amount->sub_total);
                                ?>
                                <?php } else {
                                rs_currency(0)
                                ?>
                                <?php } ?>
                            </h3>
                        </div>
                     
                   
                    </div>
                    <div class="chartjs-revenue-statistics-chart">
                        <canvas id="chartjs-revenue-statistics-chart"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- Revenue Statistics Chart End -->

        <?php
            $this->db->select('invoices.*,clients.client_name');
            $this->db->from('invoices');      
            $latest_invoice=$this->db->join('clients','clients.id=invoices.client_id')->order_by('id','desc')->limit(5)
             ->get()->result();
            // echo '<pre>';
            // print_r($latest_invoice);
            // die();
            
            $this->db->where('group_name','General');
            $dollar=$this->db->get('settings')->result();

        ?>

        <!-- Market Trends Chart Start -->
        <div class="col-md-4 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title"><?php echo lang('payment_overview')?></h4>
                </div>
                <div class="box-body">
                    <div class="chartjs-market-trends-chart">
                        <canvas id="chartjs-market-trends-chart"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- Market Trends Chart End -->
        <div class="col-12">
            <div class="box">
                <div class="box-head">
                    <h4 class="title"><?php echo lang('latest_invoice')?></h4>
                </div>
    <div class="box-body"> 
      <div class="  py-primary">       
        <table id="example1" class="table table-bordered  data-table  ">
              <thead>
              <tr>
                <th><?php echo lang('invoice_number')?></th>
                <th><?php echo lang('Status')?></th>
                <th><?php echo lang('Client')?></th>
                <th><?php echo lang('due_date')?></th>
                <th><?php echo lang('Amount')?></th>
                <th><?php echo lang('Paid')?></th>
                <th><?php echo lang('amount_due')?></th>
                <th><?php echo lang('Action')?></th>                    
              </tr>
              </thead>
              <tbody>
               <?php foreach($latest_invoice as $key=>$row):?>
                  <tr>
                      <td><?php echo $row->invoice_number?></td>
                      <td>
                         <?php echo rs_status($row->status,$row->due_amount);?>
                      </td>
                      <td><?php echo $row->client_name?></td>
                      <td>
                        <?php echo rs_date($row->due_date);?>
                      </td>
                      <td>
                        <?php if($row->sub_total){             
                        rs_currency($row->sub_total);
                        ?>
                        <?php } else {
                        rs_currency(0)
                        ?>
                        <?php } ?>
                      </td>
                      <td>
                      <?php if($row->received_amount){             
                        rs_currency($row->received_amount);
                        ?>
                        <?php } else {
                        rs_currency(0)
                        ?>
                        <?php } ?>
                     </td>
                      <td>
                      <?php if($row->due_amount){             
                        rs_currency($row->due_amount);
                        ?>
                        <?php } else {
                        rs_currency(0)
                        ?>
                        <?php } ?>      
                    </td>
                      <td>

                        <a href="<?php echo base_url();?>view_invoices/<?php echo $row->invoice_number?>" class="dropdown-item px-4 py-2"><i class="fas fa-eye"></i></a>
                                    

                  </td>
                  </tr>
                <?php endforeach; ?>                 
              </tbody>                     
        </table>
    
      </div>
    </div>
  </div>
        </div>
    </div>
</div>
 