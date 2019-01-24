<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Add</strong> Notes
            </div>            
            <form action="<?php echo e(route('checklist_item_notes.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="item_id" value="<?php echo e($id); ?>">
            <div class="card-body card-block">                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="note" class=" form-control-label">Notes</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="note" id="note" rows="3" placeholder="Add note..." class="form-control" required></textarea>
                            <?php if($errors->has('note')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('note')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
            </form>
        </div>        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>