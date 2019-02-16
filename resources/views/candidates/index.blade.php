@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Candidates</h3>
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
                        <th><a href="{{ route('profiles.sort', ['name', 'asc']) }}"><i class="fas fa-sort-alpha-down"></i></a> Name <a href="{{ route('profiles.sort', ['name', 'desc']) }}"><i class="fas fa-sort-alpha-up"></i></a></th> 
                        <th><a href="{{ route('profiles.sort', ['title', 'asc']) }}"><i class="fas fa-sort-alpha-down"></i></a> Title <a href="{{ route('profiles.sort', ['title', 'desc']) }}"><i class="fas fa-sort-alpha-up"></i></a></th> 
                        <th>Expert level</th>
                        <th>Skills</th>
                        <th>Qualification</th>
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $key => $value)
                    
                    <tr class="tr-shadow">
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->experience }}</td>                        
                        <td>{{ $value->skills }}</td>                        
                        <td>{{ $value->qualifications }}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{ route('profiles.show', $value->user_id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
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
        <!-- END DATA TABLE -->
    </div>
</div>


@endsection
