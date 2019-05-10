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
                              <a class="btn btn-add " href="<?= base_url('admin/customer/add_customer_services'); ?>"> 
                              <i class="fa fa-list"></i>  Back to subscriber name </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                          <?php foreach($subDetails as $subDetail): ?>
                           <?php echo form_open('admin/customer/userValidation', ['id'=>'addDetails', 'class'=>'col-sm-6']); ?>
                           <?php echo form_hidden('user_id', $subDetail->user_id) ?>
                           <?php echo form_hidden('subscriberName', $subDetail->user_name) ?>
                           <?php echo form_hidden('subscriberPhone', $subDetail->phone) ?>
                           <?php echo form_hidden('subscriberEmail', $subDetail->user_email) ?>     
                           <?php echo form_hidden('subscriberAddress', $subDetail->address) ?>
                         
                           <!-- <form class="col-sm-6"> -->
                              <div class="form-group">
                                 <label>Subscriber Name</label>
                                 <?php
                                $name_data = array(
                                        'name'          => strip_tags('subscriberName'),
                                        'id'            => 'subscriberName',
                                        'class'         => 'form-control',                                   
                                        'disabled'      =>'disabled',
                                        'value'         => ucwords(strtolower($subDetail->user_name))
                                );
                                ?>
                                <?php echo form_input($name_data); ?>
                                
                                  <span class="help-block small"> <?php echo form_error('subscriberName'); ?></span>
                              </div>
                         
                              <div class="form-group">
                                 <label>Subscriber Email</label>
                              <?php
                                $email_data = array(
                                        'name'          => strip_tags('subscriberEmail'),
                                        'id'            => 'subscriberEmail',
                                        'class'         => 'form-control',                                   
                                        'disabled'      =>'disabled',
                                        'value'         => $subDetail->user_email
                                );
                                ?>

                                <?php echo form_input($email_data); ?>
                                 <!-- <input type="email" class="form-control" placeholder="Enter Email" required> -->
                                  <span class="help-block small"> <?php echo form_error('cl_email'); ?></span>
                              </div>
                              <div class="form-group">
                                 <label>Subscriber Mobile</label>
                              <?php
                                $phone_data = array(
                                        'name'          => strip_tags('subscriberPhone'),
                                        'id'            => 'subscriberPhone',
                                        'type'          => 'number',
                                        'class'         => 'form-control',                                  
                                        'disabled'      =>'disabled',
                                        'value'         => $subDetail->phone
                                );
                                ?>
                                 <?php echo form_input($phone_data); ?>
                               
                                 <span class="help-block small"> <?php echo form_error('cl_phone'); ?></span>
                              </div>
                             
                              <div class="form-group">
                                 <label>Subscriber Address</label>
                              <?php
                                $address_data = array(
                                        'name'          => strip_tags('subscriberAddress'),
                                        'id'            => 'cl_address',
                                        'rows'          => '3',
                                        'class'         => 'form-control',                                  
                                        'required'      => 'required',
                                        'disabled'      =>'disabled',
                                        'value'         => $subDetail->address
                                );
                                ?>
                                <?php echo form_textarea($address_data); ?>
                                 <!-- <textarea class="form-control" rows="3" required></textarea> -->
                              </div>
                              <div id="id">
                                
                              </div>
                              <div class="form-group">
                                 <label>Select Service Name</label>

                                  <select class="form-control" onchange="fetchId($('#productName').find('option:selected').attr('data-id'))" id="productName" name="productName" required>
                                    <option value="">---Select Service name---</option>
                                     
                                   
                                    
                                 </select>
                              </div>
                             <!--  <div class="form-group">
                                 <label>Service Name</label>
                                 <?php
                                $task_data = array(
                                        'name'          => 'productName',
                                        'id'            => 'productName',
                                        'class'         => 'form-control',
                                        'title'         => 'Enter Service Name',
                                        'placeholder'   => 'Ex: Networking',
                                        'value'         => set_value('productName')
                                );
                                ?>
                                <?php echo form_input($task_data); ?>
                                
                              </div> -->
                              <div class="form-group">
                                 <label>Product Validity</label>
                                 <?php
                                $task_data = array(
                                        'name'          => 'productValidity',
                                        'id'            => 'productValidity',
                                        'class'         => 'form-control',
                                        'title'         => 'Enter Task Name',
                                        'placeholder'   => 'Ex: 1 month',
                                        'value'         => set_value('productValidity')
                                );
                                ?>
                                <?php echo form_input($task_data); ?>
                              </div>
                              <div class="form-group">
                                 <label>Payment Amount</label>
                              <?php
                                $amount_data = array(
                                        'name'          => strip_tags('productAmount'),
                                        'id'            => 'productAmount',
                                        'type'          => 'number',
                                        'class'         => 'form-control',
                                        'title'         => 'Enter Amount',
                                        'required'      => 'required',
                                        'placeholder'   => '12000',
                                        'value'         => set_value('productAmount')
                                );
                                ?>
                                 <?php echo form_input($amount_data); ?>
                                 <!-- <input type="number" class="form-control" placeholder="Enter Mobile" required> -->
                              </div>
                               <div class="form-group">
                                 <label>Subscribe Date</label>
                                  <input type="date" class="form-control" name="subscriptionDate">
                              </div>
                                <div class="form-check">
                                 <label>Status</label><br>
                                 <label class="radio-inline">
                              <?php
                                $radio_data1 = array(
                                        'name'          => strip_tags('status'),
                                        'checked'       => 'checked',
                                        'value'         => set_value('active','Active',TRUE)
                                );
                                ?>
                                <?php echo form_radio($radio_data1); ?>Active</label>
                                 <!-- <input type="radio" name="status" value="1" checked="checked"> -->

                                 <label class="radio-inline">
                              <?php
                                 $radio_data1 = array(
                                     'name'          => strip_tags('status'),
                                     'value'         => set_value('inactive','Inactive')
                                );
                                ?>
                                <?php echo form_radio($radio_data1); ?>Inctive</label>
                                    <!-- <input type="radio" name="status" value="0" > -->
                              </div>
                              
                              <div class="form-check form-group">
                                 <label>Payment Status</label><br>
                                 <label class="radio-inline">
                              <?php
                                $radio_data1 = array(
                                        'name'          => strip_tags('pay_status'),
                                        'checked'       => 'checked',
                                        'value'         => set_value('paid','Paid',TRUE)
                                );
                                ?>
                                <?php echo form_radio($radio_data1); ?>Paid</label>
                                 <!-- <input type="radio" name="status" value="1" checked="checked"> -->

                                 <label class="radio-inline">
                              <?php
                                 $radio_data1 = array(
                                     'name'          => strip_tags('pay_status'),
                                     'value'         => set_value('unpaid','Unpaid')
                                );
                                ?>
                                <?php echo form_radio($radio_data1); ?>Unpaid</label>
                                    <!-- <input type="radio" name="status" value="0" > -->
                              </div>

                           
                           
                             <!--  <div class="form-group">
                                 <label>Sex</label><br>
                                 <label class="radio-inline"><input name="sex" value="1" checked="checked" type="radio">Male</label> 
                                 <label class="radio-inline"><input name="sex" value="0" type="radio">Female</label>
                              </div> -->
                             
                              <div class="reset-button">
                                 <?php
                                       $resretdata = array(
                                                           'name'          => 'button',
                                                           'id'            => 'button',
                                                           'value'         => 'Reset',
                                                           'type'          => 'reset',
                                                           'content'       => 'Reset',
                                                           'class'         => 'btn btn-warning'
                                                          );
                                 ?>
                                <?php echo form_reset($resretdata); ?>
                                 <!-- <a href="#" class="btn btn-warning">Reset</a> -->
                                 <?php echo form_button(['type'=>'submit', 'class'=>'btn btn-success', 'value'=>'true', 'content'=>'Save']); ?>
                                 <!-- <a href="#" class="btn btn-success">Save</a> -->
                              </div>
                           </form>
                         <?php endforeach; ?>
                        </div>

                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
       <?php  $this->load->view('admin_login/inc/footer'); ?>
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
                     showData += ' <option value="'+val.serviceName+'" data-id="'+val.serviceId+'">'+val.serviceName+'</option>';
                     // '<li>''</li>';                     
                   });
                  $('#productName').html('<option value="" selected="">---Select Service name---</option>'+showData);                  
               },
               error: function(){
                  alert('Could not get Data from Database');
               }
                  // alert(data);
                // $('#result').html(data);               
              });           
            });

            function fetchId(str)
            {
              var id = str;
               id2 = '<input id="productId" name="productId" type="hidden" value="'+id+'">';
               $('#id').html(id2);
            }
        </script>