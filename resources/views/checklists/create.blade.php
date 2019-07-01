@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create</strong> Checklist
            </div>            
            <form action="{{ route('checklists.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div class="card-body card-block">                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Title" class="form-control">
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
                                    <option value="{{$user->id}}">{{$user->name}} {{$user->lastname}}</option>
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
                            <input id="duedate" type="date" placeholder="yyyy-mm-dd" class="form-control" name="duedate" value="{{ old('duedate') }}" required autofocus>
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
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
            </form>
        </div>        
    </div>
</div>
@endsection
