@extends('layouts.app')

@section('content')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<style type="text/css">
    .bootstrap-tagsinput {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        display: block;
        padding: 4px 6px;
        color: #555;
        vertical-align: middle;
        border-radius: 4px;
        max-width: 100%;
        line-height: 22px;
        cursor: text;
    }
    .bootstrap-tagsinput input {
        border: none;
        box-shadow: none;
        outline: none;
        background-color: transparent;
        padding: 0 6px;
        margin: 0;
        width: auto;
        max-width: inherit;
    }
    .label-info {
        background-color: #5bc0de;
        color: white;
        padding: 1px 13px;
    }
    /*#show-relocation {
        display: none;
    }*/
</style>

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Candidate Profile</strong>
            </div>            
            <form action="{{ route('profiles.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Profile Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" placeholder="Job Title" class="form-control" required>
                            @if ($errors->has('title'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="employer" class=" form-control-label">Current Employer</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="employer" name="employer" placeholder="Current Employer" class="form-control" required>
                            @if ($errors->has('employer'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('employer') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    <!-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="3" placeholder="Description..." class="form-control" required></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>                     -->
                    <!-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="experience_level" class=" form-control-label">Experience Level</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="experience_level" id="experience_level" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1">Entry Level</option>
                                <option value="2">Inermediate Level</option>
                                <option value="3">Expert Level</option>
                                
                            </select>                            
                            @if ($errors->has('experience_level'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('experience_level') }}</strong>
                                </span>
                            @endif
                        </div>
                         
                    </div> -->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="experience_years" class=" form-control-label">Experience in Years</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="experience_years" id="experience_years" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1">0-2 Years</option>
                                <option value="2">2-5 Years</option>
                                <option value="5">5+ Years</option>
                                <!-- <option value="4">3 Years</option>
                                <option value="5">4 Years</option>
                                <option value="6">5 Years</option>
                                <option value="7">6 Years</option>
                                <option value="8">7 Years</option>
                                <option value="9">8 Years</option>
                                <option value="10">9 Years</option>
                                <option value="11">10+ Years</option> -->

                            </select>                            
                            @if ($errors->has('experience_years'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('experience_years') }}</strong>
                                </span>
                            @endif
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="active" class=" form-control-label">Are you Active?</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="active" id="active" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>   
                                
                            </select>                            
                            @if ($errors->has('active'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('active') }}</strong>
                                </span>
                            @endif
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state" class=" form-control-label">Current State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state" id="state" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($states as $state) 
                                    <option value="{{$state->state}}">{{$state->state}}
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
                            <label for="city" class=" form-control-label">Current City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city" id="city" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($cities as $city) 
                                    <option value="{{$city->city}}">{{$city->city}}
                                @endforeach
                            </select>
                            @if ($errors->has('city'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="relocation" class=" form-control-label">City ready to re-location</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="checkbox1" type="radio" name="relocation" value="1">
                            <label for="checkbox1" style="padding-right: 50px;">
                                Yes
                            </label>
                            <input id="checkbox2" type="radio" name="relocation" value="2">
                            <label for="checkbox2">
                                No
                            </label>
                            @if ($errors->has('relocation'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('relocation') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div id="show-relocation">
                    <h5>Choose City ready to re-location:</h5>
                    <hr> 
                    <div style="display: flex;">
                    <div class="col-md-6">
                    <h6><b>Option 1</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state1" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state1" id="state1" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($states as $state) 
                                    <option value="{{$state->state}}">{{$state->state}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('state1'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('state1') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city1" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city1" id="city1" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($cities as $city) 
                                    <option value="{{$city->city}}">{{$city->city}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city1'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('city1') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <h6><b>Option 2</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state2" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state2" id="state2" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($states as $state) 
                                    <option value="{{$state->state}}">{{$state->state}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('state2'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('state2') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city2" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city2" id="city2" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($cities as $city) 
                                    <option value="{{$city->city}}">{{$city->city}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city2'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('city2') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    </div>                    
                    </div>

                    <div style="display: flex;">
                    <div class="col-md-6">
                    <h6><b>Option 3</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state3" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state3" id="state3" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($states as $state) 
                                    <option value="{{$state->state}}">{{$state->state}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('state3'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('state3') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city3" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city3" id="city3" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($cities as $city) 
                                    <option value="{{$city->city}}">{{$city->city}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city3'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('city3') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <h6><b>Option 4</b></h6>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="state4" class=" form-control-label">State</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="state4" id="state4" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($states as $state) 
                                    <option value="{{$state->state}}">{{$state->state}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('state4'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('state4') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="city4" class=" form-control-label">City</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="city4" id="city4" class="form-control">
                                <option value="0">Please select</option>
                                @foreach ($cities as $city) 
                                    <option value="{{$city->city}}">{{$city->city}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city4'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('city4') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div>
                    </div>
                    </div>
                    <hr>
                </div>



                    <script type="text/javascript">
                          $(".chosen").chosen();
                    </script>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="qualification" class=" form-control-label">Education</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="qualification" id="qualification" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1">Graduate</option>
                                <option value="2">Post Graduate</option>
                                <option value="3">PHD</option>
                                <option value="4">No College Degree</option>
                                <option value="5">Diploma</option>
                                
                            </select>                            
                            @if ($errors->has('experience_level'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('experience_level') }}</strong>
                                </span>
                            @endif
                        </div>
                         
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="certificate" class=" form-control-label">Field</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="certificate" id="certificate" class="custom-select form-control">
                                <option value="0">Please select</option>
                                <option value="1">Engineering</option>
                                <option value="2">Architecture</option>
                                <option value="3">Science</option>
                                <option value="4">Computer</option>
                                <option value="5">Business</option>
                                <option value="6">Design</option>
                                <option value="7">Construction</option>
                                <option value="8">Political</option>
                                <option value="9">Math</option>
                                <option value="10">Technical</option>
                                
                            </select>                            
                            @if ($errors->has('certificate'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('certificate') }}</strong>
                                </span>
                            @endif
                        </div>
                         
                    </div>

                    <!-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="start_date" class=" form-control-label">Start Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input id="start_date" type="date" placeholder="yyyy-mm-dd" class="form-control" name="start_date" value="{{ old('start_date') }}" required autofocus>
                            @if ($errors->has('start_date'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                            @endif 
                        </div>
                    </div> -->
                    <!-- <style type="text/css">
                        #tags{
                          float:left;
                          border:1px solid #ccc;
                          padding:4px;
                          font-family:Arial;
                        }
                        #tags span.tag{
                          cursor:pointer;
                          display:block;
                          float:left;
                          color:#555;
                          background:#add;
                          padding:5px 10px;
                          padding-right:30px;
                          margin:4px;
                        }
                        #tags span.tag:hover{
                          opacity:0.7;
                        }
                        #tags span.tag:after{
                         position:absolute;
                         content:"??";
                         border:1px solid;
                         border-radius:10px;
                         padding:0 4px;
                         margin:3px 0 10px 7px;
                         font-size:10px;
                        }
                        #tags input{
                          background:#eee;
                          border:0;
                          margin:4px;
                          padding:7px;
                          width:auto;
                        }
                    </style> -->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="certification" class=" form-control-label">Certifications</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div id="tags">
                            <input type="text" id="certification" name="certification" placeholder="certification" class="form-control" data-role="tagsinput" required>
                            </div>
                            @if ($errors->has('certification'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('certification') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="skills" class=" form-control-label">Skills</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div id="tags">
                            <input type="text" id="skills" name="skills" placeholder="Skills" class="form-control" data-role="tagsinput" required>
                            </div>
                            @if ($errors->has('skills'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('skills') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="salary_expected" class=" form-control-label">Salary Range</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="salary_expected" name="salary_expected" placeholder="Salary Expected" class="form-control" required>
                            @if ($errors->has('salary_expected'))
                                <span class="help-block error">
                                    <strong>{{ $errors->first('salary_expected') }}</strong>
                                </span>
                            @endif                            
                        </div>
                    </div>
                    
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

    //state 1
    $('#state1').on('change', function(e){
        var state_id = e.target.value;

        $.get('{{ url('information') }}/create/ajax-state?state_id=' + state_id, function(data) {
            //console.log(data);
            $('#city1').empty();
            $.each(data, function(index,subCatObj){
                $('#city1').append('<option value='+subCatObj.city+'>'+subCatObj.city+'</option>');
            });
             //$(".chosen").chosen(); 
        });
    });
    //state 2
    $('#state2').on('change', function(e){
        var state_id = e.target.value;

        $.get('{{ url('information') }}/create/ajax-state?state_id=' + state_id, function(data) {
            //console.log(data);
            $('#city2').empty();
            $.each(data, function(index,subCatObj){
                $('#city2').append('<option value='+subCatObj.city+'>'+subCatObj.city+'</option>');
            });
             //$(".chosen").chosen(); 
        });
    });
    //state 3
    $('#state3').on('change', function(e){
        var state_id = e.target.value;

        $.get('{{ url('information') }}/create/ajax-state?state_id=' + state_id, function(data) {
            //console.log(data);
            $('#city3').empty();
            $.each(data, function(index,subCatObj){
                $('#city3').append('<option value='+subCatObj.city+'>'+subCatObj.city+'</option>');
            });
             //$(".chosen").chosen(); 
        });
    });
    //state 4
    $('#state4').on('change', function(e){
        var state_id = e.target.value;

        $.get('{{ url('information') }}/create/ajax-state?state_id=' + state_id, function(data) {
            //console.log(data);
            $('#city4').empty();
            $.each(data, function(index,subCatObj){
                $('#city4').append('<option value='+subCatObj.city+'>'+subCatObj.city+'</option>');
            });
             //$(".chosen").chosen(); 
        });
    });
    //for city relocation    
    $(document).ready(function() {
        $("#show-relocation").hide();
    $("input[name$='relocation']").click(function() {
        var test = $(this).val();
        console.log(test);
        if(test == 1)
        $("#show-relocation").show();
        else
        $("#show-relocation").hide();
        /*$("div.desc").hide();
        $("#Cars" + test).show();*/
    });

});
    

</script>
@endsection
