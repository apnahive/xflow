@extends('layouts.app')


@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    

                <form action="{!! route('work_order_assign.search') !!}" method="POST" role="search" class="search-des">
                    {{ csrf_field() }}
                    <div class="search-task" style="background: #dee2e6;padding: 10px 2px 10px 2px;">
                         <input type="hidden" name="work_order_id" value="{{ $work_order_id }}">
                                    
                        <div class="col-md-4">
                             <label for="from_date" class=" form-control-label"><b>From Date</b></label>
                            <input id="from_date" type="date" class="col-md-12" name="from_date" value="{{ old('from_date') }}" placeholder="From Date" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;">
                            
                        </div>
                        <div class="col-md-4">
                           <label for="to_date" class=" form-control-label"><b>To Date</b></label>
                            <input id="to_date" type="date" class="col-md-12" name="to_date" value="{{ old('to_date') }}" placeholder="To Date" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;">
                            
                           
                        </div>
                        <div class="col-md-4">
                            <label for="to_date" class=" form-control-label"><b>Search </b></label>
                                <button type="submit" class="btn btn-md btn-info" style="width: 100%;color: white;background-color: #4272d7;border-radius: 1px;font-size: 16px;"><i class="zmdi zmdi-search"></i> Search</button>
                                            
                        </div>                        
                        
                    </div>
                </form>

    <div class="card" style="margin-bottom: 100px;">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->          

                 <div class="table-responsive table-responsive-data2" style="margin-bottom: 100px;">
                                    <form class="form-horizontal  form-material" method="POST" enctype="multipart/form-data" action="{{ route('work_order_hour.approvemany')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="workorder" value="{{ $work_order_id }}">
                                  
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox" id="checkAll">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>                                                
                                                <th>Date</th>
                                                <th>Hours</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($work_order_hours as $key => $value)
                                            <tr class="tr-shadow">  
                                                <td>
                                                   
                                                    <label class="au-checkbox">
                                                        <!-- <input type="checkbox"> -->
                                                         @if($value->status === 0)
                                                        <input type="hidden" name="{{ $value->id }}" value="false">
                                                        <input type="checkbox" id="{{ $value->id }}" value="true" name="{{ $value->id }}">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                 @endif
                                                </td>                                              
                                                <td>{{ $value->date }}</td>
                                                <td>{{ $value->hours }}</td>                        
                                                <td>{{ $value->statusis }}</td>
                                                <td>
                                                    @if($value->status === 0)
                                                    
                                                    <div class="table-data-feature">
                                                    @role('workuser')    
                                                                <a href="{{ route('work_order_assign.edit', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
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
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Entry</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                          </div>
                                                                          <div class="modal-body">
                                                                            You are going to delete hours entry. Are you sure?

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
                                                                @if($value->commentis === 1)
                                                                    <button class="item" data-toggle="modal" data-target="#comment{{$value->id}}" data-backdrop="false">
                                                                            <i class="zmdi zmdi-comment-alert"></i>
                                                                    </button>
                                                                    <div class="modal fade" id="comment{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                                                                      <div class="modal-dialog" role="document">
                                                                        <div class="modal-content" style="text-align: left;">
                                                                          <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Comment by Admin</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                          </div>
                                                                          <div class="modal-body">{{ $value->comment }}</div>
                                                                          <div class="modal-footer">
                                                                            
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                         
                                                                @endif
                                                        @endrole
                                                    @role('Admin')
                                                    
                                                        <a href="{{ route('work_order_hour.approve', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Approve">
                                                            <i class="zmdi zmdi-check-circle"></i>
                                                        </button></a>

                                                        <a href="{{ route('work_order_hour.reject', $value->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Reject">
                                                            <i class="zmdi zmdi-block"></i>
                                                        </button></a>
                                                        <!-- -popup -->
                                                        <button class="item" data-toggle="modal" data-target="#comment{{$value->id}}" data-backdrop="false">
                                                            <i class="zmdi zmdi-comment-alert"></i>
                                                        </button>
                                                        <div class="modal fade" id="comment{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form action="{{ route('work_order_hour.comment') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                                    {{ csrf_field() }}
                                                                        <input type="hidden" name="hour_id" value="{{ $value->id }}">
                                                                        <div class="modal-content" style="text-align: left;">
                                                                          <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                          </div>
                                                                          <div class="modal-body">
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="assignee" class=" form-control-label">Comment</label>
                                                                                </div>
                                                                                @if($value->commentis === 1)
                                                                                <div class="col-12 col-md-9">
                                                                                    <label for="assignee" class=" form-control-label">{{ $value->comment }}</label>
                                                                                </div>
                                                                                @elseif($value->commentis === 0)
                                                                                <div class="col-12 col-md-9">
                                                                                    <textarea name="description" id="description" placeholder="Your entry is still pending because..." class="form-control"></textarea>
                                                                                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                                                                                        @if ($errors->has('description'))
                                                                                                            <span class="help-block error">
                                                                                                                <strong>{{ $errors->first('description') }}</strong>
                                                                                                            </span>
                                                                                                        @endif 
                                                                                </div>

                                                                                @endif
                                                                            </div>
                                                                          </div>
                                                                          @if($value->commentis === 0)
                                                                          <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary btn-sm">
                                                                                <i class="fa fa-dot-circle-o"></i> Submit
                                                                            </button>
                                                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-ban"></i>Cancel</button>
                                                                          </div>
                                                                          @endif
                                                                        </div>
                                                                        </form>
                                                                      </div>
                                                                    </div>              
                                                    @endrole
                                                    @endif
                                                </div>
                                                    
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        <div class="form-group">
                                                <div class="col-md-8">
                                                    @role('Admin')
                                                    <button type="submit" name="submitbutton" value="approve" class="btn btn-info">
                                                        Approve Selected
                                                    </button>
                                                    <button type="submit" name="submitbutton" value="reject" class="btn btn-info">
                                                        Reject Selected
                                                    </button>
                                                    @endrole
                                                </div>
                                                <div class="col-md-8">
                                                   
                                                </div>
                                        </div>
                                    </form>
                                    
                                </div> 
</div>
<script type="text/javascript">
     $("#checkAll").click(function () {
         $('input:checkbox').not(this).prop('checked', this.checked);
     });
</script>

@endsection