<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template"> -->

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo e(asset('assets/css/font-face.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('assets/vendor/font-awesome-4.7/css/font-awesome.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('assets/vendor/font-awesome-5/css/fontawesome-all.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('assets/vendor/mdi-font/css/material-design-iconic-font.min.css')); ?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo e(asset('assets/vendor/bootstrap-4.1/bootstrap.min.css')); ?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo e(asset('assets/vendor/animsition/animsition.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('assets/vendor/wow/animate.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('assets/vendor/css-hamburgers/hamburgers.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('assets/vendor/slick/slick.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('assets/vendor/select2/select2.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo e(asset('assets/css/theme.css')); ?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <!-- <div class="login-wrap"> -->
                <div class="col-lg-8" style="margin-left: 15%;">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?php echo e(asset('assets/images/icon/logo.png')); ?>" alt="AgileAX">
                            </a>
                        </div>
                         <?php if(Session::has('alert')): ?>
                            <div class="alert alert-success">
                                <?php echo e(Session::get('alert')); ?>

                                <?php
                                Session::forget('alert');
                                ?>
                            </div>
                            <?php endif; ?>
                        <div class="login-form">
                            <form method="post" action="<?php echo e(route('register')); ?>" aria-label="<?php echo e(__('Register')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input id="name" type="text" class="au-input au-input--full" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>" required autofocus>

                                            <?php if($errors->has('name')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                </span>
                                            <?php endif; ?>                                
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input id="email" type="email" class="au-input au-input--full" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" required>

                                            <?php if($errors->has('email')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                </span>
                                            <?php endif; ?> 
                                        </div>                                   
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input id="password" type="password" class="au-input au-input--full" placeholder="Password" name="password" required>

                                            <?php if($errors->has('password')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                </span>
                                            <?php endif; ?>                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Company</label>
                                            <input id="company" type="text" class="au-input au-input--full" name="company" placeholder="Company" value="<?php echo e(old('company')); ?>" required autofocus>

                                            <?php if($errors->has('company')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('company')); ?></strong>
                                                </span>
                                            <?php endif; ?>                                
                                        </div>
                                        <div class="form-group">
                                            <label>User Type</label>
                                            <select class="custom-select au-input au-input--full" id="user_type" name="user_type">
                                              <option value="Investment Advisor">Investment Advisor</option>
                                              <option value="Private Funds">Private Funds</option>
                                              <option value="Broker Dealer">Broker Dealer</option>
                                              <option value="Private Equity">Private Equity</option>
                                              <option value="Consultant">Consultant</option>
                                            </select>
                                        </div>
                                    </div>
                                   <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input id="lastname" type="text" class="au-input au-input--full" name="lastname" placeholder="Last Name" value="<?php echo e(old('lastname')); ?>" required autofocus>

                                            <?php if($errors->has('lastname')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('lastname')); ?></strong>
                                                </span>
                                            <?php endif; ?>                                                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <input id="dateofbirth" type="date" class="au-input au-input--full" name="dateofbirth" value="<?php echo e(old('dateofbirth')); ?>" required autofocus>

                                            <?php if($errors->has('dateofbirth')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('dateofbirth')); ?></strong>
                                                </span>
                                            <?php endif; ?>                               
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <!-- <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required> -->
                                            <input id="password-confirm" type="password" class="au-input au-input--full" placeholder="Confirm Password" name="password_confirmation" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Organization</label>
                                            <input id="organization" type="text" class="au-input au-input--full" name="organization" placeholder="Organization" value="<?php echo e(old('organization')); ?>" required autofocus>

                                            <?php if($errors->has('organization')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('organization')); ?></strong>
                                                </span>
                                            <?php endif; ?>                                
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input id="phonenumber" type="text" class="au-input au-input--full" name="phonenumber" placeholder="Phone Number" value="<?php echo e(old('phonenumber')); ?>" required autofocus>

                                            <?php if($errors->has('phonenumber')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('phonenumber')); ?></strong>
                                                </span>
                                            <?php endif; ?>                                
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div> -->
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                    </div>
                                </div> -->
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="<?php echo e(route('login')); ?>">Sign In</a>
                                </p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?php echo e(asset('assets/vendor/jquery-3.2.1.min.js')); ?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo e(asset('assets/vendor/bootstrap-4.1/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/bootstrap-4.1/bootstrap.min.js')); ?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo e(asset('assets/vendor/slick/slick.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('assets/vendor/wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/animsition/animsition.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('assets/vendor/counter-up/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/counter-up/jquery.counterup.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('assets/vendor/circle-progress/circle-progress.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/chartjs/Chart.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/select2/select2.min.js')); ?>">
    </script>

    <!-- Main JS-->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

</body>

</html>
<!-- end document-->



