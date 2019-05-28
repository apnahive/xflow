@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>
                    
<div class="row" style="margin-bottom: 100px;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Assign</strong> Users to Work_Order
            </div>            
            <div >
            <div class="card-body card-block">
                        <!-- <style>
                            
                                </style> -->

                            <!-- <h3 class="title-5 m-b-35">Add users to the Team</h3> -->
                                <link href="{{ asset('css/select.css') }}" rel="stylesheet">

                                <form action="{{ route('work_order_assign.update', $work_order['id']) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="subject-info-box-1">
                                      <select multiple="true" id="lstBox1" name="no_user[]" class="form-control">
                                        @foreach ($users as $userkey => $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="subject-info-arrows text-center">
                                  <input type="button" id="btnAllRight" value=">>" class="btn btn-default"><br>
                                  <input type="button" id="btnRight" value=">" class="btn btn-default"><br>
                                  <input type="button" id="btnLeft" value="<" class="btn btn-default"><br>
                                  <input type="button" id="btnAllLeft" value="<<" class="btn btn-default">
                              </div>

                              <div class="subject-info-box-2">
                                  <select multiple="true" id="lstBox2" name="users[]" class="form-control" >
                                    @foreach ($selected_users as $key => $selected_user)
                                    <option value="{{ $selected_user->id }}">{{ $selected_user->name }} {{ $selected_user->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 29px;">
                                <i class="fa fa-dot-circle-o"></i> Assign Users to Work Order
                            </button>                
                        </form>

                            <div class="clearfix"></div>    

                              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
                              <script src="{{ asset('js/select.js') }}" defer></script>
                              

                                <!-- <script>       

                            
                                  //# sourceURL=pen.js
                                </script> -->

                        
                        
                    </div>
                  </div>
           
        </div>        
    </div>
</div>
@endsection
