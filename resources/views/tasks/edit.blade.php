@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Task
            </div>            
            <form action="{{ route('tasks.update', $task['id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="project" class=" form-control-label">Project</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="project" id="project" class="custom-select form-control chosen">
                                <option value="0">Please select</option>
                                @foreach ($projects as $project) 
                                    <option value="{{$project->id}}" {{ $task['project_id'] == $project->id ? 'selected' : '' }}>{{$project->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="{{ old('name', $task['title']) }}">
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="duedate" class=" form-control-label">Due Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="duedate" type="date" class="form-control" name="duedate" value="{{ $task['duedate'] }}" required autofocus>
                        </div>

                        @if ($errors->has('duedate'))
                            <span class="help-block">
                                <strong>{{ $errors->first('duedate') }}</strong>
                            </span>
                        @endif                                                       
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="category" class=" form-control-label">Category</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="category" id="category" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1" {{ $task['category'] == 1 ? 'selected' : '' }}>Simple</option>
                                <option value="2" {{ $task['category'] == 2 ? 'selected' : '' }}>Average</option>
                                <option value="3" {{ $task['category'] == 3 ? 'selected' : '' }}>Difficult</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="estimated_time_to_complete" class=" form-control-label">Estimated Time to Complete</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="estimated_time_to_complete" type="time" class="form-control" name="estimated_time_to_complete" value="{{ $task['estimated_time_to_complete'] }}" required autofocus>
                        </div>

                        @if ($errors->has('estimated_time_to_complete'))
                            <span class="help-block">
                                <strong>{{ $errors->first('estimated_time_to_complete') }}</strong>
                            </span>
                        @endif                                                       
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="actual_time_to_complete" class="form-control-label">Actual Time to Complete</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="actual_time_to_complete" type="time" class="form-control" name="actual_time_to_complete" value="{{ $task['actual_time_to_complete'] }}" required autofocus>
                        </div>

                        @if ($errors->has('actual_time_to_complete'))
                            <span class="help-block">
                                <strong>{{ $errors->first('actual_time_to_complete') }}</strong>
                            </span>
                        @endif                                                       
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="status" class=" form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" id="status" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1" {{ $task['status'] == 1 ? 'selected' : '' }}>Pending</option>
                                <option value="2" {{ $task['status'] == 2 ? 'selected' : '' }}>initiated</option>
                                <option value="3" {{ $task['status'] == 3 ? 'selected' : '' }}>completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="date_completed" class="form-control-label">Date Completed</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="date_completed" type="date" class="form-control" name="date_completed" value="{{ $task['date_completed'] }}" required autofocus>
                        </div>

                        @if ($errors->has('date_completed'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_completed') }}</strong>
                            </span>
                        @endif                                                       
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="note" class="form-control-label">Note</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="note" id="note" rows="3" placeholder="Note..." class="form-control">{!! $task->note !!}</textarea>
                            @if ($errors->has('note'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('note') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <script type="text/javascript">
                          $(".chosen").chosen();
                    </script>
                    
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Update
                </button>                
            </div>
            </form>
        </div>        
    </div>
</div>

@endsection