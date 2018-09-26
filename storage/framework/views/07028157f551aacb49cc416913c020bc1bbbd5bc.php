<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Sign</strong> Form
            </div>            
            <form action="<?php echo e(route('form_sign.update', $form['id'])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" style="width: 95%;margin: auto;padding-top: 25px;">
                <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="form_id" value="<?php echo e($form->id); ?>">
            <input type="hidden" name="user_id" value="<?php echo e($id1); ?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="form_files" class=" form-control-label" style="font-weight: 700;">Files</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <!-- <input id="form_files" class="form_files" name="form_files[]" type="file" multiple>
                        <br> -->
                        <?php if(count($form_files) > 0): ?>
                        <?php $__currentLoopData = $form_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form_filekey => $form_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('project_forms.show', $form_file->file)); ?>" target="_blank"><?php echo e($form_file->file); ?></a>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <?php if($errors->has('form_files')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('form_files')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="summernote" class=" form-control-label" style="font-weight: 700;">Document</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <?php echo $form->description; ?>

                        <?php if(count($sections) > 0): ?>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sectionkey => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span style="font-size: 18px;font-style:  italic;">Initials</span>
                            <input type="text" name="section<?php echo e($sectionkey); ?>" placeholder="Please put your initials here .." style="border: 1px black solid;padding: 5px;width: 30%;">
                            <?php echo $section->description; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="hidden" name="sign" value="false">
                        <input type="checkbox" id="sign" value="true" name="sign">
                        <label for="sign"> I have reviewed the content and accepted the terms.</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" style="font-weight: 700;">
                        Upload You sign
                    </div>
                    <div class="col-12 col-md-9">
                        <input class="sign" name="sign" type="file">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-info">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>