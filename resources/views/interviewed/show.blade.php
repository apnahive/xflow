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
                         aria-selected="true"><i class="fab fa-product-hunt"></i>Job Details</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-tasks"></i>Interviews</a>
                        <!-- <a class="nav-item nav-link {{ old('tab') == 'custom-nav-xflow' ? 'active' : '' }}" id="custom-nav-xflow-tab" data-toggle="tab" href="#custom-nav-xflow" role="tab" aria-controls="custom-nav-xflow"
                         aria-selected="false"><i class="fas fa-cogs"></i>Job Status</a> -->
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
                        <div class="card-body card-block">
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
                                            <th>Date</th> 
                                            <th>Time</th>
                                            <th>State</th>
                                            <th>City</th>
                                            
                                            <!-- <th>status</th>
                                            <th>price</th> -->
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($interviews as $interviewkey => $value)
                                        
                                        <tr class="tr-shadow">
                                            <!-- <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td> -->
                                            <td>{{ $value->date }}</td>
                                            <td>{{ $value->time }}</td>                        
                                            <td>{{ $value->state }}</td>                        
                                            <td>{{ $value->city }}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('interviewed.edit', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Accept">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </button></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        
                                        @endforeach

                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-xflow" role="tabpanel" aria-labelledby="custom-nav-xflow-tab">
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection