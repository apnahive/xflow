@extends('layouts.app')


@section('content')

<a href="{{ route('projects.index') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>

<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Add</strong> Note
            </div>            
            <form action="{{ route('job_notes.update', $notes['job_id'].'-'.$notes['candidate_id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body card-block">
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="note" class=" form-control-label">Note</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="note" id="note" rows="3" placeholder="Add Note..." class="form-control" required>{!! $note !!}</textarea>
                            @if ($errors->has('note'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('note') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
            </div>            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Add Note
                </button>                
            </div>
            </form>
        </div>        
    </div>
</div>

@endsection