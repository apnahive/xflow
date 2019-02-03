@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>

<div class="row" style="margin-bottom: 100px;">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Xflow</h3>
        <div class="table-data__tool">
            <!-- <div class="table-data__tool-left">
                <a href=""><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Add From Template</button></a>
            </div> -->
            <div class="table-data__tool-right">                
                <a href="{{ route('xflows.create') }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Create New Xflow</button></a>
            </div>
        </div> 
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>                    
                    <tr>
                        <!-- <th>
                            <label class="au-checkbox">
                                <input type="checkbox" id="checkAll" disabled="disabled">
                                <span class="au-checkmark"></span>
                            </label>
                        </th> -->
                        <th>Title</th>
                        <th>Assigned To</th>
                        <th>Team</th>
                        <th>Status</th>
                        <th>Timeline</th>
                        <th>Progress</th>
                        <!-- <th>status</th>
                        <th>price</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                                  </tbody>
              
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

@endsection
