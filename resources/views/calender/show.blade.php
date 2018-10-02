@extends('layouts.app')

@section('content')

<a href="{{ route('calender.index') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>


<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Tasks</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                
            </div>
            <div class="table-data__tool-right">
                @if($tasks->admin == 1 || $tasks->poc == 1 || $tasks->cco == 1)
                <a href="{{ route('tasks.create') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Task</button></a>
                @endif                
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>                    
                    <tr>                        
                        <th>Task</th>
                        <th>Project</th>
                        <th>Managed By</th>
                        <th>Assigned To</th>                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $taskkey => $task)
                    <tr class="tr-shadow" @if($task->color == 1) style="border-left: 3px solid #fa4251;" @elseif($task->color == 2) style="border-left: 3px solid #ffa037;" @elseif($task->color == 3) style="border-left: 3px solid #00ad5f;" @elseif($task->color == 4) style="border-left: 3px solid #777272;" @endif>
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

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
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
            {!! $tasks->render() !!}
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

@endsection
