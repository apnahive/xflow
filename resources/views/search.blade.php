@extends('layouts.app')

@section('content')

<div class="row" style="margin-bottom: 100px;">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">We found {{ $search }} in {{ $count }} places</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="{{ route('search') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Back</button></a>
                
            </div>
            <div class="table-data__tool-right">
                
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>                        
                        <th>Item</th>
                        <th>Place</th>
                        <th></th>
                        <!-- <th>Due Date</th> -->
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $projectkey => $project)
                    @if($project->can_view)                    
                    <tr class="tr-shadow">                        
                        <td>{{ $project->name }}</td>
                        <td>projects</td>                        
                        <td></td>                        
                        <!-- <td></td> -->
                        <td>
                            <div class="table-data-feature">
                                <a href="{{ route('projects.show', $project->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                            </div>
                        </td>
                    </tr>
                    <!-- <tr class="spacer"></tr> -->
                    @endif                    
                    @endforeach
                    @foreach ($tasks as $taskkey => $task)                    
                    <tr class="tr-shadow">                        
                        <td>{{ $task->title }}</td>
                        <td>tasks</td>                        
                        <td></td>                        
                        <!-- <td></td> -->
                        <td>
                            <div class="table-data-feature">
                                <a href="{{ route('tasks.show', $task->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                            </div>
                        </td>
                    </tr>
                    <!-- <tr class="spacer"></tr> -->                    
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

<!-- <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Projects</strong> 
            </div>                        
            <div class="card-body card-block">
                <div class="row">
                    <div class="col-md-1">#</div>
                    <div class="col-md-3">Name</div>
                    <div class="col-md-3">Details</div>
                    <div class="col-md-5">Action</div>
                </div>
                <hr>
                @foreach ($projects as $projectkey => $project)
                <div class="row">
                    <div class="col-md-1">{{ $project->id }}</div>
                    <div class="col-md-3">{{ $project->name }}</div>
                    <div class="col-md-3">POC: {{ $project->pocname }}<br>CCO: {{ $project->cconame }}<br>Due Date: {{ $project->duedate }}</div>
                    <div class="col-md-5" style="display:flex;">
                        <div class="col-md-4"><a href="{{ route('projects.show', $project->id) }}"><button type="button" class="btn btn-primary btn-sm">View</button></a></div>
                        <div class="col-md-4"><a href="{{ route('projects.show', $project->id) }}"><button type="button" class="btn btn-success btn-sm">Edit</button></a></div>
                        <div class="col-md-4"><a href="{{ route('projects.show', $project->id) }}"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></div>
                    </div>
                </div>
                <hr>   
                @endforeach                
                                            
            </div>            
        </div>        
    </div>
</div> -->
@endsection
