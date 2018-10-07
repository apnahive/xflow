@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Edit Form</h3>
        
        <div class="table-responsive table-responsive-data2">
            <form class="form-horizontal  form-material" role="form" method="POST" action="{{ route('form_sections.update', $form['id']) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">            
            <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
            <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js" defer></script>  
            <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js" defer></script>    
             
            <script>
                    $(document).ready(function() {
                        $('.summernote').summernote();
                    });
                    
            </script>                        

            <textarea name="summernote" id="summernote" class="summernote">{{ $form->description }}</textarea>
            @if ($errors->has('summernote'))
                <span class="help-block error">
                    <strong>{{ $errors->first('summernote') }}</strong>
                </span>
            @endif 
            <div class="form-group">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-info">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

@endsection