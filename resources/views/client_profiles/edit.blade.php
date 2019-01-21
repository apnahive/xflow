@extends('layouts.app')

@section('content')
<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit Recruiter Profile</strong>
            </div>            
            <form action="{{ route('client_profiles.update', $user['id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">First Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="{{ old('name', $user['name']) }}" required>
                            @if ($errors->has('name'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="lastname" class=" form-control-label">Last Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="form-control" value="{{ old('lastname', $user['lastname']) }}" required>
                            @if ($errors->has('lastname'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="company_name" class=" form-control-label">Company Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="company_name" name="company_name" placeholder="Company Name" class="form-control" value="{{ old('company_name', $details['company_name']) }}" required>
                            @if ($errors->has('company_name'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="email" class=" form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="email" name="email" placeholder="Email" class="form-control" value="{{ old('email', $user['email']) }}" disabled>
                            @if ($errors->has('email'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="phonenumber" class=" form-control-label">Phone Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="phonenumber" name="phonenumber" placeholder="Phone Number" class="form-control" value="{{ old('phonenumber', $user['phonenumber']) }}" required>
                            @if ($errors->has('phonenumber'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('phonenumber') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="address" class=" form-control-label">Address</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="address" name="address" placeholder="Address" class="form-control" value="{{ old('address', $details['address']) }}" required>
                            @if ($errors->has('address'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="zip" class=" form-control-label">Zipcode</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="zip" name="zip" placeholder="Zipcode" class="form-control" value="{{ old('zip', $details['zip']) }}" required>
                            @if ($errors->has('zip'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('zip') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state" id="state" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($states as $state) 
                                    <option value="{{$state->state}}" {{ $details['state'] == $state->state ? 'selected' : '' }}>{{$state->state}}
                                @endforeach
                            </select>
                            @if ($errors->has('state'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city" id="city" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($cities as $city) 
                                    <option value="{{$city->city}}" {{ $details['city'] == $city->city ? 'selected' : '' }}>{{$city->city}}
                                @endforeach
                            </select>
                            @if ($errors->has('city'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <script type="text/javascript">
                          $(".chosen").chosen();
                    </script>
                    
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
            </form>
        </div>        
    </div>
</div>

<!-- <script type="text/javascript">
    $(function(){
      $('#tags input').on('focusout', function(){    
        var txt= this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g,''); // allowed characters list
        if(txt) $(this).before('<span class="tag">'+ txt +'</span>');
        this.value="";
        this.focus();
      }).on('keyup',function( e ){
        // comma|enter (add more keyCodes delimited with | pipe)
        if(/(188|13)/.test(e.which)) $(this).focusout();
      });

      $('#tags').on('click','.tag',function(){
         if( confirm("Really delete this tag?") ) $(this).remove(); 
      });

    });
</script> -->
<script type="text/javascript">
    
    $('#state').on('change', function(e){
        var state_id = e.target.value;

        $.get('{{ url('information') }}/create/ajax-state?state_id=' + state_id, function(data) {
            //console.log(data);
            $('#city').empty();
            $.each(data, function(index,subCatObj){
                $('#city').append('<option value='+subCatObj.city+'>'+subCatObj.city+'</option>');
            });
             //$(".chosen").chosen(); 
        });
    });
</script>
@endsection
