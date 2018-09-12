@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Add Tasks to Project</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
            </div>
            <!-- <div class="table-data__tool-right">
                <a href="{{ route('tasks.create') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Task</button></a>
                
            </div> -->
        </div>
        <div class="table-responsive table-responsive-data2">
            <form class="form-horizontal  form-material" role="form" method="POST" action="{{ route('add_task.update', $template['id']) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="project" value="{{ $project }}">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox" id="checkAll">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>Task</th>
                        <th>Category</th>
                        <!-- <th>Due Date</th>
                        <th>Status</th> -->
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $taskkey => $task)
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <!-- <input type="checkbox"> -->
                                <input type="hidden" name="task{{ $task->id }}" value="false">
                                <input type="checkbox" id="task{{ $task->id }}" value="true" name="task{{ $task->id }}">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->category1 }}</td>                        
                        <!-- <td>{{ $task->duedate }}</td>                        
                        <td>{{ $task->category1 }}</td> -->
                        <td>
                            <!-- <div class="table-data-feature">
                                <a href="{{ route('tasks.show', $task->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                <a href="{{ route('tasks.edit', $task->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                <button class="item" data-toggle="modal" data-target="#confirm{{$task->id}}" data-backdrop="false">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                
                            </div> -->
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    @endforeach                    
                </tbody>                
            </table>
            <div class="form-group">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-info">
                            Add to Project
                        </button>
                    </div>
                </div>
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