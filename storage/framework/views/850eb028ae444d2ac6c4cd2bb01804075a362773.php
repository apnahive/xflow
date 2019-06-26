<?php $__env->startSection('content'); ?>



<a href="<?php echo e(route('jobs.index')); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
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
                         aria-selected="true"><i class="fab fa-product-hunt"></i>Details</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-tasks"></i>Shortlisted</a>
                        <a class="nav-item nav-link <?php echo e(old('tab') == 'custom-nav-xflow' ? 'active' : ''); ?>" id="custom-nav-xflow-tab" data-toggle="tab" href="#custom-nav-xflow" role="tab" aria-controls="custom-nav-xflow"
                         aria-selected="false"><i class="fas fa-cogs"></i>Interviews</a>
                        <a class="nav-item nav-link <?php echo e(old('tab') == 'custom-nav-notes' ? 'active' : ''); ?>" id="custom-nav-notes-tab" data-toggle="tab" href="#custom-nav-notes" role="tab" aria-controls="custom-nav-notes"
                         aria-selected="false"><i class="far fa-file"></i>Notes</a>
                        <!-- <?php if($job->status == 1): ?>
                        <a class="nav-item nav-link <?php echo e(old('tab') == 'custom-nav-candidates' ? 'active' : ''); ?>" id="custom-nav-candidates-tab" data-toggle="tab" href="#custom-nav-candidates" role="tab" aria-controls="custom-nav-candidates"
                         aria-selected="false"><i class="far fa-user"></i>Candidates</a>
                        <?php endif; ?> -->
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-project" role="tabpanel" aria-labelledby="custom-nav-project-tab">
                        <div style="text-align:left;margin:auto;margin-top: 10px;margin-right: 0;">
                            <?php if($job->status == 1): ?>
                            <div style="font-size: 21px;">
                                <i class="far fa-thumbs-up"></i> Awarded to <a href="<?php echo e(route('profiles.show', $award->candidate_id)); ?>"><?php echo e($award->candidate); ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Title</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label"><?php echo e($job['title']); ?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label"><b>Responsibilities</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="description" class=" form-control-label"><?php echo e($job->description); ?></label>
                                </div>
                            </div>                    
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label"><b>Requirements</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="description" class=" form-control-label"><?php echo e($job->requirements); ?></label>
                                </div>
                            </div>                    
                            <!-- <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="poc" class=" form-control-label"><b>Experience Level</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="poc" class=" form-control-label">
                                        <?php if($job['experience_level'] == 1): ?>
                                            Entry Level
                                        <?php elseif($job['experience_level'] == 2): ?>
                                            Intermediate Level
                                        <?php elseif($job['experience_level'] == 3): ?>
                                            Expert Level 
                                        <?php else: ?>
                                            Not Selected
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>                     -->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="cco" class=" form-control-label"><b>Years of Experience</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="cco" class=" form-control-label">
                                        <?php if($job['experience_years'] == 1): ?>
                                            0-2 Years
                                        <?php elseif($job['experience_years'] == 2): ?>
                                            2-5 Years
                                        <?php elseif($job['experience_years'] == 5): ?>
                                            5+ Years
                                        <!-- <?php elseif($job['experience_years'] == 4): ?>
                                            3 Years
                                        <?php elseif($job['experience_years'] == 5): ?>
                                            4 Years
                                        <?php elseif($job['experience_years'] == 6): ?>
                                            5 Years
                                        <?php elseif($job['experience_years'] == 7): ?>
                                            6 Years
                                        <?php elseif($job['experience_years'] == 8): ?>
                                            7 Years
                                        <?php elseif($job['experience_years'] == 9): ?>
                                            8 Years
                                        <?php elseif($job['experience_years'] == 10): ?>
                                            9 Years
                                        <?php elseif($job['experience_years'] == 11): ?>
                                            10 Years -->
                                        <?php else: ?>
                                            Not Selected
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>State</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php echo e($job->state); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>City</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php echo e($job->city); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Education</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php if($job['qualification'] == 1): ?>
                                            Graduate
                                        <?php elseif($job['qualification'] == 2): ?>
                                            Post Graduate
                                        <?php elseif($job['qualification'] == 3): ?>
                                            PHD
                                        <?php elseif($job['qualification'] == 4): ?>
                                            No College Degree
                                        <?php elseif($job['qualification'] == 5): ?>
                                            Diploma
                                        <?php else: ?>
                                            Not Selected
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Field</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php if($job['certificate'] == 1): ?>
                                            Engineering
                                        <?php elseif($job['certificate'] == 2): ?>
                                            Architecture
                                        <?php elseif($job['certificate'] == 3): ?>
                                            Science
                                        <?php elseif($job['certificate'] == 4): ?>
                                            Computer
                                        <?php elseif($job['certificate'] == 5): ?>
                                            Business
                                        <?php elseif($job['certificate'] == 6): ?>
                                            Design
                                        <?php elseif($job['certificate'] == 7): ?>
                                            Construction
                                        <?php elseif($job['certificate'] == 8): ?>
                                            Political
                                        <?php elseif($job['certificate'] == 9): ?>
                                            Math
                                        <?php elseif($job['certificate'] == 10): ?>
                                            Technical
                                        <?php else: ?>
                                            Not Selected
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Due Date</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php echo e($job['due_date']); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Skills</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php echo e($job['skills']); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Salary Range</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        <?php echo e($job['salary_offered']); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="row" style="margin: 25px 0;">
                        <a href="<?php echo e(route('shortlisted.shortlist', $job->id)); ?>"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            Shortlist</button></a>
                        </div>    
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Skills</th>
                                        <th>Education</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $shortlisted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shortkey => $short): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($short->name); ?></td>
                                        <td><?php echo e($short->title); ?></td>
                                        <td><?php echo e($short->skills); ?></td>
                                        <td>
                                            <?php if($short['qualification'] == 1): ?>
                                                Graduate
                                            <?php elseif($short['qualification'] == 2): ?>
                                                Post Graduate
                                            <?php elseif($short['qualification'] == 3): ?>
                                                PHD
                                            <?php elseif($short['qualification'] == 4): ?>
                                                No College Degree
                                            <?php elseif($short['qualification'] == 5): ?>
                                                Diploma
                                            <?php else: ?>
                                                Not Selected
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                            <a href="<?php echo e(route('profiles.show', $short->user_id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button></a>
                                            
                                            <!-- <a href="<?php echo e(route('jobs.edit', $short->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Invite">
                                                <i class="fas fa-user-plus"></i>
                                                <!-- <i class="zmdi zmdi-edit"></i> 
                                            </button></a> -->

                                            <button class="item" data-toggle="modal" data-target="#interview<?php echo e($short->id); ?>" data-backdrop="false" title="Invite">
                                                <i class="fas fa-user-plus"></i>
                                            </button>

                                            <form action="<?php echo e(route('interviewed.update', $short->user_id)); ?>" method="POST"> 
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <input type="hidden" name="job_id" value="<?php echo e($job['id']); ?>">
                                            
                                            <div class="modal fade" id="interview<?php echo e($short->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($short->id); ?>" aria-hidden="true">
                                              <div class="modal-dialog" role="document" style="max-width: 1024px;">
                                                <div class="modal-content" style="text-align: left;">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Interview <?php echo e($short->name); ?> <?php echo e($short->lastname); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="date1" class=" form-control-label"> Date 1</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="date1" type="date" class="form-control" name="date1" value="<?php echo e(old('date1')); ?>" required autofocus>
                                                            <?php if($errors->has('date1')): ?>
                                                                <span class="help-block error">
                                                                    <strong><?php echo e($errors->first('date1')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="time1" class=" form-control-label"> Time 1</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="time1" type="time" class="form-control" name="time1" value="<?php echo e(old('time1')); ?>" required autofocus>
                                                            <?php if($errors->has('time1')): ?>
                                                                <span class="help-block error">
                                                                    <strong><?php echo e($errors->first('time1')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="date2" class=" form-control-label"> Date 2</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="date2" type="date" class="form-control" name="date2" value="<?php echo e(old('date2')); ?>" required autofocus>
                                                            <?php if($errors->has('date2')): ?>
                                                                <span class="help-block error">
                                                                    <strong><?php echo e($errors->first('date2')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="time2" class=" form-control-label"> Time 2</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="time2" type="time" class="form-control" name="time2" value="<?php echo e(old('time2')); ?>" required autofocus>
                                                            <?php if($errors->has('time2')): ?>
                                                                <span class="help-block error">
                                                                    <strong><?php echo e($errors->first('time2')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="date3" class=" form-control-label"> Date 3</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="date3" type="date" class="form-control" name="date3" value="<?php echo e(old('date3')); ?>" required autofocus>
                                                            <?php if($errors->has('date3')): ?>
                                                                <span class="help-block error">
                                                                    <strong><?php echo e($errors->first('date3')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="time3" class=" form-control-label"> Time 3</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="time3" type="time" class="form-control" name="time3" value="<?php echo e(old('time3')); ?>" required autofocus>
                                                            <?php if($errors->has('time3')): ?>
                                                                <span class="help-block error">
                                                                    <strong><?php echo e($errors->first('time3')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="state" class=" form-control-label">State</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="state" id="state" class="form-control chosen"  required>
                                                                <option value="0">Please select</option>
                                                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                                    <option value="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <?php if($errors->has('state')): ?>
                                                                <span class="help-block error">
                                                                    <strong><?php echo e($errors->first('state')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="city" class=" form-control-label">City</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="city" id="city" class="form-control chosen"  required>
                                                                <option value="0">Please select</option>
                                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                                    <option value="<?php echo e($city->city); ?>"><?php echo e($city->city); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <?php if($errors->has('city')): ?>
                                                                <span class="help-block error">
                                                                    <strong><?php echo e($errors->first('city')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div> 
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="address" class=" form-control-label"> Address</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea name="address" id="address" rows="3" placeholder="Please put address here..." class="form-control" required></textarea>
                                                        </div>
                                                    </div>
                                                    </div>    
                                                    </div>                                                   
                                                    
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary" >Schedule Interview</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            </form>

                                            
                                            <!-- <button class="item" data-toggle="modal" data-target="#confirm<?php echo e($short->id); ?>" data-backdrop="false">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button> -->

                                            

                                            <form action="<?php echo e(route('jobs.destroy', $short->id)); ?>" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            
                                            <div class="modal fade" id="confirm<?php echo e($short->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($short->id); ?>" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content" style="text-align: left;">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Job</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    You are going to delete Job. All the associated records will be deleted. You won't be able to revert these changes!
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Job</button>
                                                    <button type="submit" class="btn btn-primary" >Yes! Delete it</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            </form>
                                        </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="row" style="margin: 25px 0;">
                                <a href="<?php echo e(route('shortlisted.shortlist', $job->id.'-10')); ?>"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    View More</button></a>
                            </div>    
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-xflow" role="tabpanel" aria-labelledby="custom-nav-xflow-tab">
                        <div class="table-responsive table-responsive-data2" style="margin-bottom: 100px;">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th> -->
                                        <th>Name</th> 
                                        <th>Experience level</th>
                                        <th>Skills</th>
                                        <th>Salary Expected</th>
                                        <!-- <th>status</th>
                                        <th>price</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <tr>
                                        <!-- <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td> -->
                                        <td><?php echo e($value->name); ?></td>
                                        <td><?php echo e($value->experience); ?></td>                        
                                        <td><?php echo e($value->skills); ?></td>                        
                                        <td><?php echo e($value->salary_expected); ?></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="<?php echo e(route('profiles.show', $value->candidate_id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button></a>
                                                
                                                
                                                                                



                                                <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                    <i class="zmdi zmdi-more"></i>
                                                </button> -->
                                            </div>
                                            
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <ul class="timeline" id="timeline">
                                              <li class="li complete">
                                                <div class="timestamp">
                                                  <span class="author">Invite Sent</span>
                                                  <span class="date"><?php echo e($value->created_at->format('m/d/Y')); ?><span>
                                                </div>
                                                <div class="status">
                                                  <h5> Invite Sent </h5>
                                                </div>
                                              </li>
                                              <li class="li <?php if($value->accepted_date): ?> complete <?php endif; ?>">
                                                <div class="timestamp">
                                                  <span class="author">Invite Accepted</span>
                                                  <span class="date"><?php if($value->accepted_date): ?> <?php echo e($value->accepted_date->format('m/d/Y')); ?> <?php else: ?> TBD <?php endif; ?><span>
                                                </div>
                                                <div class="status">
                                                  <h5> Interview Scheduled  </h5>
                                                </div>
                                              </li>
                                              <li class="li <?php if($value->accepted_date): ?> complete <?php endif; ?>">
                                                <div class="timestamp">
                                                  <span class="author">Interviewed</span>
                                                  <span class="date"><?php if($value->accepted_date): ?> <?php echo e($value->interview_date->format('m/d/Y')); ?> <?php else: ?> TBD <?php endif; ?><span>
                                                </div>
                                                <div class="status">
                                                  <h5> Interview </h5>
                                                </div>
                                              </li>
                                              <li class="li <?php if($value->awarded): ?> complete <?php endif; ?>">
                                                <div class="timestamp">
                                                  <span class="author">Feedback</span>
                                                  <span class="date"><?php if($value->accepted_date): ?> <?php echo e($value->awarded_date->format('m/d/Y')); ?> <?php else: ?> TBD <?php endif; ?><span>
                                                </div>
                                                <div class="status">
                                                  <h5> Process Completed </h5>
                                                </div>
                                              </li>
                                             </ul>
                                            <hr>
                                        </td>
                                    </tr>

                                    <tr class="spacer"></tr>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                            
                        </div>                                                
                    </div>
                    <div class="tab-pane fade" id="custom-nav-notes" role="tabpanel" aria-labelledby="custom-nav-notes-tab">
                        <div class="table-responsive table-responsive-data2" style="margin-bottom: 0px;">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th> -->
                                        <th style="width: 25%;">Name</th> 
                                        <th style="width: 75%;">Notes</th>
                                        <!-- <th>Skills</th>
                                        <th>Salary Expected</th> -->
                                        <!-- <th>status</th>
                                        <th>price</th> -->
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($notes) > 0): ?>
                                    <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="tr-shadow">
                                        <!-- <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td> -->
                                        <td style="width: 25%;"><?php echo e($value->name); ?></td>
                                        <td style="width: 75%;">
                                            <?php if($value->note_scheduled): ?>
                                            <h6><strong>Scheduled Notes</strong> </h6><br>
                                            <?php echo e($value->note_scheduled); ?><br>
                                            <?php endif; ?>
                                            <?php if($value->note_interviewed): ?>
                                            <h6><strong>Interviewed Notes</strong> </h6><br>
                                            <?php echo e($value->note_interviewed); ?><br>
                                            <?php endif; ?>
                                            <?php if($value->note_finallized): ?>
                                            <h6><strong>Finallized Notes</strong> </h6><br>
                                            <?php echo e($value->note_finallized); ?><br>
                                            <?php endif; ?>

                                            <div class="row" style="margin: 25px 0;">
                                                <a href="<?php echo e(route('job_notes.edit', $job->id.'-'.$value->candidate_id)); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                    Add Notes</button></a>
                                            </div>    

                                        </td>                        
                                        <!-- <td><?php echo e($value->skills); ?></td>                        
                                        <td><?php echo e($value->salary_expected); ?></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="<?php echo e(route('profiles.show', $value->candidate_id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button></a>
                                            </div>
                                        </td> -->
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            
                        </div>                        
                    </div>
                    <!--<?php if($job->status == 1): ?>
                    <div class="tab-pane fade" id="custom-nav-candidates" role="tabpanel" aria-labelledby="custom-nav-candidates-tab">
                         <div class="table-responsive table-responsive-data2" style="margin-bottom: 0px;">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                       
                                        <th style="width: 25%;">Name</th> 
                                        <th style="width: 75%;">Notes</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr class="tr-shadow">
                                    
                                                     
                                        
                                    </tr>
                                    <tr class="spacer"></tr>
                                    
                                </tbody>
                            </table>
                            
                        </div> 
                    </div>
                    <?php endif; ?> -->                       
                </div>

            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>