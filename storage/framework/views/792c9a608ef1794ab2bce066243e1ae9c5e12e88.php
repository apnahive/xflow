<?php $__env->startSection('content'); ?>
<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <!-- <div class="card-header">
                
            </div>             -->
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('importuser.store')); ?>" accept-charset="UTF-8" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

               <div class="row" style="margin-top: 10px;">
                   <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group row" style="margin: 20px;">
                            <label for="user_file" class="col-md-3">Select File to Import:</label>
                            <div class="col-md-9">
                            <input class="form-control" name="user_file" type="file" id="user_file">
                            
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin: 10px;">
                    <input class="btn btn-primary" type="submit" value="Upload">
                    </div>
                </div>
            </form>
        </div>        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>