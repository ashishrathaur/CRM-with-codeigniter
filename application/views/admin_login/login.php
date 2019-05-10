<?php if($this->session->userdata('id')){
    return redirect('admin/Welcome');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Zopsoft CRM Admin Panel</title>

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
        <style>
            .help-block{ color: red; }
            body{ background-image: url(/assets/image/bg_tiles.2.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;}
        </style>
    </head>
    <body>

        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="back-link">
                <a href="<?= base_url('Welcome'); ?>" class="btn btn-add">Client Login</a>
            </div>
            <div class="container-center">
               <?php
               if($error = $this->session->flashdata('login_failed')): ?>
               <div class="row">
                   <div class="col-lg-12 col-md-12">
                       <div class="alert alert-danger"><?php echo $error; ?></div>
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
                                <h3>Admin Login</h3>
                                <small><strong>Please enter your credentials to login.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('admin/Login/dash_open', ['id'=>'loginForm']); ?>
                     <!--    <form action="login/dash_open.php" id="loginForm" novalidate> -->
                            <div class="form-group">
                                <label class="control-label" for="username">User Email</label>
                                <?php
                                $name_data = array(
                                        'name'          => 'user_email',
                                        'id'            => 'user_email',
                                        'class'         => 'form-control',
                                        'title'         => 'Please enter you username',
                                        'placeholder'   => 'john@gmail.com',
                                        'value'         => set_value('user_email')
                                );
                                ?>

                                <?php echo form_input($name_data); ?>
                               <!--  <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control"> -->
                                <span class="help-block small"> <?php echo form_error('user_email'); ?></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                 <?php
                                $password_data = array(
                                        'name'          => 'password',
                                        'id'            => 'password',
                                        'class'         => 'form-control',
                                        'title'         => 'Please enter you password',
                                        'placeholder'   => '********',
                                        'value'         => set_value('password')
                                );
                                ?>
                                <?php echo form_password($password_data); ?>
                               <!--  <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control"> -->
                                <span class="help-block small"><?php echo form_error('password'); ?></span>
                            </div>
                            <div>
                                <?php echo form_button(['type'=>'submit', 'class'=>'btn btn-add', 'value'=>'true', 'content'=>'Login']); ?>
                                <!-- <button class="btn btn-add">Login</button> -->
                                <a class="btn btn-warning" href="<?= base_url('Registration'); ?>">Register</a>
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