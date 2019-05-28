@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Hours
            </div>            
            <form action="{{ route('work_order_hour.update', $work_order_hours['id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body card-block">                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <label for="title" class=" form-control-label">{!! $work_order_hours->date !!}</label>
                        </div>
                    </div>
                   
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Hours</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="hours" type="text" class="form-control" name="hours" value="{{ old('title', $work_order_hours['hours']) }}" required autofocus>
                                @if ($errors->has('hours'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('hours') }}</strong>
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