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
                         @role('x-flow')
                        <a class="nav-item nav-link" id="custom-nav-project-tab" data-toggle="tab" href="#custom-nav-project" role="tab" aria-controls="custom-nav-project"
                         aria-selected="true"><i class="fab fa-product-hunt"></i>Project</a>
                        <a class="nav-item nav-link" id="custom-nav-files-tab" data-toggle="tab" href="#custom-nav-files" role="tab" aria-controls="custom-nav-files"
                         aria-selected="false"><i class="fas fa-copy"></i>Files</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-check-square"></i>Status</a>
                         @endrole
                         @role('Recuriter')
                         <a class="nav-item nav-link" id="custom-nav-job-tab" data-toggle="tab" href="#custom-nav-job" role="tab" aria-controls="custom-nav-job"
                         aria-selected="true"><i class="fa fa-briefcase"></i>Jobs</a>
                         @endrole
                         
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-users" role="tabpanel" aria-labelledby="custom-nav-users-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label"><b>Name</b></label>
                                    </div>
                                    <div class="col-md-9">
                                        <label class=" form-control-label">{{ $user1->name }} {{ $user1->lastname }}</label>
                                    </div>
                                </div>
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label"><b>Email</b></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label class=" form-control-label">{{ $user1->email }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label"><b>User Type</b></label>
                                    </div>
                                    <div class="col-md-9">
                                        <label class=" form-control-label">{{ $user1->user_type }}</label>
                                    </div>
                                </div>
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label"><b>Date of Birth</b></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label class=" form-control-label">{{ $user1->dateofbirth }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label"><b>Company</b></label>
                                    </div>
                                    <div class="col-md-9">
                                        <label class=" form-control-label">
                                            
                                            @if($details)
                                            {
                                                @if($details->company_name) 
                                                {{ $details->company_name }}
                                                @else
                                                {{ $user1->company }}
                                                @endif
                                            }                                            
                                            @else
                                            {{ $user1->company }}
                                            @endif
                                        </label>
                                    </div>
                                </div>
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label"><b>Orgnization</b></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <label class=" form-control-label">{{ $user1->organization }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="row col-lg-6">
                                    <div class="col col-md-3">
                                        <label class="form-control-label"><b>Phone Number</b></label>
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
                    </div>
                    @role('x-flow')
                    <div class="tab-pane fade" id="custom-nav-project" role="tabpanel" aria-labelledby="custom-nav-project-tab">
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>                        
                                        <th>Project Name</th>
                                        <th>Consultant</th>
                                        <th>CCO</th>
                                        <th>Contract Date</th>
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
                                        <a href="{{ route('profile.show', $value['id']) }}" target="_blank">Download {{ $value->project }} Signed Document</a><br>
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
                    @endrole
                    @role('Recuriter')
                    <div class="tab-pane fade" id="custom-nav-job" role="tabpanel" aria-labelledby="custom-nav-task-job">
                        <div class="table-responsive table-responsive-data2" style="margin-bottom: 100px;">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <!-- <th>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </th> -->
                                    <th><a href="{{ route('jobs.sort', ['title', 'asc']) }}"><i class="fas fa-sort-alpha-down"></i></a> Title <a href="{{ route('jobs.sort', ['title', 'desc']) }}"><i class="fas fa-sort-alpha-up"></i></a></th> 
                                    <th>Experience level</th>
                                    <th>Skills</th>
                                    <th>Status</th>
                                    <!-- <th>status</th>
                                    <th>price</th> -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $jobkey => $job)
                                
                                <tr class="tr-shadow">
                                    <!-- <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td> -->
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->experience }}</td>                        
                                    <td>{{ $job->skills }}</td>                        
                                    <td>
                                        @if($job->status == 0)
                                            Pending Award
                                        @else
                                            Awarded
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-data-feature">

                                            @if($job->status == 1)
                                            <span></span>
                                            @else
                                            <!-- <button class="item" data-toggle="modal" data-target="#status{{$job->id}}" data-backdrop="false">
                                                <i class="fas fa-location-arrow" data-toggle="tooltip" data-placement="top" title="Change Status"></i>
                                            </button> -->
                                            @endif
                                            
                                            



                                            <a href="{{ route('jobs.show', $job->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button></a>
                                            
                                            <a href="{{ route('jobs.edit', $job->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button></a>
                                            
                                            <!-- <button class="item" data-toggle="modal" data-target="#confirm{{$job->id}}" data-backdrop="false">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button> -->

                                            

                                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            
                                            <div class="modal fade" id="confirm{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$job->id}}" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content" style="text-align: left;">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Job</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    You are going to delete Job. All the associated records will be deleted. You won't be able to revert these changes!
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Job</button>
                                                    <button type="submit" class="btn btn-primary" >Yes! Delete it</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            </form>
                                            



                                            <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                
                                @endforeach

                            </tbody>
                        </table>
                        
                    </div>
                    </div>
                    @endrole        
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
