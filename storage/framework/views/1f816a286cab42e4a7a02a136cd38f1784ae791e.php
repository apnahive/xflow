<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    


<!-- <div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Work Order Details</strong>
                
                <a href="" style="float: right;"><button class="au-btn au-btn-icon au-btn--green au-btn--small"> 
                    Add Hours
                </button></a>
            </div>
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="title" class=" form-control-label"><b>Title</b>: <?php echo e($work_order->title); ?> </label>
                        </div>
                        <div class="col col-md-6">
                            <label for="project" class=" form-control-label"><b>Description</b>: <?php echo e($work_order->description); ?> </label>
                        </div>
                    </div>                    
            </div>
        </div>        
    </div>
</div>

 -->

<!-- One page view -->
                 <form action="<?php echo route('work_order_assign.search'); ?>" method="POST" role="search" class="search-des">
                    <?php echo e(csrf_field()); ?>

                    <div class="search-task" style="background: #dee2e6;padding: 10px 2px 10px 2px;">
                         <input type="hidden" name="work_order_id" value="<?php echo e($work_order->id); ?>">
                                    
                        <div class="col-md-4">
                             <label for="from_date" class=" form-control-label"><b>From Date</b></label>
                            <input id="from_date" type="date" class="col-md-12" name="from_date" value="<?php echo e(old('from_date')); ?>" placeholder="From Date" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;">
                            
                        </div>
                        <div class="col-md-4">
                           <label for="to_date" class=" form-control-label"><b>To Date</b></label>
                            <input id="to_date" type="date" class="col-md-12" name="to_date" value="<?php echo e(old('to_date')); ?>" placeholder="To Date" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;">
                            
                           
                        </div>
                        <div class="col-md-4">
                            <label for="to_date" class=" form-control-label"><b>Search </b></label>
                                <button type="submit" class="btn btn-md btn-info" style="width: 100%;color: white;background-color: #4272d7;border-radius: 1px;font-size: 16px;"><i class="zmdi zmdi-search"></i> Search</button>
                                            
                        </div>                        
                        
                    </div>
                    </form>

    <div class="card" style="margin-bottom: 100px;">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->
        <div class="card-body">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" id="custom-nav-details-tab" data-toggle="tab" href="#custom-nav-details" role="tab" aria-controls="custom-nav-details"
                         aria-selected="true"><i class="fas fa-info-circle"></i> Details</a>
                        <a class="nav-item nav-link active" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-tasks"></i>Hour Details</a>                        
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade" id="custom-nav-details" role="tabpanel" aria-labelledby="custom-nav-details-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Work Order Title</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label"><?php echo e($work_order->title); ?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label"><b>Description</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="description" class=" form-control-label"><?php echo e($work_order->description); ?></label>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="tab-pane fade show active" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="row">
                            <div class="col-md-12">                                
                                <!-- <h3 class="title-5 m-b-35">Hours Detail</h3> -->
                                <!-- <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="<?php echo e(route('task_for_templates.create')); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Add New Task</button></a>
                                        
                                    </div>
                                </div> -->
                                <div class="table-responsive table-responsive-data2" style="margin-bottom: 100px;">
                                    <table class="table table-data2">
                                        
                                    </table>    
                                    <table class="table table-data2">
                                        <thead>
                           
                                            <tr>                                                
                                                <th>Date</th>
                                                <th>Hours</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $work_order_hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="tr-shadow">                                                
                                                <td><?php echo e($value->date); ?></td>
                                                <td><?php echo e($value->hours); ?></td>                        
                                                <td><?php echo e($value->statusis); ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <?php if($value->status === 0): ?>
                                                        <?php if(auth()->check() && auth()->user()->hasRole('workuser')): ?>
                                                        <a href="<?php echo e(route('work_order_assign.edit', $value->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button></a>

                                                        <button class="item" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>" data-backdrop="false">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <form action="<?php echo e(route('task_for_templates.destroy', $value->id)); ?>" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        
                                                        <div class="modal fade" id="confirm<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content" style="text-align: left;">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Entry</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                You are going to delete hours entry. Are you sure?

                                                                You won't be able to revert these changes!
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Task</button>
                                                                <button type="submit" class="btn btn-primary" >Yes! Delete it</button>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </form>
                                                      <?php if($value->commentis === 1): ?>
                                                      <button class="item" data-toggle="modal" data-target="#comment<?php echo e($value->id); ?>" data-backdrop="false">
                                                            <i class="zmdi zmdi-comment-alert"></i>
                                                      </button>
                                                        <div class="modal fade" id="comment<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content" style="text-align: left;">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Comment by Admin</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body"><?php echo e($value->comment); ?></div>
                                                              <div class="modal-footer">
                                                                
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                   <?php endif; ?>

                                                    <?php endif; ?>
                                                    <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
                                                    
                                                        <a href="<?php echo e(route('work_order_hour.approve', $value->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Approve">
                                                            <i class="zmdi zmdi-check-circle"></i>
                                                        </button></a>

                                                        <a href="<?php echo e(route('work_order_hour.reject', $value->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Reject">
                                                            <i class="zmdi zmdi-block"></i>
                                                        </button></a>
                                                        <!-- -popup -->
                                                        <button class="item" data-toggle="modal" data-target="#comment<?php echo e($value->id); ?>" data-backdrop="false">
                                                            <i class="zmdi zmdi-comment-alert"></i>
                                                        </button>
                                                        <div class="modal fade" id="comment<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form action="<?php echo e(route('work_order_hour.comment')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                                    <?php echo e(csrf_field()); ?>

                                                                        <input type="hidden" name="hour_id" value="<?php echo e($value->id); ?>">
                                                                        <div class="modal-content" style="text-align: left;">
                                                                          <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                          </div>
                                                                          <div class="modal-body">
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="assignee" class=" form-control-label">Comment</label>
                                                                                </div>
                                                                                <?php if($value->commentis === 1): ?>
                                                                                <div class="col-12 col-md-9">
                                                                                    <label for="assignee" class=" form-control-label"><?php echo e($value->comment); ?></label>
                                                                                </div>
                                                                                <?php else: ?>
                                                                                <div class="col-12 col-md-9">
                                                                                    <textarea name="description" id="description" rows="3" placeholder="Your entry is still pending because..." class="form-control" required></textarea>
                                                                                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                                                                                        <?php if($errors->has('description')): ?>
                                                                                                            <span class="help-block error">
                                                                                                                <strong><?php echo e($errors->first('description')); ?></strong>
                                                                                                            </span>
                                                                                                        <?php endif; ?> 
                                                                                </div>

                                                                                <?php endif; ?>
                                                                            </div>
                                                                          </div>
                                                                          <?php if($value->commentis === 0): ?>
                                                                          <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary btn-sm">
                                                                                <i class="fa fa-dot-circle-o"></i> Submit
                                                                            </button>
                                                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-ban"></i>Cancel</button>
                                                                          </div>
                                                                          <?php endif; ?>
                                                                        </div>
                                                                        </form>
                                                                      </div>
                                                                    </div>              
                                                                <?php endif; ?>
                </div>
                                                    <?php endif; ?>
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