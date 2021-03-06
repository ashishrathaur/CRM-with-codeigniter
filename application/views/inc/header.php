<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>ZOPSOFT CRM Client Panel</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="<?= base_url('assets/dist/img/ico/favicon.png'); ?>" type="image/x-icon">
      <!-- data Table -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
      <!-- End data Table -->

      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="<?= base_url('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css'); ?>" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="<?= base_url('assets/plugins/lobipanel/lobipanel.min.css'); ?>" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="<?= base_url('assets/plugins/pace/flash.css'); ?>" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="<?= base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="<?= base_url('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css'); ?>" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="<?= base_url('assets/themify-icons/themify-icons.css'); ?>" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start page Label Plugins 
         =====================================================================-->
      <!-- Emojionearea -->
      <link href="<?= base_url('assets/plugins/emojionearea/emojionearea.min.css'); ?>" rel="stylesheet" type="text/css"/>
      <!-- Monthly css -->
      <link href="<?= base_url('assets/plugins/monthly/monthly.css'); ?>" rel="stylesheet" type="text/css"/>
      <!-- End page Label Plugins 
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="<?= base_url('assets/dist/css/stylecrm.css'); ?>" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
          <style>
            .help-block{ color: red; }
        </style>
   </head>
   <body class="hold-transition sidebar-mini">
      <!--preloader-->
      <div id="preloader">
         <div id="status"></div>
      </div>
      <!-- Site wrapper -->
      <div class="wrapper">
         <header class="main-header">
            <a href="<?= base_url('Welcome'); ?>" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
               <img src="<?= base_url('assets/dist/img/mini_zs_logo.png'); ?>" alt="">
               </span>
               <span class="logo-lg">
               <img src="<?= base_url('assets/dist/img/zs_logo.png'); ?>" alt="">
               </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <!-- Sidebar toggle button-->
                  <span class="sr-only">Toggle navigation</span>
                  <span class="pe-7s-angle-left-circle"></span>
               </a>
               <!-- searchbar-->
               <div class="col-md-3">
                  <h3 class="dashboard">Dashboard</h3>
                  <small class="small">Zopsoft Technology</small>
               </div>
               <style>
                  .dashboard{
                     color: white;
                     margin-top: 9px;
                     margin-bottom: 0px;
                     font-weight: bold;
                  }
                  .small{
                     color: white;
                     font-weight: 800;
                     letter-spacing: 0.6px;
                  }
               </style>
              <!--  <a href="#search"><span class="pe-7s-search"></span></a>
               <div id="search">
                 <button type="button" class="close">×</button>
                 <form>
                   <input type="search" value="" placeholder="Search.." />
                   <button type="submit" class="btn btn-add">Search...</button>
                </form>
             </div> -->
             <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- Orders -->
                     <!-- <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle admin-notification" data-toggle="dropdown"> 
                        <i class="pe-7s-cart"></i>
                        <span class="label label-primary">5</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li > -->
                                    <!-- start Orders -->
                                   <!--  <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="<?= base_url('assets/dist/img/basketball-jersey.png'); ?>" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>polo shirt</h4>
                                       <p><strong>total item:</strong> 21
                                       </p>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="<?= base_url('assets/dist/img/shirt.png'); ?>" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Kits</h4>
                                       <p><strong>total item:</strong> 11
                                       </p>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="<?= base_url('assets/dist/img/football.png'); ?>" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Football</h4>
                                       <p><strong>total item:</strong> 16
                                       </p>
                                    </a>
                                 </li>
                                 <li class="nav-list">
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="<?= base_url('assets/dist/img/shoe.png'); ?>" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Sports sheos</h4>
                                       <p><strong>total item:</strong> 10
                                       </p>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li> -->
                     <!-- Messages -->
                     <!-- <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-mail"></i>
                        <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li> -->
                                    <!-- start message -->
                                  <!--   <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="<?= base_url('assets/dist/img/avatar.png'); ?>" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Ronaldo</h4>
                                       <p>Please oreder 10 pices of kits..</p>
                                       <span class="badge badge-success badge-massege"><small>15 hours ago</small>
                                       </span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="<?= base_url('assets/dist/img/avatar2.png'); ?>" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Leo messi</h4>
                                       <p>Please oreder 10 pices of Sheos..</p>
                                       <span class="badge badge-info badge-massege"><small>6 days ago</small>
                                       </span>   
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left" >
                                          <img src="<?= base_url('assets/dist/img/avatar3.png'); ?>" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Modric</h4>
                                       <p>Please oreder 6 pices of bats..</p>
                                       <span class="badge badge-info badge-massege"><small>1 hour ago</small>
                                       </span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="<?= base_url('assets/dist/img/avatar4.png'); ?>" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Salman</h4>
                                       <p>Hello i want 4 uefa footballs</p>
                                       <span class="badge badge-danger badge-massege">
                                       <small>6 days ago</small>
                                       </span>  
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="<?= base_url('assets/dist/img/avatar5.png'); ?>" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Sergio Ramos</h4>
                                       <p>Hello i want 9 uefa footballs</p>
                                       <span class="badge badge-info badge-massege"><small>5 hours ago</small>
                                       </span>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li> -->
                     <!-- Notifications -->
                    <!--  <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-bell"></i>
                        <span class="label label-warning">7</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li>
                                    <a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-green"></i>Change Your font style</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-red"></i>
                                    check the system ststus..</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-yellow"></i>
                                    Add more admin...</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-violet"></i> Add more clients and order</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-yellow"></i>
                                    Add more admin...</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-violet"></i> Add more clients and order</a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li> -->
                     <!-- Tasks -->
                     <!-- <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-note2"></i>
                        <span class="label label-danger">6</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li> -->
                                    <!-- Task item -->
                                    <!-- <a href="#" class="border-gray">
                                       <span class="label label-success pull-right">50%</span>
                                       <h3><i class="fa fa-check-circle"></i> Theme color should be change</h3>
                                    </a>
                                 </li> -->
                                 <!-- end task item -->
                                 <!-- <li> -->
                                    <!-- Task item -->
                                   <!--  <a href="#" class="border-gray">
                                       <span class="label label-warning pull-right">90%</span>
                                       <h3><i class="fa fa-check-circle"></i> Fix Error and bugs</h3>
                                    </a>
                                 </li> -->
                                 <!-- end task item -->
                                 <!-- <li> -->
                                    <!-- Task item -->
                                   <!--  <a href="#" class="border-gray">
                                       <span class="label label-danger pull-right">80%</span>
                                       <h3><i class="fa fa-check-circle"></i> Sidebar color change</h3>
                                    </a>
                                 </li> -->
                                 <!-- end task item -->
                                 <!-- <li> -->
                                    <!-- Task item -->
                                   <!--  <a href="#" class="border-gray">
                                       <span class="label label-info pull-right">30%</span>   
                                       <h3><i class="fa fa-check-circle"></i> font-family should be change</h3>
                                    </a>
                                 </li>
                                 <li> -->
                                    <!-- Task item -->
                                   <!--  <a href="#"  class="border-gray">
                                       <span class="label label-success pull-right">60%</span>
                                       <h3><i class="fa fa-check-circle"></i> Fix the database Error</h3>
                                    </a>
                                 </li>
                                 <li> -->
                                    <!-- Task item -->
                                   <!--  <a href="#"  class="border-gray">
                                       <span class="label label-info pull-right">20%</span>
                                       <h3><i class="fa fa-check-circle"></i> data table data missing</h3>
                                    </a>
                                 </li> -->
                                 <!-- end task item -->
                             <!--  </ul>
                           </li>
                        </ul>
                     </li> -->
                     <!-- Help -->
                     <li class="dropdown dropdown-help hidden-xs">
                       
                        <h4 style="color: white; margin-top: 20px;"><?php echo ucwords(strtolower($this->session->userdata('user_name'))); ?></h4>
                       <!--  <ul class="dropdown-menu" >
                           <li>
                              <a href="<?= base_url('profile.php'); ?>">
                              <i class="fa fa-line-chart"></i> Networking</a>
                           </li>
                           <li><a href="#"><i class="fa fa fa-bullhorn"></i> Lan settings</a></li>
                           <li><a href="#"><i class="fa fa-bar-chart"></i> Settings</a></li>
                           <li><a href="login.php">
                              <i class="fa fa-wifi"></i> wifi</a>
                           </li>
                        </ul> -->
                     </li>
                     <!-- user -->
                     <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-settings"></i></a>
                        <ul class="dropdown-menu" >
                          <!--  <li>
                              <a href="<?= base_url('profile.php'); ?>">
                              <i class="fa fa-user"></i></a>
                           </li> -->
                           <!-- <li><a href="#"><i class="fa fa-inbox"></i> Inbox</a></li> -->
                           <li><a href="<?= base_url('logout'); ?>">
                              <i class="fa fa-sign-out"></i> Logout</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>