@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create</strong> Task Template
            </div>            
            <form action="{{ route('task_templates.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div class="card-body card-block">                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control"  required>
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                            @if ($errors->has('name'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="detail" class="form-control-label">Detail</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="detail" id="detail" rows="3" placeholder="Detail..." class="form-control"  required></textarea>
                            @if ($errors->has('detail'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('detail') }}</strong>
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
