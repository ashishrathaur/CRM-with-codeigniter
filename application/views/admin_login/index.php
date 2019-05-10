<?php
if(!$this->session->userdata('id')){
      return redirect('admin/Login');
      }
error_reporting(0);
 include "inc/header.php" ?> <!-- Header Navbar -->
         <!-- =============================================== -->
       <?php include "inc/sidebar.php" ?> <!-- Left side column. contains the sidebar -->
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
          <!--   <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-dashboard"></i>
               </div>
               <div class="header-title">
                  <h1>Zopsoft Dashboard</h1>
                  <small>Zopsoft Technology</small>
               </div>
            </section> -->
            <!-- Main content -->
            <style>
               @media (max-width: 767px){
                  .content {
                      padding: 20px 15px 10px;
                  }
               }
            </style>
            <section class="content">
               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                      <!-- <a href="<?= base_url('customer/unpaid_service');?>"> -->
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-user-secret fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">1</span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Active Admin </h3>
                        </div>
                     </div>
                  <!-- </a> -->
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="<?= base_url('admin/customer');?>">
                     <div id="cardbox1">
                        <div class="statistic-box">
                           <i class="fa fa-user-plus fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php print_r(count($clientcount)); ?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Total Client</h3>
                        </div>
                     </div></a>
                  </div>
                  
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="<?= base_url('admin/customer/currentMonthData');?>">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-inr fa-3x"></i>
                           <div class="counter-number pull-right">
                              <!-- <i class="ti ti-money"> --><!-- </i> --><span class="count-number">
                                 <?php
                                 $amount = 0;
                                 foreach($monthcount as $monthcountData):
                                          $renewals = '+'.$monthcountData->productValidity;
                                          $renewalsStringdate = strtotime($renewals, $monthcountData->subscriptionDate);
                                          $DueDate = date("Y-m", $renewalsStringdate);

                                          $sub_date = date("Y-m", $monthcountData->subscriptionDate);
                                          $currentMonth = date("Y-m");
                                          $payment = $monthcountData->pay_status;
                                          if($renewalsStringdate <= strtotime("now") || $sub_date == $currentMonth):

                                          // $date1 = date_create($monthcountData->join_date);
                                          // $joindate1 = date_format($date1,"Y-m");
                                          // $currentMont = date("Y-m");
                                          // if($joindate1 == $currentMont):
                                          // echo $pay_date1;
                                          $count[] = $monthcountData;
                                          $amount += $monthcountData->productAmount;
                                  
                               endif;                               
                               endforeach;
                               print_r(count($count));
                                  ?>

                              </span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3><?php echo number_format($amount);?> Collected this Month</h3>
                        </div>
                     </div>
                  </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                      <a href="<?= base_url('admin/customer/unpaid_service');?>">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-inr fa-3x" style="color: #c31f1f"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php print_r(count($unpaidcount)); ?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3 style="color: #c31f1f;"> <?php
                           foreach($unpaidcount as $unpaidAmount):
                              $arraysum[] = $unpaidAmount->productAmount;

                        endforeach;
                        echo number_format(array_sum($arraysum));
                               ?> Total Unpaid</h3>
                        </div>
                     </div>
                  </a>
                  </div>
               </div>
                   <!-- <section class="content"> -->
               <div class="row">
                  
                  <!-- running time -->
                  <div class="col-sm-12 col-md-12">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Upcoming Renewals</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                            
                              <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                              <ul class="dropdown-menu exp-drop" role="menu">
                               
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample').tableExport({type:'csv',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/csv.png'); ?>" width="24" alt="logo"> CSV</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample').tableExport({type:'txt',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/txt.png'); ?>" width="24" alt="logo"> TXT</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample').tableExport({type:'excel',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/xls.png'); ?>" width="24" alt="logo"> XLS</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample').tableExport({type:'doc',escape:'false'});">
                                    <img src="<?= base_url('assets/dist/img/word.png'); ?>" width="24" alt="logo"> Word</a>
                                 </li>
                              
                                 <li class="divider"></li>
                               
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/pdf.png'); ?>" width="24" alt="logo"> PDF</a>
                                 </li>
                              </ul>
                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Subscriber Name</th>
                                       <th>Service Name</th>
                                       <th>Subscribed Date</th>
                                       <th>Renewal Date</th>
                                       <th>Days Left</th>                                       
                                       <th>Amount</th>
                                       <th>Validity</th>
                                       <th>Status</th>
                                       <th>Pay Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if(count($upcomingRenewals)):
                                       foreach($upcomingRenewals as $upcomingRenewal):
                                     ?>
                                    <tr>
                                       <td><?php echo ucwords(strtolower($upcomingRenewal->subscriberName)); ?></td>
                                       <td><?php echo $upcomingRenewal->productName; ?></td>
                                       <?php
                                       $subdate=date("d M Y", $upcomingRenewal->subscriptionDate);
                                       // $pay_date = date_format($date,"d M Y"); 
                                       ?>
                                       <td><?php echo $subdate; ?></td>
                                       <?php
                                       // $due = date("Y-m-d H:i:s", strtotime("+1 years", strtotime($upcomingRenewal->pay_date)));
                                       // $due_date=date_create($due);
                                       // $DueDate = date_format($due_date,"d M Y");
                                       $renewals = '+'.$upcomingRenewal->productValidity;
                                          $renewalsStringdate = strtotime($renewals, $upcomingRenewal->subscriptionDate);
                                          $DueDate = date("d M Y", $renewalsStringdate);
                                       ?>
                                       <td><?php echo $DueDate; ?></td>
                                       <?php   
                                       $diff = abs($renewalsStringdate - strtotime("now"));
                                        $days = floor($diff / (60*60*24));
                                       // $years = floor($diff / (365*60*60*24));
                                       // $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                       // $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

                                       // printf("%d years, %d months, %d days\n", $years, $months, $days);

                                        ?>
                                       <td>
                                       <?php 
                                             if($renewalsStringdate<strtotime("now")){
                                                echo "Expired";
                                             }
                                             else{
                                             echo $days." Days left"; 
                                             }
                                             ?>                                          
                                       </td>
                                       <td><?php echo $upcomingRenewal->productAmount; ?></td>
                                       <td><?php echo $upcomingRenewal->productValidity; ?></td>

                                       <td><?php if($upcomingRenewal->status == 'Active'){                                            
                                             $color = 'custom';
                                          }
                                          else{$color = 'danger'; }
                                          ?>
                                          <span class="label-<?php echo $color; ?> label label-default">
                                          <?php echo $upcomingRenewal->status; ?></span></td>

                                       <td>
                                          <?php if($upcomingRenewal->pay_status == 'Paid'){                                            
                                             $color = 'custom';
                                          }
                                          else{$color = 'danger'; }
                                          ?>
                                          <span class="label-<?php echo $color; ?> label label-default"><?php echo $upcomingRenewal->pay_status; ?></span>
                                       </td>
                                       <td>
                                          <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update-<?php echo $upcomingRenewal->id; ?>"><i class="fa fa-pencil"></i></button>

                                           <!-- <?php //echo $upcomingRenewal->id; ?> -->

                                          <button type="button" value="<?php echo $upcomingRenewal->id; ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt-<?php echo $upcomingRenewal->id; ?>"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                    </tr>

                                      <!--====Auto Mail script====-->
                                    <?php
                                    $dueDate = $upcomingRenewal->renewalsDate;
                                    $today = strtotime("now");
                                    $ThirtyBeforeDyas = strtotime('+1 month', $today);
                                    $fifteenBeforeDyas = strtotime('+15 days', $today);
                                    $tenBeforeDays = strtotime('+10 days', $today);
                                    $fiveBeforeDays = strtotime('+5 days', $today);
                                    $threeBeforeDays = strtotime('+3 days', $today);
                                    $twoBeforeDays = strtotime('+2 days', $today);
                                    $oneBeforeDays = strtotime('+1 days', $today);
                                    if($today == $DueDate || $oneBeforeDays == $dueDate || $twoBeforeDays == $dueDate || $threeBeforeDays == $DueDate || $fiveBeforeDays == $DueDate || $tenBeforeDays == $DueDate || $fifteenBeforeDyas == $DueDate || $ThirtyBeforeDyas == $DueDate){
                                                                                  
                                          require_once(APPPATH . 'Email/PHPMailerAutoload.php');
                                          $mail = new PHPMailer;

                                          $htmlversion="Hi<p style='color:red;'> ".ucwords(strtolower($upcomingRenewal->subscriberName))."</p>, <br><br> <p>This is your Service Name : </p><p style='color:red;'>".$upcomingRenewal->productName."</p>. <br><p> We are inform you that your service is expire from </p><p style='color:red;'>". $days . ' days left.</p><br><p>Your subscription date was ' . $subdate . '. Your renewals date is '. $DueDate . '.</p> <div><br></div> <p style=""><span style="font-size: 12.8px"><b><i><span style="color: rgb(247, 150, 70)">Assuring you best of our services always!</span></i></b></span><br></p><p style=""><span style="font-size: 12.8px"><b><span style="color: rgb(31, 73, 125)">ZopSoft Technology Pvt. Ltd.</span></b></span><br></p><p style=""><span style="font-size: 12.8px">Email:&nbsp;<a href="mailto:rahul@techlyn.com" target="_blank">rahul@zopsoft.com</a>,<span style="color: rgb(31, 73, 125)"> </span>Mobile:+91 9990477744<span style="color: rgb(31, 73, 125)"> | Landline: +91 124 436 2278</span></span><br></p><p style=""><span style="font-size: 12.8px">For support please email to<span style="color: rgb(31, 73, 125)"> <a href="mailto:sales@techlyn.com" target="_blank">support@zopsoft.com</a></span></span><br></p><div><span style="color: rgb(31, 73, 125)"></span>For sales please email to<span style="color: rgb(31, 73, 125)">&nbsp;<a href="mailto:sales@techlyn.com" target="_blank">sales@zopsoft.com</a></span><br></div>';
                                          $textVersion="We are inform you that your service days left ". $days ;
                                          $mail->isSMTP();                                          // Set mailer to use SMTP
                                          $mail->Host = 'smtp.zoho.com';                         // Specify main and backup SMTP servers
                                          $mail->SMTPAuth = true;                                // Enable SMTP authentication
                                          $mail->Username = 'info@zopsoft.com';                   // SMTP username
                                          $mail->Password = '3Yhj8jiu989121@#';                      // SMTP password
                                          $mail->Port = 587;                                   // TCP port to connect to
                                          $mail->setFrom('info@zopsoft.com', 'Test Email');
                                          $mail->addAddress('ashishr@zopsoft.com');               // Name is optional
                                          //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                          //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                                          $mail->isHTML(true);                                  // Set email format to HTML
                                          $mail->Subject = 'Zopsoft Technology Pvt Ltd';
                                          $mail->Body    = $htmlversion;
                                          $mail->AltBody = $textVersion;

                                       if(!$mail->send()) {
                                             // echo 'Message could not be sent.';
                                             echo 'Mailer Error: ' . $mail->ErrorInfo;
                                       }
                                    }
                                    ?>
                                     <!--====End Auto Mail script====-->

                                     <!-- delete user Modal2 -->
                                    <div class="modal fade" id="delt-<?php echo $upcomingRenewal->id; ?>" tabindex="-1" role="dialog">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-user m-r-5"></i> Delete task</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form method="post" action="<?= base_url('admin/customer/delete_task'); ?>" class="form-horizontal">
                                                         <input type="hidden" name="id" value="<?php echo $upcomingRenewal->id; ?>">
                                                         <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <label class="control-label">Are you sure delete task of <?php echo ucwords(strtolower($upcomingRenewal->subscriberName)); ?> ?</label>
                                                               <div class="pull-right">
                                                                  <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">NO</button>
                                                                  <button type="submit" class="btn btn-add btn-sm">YES</button>
                                                               </div>
                                                            </div>
                                                         </fieldset>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                             </div>
                                          </div>
                                          <!-- /.modal-content -->
                                       </div>
                                       <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

                                    <!-- Modal1 -->
                                    <div class="modal fade" id="update-<?php echo $upcomingRenewal->id; ?>" tabindex="-1" role="dialog">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-plus m-r-5"></i> Update Info</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form class="form-horizontal" method="post" action="<?= base_url('admin/customer/edit_task'); ?>">
                                                         <input type="hidden" name="id" value="<?php echo $upcomingRenewal->id; ?>">
                                                         <?php
                                                         // $date=date_create($upcomingRenewal->Due_date);
                                                         // $due_date1 = date_format($date,"m/d/Y"); ?>
                                                         <fieldset>
                                                            <!-- Text input-->
                                                          <!--   <div class="col-md-6 form-group">
                                                               <label class="control-label">Subscriber Name</label>
                                                               <input type="text" name="subscriberName" id="subscriberName" placeholder="Client Name" value="<?php echo ucwords(strtolower($upcomingRenewal->subscriberName)); ?>" class="form-control">
                                                            </div> -->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Service Name</label>
                                                               <input type="text" name="productName" id="productName" placeholder="Task Name" value="<?php echo $upcomingRenewal->productName; ?>" class="form-control">
                                                            </div>
                                                           <!--  <div class="col-md-6 form-group">
                                                               <label class="control-label">Pay date</label>
                                                               <input type="date" name="pay_date" id="pay_date" value="<?php echo $upcomingRenewal->pay_date; ?>" class="form-control">
                                                            </div> -->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Amount</label>
                                                               <input type="number" name="productAmount" id="productAmount" placeholder="Amount" value="<?php echo $upcomingRenewal->productAmount; ?>" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">product validity</label>
                                                               <input type="text" name="productValidity" id="productValidity" placeholder="productValidity" value="<?php echo $upcomingRenewal->productValidity; ?>" class="form-control">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Status</label><br>
                                                               <label class="radio-inline"><input name="status" value="Active" <?php echo ($upcomingRenewal->status == 'Active') ? "checked" : "";?> type="radio">Active</label> 

                                                                  <label class="radio-inline"><input name="status" value="Inactive" <?php echo ($upcomingRenewal->status == 'Inactive') ? "checked" : "";?> type="radio">Inactive</label>
                                                               <!-- <label class="control-label">status</label>
                                                               <input type="text" name="status" id="cstatus" placeholder="status" value="<?php echo $upcomingRenewal->status; ?>" class="form-control"> -->
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Pay Status</label><br>
                                                               <label class="radio-inline"><input name="pay_status" value="Paid" <?php echo ($upcomingRenewal->pay_status == 'Paid') ? "checked" : "";?> type="radio">Paid</label> 

                                                                  <label class="radio-inline"><input name="pay_status" value="Unpaid" <?php echo ($upcomingRenewal->pay_status == 'Unpaid') ? "checked" : "";?> type="radio">Unpaid</label>
                                                               <!-- <label class="control-label">status</label>
                                                               <input type="text" name="status" id="cstatus" placeholder="status" value="<?php echo $upcomingRenewal->status; ?>" class="form-control"> -->
                                                            </div>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <div class="pull-right">
                                                                  <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancel</button>
                                                                  <button type="submit" class="btn btn-add btn-sm">Update</button>
                                                               </div>
                                                            </div>
                                                         </fieldset>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                             </div>
                                          </div>
                                          <!-- /.modal-content -->
                                       </div>
                                       <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

                                    <?php endforeach; ?>
                                    <?php else: ?>
                                       <tr>
                                          <td colspan="9">No Data Avalaible.</td>
                                       </tr>
                                 <?php endif; ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <?php
                        if($msg = $this->session->flashdata('msg')):
                        $msg_class = $this->session->flashdata('msg_class');
                         ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="<?php echo $msg_class; ?>"><?php echo $msg; ?></div>
                            </div>
                        </div>
                         <?php endif; ?>
                         <!-- <?= $this->pagination->create_links(); ?> -->
                  </div>
               
               </div>
            <!-- </section> -->
            
                 <!--  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                    
                        <div class="statistic-box">                          
                           <style>
                              .width{ width: 100%; }                              
                           </style>                         
                           <div class="row">
                           <div class="col-md-3 form-group">
                              <label class="control-label">From</label>
                              <input type="date" name="dateFrom" id="dateFrom" class="form-control width">
                          </div>
                           <div class="col-md-3 form-group">
                              <label class="control-label">To</label>
                              <input type="date" name="dateTo" id="dateTo" class="form-control width">
                           </div>
                           <div class="col-md-3 form-group user-form-group" style="margin-top: 27px">
                              
                                 <button type="submit" id="searchbtn" class="btn btn-info btn-sm">Search</button>                            
                           </div>
                           </div>                       
                        </div>                    
                  </div> -->
               <!-- </div> -->
              
