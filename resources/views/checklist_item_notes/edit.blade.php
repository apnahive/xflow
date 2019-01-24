@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Sublist
            </div>            
            <form action="{{ route('checklist_item_notes.update', $note['id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body card-block">                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="note" class=" form-control-label">Notes</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="note" id="note" rows="3" placeholder="Description..." class="form-control">{!! $note->note !!}</textarea>
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
                    <i class="fa fa-dot-circle-o"></i> Update
                </button>                
            </div>
            </form>
        </div>        
    </div>
</div>

@endsection