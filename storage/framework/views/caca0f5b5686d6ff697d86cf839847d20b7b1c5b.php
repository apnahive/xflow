<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">

        <?php if(auth()->check() && auth()->user()->hasRole('workuser')): ?>
        
            <div class="col-md-12">
                                <form action="<?php echo e(route('work_order_hour.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <?php echo e(csrf_field()); ?>

                                <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Hours for Work Order</h5>
                                </div>
                                <div class="modal-body">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="work_order1" class=" form-control-label">Select Work Order</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="work_order" id="work_order" class="custom-select form-control chosen">
                                                    <option value="0">Please select</option>
                                                    <?php $__currentLoopData = $work_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_orderkey => $work_order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($work_order->work_order_id); ?>"> <?php echo e($work_order->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('work_order')): ?>
                                                <span class="help-block error">
                                                    <strong><?php echo e($errors->first('work_order')); ?></strong>
                                                </span>
                                                <?php endif; ?> 
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="assignee" class=" form-control-label">Select Date</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="date" type="date" placeholder="yyyy-mm-dd" class="form-control" name="date" value="<?php echo e(old('duedate')); ?>" required autofocus>
                                                <?php if($errors->has('date')): ?>
                                                    <span class="help-block error">
                                                        <strong><?php echo e($errors->first('date')); ?></strong>
                                                    </span>
                                                <?php endif; ?> 
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                            <label for="hours" class=" form-control-label">Hours</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="hours" type="text" class="form-control" name="hours" value="<?php echo e(old('hours')); ?>" required autofocus>
                                                <?php if($errors->has('hours')): ?>
                                                <span class="help-block error">
                                                    <strong><?php echo e($errors->first('hours')); ?></strong>
                                                </span>
                                                
                                                <?php endif; ?> 
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                      </div>
                                    </div>
                                    </form>
            </div>
        </div>
        <?php endif; ?>
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Manage Work Order</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">                
            </div>
            <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
            <div class="table-data__tool-right">
                <a href="<?php echo e(route('work_orders.create')); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Work Order</button></a>
                <!-- <a href="<?php echo e(route('checklist_for_templates.create')); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Add Checklist to Template</button></a> -->
                <!-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Export</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div> -->
            </div>
            <?php endif; ?>
        </div>
                                
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        
                        <th><a href="<?php echo e(route('work_orders.sort', ['title', 'asc'])); ?>"><i class="fas fa-sort-alpha-down"></i></a> Work Order <a href="<?php echo e(route('work_orders.sort', ['title', 'desc'])); ?>"><i class="fas fa-sort-alpha-up"></i></a></th>
                         <!-- <th>Last updated at</th> -->
                        <th>Total Hours Added</th>
                        <!-- <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $work_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_orderkey => $work_order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="tr-shadow">
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td><?php echo e($work_order->title); ?></td>
                        <!-- <td>24-05-2019</td> -->
                        <td><?php echo e($work_order->hours); ?></td>
                        <!-- <td></td> -->
                        <td>
                            <div class="table-data-feature">
                              <!--   <button class="item" data-toggle="modal" data-target="#addhour<?php echo e($work_order->work_order_id); ?>" data-backdrop="false">
                                    <i class="zmdi zmdi-time"></i>
                                </button> -->
                                <!-- <a href="<?php echo e(route('work_orders.edit', $work_order->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Add Hours">
                                    <i class="zmdi zmdi-time"></i>
                                </button></a> -->

                                <a href="<?php echo e(route('work_order_assign.show', $work_order->work_order_id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Review Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                
                               <!--  <div class="modal fade" id="addhour<?php echo e($work_order->work_order_id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($work_order->work_order_id); ?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <form action="<?php echo e(route('work_order_hour.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="work_order_id" value="<?php echo e($work_order->work_order_id); ?>">
                                    <div class="modal-content" style="text-align: left;">
                                    <input type="hidden" name="user_id" value="<?php echo e($work_order->user_id); ?>">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Hours</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="assignee" class=" form-control-label">Select Date</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="date" type="date" class="form-control" name="date" value="<?php echo e(old('duedate')); ?>" required autofocus>
                                                <?php if($errors->has('date')): ?>
                                                    <span class="help-block error">
                                                        <strong><?php echo e($errors->first('date')); ?></strong>
                                                    </span>
                                                <?php endif; ?> 
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                            <label for="hours" class=" form-control-label">Hours</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input id="hours" type="text" class="form-control" name="hours" value="<?php echo e(old('hours')); ?>" required autofocus>
                                                <?php if($errors->has('hours')): ?>
                                                <span class="help-block error">
                                                    <strong><?php echo e($errors->first('hours')); ?></strong>
                                                </span>
                                                
                                                <?php endif; ?> 
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-ban"></i>Cancel</button>
                                      </div>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                                --> 

      





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
                    <script type="text/javascript">
                          $(".chosen").chosen();
                    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>