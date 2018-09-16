<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Edit Form</h3>
        
        <div class="table-responsive table-responsive-data2">
            <form class="form-horizontal  form-material" role="form" method="POST" action="<?php echo e(route('project_forms.update', $form['id'])); ?>">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">            
            <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
            <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
            <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js" defer></script>  
            <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js" defer></script>    
             
            <script>
                    $(document).ready(function() {
                        $('.summernote').summernote();
                    });
            </script>
            <?php if($form->id == 1000): ?>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="project" class=" form-control-label">Project</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="project" id="project" class="custom-select form-control chosen">
                        <option value="0">Please select</option>
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <option value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div> 
            <script type="text/javascript">
                  $(".chosen").chosen();
            </script>            
            <?php endif; ?>
            <textarea name="summernote" id="summernote" class="summernote"><?php echo e($form->description); ?></textarea>

            <div class="form-group">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-info">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>