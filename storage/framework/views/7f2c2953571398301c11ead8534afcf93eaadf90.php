<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Hours
            </div>            
            <form action="<?php echo e(route('work_order_hour.update', $work_order_hours['id'])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="card-body card-block">                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <label for="title" class=" form-control-label"><?php echo $work_order_hours->date; ?></label>
                        </div>
                    </div>
                   
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Hours</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="hours" type="text" class="form-control" name="hours" value="<?php echo e(old('title', $work_order_hours['hours'])); ?>" required autofocus>
                                <?php if($errors->has('hours')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('hours')); ?></strong>
                                </span>
                                <?php endif; ?> 
                        </div>
                    </div>
                    
                    
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Update
                </button>                
            </div>
            </form>
        </div>        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>