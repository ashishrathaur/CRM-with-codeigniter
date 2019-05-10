         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-bar-chart-o"></i>
               </div>
               <div class="header-title">
                  <h1>Unpaid Services</h1>
                  <small>Services Details</small>
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
                                 <h4>Unpaid</h4>
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
                                       
                                       <th>Service Name</th>
                                       <th>Subscribed Date</th> 
                                       <th>Renewals Name</th>   
                                       <th>Days Left</th>                                   
                                       <th>Amount</th>
                                       <th>Validity</th>
                                       <th>Status</th>
                                       <th>Pay Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if(count($unpaid_task)):
                                       foreach($unpaid_task as $unpaidDetail):

                                     ?>
                                    <tr>
                                       <!-- <td><?php echo $unpaidDetail->cl_name; ?></td> -->
                                       <td><?php echo $unpaidDetail->productName; ?></td>
                                       <?php
                                       $subscribe_date=date("d M Y", $unpaidDetail->subscriptionDate);
                                       // $subscribe_date = date_format($date,"d M Y"); 
                                       ?>
                                       <td><?php echo  $subscribe_date; ?></td>
                                     
                                        <?php
                                       $renewals = '+'.$unpaidDetail->productValidity;
                                       $renewalsStringdate = strtotime($renewals, $unpaidDetail->subscriptionDate);
                                       $DueDate = date("d M Y", $renewalsStringdate);
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
                                       <td><?php echo $unpaidDetail->productAmount; ?></td>
                                       <td><?php echo $unpaidDetail->productValidity; ?></td>

                                       <td>
                                          <?php
                                          if($unpaidDetail->status == 'Active'){
                                             $class = "label-custom";
                                          }
                                          else{
                                             $class = "label-danger";
                                          }
                                          ?>
                                          <span class="<?php echo $class; ?> label label-default">
                                          <?php echo $unpaidDetail->status; ?></span></td>
                                       <td>
                                          <span class="label-danger label label-default">Unpaid</span>
                                       </td>
                                       <td>
                                          <button type="button" class="btn btn-danger btn-sm">Pay</button>
                                         <!--  <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update-<?php echo $unpaidDetail->cl_id; ?>"><i class="fa fa-pencil"></i></button> -->

                                           <!-- <?php //echo $unpaidDetail->cl_id; ?> -->

                                         <!--  <button type="button" value="<?php echo $unpaidDetail->cl_id; ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt-<?php echo $unpaidDetail->cl_id; ?>"><i class="fa fa-trash-o"></i> --> </button>
                                       </td>
                                    </tr>
                                     <!-- delete user Modal2 -->
                                   <!--  <div class="modal fade" id="delt-<?php echo $unpaidDetail->cl_id; ?>" tabindex="-1" role="dialog">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-user m-r-5"></i> Delete task</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form method="post" action="<?= base_url('customer/delete_task'); ?>" class="form-horizontal">
                                                         <input type="hidden" name="id" value="<?php echo $unpaidDetail->cl_id; ?>">
                                                         <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <label class="control-label">Are you sure delete task of <?php echo $unpaidDetail->cl_name; ?> ?</label>
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
                                         
                                       </div>
                                     
                                    </div> -->
                                    <!-- /.modal -->

                                    <!-- Modal1 -->
                                   <!--  <div class="modal fade" id="update-<?php echo $unpaidDetail->cl_id; ?>" tabindex="-1" role="dialog">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-plus m-r-5"></i> Update Info</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form class="form-horizontal" method="post" action="<?= base_url('customer/edit_task'); ?>">
                                                         <input type="hidden" name="cl_id" value="<?php echo $unpaidDetail->cl_id; ?>">
                                                      
                                                         <fieldset>
                                                         
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Client Name</label>
                                                               <input type="text" name="cl_name" id="cl_name" placeholder="Client Name" value="<?php echo $unpaidDetail->cl_name; ?>" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Task Name</label>
                                                               <input type="text" name="task_name" id="task_name" placeholder="Task Name" value="<?php echo $unpaidDetail->task_name; ?>" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Pay date</label>
                                                               <input type="date" name="pay_date" id="pay_date" value="<?php echo $unpaidDetail->pay_date; ?>" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Amount</label>
                                                               <input type="number" name="pay_amount" id="pay_amount" placeholder="Amount" value="<?php echo $unpaidDetail->pay_amount; ?>" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Description</label>
                                                               <input type="text" name="description" id="description" placeholder="Description" value="<?php echo $unpaidDetail->description; ?>" class="form-control">
                                                            </div>
                                                            
                                                          
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Status</label><br>
                                                               <label class="radio-inline"><input name="status" value="Active" <?php echo ($unpaidDetail->status == 'Active') ? "checked" : "";?> type="radio">Active</label> 

                                                               <label class="radio-inline"><input name="status" value="Inactive" <?php echo ($unpaidDetail->status == 'Inactive') ? "checked" : "";?> type="radio">Inactive</label>
                                                              
                                                            </div>
                                                             <div class="col-md-6 form-group">
                                                               <label class="control-label">Pay Status</label><br>
                                                               <label class="radio-inline"><input name="pay_status" value="Paid" <?php echo ($unpaidDetail->pay_status == 'Paid') ? "checked" : "";?> type="radio">Paid</label> 

                                                               <label class="radio-inline"><input name="pay_status" value="Unpaid" <?php echo ($unpaidDetail->pay_status == 'Unpaid') ? "checked" : "";?> type="radio">Unpaid</label>                                                             
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
                                         
                                       </div>
                                    
                                    </div> -->
                                   

                                    <?php endforeach; ?>
                                    <?php else: ?>
                                       <tr>
                                          <td colspan="8">No Data Avalaible.</td>
                                       </tr>
                                 <?php endif; ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                    <!--  <?php
                        if($msg = $this->session->flashdata('msg')):
                        $msg_class = $this->session->flashdata('msg_class');
                         ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="<?php echo $msg_class; ?>"><?php echo $msg; ?></div>
                            </div>
                        </div>
                         <?php endif; ?> -->
                         <?= $this->pagination->create_links(); ?>
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
