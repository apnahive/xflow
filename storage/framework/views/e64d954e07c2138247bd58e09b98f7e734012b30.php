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
                         aria-selected="false"><i class="fas fa-map-signs"></i>Sublists</a>
                        <a class="nav-item nav-link" id="custom-nav-notes-tab" data-toggle="tab" href="#custom-nav-notes" role="tab" aria-controls="custom-nav-notes"
                         aria-selected="false"><i class="fas fa-map-signs"></i>Notes</a>                        
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
                                    <label for="name" class=" form-control-label"><?php echo e($item->title); ?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Due Date</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label"><?php echo e($item->duedate); ?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Assigned To</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label"><?php echo e($item->assignto); ?></label>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="row" style="margin: 25px 0;">
                        <a href="<?php echo e(route('sublists.add', $item->id)); ?>"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            Add Sublist Item</button></a>
                        </div>    
                        <div class="row">
                            <div class="col-md-12">                                
                                <!-- <h3 class="title-5 m-b-35">Sub-list</h3> -->
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;">
                                                    <label class="au-checkbox">
                                                        <input type="checkbox" id="checkAll" disabled="disabled">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>Sub-list</th>
                                                <!-- <th>Category</th>
                                                <th>Estimated Time</th> -->
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $sublists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sublistkey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr <?php if($value->status == 1): ?> class="tr-shadow ticked" <?php else: ?> class="tr-shadow" <?php endif; ?>>
                                                <td style="width: 10%;">
                                                    <label class="au-checkbox">
                                                        <input type="checkbox" class="item-check" id="item-<?php echo e($value->id); ?>" <?php if($value->status == 1): ?> checked="checked" disabled="disabled" <?php endif; ?>>
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
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
                    <div class="tab-pane fade" id="custom-nav-notes" role="tabpanel" aria-labelledby="custom-nav-notes-tab">
                        <div class="row" style="margin: 25px 0;">
                        <a href="<?php echo e(route('checklist_item_notes.add', $item->id)); ?>"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            Add Notes</button></a>
                        </div>    
                        <div class="row">
                            <div class="col-md-12">                                
                                <!-- <h3 class="title-5 m-b-35">Sub-list</h3> -->
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>                                                
                                                <th>Notes</th>
                                                <!-- <th>Category</th>
                                                <th>Estimated Time</th> -->
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notekey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="tr-shadow">
                                                <!-- <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td> -->
                                                <td><?php echo e($value->note); ?></td>
                                                <!-- <td></td> -->
                                                <!-- <td></td>                        
                                                <td></td> -->
                                                <td>
                                                    <div class="table-data-feature">
                                                        <!-- <a href="#"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button></a> -->
                                                        
                                                        <a href="<?php echo e(route('checklist_item_notes.edit', $value->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
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

<style type="text/css">
    .checked {
        color: orange;
    }
    .ticked {
        text-decoration:line-through;
    }
</style>
<script type="text/javascript">
    $('.item-check').on('change', function(e){

        var item_id = e.target.id;
        $(this).attr("disabled", true);

        var ru = $(this).closest('.tr-shadow');
        $(ru).addClass('ticked');
        
        $.get('<?php echo e(url('information')); ?>/sublist_item/ajax-state?item_id=' + item_id, function(data) {
            console.log(data);
        });
        
        console.log(item_id);
        console.log(ru);
    });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>