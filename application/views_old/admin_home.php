 
<div class="content-body">
    <div class="box mb-20">
        <div class="box-head">
            <h4 class="title">Quinck Link</h4>
        </div>
        <div class="box-body">
            <a href="<?php echo base_url()?>client_index" id="client_add" class="btn btn-outline-primary mr-2"> 
                <i class="zmdi zmdi-account"></i> <?php echo lang('Add Clients')?> 
            </a>
            <a href="<?php echo base_url()?>product_index" class="btn btn-outline-primary mr-2"> 
                <i class="ti-package"></i> <?php echo lang('Add Product')?>
            </a>
            <a href="<?php echo base_url()?>invoice_index" class="btn btn-outline-primary mr-2"> 
                <i class="far fa-file-alt"></i> <?php echo lang('Add Invoice')?> 
            </a>
            <a href="<?php echo base_url()?>Payment summary"" class="btn btn-outline-primary mr-2"> 
                <i class="fas fa-dollar-signt"></i> <?php echo lang('Payment summary"')?>
            </a>
            <a href="<?php echo base_url()?>client_statement" class="btn btn-outline-primary mr-2"> 
                <i class="zmdi zmdi-account"></i> <?php echo lang('Client statement')?>
            </a>
            <a href="<?php echo base_url()?>invoice_report" class="btn btn-outline-primary mr-2"> 
                <i class="far fa-file-alt"></i> <?php echo lang('Invoice report')?>
            </a>
          

        </div>
    </div>
    <?php
        $total_client=$this->db->get('Clients')->num_rows();
        $total_invoice=$this->db->get('Invoices')->num_rows();
        $total_Products=$this->db->get('Products')->num_rows();

        //how many paid invoice exist at invoice table--------
        $this->db->where('status','Paid');
        $total_paid=$this->db->get('Invoices')->num_rows();

        //how many Overdue invoice exist at invoice table--------
        $this->db->where('status','Overdue');
        $total_overdue=$this->db->get('Invoices')->num_rows();

        //how many Partially invoice exist at invoice table--------
        $this->db->where('status','Partially');
        $total_partially=$this->db->get('Invoices')->num_rows();

        //how many Unpaid invoice exist at invoice table--------
        $this->db->where('status','Unpaid');
        $total_unpaid=$this->db->get('Invoices')->num_rows();


        //sum all subtotal amount for total Payments of admin_home--------
            $this->db->select_sum('sub_total');
            $total_amount= $this->db->get('Invoices')->row();
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
                            <h4 class="text-primary"><?php echo lang('Total Clients')?></h4>
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
                            <h4 class="text-warning"> <?php echo lang('Total Invoices')?></h4>
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
                            <h4 class="text-success"><?php echo lang('Total Payments')?></h4>
                            <a href="#" class="view"><i class="zmdi zmdi-card"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2><?php echo $total_amount->sub_total;?></h2>
                        </div>  

                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-danger"><?php echo lang('Total Products')?></h4>
                            <a href="#" class="view"><i class="zmdi zmdi-shopping-cart"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2><?php echo $total_Products;?></h2>
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
                            <h4 class="text-white"><?php echo lang('Paid Invoices')?></h4>
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
                            <h4 class="text-white"><?php echo lang('Unpaid Invoices')?></h4>
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
                            <h4 class="text-white"><?php echo lang('Partially paid')?></h4>
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
                            <h4 class="text-white"><?php echo lang('Overdue Invoices')?></h4>
                            <a href="#" class="view text-white"><i class="zmdi zmdi-arrow-missed"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2 class="text-white"><?php echo $total_overdue?></h2>
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
                    <h4 class="title"><?php echo lang('Yearly income overview')?></h4>
                </div>
                <div class="box-body">
                    <div class="chart-legends-1 row">
                        <div class="chart-legend-1 col-12 col-sm-4">
                            <h5 class="title"><?php echo lang('Total Sale')?></h5>
                            <h3 class="value text-secondary">
                                <?php if($total_amount->sub_total){             
                                byte_format($total_amount->sub_total);
                                ?>
                                <?php } else {
                                byte_format(0)
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
            $this->db->select('Invoices.*,Clients.client_name');
            $this->db->from('Invoices');      
            $latest_invoice=$this->db->join('Clients','Clients.id=Invoices.client_id')->order_by('id','desc')->limit(5)
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
                    <h4 class="title"><?php echo lang('Payment overview')?></h4>
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
                    <h4 class="title"><?php echo lang('latest invoice')?></h4>
                </div>
    <div class="box-body"> 
      <div class="  py-primary">       
        <table id="example1" class="table table-bordered  data-table  ">
              <thead>
              <tr>
                <th><?php echo lang('Invoice number')?></th>
                <th><?php echo lang('Status')?></th>
                <th><?php echo lang('Client')?></th>
                <th><?php echo lang('Due date')?></th>
                <th><?php echo lang('Amount')?></th>
                <th><?php echo lang('Paid')?></th>
                <th><?php echo lang('Amount due')?></th>
                <th><?php echo lang('Action')?></th>                    
              </tr>
              </thead>
              <tbody>
               <?php foreach($latest_invoice as $key=>$row): 
                $due_date= $row->due_date;
                // echo $due_date;
                // die();
                 $timestamp = strtotime($due_date);
                ?>
                  <tr>
                      <td><?php echo $row->invoice_number?></td>
                      <td>
                        <?php 
                        
                        if(($row->status=='Unpaid')&&($row->due_amount>0)){
                        echo "<span class='badge badge-secondary badge-pill ml-2  '>Unpaid</span>";
                        
                        }
                        else if(($row->status=='Partially')&&($row->due_amount>0)){
                        echo "<span class='badge badge-primary badge-pill ml-2  '>Partially Paid</span>";
                        
                        }
                        else if(($row->status=='Overdue')&&($row->due_amount>0)){
                        echo "<span class=' badge badge-danger badge-pill ml-2  '>Overdue</span>";
                        
                        }
                        else{
                        echo "<span class='badge badge-success badge-pill ml-2  '>Paid</span>";
                        
                        }

                        ?>

                      </td>
                      <td><?php echo $row->client_name?></td>
                      <td>
                          <?php if($dollar[6]->settings_value=='DD-MM-YYYY'){
                        
                         
                        $new_due_date = date('d-m-y', $timestamp);
                        echo $new_due_date;

                        ?>
                      <?php } else if($dollar[6]->settings_value=='MM-DD-YYYY'){
                              
                              $new_due_date = date('m-d-y', $timestamp);
                             echo $new_due_date;
                        ?>

                     <?php } else if($dollar[6]->settings_value=='YYYY-MM-DD'){
                           
                             $new_due_date = date('y-m-d', $timestamp);
                             echo $new_due_date;
                       ?>

                     <?php } else if($dollar[6]->settings_value=='DD/MM/YYYY'){
                            
                             $new_due_date = date('d/m/y', $timestamp);
                             echo $new_due_date;
                       ?>
                       
                     <?php } else if($dollar[6]->settings_value=='MM/DD/YYYY'){
                          
                           $new_due_date = date('m/d/y', $timestamp);
                           echo $new_due_date;
                       ?>
                       
                     <?php } else if($dollar[6]->settings_value=='YYYY/MM/DD'){
                           
                           $new_due_date = date('y/m/d', $timestamp);
                           echo $new_due_date;
                       ?>
                       
                     <?php } else if($dollar[6]->settings_value=='DD.MM.YYYY'){
                          
                           $new_due_date = date('d.m.y', $timestamp);
                           echo $new_due_date;
                       
                       ?>
                       
                     <?php } else if($dollar[6]->settings_value=='MM.DD.YYYY'){
                            
                             $new_due_date = date('m.d.y', $due_dtimestampate);
                             echo $new_due_date;
                       ?>
                     
                     <?php } else{
                            
                             $new_due_date = date('y.m.d', $timestamp);
                             echo $new_due_date;
                       ?>   
                     <?php } ?>
                        
                        </td>
                      <td>
                        <?php if($row->sub_total){             
                        byte_format($row->sub_total);
                        ?>
                        <?php } else {
                        byte_format(0)
                        ?>
                        <?php } ?>
                      </td>
                      <td>
                      <?php if($row->received_amount){             
                        byte_format($row->received_amount);
                        ?>
                        <?php } else {
                        byte_format(0)
                        ?>
                        <?php } ?>
                     </td>
                      <td>
                      <?php if($row->due_amount){             
                        byte_format($row->due_amount);
                        ?>
                        <?php } else {
                        byte_format(0)
                        ?>
                        <?php } ?>      
                    </td>
                      <td>

                        <a href="<?php echo base_url();?>view_Invoices/<?php echo $row->invoice_number?>" class="dropdown-item px-4 py-2"><i class="fas fa-eye"></i></a>
                                    

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

   