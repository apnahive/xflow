<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong><?php echo e($task['title']); ?></strong>
                
                <?php if($task->status == 1): ?>
                <a href="<?php echo e(route('start_task.edit', $task->id)); ?>" style="float: right;"><button class="au-btn au-btn-icon au-btn--green au-btn--small"> 
                    Initiate task
                </button></a>
                <?php endif; ?>
                <?php if($task->status == 3): ?>
                <span style="float: right;">Task Completed</span>
                <?php endif; ?>
                <!-- <a href="<?php echo e(route('start_task.show', $task->id)); ?>" style="float: right;margin-right: 15px;"><button class="au-btn au-btn-icon au-btn--green au-btn--small"> 
                    Copy
                </button></a> -->
                <?php if($task->allow == 1): ?>
                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#copy" data-backdrop="false" style="float: right;margin-right: 15px;">
                    Copy
                </button>

                

                <form action="<?php echo e(route('start_task.store')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                
                <div class="modal fade" id="copy" tabindex="-1" role="dialog" aria-labelledby="copy" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" style="text-align: left;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Copy Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="task" value="<?php echo e($task->id); ?>">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="interval" class=" form-control-label">Interval</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="interval" id="interval" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Daily</option>
                                    <option value="2">weekly</option>
                                    <option value="3">Monthly</option>
                                    <option value="4">Quaterly</option>
                                </select>
                                <?php if($errors->has('interval')): ?>
                                    <span class="help-block error">
                                        <strong><?php echo e($errors->first('interval')); ?></strong>
                                    </span>
                                <?php endif; ?> 
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="start" class=" form-control-label">Start Date</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input id="start" type="date" class="form-control" name="start" value="<?php echo date("Y-m-d"); ?>" required autofocus>
                                <?php if($errors->has('start')): ?>
                                    <span class="help-block error">
                                        <strong><?php echo e($errors->first('start')); ?></strong>
                                    </span>
                                <?php endif; ?> 
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="till" class=" form-control-label">Till Date</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input id="till" type="date" class="form-control" name="till" value="<?php echo e(old('till')); ?>" required autofocus>
                                <?php if($errors->has('till')): ?>
                                    <span class="help-block error">
                                        <strong><?php echo e($errors->first('till')); ?></strong>
                                    </span>
                                <?php endif; ?> 
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Template</button> -->
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
                <?php endif; ?>


            </div>
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="title" class=" form-control-label"><b>Title</b>: <?php echo e($task->title); ?> </label>
                        </div>
                        <div class="col col-md-6">
                            <label for="project" class=" form-control-label"><b>Project</b>: <?php echo e($task->projectname); ?> </label>
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="duedate" class=" form-control-label"><b>Contract Date</b>: <?php echo e($task->duedate); ?></label>
                        </div>
                        <div class="col col-md-6">
                            <label for="category" class=" form-control-label"><b>Category</b>: <?php echo e($task->categorys); ?></label>
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="estimated_time_to_complete" class=" form-control-label"><b>Estimated Time to Complete (in minutes)</b>: <?php echo e($task->estimated_time_to_complete); ?></label>
                        </div>
                        <div class="col col-md-6">
                            <label for="actual_time_to_complete" class="form-control-label"><b>Actual Time to Complete (in minutes)</b>: <?php echo e($task->actual_time_to_complete); ?></label>
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="status" class=" form-control-label"><b>Status</b>: <?php echo e($task->statuss); ?></label>
                        </div>
                        <div class="col col-md-6">
                            <label for="date_completed" class="form-control-label"><b>Date Completed</b>: <?php echo e($task->date_completed); ?></label>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="assignee" class=" form-control-label"><b>Assigned To</b>: <?php echo e($task->assigneename); ?></label>
                        </div>
                        <div class="col col-md-6">
                            <label for="assignee" class=" form-control-label"><b>Managed By</b>: <?php echo e($task->responsibles); ?></label>
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="note" class="form-control-label"><b>Note</b>: <?php echo e($task->note); ?></label>
                        </div>
                        
                    </div>


                <?php if($task->status == 2): ?>
                <div class="card-footer">
                    <form action="<?php echo e(route('start_task.update', $task['id'])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="actual_time_to_complete" class="form-control-label">Actual Time to Complete (in minutes)</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="actual_time_to_complete" type="text" class="form-control" name="actual_time_to_complete" value="<?php echo e($task['actual_time_to_complete']); ?>" autofocus>
                        </div>

                        <?php if($errors->has('actual_time_to_complete')): ?>
                            <span class="help-block error">
                                <strong><?php echo e($errors->first('actual_time_to_complete')); ?></strong>
                            </span>
                        <?php endif; ?> 
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="date_completed" class="form-control-label">Date Completed</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="date_completed" type="date" class="form-control" name="date_completed" value="<?php echo e($task['date_completed']); ?>" autofocus>
                        </div>

                        <?php if($errors->has('date_completed')): ?>
                            <span class="help-block error">
                                <strong><?php echo e($errors->first('date_completed')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="row form-group">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Mark Complete
                        </button>                
                    </div>

                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>        
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>