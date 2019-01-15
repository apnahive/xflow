@extends('layouts.app')


@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
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
                         aria-selected="true"><i class="fab fa-product-hunt"></i>Details</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-tasks"></i>Shortlisted</a>
                        <a class="nav-item nav-link {{ old('tab') == 'custom-nav-xflow' ? 'active' : '' }}" id="custom-nav-xflow-tab" data-toggle="tab" href="#custom-nav-xflow" role="tab" aria-controls="custom-nav-xflow"
                         aria-selected="false"><i class="fas fa-cogs"></i>Interviews</a>
                        <a class="nav-item nav-link {{ old('tab') == 'custom-nav-notes' ? 'active' : '' }}" id="custom-nav-notes-tab" data-toggle="tab" href="#custom-nav-notes" role="tab" aria-controls="custom-nav-notes"
                         aria-selected="false"><i class="far fa-file"></i>Notes</a>
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-project" role="tabpanel" aria-labelledby="custom-nav-project-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Title</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label">{{ $job['title'] }}</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label"><b>Description</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="description" class=" form-control-label">{{ $job->description }}</label>
                                </div>
                            </div>                    
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="poc" class=" form-control-label"><b>Experience Level</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="poc" class=" form-control-label">
                                        @if($job['experience_level'] == 1)
                                            Entry Level
                                        @elseif($job['experience_level'] == 2)
                                            Intermediate Level
                                        @elseif($job['experience_level'] == 3)
                                            Expert Level 
                                        @else
                                            Not Selected
                                        @endif
                                    </label>
                                </div>
                            </div>                    
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="cco" class=" form-control-label"><b>CCO</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="cco" class=" form-control-label">
                                        @if($job['experience_years'] == 1)
                                            0 Years
                                        @elseif($job['experience_years'] == 2)
                                            1 Years
                                        @elseif($job['experience_years'] == 3)
                                            2 Years
                                        @elseif($job['experience_years'] == 4)
                                            3 Years
                                        @elseif($job['experience_years'] == 5)
                                            4 Years
                                        @elseif($job['experience_years'] == 6)
                                            5 Years
                                        @elseif($job['experience_years'] == 7)
                                            6 Years
                                        @elseif($job['experience_years'] == 8)
                                            7 Years
                                        @elseif($job['experience_years'] == 9)
                                            8 Years
                                        @elseif($job['experience_years'] == 10)
                                            9 Years
                                        @elseif($job['experience_years'] == 11)
                                            10 Years
                                        @else
                                            Not Selected
                                        @endif
                                    </label>
                                </div>
                            </div>                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>State</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        {{ $job->state }}
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>City</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        {{ $job->city }}
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Qualification And Education</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        @if($job['qualification'] == 1)
                                            Graduate
                                        @elseif($job['qualification'] == 2)
                                            Post Graduate
                                        @elseif($job['qualification'] == 3)
                                            PHD
                                        @elseif($job['qualification'] == 4)
                                            No College Degree
                                        @elseif($job['qualification'] == 5)
                                            Diploma
                                        @else
                                            Not Selected
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Certificate</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        @if($job['certificate'] == 1)
                                            Engineering
                                        @elseif($job['certificate'] == 2)
                                            Architecture
                                        @elseif($job['certificate'] == 3)
                                            Science
                                        @elseif($job['certificate'] == 4)
                                            Computer
                                        @elseif($job['certificate'] == 5)
                                            Business
                                        @elseif($job['certificate'] == 6)
                                            Design
                                        @elseif($job['certificate'] == 7)
                                            Construction
                                        @elseif($job['certificate'] == 8)
                                            Political
                                        @elseif($job['certificate'] == 9)
                                            Math
                                        @elseif($job['certificate'] == 10)
                                            Technical
                                        @else
                                            Not Selected
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Start Date</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        {{ $job['start_date'] }}
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Skills</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        {{ $job['skills'] }}
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="duedate" class=" form-control-label"><b>Salary Offered</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="duedate" class=" form-control-label">
                                        {{ $job['salary_offered'] }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="row" style="margin: 25px 0;">
                        <a href="{{ route('shortlisted.shortlist', $job->id) }}"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            Shortlist</button></a>
                        </div>    
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Skills</th>
                                        <th>Qualification</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($shortlisted as $shortkey => $short)
                                    <tr>
                                        <td>{{ $short->name }}</td>
                                        <td>{{ $short->title }}</td>
                                        <td>{{ $short->skills }}</td>
                                        <td>
                                            @if($short['qualification'] == 1)
                                                Graduate
                                            @elseif($short['qualification'] == 2)
                                                Post Graduate
                                            @elseif($short['qualification'] == 3)
                                                PHD
                                            @elseif($short['qualification'] == 4)
                                                No College Degree
                                            @elseif($short['qualification'] == 5)
                                                Diploma
                                            @else
                                                Not Selected
                                            @endif
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                            <a href="{{ route('profiles.show', $short->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button></a>
                                            
                                            <!-- <a href="{{ route('jobs.edit', $short->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Invite">
                                                <i class="fas fa-user-plus"></i>
                                                <!-- <i class="zmdi zmdi-edit"></i> 
                                            </button></a> -->

                                            <button class="item" data-toggle="modal" data-target="#interview{{$short->id}}" data-backdrop="false" title="Invite">
                                                <i class="fas fa-user-plus"></i>
                                            </button>

                                            <form action="{{ route('interviewed.update', $short->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="job_id" value="{{ $job['id'] }}">
                                            
                                            <div class="modal fade" id="interview{{$short->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$short->id}}" aria-hidden="true">
                                              <div class="modal-dialog" role="document" style="max-width: 1024px;">
                                                <div class="modal-content" style="text-align: left;">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Interview {{ $short->name }} {{ $short->lastname }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="date1" class=" form-control-label"> Date 1</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="date1" type="date" class="form-control" name="date1" value="{{ old('date1') }}" required autofocus>
                                                            @if ($errors->has('date1'))
                                                                <span class="help-block error">
                                                                    <strong>{{ $errors->first('date1') }}</strong>
                                                                </span>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="time1" class=" form-control-label"> Time 1</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="time1" type="time" class="form-control" name="time1" value="{{ old('time1') }}" required autofocus>
                                                            @if ($errors->has('time1'))
                                                                <span class="help-block error">
                                                                    <strong>{{ $errors->first('time1') }}</strong>
                                                                </span>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="date2" class=" form-control-label"> Date 2</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="date2" type="date" class="form-control" name="date2" value="{{ old('date2') }}" required autofocus>
                                                            @if ($errors->has('date2'))
                                                                <span class="help-block error">
                                                                    <strong>{{ $errors->first('date2') }}</strong>
                                                                </span>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="time2" class=" form-control-label"> Time 2</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="time2" type="time" class="form-control" name="time2" value="{{ old('time2') }}" required autofocus>
                                                            @if ($errors->has('time2'))
                                                                <span class="help-block error">
                                                                    <strong>{{ $errors->first('time2') }}</strong>
                                                                </span>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="date3" class=" form-control-label"> Date 3</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="date3" type="date" class="form-control" name="date3" value="{{ old('date3') }}" required autofocus>
                                                            @if ($errors->has('date3'))
                                                                <span class="help-block error">
                                                                    <strong>{{ $errors->first('date3') }}</strong>
                                                                </span>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="time3" class=" form-control-label"> Time 3</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input id="time3" type="time" class="form-control" name="time3" value="{{ old('time3') }}" required autofocus>
                                                            @if ($errors->has('time3'))
                                                                <span class="help-block error">
                                                                    <strong>{{ $errors->first('time3') }}</strong>
                                                                </span>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="state" class=" form-control-label">State</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="state" id="state" class="form-control chosen"  required>
                                                                <option value="0">Please select</option>
                                                                @foreach ($states as $state) 
                                                                    <option value="{{$state->state}}">{{$state->state}}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('state'))
                                                                <span class="help-block error">
                                                                    <strong>{{ $errors->first('state') }}</strong>
                                                                </span>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="city" class=" form-control-label">City</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="city" id="city" class="form-control chosen"  required>
                                                                <option value="0">Please select</option>
                                                                @foreach ($cities as $city) 
                                                                    <option value="{{$city->city}}">{{$city->city}}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('city'))
                                                                <span class="help-block error">
                                                                    <strong>{{ $errors->first('city') }}</strong>
                                                                </span>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div> 
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="address" class=" form-control-label"> Address</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea name="address" id="address" rows="3" placeholder="Please put address here..." class="form-control" required></textarea>
                                                        </div>
                                                    </div>
                                                    </div>    
                                                    </div>                                                   
                                                    
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary" >Schedule Interview</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            </form>

                                            
                                            <!-- <button class="item" data-toggle="modal" data-target="#confirm{{$short->id}}" data-backdrop="false">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button> -->

                                            

                                            <form action="{{ route('jobs.destroy', $short->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            
                                            <div class="modal fade" id="confirm{{$short->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$short->id}}" aria-hidden="true">
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
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-xflow" role="tabpanel" aria-labelledby="custom-nav-xflow-tab">
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
                                        <th>Name</th> 
                                        <th>Expert level</th>
                                        <th>Skills</th>
                                        <th>Salary Expected</th>
                                        <!-- <th>status</th>
                                        <th>price</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($interviews as $key => $value)
                                    
                                    <tr class="tr-shadow">
                                        <!-- <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td> -->
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->experience }}</td>                        
                                        <td>{{ $value->skills }}</td>                        
                                        <td>{{ $value->salary_expected }}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{ route('profiles.show', $value->candidate_id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                </button></a>
                                                
                                                
                                                                                



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
                    <div class="tab-pane fade" id="custom-nav-notes" role="tabpanel" aria-labelledby="custom-nav-notes-tab">
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection