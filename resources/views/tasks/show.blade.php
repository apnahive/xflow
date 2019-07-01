@extends('layouts.app')


@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>{{ $task['title'] }}</strong>
                
                @if($task->status == 1)
                <a href="{{ route('start_task.edit', $task->id) }}" style="float: right;"><button class="au-btn au-btn-icon au-btn--green au-btn--small"> 
                    Initiate task
                </button></a>
                @endif
                @if($task->status == 3)
                <span style="float: right;">Task Completed</span>
                @endif
                <!-- <a href="{{ route('start_task.show', $task->id) }}" style="float: right;margin-right: 15px;"><button class="au-btn au-btn-icon au-btn--green au-btn--small"> 
                    Copy
                </button></a> -->
                @if($task->allow ==1 && $task->copy)
                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#deletecopy" data-backdrop="false" style="float: right;margin-right: 15px;">
                    Delete Copies
                </button>

                 <form action="{!! route('tasks.deletecopy') !!}" method="POST">
                                
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                                <div class="modal fade" id="deletecopy" tabindex="-1" role="dialog" aria-labelledby="deletecopy" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <input type="hidden" name="origintask" value="{{ $task->copy }}">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete All Copies of T hisTask</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        You are going to delete all copies of this Task. All the associated records will be deleted. You won't be able to revert these changes!
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
                @if($task->allow == 1 && !$task->copy)
                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#copy" data-backdrop="false" style="float: right;margin-right: 15px;">
                    Copy
                </button>


                

                <form action="{{ route('start_task.store') }}" method="POST">
                {{ csrf_field() }}
                
                <div class="modal fade" id="copy" tabindex="-1" role="dialog" aria-labelledby="copy" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" style="text-align: left;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Copy Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="task" value="{{ $task->id }}">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="interval" class=" form-control-label">Interval</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="interval" id="interval" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Daily</option>
                                    <option value="2">weekly</option>
                                    <option value="3">Monthly</option>
                                    <option value="4">Quaterly</option>
                                </select>
                                @if ($errors->has('interval'))
                                    <span class="help-block error">
                                        <strong>{{ $errors->first('interval') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="start" class=" form-control-label">Start Date</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input id="start" type="date" placeholder="yyyy-mm-dd" class="form-control" name="start" value="<?php echo date("Y-m-d"); ?>" required autofocus>
                                @if ($errors->has('start'))
                                    <span class="help-block error">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="till" class=" form-control-label">Till Date</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input id="till" type="date" placeholder="yyyy-mm-dd" class="form-control" name="till" value="{{ old('till') }}" required autofocus>
                                @if ($errors->has('till'))
                                    <span class="help-block error">
                                        <strong>{{ $errors->first('till') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Template</button> -->
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
                @endif


            </div>
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="title" class=" form-control-label"><b>Title</b>: {{ $task->title }} </label>
                        </div>
                        <div class="col col-md-6">
                            <label for="project" class=" form-control-label"><b>Client</b>: {{ $task->projectname }} </label>
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="duedate" class=" form-control-label"><b>Contract Date</b>: {{ $task->duedate }}</label>
                        </div>
                        <div class="col col-md-6">
                            <label for="category" class=" form-control-label"><b>Category</b>: {{ $task->categorys }}</label>
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="estimated_time_to_complete" class=" form-control-label"><b>Estimated Time to Complete (in minutes)</b>: {{ $task->estimated_time_to_complete }}</label>
                        </div>
                        <div class="col col-md-6">
                            <label for="actual_time_to_complete" class="form-control-label"><b>Actual Time to Complete (in minutes)</b>: {{ $task->actual_time_to_complete }}</label>
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="status" class=" form-control-label"><b>Status</b>: {{ $task->statuss }}</label>
                        </div>
                        <div class="col col-md-6">
                            <label for="date_completed" class="form-control-label"><b>Date Completed</b>: {{ $task->date_completed }}</label>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="assignee" class=" form-control-label"><b>Assigned To</b>: {{ $task->assigneename }}</label>
                        </div>
                        <div class="col col-md-6">
                            <label for="assignee" class=" form-control-label"><b>Managed By</b>: {{ $task->responsibles }}</label>
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="note" class="form-control-label"><b>Note</b>: {{ $task->note }}</label>
                        </div>
                        
                    </div>


                @if($task->status == 2)
                <div class="card-footer">
                    <form action="{{ route('start_task.update', $task['id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="actual_time_to_complete" class="form-control-label">Actual Time to Complete (in minutes)</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="actual_time_to_complete" type="text" class="form-control" name="actual_time_to_complete" value="{{ $task['actual_time_to_complete'] }}" autofocus>
                        </div>

                        @if ($errors->has('actual_time_to_complete'))
                            <span class="help-block error">
                                <strong>{{ $errors->first('actual_time_to_complete') }}</strong>
                            </span>
                        @endif 
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="date_completed" class="form-control-label">Date Completed</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="date_completed" type="date" placeholder="yyyy-mm-dd" class="form-control" name="date_completed" value="{{ $task['date_completed'] }}" autofocus>
                        </div>

                        @if ($errors->has('date_completed'))
                            <span class="help-block error">
                                <strong>{{ $errors->first('date_completed') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row form-group">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Mark Complete
                        </button>                
                    </div>

                    </form>
                </div>
                @endif
            </div>
        </div>        
    </div>
</div>


@endsection