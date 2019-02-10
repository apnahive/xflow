<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Add/Update</strong> Members to Team
            </div>            
            <div >
            <div class="card-body card-block">
                        <!-- <style>
                            
                                </style> -->

                            <!-- <h3 class="title-5 m-b-35">Add users to the Team</h3> -->
                                <link href="<?php echo e(asset('css/select.css')); ?>" rel="stylesheet">

                                <form action="<?php echo e(route('teammembers.update', $team['id'])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <div class="subject-info-box-1">
                                      <select multiple="true" id="lstBox1" name="no_user[]" class="form-control">
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userkey => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> <?php echo e($user->lastname); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="subject-info-arrows text-center">
                                  <input type="button" id="btnAllRight" value=">>" class="btn btn-default"><br>
                                  <input type="button" id="btnRight" value=">" class="btn btn-default"><br>
                                  <input type="button" id="btnLeft" value="<" class="btn btn-default"><br>
                                  <input type="button" id="btnAllLeft" value="<<" class="btn btn-default">
                              </div>

                              <div class="subject-info-box-2">
                                  <select multiple="true" id="lstBox2" name="users[]" class="form-control" >
                                    <?php $__currentLoopData = $selected_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $selected_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($selected_user->id); ?>"><?php echo e($selected_user->name); ?> <?php echo e($selected_user->lastname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 29px;">
                                <i class="fa fa-dot-circle-o"></i> Update Members to Team
                            </button>                
                        </form>

                            <div class="clearfix"></div>    

                              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
                              <script src="<?php echo e(asset('js/select.js')); ?>" defer></script>
                              

                                <!-- <script>       

                            
                                  //# sourceURL=pen.js
                                </script> -->

                        
                        
                    </div>
                  </div>
           
        </div>        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>