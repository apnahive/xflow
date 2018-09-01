<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Task
            </div>            
            <form action="<?php echo e(route('tasks.update', $task['id'])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="project" class=" form-control-label">Project</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="project" id="project" class="custom-select form-control chosen" <?php if($task->admin == 0): ?> disabled <?php endif; ?>>
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($project->id); ?>" <?php echo e($task['project_id'] == $project->id ? 'selected' : ''); ?>><?php echo e($project->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="<?php echo e(old('name', $task['title'])); ?>" <?php if($task->admin == 0): ?> disabled <?php endif; ?>>
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
                            <input id="duedate" type="date" class="form-control" name="duedate" value="<?php echo e($task['duedate']); ?>" required autofocus <?php if($task->admin == 0): ?> disabled <?php endif; ?>>
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
                            <select name="category" id="category" class="form-control" <?php if(!($task->admin == 1 || $task->poc == 1)): ?> disabled <?php endif; ?>>
                                <option value="0">Please select</option>
                                <option value="1" <?php echo e($task['category'] == 1 ? 'selected' : ''); ?>>Simple</option>
                                <option value="2" <?php echo e($task['category'] == 2 ? 'selected' : ''); ?>>Average</option>
                                <option value="3" <?php echo e($task['category'] == 3 ? 'selected' : ''); ?>>Difficult</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="estimated_time_to_complete" class=" form-control-label">Estimated Time to Complete (in minutes)</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="estimated_time_to_complete" type="text" class="form-control" name="estimated_time_to_complete" value="<?php echo e($task['estimated_time_to_complete']); ?>" required autofocus <?php if($task->admin == 0): ?> disabled <?php endif; ?>>
                        </div>

                        <?php if($errors->has('estimated_time_to_complete')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('estimated_time_to_complete')); ?></strong>
                            </span>
                        <?php endif; ?>                                                       
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="actual_time_to_complete" class="form-control-label">Actual Time to Complete (in minutes)</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="actual_time_to_complete" type="text" class="form-control" name="actual_time_to_complete" value="<?php echo e($task['actual_time_to_complete']); ?>" autofocus>
                        </div>

                        <?php if($errors->has('actual_time_to_complete')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('actual_time_to_complete')); ?></strong>
                            </span>
                        <?php endif; ?>                                                       
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="status" class=" form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" id="status" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1" <?php echo e($task['status'] == 1 ? 'selected' : ''); ?>>Pending</option>
                                <option value="2" <?php echo e($task['status'] == 2 ? 'selected' : ''); ?>>initiated</option>
                                <option value="3" <?php echo e($task['status'] == 3 ? 'selected' : ''); ?>>completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="date_completed" class="form-control-label">Date Completed</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="date_completed" type="date" class="form-control" name="date_completed" value="<?php echo e($task['date_completed']); ?>" autofocus>
                        </div>

                        <?php if($errors->has('date_completed')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('date_completed')); ?></strong>
                            </span>
                        <?php endif; ?>                                                       
                    </div>
                    <?php if($task->admin == 1 || $task->poc == 1 || $task->cco == 1): ?>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="assignee" class=" form-control-label">Assignee</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="assignee" id="assignee" class="custom-select form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($user->id); ?>" <?php echo e($task['assignee'] == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?> <?php echo e($user->lastname); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="note" class="form-control-label">Note</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="note" id="note" rows="3" placeholder="Note..." class="form-control"><?php echo $task->note; ?></textarea>
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
                    <i class="fa fa-dot-circle-o"></i> Update
                </button>                
            </div>
            </form>
        </div>        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>