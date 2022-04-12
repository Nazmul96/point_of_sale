<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RS point of sale</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>front-end/assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/vendor/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <!-- Icon Font CSS -->

    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/vendor/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/vendor/themify-icons.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/vendor/cryptocurrency-icons.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"  />

    <!-- Plugins CSS -->
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/summernote/summernote-bs4.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/plugins/plugins.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"  /> -->
    <!-- Helper CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/helper.css">
    <!-- intlTelInput CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css"  /> -->
    <!-- <link rel="stylesheet" href=""   /> -->
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/style.css">

    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/screen.css">
    
   <script src="<?php echo base_url();?>front-end/assets/js/vendor/jquery-3.3.1.min.js"></script>
   


</head>

<body>

    <div class="main-wrapper">
       <input type="hidden" id="received_amount" value="<?php echo $total_amount->received_amount?>" >
        <input type="hidden" id="due_amount" value="<?php echo $total_amount->due_amount?>" >
        <input type="hidden" name="" id="all_pending" value="<?php echo $all_pending_amounnt;?>">
        <input type="hidden" name="" id="all_paid" value="<?php echo $paid->received_amount;?>">

        <!-- Header Section Start -->
        <div class="header-section">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">

                    <!-- Header Logo (Header Left) Start -->
                    <div class="header-logo col-auto">
                        <a href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>front-end/assets/images/logo/logo-light.png" alt="">
                            <img src="<?php echo base_url();?>front-end/assets/images/logo/logo-light.png" class="logo-light" alt="">
                        </a>
                    </div><!-- Header Logo (Header Left) End -->

                    <!-- Header Right Start -->
                    <div class="header-right flex-grow-1 col-auto">
                        <div class="row justify-content-between align-items-center">

                            <!-- Side Header Toggle & Search Start -->
                            <div class="col-auto">
                                <div class="row align-items-center">

                                    <!--Side Header Toggle-->
                                    <div class="col-auto"><button class="side-header-toggle"><i class="zmdi zmdi-menu"></i></button></div>

                                    <!--Header Search-->
                                    <div class="col-auto">

                                        <div class="header-search">

                                            <button class="header-search-open d-block d-xl-none"><i class="zmdi zmdi-search"></i></button>

                                            <div class="header-search-form">
                                                <form action="#">
                                                    <input type="text" placeholder="Search Here">
                                                    <button><i class="zmdi zmdi-search"></i></button>
                                                </form>
                                                <button class="header-search-close d-block d-xl-none"><i class="zmdi zmdi-close"></i></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div><!-- Side Header Toggle & Search End -->

                            <!-- Header Notifications Area Start -->
                            <div class="col-auto">

                                <ul class="header-notification-area">

                                    <!--Language-->
                                    <li class="adomx-dropdown position-relative col-auto">
                                        <a class="toggle" href="#"><img class="lang-flag" src="<?php echo base_url();?>front-end/assets/images/flags/flag-1.jpg" alt=""><i class="zmdi zmdi-caret-down drop-arrow"></i></a>

                                        <!-- Dropdown -->
                                        <ul class="adomx-dropdown-menu dropdown-menu-language">
                                            <li><a href="#"><img src="<?php echo base_url();?>front-end/assets/images/flags/flag-1.jpg" alt=""> English</a></li>
                                            <li><a href="#"><img src="<?php echo base_url();?>front-end/assets/images/flags/flag-2.jpg" alt=""> Japanese</a></li>
                                            <li><a href="#"><img src="<?php echo base_url();?>front-end/assets/images/flags/flag-3.jpg" alt=""> Spanish </a></li>
                                            <li><a href="#"><img src="<?php echo base_url();?>front-end/assets/images/flags/flag-4.jpg" alt=""> Germany</a></li>
                                        </ul>

                                    </li>

                                    <!--Mail-->
                                    <li class="adomx-dropdown col-auto">
                                        <a class="toggle overflow-visible" href="#"><i class="zmdi zmdi-email-open"></i><span class="badge"></span></a>

                                        <!-- Dropdown -->
                                        <div class="adomx-dropdown-menu dropdown-menu-mail">
                                            <div class="head">
                                                <h4 class="title">You have 3 new mail.</h4>
                                            </div>
                                            <div class="body custom-scroll">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <div class="image"><img src="<?php echo base_url();?>front-end/assets/images/avatar/avatar-2.jpg" alt=""></div>
                                                            <div class="content">
                                                                <h6>Sub: New Account</h6>
                                                                <p>There are many variations of passages of Lorem Ipsum available. </p>
                                                            </div>
                                                            <span class="reply"><i class="zmdi zmdi-mail-reply"></i></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="image"><img src="<?php echo base_url();?>front-end/assets/images/avatar/avatar-1.jpg" alt=""></div>
                                                            <div class="content">
                                                                <h6>Sub: Mail Support</h6>
                                                                <p>There are many variations of passages of Lorem Ipsum available. </p>
                                                            </div>
                                                            <span class="reply"><i class="zmdi zmdi-mail-reply"></i></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="image"><img src="<?php echo base_url();?>front-end/assets/images/avatar/avatar-2.jpg" alt=""></div>
                                                            <div class="content">
                                                                <h6>Sub: Product inquiry</h6>
                                                                <p>There are many variations of passages of Lorem Ipsum available. </p>
                                                            </div>
                                                            <span class="reply"><i class="zmdi zmdi-mail-reply"></i></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="image"><img src="<?php echo base_url();?>front-end/assets/images/avatar/avatar-1.jpg" alt=""></div>
                                                            <div class="content">
                                                                <h6>Sub: Mail Support</h6>
                                                                <p>There are many variations of passages of Lorem Ipsum available. </p>
                                                            </div>
                                                            <span class="reply"><i class="zmdi zmdi-mail-reply"></i></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </li>

                                    <!--Notification-->
                                    <li class="adomx-dropdown col-auto">
                                        <a class="toggle overflow-visible" href="#"><i class="zmdi zmdi-notifications"></i><span class="badge"></span></a>

                                        <!-- Dropdown -->
                                        <div class="adomx-dropdown-menu dropdown-menu-notifications">
                                            <div class="head">
                                                <h5 class="title">You have 4 new notification.</h5>
                                            </div>
                                            <div class="body custom-scroll">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <i class="zmdi zmdi-notifications-none"></i>
                                                            <p>There are many variations of pages available.</p>
                                                            <span>11.00 am   Today</span>
                                                        </a>
                                                        <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="zmdi zmdi-block"></i>
                                                            <p>There are many variations of pages available.</p>
                                                            <span>11.00 am   Today</span>
                                                        </a>
                                                        <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="zmdi zmdi-info-outline"></i>
                                                            <p>There are many variations of pages available.</p>
                                                            <span>11.00 am   Today</span>
                                                        </a>
                                                        <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="zmdi zmdi-shield-security"></i>
                                                            <p>There are many variations of pages available.</p>
                                                            <span>11.00 am   Today</span>
                                                        </a>
                                                        <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="zmdi zmdi-notifications-none"></i>
                                                            <p>There are many variations of pages available.</p>
                                                            <span>11.00 am   Today</span>
                                                        </a>
                                                        <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="zmdi zmdi-block"></i>
                                                            <p>There are many variations of pages available.</p>
                                                            <span>11.00 am   Today</span>
                                                        </a>
                                                        <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="zmdi zmdi-info-outline"></i>
                                                            <p>There are many variations of pages available.</p>
                                                            <span>11.00 am   Today</span>
                                                        </a>
                                                        <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="zmdi zmdi-shield-security"></i>
                                                            <p>There are many variations of pages available.</p>
                                                            <span>11.00 am   Today</span>
                                                        </a>
                                                        <button class="delete"><i class="zmdi zmdi-close-circle-o"></i></button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="footer">
                                                <a href="#" class="view-all">view all</a>
                                            </div>
                                        </div>

                                    </li>

                                    <!--User-->
                                    <?php 
                                        
                                           $all_feature=explode(',',$section->all_section);
                                        //    echo '<pre>';
                                        //    print_r($all_feature);       
                                        //    die();
                                    $login_info=$this->session->userdata('login_info');            
                                    $this->db->where('email',$login_info['email']);
                                    $info=$this->db->get('users')->row();
                                       
                                  ?>
                                    <!--User-->
                                    <li class="adomx-dropdown col-auto">
                                        <a class="toggle" href="#">
                                            <span class="user">
                                            <span class="name"><?php echo $info->first_name?> <?php echo $info->last_name?></span>
                                            </span>
                                            <span class="avatar">
                                            <img src="<?php echo base_url('images/user/'.$info->image)?>" alt="">
                                            <span class="status" id="main_profile"></span>
                                            </span>  
                                        </a>

                                        <!-- Dropdown -->
                                        <div class="adomx-dropdown-menu dropdown-menu-user">
                                            <div class="head">
                                                <h5 class="name"><a href="#"><?php echo $info->first_name;?></a></h5>
                                                <a class="mail" href="#"><?php echo $info->email;?></a>
                                            </div>
                                            <div class="body">
                                  				  <ul>
                                                    <li><a href="<?php echo base_url()?>admin_profile"><i class="zmdi zmdi-account"></i><?php                                                      echo lang('my_profile')?></a></li>
                                                    <li><a href="#"><i class="far fa-bell"></i><?php echo lang('Notificatons')?></a></li>
                                                    <li><a href="<?php echo base_url();?>setting_index"><i class="zmdi zmdi-settings"></i>
													<?php echo lang('settings')?></a></li>
                                                    <li><a href="<?php echo base_url()?>admin_logout"><i class="fas fa-sign-out-alt"></i><?php 														echo lang('Logout')?></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </li>


                                </ul>

                            </div><!-- Header Notifications Area End -->

                        </div>
                    </div><!-- Header Right End -->

                </div>
            </div>
        </div><!-- Header Section End -->
        <!-- Side Header Start -->
        <div class="side-header show">
            <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
            <!-- Side Header Inner Start -->
            <div class="side-header-inner custom-scroll">

