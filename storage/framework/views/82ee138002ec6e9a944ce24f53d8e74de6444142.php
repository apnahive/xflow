<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>X-Flow</title>

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">

    <!-- Jquery JS-->
    <script src="<?php echo e(asset('assets/vendor/jquery-3.2.1.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <!-- Scripts -->
     <script>
     
     $(document).ready(function () {
     $('#nav-tab a[href="#<?php echo e(old('tab')); ?>"]').tab('show')
     });
     $(document).ready(function () {
     $('#nav-tab a[href="#<?php echo e(old('tab')); ?>"-tab]').tab('show')
     });     
    </script>
    <!-- <script src="<?php echo e(asset('js/app.js')); ?>"></script> -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <!-- Commented for calender to work -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('style'); ?>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
   
   
</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?php echo e(route('home')); ?>">
<!-- <<<<<<< HEAD -->
                            <!-- <img src="<?php echo e(asset('assets/images/icon/logo-blue.png')); ?>" alt="AgileAx" /> -->
<!-- ======= -->
                            <img src="<?php echo e(asset('assets/images/icon/logo-blue.png')); ?>" alt="X-Flow" />
<!-- >>>>>>> refs/remotes/origin/master -->
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub <?php echo e(request()->is('home') ? 'active' : ''); ?>">
                            <a class="js-arrow" href="<?php echo e(route('home')); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <!-- <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul> -->
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client view')): ?>
                       <li class="<?php echo e(request()->is('projects') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('projects.index')); ?>">
                                <i class="fab fa-product-hunt"></i>Client</a>
                        </li>
                        <?php endif; ?>
                        <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
                        <li class="<?php echo e(request()->is('users') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('users.index')); ?>">
                                <i class="fas fa-users"></i>Users</a>
                        </li>
                        <li class="<?php echo e(request()->is('task_templates') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('task_templates.index')); ?>">
                                <i class="fas fa-folder-open"></i>Task Template</a>
                        </li>
                        <!-- <li class="<?php echo e(request()->is('userroles') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('userroles.index')); ?>">
                                <i class="fas fa-users"></i>User Roles</a>
                        </li> -->
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view calender')): ?>
                        <li class="<?php echo e(request()->is('calender') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('calender.index')); ?>">
                                <i class="fas fa-calendar-alt"></i>Calender</a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task view')): ?>
                        <li class="<?php echo e(request()->is('tasks') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('tasks.index')); ?>">
                                <i class="fas fa-tasks"></i>Tasks</a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('xflow view')): ?>
                        <li class="<?php echo e(request()->is('xflows') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('xflows.index')); ?>">
                            <i class="fas fa-cogs"></i>Xflow</a>
                        </li>                        
                        <li class="<?php echo e(request()->is('teams') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('teams.index')); ?>">
                            <i class="fas fa-cogs"></i>Team</a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checklist view')): ?>
                        <li class="<?php echo e(request()->is('checklists') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('checklists.index')); ?>">
                                <i class="fas fa-map-signs"></i>Checklists</a>
                        </li>
                        <li class="<?php echo e(request()->is('checklist_templates') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('checklist_templates.index')); ?>">
                                <i class="fas fa-map-signs"></i>Checklist Templates</a>
                        </li>
                        <?php endif; ?>
                        <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
                        <li class="<?php echo e(request()->is('profiles') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('profiles.index')); ?>">
                                <i class="fas fa-users"></i>Candidates</a>
                        </li>
                        <li class="<?php echo e(request()->is('client_profiles') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('client_profiles.index')); ?>">
                                <i class="fas fa-users"></i>Recuriters</a>
                        </li>
                        <li class="<?php echo e(request()->is('jobs') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('jobs.index')); ?>">
                                <i class="fas fa-users"></i>Jobs</a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can create job')): ?>
                        <li class="<?php echo e(request()->is('client_profiles') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('client_profiles.show', Auth::user()->id)); ?>">
                                <i class="fas fa-users"></i>Client Profile</a>
                        </li>
                        <li class="<?php echo e(request()->is('jobs') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('jobs.create')); ?>">
                                <i class="fas fa-users"></i>Post a Jobs</a>
                        </li>
                        <li class="<?php echo e(request()->is('jobs') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('jobs.index')); ?>">
                                <i class="fas fa-users"></i>View Jobs</a>
                        </li>
                        <?php endif; ?>  
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can apply job')): ?>
                        <li class="<?php echo e(request()->is('profiles') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('profiles.create')); ?>">
                                <i class="fas fa-users"></i>Candidate Profile</a>
                        </li>
                        <li class="<?php echo e(request()->is('interviewed') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('interviewed.index')); ?>">
                                <i class="fas fa-users"></i>Interviews</a>
                        </li>
                        <?php endif; ?>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo e(asset('assets/images/icon/logo-blue.png')); ?>" alt="Logo" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <div class="account2" style="padding-bottom: 0;">
                    <div class="image">
                        <img src="<?php echo e(asset('assets/images/icon/CWI_Logo.png')); ?>" alt="John Doe">
                    </div>
                    <!-- <h4 class="name">john doe</h4>
                    <a href="#">Sign out</a> -->
                </div>
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="<?php echo e(request()->is('home') ? 'active' : ''); ?>">
                            <a class="js-arrow" href="<?php echo e(route('home')); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <!-- <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul> -->
                        </li>                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client view')): ?>
                        <li class="<?php echo e(request()->is('projects') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('projects.index')); ?>">
                                <i class="fab fa-product-hunt"></i>Client</a>
                        </li>
                        <?php endif; ?>                        
                        <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
                        <li class="<?php echo e(request()->is('users') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('users.index')); ?>">
                                <i class="fas fa-users"></i>Users</a>
                        </li>
                        <li class="<?php echo e(request()->is('task_templates') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('task_templates.index')); ?>">
                                <i class="fas fa-folder-open"></i>Task Template</a>
                        </li>
                        <!-- <li class="<?php echo e(request()->is('userroles') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('userroles.index')); ?>">
                                <i class="fas fa-users"></i>User Roles</a>
                        </li> -->
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view calender')): ?>
                        <li class="<?php echo e(request()->is('calender') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('calender.index')); ?>">
                                <i class="fas fa-calendar-alt"></i>Calender</a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task view')): ?>
                        <li class="<?php echo e(request()->is('tasks') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('tasks.index')); ?>">
                                <i class="fas fa-tasks"></i>Tasks</a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('xflow view')): ?>
                        <li class="<?php echo e(request()->is('xflows') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('xflows.index')); ?>">
                            <i class="fas fa-cogs"></i>Xflow</a>
                        </li>
                       
                        <li class="<?php echo e(request()->is('teams') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('teams.index')); ?>">
                            <i class="fas fa-cogs"></i>Team</a>
                        </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checklist view')): ?>
                        <li class="<?php echo e(request()->is('checklists') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('checklists.index')); ?>">
                                <i class="fas fa-map-signs"></i>Checklists</a>
                        </li>
                        <li class="<?php echo e(request()->is('checklist_templates') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('checklist_templates.index')); ?>">
                                <i class="fas fa-map-signs"></i>Checklist Templates</a>
                        </li>
                        <?php endif; ?>
                        <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
                        <li class="<?php echo e(request()->is('profiles') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('profiles.index')); ?>">
                                <i class="fas fa-users"></i>Candidates</a>
                        </li>
                        <li class="<?php echo e(request()->is('client_profiles') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('client_profiles.index')); ?>">
                                <i class="fas fa-users"></i>Recuriters</a>
                        </li>
                        <li class="<?php echo e(request()->is('jobs') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('jobs.index')); ?>">
                                <i class="fas fa-users"></i>Jobs</a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can create job')): ?>
                        <li class="<?php echo e(request()->is('client_profiles') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('client_profiles.show', Auth::user()->id)); ?>">
                                <i class="fas fa-users"></i>Client Profile</a>
                        </li>
                        <li class="<?php echo e(request()->is('jobs') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('jobs.create')); ?>">
                                <i class="fas fa-users"></i>Post a Jobs</a>
                        </li>
                        <li class="<?php echo e(request()->is('jobs') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('jobs.index')); ?>">
                                <i class="fas fa-users"></i>View Jobs</a>
                        </li>
                        <?php endif; ?>  
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can apply job')): ?>
                        <li class="<?php echo e(request()->is('profiles') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('profiles.create')); ?>">
                                <i class="fas fa-users"></i>Candidate Profile</a>
                        </li>
                        <li class="<?php echo e(request()->is('interviewed') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('interviewed.index')); ?>">
                                <i class="fas fa-users"></i>Interviews</a>
                        </li>                        
                        <?php endif; ?>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="<?php echo route('search'); ?>" method="POST" role="search"> 
                                <?php echo e(csrf_field()); ?>

                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for clients &amp; tasks..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button" style="width: 100px;">
                                <!-- <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?php echo e(asset('assets/images/icon/avatar-01.jpg')); ?>" alt="User" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="<?php echo e(route('profile.index')); ?>"><?php echo e(Auth::user()->name); ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?php echo e(asset('assets/images/icon/avatar-01.jpg')); ?>" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="<?php echo e(route('profile.index')); ?>"><?php echo e(Auth::user()->name); ?></a>
                                                    </h5>
                                                    <!-- <span class="email">johndoe@example.com</span> -->
                                                </div>
                                            </div>
                                            <!-- <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div> -->
                                            <div class="account-dropdown__footer">
                                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i><?php echo e(__('Logout')); ?>

                                                </a>

                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                </form>

                                                <!-- <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <?php echo $__env->make('sweetalert::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>    
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
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>
