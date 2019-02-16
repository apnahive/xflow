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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('xflow view')): ?>
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
            <?php endif; ?>
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