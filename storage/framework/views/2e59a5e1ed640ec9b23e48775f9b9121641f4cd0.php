<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('projects.index')); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Update</strong> Password
            </div>
            <form class="form-horizontal" role="form" method="POST" action="<?php echo route('users.update', $user['id']); ?>">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password" class="form-control-label">Enter Old Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input id="old_password" type="password" class="form-control" name="old_password" value="" required autofocus>
                    <?php if($errors->has('old_password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('old_password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password" class="form-control-label">Enter New Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input id="new_password" type="password" class="form-control" name="new_password" value="" required autofocus>
                    <?php if($errors->has('new_password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('new_password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password_confirmation" class="form-control-label">Confirm Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" required autofocus>
                    <?php if($errors->has('password_confirmation')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
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