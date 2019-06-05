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
        
        <div class="page-content--bgf7" style="margin-bottom: 10px;">

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2" style="padding-top: 10px;padding-bottom: 0px; ">
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
        </div>

            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <!-- <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Highest Level View
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- END WELCOME--> 
            <div class="row">
            <section class="welcome p-t-10 col-md-6">
                <div class="page-content--bgf7" style="margin-bottom: 30px;">
                <div class="container">
                     <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <h3 style="margin: 24px;">
                                            <i class="zmdi zmdi-account-calendar"></i> My Top 10 Task</h3>
                                    <!-- <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        
                                        
                                    </div> -->
                                    <div class="au-task js-list-load">
                                        <!-- <div class="au-task__title">
                                            <p>Tasks for John Doe</p>
                                        </div> -->
                                        <div class="au-task-list js-scrollbar3" style="height: 400px;">
                                            <?php if(count($mytasks) > 0): ?>
                                            <?php $__currentLoopData = $mytasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskkey => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="au-task__item"  <?php if($task->color == 1): ?> style="border-left: 3px solid #fa4251;" <?php elseif($task->color == 2): ?> style="border-left: 3px solid #ffa037;" <?php elseif($task->color == 3): ?> style="border-left: 3px solid #00ad5f;" <?php elseif($task->color == 4): ?> style="border-left: 3px solid #777272;" <?php endif; ?>>
                                                <div class="au-task__item-inner">
                                                    <h5 class="task">
                                                        <a href="<?php echo e(route('tasks.show', $task->id)); ?>"><?php echo e($task->title); ?></a>
                                                    </h5>
                                                    <span class="time">Contract Date: <?php echo e($task->duedate); ?></span>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div style="text-align: center;margin-top: 100px;">No Tasks Available</div>
                                            <?php endif; ?>
                                        </div>
                                        <!-- <div class="au-task__footer">
                                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('xflow view')): ?>
                <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
                <?php else: ?>
                <div class="page-content--bgf7" style="margin-bottom: 30px;">
                <section class="statistic">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="statistic__item">
                                        <h2 class="number"><a href="<?php echo e(route('tasks.index')); ?>"><?php echo e($poc->task); ?> tasks </a> </h2>
                                        <span class="desc">in <a href="<?php echo e(route('projects.index')); ?>"><?php echo e($poc->project); ?> projects as Consultant</a></span>
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
                </div>
                <?php endif; ?>
                <div class="page-content--bgf7" style="margin-bottom: 30px;">
                <section class="statistic statistic2" style="padding-top: 1px;">

                    <div class="container">
                        <h3 style="margin: 24px;">Your Tasks</h3>
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--red">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;"><?php echo e($tasks->red); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;">tasks past due date</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--orange">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;"><?php echo e($tasks->yellow); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;">7 days to due</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--orange" style="background-color: #9dff00;">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;"><?php echo e($tasks->lightgreen); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;">30 days to due</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--green">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;"><?php echo e($tasks->green); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;">greater than 90 days to complete</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                </div>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can apply job')): ?>
                <div class="page-content--bgf7" style="margin-bottom: 30px;">
                <section class="statistic statistic2" style="padding-top: 1px;">
                    <div class="container">
                        <h3 style="margin: 24px;">Your Interviews</h3>
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--red">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;"><?php echo e($interviews->red); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;">interviews past due date</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--orange">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;"><?php echo e($interviews->yellow); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;">3 days to due</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--orange" style="background-color: #9dff00;">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;"><?php echo e($interviews->lightgreen); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;">7 days to due</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--green">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;"><?php echo e($interviews->green); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;">more than 7 days for interview</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                </div>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can create job')): ?>
                <div class="page-content--bgf7" style="margin-bottom: 30px;">
                <section class="statistic statistic2" style="padding-top: 1px;">
                    <div class="container">
                        <h3 style="margin: 24px;">Your Jobs</h3>
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--red">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;"><?php echo e($jobs->red); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;">jobs past due date</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--orange">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;"><?php echo e($jobs->yellow); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;">3 days to due</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--orange" style="background-color: #9dff00;">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;"><?php echo e($jobs->lightgreen); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;">7 days to due</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--green">
                                    <h2 class="number"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;"><?php echo e($jobs->green); ?></a></h2>
                                    <span class="desc"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;">more than 7 days for jobs</a></span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                </div>
                
                <?php endif; ?>
            </section>

            <section class="welcome p-t-10 col-md-6">
                <!-- Big and pending award removed -->
                
                <div class="page-content--bgf7" style="margin-bottom: 30px;">
                 <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                            <h3 style="margin: 24px;">Job Posting</h3>
                            <div class="table-responsive table-responsive-data2" style="margin-bottom: 30px;">
                                <table class="table table-data2">
                                    <!-- <thead>
                                        <tr>
                                            <th>Consultant</th>
                                            <th>CCO</th>
                                            <th>Contract Date</th>
                                            <th></th>
                                        </tr>
                                    </thead> -->
                                    <tbody>
                                        <?php if(count($myjobs) > 0): ?>
                                        <?php $__currentLoopData = $myjobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="tr-shadow">
                                            <td><a href="<?php echo e(route('jobs.show', $value->id)); ?>"><?php echo e($value->title); ?></a></td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <div style="text-align: center;margin-top: 10px;">No Jobs Posted</div>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                     </div>
                 </div>
                </div>
                 <div class="page-content--bgf7" style="margin-bottom: 30px;">
                 <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                            <h3 style="margin: 24px;">Schedule Interviews</h3>
                            <div class="table-responsive table-responsive-data2" style="margin-bottom: 30px;">
                                <table class="table table-data2">
                                    <!-- <thead>
                                        <tr>
                                            <th>Consultant</th>
                                            <th>CCO</th>
                                            <th>Contract Date</th>
                                            <th></th>
                                        </tr>
                                    </thead> -->
                                    <tbody>
                                        <?php if(count($myinterviews) > 0): ?>
                                        <?php $__currentLoopData = $myinterviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="tr-shadow">
                                            <td><a href="<?php echo e(route('profiles.show', $value->candidate_id)); ?>"><?php echo e($value->name); ?></a></td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <div style="text-align: center;margin-top: 10px;">No Schedule Interviews</div>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                     </div>
                 </div>
                </div>
                <div class="page-content--bgf7" style="margin-bottom: 30px;">
                 <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                            <h3 style="margin: 24px;">Time</h3>
                            <div class="table-responsive table-responsive-data2" style="margin-bottom: 30px;">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>Week</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-shadow">
                                            <td style="font-weight: 600;font-size: 28px;">16</td>
                                            <td style="font-weight: 600;font-size: 28px;">46</td>
                                            <td style="font-weight: 600;font-size: 28px;">144</td>
                                            <td style="font-weight: 600;font-size: 28px;">1280</td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                     </div>
                 </div>
                </div>
             </section>
             </div>




            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('xflow view')): ?>
            <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
            <?php else: ?>
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="statistic__item">
                                    <h2 class="number"><a href="<?php echo e(route('tasks.index')); ?>"><?php echo e($poc->task); ?> tasks </a> </h2>
                                    <span class="desc">in <a href="<?php echo e(route('projects.index')); ?>"><?php echo e($poc->project); ?> projects as Consultant</a></span>
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
                    <h3>Your Tasks</h3>
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;"><?php echo e($tasks->red); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;">tasks past due date</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;"><?php echo e($tasks->yellow); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;">7 days to due</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange" style="background-color: #9dff00;">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;"><?php echo e($tasks->lightgreen); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;">30 days to due</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;"><?php echo e($tasks->green); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;">greater than 90 days to complete</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can apply job')): ?>
            <section class="statistic statistic2">
                <div class="container">
                    <h3>Your Interviews</h3>
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;"><?php echo e($interviews->red); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;">interviews past due date</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;"><?php echo e($interviews->yellow); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;">3 days to due</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange" style="background-color: #9dff00;">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;"><?php echo e($interviews->lightgreen); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;">7 days to due</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;"><?php echo e($interviews->green); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;">more than 7 days for interview</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can create job')): ?>
            <section class="statistic statistic2">
                <div class="container">
                    <h3>Your Jobs</h3>
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;"><?php echo e($jobs->red); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', 'past')); ?>" style="color: white;">jobs past due date</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;"><?php echo e($jobs->yellow); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', '7-days')); ?>" style="color: white;">3 days to due</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange" style="background-color: #9dff00;">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;"><?php echo e($jobs->lightgreen); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', '30-days')); ?>" style="color: white;">7 days to due</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;"><?php echo e($jobs->green); ?></a></h2>
                                <span class="desc"><a href="<?php echo e(route('calender.show', 'future')); ?>" style="color: white;">more than 7 days for jobs</a></span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?> -->



            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can apply job')): ?>
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="statistic__item statistic__item--blue">
                                    <h2 class="number"><a href="#" style="color: white;">Total Job Post </a> </h2>
                                    <span class="desc"><a href="#" style="color: white;">2</a></span>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="statistic__item statistic__item--green">
                                    <h2 class="number"><a href="#" style="color: white;">Total Qualified Candidate</a></h2>
                                    <span class="desc"><a href="#" style="color: white;">0</a></span>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div id="piechart"></div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {

              var record=<?php echo json_encode($pie); ?>;
              console.log(record);

              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Source');
              data.addColumn('number', 'Total_Signup');
              for(var k in record)
              {
                var v = record[k];
               
                data.addRow([k,v]);
                console.log(v);
              }
              /*var data = google.visualization.arrayToDataTable([
                $pie,
              ['Task', 'Hours per Day'],
              ['Work', 8],
              ['Eat', 2],
              ['TV', 4],
              ['Gym', 2],
              ['Sleep', 8]
            ]);*/

              // Optional; add a title and set the width and height of the chart
              var options = {'title':'Skill with Jobs', 'width':550, 'height':400};

              // Display the chart inside the <div> element with id="piechart"
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
              chart.draw(data, options);
            }
            </script>
            <?php endif; ?> -->


            
            <!-- END STATISTIC-->
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>