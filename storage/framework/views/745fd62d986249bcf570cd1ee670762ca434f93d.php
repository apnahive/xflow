<?php $__env->startSection('content'); ?>
<!-- <a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a> -->



<div class="table-data__tool">
    <div class="table-data__tool-left">
        <a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
            Back</button></a>
    </div>    
</div>

<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Candidate Profile</strong>
            </div>            

            <div class="card-body card-block">
                <div class="row" style="margin: 0 0;">
                <a href="<?php echo e(route('candidate_detail.edit', $profile['id'])); ?>"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Edit</button></a>
                </div>
                <h3 class="title-5 m-b-35">Personal Details</h3>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            <?php echo e($user->name); ?> <?php echo e($user->lastname); ?>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            <?php echo e($user->email); ?>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Phone</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            <?php echo e($user->phonenumber); ?>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Address</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php if($details): ?>
                            <?php echo e($details->address); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Zipcode</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php if($details): ?>
                            <?php echo e($details->zip); ?>

                            <?php endif; ?>
                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            <?php echo e($profile->state); ?>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            <?php echo e($profile->city); ?>

                        </div>
                    </div>

                <div class="row" style="margin: 0 0;">
                <a href="<?php echo e(route('profiles.edit', $profile['id'])); ?>"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Edit</button></a>
                </div>
                <h3 class="title-5 m-b-35">Professional Details</h3>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Profile Title</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            <?php echo e($profile['title']); ?>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="employer" class=" form-control-label">Current Employer</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            <?php echo e($profile['employer']); ?>

                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="experience_level" class=" form-control-label">Experience Level</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            <?php if($profile['experience_level'] == 1): ?>
                                Entry Level
                            <?php elseif($profile['experience_level'] == 2): ?>
                                Intermediate Level
                            <?php elseif($profile['experience_level'] == 3): ?>
                                Expert Level 
                            <?php else: ?>
                                Not Selected
                            <?php endif; ?>
                        </div>
                         
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="experience_years" class=" form-control-label">Experience in Years</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            <?php if($profile['experience_years'] == 1): ?>
                                0 Years
                            <?php elseif($profile['experience_years'] == 2): ?>
                                1 Years
                            <?php elseif($profile['experience_years'] == 3): ?>
                                2 Years
                            <?php elseif($profile['experience_years'] == 4): ?>
                                3 Years
                            <?php elseif($profile['experience_years'] == 5): ?>
                                4 Years
                            <?php elseif($profile['experience_years'] == 6): ?>
                                5 Years
                            <?php elseif($profile['experience_years'] == 7): ?>
                                6 Years
                            <?php elseif($profile['experience_years'] == 8): ?>
                                7 Years
                            <?php elseif($profile['experience_years'] == 9): ?>
                                8 Years
                            <?php elseif($profile['experience_years'] == 10): ?>
                                9 Years
                            <?php elseif($profile['experience_years'] == 11): ?>
                                10 Years
                            <?php else: ?>
                                Not Selected
                            <?php endif; ?>
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="active" class=" form-control-label">Are you Active?</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php if($profile['active'] == 1): ?>
                                Yes
                            <?php elseif($profile['active'] == 2): ?>
                                No
                            <?php else: ?>
                                Not Selected
                            <?php endif; ?>                            
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state" class=" form-control-label">Current State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php echo e($profile->state); ?>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city" class=" form-control-label">Current City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php echo e($profile->city); ?>

                        </div>
                    </div>

                    
                    <h5>City ready to re-location:</h5>
                    <hr>
                    <div class="col-md-12">
                    <h6><b>Option 1</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state1" class=" form-control-label">State/City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php echo e($profile->state1); ?>, <?php echo e($profile->city1); ?>

                        </div>
                    </div>                    
                    </div>
                    <div class="col-md-12">
                    <h6><b>Option 2</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state2" class=" form-control-label">State/City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php echo e($profile->state2); ?>, <?php echo e($profile->city2); ?>

                        </div>
                    </div>                    
                    </div>
                    <div class="col-md-12">
                    <h6><b>Option 3</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state3" class=" form-control-label">State/City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php echo e($profile->state3); ?>, <?php echo e($profile->city3); ?>

                        </div>
                    </div>                    
                    </div>
                    <div class="col-md-12">
                    <h6><b>Option 4</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state4" class=" form-control-label">State/City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php echo e($profile->state4); ?>, <?php echo e($profile->city4); ?>

                        </div>
                    </div>                    
                    </div>
                    
                    <hr>

                    

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="qualification" class=" form-control-label">Qualification And Education</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php if($profile['qualification'] == 1): ?>
                                Graduate
                            <?php elseif($profile['qualification'] == 2): ?>
                                Post Graduate
                            <?php elseif($profile['qualification'] == 3): ?>
                                PHD
                            <?php elseif($profile['qualification'] == 4): ?>
                                No College Degree
                            <?php elseif($profile['qualification'] == 5): ?>
                                Diploma
                            <?php else: ?>
                                Not Selected
                            <?php endif; ?>
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="certificate" class=" form-control-label">Certificate</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php if($profile['certificate'] == 1): ?>
                                Engineering
                            <?php elseif($profile['certificate'] == 2): ?>
                                Architecture
                            <?php elseif($profile['certificate'] == 3): ?>
                                Science
                            <?php elseif($profile['certificate'] == 4): ?>
                                Computer
                            <?php elseif($profile['certificate'] == 5): ?>
                                Business
                            <?php elseif($profile['certificate'] == 6): ?>
                                Design
                            <?php elseif($profile['certificate'] == 7): ?>
                                Construction
                            <?php elseif($profile['certificate'] == 8): ?>
                                Political
                            <?php elseif($profile['certificate'] == 9): ?>
                                Math
                            <?php elseif($profile['certificate'] == 10): ?>
                                Technical
                            <?php else: ?>
                                Not Selected
                            <?php endif; ?>
                        </div>
                         
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="skills" class=" form-control-label">Skills</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php echo e($profile['skills']); ?>

                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="salary_expected" class=" form-control-label">Salary Expected</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <?php echo e($profile['salary_expected']); ?>

                        </div>
                    </div>
                    
            </div>            
        </div>        
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>