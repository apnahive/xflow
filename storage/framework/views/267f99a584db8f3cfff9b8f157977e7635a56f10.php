<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create</strong> Task
            </div>            
            <form action="<?php echo e(route('tasks.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="project" class=" form-control-label">Project</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="project" id="project" class="custom-select form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div> 
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Title" class="form-control">
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                            <?php if($errors->has('title')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="duedate" class=" form-control-label">Due Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="duedate" type="date" class="form-control" name="duedate" value="<?php echo e(old('duedate')); ?>" required autofocus>
                        </div>

                        <?php if($errors->has('duedate')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('duedate')); ?></strong>
                            </span>
                        <?php endif; ?>                                                       
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="category" class=" form-control-label">Category</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="category" id="category" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1">Simple</option>
                                <option value="2">Average</option>
                                <option value="3">Difficult</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="estimated_time_to_complete" class=" form-control-label">Estimated Time to Complete (in minutes)</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="estimated_time_to_complete" type="text" class="form-control" name="estimated_time_to_complete" value="<?php echo e(old('estimated_time_to_complete')); ?>" required autofocus>
                        </div>

                        <?php if($errors->has('estimated_time_to_complete')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('estimated_time_to_complete')); ?></strong>
                            </span>
                        <?php endif; ?>                                                       
                    </div>
                    <!-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="actual_time_to_complete" class="form-control-label">Actual Time to Complete</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="actual_time_to_complete" type="time" class="form-control" name="actual_time_to_complete" value="<?php echo e(old('actual_time_to_complete')); ?>" required autofocus>
                        </div>

                        <?php if($errors->has('actual_time_to_complete')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('actual_time_to_complete')); ?></strong>
                            </span>
                        <?php endif; ?>                                                       
                    </div> -->
                    <!-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="status" class=" form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" id="status" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1">Pending</option>
                                <option value="2">initiated</option>
                                <option value="3">completed</option>
                            </select>
                        </div>
                    </div> -->
                    <!-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="date_completed" class="form-control-label">Date Completed</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="date_completed" type="date" class="form-control" name="date_completed" value="<?php echo e(old('date_completed')); ?>" required autofocus>
                        </div>

                        <?php if($errors->has('date_completed')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('date_completed')); ?></strong>
                            </span>
                        <?php endif; ?>                                                       
                    </div> -->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="note" class="form-control-label">Note</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="note" id="note" rows="3" placeholder="Note..." class="form-control"></textarea>
                            <?php if($errors->has('note')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('note')); ?></strong>
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