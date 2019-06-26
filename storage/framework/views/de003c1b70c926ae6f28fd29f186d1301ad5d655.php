<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="col-lg-12">
    <div class="card" style="margin-bottom: 100px;">
        <div class="card-header">
            <h4>Download report for <?php echo e($work_order->title); ?></h4>
        </div>
        <div class="card-body">
            <form action="<?php echo route('work_orders.report_download'); ?>" method="POST" role="search" class="search-des">
                <?php echo e(csrf_field()); ?>

                <div class="search-task" style="background: #dee2e6;padding: 10px 2px 10px 2px;">
                     <input type="hidden" name="work_order_id" value="<?php echo e($work_order->id); ?>">
                                
                    <div class="col-md-4">
                         <label for="from_date" class=" form-control-label"><b>From Date</b></label>
                        <input id="from_date" type="date" class="col-md-12" name="from_date" value="<?php echo e(old('from_date')); ?>" placeholder="From Date" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;">
                        <?php if($errors->has('from_date')): ?>
                            <span class="help-block error">
                                <strong><?php echo e($errors->first('from_date')); ?></strong>
                            </span>
                        <?php endif; ?> 
                        
                    </div>
                    <div class="col-md-4">
                       <label for="to_date" class=" form-control-label"><b>To Date</b></label>
                        <input id="to_date" type="date" class="col-md-12" name="to_date" value="<?php echo e(old('to_date')); ?>" placeholder="To Date" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;">
                        <?php if($errors->has('to_date')): ?>
                            <span class="help-block error">
                                <strong><?php echo e($errors->first('to_date')); ?></strong>
                            </span>
                        <?php endif; ?> 
                           
                        </div>
                        <div class="col-md-4">
                            <label for="to_date" class=" form-control-label"><b> </b></label>
                                <button type="submit" class="btn btn-md btn-info" style="width: 100%;color: white;background-color: #4272d7;border-radius: 1px;font-size: 16px;">Download</button>
                                            
                        </div>                        
                        
                    </div>
                </form>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>