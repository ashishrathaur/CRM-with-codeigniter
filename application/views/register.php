
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>CRM Client panel</title>
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?= base_url('assets/dist/img/ico/favicon.png'); ?>" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
         <!-- Pe-icon-7-stroke -->
        <link href="<?= base_url('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- style css -->
        <link href="<?= base_url('assets/dist/css/stylecrm.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
    </head>
    <body>
        <style>
            .container-center.lg { max-width: 650px; }       
            /*.container-center { margin: 5% auto 0; }*/
            textarea.form-control { width: 98%; }
            .form-group { margin-bottom: 5px; }
            .help-block { color: red; }
            body{ background-image: url(/assets/image/bg_tiles.2.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;}
        </style>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="back-link">
                <a href="<?= base_url('Welcome'); ?>" class="btn btn-add">Back to Dashboard</a>
            </div>
            <div class="container-center lg">
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
             <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Register</h3>
                                <small><strong>Please enter your data to register.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="<?= base_url('Registration/register_valid');?>" method="post" id="loginForm" novalidate>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>User name</label>
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
                                <div class="form-group col-lg-6">
                                    <label>Phone Number</label>
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
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
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
                                <div class="form-group col-lg-6">
                                    <label>Create Password</label>
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
                                
                                <div class="form-group col-lg-12">
                                    <label>Full Address</label>
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
                            </div>
                            <div>
                                <button type="submit" class="btn btn-warning">Register</button>
                                <a class="btn btn-add" href="<?= base_url('login'); ?>">Login</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="<?= base_url('assets/plugins/jQuery/jquery-1.12.4.min.js'); ?>" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    </body>
</html>