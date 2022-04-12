 
<div class="content-body">
    <div class="box mb-20">
        <div class="box-head">
            <h4 class="title">Quinck Link</h4>
        </div>
          <div class="box-body">
         
            <a href="<?php echo base_url()?>payment_index" class="btn btn-outline-primary mr-2"> 
                <i class="ti-package"></i> Add Payment 
            </a>
            <a href="<?php echo base_url()?>invoice_index" class="btn btn-outline-primary mr-2"> 
                <i class="far fa-file-alt"></i> Add Invoice 
            </a>
            <a href="<?php echo base_url()?>Payment summary"" class="btn btn-outline-primary mr-2"> 
                <i class="fas fa-dollar-signt"></i> Payment summary
            </a>
            <a href="<?php echo base_url()?>client_statement" class="btn btn-outline-primary mr-2"> 
                <i class="zmdi zmdi-account"></i> Client statement
            </a>
            <a href="<?php echo base_url()?>invoice_report" class="btn btn-outline-primary mr-2"> 
                <i class="far fa-file-alt"></i> Invoice report
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
               
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-warning">Total Invoices</h4>
                            <a href="#" class="view"><i class="zmdi zmdi-file-text"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2>140</h2>
                        </div>  
                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-success">Total Payments</h4>
                            <a href="#" class="view"><i class="zmdi zmdi-card"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2>$41570.00</h2>
                        </div>  

                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-danger">Total Products</h4>
                            <a href="#" class="view"><i class="zmdi zmdi-shopping-cart"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2>56</h2>
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
                            <h4 class="text-white">Paid Invoices</h4>
                            <a href="#" class="view text-white"><i class="zmdi zmdi-shield-check"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2 class="text-white">5</h2>
                        </div>  
                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report  bg-warning ">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-white">Unpaid Invoices</h4>
                            <a href="#" class="view text-white"><i class="zmdi zmdi-alert-octagon"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2 class="text-white">10</h2>
                        </div>  
                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report  bg-success ">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-white">Partially paid</h4>
                            <a href="#" class="view text-white"><i class="zmdi zmdi-card"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2 class="text-white">5</h2>
                        </div>  
                    </div>
                </div>
                <!-- Top Report End -->
                <!-- Top Report Start -->
                <div class="col-xlg-6 col-md-6 col-12 mb-30">
                    <div class="top-report  bg-danger ">

                        <!-- Head -->
                        <div class="head">
                            <h4 class="text-white">Overdue Invoices</h4>
                            <a href="#" class="view text-white"><i class="zmdi zmdi-arrow-missed"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content mb-0"> 
                            <h2 class="text-white">5</h2>
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
                    <h4 class="title">Yearly income overview</h4>
                </div>
                <div class="box-body">
                    <div class="chart-legends-1 row">
                        <div class="chart-legend-1 col-12 col-sm-4">
                            <h5 class="title">Total Sale</h5>
                            <h3 class="value text-secondary">$5000,000</h3>
                        </div>
                     
                   
                    </div>
                    <div class="chartjs-revenue-statistics-chart">
                        <canvas id="chartjs-revenue-statistics-chart"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- Revenue Statistics Chart End -->

        <!-- Market Trends Chart Start -->
        <div class="col-md-4 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Payment overview</h4>
                </div>
                <div class="box-body">
                    <div class="chartjs-market-trends-chart">
                        <canvas id="chartjs-market-trends-chart"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- Market Trends Chart End -->
    
    </div>
</div>