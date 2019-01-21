<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Checklist Template Item
            </div>            
            <form action="<?php echo e(route('checklist_for_templates.update', $checklist_for_template['id'])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="card-body card-block">
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="<?php echo e(old('name', $checklist_for_template['title'])); ?>">
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                            <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="template_id" class=" form-control-label">Template</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="template_id" id="template_id" class="custom-select form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $checklist_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checklist_template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($checklist_template->id); ?>" <?php echo e($checklist_for_template['template_id'] == $checklist_template->id ? 'selected' : ''); ?>><?php echo e($checklist_template->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('template_id')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('template_id')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Update
                </button>                
            </div>
            </form>
        </div>        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>