Hi <?php echo e($user->name); ?> <?php echo e($user->lastname); ?>,<br><br>

task has been assigned to you in  <?php echo e($project->projectname); ?>. <a href="<?php echo e(route('tasks.show', $project->id)); ?>">click here</a> to view details<br><br>


Thanks,<br> 
