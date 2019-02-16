@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Jobs</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Back</button></a>
                <!-- <div class="rs-select2--light rs-select2--md">
                    <select class="js-select2" name="property">
                        <option selected="selected">All Properties</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    <select class="js-select2" name="time">
                        <option selected="selected">Today</option>
                        <option value="">3 Days</option>
                        <option value="">1 Week</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <button class="au-btn-filter">
                    <i class="zmdi zmdi-filter-list"></i>filters</button> -->
            </div>
            <div class="table-data__tool-right">
                <!-- 
                <a href="{{ route('jobs.create') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add New Client</button></a>
                 -->                
            </div>
        </div>
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
                        <th><a href="{{ route('jobs.sort', ['title', 'asc']) }}"><i class="fas fa-sort-alpha-down"></i></a> Title <a href="{{ route('jobs.sort', ['title', 'desc']) }}"><i class="fas fa-sort-alpha-up"></i></a></th> 
                        <th>Expert level</th>
                        <th>Skills</th>
                        <th>Qualification</th>
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $jobkey => $job)
                    
                    <tr class="tr-shadow">
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->experience }}</td>                        
                        <td>{{ $job->skills }}</td>                        
                        <td>{{ $job->qualifications }}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{ route('jobs.show', $job->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                
                                <a href="{{ route('jobs.edit', $job->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button></a>
                                
                                <!-- <button class="item" data-toggle="modal" data-target="#confirm{{$job->id}}" data-backdrop="false">
                                    <i class="zmdi zmdi-delete"></i>
                                </button> -->

                                

                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                                <div class="modal fade" id="confirm{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$job->id}}" aria-hidden="true">
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
