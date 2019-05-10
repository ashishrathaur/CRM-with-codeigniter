         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-bar-chart-o"></i>
               </div>
               <div class="header-title">
                  <h1>Archive Services</h1>
                  <small>Archive Services details</small>
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
                                 <h4>All Archive</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                            
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
                                    <?php if(count($archive_details)):
                                       foreach($archive_details as $archiveDetail):

                                     ?>

                                    <tr>
                                       <td><?php echo ucwords(strtolower($archiveDetail->subscriberName)); ?></td>
                                       <td><?php echo $archiveDetail->productName; ?></td>
                                       <?php
                                       $subdate=date("d M Y", $archiveDetail->subscriptionDate);
                                       // $pay_date = date_format($date,"d M Y"); 
                                       ?>
                                       <td><?php echo $subdate; ?></td>
                                       <?php
                                       // $due = date("Y-m-d H:i:s", strtotime("+1 years", strtotime($archiveDetail->pay_date)));
                                       // $due_date=date_create($due);
                                       // $DueDate = date_format($due_date,"d M Y");
                                       $renewals = '+'.$archiveDetail->productValidity;
                                          $renewalsStringdate = strtotime($renewals, $archiveDetail->subscriptionDate);
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
                                       <td><?php echo $archiveDetail->productAmount; ?></td>
                                       <td><?php echo $archiveDetail->productValidity; ?></td>

                                       <td><span class="label-danger label label-default">
                                          <?php echo $archiveDetail->status; ?></span></td>

                                       <td>
                                          <?php if($archiveDetail->pay_status == 'Paid'){                                            
                                             $color = 'custom';
                                          }
                                          else{$color = 'danger'; }
                                          ?>
                                          <span class="label-<?php echo $color; ?> label label-default"><?php echo $archiveDetail->pay_status; ?></span>
                                       </td>
                                       <td>
                                          <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update-<?php echo $archiveDetail->id; ?>"><i class="fa fa-pencil"></i></button>

                                           <!-- <?php //echo $archiveDetail->id; ?> -->

                                          <button type="button" value="<?php echo $archiveDetail->id; ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt-<?php echo $archiveDetail->id; ?>"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                    </tr>
                                     <!-- delete user Modal2 -->
                                    <div class="modal fade" id="delt-<?php echo $archiveDetail->id; ?>" tabindex="-1" role="dialog">
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
                                                         <input type="hidden" name="id" value="<?php echo $archiveDetail->id; ?>">
                                                         <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <label class="control-label">Confirm Deletion<!-- Are you sure delete task of <?php echo ucwords(strtolower($archiveDetail->subscriberName)); ?> ? --></label>
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
                                    <div class="modal fade" id="update-<?php echo $archiveDetail->id; ?>" tabindex="-1" role="dialog">
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
                                                         <input type="hidden" name="id" value="<?php echo $archiveDetail->id; ?>">
                                                       
                                                         <fieldset>                                                         
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Service Name</label>
                                                               <input type="text" name="productName" id="productName" placeholder="Task Name" value="<?php echo $archiveDetail->productName; ?>" class="form-control">
                                                            </div>
                                             
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Amount</label>
                                                               <input type="number" name="productAmount" id="productAmount" placeholder="Amount" value="<?php echo $archiveDetail->productAmount; ?>" class="form-control">
                                                            </div>

                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">product validity</label>
                                                               <input type="text" name="productValidity" id="productValidity" placeholder="productValidity" value="<?php echo $archiveDetail->productValidity; ?>" class="form-control">
                                                            </div>

                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Status</label><br>
                                                               <label class="radio-inline"><input name="status" value="Active" <?php echo ($archiveDetail->status == 'Active') ? "checked" : "";?> type="radio">Active</label> 

                                                                  <label class="radio-inline"><input name="status" value="Inactive" <?php echo ($archiveDetail->status == 'Inactive') ? "checked" : "";?> type="radio">Inactive</label>
                                                              
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Pay Status</label><br>
                                                               <label class="radio-inline"><input name="pay_status" value="Paid" <?php echo ($archiveDetail->pay_status == 'Paid') ? "checked" : "";?> type="radio">Paid</label> 

                                                                  <label class="radio-inline"><input name="pay_status" value="Unpaid" <?php echo ($archiveDetail->pay_status == 'Unpaid') ? "checked" : "";?> type="radio">Unpaid</label>
                                                          
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
            
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
