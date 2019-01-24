@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>

<div class="row" style="margin-bottom: 100px;">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Checklists</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="{{ route('checklists.add') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add From Template</button></a>
            </div>
            <div class="table-data__tool-right">                
                <a href="{{ route('checklists.create') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Checklists</button></a>
            </div>
        </div> 
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>                    
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox" id="checkAll" disabled="disabled">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>Checklists</th>
                        <th>Sublist</th>
                        <th>Due Date</th>
                        <!-- <th>Managed By</th>
                        <th>Assigned To</th> -->
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checklists as $checklistkey => $checklist)
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>{{ $checklist->title }}</td>
                        <td>
                            @if($checklist->sublist == 1)
                                <i class="fas fa-check" style="color: #63c76a;"></i>
                            @endif 
                        </td>
                        <td>{{ $checklist->duedate }}</td>                        
                        <!-- <td></td>                        
                        <td></td> -->
                        <td>
                            <div class="table-data-feature">                                
                                
                                <button class="item" data-toggle="modal" data-target="#assign{{$checklist->id}}" data-backdrop="false">
                                    <i class="fa fa-user"></i>
                                </button>

                                <div class="modal fade" id="assign{{$checklist->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$checklist->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <form action="{{ route('assign_checklist.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="checklist_id" value="{{ $checklist->id }}">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Assign Checklist</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="assignee" class=" form-control-label">Assignee</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="assignee" id="assignee" class="custom-select form-control chosen">
                                                    <option value="0">Please select</option>
                                                    @foreach ($users as $user) 
                                                        <option value="{{$user->id}}" {{ $checklist['assignee'] == $user->id ? 'selected' : '' }}>{{$user->name}} {{$user->lastname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-ban"></i>Cancel</button>
                                      </div>
                                    </div>
                                    </form>
                                  </div>
                                </div>



                                
                                <a href="{{ route('checklists.show', $checklist->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>                                
                                
                                <a href="{{ route('checklists.edit', $checklist->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                
                                @role('Admin')
                                <button class="item" data-toggle="modal" data-target="#confirm{{$checklist->id}}" data-backdrop="false">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                

                                <form id="{{$checklist->id}}" action="" method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <div class="modal fade" id="confirm{{$checklist->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$checklist->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Under Development
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Task</button>
                                        <a onclick="event.preventDefault(); document.getElementById( {{$checklist->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @endrole


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
