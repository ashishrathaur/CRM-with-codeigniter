<?php 
error_reporting(0);
include "inc/header.php" ?> <!-- Header Navbar -->
         <!-- =============================================== -->
       <?php include "inc/sidebar.php" ?> <!-- Left side column. contains the sidebar -->
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-dashboard"></i>
               </div>
               <div class="header-title">
                  <h1>Zopsoft Dashboard</h1>
                  <small>Zopsoft Technology</small>
               </div>
            </section> -->
            <!-- Main content -->
            <section class="content">
               <div class="row">
                 
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="#">
                     <div id="cardbox1">
                        <div class="statistic-box">
                           <i class="fa fa-database fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php print_r(count($clientcount)); ?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Total Product</h3>
                        </div>
                     </div></a>
                  </div>
                  
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="<?= base_url('customer/currentMonthData');?>">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-book fa-3x"></i>
                           <div class="counter-number pull-right">
                              <!-- <i class="ti ti-money"> --><!-- </i> --><span class="count-number">
                                 <?php
                                 if(count($monthcount)>0){                                  
                                 // $amount = 0;
                                 foreach($monthcount as $monthcountData):
                                       $renewals = '+'.$monthcountData->productValidity;
                                       $renewalsStringdate = strtotime($renewals, $monthcountData->subscriptionDate);
                                       $DueDate = date("Y-m", $renewalsStringdate);

                                          // $date1 = date("Y-m", $monthcountData->subscriptionDate);
                                          // $joindate1 = date_format($date1,"Y-m");
                                          $currentMont = date("Y-m");
                                          if($DueDate == $currentMont):
                                          // echo $pay_date1;
                                          $count[] = $monthcountData;
                                          // $amount += $monthcountData->productAmount;
                                  
                                  endif;                               
                                  endforeach;
                                  count($count)>=1?print_r(count($count)):"0";
                                  }
                                  else{
                                       echo "0";
                                  }
                                 ?>                          

                              </span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3>Renewals (Within month)<!-- <?php echo number_format($amount);?> Collected this Month --></h3>
                        </div>
                     </div>
                  </a>
                  </div>
                   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                      <a href="#">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-user-secret fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">0</span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3>Nill</h3>
                        </div>
                     </div>
                  </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                      <a href="<?= base_url('customer/unpaid_service');?>">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-inr fa-3x" style="color: red"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?php print_r(count($unpaidcount)); ?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3 style="color: red;"> <?php
                           if(count($unpaidcount)>0){
                           foreach($unpaidcount as $unpaidAmount):
                              $arraysum[] = $unpaidAmount->productAmount;

                           endforeach;
                                 echo number_format(array_sum($arraysum));
                              }
                              else{
                                 echo "0";
                              } ?> Total Unpaid</h3>
                        </div>
                     </div>
                  </a>
                  </div>
                 
               </div>
              
<div class="alert alert-success" style="display: none;">
      
</div>
            <?php foreach($userDetails as $userDetail): ?>
              <input type="hidden" name="user_id" value="<?php echo $userDetail->user_id; ?>">
              <input type="hidden" name="subscriberName" value="<?php echo $userDetail->user_name; ?>">
              <input type="hidden" name="subscriberEmail" value="<?php echo $userDetail->user_email; ?>">
              <input type="hidden" name="subscriberPhone" value="<?php echo $userDetail->phone; ?>">
              <input type="hidden" name="subscriberAddress" value="<?php echo $userDetail->address; ?>">
           <?php endforeach; ?>
              <!-- <input type="hidden" name="user_id"> -->
               <div class="row">
                  
                  <!-- running time -->
                  <div class="col-sm-12 col-md-12">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Buy Products/Services</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                       
                           <div class="table-responsive">
                              <table id="datable" class="table table-bordered table-striped table-hover">
                                 <thead>                                   
                                    <tr class="info">
                                       <th>Name</th> 
                                       <th>Validity</th>
                                       <th>Amount</th>
                                       <th>Action</th>                                       
                                    </tr>
                                 </thead>
                                 <tbody id="showdata">
                                     <?php 
                                    foreach($fetchProduct as $fetchProducts):
                                    ?>
                                    <tr>
                                       <td><?php echo $fetchProducts->productName; ?></td>
                                       <td><?php echo $fetchProducts->productValidity; ?></td>
                                       <td><?php echo $fetchProducts->productAmount; ?></td>        
                                       <td>

                                       <input type="hidden" name="productId" value="<?php echo $fetchProducts->productId; ?>">
                                       <input type="hidden" name="productName" value="<?php echo $fetchProducts->productName; ?>">
                                       <input type="hidden" name="productValidity" value="<?php echo $fetchProducts->productValidity; ?>">
                                       <input type="hidden" name="productAmount" value="<?php echo $fetchProducts->productAmount; ?>">
                                       <?php $date = strtotime('now');
                                             $renewals = '+'.$fetchProducts->productValidity;
                                             $renewalsStringdate = strtotime($renewals);
                                             $renewalsdate = date('Y-m-d h:i:sa', $renewalsStringdate);
                                       ?>
                                       <input type="hidden" name="subscriptionDate" value="<?php echo $date; ?>">
                                       <input type="hidden" name="renewalsDate" value="<?php echo $renewalsStringdate; ?>">

                                          <!-- <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#update">Subscribe</button> -->
                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#update">Pay & Subscribe</button>
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
          
                                   
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
        <?php include "inc/footer.php" ?>
       