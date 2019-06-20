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
                <strong>Edit Candidate Profile</strong>
            </div>            
            <form action="<?php echo e(route('profiles.update', $profile['id'])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Profile Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Job Title" class="form-control" value="<?php echo e(old('title', $profile['title'])); ?>" required>
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
                            <input type="text" id="employer" name="employer" placeholder="Current Employer" class="form-control" value="<?php echo e(old('employer', $profile['employer'])); ?>"  required>
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
                    <!-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="experience_level" class=" form-control-label">Experience Level</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="experience_level" id="experience_level" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1" <?php echo e($profile['experience_level'] == 1 ? 'selected' : ''); ?>>Entry Level</option>
                                <option value="2" <?php echo e($profile['experience_level'] == 2 ? 'selected' : ''); ?>>Inermediate Level</option>
                                <option value="3" <?php echo e($profile['experience_level'] == 3 ? 'selected' : ''); ?>>Expert Level</option>
                                
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
                                <option value="1" <?php echo e($profile['experience_years'] == 1 ? 'selected' : ''); ?>>0-2 Years</option>
                                <option value="2" <?php echo e($profile['experience_years'] == 2 ? 'selected' : ''); ?>>2-5 Years</option>
                                <option value="5" <?php echo e($profile['experience_years'] == 3 ? 'selected' : ''); ?>>5+ Years</option>
                                <!-- <option value="4" <?php echo e($profile['experience_years'] == 4 ? 'selected' : ''); ?>>3 Years</option>
                                <option value="5" <?php echo e($profile['experience_years'] == 5 ? 'selected' : ''); ?>>4 Years</option>
                                <option value="6" <?php echo e($profile['experience_years'] == 6 ? 'selected' : ''); ?>>5 Years</option>
                                <option value="7" <?php echo e($profile['experience_years'] == 7 ? 'selected' : ''); ?>>6 Years</option>
                                <option value="8" <?php echo e($profile['experience_years'] == 8 ? 'selected' : ''); ?>>7 Years</option>
                                <option value="9" <?php echo e($profile['experience_years'] == 9 ? 'selected' : ''); ?>>8 Years</option>
                                <option value="10" <?php echo e($profile['experience_years'] == 10 ? 'selected' : ''); ?>>9 Years</option>
                                <option value="11" <?php echo e($profile['experience_years'] == 11 ? 'selected' : ''); ?>>10+ Years</option> -->

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
                                <option value="1" <?php echo e($profile['active'] == 1 ? 'selected' : ''); ?>>Yes</option>
                                <option value="2" <?php echo e($profile['active'] == 2 ? 'selected' : ''); ?>>No</option>   
                                
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
                            <select name="state" id="state" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($state->state); ?>" <?php echo e($profile['state'] == $state->state ? 'selected' : ''); ?>><?php echo e($state->state); ?>

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
                            <select name="city" id="city" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($city->city); ?>" <?php echo e($profile['city'] == $city->city ? 'selected' : ''); ?>><?php echo e($city->city); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('city')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('city')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
