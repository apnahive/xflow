@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Project
            </div>            
            <form action="{{ route('projects.update', $project['id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="{{ old('name', $project['name']) }}">
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
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
                            <textarea name="description" id="description" rows="3" placeholder="Description..." class="form-control">{!! $project->description !!}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
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
                                    <option value="{{$user->id}}" {{ $project['poc'] == $user->id ? 'selected' : '' }}>{{$user->name}} {{$user->lastname}}
                                @endforeach
                            </select>
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
                                    <option value="{{$user->id}}" {{ $project['cco'] == $user->id ? 'selected' : '' }}>{{$user->name}} {{$user->lastname}}</option>
                                @endforeach
                            </select>
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
                            <input id="duedate" type="date" class="form-control" name="duedate" value="{{ $project['duedate'] }}" required autofocus>
                        </div>

                        @if ($errors->has('duedate'))
                            <span class="help-block">
                                <strong>{{ $errors->first('duedate') }}</strong>
                            </span>
                        @endif                                                       
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