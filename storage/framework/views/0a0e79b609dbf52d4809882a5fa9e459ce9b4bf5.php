Hello <?php echo e($user->name); ?>,<br><br>

Please open the following link to sign the document <a href="<?php echo e(route('form_sign.show', $form)); ?>">Link</a><br><br>

Thanks,<br>
