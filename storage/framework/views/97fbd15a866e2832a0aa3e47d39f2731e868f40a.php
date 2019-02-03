<?php $__env->startSection('content'); ?>

<div class="row" style="margin-bottom: 100px;">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Users</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Back</button></a>
                
            </div>
            <div class="table-data__tool-right">                
                
            </div>
        </div>
        <div class="table-responsive table-responsive-data2" style="margin-bottom: 100px;">
            <table class="table table-data2">
                <thead>
                    <tr>                        
                        <th><a href="<?php echo e(route('users.sort', ['name', 'asc'])); ?>"><i class="fas fa-sort-alpha-down"></i></a> Name <a href="<?php echo e(route('users.sort', ['name', 'desc'])); ?>"><i class="fas fa-sort-alpha-up"></i></a></th>
                        <th><a href="<?php echo e(route('users.sort', ['email', 'asc'])); ?>"><i class="fas fa-sort-alpha-down"></i></a> Email <a href="<?php echo e(route('users.sort', ['email', 'desc'])); ?>"><i class="fas fa-sort-alpha-up"></i></a></th>
                        <th><a href="<?php echo e(route('users.sort', ['user_type', 'asc'])); ?>"><i class="fas fa-sort-alpha-down"></i></a> User Type <a href="<?php echo e(route('users.sort', ['user_type', 'desc'])); ?>"><i class="fas fa-sort-alpha-up"></i></a></th>
                        <th>Status</th>
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userkey => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                    <tr class="tr-shadow">
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td><?php echo e($user->name); ?> <?php echo e($user->lastname); ?></td>
                        <td><?php echo e($user->email); ?></td>                        
                        <td><?php echo e($user->user_type); ?></td>                        
                        <td>
                            <?php if($user->verified): ?>
                                Approved
                            <?php else: ?>
                                <?php if($user->verification_token): ?>
                                    Pending
                                <?php else: ?> 
                                    Rejected
                                <?php endif; ?>    
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="<?php echo e(route('users.show', $user->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                <!-- <?php if($user->verified): ?>
                                <a href="<?php echo e(route('users.show', $user->id)); ?>" class="btn btn-info pull-left" style="margin-right: 3px;color:white;">View</a>
                                <?php else: ?>
                                    <?php if($user->verification_token): ?>
                                        <a href="<?php echo e(route('users.approve', $user->id)); ?>" class="btn btn-info pull-left" style="margin-right: 3px;color:white;">Approve</a>
                                        <a href="<?php echo e(route('users.reject', $user->id)); ?>" class="btn btn-danger pull-left" style="margin-right: 3px;color:white;">Reject</a>
                                    <?php endif; ?>    
                                <?php endif; ?> -->
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo $users->render(); ?>

        </div>
        <!-- END DATA TABLE -->
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>