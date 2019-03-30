<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Jobs</h3>
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
                        <th><a href="<?php echo e(route('jobs.sort', ['title', 'asc'])); ?>"><i class="fas fa-sort-alpha-down"></i></a> Title <a href="<?php echo e(route('jobs.sort', ['title', 'desc'])); ?>"><i class="fas fa-sort-alpha-up"></i></a></th> 
                        <th>Expert level</th>
                        <th>Skills</th>
                        <th>Status</th>
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobkey => $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr class="tr-shadow">
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td><?php echo e($job->title); ?></td>
                        <td><?php echo e($job->experience); ?></td>                        
                        <td><?php echo e($job->skills); ?></td>                        
                        <td>
                            <?php if($job->status == 0): ?>
                                Pending Award
                            <?php else: ?>
                                Awarded
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="table-data-feature">

                                <?php if($job->status == 1): ?>
                                <span></span>
                                <?php else: ?>
                                <button class="item" data-toggle="modal" data-target="#status<?php echo e($job->id); ?>" data-backdrop="false">
                                    <i class="fas fa-location-arrow" data-toggle="tooltip" data-placement="top" title="Change Status"></i>
                                </button>
                                <?php endif; ?>
                                
                                <div class="modal fade" id="status<?php echo e($job->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($job->id); ?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <form action="<?php echo e(route('jobs.award')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>">

                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Change Job Status?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="hire" class=" form-control-label">Hire Candidate</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="hire" id="hire" class="custom-select form-control">
                                                    <option value="0">Please select</option>
                                                    <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> <?php echo e($user->lastname); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll Change later</button>
                                        <button type="submit" class="btn btn-primary" >Yes! change it</button>
                                      </div>
                                    </div>
                                    </form>
                                  </div>
                                </div>





                                <a href="<?php echo e(route('jobs.show', $job->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                
                                <a href="<?php echo e(route('jobs.edit', $job->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                
                                <!-- <button class="item" data-toggle="modal" data-target="#confirm<?php echo e($job->id); ?>" data-backdrop="false">
                                    <i class="zmdi zmdi-delete"></i>
                                </button> -->

                                

                                <form action="<?php echo e(route('jobs.destroy', $job->id)); ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                
                                <div class="modal fade" id="confirm<?php echo e($job->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($job->id); ?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Job</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        You are going to delete Job. All the associated records will be deleted. You won't be able to revert these changes!
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Job</button>
                                        <button type="submit" class="btn btn-primary" >Yes! Delete it</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>
                                



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