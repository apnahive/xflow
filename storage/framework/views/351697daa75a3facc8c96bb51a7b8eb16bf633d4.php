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
                                    <label for="name" class=" form-control-label"><b>Name</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label"><?php echo e($checklist->title); ?></label>
                                </div>
                            </div>                            
                        </div>                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="row">
                            <div class="col-md-12">                                
                                <h3 class="title-5 m-b-35">Checklist</h3>
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>                                                
                                                <th>Checklist</th>
                                                <!-- <th>Category</th>
                                                <th>Estimated Time</th> -->
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $checklist_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="tr-shadow">                                                
                                                <td><?php echo e($value->title); ?></td>
                                                <!-- <td></td>                        
                                                <td></td> -->
                                                <td>
                                                    <div class="table-data-feature">
                                                        
                                                        <a href="<?php echo e(route('checklist_for_templates.edit', $value->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        
                                                        <!-- <button class="item" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>" data-backdrop="false">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button> -->

                                                        <form id="<?php echo e($value->id); ?>" action="" method="POST" style="display: none;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        </form>
                                                        <div class="modal fade" id="confirm<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content" style="text-align: left;">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                Under Development
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Task</button>
                                                                <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
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
                        
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>