<nav class="side-header-menu" id="side-header-menu">
                <ul>
                    <?php foreach($all_feature as $row){?>
                       <?php if($row=='dashboard'){?>
                              <li <?php if($this->uri->segment(1)==""){echo 'class="active"';}?> ><a href="<?php echo base_url()?>dashboard"><i class="ti-home"></i> <span><?php echo lang('dashboard')?></span></a></li>
                       <?php } ?>      
                    <?php } ?>     
                              
                    <?php foreach($all_feature as $row){?>
                       <?php if($row=='client'){?>
                              <li <?php if($this->uri->segment(1)=="client_index"){echo 'class="active"';}?> ><a href="<?php echo base_url()?>client_index"><i class="zmdi zmdi-account-o"></i> <span><?php echo lang('clients')?></span></a></li> 
                       <?php } ?>      
                    <?php } ?> 

                    <?php foreach($all_feature as $row){?>
                       <?php if($row=='product'){?>
                              <li <?php if($this->uri->segment(1)=="product_index"){echo 'class="active"';}?>><a href="<?php echo base_url()?>product_index"><i class="ti-package"></i> <span><?php echo lang('products')?></span></a></li>
                       <?php } ?>      
                    <?php } ?> 

                    <?php foreach($all_feature as $row){?>
                       <?php if($row=='invoice'){?>
                              <li <?php if($this->uri->segment(1)=="invoice_index"){echo 'class="active"';}?>><a href="<?php echo base_url()?>invoice_index"><i class="far fa-file-alt"></i> <span><?php echo lang('invoices')?></span></a></li>
                       <?php } ?>      
                    <?php } ?> 

                    <?php foreach($all_feature as $row){?>
                       <?php if($row=='payment'){?>
                              <li <?php if($this->uri->segment(1)=="payment_index"){echo 'class="active"';}?>><a href="<?php echo base_url()?>payment_index"><i class="fas fa-dollar-sign"></i></i> <span><?php echo lang('payments')?></span></a></li> 
                       <?php } ?>      
                    <?php } ?> 

                    <?php foreach($all_feature as $row){?>
                       <?php if($row=='report'){?>
                              <li class="has-sub-menu" <?php if($this->uri->segment(1)=="payment_summary"|| $this->uri->segment(1)=="client_statement" || $this->uri->segment(1)=="invoice_report"){echo 'id="active"';}?> ><a href="#"><i class="far fa-chart-bar"></i> <span><?php echo lang('reports')?></span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="<?php echo base_url()?>payment_summary"><span><?php echo lang('payment_summary')?></span></a></li>
                                <li><a href="<?php echo base_url()?>client_statement"><span><?php echo lang('client_statement')?></span></a></li>
                                <li><a href="<?php echo base_url()?>invoice_report"><span><?php echo lang('invoice_report')?></span></a></li>
                                
                            </ul>
                         </li>
                       <?php } ?>      
                    <?php } ?> 

                    <?php foreach($all_feature as $row){?>
                       <?php if($row=='user_roles'){?>
                           
                              <li <?php if($this->uri->segment(1)=="user_roles_index"){echo 'class="active"';}?> >
                              <a href="<?php echo base_url()?>user_roles_index"><i class="zmdi zmdi-account-box-o"></i> <span><?php echo lang('users_Roles')?></span></a>
                              </li>  
                       <?php } ?>      
                    <?php } ?> 
                    <?php foreach($all_feature as $row){?>
                       <?php if($row=='setting'){?>
                    <li <?php if($this->uri->segment(1)=="setting_index"){echo 'class="active"';}?> >
                        <a href="<?php echo base_url()?>setting_index"><i class="fas fa-cogs"></i> <span><?php echo lang('settings')?></span></a>
                    </li>
                       <?php } ?>      
                    <?php } ?> 
                          

                    </ul>
                </nav>

            </div><!-- Side Header Inner End -->
        </div><!-- Side Header End -->

        <!-- Content Body Start -->
        <?php echo $main_content;?>
        <!-- Content Body End -->

        <!-- Footer Section Start -->
        <!-- Footer Section End -->

    </div>

   

 <!-- JS
