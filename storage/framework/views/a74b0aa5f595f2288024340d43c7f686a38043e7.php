<?php $__env->startSection('content'); ?>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->
 <!-- PAGE CONTENT-->
        <div class="page-content--bgf7" style="margin-bottom: 100px;">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="<?php echo e(route('home')); ?>">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Highest Level View
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- STATISTIC-->
            <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
            <?php else: ?>
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="statistic__item">
                                    <h2 class="number"><a href="<?php echo e(route('tasks.index')); ?>"><?php echo e($poc->task); ?> tasks </a> </h2>
                                    <span class="desc">in <a href="<?php echo e(route('projects.index')); ?>"><?php echo e($poc->project); ?> projects as POC</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="statistic__item">
                                    <h2 class="number"><a href="<?php echo e(route('tasks.index')); ?>"><?php echo e($cco->task); ?> tasks </a></h2>
                                    <span class="desc">in <a href="<?php echo e(route('projects.index')); ?>"><?php echo e($cco->project); ?> projects as CCO</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="statistic__item">
                                    <h2 class="number"><a href="<?php echo e(route('tasks.index')); ?>"><?php echo e($tasks->remaining); ?> tasks </a></h2>
                                    <span class="desc">in other projects assigned</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number"><a href="<?php echo e(route('tasks.index')); ?>" style="color: white;"><?php echo e($tasks->red); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('tasks.index')); ?>" style="color: white;">tasks past due date</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"><a href="<?php echo e(route('tasks.index')); ?>" style="color: white;"><?php echo e($tasks->yellow); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('tasks.index')); ?>" style="color: white;">3 days to due</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number"><a href="<?php echo e(route('tasks.index')); ?>" style="color: white;"><?php echo e($tasks->green); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('tasks.index')); ?>" style="color: white;">greater than 3 days to complete</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">$1,060,386</h2>
                                <span class="desc">total earnings</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>

            
            <!-- END STATISTIC-->
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>