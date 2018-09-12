<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Add Tasks to Project</h3>
        <!-- <div class="table-data__tool">
            <div class="table-data__tool-left">
                
            </div>
            <div class="table-data__tool-right">
                <a href="<?php echo e(route('tasks.create')); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Task</button></a>
                
            </div>
        </div> -->
        <div class="table-responsive table-responsive-data2">
            <form class="form-horizontal  form-material" role="form" method="POST" action="<?php echo e(route('add_task.update', $template['id'])); ?>">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="project" value="<?php echo e($project); ?>">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox" id="checkAll">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>Task</th>
                        <th>Category</th>
                        <!-- <th>Due Date</th>
                        <th>Status</th> -->
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskkey => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <!-- <input type="checkbox"> -->
                                <input type="hidden" name="task<?php echo e($task->id); ?>" value="false">
                                <input type="checkbox" id="task<?php echo e($task->id); ?>" value="true" name="task<?php echo e($task->id); ?>">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td><?php echo e($task->title); ?></td>
                        <td><?php echo e($task->category1); ?></td>                        
                        <!-- <td><?php echo e($task->duedate); ?></td>                        
                        <td><?php echo e($task->category1); ?></td> -->
                        <td>
                            <!-- <div class="table-data-feature">
                                <a href="<?php echo e(route('tasks.show', $task->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                <a href="<?php echo e(route('tasks.edit', $task->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                <button class="item" data-toggle="modal" data-target="#confirm<?php echo e($task->id); ?>" data-backdrop="false">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                
                            </div> -->
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                </tbody>                
            </table>
            <div class="form-group">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-info">
                            Add to Project
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
<script type="text/javascript">
     $("#checkAll").click(function () {
         $('input:checkbox').not(this).prop('checked', this.checked);
     });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>