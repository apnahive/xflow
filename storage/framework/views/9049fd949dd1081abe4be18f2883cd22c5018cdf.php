<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="col-lg-12" style="margin-bottom: 100px;">
    <div class="card">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->
        <div class="card-body">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="custom-nav-details-tab" data-toggle="tab" href="#custom-nav-details" role="tab" aria-controls="custom-nav-details"
                         aria-selected="true"><i class="fas fa-info-circle"></i>Details</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-map-signs"></i>Checklists</a>                        
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-details" role="tabpanel" aria-labelledby="custom-nav-details-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Title</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label"><?php echo e($checklist->title); ?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Due Date</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label"><?php echo e($checklist->duedate); ?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Assigned To</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label"><?php echo e($checklist->assignto); ?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Created By</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label"><?php echo e($checklist->createdby); ?></label>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="row" style="margin: 25px 0;">
                        <a href="<?php echo e(route('sublists.add', $checklist->id)); ?>"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            Add Sublist Item</button></a>
                        </div>    
                        <div class="row">
                            <div class="col-md-12">                                
                                <!-- <h3 class="title-5 m-b-35">Sub-list</h3> -->
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>                                                
                                                <th>Sub-list</th>
                                                <!-- <th>Category</th>
                                                <th>Estimated Time</th> -->
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $sublists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sublistkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="tr-shadow">
                                                <!-- <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td> -->
                                                <td><?php echo e($value->title); ?></td>
                                                <!-- <td></td> -->
                                                <!-- <td></td>                        
                                                <td></td> -->
                                                <td>
                                                    <div class="table-data-feature">
                                                        <!-- <a href="#"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button></a> -->
                                                        
                                                        <a href="<?php echo e(route('sublists.edit', $value->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>