<!-- Header Navbar -->
         <!-- =============================================== -->
       <!-- Left side column. contains the sidebar -->
         <!-- =============================================== -->
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <style>
            .btn-purple{ margin: 1px; }
            .help-block { color: red; }
         </style>
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-bitbucket-square"></i>
               </div>
               <div class="header-title">
                  <h1>Services</h1>
                  <small>Services List</small>
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
                                 <h4>Services</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                  <button type="button" class="btn btn-violet btn-md" title="Add Services" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i>Add Services</button>                              
                              </div>                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <!-- <?php //print_r($c_details); ?> -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Service Id</th>
                                       <th>Service Name</th>
                                      <!--  <th>Validity</th>
                                       <th>Amount</th>  -->                                                          
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if(count($serviceDetails)): ?>
                                    <?php foreach($serviceDetails as $serviceDetail): ?>
                                    <tr>
                                       <td><?php echo $serviceDetail->serviceId; ?></td>                                       
                                       <td><?php echo ucwords(strtolower($serviceDetail->serviceName)); ?></td>
                                       <!-- <td><?php echo $serviceDetail->serviceValidity; ?></td>
                                       <td><?php echo $serviceDetail->serviceAmount; ?></td> -->
                                      
                                       <td>
                                          <!-- <form method="post" action="<?= base_url('customer/showCustomerServices'); ?>"> -->
                                          <!-- <input type="hidden" name="serviceId_services" value="<?php echo $serviceDetail->serviceId; ?>"> -->
                                          <button type="button" class="btn btn-add btn-xs" title="Edit Data" data-toggle="modal" data-target="#customer1-<?php echo $serviceDetail->serviceId; ?>"><i class="fa fa-pencil"></i></button>
                                        

                                          <button type="button" class="btn btn-danger btn-xs deleteService" title="Delete Customer" data-toggle="modal" data-id="<?php echo $serviceDetail->serviceId; ?>" data-target="#customer2-<?php echo $serviceDetail->serviceId; ?>"><i class="fa fa-trash-o"></i> </button>

                                           
                                          
                                       </td>
                                    </tr>

   <!--==================================== Add Modal -==================================-->
                                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-bitbucket-square m-r-5"></i>Add Services</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form class="form-horizontal" method="post" action="<?= base_url('admin/Services/serviceValidation'); ?>">
                                                         
                                                         <fieldset>
                                                           
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Services Name:</label>
                                                               <input type="text" name="serviceName" placeholder="Services Name" class="form-control" required="">
                                                               
                                                            </div>
                                                           <!--  <div class="col-md-6 form-group">
                                                               <label class="control-label">Service Validity:</label>
                                                               <input type="text" name="serviceValidity" placeholder="1 Month or 1 Year" class="form-control" required="">
                                                            </div>
                                                            
                                                            <div class="col-md-6 form-group">
                                                               <label class="control-label">Service Amount:</label>
                                                               <input type="number" name="serviceAmount" placeholder="10000" class="form-control" required="">
                                                            </div> -->                                       
                                                           
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
                                    <div class="modal fade" id="eye-<?php echo $serviceDetail->serviceId; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <div class="modal fade" id="customer1-<?php echo $serviceDetail->serviceId; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-bitbucket-square m-r-5"></i> Update Sevices</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form class="form-horizontal" method="post" action="<?= base_url('admin/services/edit_service'); ?>">
                                                         <input type="hidden" name="serviceId" value="<?php echo $serviceDetail->serviceId; ?>">
                                                         <fieldset>
                                                            <!-- Text input-->
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Service Name:</label>
                                                               <input type="text" name="serviceName" placeholder="Customer Name" class="form-control" value="<?php echo ucwords(strtolower($serviceDetail->serviceName)); ?>">
                                                            </div>
                                                             <!-- <div class="col-md-4 form-group">
                                                               <label class="control-label">Service Validity</label>
                                                               <input type="text" name="serviceValidity" placeholder="1 year or 1 month" required class="form-control" value="<?php echo $serviceDetail->serviceValidity; ?>">
                                                            </div>
                                                           
                                                            <div class="col-md-4 form-group">
                                                               <label class="control-label">Service Amount:</label>
                                                               <input type="number" name="serviceAmount" placeholder="Ex:1000" class="form-control" required value="<?php echo $serviceDetail->serviceAmount; ?>">
                                                            </div>  -->
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <div class="pull-right">
                                                                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
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
                                    <!-- Modal -->    
                                    <!-- Customer Modal2 -->
                                    <div class="modal fade" id="customer2-<?php echo $serviceDetail->serviceId; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-bitbucket-square m-r-5"></i> Delete Service</h3>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <form class="form-horizontal" method="post" action="<?= base_url('admin/services/delete_service'); ?>">
                                                         <input type="hidden" name="serviceId" value="<?php echo $serviceDetail->serviceId; ?>">
                                                         <fieldset>
                                                            <div class="col-md-12 form-group user-form-group">
                                                               <label class="control-label">Confirm Deletion<!-- Are you sure you want to delete service : <?php echo ucwords(strtolower($serviceDetail->serviceName)); ?> ? --></label>
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
            <span class="help-block small text-center"><?php echo form_error('serviceName', "Already Exists."); ?></span>
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
                    // alert(val.serviceName);
                     showData += '<button type="button" class="btn btn-purple btn-outline">'+val.serviceName+'</button>';                     
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
               $('.deleteService').click(function(){
                  var serviceId = $(this).attr('data-id');
                  // alert(serviceId);
                   if(serviceId != '')
                    {
                     load_data1(serviceId);
                    }
                    else
                    {
                     alert('No data avalaible');
                     // load_data();
                    }
               });
             function load_data1(serviceId)
             {               
              $.ajax({
               type: 'ajax',              
               url:"<?php echo base_url() ?>admin/Services/showServicesId",
               async: false,
               datatype: 'json',      
               success:function(result)
               {
                  decode_data = jQuery.parseJSON(result);                 
                  var arr1 = [];
                  var length = decode_data.length;
                  $.each( decode_data, function( i, val ) {
                  arr1.push(val.productId);                
                   });
                   if(jQuery.inArray(serviceId, arr1) !== -1){
                    alert("Customer already subscribed this service");
                 }
                 else{
                  alert('This service not subscribed. You can delete it.')
                 }
                 },  
               error: function(){
                  alert('Could not get Data from Database');
               }
               
              });
             }

            });
         </script>