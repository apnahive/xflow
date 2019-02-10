<?php $__env->startSection('content'); ?>

<!-- <a href=""><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a> -->




<div class="row" style="margin-bottom: 100px;">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35"><?php echo e($team->name); ?> Team</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Back</button></a>
            </div>
            <div class="table-data__tool-right">                
                <a href="<?php echo e(route('teammembers.add', $team->id)); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Update Members</button></a>
            </div>
        </div> 
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>                    
                    <tr>
                        <!-- <th>
                            <label class="au-checkbox">
                                <input type="checkbox" id="checkAll" disabled="disabled">
                                <span class="au-checkmark"></span>
                            </label>
                        </th> -->
                        <th>Members</th>
                        <!-- <th>Due Date</th> -->
                        
                        <!-- <th>Managed By</th>
                        <th>Assigned To</th> -->
                        <!-- <th>status</th>
                        <th>price</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $team_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="tr-shadow">
                        
                        <td><?php echo e($value->name); ?></td>
                        
                        
                        <!-- <td></td>                        
                        <td></td> -->
                    </tr>    
                    <tr class="spacer"></tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>