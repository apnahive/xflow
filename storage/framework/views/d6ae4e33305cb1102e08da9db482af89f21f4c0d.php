<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Details</strong> Xflow
            </div>
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
                    <script type="text/javascript">
                          $(".chosen").chosen();
                    </script>
                    
            </div>
        </div>        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>