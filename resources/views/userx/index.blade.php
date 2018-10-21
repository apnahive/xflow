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
            {!! $users->render() !!}
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>


@endsection
