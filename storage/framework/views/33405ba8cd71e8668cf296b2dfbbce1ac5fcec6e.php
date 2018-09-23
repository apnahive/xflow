<?php $__env->startSection('title', '| View Post'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">

    <h1><?php echo e($post->title); ?></h1>
    <hr>
    <p class="lead"><?php echo e($post->body); ?> </p>
    <hr>
    <?php echo Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]); ?>

    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary">Back</a>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Post')): ?>
    <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-info" role="button">Edit</a>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Post')): ?>
    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

    <?php endif; ?>
    <?php echo Form::close(); ?>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>