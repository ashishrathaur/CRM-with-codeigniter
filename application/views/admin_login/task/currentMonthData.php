         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-bar-chart-o"></i>
               </div>
               <div class="header-title">
                    <h1>Data of <?php echo date("F Y"); ?></h1>
                  <small>Services details</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  
                  <!-- running time -->
                  <div class="col-sm-12 col-md-12">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Services</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                             <!--  <div class="buttonexport">
                                 <a href="#" class="btn btn-add" data-toggle="modal" data-target="#addtask"><i class="fa fa-plus"></i> Add Users</a>  
                              </div> -->
                              <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                              <ul class="dropdown-menu exp-drop" role="menu">
                               
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/csv.png'); ?>" width="24" alt="logo"> CSV</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'txt',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/txt.png'); ?>" width="24" alt="logo"> TXT</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/xls.png'); ?>" width="24" alt="logo"> XLS</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'doc',escape:'false'});">
                                    <img src="<?= base_url('assets/dist/img/word.png'); ?>" width="24" alt="logo"> Word</a>
                                 </li>
                               
                                 <li class="divider"></li>
                               
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> 
                                    <img src="<?= base_url('assets/dist/img/pdf.png'); ?>" width="24" alt="logo"> PDF</a>
                                 </li>
                              </ul>
                           </div>
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Subscriber Name</th>
                                       <th>Service Name</th>
                                       <th>Subscribed date</th>
                                       <th>Renewal date</th>  
                                       <th>Days Left</th>                                      
                                       <th>Amount</th>
                                       <th>Validity</th>
                                       <th>status</th>
                                       <th>Pay status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>

                                    <?php
                                    
                                     if(count($currentMonthData)):
                                       foreach($currentMonthData as $currentMont_Data):
                                          $renewals = '+'.$currentMont_Data->productValidity;
                                          $renewalsStringdate = strtotime($renewals, $currentMont_Data->subscriptionDate);
                                          $sub_date = date("Y-m",$currentMont_Data->subscriptionDate);
                                          // $DueDate = date("Y-m", $renewalsStringdate);
                                           $currentMonth = date("Y-m");
                                          if($renewalsStringdate <= strtotime('now') || $sub_date == $currentMonth):
                                          // $date1 = date_create($currentMont_Data->subscriptionDate);
                                          // $joindate1 = date_format($date1,"Y-m");
                                          // $currentMont = date("Y-m");
                                          // if($joindate1 == $currentMont):
                                          // echo $subscriptionDate1;
                                     ?>

                                    <tr>
                                       <td><?php echo ucwords(strtolower($currentMont_Data->subscriberName)); ?></td>
                                       <td><?php echo $currentMont_Data->productName; ?></td>

                                       <?php
                                       $subdate=date("d M Y", $currentMont_Data->subscriptionDate);
                                       // $subscriptionDate = date_format($date,"d M Y"); ?>
                                       <td><?php echo $subdate; ?></td>

                                       <?php
                                       $renewals = '+'.$currentMont_Data->productValidity;
                                       $renewalsStringdate = strtotime($renewals, $currentMont_Data->subscriptionDate);
                                       $DueDate = date("d M Y", $renewalsStringdate);
                                       // $due = date("Y-m-d", strtotime("+1 years", strtotime($currentMont_Data->subscriptionDate)));
                                       // $due_date=date_create($due);
                                       // $DueDate = date_format($due_date,"d M Y");
                                       ?>
                                       <td><?php echo $DueDate; ?></td>
                                       <?php   
                                          $diff = abs($renewalsStringdate - strtotime("now"));
                                          $days = floor($diff / (60*60*24));                                 

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
                                       <td><?php echo $currentMont_Data->productAmount; ?></td>
                                       <td><?php echo $currentMont_Data->productValidity; ?></td>

                                      
                                       <td><span class="label-custom label label-default"><?php echo $currentMont_Data->status; ?></span></td>

                                       <td>
                                          <?php if($currentMont_Data->pay_status == "Paid"){                                             
                                             $color = 'custom';
                                          }
                                          else{ $color = 'danger'; }
                                          ?>
                                          <span class="label-<?php echo $color; ?> label label-default"><?php echo $currentMont_Data->pay_status; ?></span>
                                       </td>
                                       <td>
                                          <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update-<?php echo $currentMont_Data->id; ?>"><i class="fa fa-pencil"></i></button>

                                           <!-- <?php //echo $currentMont_Data->id; ?> -->

                                          <button type="button" value="<?php echo $currentMont_Data->id; ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt-<?php echo $currentMont_Data->id; ?>"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                    </tr>
                                     <!-- delete user Modal2 -->
                                    <div class="modal fade" id="delt-<?php echo $currentMont_Data->id; ?>" tabindex="-1" role="dialog">
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
                                                         <input type="hidden" name="id" value="<?php echo $currentMont_Data->id; ?>">
                                                         <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <label class="control-label">Confirm Deletion<!-- Are you sure delete task of <?php echo ucwords(strtolower($currentMont_Data->subscriberName)); ?> ? --></label>
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
                                    <div class="modal fade" id="update-<?php echo $currentMont_Data->id; ?>" tabindex="-1" role="dialog">
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
                                                         <input type="hidden" name="id" value="<?php echo $currentMont_Data->id; ?>">
                                                         <?php
                                                         // $date=date_create($currentMont_Data->Due_date);
                                                         // $due_date1 = date_format($date,"m/d/Y"); ?>
                                                         <fieldset>
                                                            <!-- Text input-->
                                                           <!--  <div class="col-md-6 form-group">
                                                               <label class="control-label">Subscriber Name</label>
                                                               <input type="text" name="subscriberName" id="subscriberName" placeholder="Client Name" value="<?php echo ucwords(strtolower($currentMont_Data->subscriberName)); ?>" class="form-control">
                                                            </div> -->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Service Name</label>
                                                               <input type="text" name="productName" id="productName" placeholder="Task Name" value="<?php echo $currentMont_Data->productName; ?>" class="form-control">
                                                            </div>
                                                           <!--  <div class="col-md-6 form-group">
                                                               <label class="control-label">Subscription date</label>
                                                               <input type="date" name="subscriptionDate" id="subscriptionDate" value="<?php echo $currentMont_Data->subscriptionDate; ?>" class="form-control">
                                                            </div> -->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Amount</label>
                                                               <input type="number" name="productAmount" id="productAmount" placeholder="Amount" value="<?php echo $currentMont_Data->productAmount; ?>" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">product validity</label>
                                                               <input type="text" name="productValidity" id="productValidity" placeholder="productValidity" value="<?php echo $currentMont_Data->productValidity; ?>" class="form-control">
                                                            </div>
                                                            
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Status</label><br>
                                                               <label class="radio-inline"><input name="status" value="Active" <?php echo ($currentMont_Data->status == 'Active') ? "checked" : "";?> type="radio">Active</label> 

                                                               <label class="radio-inline"><input name="status" value="Inactive" <?php echo ($currentMont_Data->status == 'Inactive') ? "checked" : "";?> type="radio">Inactive</label>
                                                               <!-- <label class="control-label">status</label>
                                                               <input type="text" name="status" id="cstatus" placeholder="status" value="<?php echo $currentMont_Data->status; ?>" class="form-control"> -->
                                                            </div>
                                                              <div class="col-md-6 form-group">
                                                               <label class="control-label">Pay Status</label><br>
                                                               <label class="radio-inline"><input name="pay_status" value="Paid" <?php echo ($currentMont_Data->pay_status == 'Paid') ? "checked" : "";?> type="radio">Paid</label> 

                                                               <label class="radio-inline"><input name="pay_status" value="Unpaid" <?php echo ($currentMont_Data->pay_status == 'Unpaid') ? "checked" : "";?> type="radio">Unpaid</label>                                                             
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
                                
                               
                                       <?php endif; ?>
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
                         <?= $this->pagination->create_links(); ?>
                  </div>
                  <!-- Projects time -->
                  <!-- <div class="col-sm-12 col-md-12">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Services</h4>
                           </div>
                        </div>
                        <div class="panel-body text-center">
                           <h4 class="timing">Total services of <?php echo date("F Y"); ?> : <?php echo count($currentMonthData); ?></h4>
                        </div>
                     </div>
                  </div> -->
               </div>
               <!-- Modal1 -->
               <!-- <div class="modal fade" id="addtask" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-plus m-r-5"></i> add new task</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal">
                                    <fieldset> -->
                                       <!-- Text input-->
                                      <!--  <div class="col-md-6 form-group">
                                          <label class="control-label">Task Name</label>
                                          <input type="text" placeholder="Task Name" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Due date</label>
                                          <input type="number" placeholder="Due title" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">productValidity</label>
                                          <input type="text" placeholder="productValidity" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Assign to</label>
                                          <input type="text" placeholder="Assign to" class="form-control">
                                       </div> -->
                                       <!-- Text input-->
                                      <!--  <div class="col-md-6 form-group">
                                          <label class="control-label">status</label>
                                          <input type="text" placeholder="status" class="form-control">
                                       </div>
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">Cancel</button>
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
                     </div> -->
                     <!-- /.modal-content -->
                  <!-- </div> -->
                  <!-- /.modal-dialog -->
               <!-- </div> -->
               <!-- /.modal -->
            
              
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
