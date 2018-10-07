Hello <?php echo e($user->name); ?> <?php echo e($user->lastname); ?>,<br><br>

You have been assigned to <?php echo e($project->name); ?> as <?php if($project->poc == $user->id): ?> POC <?php elseif($project->cco == $user->id): ?> CCO <?php endif; ?> . To open project <a href="<?php echo e(route('projects.show', $project->id)); ?>">click here</a><br><br>

Thanks,<br>
