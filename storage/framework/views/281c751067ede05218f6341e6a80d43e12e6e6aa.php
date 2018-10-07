<?php $__env->startSection('content'); ?>

<!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">


<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js" defer></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js" defer></script>    
 
<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
<script type="text/javascript">
    $(document).ready(function() {
            //initialize summernote
            $('.summernote').summernote(); 
 
            //assign the variable passed from controller to a JavaScript variable.
            
 
            //set the content to summernote using `code` attribute.
           /* $('.summernote').summernote('code', content);*/
        });
</script>
<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create</strong> Attestation Form
            </div>            
            <form action="<?php echo e(route('attestations.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Form Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control">
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                            <?php if($errors->has('name')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="summernote" class=" form-control-label">Attestation</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="summernote" id="summernote" class="summernote"></textarea>
                            <!-- <textarea name="summernoteInput" class="summernote"></textarea> -->
                        
                            <?php if($errors->has('summernote')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('summernote')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
            </form>
        </div>        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>