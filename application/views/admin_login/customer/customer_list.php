<!-- Header Navbar -->
         <!-- =============================================== -->
       <!-- Left side column. contains the sidebar -->
         <!-- =============================================== -->
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <style>
            .btn-purple{ margin: 1px; }
         </style>
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
                                 <h4>Customer Detail</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                           <!--    <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="<?= base_url('customer/add_customer'); ?>"> <i class="fa fa-plus"></i> Add Customer
                                 </a>  
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
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <!-- <?php //print_r($c_details); ?> -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Id</th>
                                       <th>Customer Name</th>
                                       <th>Mobile</th>
                                       <th>Email</th>
                                       <th>Address</th>                                       
                                       <th>Register Date</th>                                       
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if(count($c_details)): ?>
                                    <?php foreach($c_details as $c_list): ?>
                                    <tr>
                                       <td><?php echo $c_list->user_id; ?></td>                                       
                                       <td><a style="color: black;" href="<?= base_url(); ?>admin/Customer/customerService/<?php echo $c_list->user_id; ?>">
                                 <?php echo ucwords(strtolower($c_list->user_name)); ?></a></td>
                                       <td><!-- <i class="fa fa-phone"></i> --><a href="tel:<?php echo $c_list->phone; ?>" class="__cf_email__" style="margin: 2px;"><?php echo $c_list->phone; ?></a></td>
                                       <td><!-- <i class="fa fa-envelope"></i> --><a href="mailto:<?php echo $c_list->user_email; ?>" class="__cf_email__" style="margin: 2px;"><?php echo $c_list->user_email; ?></a></td>
                                       <td style="width: 25%"><span><?php echo $c_list->address; ?></span></td>
                                     
                                       <?php
                                       $date=date_create($c_list->regDate);
                                       $join_date = date_format($date,"d M Y"); ?>
                                       <td><?php echo $join_date; ?></td>
                                       <td>
                                          <!-- <form method="post" action="<?= base_url('customer/showCustomerServices'); ?>"> -->
                                          <!-- <input type="hidden" name="user_id_services" value="<?php echo $c_list->user_id; ?>"> -->
                                         <!--  <button type="submit" class="btn btn-success btn-xs searchbtn" title="See Services" data-toggle="modal" data-user="<?php echo $c_list->user_id; ?>" data-target="#eye-<?php echo $c_list->user_id; ?>"><i class="fa fa-eye"></i></button> -->
                                          <!-- </form> -->
                                          <form method="post" action="<?= base_url('admin/customer/fetchSubDetails'); ?>">
                                              <input type="hidden" name="subscriberName" value="<?php echo $c_list->user_name; ?>">
                                          <button type="submit" class="btn btn-violet btn-xs" title="Add Services"><i class="fa fa-plus"></i> </button>
                                       </form>

                                          <button type="button" class="btn btn-add btn-xs" title="Edit Data" data-toggle="modal" data-target="#customer1-<?php echo $c_list->user_id; ?>"><i class="fa fa-pencil"></i></button>
                                        

                                          <button type="button" class="btn btn-danger btn-xs" title="Delete Customer" data-toggle="modal" data-target="#customer2-<?php echo $c_list->user_id; ?>"><i class="fa fa-trash-o"></i> </button>

                                           
                                          
                                       </td>
                                    </tr>

   <!--==================================== Add Modal -==================================-->
                                    <div class="modal fade" id="add-<?php echo $c_list->user_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-user m-r-5"></i> Add Customer Services</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form class="form-horizontal" method="post" action="<?= base_url('admin/customer/userValidation'); ?>">
                                                         <input type="hidden" name="user_id" value="<?php echo $c_list->user_id; ?>">
                                                         <input type="hidden" name="subscriberName" value="<?php echo $c_list->user_name; ?>">
                                                         <input type="hidden" name="subscriberPhone" value="<?php echo $c_list->phone; ?>">
                                                         <input type="hidden" name="subscriberEmail" value="<?php echo $c_list->user_email; ?>">       
                                                         <input type="hidden" name="subscriberAddress" value="<?php echo $c_list->address; ?>">
                                                         <!-- <input type="hidden" name="productId" value="1"> -->
                                                         <fieldset>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Customer Name:</label>
                                                               <input type="text" name="user_name" disabled placeholder="Customer Name" class="form-control" value="<?php echo ucwords(strtolower($c_list->user_name)); ?>">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Email:</label>
                                                               <input type="email" name="user_email" disabled placeholder="Email" class="form-control" value="<?php echo $c_list->user_email; ?>">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Mobile</label>
                                                               <input type="number" name="phone" disabled placeholder="Mobile" class="form-control" value="<?php echo $c_list->phone; ?>">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Address</label><br>
                                                               <textarea name="address" class="form-control" disabled rows="2"><?php echo $c_list->address; ?></textarea>
                                                            </div>
                                                             <div class="pro">
                                
                                                               </div>
                                                            <div class="col-md-6 form-group">
                                                               <label>Select Service Name</label>
 
                                                               <select class="form-control productName" onchange="fetchId($('.productName').find('option:selected').attr('data-class'))" name="productName" required>
                                                                  <option value="">---Select Service name---</option> 
                                                               </select>
                                                            </div>
                                                           <!--  <div class="col-md-6 form-group">
                                                               <label class="control-label">Service Name:</label>
                                                               <input type="text" name="productName" id="productName" placeholder="Ex: Networking" class="form-control" required="">
                                                            </div> -->
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Product Validity:</label>
                                                               <input type="text" name="productValidity" id="productValidity" placeholder="Ex: 1 month" class="form-control" required="">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Payment Amount:</label>
                                                               <input type="text" name="productAmount" id="productAmount" placeholder="Ex: 12000" class="form-control" required="">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Subscribe Date:</label>
                                                               <input type="date" name="subscriptionDate" id="subscriptionDate" class="form-control" required="">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Status</label><br>
                                                               <label class="radio-inline"><input name="status" value="Active" type="radio" checked>Active</label> 

                                                               <label class="radio-inline"><input name="status" value="Inactive" type="radio">Inactive</label>                            
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Pay Status</label><br>
                                                               <label class="radio-inline"><input name="pay_status" value="Paid" type="radio" checked>Paid</label> 

                                                               <label class="radio-inline"><input name="pay_status" value="Unpain" type="radio">Unpaid</label>                            
                                                            </div>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <div class="pull-right">
                                                                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                                                                  <button type="submit" class="btn btn-add btn-sm">Add</button>
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
                                    <!-- end add model -->

                                    <!--==================================== eye Modal-==================================-->
                                    <div class="modal fade" id="eye-<?php echo $c_list->user_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 class="length"><i class="fa fa-user m-r-5"></i></h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <!-- <div class="col-md-6 form-group"> -->
                                                         <div class="showdata">
                                                            
                                                         </div>
                                                      <!-- </div> -->
                                                   </div>    
                                                  
                                                </div>

                                             </div>

                                             <div class="modal-footer" id="footerbutton">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>'
                                             </div>
                                          </div>
                                          <!-- /.modal-content -->
                                       </div>
                                       <!-- /.modal-dialog -->
                                    </div>
                                    <!-- end add model -->

         <!--==================================================== ======================================= -->
                                      <!-- customer Modal1 -->
                                    <div class="modal fade" id="customer1-<?php echo $c_list->user_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-user m-r-5"></i> Update Customer</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form class="form-horizontal" method="post" action="<?= base_url('admin/customer/edit_customer'); ?>">
                                                         <input type="hidden" name="user_id" value="<?php echo $c_list->user_id; ?>">
                                                         <fieldset>
                                                            <!-- Text input-->
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Customer Name:</label>
                                                               <input type="text" name="user_name" placeholder="Customer Name" class="form-control" value="<?php echo ucwords(strtolower($c_list->user_name)); ?>">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Email:</label>
                                                               <input type="email" name="user_email" placeholder="Email" class="form-control" value="<?php echo $c_list->user_email; ?>">
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Mobile</label>
                                                               <input type="number" name="phone" placeholder="Mobile" class="form-control" value="<?php echo $c_list->phone; ?>">
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Address</label><br>
                                                               <textarea name="address" rows="3"><?php echo $c_list->address; ?></textarea>
                                                            </div>
                                                            <!-- <div class="col-md-4 form-group">
                                                               <label class="control-label">Type</label>
                                                               <input type="text" name="cl_type" placeholder="type" class="form-control" value="<?php echo $c_list->cl_type; ?>">
                                                            </div> -->
                                                               <!-- <div class="form-group">
                                                                  <label>Sex</label><br>
                                                                  <label class="radio-inline"><input name="sex" value="1" checked="checked" type="radio">Male</label> 
                                                                  <label class="radio-inline"><input name="sex" value="0" type="radio">Female</label>
                                                               </div> -->
                                                            
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
                                    <div class="modal fade" id="customer2-<?php echo $c_list->user_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-user m-r-5"></i> Delete Customer</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form class="form-horizontal" method="post" action="<?= base_url('admin/customer/delete_customer'); ?>">
                                                         <input type="hidden" name="user_id" value="<?php echo $c_list->user_id; ?>">
                                                         <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <label class="control-label">Confirm Deletion<!-- Are you sure you want to delete customer <?php echo ucwords(strtolower($c_list->user_name)); ?> ? --></label>
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
       <?php $this->load->view('inc/footer') ?>
       <script>

            $(document).ready(function(){

             $('.searchbtn').click(function(){
             var userId = $(this).attr('data-user');
              
              // alert(userId);
              if(userId != '')
              {
               load_data(userId);
              }
              else
              {
               alert('No data avalaible');
               // load_data();
              }
             });

             function load_data(userId)
             {
               
              $.ajax({
               type: 'ajax',
               method: 'post',
               url:"<?php echo base_url() ?>admin/customer/showCustomerServices",
               async: false,
               datatype: 'json',               
               data:{userId:userId},
               success:function(result)
               {
                   decode_data = jQuery.parseJSON(result);
                   var showData = '';
                   // var footerbutton = '';
                   var length = decode_data.length;
                  $.each( decode_data, function( i, val ) {
                    // alert(val.productName);
                     showData += '<button type="button" class="btn btn-purple btn-outline">'+val.productName+'</button>';
                     // '<li>''</li>';
                      // footerbutton = '<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>';
                   });
                  $('.length').html('Total Number of Services: '+length);
                  ((showData!='')?$('.showdata').html(showData):$('.showdata').html('This customer has not taken any services.'));
                  // $('#footerbutton').html(footerbutton);

               },
               error: function(){
                  alert('Could not get Data from Database');
               }
                  // alert(data);
                // $('#result').html(data);
               
              });
             }
            
            });
         </script>
         <script>
            $(document).ready(function(){ 
              $.ajax({                           
               url:"<?php echo base_url() ?>admin/Services/dee",
               async: false,
               datatype: 'json',    
               success:function(serviceDetails)
               {
                   decode_data = jQuery.parseJSON(serviceDetails);
                   var showData = '';
                   var id;
                  // alert(serviceDetails);
                  $.each( decode_data, function( i, val ) {
                    // alert(val.serviceName);
                     showData += ' <option value="'+val.serviceName+'" data-class="'+val.serviceId+'">'+val.serviceName+'</option>';
                     // '<li>''</li>';                     
                   });

                  $('.productName').html('<option value="" selected="">---Select Service name---</option>'+showData);                  
               },
               error: function(){
                  alert('Could not get Data from Database');
               }                 
              });   
            });
            function fetchId(str)
            {
              var productId = str;
               id2 = '<input name="productId" type="hidden" value="'+productId+'">';
               $('.pro').html(id2);
            }
         </script>
        