@extends('layouts.app')

@section('content')

<div class="row" style="margin-bottom: 100px;">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Users</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Back</button></a>
                
            </div>
            <div class="table-data__tool-right">                
                
            </div>
        </div>
        <div class="table-responsive table-responsive-data2" style="margin-bottom: 100px;">
            <table class="table table-data2">
                <thead>
                    <form action="{!! route('users.search') !!}" method="POST" role="search" class="search-des">
                    {{ csrf_field() }}
                    <div class="search-task">
                        <div class="col-md-3">
                            <input id="name" type="text" class="col-md-12" name="name" value="{{ old('name') }}" placeholder="Name" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;">
                            <!-- <div class="rs-select2--light rs-select2--md" style="margin-top: 10px;width: 100%;font-weight: 600;font-size: 16px;">
                                <select class="js-select2" id="assigned" name="assigned">
                                    <option value="0" selected="selected">Assigned To</option>
                                                                    
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div> -->
                        </div>
                        <div class="col-md-3">
                            <input id="email" type="text" class="col-md-12" name="email" value="{{ old('email') }}" placeholder="Email" style="border: none;color: #808bab;box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);height: 40px;border-radius: 4px;font-weight: 600;font-size: 16px;">
                            <!-- <div class="rs-select2--light rs-select2--md" style="margin-top: 10px;width: 100%;font-weight: 600;font-size: 16px;">
                                <select class="js-select2" id="status" name="status">
                                    <option value="0" selected="selected">Status</option>
                                    <option value="1">Pending</option>
                                    <option value="2">Initiated</option>
                                    <option value="3">Completed</option>                                    
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>  -->
                        </div>
                        <div class="col-md-3">
                            <div class="rs-select2--light rs-select2--md" style="width: 100%;font-weight: 600;font-size: 16px;">
                                <select class="js-select2" id="type" name="type">
                                    <option value="0" selected="selected">User Type</option>
                                    <option value="Investment Advisor">Investment Advisor</option>
                                    <option value="Private Funds">Private Funds</option>
                                    <option value="Broker Dealer">Broker Dealer</option>
                                    <option value="Private Equity">Private Equity</option>
                                    <option value="Consultant">Consultant</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>                            
                        </div>  
                        <div class="col-md-3">
                            <div class="rs-select2--light rs-select2--md" style="width: 100%;font-weight: 600;font-size: 16px;">
                                <button type="submit" class="btn btn-md btn-info" style="width: 100%;color: white;background-color: #4272d7;border-radius: 1px;font-size: 16px;"><i class="zmdi zmdi-search"></i> Search</button>
                            </div>                            
                        </div>                        
                    </div>
                    </form>
                    <tr>                        
                        <th><a href="{{ route('users.sort', ['name', 'asc']) }}"><i class="fas fa-sort-alpha-down"></i></a> Name <a href="{{ route('users.sort', ['name', 'desc']) }}"><i class="fas fa-sort-alpha-up"></i></a></th>
                        <th><a href="{{ route('users.sort', ['email', 'asc']) }}"><i class="fas fa-sort-alpha-down"></i></a> Email <a href="{{ route('users.sort', ['email', 'desc']) }}"><i class="fas fa-sort-alpha-up"></i></a></th>
                        <th><a href="{{ route('users.sort', ['user_type', 'asc']) }}"><i class="fas fa-sort-alpha-down"></i></a> User Type <a href="{{ route('users.sort', ['user_type', 'desc']) }}"><i class="fas fa-sort-alpha-up"></i></a></th>
                        <th>Status</th>
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $userkey => $user)                    
                    <tr class="tr-shadow">
                        <!-- <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td> -->
                        <td>{{ $user->name }} {{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>                        
                        <td>{{ $user->user_type }}</td>                        
                        <td>
                            @if($user->verified)
                                Approved
                            @else
                                @if($user->verification_token)
                                    Pending
                                @else 
                                    Rejected
                                @endif    
                            @endif
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{ route('users.show', $user->id) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button></a>
                                <!-- @if($user->verified)
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;color:white;">View</a>
                                @else
                                    @if($user->verification_token)
                                        <a href="{{ route('users.approve', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;color:white;">Approve</a>
                                        <a href="{{ route('users.reject', $user->id) }}" class="btn btn-danger pull-left" style="margin-right: 3px;color:white;">Reject</a>
                                    @endif    
                                @endif -->
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
