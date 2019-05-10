<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CRM Admin Panel</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
   </head>
   <body class="hold-transition sidebar-mini">
   <!--preloader-->
      <div id="preloader">
         <div id="status"></div>
      </div>
      <!-- Site wrapper -->
      <div class="wrapper">
         <header class="main-header">
            <a href="index.php" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
               <img src="assets/dist/img/mini-logo.png" alt="">
               </span>
               <span class="logo-lg">
               <img src="assets/dist/img/logo.png" alt="">
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
               <a href="#search"><span class="pe-7s-search"></span></a>
               <div id="search">
                  <button type="button" class="close">×</button>
                  <form>
                     <input type="search" value="" placeholder="Search.." />
                     <button type="submit" class="btn btn-add">Search...</button>
                  </form>
               </div>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- Orders -->
                     <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle admin-notification" data-toggle="dropdown"> 
                        <i class="pe-7s-cart"></i>
                        <span class="label label-primary">5</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li >
                                    <!-- start Orders -->
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/basketball-jersey.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>polo shirt</h4>
                                       <p><strong>total item:</strong> 21
                                       </p>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/shirt.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Kits</h4>
                                       <p><strong>total item:</strong> 11
                                       </p>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/football.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Football</h4>
                                       <p><strong>total item:</strong> 16
                                       </p>
                                    </a>
                                 </li>
                                 <li class="nav-list">
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/shoe.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Sports sheos</h4>
                                       <p><strong>total item:</strong> 10
                                       </p>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <!-- Messages -->
                     <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-mail"></i>
                        <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li>
                                    <!-- start message -->
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/avatar.png" class="img-circle" alt="User Image">
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
                                          <img src="assets/dist/img/avatar2.png" class="img-circle" alt="User Image">
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
                                          <img src="assets/dist/img/avatar3.png" class="img-circle" alt="User Image">
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
                                          <img src="assets/dist/img/avatar4.png" class="img-circle" alt="User Image">
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
                                          <img src="assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
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
                     </li>
                     <!-- Notifications -->
                     <li class="dropdown notifications-menu">
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
                     </li>
                     <!-- Tasks -->
                     <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-note2"></i>
                        <span class="label label-danger">6</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-success pull-right">50%</span>
                                       <h3><i class="fa fa-check-circle"></i> Theme color should be change</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-warning pull-right">90%</span>
                                       <h3><i class="fa fa-check-circle"></i> Fix Error and bugs</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-danger pull-right">80%</span>
                                       <h3><i class="fa fa-check-circle"></i> Sidebar color change</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-info pull-right">30%</span>   
                                       <h3><i class="fa fa-check-circle"></i> font-family should be change</h3>
                                    </a>
                                 </li>
                                 <li>
                                    <!-- Task item -->
                                    <a href="#"  class="border-gray">
                                       <span class="label label-success pull-right">60%</span>
                                       <h3><i class="fa fa-check-circle"></i> Fix the database Error</h3>
                                    </a>
                                 </li>
                                 <li>
                                    <!-- Task item -->
                                    <a href="#"  class="border-gray">
                                       <span class="label label-info pull-right">20%</span>
                                       <h3><i class="fa fa-check-circle"></i> data table data missing</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <!-- Help -->
                     <li class="dropdown dropdown-help hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-settings"></i></a>
                        <ul class="dropdown-menu" >
                           <li>
                              <a href="profile.php">
                              <i class="fa fa-line-chart"></i> Networking</a>
                           </li>
                           <li><a href="#"><i class="fa fa fa-bullhorn"></i> Lan settings</a></li>
                           <li><a href="#"><i class="fa fa-bar-chart"></i> Settings</a></li>
                           <li><a href="login.php">
                              <i class="fa fa-wifi"></i> wifi</a>
                           </li>
                        </ul>
                     </li>
                     <!-- user -->
                     <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/dist/img/avatar5.png" class="img-circle" width="45" height="45" alt="user"></a>
                        <ul class="dropdown-menu" >
                           <li>
                              <a href="profile.php">
                              <i class="fa fa-user"></i> User Profile</a>
                           </li>
                           <li><a href="#"><i class="fa fa-inbox"></i> Inbox</a></li>
                           <li><a href="login.php">
                              <i class="fa fa-sign-out"></i> Signout</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="index.php"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-users"></i><span>Customers</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="add-customer.php">Add Customer</a></li>
                        <li><a href="clist.php">List</a></li>
                        <li><a href="group.php">Groups</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-shopping-basket"></i><span>Transaction</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="deposit.php">New Deposit</a></li>
                        <li><a href="expense.php">New Expense</a></li>
                        <li><a href="transfer.php">Transfer</a></li>
                        <li><a href="view-tsaction.php">View transaction</a></li>
                        <li><a href="balance.php">Balance Sheet</a></li>
                        <li><a href="treport.php">Transfer Report</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-shopping-cart"></i><span>Sales</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="invoice.php">Invoices</a></li>
                        <li><a href="ninvoices.php">New Invoices</a></li>
                        <li><a href="recurring.php">Recurring invoices</a></li>
                        <li><a href="nrecurring.php">New Recurring invoices</a></li>
                        <li><a href="quote.php">quotes</a></li>
                        <li><a href="nquote.php">New quote</a></li>
                        <li><a href="payment.php">Payments</a></li>
                        <li><a href="taxeport.php">Tax Rates</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-book"></i><span>Task</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="rtask.php">Running Task</a></li>
                        <li><a href="atask.php">Archive Task</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-shopping-bag"></i><span>Accounting</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="cpayment.php">Client payment</a></li>
                        <li><a href="emanage.php">Expense management</a></li>
                        <li><a href="ecategory.php">Expense Category</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-file-text"></i><span>Report</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="preport.php">Project Report</a></li>
                        <li><a href="creport.php">Client Report</a></li>
                        <li><a href="ereport.php">Expense Report</a></li>
                        <li><a href="incomexp.php">Income expense comparesion</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-bell"></i><span>Attendance</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="thistory.php">Time History</a></li>
                        <li><a href="timechange.php">Time Change Request</a></li>
                        <li><a href="atreport.php">Attendance Report</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-edit"></i><span>Recruitment</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="jpost.php">Jobs Posted</a></li>
                        <li><a href="japp.php">Jobs Application</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-shopping-basket"></i><span>payroll</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="salary.php">Salary Template</a></li>
                        <li><a href="hourly.php">Hourly</a></li>
                        <li><a href="managesal.php">Manage salary</a></li>
                        <li><a href="empsallist.php">Employee salary list</a></li>
                        <li><a href="mpayment.php">Make payment</a></li>
                        <li><a href="generatepay.php">Generate payslip</a></li>
                        <li><a href="paysum.php">Payroll summary</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-bitbucket-square"></i><span>Stock</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="stockcat.php">Stock category</a></li>
                        <li><a href="manstock.php">Manage Stock</a></li>
                        <li><a href="astock.php">Assign stock</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-ticket"></i><span>Tickets</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="ticanswer.php">Answered</a></li>
                        <li><a href="ticopen.php">Open</a></li>
                        <li><a href="iprocess.php">Inprocess</a></li>
                        <li><a href="close.php">CLosed</a></li>
                        <li><a href="allticket.php">All Tickets</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-list"></i>
                     <span>Utilities</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="ativitylog.php">Activity Log</a></li>
                        <li><a href="emailmes.php">Email message log</a></li>
                        <li><a href="systemsts.php">System status</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-bar-chart"></i><span>Charts</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li class=""><a href="charts_flot.php">Flot Chart</a></li>
                        <li><a href="charts_Js.php">Chart js</a></li>
                        <li><a href="charts_morris.php">Morris Charts</a></li>
                        <li><a href="charts_sparkline.php">Sparkline Charts</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-briefcase"></i>
                     <span>Icons</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="icons_bootstrap.php">Bootstrap Icons</a></li>
                        <li><a href="icons_fontawesome.php">Fontawesome Icon</a></li>
                        <li><a href="icons_flag.php">Flag Icons</a></li>
                        <li><a href="icons_material.php">Material Icons</a></li>
                        <li><a href="icons_weather.php">Weather Icons </a></li>
                        <li><a href="icons_line.php">Line Icons</a></li>
                        <li><a href="icons_pe.php">Pe Icons</a></li>
                        <li><a href="icon_socicon.php">Socicon Icons</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-list"></i> <span>Other page</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="forget_password.php">Forget password</a></li>
                        <li><a href="lockscreen.php">Lockscreen</a></li>
                        <li><a href="404.php">404 Error</a></li>
                        <li><a href="505.php">505 Error</a></li>
                        <li><a href="blank.php">Blank Page</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-bitbucket"></i><span>UI Elements</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="buttons.php">Buttons</a></li>
                        <li><a href="tabs.php">Tabs</a></li>
                        <li><a href="notification.php">Notification</a></li>
                        <li><a href="tree-view.php">Tree View</a></li>
                        <li><a href="progressbars.php">Progressber</a></li>
                        <li><a href="list.php">List View</a></li>
                        <li><a href="typography.php">Typography</a></li>
                        <li><a href="panels.php">Panels</a></li>
                        <li><a href="modals.php">Modals</a></li>
                        <li><a href="icheck_toggle_pagination.php">iCheck, Toggle, Pagination</a></li>
                        <li><a href="labels-badges-alerts.php">Labels, Badges, Alerts</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-gear"></i>
                     <span>settings</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="gsetting.php">Genaral settings</a></li>
                        <li><a href="stfsetting.php">Staff settings</a></li>
                        <li><a href="emailsetting.php">Email settings</a></li>
                        <li><a href="paysetting.php">Payment</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="company.php">
                     <i class="fa fa-home"></i> <span>Companies</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="holiday.php">
                     <i class="fa fa-stop-circle"></i> <span>Public Holiday</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="user.php">
                     <i class="fa fa-user-circle"></i><span>User</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="items.php">
                     <i class="fa fa-file-o"></i><span>Items</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="department.php">
                     <i class="fa fa-tree"></i><span>Departments</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="document.php">
                     <i class="fa fa-file-text"></i> <span>Documents</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="train.php">
                     <i class="fa fa-clock-o"></i><span>Training</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="calender.php">
                     <i class="fa fa-calendar"></i> <span>Calender</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="notice.php">
                     <i class="fa fa-file-text"></i> <span>Notice Board</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="message.php">
                     <i class="fa fa-envelope-o"></i> <span>Message</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="note.php">
                     <i class="fa fa-comment"></i> <span>Notes</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Customer</h1>
                  <small>Customer list</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="clist.php"> 
                              <i class="fa fa-list"></i>  Customer List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6">
                              <div class="form-group">
                                 <label>First Name</label>
                                 <input type="text" class="form-control" placeholder="Enter First Name" required>
                              </div>
                              <div class="form-group">
                                 <label>Last Name</label>
                                 <input type="text" class="form-control" placeholder="Enter last Name" required>
                              </div>
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="email" class="form-control" placeholder="Enter Email" required>
                              </div>
                              <div class="form-group">
                                 <label>Mobile</label>
                                 <input type="number" class="form-control" placeholder="Enter Mobile" required>
                              </div>
                              <div class="form-group">
                                 <label>Picture upload</label>
                                 <input type="file" name="picture">
                                 <input type="hidden" name="old_picture">
                              </div>
                              <div class="form-group">
                                 <label>Bank details</label>
                                 <input type="text" class="form-control" placeholder="Enter Bank details" required>
                              </div>
                              <div class="form-group">
                                 <label>Passport</label>
                                 <input type="text" class="form-control" placeholder="Enter Passport details" required>
                              </div>
                              <div class="form-group">
                                 <label>Facebook Id</label>
                                 <input type="text" class="form-control" placeholder="Enter Facebook details" required>
                              </div>
                              <div class="form-group">
                                 <label>Date of Birth</label>
                                 <input id='minMaxExample' type="text" class="form-control" placeholder="Enter Date...">
                              </div>
                              <div class="form-group">
                                 <label>Address</label>
                                 <textarea class="form-control" rows="3" required></textarea>
                              </div>
                              <div class="form-group">
                                 <label>Customer type</label>
                                 <select class="form-control">
                                    <option>vendor</option>
                                    <option>vip</option>
                                    <option>regular</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Sex</label><br>
                                 <label class="radio-inline"><input name="sex" value="1" checked="checked" type="radio">Male</label> 
                                 <label class="radio-inline"><input name="sex" value="0" type="radio">Female</label>
                              </div>
                              <div class="form-check">
                                 <label>Status</label><br>
                                 <label class="radio-inline">
                                 <input type="radio" name="status" value="1" checked="checked">Active</label>
                                 <label class="radio-inline"><input type="radio" name="status" value="0" >Inctive</label>
                              </div>
                              <div class="reset-button">
                                 <a href="#" class="btn btn-warning">Reset</a>
                                 <a href="#" class="btn btn-success">Save</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <strong>Copyright &copy; 2016-2017 <a href="#">thememinister</a>.</strong> All rights reserved.
         </footer>
      </div>
      <!-- ./wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
      <!-- jquery-ui --> 
      <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="assets/dist/js/custom.js" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="assets/dist/js/dashboard.js" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
   </body>
</html>

