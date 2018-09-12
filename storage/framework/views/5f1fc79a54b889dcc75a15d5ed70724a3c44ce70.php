<?php $__env->startSection('title', '| Add User'); ?>

<?php $__env->startSection('content'); ?>

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Add User</h1>
    <hr>

    <?php echo e(Form::open(array('url' => 'users'))); ?>


    <div class="form-group">
        <?php echo e(Form::label('name', 'Name')); ?>

        <?php echo e(Form::text('name', '', array('class' => 'form-control'))); ?>

    </div>

    <div class="form-group">
        <?php echo e(Form::label('email', 'Email')); ?>

        <?php echo e(Form::email('email', '', array('class' => 'form-control'))); ?>

    </div>

    <div class='form-group'>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e(Form::checkbox('roles[]',  $role->id )); ?>

            <?php echo e(Form::label($role->name, ucfirst($role->name))); ?><br>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="form-group">
        <?php echo e(Form::label('password', 'Password')); ?><br>
        <?php echo e(Form::password('password', array('class' => 'form-control'))); ?>


    </div>

    <div class="form-group">
        <?php echo e(Form::label('password', 'Confirm Password')); ?><br>
        <?php echo e(Form::password('password_confirmation', array('class' => 'form-control'))); ?>


    </div>

    <?php echo e(Form::submit('Add', array('class' => 'btn btn-primary'))); ?>


    <?php echo e(Form::close()); ?>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>