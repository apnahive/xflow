@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="col-lg-12">
    <div class="card" style="margin-bottom: 100px;">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->
        <div class="card-body">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="custom-nav-details-tab" data-toggle="tab" href="#custom-nav-details" role="tab" aria-controls="custom-nav-details"
                         aria-selected="true"><i class="fas fa-info-circle"></i> Details</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fab fa-product-hunt"></i>Projects</a>                        
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-details" role="tabpanel" aria-labelledby="custom-nav-details-tab">
                            <div class="card-body card-block">                    
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="title" class=" form-control-label">Title</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label">{{ $xflow['title'] }}</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="description" class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label">{{ $xflow['description'] }}</label>
                                        
                                    </div>
                                </div> 
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="assign" class=" form-control-label">Assign User</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label">{{ $user->name }} {{ $user->lastname }}</label>
                                        
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="assignteam" class=" form-control-label">Assign Team</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label">{{ $team->name }}</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="startdate" class=" form-control-label">Start Date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label">{{ $xflow['startdate'] }}</label>
                                        
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="duedate" class=" form-control-label">Due Date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label for="title" class=" form-control-label">{{ $xflow['duedate'] }}</label>
                                        
                                    </div>
                                </div>
                                
                                
                        </div>                 
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                       <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th> -->
                                        <th>User</th>
                                        <th>POC</th>
                                        <th>CCO</th>
                                        <!-- <th>Assigned To</th> -->
                                        <!-- <th>status</th>
                                        <th>price</th> -->
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($users) > 0)
                                    @foreach ($users as $key => $value)
                                    <tr class="tr-shadow">
                                        <!-- <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td> -->
                                        <td>{{ $value->name }} {{ $value->lastname }}</td>
                                        <td>
                                            @foreach ($value->pocs as $pockey => $poc)
                                            <a href="{{ route('projects.show', $poc->id) }}">{{ $poc->name }}</a><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($value->ccos as $ccokey => $cco)
                                            <a href="{{ route('projects.show', $cco->id) }}">{{ $cco->name }}</a><br>
                                            @endforeach
                                        </td>

                                    </tr>
                                    <tr class="spacer"></tr>
                                    @endforeach
                                    @else
                                        <tr style="text-align: center;"><td colspan="5">No Users</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>



<!-- <a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Details</strong> Xflow
            </div>
            
        </div>        
    </div>
</div> -->

@endsection