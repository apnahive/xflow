<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>


<div class="row" style="margin-bottom: 100px;">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Tasks</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <!-- <div class="rs-select2--light rs-select2--md">
                    <select class="js-select2" name="property">
                        <option selected="selected">All Properties</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    <select class="js-select2" name="time">
                        <option selected="selected">Today</option>
                        <option value="">3 Days</option>
                        <option value="">1 Week</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <button class="au-btn-filter">
                    <i class="zmdi zmdi-filter-list"></i>filters</button> -->
            </div>
            <div class="table-data__tool-right">
                <?php if($tasks->admin == 1 || $tasks->poc == 1 || $tasks->cco == 1): ?>
                <a href="<?php echo e(route('tasks.create')); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Task</button></a>
                <?php endif; ?>
                <!-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Export</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div> -->
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <form action="<?php echo route('tasks.search'); ?>" method="POST" role="search" class="search-des">
                    <?php echo e(csrf_field()); ?>

                    <div class="search-task">
                        <div class="col-md-4">
                            <input id="task" type="text" class="col-md-12" name="task" <?php if($search->task): ?> value="<?php echo e($search->task); ?>" <?php else: ?> value="<?php echo e(old('task')); ?>" <?php endif; ?> placeholder="Task" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;">
                            <div class="rs-select2--light rs-select2--md" style="margin-top: 10px;width: 100%;font-weight: 600;font-size: 16px;">
                                <select class="js-select2" id="assigned" name="assigned">
                                    <option value="0" selected="selected">Assigned To</option>
                                    <?php $__currentLoopData = $assignedto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assigned): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <option value="<?php echo e($assigned->id); ?>" <?php if($search->assigned == $assigned->id): ?> selected <?php endif; ?>><?php echo e($assigned->name); ?> <?php echo e($assigned->lastname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                    
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input id="project" type="text" class="col-md-12" name="project" <?php if($search->project): ?> value="<?php echo e($search->project); ?>" <?php else: ?> value="<?php echo e(old('project')); ?>" <?php endif; ?> placeholder="Project" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;">
                            <div class="rs-select2--light rs-select2--md" style="margin-top: 10px;width: 100%;font-weight: 600;font-size: 16px;">
                                <select class="js-select2" id="status" name="status">
                                    <option value="0" selected="selected">Status</option>
                                    <option value="1" <?php if($search->status == 1): ?> selected <?php endif; ?>>Pending</option>
                                    <option value="2" <?php if($search->status == 2): ?> selected <?php endif; ?>>Initiated</option>
                                    <option value="3" <?php if($search->status == 3): ?> selected <?php endif; ?>>Completed</option>                                    
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="rs-select2--light rs-select2--md" style="width: 100%;font-weight: 600;font-size: 16px;">
                                <select class="js-select2" id="managed" name="managed">
                                    <option value="0" selected="selected">Managed By</option>
                                    <?php $__currentLoopData = $managedby; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $managed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <option value="<?php echo e($managed->id); ?>" <?php if($search->managed == $managed->id): ?> selected <?php endif; ?>><?php echo e($managed->name); ?> <?php echo e($managed->lastname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="dropDownSelect2"></div>
                                <button type="submit" class="btn btn-md btn-info" style="width: 100%;color: white;background-color: #4272d7;border-radius: 1px;font-size: 16px;margin-top: 10px;"><i class="zmdi zmdi-search"></i> Search</button>
                            </div>                            
                        </div>                        
                    </div>
                    </form>
                    <tr>
                        <!-- <th>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </th> -->
                        <th>Task</th>
                        <th>Project</th>
                        <th>Managed By</th>
                        <th>Assigned To</th>
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskkey => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="tr-shadow" <?php if($task->color == 1): ?> style="border-left: 3px solid #fa4251;" <?php elseif($task->color == 2): ?> style="border-left: 3px solid #ffa037;" <?php elseif($task->color == 3): ?> style="border-left: 3px solid #00ad5f;" <?php elseif($task->color == 4): ?> style="border-left: 3px solid #777272;" <?php endif; ?>>
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td><a href="<?php echo e(route('tasks.show', $task->id)); ?>"><?php echo e($task->title); ?> </a><br><span style="color: #808080b0;">(Due Date: <?php echo e($task->duedate); ?>)</span></td>
                        <td><a href="<?php echo e(route('projects.show', $task->project_id)); ?>"><?php echo e($task->projectname); ?></td>                        
                        <td><?php echo e($task->managedby); ?></td>                        
                        <td><?php echo e($task->assignedto); ?> <br> Status: <?php echo e($task->status1); ?></td>
                        <td>
                            <div class="table-data-feature">
                                <!-- <a href="<?php echo e(route('tasks.show', $task->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a> -->
                                <?php if($tasks->admin == 1 || $task->poc == 1 || $task->cco == 1): ?>
                                <?php if($task->status < 3): ?>
                                <button class="item" data-toggle="modal" data-target="#assign<?php echo e($task->id); ?>" data-backdrop="false">
                                    <i class="fa fa-user"></i>
                                </button>

                                <div class="modal fade" id="assign<?php echo e($task->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($task->id); ?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <form action="<?php echo e(route('assign_tasks.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="task_id" value="<?php echo e($task->id); ?>">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Assign Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
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
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-ban"></i>Cancel</button>
                                      </div>
                                    </div>
                                    </form>
                                  </div>
                                </div>


                                <?php endif; ?>
                                <?php endif; ?>                                
                                <a href="<?php echo e(route('tasks.show', $task->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>                                
                                <?php if($tasks->admin == 1 || $task->poc == 1): ?>
                                <?php if($task->status < 3): ?>
                                <a href="<?php echo e(route('tasks.edit', $task->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                <?php endif; ?>
                                <?php endif; ?>
                                
                                <?php if($tasks->admin == 1): ?>
                                <button class="item" data-toggle="modal" data-target="#confirm<?php echo e($task->id); ?>" data-backdrop="false">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                <!-- <button type="button" class="btn btn-priamry"  data-toggle="modal" data-target="#confirm<?php echo e($task->id); ?>">Delete</button> -->

                                <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                
                                <div class="modal fade" id="confirm<?php echo e($task->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($task->id); ?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        You are going to delete Task. All the associated records will be deleted. You won't be able to revert these changes!
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Task</button>
                                        <button type="submit" class="btn btn-primary" >Yes! Delete it</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>
                                <?php endif; ?>


                                <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button> -->
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>