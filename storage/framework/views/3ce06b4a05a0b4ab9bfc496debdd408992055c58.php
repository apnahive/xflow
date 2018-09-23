Hello Admin,<br><br>

<?php echo e($user->name); ?> <?php echo e($user->lastname); ?> has been registered. Please open the following link <a href="<?php echo e(route('users.index')); ?>">Link</a> approve/reject user. <br><br>

Thanks,<br>
