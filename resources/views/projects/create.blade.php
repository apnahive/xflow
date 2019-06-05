@extends('layouts.app')

@section('content')
<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create New Client</strong>
            </div>            
            <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control" required>
                            @if ($errors->has('name'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="3" placeholder="Description..." class="form-control" required></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="poc" class=" form-control-label">Consultant</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="poc" id="poc" class="custom-select form-control chosen">
                                <option value="0">Please select</option>
                                @foreach ($users as $user) 
                                    <option value="{{$user->id}}">{{$user->name}} {{$user->lastname}}
                                @endforeach
                            </select>                            
                            @if ($errors->has('poc'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('poc') }}</strong>
                                </span>
                            @endif
                        </div>
                         
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="cco" class=" form-control-label">CCO</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="cco" id="cco" class="form-control chosen">
                                <option value="0">Please select</option>
                                @foreach ($users as $user) 
                                    <option value="{{$user->id}}">{{$user->name}} {{$user->lastname}}
                                @endforeach
                            </select>
                            @if ($errors->has('cco'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('cco') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <script type="text/javascript">
                          $(".chosen").chosen();
                    </script>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="duedate" class=" form-control-label">Contract Date</label>
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
