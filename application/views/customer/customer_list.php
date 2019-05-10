<!-- Header Navbar -->
         <!-- =============================================== -->
       <!-- Left side column. contains the sidebar -->
         <!-- =============================================== -->
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Customer</h1>
                  <small>Customer List</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Add customer</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="<?= base_url('customer/add_customer'); ?>"> <i class="fa fa-plus"></i> Add Customer
                                 </a>  
                              </div>
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
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <!-- <?php //print_r($c_details); ?> -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <!-- <th>Photo</th> -->
                                       <th>Customer Name</th>
                                       <th>Mobile</th>
                                       <th>Email</th>
                                       <th>Address</th>
                                       <th>type</th>
                                       <th>Join</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if(count($c_details)): ?>
                                    <?php foreach($c_details as $c_list): ?>
                                    <tr>                                       
                                       <td><?php echo $c_list->cl_name; ?></td>
                                       <td><i class="fa fa-phone"></i><a href="tel:<?php echo $c_list->cl_phone; ?>" class="__cf_email__" style="margin: 2px;"><?php echo $c_list->cl_phone; ?></a></td>
                                       <td><i class="fa fa-envelope"></i><a href="mailto:<?php echo $c_list->cl_email; ?>" class="__cf_email__" style="margin: 2px;"><?php echo $c_list->cl_email; ?></a></td>
                                       <td><?php echo $c_list->cl_address; ?></td>
                                       <td><?php echo $c_list->cl_type; ?></td>
                                       <?php
                                       $date=date_create($c_list->join_date);
                                       $join_date = date_format($date,"d M Y"); ?>
                                       <td><?php echo $join_date; ?></td>
                                       <?php if($c_list->status == 'Inactive'){
                                          $font = '#E5343D';
                                       }
                                       else{
                                          $font = '#009688';
                                       } ?>
                                       <td><span class="label-custom label label-default" style="background-color: <?php echo $font; ?>; border: 2px solid <?php echo $font; ?>"><?php echo $c_list->status; ?></span></td>
                                       <td>
                                          <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1-<?php echo $c_list->cl_id; ?>"><i class="fa fa-pencil"></i></button>

                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2-<?php echo $c_list->cl_id; ?>"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                    </tr>
                                      <!-- customer Modal1 -->
                                    <div class="modal fade" id="customer1-<?php echo $c_list->cl_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-user m-r-5"></i> Update Customer</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form class="form-horizontal" method="post" action="<?= base_url('customer/edit_customer'); ?>">
                                                         <input type="hidden" name="cl_id" value="<?php echo $c_list->cl_id; ?>">
                                                         <fieldset>
                                                            <!-- Text input-->
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Customer Name:</label>
                                                               <input type="text" name="cl_name" placeholder="Customer Name" class="form-control" value="<?php echo $c_list->cl_name; ?>">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Email:</label>
                                                               <input type="email" name="cl_email" placeholder="Email" class="form-control" value="<?php echo $c_list->cl_email; ?>">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Mobile</label>
                                                               <input type="number" name="cl_phone" placeholder="Mobile" class="form-control" value="<?php echo $c_list->cl_phone; ?>">
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Address</label><br>
                                                               <textarea name="cl_address" rows="3"><?php echo $c_list->cl_address; ?></textarea>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Type</label>
                                                               <input type="text" name="cl_type" placeholder="type" class="form-control" value="<?php echo $c_list->cl_type; ?>">
                                                            </div>
                                                               <!-- <div class="form-group">
                                                                  <label>Sex</label><br>
                                                                  <label class="radio-inline"><input name="sex" value="1" checked="checked" type="radio">Male</label> 
                                                                  <label class="radio-inline"><input name="sex" value="0" type="radio">Female</label>
                                                               </div> -->
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Status</label><br>
                                                               <label class="radio-inline"><input name="status" value="Active" <?php echo ($c_list->status == 'Active') ? "checked" : "";?> type="radio">Active</label> 

                                                               <label class="radio-inline"><input name="status" value="Inactive" <?php echo ($c_list->status == 'Inactive') ? "checked" : "";?> type="radio">Inactive</label>
                                                               <!-- <input type="text" name="status" placeholder="type" class="form-control" value="<?php echo $c_list->status; ?>"> -->
                                                            </div>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <div class="pull-right">
                                                                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                                                                  <button type="submit" class="btn btn-add btn-sm">Save</button>
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
                                    <!-- Modal -->    
                                    <!-- Customer Modal2 -->
                                    <div class="modal fade" id="customer2-<?php echo $c_list->cl_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-user m-r-5"></i> Delete Customer</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form class="form-horizontal" method="post" action="<?= base_url('customer/delete_customer'); ?>">
                                                         <input type="hidden" name="cl_id" value="<?php echo $c_list->cl_id; ?>">
                                                         <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <label class="control-label">Are you sure delete <?php echo $c_list->cl_name; ?> ?</label>
                                                               <div class="pull-right">
                                                                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">NO</button>
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
             
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
       