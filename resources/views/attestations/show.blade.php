@extends('layouts.app')


@section('content')

<div class="col-lg-12">
    <div class="card">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->
        <div class="card-body">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="custom-nav-project-tab" data-toggle="tab" href="#custom-nav-project" role="tab" aria-controls="custom-nav-project"
                         aria-selected="true"><i class="fab fa-product-hunt"></i>Project</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-tasks"></i>Tasks</a>
                        <a class="nav-item nav-link" id="custom-nav-xflow-tab" data-toggle="tab" href="#custom-nav-xflow" role="tab" aria-controls="custom-nav-xflow"
                         aria-selected="false"><i class="fas fa-cogs"></i>X-flow</a>
                        <a class="nav-item nav-link" id="custom-nav-checklist-tab" data-toggle="tab" href="#custom-nav-checklist" role="tab" aria-controls="custom-nav-checklist"
                         aria-selected="false"><i class="fas fa-map-signs"></i>Checklists</a>
                        <a class="nav-item nav-link" id="custom-nav-files-tab" data-toggle="tab" href="#custom-nav-files" role="tab" aria-controls="custom-nav-files"
                         aria-selected="false"><i class="fas fa-copy"></i>Files</a>
                        @role('Admin')
                        <a class="nav-item nav-link" id="custom-nav-users-tab" data-toggle="tab" href="#custom-nav-users" role="tab" aria-controls="custom-nav-users"
                         aria-selected="false"><i class="fas fa-users"></i>Users</a>
                         @endrole
                        <a class="nav-item nav-link" id="custom-nav-attestation-tab" data-toggle="tab" href="#custom-nav-attestation" role="tab" aria-controls="custom-nav-attestation"
                         aria-selected="false"><i class="fas fa-file-text"></i>Forms</a>
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-project" role="tabpanel" aria-labelledby="custom-nav-project-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label">{{ $project->name }}</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="description" class=" form-control-label">{{ $project->description }}</label>
                                </div>
                            </div>                    
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="poc" class=" form-control-label">POC</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="poc" class=" form-control-label">{{ $project->pocname }}</label>
                                </div>
                            </div>                    
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="cco" class=" form-control-label">CCO</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="cco" class=" form-control-label">{{ $project->cconame }}</label>
                                </div>
                            </div>                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label">Due Date</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">{{ $project->duedate }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="row" style="margin: 25px 0;">
                            @if($project->can_edit) 
                            <a href="{{ route('addtemp', $project->id) }}" style="text-align:center;margin:auto;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">                        
                            <i class="zmdi zmdi-plus"></i>Add task from template</button></a>
                            <a href="{{ route('tasks.create') }}"  style="text-align:center;margin:auto;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>Add wildcard task</button></a>
                            @role('Admin')

                            @else
                            <a href="{{ route('assign_tasks.edit', $project->id) }}"  style="text-align:center;margin:auto;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>Assign Task to CCO</button></a>
                            @endrole
                            @endif
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
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <!-- <th>status</th>
                                        <th>price</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($tasks) > 0)
                                    @foreach ($tasks as $taskkey => $task)
                                    <tr class="tr-shadow">
                                        <!-- <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td> -->
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->projectname }}</td>                        
                                        <td>{{ $task->duedate }}</td>                        
                                        <td>{{ $task->status1 }}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <!-- <a href="{{ route('tasks.show', $task->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button></a> -->
                                                <a href="{{ route('tasks.edit', $task->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button></a>
                                                @if($project->can_edit) 
                                                <button class="item" data-toggle="modal" data-target="#confirm{{$task->id}}" data-backdrop="false">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>

                                                <!-- <button type="button" class="btn btn-priamry"  data-toggle="modal" data-target="#confirm{{$task->id}}">Delete</button> -->

                                                <form id="{{$task->id}}" action="" method="POST" style="display: none;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                                <div class="modal fade" id="confirm{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$task->id}}" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content" style="text-align: left;">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        Under Development
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Task</button>
                                                        <a onclick="event.preventDefault(); document.getElementById( {{$task->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                @endif



                                                <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                    <i class="zmdi zmdi-more"></i>
                                                </button> -->
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    @endforeach
                                    @else
                                        <tr style="text-align: center;"><td colspan="5">No Tasks Added</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-xflow" role="tabpanel" aria-labelledby="custom-nav-xflow-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-checklist" role="tabpanel" aria-labelledby="custom-nav-checklist-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-files" role="tabpanel" aria-labelledby="custom-nav-files-tab">
                        <form action="{{ route('fileupload.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">                        
                        {{ csrf_field() }}
                            <div class="row" style="padding-bottom: 30px;">
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <div class="col-md-6">
                                    <br/>
                                    <input class="file" name="file" type="file" style="float: right;">
                                </div>
                                <div class="col-md-6">
                                    <br/>
                                    <button type="submit" class="btn btn-success">Upload file</button>
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
                        @if(count($files) > 0)
                        @foreach ($files as $filekey => $file)
                        <tr class="tr-shadow">                            
                            <td>
                                <a href="{{ route('fileupload.show', $file->file) }}" target="_blank">{{ $file->file }}</a>
                            </td>                            
                        </tr>                        
                        @endforeach
                        @else
                            <tr style="text-align: center;"><td colspan="5">No Files Added</td></tr>
                        @endif
                        </tbody>
                        </table>
                        
                    </div>
                    @role('Admin')
                    <div class="tab-pane fade" id="custom-nav-users" role="tabpanel" aria-labelledby="custom-nav-users-tab">
                        <!-- <style>
                            
                                </style> -->

                            <h3 class="title-5 m-b-35">Add users to the project</h3>
                                <link href="{{ asset('css/select.css') }}" rel="stylesheet">

                            <form action="{{ route('project_users.update', $project['id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="subject-info-box-1">
                              <select multiple="true" id="lstBox1" name="no_user[]" class="form-control">
                                @foreach ($users as $userkey => $user)
                                <option value="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }}</option>
                                @endforeach
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
                                    @foreach ($selected_users as $key => $selected_user)
                                    <option value="{{ $selected_user->id }}">{{ $selected_user->name }} {{ $selected_user->lastname }}</option>
                                    @endforeach
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Update Users in project
                            </button>                
                            </form>

                            <div class="clearfix"></div>    

                              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
                              <script src="{{ asset('js/select.js') }}" defer></script>
                              

                                <!-- <script>       

                            
                                  //# sourceURL=pen.js
                                </script> -->

                        
                        
                    </div>
                    @endrole
                    <div class="tab-pane fade" id="custom-nav-attestation" role="tabpanel" aria-labelledby="custom-nav-attestation-tab">
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection