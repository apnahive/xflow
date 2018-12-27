<?php $__env->startSection('content'); ?>
<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Candidate Profile</strong>
            </div>            
            <form action="<?php echo e(route('profiles.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Profile Title</label>
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
                            <label for="employer" class=" form-control-label">Current Employer</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="employer" name="employer" placeholder="Current Employer" class="form-control" required>
                            <?php if($errors->has('employer')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('employer')); ?></strong>
                                </span>
                            <?php endif; ?>                            
                        </div>
                    </div>
                    <!-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="3" placeholder="Description..." class="form-control" required></textarea>
                            <?php if($errors->has('description')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                            <?php endif; ?>                            
                        </div>
                    </div>                     -->
                    <div class="row form-group">
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
                         
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="experience_years" class=" form-control-label">Experience in Years</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="experience_years" id="experience_years" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1">0 Years</option>
                                <option value="2">1 Years</option>
                                <option value="3">2 Years</option>
                                <option value="4">3 Years</option>
                                <option value="5">4 Years</option>
                                <option value="6">5 Years</option>
                                <option value="7">6 Years</option>
                                <option value="8">7 Years</option>
                                <option value="9">8 Years</option>
                                <option value="10">9 Years</option>
                                <option value="11">10+ Years</option>

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
                            <label for="active" class=" form-control-label">Are you Active?</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="active" id="active" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>   
                                
                            </select>                            
                            <?php if($errors->has('active')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('active')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state" class=" form-control-label">Current State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state" id="state" class="form-control chosen">
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
                            <label for="city" class=" form-control-label">Current City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city" id="city" class="form-control chosen">
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

                    
                    <h5>City ready to re-location:</h5>
                    <hr>
                    <div style="display: flex;">
                    <div class="col-md-6">
                    <h6><b>Option 1</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state1" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state1" id="state1" class="form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('state1')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('state1')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city1" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city1" id="city1" class="form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($city->city); ?>"><?php echo e($city->city); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('city1')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('city1')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <h6><b>Option 2</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state2" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state2" id="state2" class="form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('state2')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('state2')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city2" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city2" id="city2" class="form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($city->city); ?>"><?php echo e($city->city); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('city2')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('city2')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    </div>                    
                    </div>

                    <div style="display: flex;">
                    <div class="col-md-6">
                    <h6><b>Option 3</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state3" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state3" id="state3" class="form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('state3')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('state3')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city3" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city3" id="city3" class="form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($city->city); ?>"><?php echo e($city->city); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('city3')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('city3')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <h6><b>Option 4</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state4" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state4" id="state4" class="form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('state4')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('state4')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city4" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city4" id="city4" class="form-control chosen">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($city->city); ?>"><?php echo e($city->city); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('city4')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('city4')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    </div>
                    </div>
                    <hr>




                    <script type="text/javascript">
                          $(".chosen").chosen();
                    </script>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="qualification" class=" form-control-label">Qualification And Education</label>
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
                            <label for="certificate" class=" form-control-label">Certificate</label>
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

                    <!-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="start_date" class=" form-control-label">Start Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="start_date" type="date" class="form-control" name="start_date" value="<?php echo e(old('start_date')); ?>" required autofocus>
                            <?php if($errors->has('start_date')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('start_date')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div> -->
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
                            <input type="text" id="skills" name="skills" placeholder="Skills" class="form-control" required>
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
                            <label for="salary_expected" class=" form-control-label">Salary Expected</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="salary_expected" name="salary_expected" placeholder="Salary Expected" class="form-control" required>
                            <?php if($errors->has('salary_expected')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('salary_expected')); ?></strong>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>