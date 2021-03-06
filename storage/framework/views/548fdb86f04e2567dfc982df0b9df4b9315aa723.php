<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Interviews</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Back</button></a>
                <!-- <div class="rs-select2--light rs-select2--md">
                    <select class="js-select2" name="property">
                        <option selected="selected">All Properties</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    <select class="js-select2" name="time">
                        <option selected="selected">Today</option>
                        <option value="">3 Days</option>
                        <option value="">1 Week</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <button class="au-btn-filter">
                    <i class="zmdi zmdi-filter-list"></i>filters</button> -->
            </div>
            <div class="table-data__tool-right">
                <!-- 
                <a href="<?php echo e(route('jobs.create')); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Client</button></a>
                 -->                
            </div>
        </div>
        <div class="table-responsive table-responsive-data2" style="margin-bottom: 100px;">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <!-- <th>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </th> -->
                        <th>Job Title</th> 
                        <th>Experience level</th>
                        <th>Skills</th>
                        <th>Salary Range</th>
                        <th>status</th>
                        <!-- <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr class="tr-shadow">
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td><?php echo e($value->job); ?></td>
                        <td><?php echo e($value->experience); ?></td>                        
                        <td><?php echo e($value->skills); ?></td>                        
                        <td><?php echo e($value->salary_offered); ?></td>
                        <td>
                            <?php if($value->scheduled == 1): ?>                            
                            Scheduled on <br> <?php echo e($value->date); ?>

                            <?php else: ?>
                            TBD
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="<?php echo e(route('interviewed.show', $value->job_id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                
                                
                                                                



                                <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button> -->
                            </div>
                        </td>
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