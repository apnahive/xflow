@extends('layouts.app')

@section('content')

<a href="{{ route('task_templates.index') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Task for Template
            </div>            
            <form action="{{ route('task_for_templates.update', $task['id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body card-block">                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="{{ old('name', $task['title']) }}">
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                            @if ($errors->has('title'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif 
                        </div>
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
                            @if ($errors->has('category'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="estimated_time_to_complete" class=" form-control-label">Estimated Time to Complete</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="estimated_time_to_complete" type="text" class="form-control" name="estimated_time_to_complete" value="{{ old('estimated_time_to_complete', $task['estimated_time_to_complete']) }}" required autofocus>
                            @if ($errors->has('estimated_time_to_complete'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('estimated_time_to_complete') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="note" class="form-control-label">Note</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="note" id="note" rows="3" placeholder="Note..." class="form-control">{{ $task->note }}</textarea>
                            @if ($errors->has('note'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('note') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="template_id" class=" form-control-label">Template</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="template_id" id="template_id" class="custom-select form-control chosen">
                                <option value="0">Please select</option>
                                @foreach ($task_templates as $task_template) 
                                    <option value="{{$task_template->id}}" {{ $task['task_template_id'] == $task_template->id ? 'selected' : '' }}>{{$task_template->name}}
                                @endforeach
                            </select>
                            @if ($errors->has('template_id'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('template_id') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
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
