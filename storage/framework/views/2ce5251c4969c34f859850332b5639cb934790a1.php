<?php $__env->startSection('content'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<style type="text/css">
    .bootstrap-tagsinput {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        display: block;
        padding: 4px 6px;
        color: #555;
        vertical-align: middle;
        border-radius: 4px;
        max-width: 100%;
        line-height: 22px;
        cursor: text;
    }
    .bootstrap-tagsinput input {
        border: none;
        box-shadow: none;
        outline: none;
        background-color: transparent;
        padding: 0 6px;
        margin: 0;
        width: auto;
        max-width: inherit;
    }
    .label-info {
        background-color: #5bc0de;
        color: white;
        padding: 1px 13px;
    }
</style>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Post Job</strong>
            </div>            
            <form action="<?php echo e(route('jobs.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Job Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Job Title" class="form-control" required>
                            <?php if($errors->has('title')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                </span>
                            <?php endif; ?>                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Responsibilities</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="3" placeholder="Responsibilities..." class="form-control" required></textarea>
                            <?php if($errors->has('description')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                            <?php endif; ?>                            
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="requirements" class=" form-control-label">Requirements</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="requirements" id="requirements" rows="3" placeholder="Requirements..." class="form-control" required></textarea>
                            <?php if($errors->has('requirements')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('requirements')); ?></strong>
                                </span>
                            <?php endif; ?>                            
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="benefits" class=" form-control-label">Benefits</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="benefits" id="benefits" rows="3" placeholder="Benefits..." class="form-control" required></textarea>
                            <?php if($errors->has('benefits')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('benefits')); ?></strong>
                                </span>
                            <?php endif; ?>                            
                        </div>
                    </div>                    
                    <!-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="experience_level" class=" form-control-label">Experience Level</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="experience_level" id="experience_level" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1">Entry Level</option>
                                <option value="2">Inermediate Level</option>
                                <option value="3">Expert Level</option>
                                
                            </select>                            
                            <?php if($errors->has('experience_level')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('experience_level')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                         
                    </div> -->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="experience_years" class=" form-control-label">Experience in Years</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="experience_years" id="experience_years" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1">0-2 Years</option>
                                <option value="2">2-5 Years</option>
                                <option value="5">5+ Years</option>
                                <!-- <option value="4">3 Years</option>
                                <option value="5">4 Years</option>
                                <option value="6">5 Years</option>
                                <option value="7">6 Years</option>
                                <option value="8">7 Years</option>
                                <option value="9">8 Years</option>
                                <option value="10">9 Years</option>
                                <option value="11">10+ Years</option> -->

                            </select>                            
                            <?php if($errors->has('experience_years')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('experience_years')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state" id="state" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($state->state); ?>"><?php echo e($state->state); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('state')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('state')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city" id="city" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($city->city); ?>"><?php echo e($city->city); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('city')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('city')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <script type="text/javascript">
                          $(".chosen").chosen();
                    </script>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="qualification" class=" form-control-label">Education</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="qualification" id="qualification" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1">Graduate</option>
                                <option value="2">Post Graduate</option>
                                <option value="3">PHD</option>
                                <option value="4">No College Degree</option>
                                <option value="5">Diploma</option>
                                
                            </select>                            
                            <?php if($errors->has('experience_level')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('experience_level')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="certificate" class=" form-control-label">Field</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="certificate" id="certificate" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1">Engineering</option>
                                <option value="2">Architecture</option>
                                <option value="3">Science</option>
                                <option value="4">Computer</option>
                                <option value="5">Business</option>
                                <option value="6">Design</option>
                                <option value="7">Construction</option>
                                <option value="8">Political</option>
                                <option value="9">Math</option>
                                <option value="10">Technical</option>
                                
                            </select>                            
                            <?php if($errors->has('certificate')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('certificate')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="due_date" class=" form-control-label">Due Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="due_date" type="date" class="form-control" name="due_date" value="<?php echo e(old('due_date')); ?>" required>
                            <?php if($errors->has('due_date')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('due_date')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <!-- <style type="text/css">
                        #tags{
                          float:left;
                          border:1px solid #ccc;
                          padding:4px;
                          font-family:Arial;
                        }
                        #tags span.tag{
                          cursor:pointer;
                          display:block;
                          float:left;
                          color:#555;
                          background:#add;
                          padding:5px 10px;
                          padding-right:30px;
                          margin:4px;
                        }
                        #tags span.tag:hover{
                          opacity:0.7;
                        }
                        #tags span.tag:after{
                         position:absolute;
                         content:"×";
                         border:1px solid;
                         border-radius:10px;
                         padding:0 4px;
                         margin:3px 0 10px 7px;
                         font-size:10px;
                        }
                        #tags input{
                          background:#eee;
                          border:0;
                          margin:4px;
                          padding:7px;
                          width:auto;
                        }
                    </style> -->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="skills" class=" form-control-label">Skills</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div id="tags">
                            <input type="text" id="skills" name="skills" placeholder="Skills" class="form-control" data-role="tagsinput" required>
                            </div>
                            <?php if($errors->has('skills')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('skills')); ?></strong>
                                </span>
                            <?php endif; ?>                            
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="salary_offered" class=" form-control-label">Salary Range</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="salary_offered" name="salary_offered" placeholder="Salary Range" class="form-control" required>
                            <?php if($errors->has('salary_offered')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('salary_offered')); ?></strong>
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

<!-- <script type="text/javascript">
    $(function(){
      $('#tags input').on('focusout', function(){    
        var txt= this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g,''); // allowed characters list
        if(txt) $(this).before('<span class="tag">'+ txt +'</span>');
        this.value="";
        this.focus();
      }).on('keyup',function( e ){
        // comma|enter (add more keyCodes delimited with | pipe)
        if(/(188|13)/.test(e.which)) $(this).focusout();
      });

      $('#tags').on('click','.tag',function(){
         if( confirm("Really delete this tag?") ) $(this).remove(); 
      });

    });
</script> -->
<script type="text/javascript">
    
    $('#state').on('change', function(e){
        var state_id = e.target.value;

        $.get('<?php echo e(url('information')); ?>/create/ajax-state?state_id=' + state_id, function(data) {
            //console.log(data);
            $('#city').empty();
            $.each(data, function(index,subCatObj){
                $('#city').append('<option value='+subCatObj.city+'>'+subCatObj.city+'</option>');
            });
             //$(".chosen").chosen(); 
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>