<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
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
                        <a class="nav-item nav-link" id="custom-nav-project-tab" data-toggle="tab" href="#custom-nav-project" role="tab" aria-controls="custom-nav-project"
                         aria-selected="true"><i class="fab fa-product-hunt"></i>Project</a>
                        <a class="nav-item nav-link active" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-tasks"></i>Tasks</a>
                        <a class="nav-item nav-link <?php echo e(old('tab') == 'custom-nav-xflow' ? 'active' : ''); ?>" id="custom-nav-xflow-tab" data-toggle="tab" href="#custom-nav-xflow" role="tab" aria-controls="custom-nav-xflow"
                         aria-selected="false"><i class="fas fa-cogs"></i>X-flow</a>
                        <a class="nav-item nav-link <?php echo e(old('tab') == 'custom-nav-checklist' ? 'active' : ''); ?>" id="custom-nav-checklist-tab" data-toggle="tab" href="#custom-nav-checklist" role="tab" aria-controls="custom-nav-checklist"
                         aria-selected="false"><i class="fas fa-map-signs"></i>Checklists</a>
                        <a class="nav-item nav-link <?php echo e(old('tab') == 'custom-nav-files' ? 'active' : ''); ?>" id="custom-nav-files-tab" data-toggle="tab" href="#custom-nav-files" role="tab" aria-controls="custom-nav-files"
                         aria-selected="false"><i class="fas fa-copy"></i>Files</a>
                        <?php if($project->can_edit): ?> 
                        <a class="nav-item nav-link <?php echo e(old('tab') == 'custom-nav-users' ? 'active' : ''); ?>" id="custom-nav-users-tab" data-toggle="tab" href="#custom-nav-users" role="tab" aria-controls="custom-nav-users"
                         aria-selected="false"><i class="fas fa-users"></i>Users</a>
                         
                        <a class="nav-item nav-link <?php echo e(old('tab') == 'custom-nav-attestation' ? 'active' : ''); ?>" id="custom-nav-attestation-tab" data-toggle="tab" href="#custom-nav-attestation" role="tab" aria-controls="custom-nav-attestation"
                         aria-selected="false"><i class="fas fa-file-text"></i>Forms</a>
                        <?php endif; ?>
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade" id="custom-nav-project" role="tabpanel" aria-labelledby="custom-nav-project-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Name</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label"><?php echo e($project->name); ?></label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label"><b>Description</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="description" class=" form-control-label"><?php echo e($project->description); ?></label>
                                </div>
                            </div>                    
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="poc" class=" form-control-label"><b>POC</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="poc" class=" form-control-label"><?php echo e($project->pocname); ?></label>
                                </div>
                            </div>                    
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="cco" class=" form-control-label"><b>CCO</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="cco" class=" form-control-label"><?php echo e($project->cconame); ?></label>
                                </div>
                            </div>                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Due Date</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label"><?php echo e($project->duedate); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="row" style="margin: 25px 0;">
                            <?php if($project->can_edit): ?> 
                            <a href="<?php echo e(route('addtemp', $project->id)); ?>" style="text-align:center;margin:auto;margin-top: 10px;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">                        
                            <i class="zmdi zmdi-plus"></i>Add task from template</button></a>
                            <a href="<?php echo e(route('tasks.create')); ?>"  style="text-align:center;margin:auto;margin-top: 10px;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>Add wildcard task</button></a>
                            <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>

                            <?php else: ?>
                            <a href="<?php echo e(route('assign_tasks.edit', $project->id)); ?>"  style="text-align:center;margin:auto;margin-top: 10px;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>Assign Task to CCO</button></a>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>                        

                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th> -->
                                        <th>Task</th>
                                        <th>Project</th>
                                        <th>Managed By</th>
                                        <th>Assigned To</th>
                                        <!-- <th>status</th>
                                        <th>price</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($tasks) > 0): ?>
                                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskkey => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="tr-shadow" <?php if($task->color == 1): ?> style="border-left: 3px solid #fa4251;" <?php elseif($task->color == 2): ?> style="border-left: 3px solid #ffa037;" <?php elseif($task->color == 3): ?> style="border-left: 3px solid #00ad5f;" <?php elseif($task->color == 4): ?> style="border-left: 3px solid #777272;" <?php endif; ?>>
                                        <!-- <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td> -->
                                        <td><a href="<?php echo e(route('tasks.show', $task->id)); ?>"><?php echo e($task->title); ?></a> <br><span style="color: #808080b0;">(Due Date: <?php echo e($task->duedate); ?>)</span></td>
                                        <td><a href="<?php echo e(route('projects.show', $task->project_id)); ?>"><?php echo e($task->projectname); ?></a></td>                        
                                        <td><?php echo e($task->managedby); ?></td>                        
                                        <td><?php echo e($task->assignedto); ?> <br> Status: <?php echo e($task->status1); ?></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <!-- <a href="<?php echo e(route('tasks.show', $task->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button></a> -->
                                                <!-- <a href="<?php echo e(route('tasks.edit', $task->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button></a>  -->
                                                <?php if($task->admin == 1 || $task->poc == 1 || $task->cco == 1): ?>
                                                <?php if($task->status < 3): ?>
                                                <button class="item" data-toggle="modal" data-target="#assign<?php echo e($task->id); ?>" data-backdrop="false">
                                                    <i class="fa fa-user"></i>
                                                </button>

                                                <div class="modal fade" id="assign<?php echo e($task->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($task->id); ?>" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <form action="<?php echo e(route('assign_tasks.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" name="task_id" value="<?php echo e($task->id); ?>">
                                                    <div class="modal-content" style="text-align: left;">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Assign Task</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label for="assignee" class=" form-control-label">Assignee</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <select name="assignee" id="assignee" class="custom-select form-control chosen">
                                                                    <option value="0">Please select</option>
                                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                                        <option value="<?php echo e($user->id); ?>" <?php echo e($task['assignee'] == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?> <?php echo e($user->lastname); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-ban"></i>Cancel</button>
                                                      </div>
                                                    </div>
                                                    </form>
                                                  </div>
                                                </div>


                                                <?php endif; ?>
                                                <?php endif; ?>                                                
                                                <a href="<?php echo e(route('tasks.show', $task->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button></a>                                                
                                                <?php if($task->admin == 1 || $task->poc == 1): ?>
                                                <?php if($task->status < 3): ?>
                                                <a href="<?php echo e(route('tasks.edit', $task->id)); ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button></a>
                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
                                                <button class="item" data-toggle="modal" data-target="#confirm<?php echo e($task->id); ?>" data-backdrop="false">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>

                                                <!-- <button type="button" class="btn btn-priamry"  data-toggle="modal" data-target="#confirm<?php echo e($task->id); ?>">Delete</button> -->

                                                <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                
                                                <div class="modal fade" id="confirm<?php echo e($task->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($task->id); ?>" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content" style="text-align: left;">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        You are going to delete Task. All the associated records will be deleted. You won't be able to revert these changes!
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Task</button>
                                                        <button type="submit" class="btn btn-primary" >Yes! Delete it</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                </form>
                                                <?php endif; ?>



                                                <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                    <i class="zmdi zmdi-more"></i>
                                                </button> -->
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr style="text-align: center;"><td colspan="5">No Tasks Added</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <?php echo $tasks->render(); ?>

                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-xflow" role="tabpanel" aria-labelledby="custom-nav-xflow-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-checklist" role="tabpanel" aria-labelledby="custom-nav-checklist-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-files" role="tabpanel" aria-labelledby="custom-nav-files-tab">
                        <form action="<?php echo e(route('fileupload.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">                        
                        <?php echo e(csrf_field()); ?>

                            <div class="row" style="padding-bottom: 30px;">
                                <input type="hidden" name="project_id" value="<?php echo e($project->id); ?>">
                                <div class="col-md-6">
                                    <br/>
                                    <input class="file" name="file" type="file" style="float: right;">
                                    
                                </div>
                                <div class="col-md-6">
                                    <br/>
                                    <button type="submit" class="btn btn-success">Upload file</button>
                                </div>
                                <!-- for the error messages -->
                                <div class="col-md-6">
                                    <?php if($errors->has('file')): ?>
                                        <span class="help-block error">
                                            <strong><?php echo e($errors->first('file')); ?></strong>
                                        </span>
                                    <?php endif; ?> 
                                </div>
                            </div>
                        </form>
                        <table class="table table-data2">                        
                            <thead>
                                <tr>                                    
                                    <th>Project Files</th>                                    
                                </tr>
                            </thead>
                        <tbody>                            
                        <?php if(count($files) > 0): ?>
                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filekey => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="tr-shadow">                            
                            <td>
                                <a href="<?php echo e(route('fileupload.show', $file->file)); ?>" target="_blank"><?php echo e($file->file_name); ?></a>
                            </td>                            
                        </tr>                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr style="text-align: center;"><td colspan="5">No Files Added</td></tr>
                        <?php endif; ?>
                        </tbody>
                        </table>
                        
                    </div>
                    <?php if($project->can_edit): ?> 
                    <div class="tab-pane fade" id="custom-nav-users" role="tabpanel" aria-labelledby="custom-nav-users-tab">
                        <!-- <style>
                            
                                </style> -->

                            <h3 class="title-5 m-b-35">Add users to the project</h3>
                                <link href="<?php echo e(asset('css/select.css')); ?>" rel="stylesheet">

                            <form action="<?php echo e(route('project_users.update', $project['id'])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Update Users in project
                            </button>                
                            </form>

                            <div class="clearfix"></div>    

                              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
                              <script src="<?php echo e(asset('js/select.js')); ?>" defer></script>
                              

                                <!-- <script>       

                            
                                  //# sourceURL=pen.js
                                </script> -->

                        
                        
                    </div>
                    
                    <div class="tab-pane fade" id="custom-nav-attestation" role="tabpanel" aria-labelledby="custom-nav-attestation-tab">
                        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
                        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
                        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js" defer></script>  
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js" defer></script>    
                         
                        <script>
                                $(document).ready(function() {
                                    $('.summernote').summernote();
                                });
                        </script>



                        <form action="<?php echo e(route('project_forms.store')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">                        
                        <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="project_id" value="<?php echo e($project->id); ?>">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="form_files" class=" form-control-label">Files</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="form_files" class="form_files" name="form_files[]" type="file" multiple>
                                    <br>
                                    <?php if(count($form_files) > 0): ?>
                                    <?php $__currentLoopData = $form_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form_filekey => $form_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('project_forms.show', $form_file->file)); ?>" target="_blank"><?php echo e($form_file->file_name); ?></a>
                                        <br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <!-- for the error messages -->
                                <div class="col-md-6">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="help-block error">
                                            <?php echo $errors->first(); ?>

                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <!-- <?php if($errors->has('form_files')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('form_files')); ?></strong>
                                    </span>
                                <?php endif; ?> -->
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="summernote" class=" form-control-label">User Status</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <?php if(count($form_sign) > 0): ?>
                                    <?php $__currentLoopData = $form_sign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form_signkey => $sign_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($sign_value->status): ?>
                                            <div class="alert alert-success col-md-6" role="alert">
                                                <?php echo e($sign_value->name); ?>

                                            </div>
                                        <?php else: ?>
                                            <div class="alert alert-secondary col-md-6" role="alert">
                                                <?php echo e($sign_value->name); ?>

                                            </div>                                            
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php if($attestation->status): ?>
                                    <a href="<?php echo e(route('project_forms.edit', $attestation->id)); ?>" style="float: right;">
                                        <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            Edit Form
                                        </button> 
                                    </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('project_forms.createf', $project->id)); ?>" style="float: right;">
                                        <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            Edit Form
                                        </button> 
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="summernote" class=" form-control-label">Attestation</label>
                                </div>
                                <div class="col-12 col-md-9">                                    
                                    <?php echo $attestation->description; ?>

                                    <?php if(count($sections) > 0): ?>
                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sectionkey => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $section->description; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <!-- <textarea name="summernoteInput" class="summernote"></textarea> -->
                                
                                    <?php if($errors->has('summernote')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('summernote')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="hidden" name="send_all" value="false">
                                    <input type="checkbox" id="send_all" value="true" name="send_all">
                                    <label for="send_all"> Send To All </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-info">
                                        Send
                                    </button>
                                </div>
                            </div>

                            


                            
                        </form>
                        
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>