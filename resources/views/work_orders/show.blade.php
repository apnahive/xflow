@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-md-6">
<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                </div>
                <div class="col-md-6">
<a href="{{ route('work_orders.report', $work_order->id) }}" style="float: right;"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;float: right;">
                    Report</button></a>
                </div>
</div>
<div class="col-lg-12">
    <div class="card" style="margin-bottom: 100px;">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->
        <div class="card-body">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" id="custom-nav-details-tab" data-toggle="tab" href="#custom-nav-details" role="tab" aria-controls="custom-nav-details"
                         aria-selected="true"><i class="fas fa-info-circle"></i> Details</a>
                        <a class="nav-item nav-link active" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-tasks"></i>Users</a>                        
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade" id="custom-nav-details" role="tabpanel" aria-labelledby="custom-nav-details-tab">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"><b>Work Order Title</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="name" class=" form-control-label">{{ $work_order->title }}</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label"><b>Description</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label for="description" class=" form-control-label">{{ $work_order->description }}</label>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="tab-pane fade show active" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        <div class="row">
                            <div class="col-md-12">                                
                                <h3 class="title-5 m-b-35">Users</h3>
                                <!-- <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="{{ route('task_for_templates.create') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Add New Task</button></a>
                                        
                                    </div>
                                </div> -->
                                <div class="table-responsive table-responsive-data2" style="margin-bottom: 100px;">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>                                                
                                                <th>User</th>
                                                <!-- <th>Latest Entry Date</th> -->
                                                <th>Total Hours</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users_assigned as $key => $value)
                                            <tr class="tr-shadow">                                                
                                                <td>{{ $value->name }}</td>
                                                <!-- <td>N/A</td>         -->                
                                                <td>{{ $value->hours }}</td>
                                                <td>
                                                    <!-- <form method="POST" action="{!! route('work_order_hour.showhours', [$value->work_order_id, $value->user_id]) !!}" accept-charset="UTF-8">
                                                        
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="user_id" value="{{ $value->user_id }}" />
                                                    <input type="hidden" name="work_order_id" value="{{ $value->work_order_id }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Review Details"><i class="zmdi zmdi-mail-send"></i></button>
                                                    
                                                    </form> -->

                                                    <a href="{{ route('work_order_hour.showhours', [$value->work_order_id, $value->user_id]) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Review Details">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                    </button></a>
                                                    <!-- <div class="table-data-feature">
                                                         @role('Admin')
                                                        <a href="{{ route('task_for_templates.edit', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button></a>

                                                        <button class="item" data-toggle="modal" data-target="#confirm{{$value->id}}" data-backdrop="false">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>

                                                        

                                                        <form action="{{ route('task_for_templates.destroy', $value->id) }}" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        
                                                        <div class="modal fade" id="confirm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content" style="text-align: left;">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                You are going to delete task in template. Are you sure?

                                                                You won't be able to revert these changes!
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Task</button>
                                                                <button type="submit" class="btn btn-primary" >Yes! Delete it</button>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    @endrole -->
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
                        
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>


@endsection