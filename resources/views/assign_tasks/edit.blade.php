@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Assign Task to CCO</h3>
        <!-- <div class="table-data__tool">
            <div class="table-data__tool-left">
                
            </div>
            <div class="table-data__tool-right">
                <a href="{{ route('tasks.create') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Task</button></a>
                
            </div>
        </div> -->
        <div class="table-responsive table-responsive-data2">
            <form class="form-horizontal  form-material" role="form" method="POST" action="{{ route('assign_tasks.update', $project['id']) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">            

            <h3 class="title-5 m-b-35"></h3>
            <link href="{{ asset('css/select.css') }}" rel="stylesheet">
            <div class="subject-info-box-1">
              <select multiple="true" id="lstBox1" name="pocs[]" class="form-control">
                @foreach ($tasks as $taskkey => $task)
                <option value="{{ $task->id }}">{{ $task->title }}</option>
                @endforeach
              </select>
            </div>

            <div class="subject-info-arrows text-center">
              <input type="button" id="btnAllRight" value=">>" class="btn btn-default"><br>
              <input type="button" id="btnRight" value=">" class="btn btn-default"><br>
              <input type="button" id="btnLeft" value="<" class="btn btn-default"><br>
              <input type="button" id="btnAllLeft" value="<<" class="btn btn-default">
            </div>

            <div class="subject-info-box-2">
              <select multiple="true" id="lstBox2" name="assigned[]" class="form-control" >
                    
              </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Assign Task to CCO
            </button>                            

            <div class="clearfix"></div>    

              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
              <script src="{{ asset('js/select.js') }}" defer></script>
            
            <!-- <div class="form-group">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-info">
                            Add to Project
                        </button>
                    </div>
                </div> -->
            </form>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
<script type="text/javascript">
     $("#checkAll").click(function () {
         $('input:checkbox').not(this).prop('checked', this.checked);
     });
</script>
@endsection