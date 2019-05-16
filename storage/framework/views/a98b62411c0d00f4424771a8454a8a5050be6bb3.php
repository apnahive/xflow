<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="col-lg-12">
    <div class="card" style="margin-bottom: 100px;">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->
        <div class="card-body">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="custom-nav-details-tab" data-toggle="tab" href="#custom-nav-details" role="tab" aria-controls="custom-nav-details"
                         aria-selected="true"><i class="fas fa-info-circle"></i> Details</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fab fa-product-hunt"></i>Projects</a>                        
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-details" role="tabpanel" aria-labelledby="custom-nav-details-tab">
                            <div class="card-body card-block">                    
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="title" class=" form-control-label">Title</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label"><?php echo e($xflow['title']); ?></label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="description" class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label"><?php echo e($xflow['description']); ?></label>
                                        
                                    </div>
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="assign" class=" form-control-label">Assign User</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label"><?php echo e($user->name); ?> <?php echo e($user->lastname); ?></label>
                                        
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="assignteam" class=" form-control-label">Assign Team</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label"><?php echo e($team->name); ?></label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="startdate" class=" form-control-label">Start Date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label"><?php echo e($xflow['startdate']); ?></label>
                                        
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="duedate" class=" form-control-label">Due Date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label"><?php echo e($xflow['duedate']); ?></label>
                                        
                                    </div>
                                </div>
                                
                                
                        </div>                 
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                       <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th> -->
                                        <th>User</th>
                                        <th>POC</th>
                                        <th>CCO</th>
                                        <!-- <th>Assigned To</th> -->
                                        <!-- <th>status</th>
                                        <th>price</th> -->
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($users) > 0): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="tr-shadow">
                                        <!-- <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td> -->
                                        <td><?php echo e($value->name); ?> <?php echo e($value->lastname); ?></td>
                                        <td>
                                            <?php $__currentLoopData = $value->pocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pockey => $poc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('projects.show', $poc->id)); ?>"><?php echo e($poc->name); ?></a><br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $value->ccos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ccokey => $cco): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('projects.show', $cco->id)); ?>"><?php echo e($cco->name); ?></a><br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>

                                    </tr>
                                    <tr class="spacer"></tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr style="text-align: center;"><td colspan="5">No Users</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>



<!-- <a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Details</strong> Xflow
            </div>
            
        </div>        
    </div>
</div> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>