@extends('layouts.app')


@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            {{ $job->title }} Shorlisted candidates
        </div>
        <div class="card-body" style="margin-bottom: 100px;">

            <div class="row" style="margin: 25px 0;">
                <a href="#"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
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
                    <div class="row" style="margin: 25px 0;">
                        <a href="{{ route('shortlisted.show', $job->id.'-all') }}"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            View More</button></a>
                    </div>
                </div>



















            
        </div>
    </div>
</div>


@endsection