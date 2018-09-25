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
            </div>
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="title" class=" form-control-label"><b>Title</b>: {{ $task->title }} </label>
                        </div>
                        <div class="col col-md-6">
                            <label for="project" class=" form-control-label"><b>Project</b>: {{ $task->projectname }} </label>
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="duedate" class=" form-control-label"><b>Due Date</b>: {{ $task->duedate }}</label>
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
                            <span class="help-block">
                                <strong>{{ $errors->first('actual_time_to_complete') }}</strong>
                            </span>
                        @endif                                                       
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="date_completed" class="form-control-label">Date Completed</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="date_completed" type="date" class="form-control" name="date_completed" value="{{ $task['date_completed'] }}" autofocus>
                        </div>

                        @if ($errors->has('date_completed'))
                            <span class="help-block">
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