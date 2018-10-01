
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agile AX</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('assets/vendor/bootstrap-4.1/bootstrap.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('assets/vendor/font-awesome-5/css/fontawesome-all.min.css')); ?>" rel="stylesheet" media="all">
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('assets/css/full-slider.css')); ?>" rel="stylesheet">
    <!-- Styles -->
        <style>
            .carousel-item {
                height: 461px;
                margin-top: 72px;
    }
    .bgg-dark {
    background-color: #ffffff!important;
    }
    .navbar-dark .navbar-nav .nav-link {
    color: #ff2e44;
    }
    .navbar-dark .navbar-nav .active>.nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .show>.nav-link {
    color: #242424;
    }
    .carousel-control-next:focus, .carousel-control-next:hover, .carousel-control-prev:focus, .carousel-control-prev:hover {
    color: #242424;
    text-decoration: none;
    outline: 0;
    opacity: .9;
    }
    .ml-auto, .mx-auto {
    margin-left: auto!important;
    margin-right: 100px;
    }
    .navbar-dark .navbar-nav .nav-link:hover {
    color: rgba(25, 21, 21, 0.75);
    }    
    </style>
  </head>

  <body>

    <div class="row">
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
                        <label for="form_files" class=" form-control-label" style="font-weight: 700;">Files</label><br>
                    </div>
                    <div class="col-12 col-md-9">
                        <!-- <input id="form_files" class="form_files" name="form_files[]" type="file" multiple>
                        <br> -->
                        <?php if(count($form_files) > 0): ?>
                        <?php $__currentLoopData = $form_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form_filekey => $form_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('project_forms.show', $form_file->file)); ?>" target="_blank"><?php echo e($form_file->file_name); ?></a>
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
                        <?php $__currentLoopData = $user_forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_formkey => $user_form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($user_form->section_id == 0): ?>
                                <?php echo $user_form->description; ?>

                            <?php else: ?>                            
                                <span style="font-size: 18px;font-style:  italic;">Initials</span>
                                <input type="text" name="section<?php echo e($user_form->section_id); ?>" value="<?php echo e(old('initial', $user_form['initials'])); ?>" placeholder="Please put your initials here .." style="border: 1px black solid;padding: 5px;width: 30%;">
                                <?php echo $user_form->description; ?>

                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="hidden" name="sign" value="false">
                        <input type="checkbox" id="sign" value="true" name="sign" checked="true">
                        <label for="sign"> I have reviewed the content and accepted the terms. Click submit to sign the form.</label>
                    </div>
                </div>
                <div class="row form-group">
                     <div class="col col-md-3" style="font-weight: 700;">
                    
                    </div>
                    <div class="col-12 col-md-9">
                        <img src="<?php echo e($base64); ?>" style="height:100px;"></img>
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

    

    

    
    
    
    <script src="<?php echo e(asset('assets/vendor/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/bootstrap-4.1/bootstrap.bundle.min.js')); ?>"></script>
    

  </body>

</html>
