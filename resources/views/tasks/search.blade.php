@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>

@if($tasks->admin == 1 || $tasks->poc == 1)
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Task Template</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <!-- <div class="rs-select2--light rs-select2--md">
                    <select class="js-select2" name="property">
                        <option selected="selected">All Properties</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    <select class="js-select2" name="time">
                        <option selected="selected">Today</option>
                        <option value="">3 Days</option>
                        <option value="">1 Week</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <button class="au-btn-filter">
                    <i class="zmdi zmdi-filter-list"></i>filters</button> -->
            </div>
            <div class="table-data__tool-right">
                @if($tasks->admin == 1)
                <a href="{{ route('task_templates.create') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Template</button></a>

                <a href="{{ route('task_for_templates.create') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add Task to Template</button></a>
                @endif
                <!-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Export</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div> -->
            </div>
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
                        <th>Detail</th>                        
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($task_templates as $task_templatekey => $task_template)
                    <tr class="tr-shadow">
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td>{{ $task_template->name }}</td>
                        <td>{{ $task_template->detail }}</td>                        
                        <td>
                            <div class="table-data-feature">
                                <a href="{{ route('task_templates.show', $task_template->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                @if($tasks->admin == 1)
                                <a href="{{ route('task_templates.edit', $task_template->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                <button class="item" data-toggle="modal" data-target="#confirm{{$task_template->id}}" data-backdrop="false">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                

                                <form id="{{$task_template->id}}" action="" method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <div class="modal fade" id="confirm{{$task_template->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$task_template->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Template</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Under Development
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Template</button>
                                        <a onclick="event.preventDefault(); document.getElementById( {{$task_template->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
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
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Tasks</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <!-- <div class="rs-select2--light rs-select2--md">
                    <select class="js-select2" name="property">
                        <option selected="selected">All Properties</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    <select class="js-select2" name="time">
                        <option selected="selected">Today</option>
                        <option value="">3 Days</option>
                        <option value="">1 Week</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <button class="au-btn-filter">
                    <i class="zmdi zmdi-filter-list"></i>filters</button> -->
            </div>
            <div class="table-data__tool-right">
                @if($tasks->admin == 1 || $tasks->poc == 1 || $tasks->cco == 1)
                <a href="{{ route('tasks.create') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Task</button></a>
                @endif
                <!-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Export</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div> -->
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <form action="{!! route('tasks.search') !!}" method="POST" role="search" class="search-des">
                    {{ csrf_field() }}
                    <tr>                        
                        <th><input id="task" type="text" class="col-md-12" name="task" value="{{ old('task') }}" placeholder="Task" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;"></th>
                        <th><input id="project" type="text" class="col-md-12" name="project" value="{{ old('project') }}" placeholder="Project" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;"></th>
                        <th>
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" id="managed" name="managed">
                                    <option value="0" selected="selected">Managed By</option>
                                    @foreach ($managedby as $managed) 
                                        <option value="{{$managed->id}}">{{$managed->name}} {{$managed->lastname}}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>                            
                        </th>
                        <th>
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" id="assigned" name="assigned">
                                    <option value="0" selected="selected">Assigned To</option>
                                    @foreach ($assignedto as $assigned) 
                                        <option value="{{$assigned->id}}">{{$assigned->name}} {{$assigned->lastname}}</option>
                                    @endforeach                                    
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>                              
                        </th>                        
                        <th><button type="submit" class="btn btn-md btn-info" style="width: 100%;color: white;background-color: #4272d7;border-radius: 1px;font-size: 16px;"><i class="zmdi zmdi-search"></i> Search</button></th>
                    </tr>
                    </form>
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
                    @foreach ($tasks as $taskkey => $task)
                    <tr class="tr-shadow" @if($task->color == 1) style="border-left: 3px solid #fa4251;" @elseif($task->color == 2) style="border-left: 3px solid #ffa037;" @elseif($task->color == 3) style="border-left: 3px solid #00ad5f;" @endif>
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }} </a><br><span style="color: #808080b0;">(Due Date: {{ $task->duedate }})</span></td>
                        <td><a href="{{ route('projects.show', $task->project_id) }}">{{ $task->projectname }}</td>                        
                        <td>{{ $task->managedby }}</td>                        
                        <td>{{ $task->assignedto }} <br> Status: {{ $task->status1 }}</td>
                        <td>
                            <div class="table-data-feature">
                                <!-- <a href="{{ route('tasks.show', $task->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a> -->
                                @if($tasks->admin == 1 || $task->poc == 1 || $task->cco == 1)
                                <button class="item" data-toggle="modal" data-target="#assign{{$task->id}}" data-backdrop="false">
                                    <i class="fa fa-user"></i>
                                </button>

                                <div class="modal fade" id="assign{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$task->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <form action="{{ route('assign_tasks.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="task_id" value="{{ $task->id }}">
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
                                                    @foreach ($users as $user) 
                                                        <option value="{{$user->id}}" {{ $task['assignee'] == $user->id ? 'selected' : '' }}>{{$user->name}} {{$user->lastname}}</option>
                                                    @endforeach
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



                                @endif                                
                                <a href="{{ route('tasks.show', $task->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>                                
                                @if($tasks->admin == 1 || $task->poc == 1)
                                <a href="{{ route('tasks.edit', $task->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                @endif
                                
                                @if($tasks->admin == 1)
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
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

@endsection
