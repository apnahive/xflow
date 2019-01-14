Hello <?php echo e($job->client_name); ?>,<br><br>

Your invitation for the <?php echo e($job->title); ?> has been confirmed by <?php echo e($user->name); ?> <?php echo e($user->lastname); ?>. Please open the following link <a href="<?php echo e(route('profiles.show', $user->id)); ?>">Link</a> to view candidate profile. <br><br>

Thanks,<br>
