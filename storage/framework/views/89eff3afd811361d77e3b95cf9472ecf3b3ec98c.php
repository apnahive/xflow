<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
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
                        <!-- <th>Detail</th>-->
                        <!-- <th>status</th>
                        <th>price</th> -->
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
                        <!-- <td></td> -->
                        <td>
                            <div class="table-data-feature">
                                 <a href="<?php echo e(route('work_orders.assign', $work_order->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Assign users to Work Order">
                                    <i class="fa fa-user"></i>
                                </button>


                                <a href="<?php echo e(route('work_orders.show', $work_order->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                <a href="<?php echo e(route('work_orders.edit', $work_order->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                <button class="item" data-toggle="modal" data-target="#confirm<?php echo e($work_order->id); ?>" data-backdrop="false">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                

                                <form id="<?php echo e($work_order->id); ?>" action="" method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                </form>
                                <div class="modal fade" id="confirm<?php echo e($work_order->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($work_order->id); ?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Work Order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Under Development
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Work Order</button>
                                        <a onclick="event.preventDefault(); document.getElementById( <?php echo e($work_order->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>



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