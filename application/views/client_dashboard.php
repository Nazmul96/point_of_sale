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
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> 
    <!-- Icon Font CSS -->

    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/vendor/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/plugins/plugins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"  />
    <!-- Helper CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/helper.css">
    <!-- intlTelInput CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css"  />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>front-end/assets/css/screen.css">
    
    <script src="<?php echo base_url();?>front-end/assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>front-end/assets/js/validate/jquery.validate.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"  ></script>

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
                <?Php 
                     $compnay_logo=$this->session->userdata('logo');
                   ?>     
                    <!-- Header Logo (Header Left) Start -->
                    <div class="header-logo col-auto">
                        <a href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>images/profile/<?php echo $compnay_logo->settings_value;?>" alt="">
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
                                                    <input type="text" placeholder="<?php echo lang('search_here')?>">
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
                                    $login_info=$this->session->userdata('login_info');
                                    // echo '<pre>';
                                    // print_r($login_info['email']);
                                    // die();         
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
                    <li <?php if($this->uri->segment(1)==""){echo 'class="active"';}?> ><a href="<?php echo base_url()?>dashboard"><i class="ti-home"></i> <span><?php echo lang('dashboard')?></span></a></li>
                 
                    <li <?php if($this->uri->segment(1)=="invoice_index"){echo 'class="active"';}?>><a href="<?php echo base_url()?>invoice_index"><i class="far fa-file-alt"></i> <span><?php echo lang('invoices')?></span></a></li>

                    <li <?php if($this->uri->segment(1)=="payment_index"){echo 'class="active"';}?>><a href="<?php echo base_url()?>payment_index"><i class="fas fa-dollar-sign"></i></i> <span><?php echo lang('payments')?></span></a></li> 
                    

                    <li class="has-sub-menu" <?php if($this->uri->segment(1)=="payment_summary"|| $this->uri->segment(1)=="client_statement" || $this->uri->segment(1)=="invoice_report"){echo 'id="active"';}?> ><a href="#"><i class="far fa-chart-bar"></i> <span><?php echo lang('reports')?></span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="<?php echo base_url()?>payment_summary"><span><?php echo lang('payment_summary')?></span></a></li>
                                <li><a href="<?php echo base_url()?>client_statement"><span><?php echo lang('client_statement')?></span></a></li>
                                <li><a href="<?php echo base_url()?>invoice_report"><span><?php echo lang('invoice_report')?></span></a></li>
                                
                            </ul>
                    </li>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"  ></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url();?>front-end/assets/js/vendor/modernizr-3.6.0.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/fontawesome.min.js"  ></script>
    <script src="<?php echo base_url();?>front-end/assets/js/vendor/popper.min.js"></script>
    <script src="<?php echo base_url();?>front-end/assets/js/vendor/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  ></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!--Plugins JS-->
    <script src="<?php echo base_url();?>front-end/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>front-end/assets/js/plugins/tippy4.min.js.js"></script>
    <!-- Plugins & Activation JS For Only This Page -->
    <script src="<?php echo base_url();?>front-end/assets/js/plugins/datatables/datatables.min.js"></script>
 
    <!--Main JS-->
    <script src="<?php echo base_url();?>front-end/assets/js/main.js"></script>
    <script src="<?php echo base_url();?>front-end/assets/js/countrypicker.js"></script>
    <!-- intlTelInput js -->

    <!-- summernote -->
    <script src="<?php echo base_url();?>front-end/assets/summernote/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"  ></script>

<script>
$( document ).ready(function() {
    //for summernote-------
      if( $('.textarea').length ) { 
        $('.textarea').summernote({
            height: 250,
        });
    }
 
//toater alert------
<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
  
//sweet alert---------
$(document).on("click","#delete",function(e){
    e.preventDefault();
    var link=$(this).attr("href");
    swal({
        title: "Are you want to Delete?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
                window.location.href=link;
          }
         else {
          swal("Save Data!");
        }
      });
  })

  //country flag------
  if($('#phone').length){
  var input = document.querySelector("#phone");
     
    window.intlTelInput(input,({
    // options here
    }));
      }

});
</script>


</body>

</html>