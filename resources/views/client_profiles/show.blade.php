@extends('layouts.app')

@section('content')
<!-- <a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a> -->



<div class="table-data__tool">
    <div class="table-data__tool-left">
        <a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
            Back</button></a>
    </div>    
</div>

<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Recruiter Profile</strong>
            </div>            

            <div class="card-body card-block">
                <div class="row" style="margin: 0 0;">
                <a href="{{ route('client_profiles.edit', $user['id']) }}"  style="text-align:right;margin:auto;margin-top: 10px;margin-right: 0;"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Edit</button></a>
                </div>
                <!-- <h3 class="title-5 m-b-35">Personal Details</h3> -->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            {{ $user->name }} {{ $user->lastname }}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="company_name" class=" form-control-label">Company Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            @if($details)                            
                            {{ $details->company_name }}
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Phone</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            {{ $user->phonenumber }}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Address</label>
                        </div>
                        <div class="col-12 col-md-9">
                            @if($details)
                            {{ $details->address }}
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Zipcode</label>
                        </div>
                        <div class="col-12 col-md-9">
                            @if($details)
                            {{ $details->zip }}
                            @endif
                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            @if($details)                            
                            {{ $details->state }}
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">                            
                            @if($details)
                            {{ $details->city }}
                            @endif
                        </div>
                    </div>
                
                    
            </div>            
        </div>        
    </div>
</div>


@endsection
