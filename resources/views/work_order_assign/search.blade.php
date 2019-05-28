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
                                    <table class="table table-data2">
                                        
                                    </table>    
                                    <table class="table table-data2">
                                        <thead>
                           
                                            <tr>                                                
                                                <th>Date</th>
                                                <th>Hours</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($work_order_hours as $key => $value)
                                            <tr class="tr-shadow">                                                
                                                <td>{{ $value->date }}</td>
                                                <td>{{ $value->hours }}</td>                        
                                                <td>Pending</td>
                                                <td>
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
                                                    </div>
                                                    @endrole
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