
         <!-- =============================================== -->
         
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <style>
           .help-block { color: red; }
           .require{ color: red; }
         </style>
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add New Customer</h1>
                  <small>Add Customer Details</small>
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
                        <?php
                         if($error = $this->session->flashdata('login')): 
                          $colormsg = $this->session->flashdata('class');
                          ?>
                         <div class="row">
                             <div class="col-lg-12 col-md-12">
                                 <div class="alert alert-<?php echo $colormsg; ?>"><?php echo $error; ?></div>
                             </div>
                         </div>
                          <?php endif; ?>
                          <form class="col-md-6" action="<?= base_url('admin/customer/newCustomerValidation');?>" method="post" id="loginForm" novalidate>
                            <!-- <div class="row"> -->
                                <div class="form-group">
                                    <label>User name<span class="require">*</span></label>
                                    <?php
                                    $userName = array(
                                        'name'          => strip_tags('user_name'),
                                        'id'            => 'user_name',
                                        'class'         => 'form-control',
                                        'placeholder'   => 'Enter Your Name',
                                        'value'         => set_value('user_name')
                                    );
                                        echo form_input($userName);
                                    ?>

                                    <span class="help-block small"><?php echo form_error('user_name'); ?></span>
                                </div>
                                <div class="form-group ">
                                    <label>Phone Number<span class="require">*</span></label>
                                     <?php
                                    $userPhone = array(
                                        'name'          => 'phone',
                                        'id'            => 'phone',
                                        'class'         => 'form-control',
                                        'placeholder'   => 'Enter Your Phone Number',
                                        'value'         => set_value('phone')
                                    );
                                        echo form_input($userPhone);
                                    ?>
                                    
                                    <span class="help-block small"><?php echo form_error('phone'); ?></span>
                                </div>
                                <div class="form-group ">
                                    <label>Email Address<span class="require">*</span></label>
                                     <?php
                                    $userEmail = array(
                                        'name'          => 'user_email',
                                        'id'            => 'user_email',
                                        'class'         => 'form-control',
                                        'placeholder'   => 'Enter Your Email Id',
                                        'value'         => set_value('user_email')
                                    );
                                        echo form_input($userEmail);
                                    ?>
                                  
                                    <span class="help-block small"><?php echo form_error('user_email'); ?></span>
                                </div>
                                <div class="form-group ">
                                    <label>Create Password<span class="require">*</span></label>
                                     <?php
                                    $userPassword = array(                                    
                                        'name'          => 'password',
                                        'id'            => 'password',
                                        'class'         => 'form-control',
                                        'placeholder'   => 'Create Your Password',
                                        'value'         => set_value('password')
                                    );
                                        echo form_password($userPassword);
                                    ?>
                                   
                                    <span class="help-block small"><?php echo form_error('password'); ?></span>
                                </div>
                                
                                <div class="form-group">
                                    <label>Full Address<span class="require">*</span></label>
                                     <?php
                                    $userAddress = array(
                                        'name'          => strip_tags('address'),
                                        'rows'           => 2,
                                        'id'            => 'address',
                                        'class'         => 'form-control',
                                        'placeholder'   => 'Enter Your Address',
                                        'value'         => set_value('address')
                                    );
                                        echo form_textarea($userAddress);
                                    ?>
                                  
                                    <span class="help-block small"><?php echo form_error('address'); ?></span>
                                </div>
                            <!-- </div> -->
                            <div>
                                <button type="submit" class="btn btn-warning">Add</button>
                              
                            </div>
                        </form>
                     
                        </div>

                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         