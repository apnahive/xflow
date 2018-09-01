<?php $__env->startComponent('mail::message'); ?>

One last step!

<?php $__env->startComponent('mail::button', ['url' => route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) ]); ?>
Click here to verify your account
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
