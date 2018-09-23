Hi <?php echo e($user->name); ?> <?php echo e($user->lastname); ?>,<br><br>

task has been assigned to you in  <?php echo e($project->name); ?>. <a href="<?php echo e(route('projects.show', $project->id)); ?>">click here</a> to view details<br><br>


Thanks,<br>
