@extends('layouts.app')


@section('content')

<a href="{{ route('projects.index') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>

<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Client
            </div>            
            <form action="{{ route('jobs.update', $job['id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Job Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Job Title" class="form-control" value="{{ old('title', $job['title']) }}" required>
                            @if ($errors->has('title'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="3" placeholder="Description..." class="form-control" required>{!! $job->description !!}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="experience_level" class=" form-control-label">Experience Level</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="experience_level" id="experience_level" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1" {{ $job['experience_level'] == '1' ? 'selected' : '' }}>Entry Level</option>
                                <option value="2" {{ $job['experience_level'] == '2' ? 'selected' : '' }}>Inermediate Level</option>
                                <option value="3" {{ $job['experience_level'] == '3' ? 'selected' : '' }}>Expert Level</option>
                                
                            </select>                            
                            @if ($errors->has('experience_level'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('experience_level') }}</strong>
                                </span>
                            @endif
                        </div>
                         
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="experience_years" class=" form-control-label">Experience in Years</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="experience_years" id="experience_years" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1" {{ $job['experience_years'] == '1' ? 'selected' : '' }}>0 Years</option>
                                <option value="2" {{ $job['experience_years'] == '2' ? 'selected' : '' }}>1 Years</option>
                                <option value="3" {{ $job['experience_years'] == '3' ? 'selected' : '' }}>2 Years</option>
                                <option value="4" {{ $job['experience_years'] == '4' ? 'selected' : '' }}>3 Years</option>
                                <option value="5" {{ $job['experience_years'] == '5' ? 'selected' : '' }}>4 Years</option>
                                <option value="6" {{ $job['experience_years'] == '6' ? 'selected' : '' }}>5 Years</option>
                                <option value="7" {{ $job['experience_years'] == '7' ? 'selected' : '' }}>6 Years</option>
                                <option value="8" {{ $job['experience_years'] == '8' ? 'selected' : '' }}>7 Years</option>
                                <option value="9" {{ $job['experience_years'] == '9' ? 'selected' : '' }}>8 Years</option>
                                <option value="10" {{ $job['experience_years'] == '10' ? 'selected' : '' }}>9 Years</option>
                                <option value="11" {{ $job['experience_years'] == '11' ? 'selected' : '' }}>10+ Years</option>

                            </select>                            
                            @if ($errors->has('experience_years'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('experience_years') }}</strong>
                                </span>
                            @endif
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state" id="state" class="form-control chosen">
                                <option value="0">Please select</option>
                                @foreach ($states as $state) 
                                    <option value="{{$state->state}}" {{ $job['state'] == $state->state ? 'selected' : '' }}>{{$state->state}}
                                @endforeach
                            </select>
                            @if ($errors->has('state'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city" id="city" class="form-control chosen">
                                <option value="0">Please select</option>
                                @foreach ($cities as $city) 
                                    <option value="{{$city->city}}" {{ $job['city'] == $city->city ? 'selected' : '' }}>{{$city->city}}
                                @endforeach
                            </select>
                            @if ($errors->has('city'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <script type="text/javascript">
                          $(".chosen").chosen();
                    </script>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="qualification" class=" form-control-label">Qualification And Education</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="qualification" id="qualification" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1" {{ $job['qualification'] == '1' ? 'selected' : '' }}>Graduate</option>
                                <option value="2" {{ $job['qualification'] == '2' ? 'selected' : '' }}>Post Graduate</option>
                                <option value="3" {{ $job['qualification'] == '3' ? 'selected' : '' }}>PHD</option>
                                <option value="4" {{ $job['qualification'] == '4' ? 'selected' : '' }}>No College Degree</option>
                                <option value="5" {{ $job['qualification'] == '5' ? 'selected' : '' }}>Diploma</option>
                                
                            </select>                            
                            @if ($errors->has('experience_level'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('experience_level') }}</strong>
                                </span>
                            @endif
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="certificate" class=" form-control-label">Certificate</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="certificate" id="certificate" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1" {{ $job['certificate'] == '1' ? 'selected' : '' }}>Engineering</option>
                                <option value="2" {{ $job['certificate'] == '2' ? 'selected' : '' }}>Architecture</option>
                                <option value="3" {{ $job['certificate'] == '3' ? 'selected' : '' }}>Science</option>
                                <option value="4" {{ $job['certificate'] == '4' ? 'selected' : '' }}>Computer</option>
                                <option value="5" {{ $job['certificate'] == '5' ? 'selected' : '' }}>Business</option>
                                <option value="6" {{ $job['certificate'] == '6' ? 'selected' : '' }}>Design</option>
                                <option value="7" {{ $job['certificate'] == '7' ? 'selected' : '' }}>Construction</option>
                                <option value="8" {{ $job['certificate'] == '8' ? 'selected' : '' }}>Political</option>
                                <option value="9" {{ $job['certificate'] == '9' ? 'selected' : '' }}>Math</option>
                                <option value="10" {{ $job['certificate'] == '10' ? 'selected' : '' }}>Technical</option>
                                
                            </select>                            
                            @if ($errors->has('certificate'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('certificate') }}</strong>
                                </span>
                            @endif
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="start_date" class=" form-control-label">Start Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date', $job['start_date']) }}" required autofocus>
                            @if ($errors->has('start_date'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <!-- <style type="text/css">
                        #tags{
                          float:left;
                          border:1px solid #ccc;
                          padding:4px;
                          font-family:Arial;
                        }
                        #tags span.tag{
                          cursor:pointer;
                          display:block;
                          float:left;
                          color:#555;
                          background:#add;
                          padding:5px 10px;
                          padding-right:30px;
                          margin:4px;
                        }
                        #tags span.tag:hover{
                          opacity:0.7;
                        }
                        #tags span.tag:after{
                         position:absolute;
                         content:"×";
                         border:1px solid;
                         border-radius:10px;
                         padding:0 4px;
                         margin:3px 0 10px 7px;
                         font-size:10px;
                        }
                        #tags input{
                          background:#eee;
                          border:0;
                          margin:4px;
                          padding:7px;
                          width:auto;
                        }
                    </style> -->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="skills" class=" form-control-label">Skills</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div id="tags">
                            <input type="text" id="skills" name="skills" placeholder="Skills" value="{{ old('skills', $job['skills']) }}" class="form-control" required>
                            </div>
                            @if ($errors->has('skills'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('skills') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="salary_offered" class=" form-control-label">Salary Offered</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="salary_offered" name="salary_offered" value="{{ old('salary_offered', $job['salary_offered']) }}" placeholder="Salary Offered" class="form-control" required>
                            @if ($errors->has('salary_offered'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('salary_offered') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    
            </div>            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Update
                </button>                
            </div>
            </form>
        </div>        
    </div>
</div>

@endsection