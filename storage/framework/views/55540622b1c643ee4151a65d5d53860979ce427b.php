<?php $__env->startSection('content'); ?>


<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="col-lg-12">
    <div class="card">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->
        <div class="card-body" style="margin-bottom: 100px;">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="custom-nav-project-tab" data-toggle="tab" href="#custom-nav-project" role="tab" aria-controls="custom-nav-project"
                         aria-selected="true"><i class="fab fa-product-hunt"></i>Job Details</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-tasks"></i>Interviews</a>
                        <!-- <a class="nav-item nav-link <?php echo e(old('tab') == 'custom-nav-xflow' ? 'active' : ''); ?>" id="custom-nav-xflow-tab" data-toggle="tab" href="#custom-nav-xflow" role="tab" aria-controls="custom-nav-xflow"
                         aria-selected="false"><i class="fas fa-cogs"></i>Job Status</a> -->
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-project" role="tabpanel" aria-labelledby="custom-nav-project-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Title</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label"><?php echo e($job['title']); ?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label"><b>Responsibilities</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="description" class=" form-control-label"><?php echo e($job->description); ?></label>
                                </div>
                            </div>                    
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label"><b>Requirements</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="description" class=" form-control-label"><?php echo e($job->requirements); ?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="benefits" class=" form-control-label"><b>Benefits</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="benefits" class=" form-control-label"><?php echo e($job->benefits); ?></label>
                                </div>
                            </div>                    
                            <!-- <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="poc" class=" form-control-label"><b>Experience Level</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="poc" class=" form-control-label">
                                        <?php if($job['experience_level'] == 1): ?>
                                            Entry Level
                                        <?php elseif($job['experience_level'] == 2): ?>
                                            Intermediate Level
                                        <?php elseif($job['experience_level'] == 3): ?>
                                            Expert Level 
                                        <?php else: ?>
                                            Not Selected
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>                     -->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="cco" class=" form-control-label"><b>Years of Experience</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="cco" class=" form-control-label">
                                        <?php if($job['experience_years'] == 1): ?>
                                            0-2 Years
                                        <?php elseif($job['experience_years'] == 2): ?>
                                            2-5 Years
                                        <?php elseif($job['experience_years'] == 5): ?>
                                            5+ Years
                                        <?php else: ?>
                                            Not Selected
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>State</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php echo e($job->state); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>City</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php echo e($job->city); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Education</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php if($job['qualification'] == 1): ?>
                                            Graduate
                                        <?php elseif($job['qualification'] == 2): ?>
                                            Post Graduate
                                        <?php elseif($job['qualification'] == 3): ?>
                                            PHD
                                        <?php elseif($job['qualification'] == 4): ?>
                                            No College Degree
                                        <?php elseif($job['qualification'] == 5): ?>
                                            Diploma
                                        <?php else: ?>
                                            Not Selected
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Field</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php if($job['certificate'] == 1): ?>
                                            Engineering
                                        <?php elseif($job['certificate'] == 2): ?>
                                            Architecture
                                        <?php elseif($job['certificate'] == 3): ?>
                                            Science
                                        <?php elseif($job['certificate'] == 4): ?>
                                            Computer
                                        <?php elseif($job['certificate'] == 5): ?>
                                            Business
                                        <?php elseif($job['certificate'] == 6): ?>
                                            Design
                                        <?php elseif($job['certificate'] == 7): ?>
                                            Construction
                                        <?php elseif($job['certificate'] == 8): ?>
                                            Political
                                        <?php elseif($job['certificate'] == 9): ?>
                                            Math
                                        <?php elseif($job['certificate'] == 10): ?>
                                            Technical
                                        <?php else: ?>
                                            Not Selected
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Due Date</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php echo e($job['due_date']); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Skills</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php echo e($job['skills']); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Salary Range</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php echo e($job['salary_offered']); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="card-body card-block">
                            <div class="table-responsive table-responsive-data2" style="margin-bottom: 100px;">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <!-- <th>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </th> -->
                                            <th>Date</th> 
                                            <th>Time</th>
                                            <th>State</th>
                                            <th>City</th>
                                            
                                            <!-- <th>status</th>
                                            <th>price</th> -->
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interviewkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <tr class="tr-shadow">
                                            <!-- <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td> -->
                                            <td><?php echo e($value->date); ?></td>
                                            <td><?php echo e($value->time); ?></td>                        
                                            <td><?php echo e($value->state); ?></td>                        
                                            <td><?php echo e($value->city); ?></td>
                                            <td>
                                                <?php if($accept == 0): ?>
                                                <div class="table-data-feature">
                                                    <a href="<?php echo e(route('interviewed.edit', $value->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Accept">
                                                        <i class="zmdi zmdi-mail-send"></i> 
                                                    </button></a>
                                                </div>
                                                <?php else: ?>
                                                 Interview scheduled
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-xflow" role="tabpanel" aria-labelledby="custom-nav-xflow-tab">
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>