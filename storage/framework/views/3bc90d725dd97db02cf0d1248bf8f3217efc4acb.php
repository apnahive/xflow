<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">We found <?php echo e($search); ?> in <?php echo e($count); ?> places</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="<?php echo e(route('search')); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Back</button></a>
                
            </div>
            <div class="table-data__tool-right">
                
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>                        
                        <th>Item</th>
                        <th>Place</th>
                        <th></th>
                        <!-- <th>Due Date</th> -->
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectkey => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($project->can_view): ?>                    
                    <tr class="tr-shadow">                        
                        <td><?php echo e($project->name); ?></td>
                        <td>projects</td>                        
                        <td></td>                        
                        <!-- <td></td> -->
                        <td>
                            <div class="table-data-feature">
                                <a href="<?php echo e(route('projects.show', $project->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                            </div>
                        </td>
                    </tr>
                    <!-- <tr class="spacer"></tr> -->
                    <?php endif; ?>                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskkey => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                    <tr class="tr-shadow">                        
                        <td><?php echo e($task->title); ?></td>
                        <td>tasks</td>                        
                        <td></td>                        
                        <!-- <td></td> -->
                        <td>
                            <div class="table-data-feature">
                                <a href="<?php echo e(route('tasks.show', $task->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                            </div>
                        </td>
                    </tr>
                    <!-- <tr class="spacer"></tr> -->                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

<!-- <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Projects</strong> 
            </div>                        
            <div class="card-body card-block">
                <div class="row">
                    <div class="col-md-1">#</div>
                    <div class="col-md-3">Name</div>
                    <div class="col-md-3">Details</div>
                    <div class="col-md-5">Action</div>
                </div>
                <hr>
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectkey => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-md-1"><?php echo e($project->id); ?></div>
                    <div class="col-md-3"><?php echo e($project->name); ?></div>
                    <div class="col-md-3">POC: <?php echo e($project->pocname); ?><br>CCO: <?php echo e($project->cconame); ?><br>Due Date: <?php echo e($project->duedate); ?></div>
                    <div class="col-md-5" style="display:flex;">
                        <div class="col-md-4"><a href="<?php echo e(route('projects.show', $project->id)); ?>"><button type="button" class="btn btn-primary btn-sm">View</button></a></div>
                        <div class="col-md-4"><a href="<?php echo e(route('projects.show', $project->id)); ?>"><button type="button" class="btn btn-success btn-sm">Edit</button></a></div>
                        <div class="col-md-4"><a href="<?php echo e(route('projects.show', $project->id)); ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></div>
                    </div>
                </div>
                <hr>   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                                            
            </div>            
        </div>        
    </div>
</div> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>