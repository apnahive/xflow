Hello <?php echo e($user->name); ?> <?php echo e($user->lastname); ?>,<br><br>

You have been invited for the <?php echo e($job->title); ?>. Please open the following link <a href="<?php echo e(route('interviewed.show', $job->id)); ?>">Link</a> to learn more. <br><br>

Thanks,<br>
