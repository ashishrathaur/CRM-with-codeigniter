         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-bar-chart-o"></i>
               </div>
               <div class="header-title">
                  <h1>Services</h1>
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
                                 <h4>All Renewals</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group" id="buttonlist">
                            
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
                           <!-- <div class="btn">
                            <a class="btn btn-add btn-sm" href="<?= base_url('admin/customer/fetchSubDetails'); ?>">
                            <i class="fa fa-plus"></i> Add Service </a> 
                           </div>  -->
                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <!-- <th>Subscriber Name</th> -->
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
                                    <?php if(count($cusService)):
                                       foreach($cusService as $cusServices):

                                     ?>

                                    <tr>
                                       <!-- <td><?php //echo ucwords(strtolower($cusServices->subscriberName)); ?></td> -->
                                       <td><?php echo $cusServices->productName; ?></td>
                                       <?php
                                       $subdate=date("d M Y", $cusServices->subscriptionDate);
                                       // $pay_date = date_format($date,"d M Y"); 
                                       ?>
                                       <td><?php echo $subdate; ?></td>
                                       <?php
                                       // $due = date("Y-m-d H:i:s", strtotime("+1 years", strtotime($cusServices->pay_date)));
                                       // $due_date=date_create($due);
                                       // $DueDate = date_format($due_date,"d M Y");
                                       $renewals = '+'.$cusServices->productValidity;
                                          $renewalsStringdate = strtotime($renewals, $cusServices->subscriptionDate);
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
                                       <td><?php echo $cusServices->productAmount; ?></td>
                                       <td><?php echo $cusServices->productValidity; ?></td>

                                       <td><span class="label-custom label label-default">
                                          <?php echo $cusServices->status; ?></span></td>

                                       <td>
                                          <?php if($cusServices->pay_status == 'Paid'){                                            
                                             $color = 'custom';
                                          }
                                          else{$color = 'danger'; }
                                          ?>
                                          <span class="label-<?php echo $color; ?> label label-default"><?php echo $cusServices->pay_status; ?></span>
                                       </td>
                                       <td>
                                          <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update-<?php echo $cusServices->id; ?>"><i class="fa fa-pencil"></i></button>

                                           <!-- <?php //echo $cusServices->id; ?> -->

                                          <button type="button" value="<?php echo $cusServices->id; ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt-<?php echo $cusServices->id; ?>"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                    </tr>
                                     <!-- delete user Modal2 -->
                                    <div class="modal fade" id="delt-<?php echo $cusServices->id; ?>" tabindex="-1" role="dialog">
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
                                                         <input type="hidden" name="id" value="<?php echo $cusServices->id; ?>">
                                                         <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <label class="control-label">Confirm Deletion<!-- Are you sure delete task of <?php echo ucwords(strtolower($cusServices->subscriberName)); ?> ? --></label>
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
                                    <div class="modal fade" id="update-<?php echo $cusServices->id; ?>" tabindex="-1" role="dialog">
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
                                                         <input type="hidden" name="id" value="<?php echo $cusServices->id; ?>">
                                                         <?php
                                                         // $date=date_create($cusServices->Due_date);
                                                         // $due_date1 = date_format($date,"m/d/Y"); ?>
                                                         <fieldset>
                                                            <!-- Text input-->
                                                            <!-- <div class="col-md-6 form-group">
                                                               <label class="control-label">Subscriber Name</label>
                                                               <input type="text" name="subscriberName" id="subscriberName" placeholder="Client Name" value="<?php echo ucwords(strtolower($cusServices->subscriberName)); ?>" class="form-control">
                                                            </div> -->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Service Name</label>
                                                               <input type="text" name="productName" id="productName" placeholder="Task Name" value="<?php echo $cusServices->productName; ?>" class="form-control">
                                                            </div>
                                                           <!--  <div class="col-md-6 form-group">
                                                               <label class="control-label">Pay date</label>
                                                               <input type="date" name="pay_date" id="pay_date" value="<?php echo $cusServices->pay_date; ?>" class="form-control">
                                                            </div> -->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Amount</label>
                                                               <input type="number" name="productAmount" id="productAmount" placeholder="Amount" value="<?php echo $cusServices->productAmount; ?>" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">product validity</label>
                                                               <input type="text" name="productValidity" id="productValidity" placeholder="productValidity" value="<?php echo $cusServices->productValidity; ?>" class="form-control">
                                                            </div>
                                                            
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Status</label><br>
                                                               <label class="radio-inline"><input name="status" value="Active" <?php echo ($cusServices->status == 'Active') ? "checked" : "";?> type="radio">Active</label> 

                                                                  <label class="radio-inline"><input name="status" value="Inactive" <?php echo ($cusServices->status == 'Inactive') ? "checked" : "";?> type="radio">Inactive</label>
                                                               <!-- <label class="control-label">status</label>
                                                               <input type="text" name="status" id="cstatus" placeholder="status" value="<?php echo $cusServices->status; ?>" class="form-control"> -->
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Pay Status</label><br>
                                                               <label class="radio-inline"><input name="pay_status" value="Paid" <?php echo ($cusServices->pay_status == 'Paid') ? "checked" : "";?> type="radio">Paid</label> 

                                                                  <label class="radio-inline"><input name="pay_status" value="Unpaid" <?php echo ($cusServices->pay_status == 'Unpaid') ? "checked" : "";?> type="radio">Unpaid</label>
                                                               <!-- <label class="control-label">status</label>
                                                               <input type="text" name="status" id="cstatus" placeholder="status" value="<?php echo $cusServices->status; ?>" class="form-control"> -->
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
                  <!-- Projects time -->
                 <!--  <div class="col-sm-12 col-md-12">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Running Tasks Duration</h4>
                           </div>
                        </div>
                        <div class="panel-body text-center">
                           <h4 class="timing">05 Hours, 30 Minutes, 00 Seconds</h4>
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
                                          <label class="control-label">Description</label>
                                          <input type="text" placeholder="Description" class="form-control">
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