<div class="alert alert-success" style="display: none;">
      
   </div>
              
               <!-- <div class="row">       
                  <div class="col-sm-12 col-md-12">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Show Customers</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                     
                           <div class="btn-group">                            
                              <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                              <ul class="dropdown-menu exp-drop" role="menu">                               
                                 <li>
                                    <a href="#" onclick="$('#datable').tableExport({type:'csv',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/csv.png'); ?>" width="24" alt="logo"> CSV</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#datable').tableExport({type:'txt',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/txt.png'); ?>" width="24" alt="logo"> TXT</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#datable').tableExport({type:'excel',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/xls.png'); ?>" width="24" alt="logo"> XLS</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#datable').tableExport({type:'doc',escape:'false'});">
                                    <img src="<?= base_url('assets/dist/img/word.png'); ?>" width="24" alt="logo"> Word</a>
                                 </li>
                               
                                 <li class="divider"></li>
                              
                                 <li>
                                    <a href="#" onclick="$('#datable').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/pdf.png'); ?>" width="24" alt="logo"> PDF</a>
                                 </li>
                              </ul>
                           </div>
                         
                           <div class="table-responsive">
                              <table id="datable" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Client Name</th>
                                       <th>Task Name</th>
                                       <th>Payment date</th>
                                       <th>Due date</th>                                       
                                       <th>Amount</th>
                                       <th>Description</th>
                                       <th>status</th>
                                       <th>Pay status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody id="showdata">
                                  
                                   
                                    
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                    
                  </div>                 
               </div>          -->
            <!-- delete user Modal2 -->
                                    <div class="modal fade" id="delt" tabindex="-1" role="dialog">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-user m-r-5"></i> Delete task</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <!-- <form method="post" action="<?= base_url('customer/delete_task'); ?>" class="form-horizontal"> -->
                                                         <input type="hidden" name="id" value="">
                                                         <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <label class="control-label delete_name">Are you sure delete task of </label>
                                                               <div class="pull-right">
                                                                  <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">NO</button>
                                                                  <button type="submit" id="btnDelete" class="btn btn-add btn-sm">YES</button>
                                                               </div>
                                                            </div>
                                                         </fieldset>
                                                      <!-- </form> -->
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                             </div>
                                          </div>
                                          <!-- /.modal-content -->
                                       </div>
                                       <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
        <?php include "inc/footer.php" ?>
        <script>

            $(document).ready(function(){

             $('#searchbtn').click(function(){
              var dateFrom = $('input[name=dateFrom]').val();
              var dateTo = $('input[name=dateTo]').val();

              if(dateFrom != '' && dateTo!= '')
              {
               load_data(dateFrom, dateTo);
              }
              else
              {
               alert('Please enter date.');
               // load_data();
              }
             });

             function load_data(dateFrom, dateTo)
             {
               
              $.ajax({
               type: 'ajax',
               method: 'post',
               url:"<?php echo base_url() ?>admin/customer/showCustomer",
               async: false,
               datatype: 'json',               
               data:{dateFrom:dateFrom,dateTo:dateTo},
               success:function(result)
               {
                   decode_data = jQuery.parseJSON(result);
                    // alert(decode_data);
                  // // alert(result.length);
                   var showData = '';
                   var classD;
                  $.each( decode_data, function( i, val ) {
                    // alert(val.cl_name);
                  
                 
                  // var i;
                  // for(i=0; i<data.length; i++){
                  //    alert(val.ci_name);
                  if(val.status == "Inactive"){ 
                      classD = "danger";
                  }
                  else{
                     classD = "custom";
                  }
                  if(val.pay_status == "Unpaid"){
                     classP = "danger";
                  }
                  else{
                     classP = "custom";
                  }
                     showData +='<tr>'+
                                 '<td>'+val.cl_name+'</td>'+
                                 '<td>'+val.task_name+'</td>'+
                                 '<td>'+val.pay_date+'</td> '+                                   

                                 '<td>'+val.DueDate+'</td>'+
                                 '<td>'+val.pay_amount+'</td>'+
                                 '<td>'+val.description+'</td>'+
                                 '<td><span class="label-'+classD+' label label-default">'+val.status+
                                    '</span></td>'+
                                 '<td><span class="label-'+classP+' label label-default">'+val.pay_status+'</span>'+
                                 '</td>'+
                                 '<td>'+
                                    '<button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update-'+val.cl_id+'"><i class="fa fa-pencil"></i></button>'+

                                    '<button type="button" value="" class="btn btn-danger btn-xs item-delete" data-toggle="modal" data-target="'+val.cl_id+'" data-name="'+val.cl_name+'"><i class="fa fa-trash-o"></i> </button>'+
                                 '</td>'+
                              '</tr>';
                   });
                  $('#showdata').html(showData);

               },
               error: function(){
                  alert('Could not get Data from Database');
               }
                  // alert(data);
                // $('#result').html(data);
               
              });
             }
            
            });

            //delete- 
      $('#showdata').on('click', '.item-delete', function(){
         var id = $(this).attr('data-target');
         var name = $(this).attr('data-name');
         $('.delete_name').html('Are you sure delete service of ' +name+ '?');
         alert(id);
         $('#delt').modal('show');
         //prevent previous handler - unbind()
         $('#btnDelete').unbind().click(function(){
            $.ajax({
               type: 'ajax',
               method: 'post',
               async: false,
               url: '<?php echo base_url() ?>admin/customer/delete_task',
               data:{id:id},
               dataType: 'json',
               success: function(response){
                  if(response){
                     $('#delt').modal('hide');
                     $('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                     showAllEmployee();
                  }else{
                     alert('Error');
                  }
               },
               error: function(){
                  alert('Error deleting');
               }
            });
         });
      });



         </script>
         <!-- <script>
                  $('#searchbtn').click(function(){
                     var date = $('input[name=searchDate]').val();
                    
                  });
         </script> -->