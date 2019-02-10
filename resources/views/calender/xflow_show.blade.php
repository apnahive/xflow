@extends('layouts.app')

@section('content')

<!-- <a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a> -->

<div class="row" style="margin-bottom: 100px;">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Xflow</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Back</button></a>
            </div>
            <div class="table-data__tool-right">
               <a href="{{ route('xflow.calender') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="fas fa-calendar-alt"></i></button></a>                
                <a href="{{ route('xflows.create') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Create New Xflow</button></a>
            </div>
        </div> 
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>                    
                    <tr>
                        <!-- <th>
                            <label class="au-checkbox">
                                <input type="checkbox" id="checkAll" disabled="disabled">
                                <span class="au-checkmark"></span>
                            </label>
                        </th> -->
                        <th>Title</th>
                        <th>Assigned To</th>
                        <th>Team</th>
                        <th>Status</th>
                        <th>Timeline</th>
                        <th>Progress</th>
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($xflows as $key => $value)
                    <tr class="tr-shadow">
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->assignto }}</td>
                        <td>{{ $value->team }}</td>
                        <td>{{ $value->statuss }}</td>
                        <td>{{ $value->remaining }}</td>
                        <td>
                            <div class="progress" style="margin-bottom: 0;">
                              @if($value->status == 0)  
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0"
                              aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                <span>0%</span>
                              </div>
                              @elseif($value->status == 1)
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25"
                              aria-valuemin="0" aria-valuemax="100" style="width:25%">
                                <span>25%</span>
                              </div>
                              @elseif($value->status == 2)
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50"
                              aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                <span>50%</span>
                              </div>
                              @elseif($value->status == 3)
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75"
                              aria-valuemin="0" aria-valuemax="100" style="width:75%">
                                <span>75%</span>
                              </div>
                              @elseif($value->status == 4)
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
                              aria-valuemin="0" aria-valuemax="100" style="width:100%;background-color: green;">
                                <span>100%</span>
                              </div>
                              @endif
                            </div>
                        </td>
                        <!-- <td></td> -->
                        <td>
                            <div class="table-data-feature">

                                <!-- <a href="{{ route('xflows.status', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Change Status">
                                    <i class="fas fa-location-arrow"></i>
                                </button></a> -->
                                @if($value->status == 4)
                                <span></span>
                                @else
                                <button class="item" data-toggle="modal" data-target="#status{{$value->id}}" data-backdrop="false">
                                    <i class="fas fa-location-arrow"></i>
                                </button>
                                @endif

                                <form id="{{$value->id}}" action="{{ route('xflows.status', $value->id) }}" method="GET" style="display: none;">
                                
                                </form>
                                <div class="modal fade" id="status{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to change status?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        For a Xflow task there are five status i.e. 
                                        pending, initiated, inwork, finishing, complete. <br>
                                        You are about to change status. The changes cannot be reverted back.
                                        current status is {{ $value->statuss }}. <br>
                                        <b>Are you sure to change status? </b>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll Change later</button>
                                        <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! change it</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>




                                <a href="{{ route('xflows.show', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                <a href="{{ route('xflows.edit', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Team</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Under Development
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Team</button>
                                        <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>



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
        <!-- END DATA TABLE -->
    </div>
</div>

@endsection
