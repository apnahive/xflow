<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create</strong> Work Order
            </div>            
            <form action="<?php echo e(route('work_orders.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Work Order Title" class="form-control" required>
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                            <?php if($errors->has('title')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                   
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="3" placeholder="Description..." class="form-control" required></textarea>
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                            <?php if($errors->has('description')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    
                    
                    <script type="text/javascript">
                          $(".chosen").chosen();
                    </script>
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