@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="col-lg-12" style="margin-bottom: 100px;">
    <div class="card">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->
        <div class="card-body">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="custom-nav-users-tab" data-toggle="tab" href="#custom-nav-users" role="tab" aria-controls="custom-nav-users"
                         aria-selected="false"><i class="fas fa-users"></i>Users</a>
                        <a class="nav-item nav-link" id="custom-nav-project-tab" data-toggle="tab" href="#custom-nav-project" role="tab" aria-controls="custom-nav-project"
                         aria-selected="true"><i class="fab fa-product-hunt"></i>Project</a>
                        <a class="nav-item nav-link" id="custom-nav-files-tab" data-toggle="tab" href="#custom-nav-files" role="tab" aria-controls="custom-nav-files"
                         aria-selected="false"><i class="fas fa-copy"></i>Files</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-check-square"></i>Status</a>
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-users" role="tabpanel" aria-labelledby="custom-nav-users-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label">Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <label class=" form-control-label">{{ $user1->name }} {{ $user1->lastname }}</label>
                                    </div>
                                </div>
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label class=" form-control-label">{{ $user1->email }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label">User Type</label>
                                    </div>
                                    <div class="col-md-9">
                                        <label class=" form-control-label">{{ $user1->user_type }}</label>
                                    </div>
                                </div>
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label">Date of Birth</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label class=" form-control-label">{{ $user1->dateofbirth }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label">Company</label>
                                    </div>
                                    <div class="col-md-9">
                                        <label class=" form-control-label">{{ $user1->company }}</label>
                                    </div>
                                </div>
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label">Orgnization</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label class=" form-control-label">{{ $user1->organization }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label">Phone Number</label>
                                    </div>
                                    <div class="col-md-9">
                                        <label class=" form-control-label">{{ $user1->phonenumber }}</label>
                                    </div>
                                </div>
                                <!-- <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label"><b>Status</b></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label class=" form-control-label">{{ $user1->email }}</label>
                                    </div>
                                </div> -->
                            </div>

                            
                        </div>
                        @if($user1->verification_token)
                        <div class="card-footer"> 
                            <a href="{{ route('users.approve', $user1->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;color:white;">Approve</a>
                            <a href="{{ route('users.reject', $user1->id) }}" class="btn btn-danger pull-left" style="margin-right: 3px;color:white;">Reject</a>                       
                        </div>
                        @endif
                    </div>

                    <div class="tab-pane fade" id="custom-nav-project" role="tabpanel" aria-labelledby="custom-nav-project-tab">
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>                        
                                        <th>Project Name</th>
                                        <th>POC</th>
                                        <th>CCO</th>
                                        <th>Due Date</th>
                                        <!-- <th>status</th>
                                        <th>price</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project_users as $project_userkey => $user1)                    
                                    <tr class="tr-shadow">
                                        <!-- <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td> -->
                                        <td>{{ $user1->name }}</td>
                                        <td>{{ $user1->pocname }}</td>                        
                                        <td>{{ $user1->cconame }}</td>                        
                                        <td>{{ $user1->duedate }}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{ route('projects.show', $user1->project_id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button></a>                                                
                                            </div>
                                        </td>
                                    </tr>                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                        
                    </div>
                    
                    <div class="tab-pane fade" id="custom-nav-files" role="tabpanel" aria-labelledby="custom-nav-files-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                
                                <div class="col col-md-3">
                                    <label class="form-control-label">Signed Files</label>
                                </div>
                                <div class="col-md-9">
                                    <label class=" form-control-label">
                                        @foreach ($signed as $key => $value)
                                        <a href="{{ route('profile.show', $value['id']) }}" target="_blank">Download {{ $value->project }} Signed Document</a>
                                        @endforeach
                                    </label>
                                </div>
                                
                                
                            </div>
                        </div> 

                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                
                                <div class="col col-md-3">
                                    <label class="form-control-label">Form Signed</label>
                                </div>
                                <div class="col-md-9">
                                    <label style="width: 50%;">
                                        @if(count($status) > 0)
                                        @foreach ($status as $key => $value)
                                            @if($value->status)
                                                <div class="alert alert-success col-md-12" role="alert">
                                                    {{ $value->name }}
                                                </div>
                                            @else
                                                <div class="alert alert-secondary col-md-12" role="alert">
                                                    {{ $value->name }}
                                                </div>                                            
                                            @endif
                                        @endforeach
                                        @endif
                                    </label>
                                </div>
                                
                                
                            </div>
                        </div> 
                        
                        
                    </div>                    
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
