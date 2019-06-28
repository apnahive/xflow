<?php $__env->startSection('content'); ?>
<!-- <a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a> -->



<div class="table-data__tool">
    <div class="table-data__tool-left">
        <a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
            Back</button></a>
    </div>    
</div>


<div class="col-lg-12">
    <div class="card">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->
        <div class="card-body" style="margin-bottom: 100px;">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="custom-nav-project-tab" data-toggle="tab" href="#custom-nav-project" role="tab" aria-controls="custom-nav-project"
                         aria-selected="true"><i class="fab fa-product-hunt"></i>Candidate Profile</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-tasks"></i>Professional Details</a>
                        <!-- <a class="nav-item nav-link <?php echo e(old('tab') == 'custom-nav-xflow' ? 'active' : ''); ?>" id="custom-nav-xflow-tab" data-toggle="tab" href="#custom-nav-xflow" role="tab" aria-controls="custom-nav-xflow"
                         aria-selected="false"><i class="fas fa-cogs"></i>Experience Details</a> -->
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-project" role="tabpanel" aria-labelledby="custom-nav-project-tab">
                        <div class="card-body card-block">
                            <div class="row" style="margin: 0 0;">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can apply job')): ?>
                                <a href="<?php echo e(route('candidate_detail.edit', $profile['id'])); ?>"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    Edit</button></a>
                                <?php endif; ?>
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
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="row" style="margin: 0 0;">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can apply job')): ?>
                        <a href="<?php echo e(route('profiles.edit', $profile['id'])); ?>"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            Edit</button></a>
                        <?php endif; ?>
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
                            <!-- <div class="row form-group">
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
                                 
                            </div> -->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="experience_years" class=" form-control-label">Experience in Years</label>
                                </div>
                                <div class="col-12 col-md-9">                            
                                    <?php if($profile['experience_years'] == 1): ?>
                                        0-2 Years
                                    <?php elseif($profile['experience_years'] == 2): ?>
                                        2-5 Years
                                    <?php elseif($profile['experience_years'] == 5): ?>
                                        5+ Years
                                    <!-- <?php elseif($profile['experience_years'] == 4): ?>
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
                                        10 Years -->
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

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="relocation" class=" form-control-label">City ready to re-location</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <?php if($profile['relocation'] === "1"): ?>
                                    Yes
                                    <?php else: ?>
                                    No
                                    <?php endif; ?>
                                    <!-- <input id="checkbox1" type="radio" name="relocation" value="1" <?php echo e($profile['relocation'] === "1" ? 'checked' : ''); ?>>
                                    <label for="checkbox1" style="padding-right: 50px;">
                                        Yes
                                    </label>
                                    <input id="checkbox2" type="radio" name="relocation" value="2" <?php echo e($profile['relocation'] === "2" ? 'checked' : ''); ?>>
                                    <label for="checkbox2">
                                        No
                                    </label> -->
                                    <?php if($errors->has('relocation')): ?>
                                        <span class="help-block error">
                                            <strong><?php echo e($errors->first('relocation')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
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
                                    <label for="qualification" class=" form-control-label">Education</label>
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
                                    <label for="certificate" class=" form-control-label">Field</label>
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
                                    <label for="certification" class=" form-control-label">Certifications</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <?php echo e($profile['certification']); ?>

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
                    <!-- <div class="tab-pane fade" id="custom-nav-xflow" role="tabpanel" aria-labelledby="custom-nav-xflow-tab">
                        <div class="row" style="margin: 0 0;">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can apply job')): ?>
                        <a href="<?php echo e(route('candidate_experiences.create')); ?>"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            Add Experience</button></a>
                        <?php endif; ?>
                        </div>
                        <h3 class="title-5 m-b-35">Experience Details</h3>
                        <div class="table-responsive table-responsive-data2" style="margin-bottom: 100px;">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Project Name</th> 
                                        <th>Working Hours</th> 
                                        <th>Expert level</th>
                                        <th>Skills</th>
                                        <th>Qualification</th> 
                                        <th>status</th>
                                        <th>price</th> 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <tr class="tr-shadow">
                                        <td><?php echo e($value->title); ?></td>
                                        <td><?php echo e($value->hours); ?></td>
                                        
                                        <td>
                                            <div class="table-data-feature">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can apply job')): ?>
                                                <a href="<?php echo e(route('candidate_experiences.edit', $value->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button></a>
                                                
                                                
                                                <button class="item" data-toggle="modal" data-target="#confirm<?php echo e($value->id); ?>" data-backdrop="false">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>

                                                

                                                <form id="<?php echo e($value->id); ?>" action="" method="POST" style="display: none;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                </form>
                                                <div class="modal fade" id="confirm<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($value->id); ?>" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content" style="text-align: left;">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Experience</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        Under Development
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Experience</button>
                                                        <a onclick="event.preventDefault(); document.getElementById( <?php echo e($value->id); ?> ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <?php endif; ?>
                                                
                                                
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                            
                        </div>
                    </div> -->
                </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>