<!-- samar -->
                        
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="relocation" class=" form-control-label">City ready to re-location</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="checkbox1" type="radio" name="relocation" value="1" <?php echo e($profile['relocation'] === "1" ? 'checked' : ''); ?>>
                            <label for="checkbox1" style="padding-right: 50px;">
                                Yes
                            </label>
                            <input id="checkbox2" type="radio" name="relocation" value="2" <?php echo e($profile['relocation'] === "2" ? 'checked' : ''); ?>>
                            <label for="checkbox2">
                                No
                            </label>
                            <?php if($errors->has('relocation')): ?>
                                <span class="help-block error">
                                    <strong><?php echo e($errors->first('relocation')); ?></strong>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <!-- <h5>City ready to re-location:</h5> -->
                    <!-- <hr> 
                    <div style="display: flex;">
                    <div class="col-md-6">
                    <h6><b>Option 1</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state1" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state1" id="state1" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($state->state); ?>" <?php echo e($profile['state1'] == $state->state ? 'selected' : ''); ?>><?php echo e($state->state); ?></option>
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
                            <select name="city1" id="city1" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($city->city); ?>" <?php echo e($profile['city1'] == $city->city ? 'selected' : ''); ?>><?php echo e($city->city); ?></option>
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
                            <select name="state2" id="state2" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($state->state); ?>" <?php echo e($profile['state2'] == $state->state ? 'selected' : ''); ?>><?php echo e($state->state); ?></option>
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
                            <select name="city2" id="city2" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($city->city); ?>" <?php echo e($profile['city2'] == $city->city ? 'selected' : ''); ?>><?php echo e($city->city); ?></option>
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
                            <select name="state3" id="state3" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($state->state); ?>" <?php echo e($profile['state3'] == $state->state ? 'selected' : ''); ?>><?php echo e($state->state); ?></option>
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
                            <select name="city3" id="city3" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($city->city); ?>" <?php echo e($profile['city3'] == $city->city ? 'selected' : ''); ?>><?php echo e($city->city); ?></option>
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
                            <select name="state4" id="state4" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($state->state); ?>" <?php echo e($profile['state4'] == $state->state ? 'selected' : ''); ?>><?php echo e($state->state); ?></option>
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
                            <select name="city4" id="city4" class="form-control">
                                <option value="0">Please select</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <option value="<?php echo e($city->city); ?>" <?php echo e($profile['city4'] == $city->city ? 'selected' : ''); ?>><?php echo e($city->city); ?></option>
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
                    <hr> -->




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
                                <option value="1" <?php echo e($profile['qualification'] == 1 ? 'selected' : ''); ?>>Graduate</option>
                                <option value="2" <?php echo e($profile['qualification'] == 2 ? 'selected' : ''); ?>>Post Graduate</option>
                                <option value="3" <?php echo e($profile['qualification'] == 3 ? 'selected' : ''); ?>>PHD</option>
                                <option value="4" <?php echo e($profile['qualification'] == 4 ? 'selected' : ''); ?>>No College Degree</option>
                                <option value="5" <?php echo e($profile['qualification'] == 5 ? 'selected' : ''); ?>>Diploma</option>
                                
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
                                <option value="1" <?php echo e($profile['certificate'] == 1 ? 'selected' : ''); ?>>Engineering</option>
                                <option value="2" <?php echo e($profile['certificate'] == 2 ? 'selected' : ''); ?>>Architecture</option>
                                <option value="3" <?php echo e($profile['certificate'] == 3 ? 'selected' : ''); ?>>Science</option>
                                <option value="4" <?php echo e($profile['certificate'] == 4 ? 'selected' : ''); ?>>Computer</option>
                                <option value="5" <?php echo e($profile['certificate'] == 5 ? 'selected' : ''); ?>>Business</option>
                                <option value="6" <?php echo e($profile['certificate'] == 6 ? 'selected' : ''); ?>>Design</option>
                                <option value="7" <?php echo e($profile['certificate'] == 7 ? 'selected' : ''); ?>>Construction</option>
                                <option value="8" <?php echo e($profile['certificate'] == 8 ? 'selected' : ''); ?>>Political</option>
                                <option value="9" <?php echo e($profile['certificate'] == 9 ? 'selected' : ''); ?>>Math</option>
                                <option value="10" <?php echo e($profile['certificate'] == 10 ? 'selected' : ''); ?>>Technical</option>
                                
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
                            <label for="skills" class=" form-control-label">Skills</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div id="tags">
                            <input type="text" id="skills" name="skills" placeholder="Skills" class="form-control" value="<?php echo e(old('skills', $profile['skills'])); ?>" data-role="tagsinput" required>
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
                            <input type="text" id="salary_expected" name="salary_expected" placeholder="Salary Expected" class="form-control" value="<?php echo e(old('salary_expected', $profile['salary_expected'])); ?>"  required>
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

    //state 1
    $('#state1').on('change', function(e){
        var state_id = e.target.value;

        $.get('<?php echo e(url('information')); ?>/create/ajax-state?state_id=' + state_id, function(data) {
            //console.log(data);
            $('#city1').empty();
            $.each(data, function(index,subCatObj){
                $('#city1').append('<option value='+subCatObj.city+'>'+subCatObj.city+'</option>');
            });
             //$(".chosen").chosen(); 
        });
    });
    //state 2
    $('#state2').on('change', function(e){
        var state_id = e.target.value;

        $.get('<?php echo e(url('information')); ?>/create/ajax-state?state_id=' + state_id, function(data) {
            //console.log(data);
            $('#city2').empty();
            $.each(data, function(index,subCatObj){
                $('#city2').append('<option value='+subCatObj.city+'>'+subCatObj.city+'</option>');
            });
             //$(".chosen").chosen(); 
        });
    });
    //state 3
    $('#state3').on('change', function(e){
        var state_id = e.target.value;

        $.get('<?php echo e(url('information')); ?>/create/ajax-state?state_id=' + state_id, function(data) {
            //console.log(data);
            $('#city3').empty();
            $.each(data, function(index,subCatObj){
                $('#city3').append('<option value='+subCatObj.city+'>'+subCatObj.city+'</option>');
            });
             //$(".chosen").chosen(); 
        });
    });
    //state 4
    $('#state4').on('change', function(e){
        var state_id = e.target.value;

        $.get('<?php echo e(url('information')); ?>/create/ajax-state?state_id=' + state_id, function(data) {
            //console.log(data);
            $('#city4').empty();
            $.each(data, function(index,subCatObj){
                $('#city4').append('<option value='+subCatObj.city+'>'+subCatObj.city+'</option>');
            });
             //$(".chosen").chosen(); 
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>