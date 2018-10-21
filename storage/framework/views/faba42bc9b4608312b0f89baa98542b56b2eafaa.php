<?php $__env->startSection('content'); ?>
<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create</strong> Project
            </div>            
            <form action="<?php echo e(route('projects.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control" required>
                            <?php if($errors->has('name')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
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
                            <?php if($errors->has('description')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                            <?php endif; ?>                            
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="poc" class=" form-control-label">POC</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="poc" id="poc" class="custom-select form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> <?php echo e($user->lastname); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>                            
                            <?php if($errors->has('poc')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('poc')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                         
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="cco" class=" form-control-label">CCO</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="cco" id="cco" class="form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> <?php echo e($user->lastname); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('cco')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('cco')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <script type="text/javascript">
                          $(".chosen").chosen();
                    </script>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="duedate" class=" form-control-label">Due Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="duedate" type="date" class="form-control" name="duedate" value="<?php echo e(old('duedate')); ?>" required autofocus>
                            <?php if($errors->has('duedate')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('duedate')); ?></strong>
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