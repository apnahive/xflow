<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Xflow
            </div>            
            <form action="<?php echo e(route('xflows.update', $xflow['id'])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="card-body card-block">                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="<?php echo e(old('title', $xflow['title'])); ?>">
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
                            <textarea name="description" id="description" rows="3" placeholder="Description..." class="form-control"><?php echo $xflow->description; ?></textarea>
                            <?php if($errors->has('description')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div> 
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="assign" class=" form-control-label">Assign User</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="assign" id="assign" class="custom-select form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($user->id); ?>" <?php echo e($xflow['assignee'] == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?> <?php echo e($user->lastname); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('assign')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('assign')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="assignteam" class=" form-control-label">Assign Team</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="assignteam" id="assignteam" class="custom-select form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($team->id); ?>" <?php echo e($xflow['team_id'] == $team->id ? 'selected' : ''); ?>><?php echo e($team->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('assignteam')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('assignteam')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="startdate" class=" form-control-label">Start Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="startdate" type="date" class="form-control" name="startdate" value="<?php echo e(old('startdate', $xflow['startdate'])); ?>" required autofocus>
                            <?php if($errors->has('startdate')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('startdate')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="duedate" class=" form-control-label">Due Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="duedate" type="date" class="form-control" name="duedate" value="<?php echo e(old('duedate', $xflow['duedate'])); ?>" required autofocus>
                            <?php if($errors->has('duedate')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('duedate')); ?></strong>
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
                    <i class="fa fa-dot-circle-o"></i> Update
                </button>                
            </div>
            </form>
        </div>        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>