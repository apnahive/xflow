@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Checklist
            </div>            
            <form action="{{ route('checklists.update', $checklist['id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body card-block">                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="{{ old('name', $checklist['title']) }}">
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
                            <label for="assign" class=" form-control-label">Assign</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="assign" id="assign" class="custom-select form-control chosen">
                                <option value="0">Please select</option>
                                @foreach ($users as $user) 
                                    <option value="{{$user->id}}" {{ $checklist['assignee'] == $user->id ? 'selected' : '' }}>{{$user->name}} {{$user->lastname}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('assign'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('assign') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="duedate" class=" form-control-label">Due Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="duedate" type="date" placeholder="yyyy-mm-dd" class="form-control" name="duedate" value="{{ old('duedate', $checklist['duedate']) }}" required autofocus>
                            @if ($errors->has('duedate'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('duedate') }}</strong>
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