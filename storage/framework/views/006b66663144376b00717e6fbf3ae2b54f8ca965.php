<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Clients</h3>
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
                <?php if($projects->can_create): ?>
                <a href="<?php echo e(route('projects.create')); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Client</button></a>
                <?php endif; ?>
                <!-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Export</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div> -->
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
                        <th><a href="<?php echo e(route('projects.sort', ['name', 'asc'])); ?>"><i class="fas fa-sort-alpha-down"></i></a> Name <a href="<?php echo e(route('projects.sort', ['name', 'desc'])); ?>"><i class="fas fa-sort-alpha-up"></i></a></th> 
                        <th>Consultant</th>
                        <th>CCO</th>
                        <th>Contract Date</th>
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectkey => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($project->can_view): ?>
                    <tr class="tr-shadow">
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td><?php echo e($project->name); ?></td>
                        <td><?php echo e($project->pocname); ?></td>                        
                        <td><?php echo e($project->cconame); ?></td>                        
                        <td><?php echo e($project->duedate); ?></td>
                        <td>
                            <div class="table-data-feature">
                                <a href="<?php echo e(route('projects.show', $project->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                <?php if($project->can_edit): ?>
                                <a href="<?php echo e(route('projects.edit', $project->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                <?php endif; ?>
                                <?php if($project->can_delete): ?>
                                <button class="item" data-toggle="modal" data-target="#confirm<?php echo e($project->id); ?>" data-backdrop="false">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                <!-- <button type="button" class="btn btn-priamry"  data-toggle="modal" data-target="#confirm<?php echo e($project->id); ?>">Delete</button> -->

                                <form action="<?php echo e(route('projects.destroy', $project->id)); ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                
                                <div class="modal fade" id="confirm<?php echo e($project->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($project->id); ?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Client</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        You are going to delete Client. All the associated records will be deleted. You won't be able to revert these changes!
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Client</button>
                                        <button type="submit" class="btn btn-primary" >Yes! Delete it</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>
                                <?php endif; ?>



                                <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button> -->
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
            <?php echo $projects->render(); ?>

        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

<!-- <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Projects</strong> 
            </div>                        
            <div class="card-body card-block">
                <div class="row">
                    <div class="col-md-1">#</div>
                    <div class="col-md-3">Name</div>
                    <div class="col-md-3">Details</div>
                    <div class="col-md-5">Action</div>
                </div>
                <hr>
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectkey => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-md-1"><?php echo e($project->id); ?></div>
                    <div class="col-md-3"><?php echo e($project->name); ?></div>
                    <div class="col-md-3">POC: <?php echo e($project->pocname); ?><br>CCO: <?php echo e($project->cconame); ?><br>Due Date: <?php echo e($project->duedate); ?></div>
                    <div class="col-md-5" style="display:flex;">
                        <div class="col-md-4"><a href="<?php echo e(route('projects.show', $project->id)); ?>"><button type="button" class="btn btn-primary btn-sm">View</button></a></div>
                        <div class="col-md-4"><a href="<?php echo e(route('projects.show', $project->id)); ?>"><button type="button" class="btn btn-success btn-sm">Edit</button></a></div>
                        <div class="col-md-4"><a href="<?php echo e(route('projects.show', $project->id)); ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></div>
                    </div>
                </div>
                <hr>   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                                            
            </div>            
        </div>        
    </div>
</div> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>