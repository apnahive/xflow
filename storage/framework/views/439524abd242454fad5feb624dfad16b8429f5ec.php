<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Task Template
            </div>            
            <form action="<?php echo e(route('task_templates.update', $task['id'])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="card-body card-block">
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="<?php echo e(old('name', $task['name'])); ?>">
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                            <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="detail" class="form-control-label">Detail</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="detail" id="detail" rows="3" placeholder="Detail..." class="form-control"><?php echo $task->detail; ?></textarea>
                            <?php if($errors->has('detail')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('detail')); ?></strong>
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