============================================ -->

    <!-- Global Vendor, plugins & Activation JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/fontawesome.min.js"  ></script>
    <script src="<?php echo base_url();?>front-end/assets/js/vendor/popper.min.js"></script>
    <script src="<?php echo base_url();?>front-end/assets/js/vendor/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  ></script>

    <!-- Plugins & Activation JS For Only This Page -->
    <script src="<?php echo base_url();?>front-end/assets/js/plugins/datatables/datatables.min.js"></script>
 
    <!--Main JS-->
    <script src="<?php echo base_url();?>front-end/assets/js/main.js"></script>
    

    <!--Echarts-->
    <script src="<?php echo base_url();?>front-end/assets/js/plugins/chartjs/Chart.min.js"></script>
    <script src="<?php echo base_url();?>front-end/assets/js/plugins/chartjs/chartjs.active.js"></script>


<script>
 
    
        
 (function ($) {
    var rafi='<?php echo json_encode($monthly_sales)?>';
    //console.log(rafi);
    var myarray=JSON.parse(rafi);
    var janu=myarray[1].sub_total;
    var feb=myarray[2].sub_total;
    var march=myarray[3].sub_total;
    var apr=myarray[4].sub_total;
    var may=myarray[5].sub_total;
    var june=myarray[6].sub_total;
    var july=myarray[7].sub_total;
    var auguest=myarray[8].sub_total;
    var sep=myarray[9].sub_total;
    var oct=myarray[10].sub_total;
    var nov=myarray[11].sub_total;
    var dec=myarray[12].sub_total;
    if(janu == null){
        janu=0;
    }
    if(feb == null){
        feb=0;
    }
    if(march == null){
        march=0;
    }
    if(apr == null){
        apr=0;
    }
    if(may == null){
        may=0;
    }
    if(june == null){
        june=0;
    }
    if(july == null){
        july=0;
    }
    if(auguest == null){
        auguest=0;
    }
    if(sep == null){
        sep=0;
    }
    if(oct == null){
        sep=0;
    }
    if(nov == null){
        sep=0;
    }
    if(dec == null){
        dec=0;
    }
    // console.log(janu);
    // console.log(feb);
    // console.log(march);
    // console.log(apr);
    // console.log(may);
    // console.log(june);
    // console.log(july);
    // console.log(auguest);
    // console.log(sep);
    // console.log(oct);
    // console.log(nov);
    // console.log(dec);


    "use strict";
    if( $('#chartjs-revenue-statistics-chart').length ) {
        var RSC = document.getElementById('chartjs-revenue-statistics-chart').getContext('2d');
        var RSCconfig = {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar','Apr', 'May','Jun', 'Jul','Aug', 'Sep','Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Total Sale',
                    data: [janu,feb,march,apr,may,june,july,auguest,sep,oct,nov,dec],
                    backgroundColor: '#fb7da4',
                    borderColor: '#fb7da4',
                    borderWidth: 3,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#fb7da4',
                    pointBorderWidth: 3,
                    pointRadius: 6,
                    pointHoverBackgroundColor: '#ffffff',
                    pointHoverBorderWidth: 3,
                    pointHoverRadius: 6,
                    fill: false,
                    lineTension: 0
                } ]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    labels: {
                        fontColor: '#aaaaaa',
                    }
                },
                tooltips: {
                    mode: 'point',
                    intersect: false,
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                    cornerRadius: 4,
                    titleFontSize: 0,
                    titleMarginBottom: 2,
                    displayColors: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            fontColor: '#aaaaaa',
                        },
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: {
                            color: 'rgba(136,136,136,0.1)',
                            lineWidth: 1,
                            drawBorder: false,
                            zeroLineWidth: 1,
                            zeroLineColor: 'rgba(136,136,136,0.1)',
                        },
                        ticks: {
                            padding: 15,
                            stepSize: 20,
                            fontColor: '#aaaaaa',
                        },
                    }]
                }
            }
        };
        var RSCchartjs = new Chart(RSC, RSCconfig);
    }
    
   
    
    if( $('#chartjs-market-trends-chart').length ) {
        var received=$('#received_amount').val();
        var due=$('#due_amount').val();
        var pending=$('#all_pending').val();
        var paid=$('#all_paid').val();  
        //alert(paid); 
        var MTC = document.getElementById('chartjs-market-trends-chart').getContext('2d');
        var MTCconfig = {
            type: 'doughnut',
            data: {
                labels: ['Received amount', 'Due amount',  'Paid amount','Pending amount' ],
                datasets: [{
                    data: [received, due,paid,pending,],
                    backgroundColor: [
                        '#fb7da4',
                        '#7dfb9b',
                        '#ff9666',
                        '#428bfa',
                    ],
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    labels: {
                        boxWidth: 30,
                        padding: 20,
                        fontColor: '#aaaaaa',
                    }
                },
                tooltips: {
                    mode: 'point',
                    intersect: false,
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                    cornerRadius: 4,
                    titleFontSize: 0,
                    titleMarginBottom: 2,
                },
				animation: {
					animateScale: true,
					animateRotate: true
				},
            }
        };
        var MTCchartjs = new Chart(MTC, MTCconfig);
    }
    
    
})(jQuery);

</script>


</body>

</html>