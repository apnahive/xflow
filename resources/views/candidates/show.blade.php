@extends('layouts.app')

@section('content')
<!-- <a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a> -->



<div class="table-data__tool">
    <div class="table-data__tool-left">
        <a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
            Back</button></a>
    </div>    
</div>


<div class="col-lg-12">
    <div class="card">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->
        <div class="card-body" style="margin-bottom: 100px;">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="custom-nav-project-tab" data-toggle="tab" href="#custom-nav-project" role="tab" aria-controls="custom-nav-project"
                         aria-selected="true"><i class="fab fa-product-hunt"></i>Candidate Profile</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-tasks"></i>Professional Details</a>
                        <!-- <a class="nav-item nav-link {{ old('tab') == 'custom-nav-xflow' ? 'active' : '' }}" id="custom-nav-xflow-tab" data-toggle="tab" href="#custom-nav-xflow" role="tab" aria-controls="custom-nav-xflow"
                         aria-selected="false"><i class="fas fa-cogs"></i>Experience Details</a> -->
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-project" role="tabpanel" aria-labelledby="custom-nav-project-tab">
                        <div class="card-body card-block">
                            <div class="row" style="margin: 0 0;">
                                @can('can apply job')
                                <a href="{{ route('candidate_detail.edit', $profile['id']) }}"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    Edit</button></a>
                                @endcan
                                </div>
                                <h3 class="title-5 m-b-35">Personal Details</h3>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">                            
                                            {{ $user->name }} {{ $user->lastname }}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">                            
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">Phone</label>
                                        </div>
                                        <div class="col-12 col-md-9">                            
                                            {{ $user->phonenumber }}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">Address</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            @if($details)
                                            {{ $details->address }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">Zipcode</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            @if($details)
                                            {{ $details->zip }}
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">State</label>
                                        </div>
                                        <div class="col-12 col-md-9">                            
                                            {{ $profile->state }}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">City</label>
                                        </div>
                                        <div class="col-12 col-md-9">                            
                                            {{ $profile->city }}
                                        </div>
                                    </div>
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="row" style="margin: 0 0;">
                        @can('can apply job')
                        <a href="{{ route('profiles.edit', $profile['id']) }}"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            Edit</button></a>
                        @endcan
                        </div>
                        <h3 class="title-5 m-b-35">Professional Details</h3>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Profile Title</label>
                                </div>
                                <div class="col-12 col-md-9">                            
                                    {{ $profile['title'] }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="employer" class=" form-control-label">Current Employer</label>
                                </div>
                                <div class="col-12 col-md-9">                            
                                    {{ $profile['employer'] }}
                                </div>
                            </div>                    
                            <!-- <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="experience_level" class=" form-control-label">Experience Level</label>
                                </div>
                                <div class="col-12 col-md-9">                            
                                    @if($profile['experience_level'] == 1)
                                        Entry Level
                                    @elseif($profile['experience_level'] == 2)
                                        Intermediate Level
                                    @elseif($profile['experience_level'] == 3)
                                        Expert Level 
                                    @else
                                        Not Selected
                                    @endif
                                </div>
                                 
                            </div> -->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="experience_years" class=" form-control-label">Experience in Years</label>
                                </div>
                                <div class="col-12 col-md-9">                            
                                    @if($profile['experience_years'] == 1)
                                        0-2 Years
                                    @elseif($profile['experience_years'] == 2)
                                        2-5 Years
                                    @elseif($profile['experience_years'] == 5)
                                        5+ Years
                                    <!-- @elseif($profile['experience_years'] == 4)
                                        3 Years
                                    @elseif($profile['experience_years'] == 5)
                                        4 Years
                                    @elseif($profile['experience_years'] == 6)
                                        5 Years
                                    @elseif($profile['experience_years'] == 7)
                                        6 Years
                                    @elseif($profile['experience_years'] == 8)
                                        7 Years
                                    @elseif($profile['experience_years'] == 9)
                                        8 Years
                                    @elseif($profile['experience_years'] == 10)
                                        9 Years
                                    @elseif($profile['experience_years'] == 11)
                                        10 Years -->
                                    @else
                                        Not Selected
                                    @endif
                                </div>
                                 
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="active" class=" form-control-label">Are you Active?</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    @if($profile['active'] == 1)
                                        Yes
                                    @elseif($profile['active'] == 2)
                                        No
                                    @else
                                        Not Selected
                                    @endif                            
                                </div>
                                 
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="state" class=" form-control-label">Current State</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    {{ $profile->state }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="city" class=" form-control-label">Current City</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    {{ $profile->city }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="relocation" class=" form-control-label">City ready to re-location</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    @if($profile['relocation'] === "1")
                                    Yes
                                    @else
                                    No
                                    @endif
                                    <!-- <input id="checkbox1" type="radio" name="relocation" value="1" {{ $profile['relocation'] === "1" ? 'checked' : ''}}>
                                    <label for="checkbox1" style="padding-right: 50px;">
                                        Yes
                                    </label>
                                    <input id="checkbox2" type="radio" name="relocation" value="2" {{ $profile['relocation'] === "2" ? 'checked' : ''}}>
                                    <label for="checkbox2">
                                        No
                                    </label> -->
                                    @if ($errors->has('relocation'))
                                        <span class="help-block error">
                                            <strong>{{ $errors->first('relocation') }}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <!-- <h5>City ready to re-location:</h5>
                            <hr>
                            <div class="col-md-12">
                            <h6><b>Option 1</b></h6>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="state1" class=" form-control-label">State/City</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    {{ $profile->state1 }}, {{ $profile->city1 }}
                                </div>
                            </div>                    
                            </div>
                            <div class="col-md-12">
                            <h6><b>Option 2</b></h6>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="state2" class=" form-control-label">State/City</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    {{ $profile->state2 }}, {{ $profile->city2 }}
                                </div>
                            </div>                    
                            </div>
                            <div class="col-md-12">
                            <h6><b>Option 3</b></h6>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="state3" class=" form-control-label">State/City</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    {{ $profile->state3 }}, {{ $profile->city3 }}
                                </div>
                            </div>                    
                            </div>
                            <div class="col-md-12">
                            <h6><b>Option 4</b></h6>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="state4" class=" form-control-label">State/City</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    {{ $profile->state4 }}, {{ $profile->city4 }}
                                </div>
                            </div>                    
                            </div>
                            
                            <hr> -->

                            

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="qualification" class=" form-control-label">Education</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    @if($profile['qualification'] == 1)
                                        Graduate
                                    @elseif($profile['qualification'] == 2)
                                        Post Graduate
                                    @elseif($profile['qualification'] == 3)
                                        PHD
                                    @elseif($profile['qualification'] == 4)
                                        No College Degree
                                    @elseif($profile['qualification'] == 5)
                                        Diploma
                                    @else
                                        Not Selected
                                    @endif
                                </div>
                                 
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="certificate" class=" form-control-label">Field</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    @if($profile['certificate'] == 1)
                                        Engineering
                                    @elseif($profile['certificate'] == 2)
                                        Architecture
                                    @elseif($profile['certificate'] == 3)
                                        Science
                                    @elseif($profile['certificate'] == 4)
                                        Computer
                                    @elseif($profile['certificate'] == 5)
                                        Business
                                    @elseif($profile['certificate'] == 6)
                                        Design
                                    @elseif($profile['certificate'] == 7)
                                        Construction
                                    @elseif($profile['certificate'] == 8)
                                        Political
                                    @elseif($profile['certificate'] == 9)
                                        Math
                                    @elseif($profile['certificate'] == 10)
                                        Technical
                                    @else
                                        Not Selected
                                    @endif
                                </div>
                                 
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="skills" class=" form-control-label">Skills</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    {{ $profile['skills'] }}
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="salary_expected" class=" form-control-label">Salary Expected</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    {{ $profile['salary_expected'] }}
                                </div>
                            </div>
                        
                        
                    </div>
                    <!-- <div class="tab-pane fade" id="custom-nav-xflow" role="tabpanel" aria-labelledby="custom-nav-xflow-tab">
                        <div class="row" style="margin: 0 0;">
                        @can('can apply job')
                        <a href="{{ route('candidate_experiences.create') }}"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            Add Experience</button></a>
                        @endcan
                        </div>
                        <h3 class="title-5 m-b-35">Experience Details</h3>
                        <div class="table-responsive table-responsive-data2" style="margin-bottom: 100px;">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Project Name</th> 
                                        <th>Working Hours</th> 
                                        <th>Expert level</th>
                                        <th>Skills</th>
                                        <th>Qualification</th> 
                                        <th>status</th>
                                        <th>price</th> 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($experiences as $key => $value)
                                    
                                    <tr class="tr-shadow">
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->hours }}</td>
                                        
                                        <td>
                                            <div class="table-data-feature">
                                                @can('can apply job')
                                                <a href="{{ route('candidate_experiences.edit', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button></a>
                                                
                                                
                                                <button class="item" data-toggle="modal" data-target="#confirm{{$value->id}}" data-backdrop="false">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>

                                                

                                                <form id="{{$value->id}}" action="" method="POST" style="display: none;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                                <div class="modal fade" id="confirm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content" style="text-align: left;">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Experience</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        Under Development
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Experience</button>
                                                        <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                @endcan
                                                
                                                
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    
                                    @endforeach

                                </tbody>
                            </table>
                            
                        </div>
                    </div> -->
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
