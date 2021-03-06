@extends('layouts.app')

@section('content')

<!-- <a href=""><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a> -->




<div class="row" style="margin-bottom: 100px;">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">{{ $team->name  }} Team</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Back</button></a>
            </div>
            <div class="table-data__tool-right">                
                <a href="{{ route('teammembers.add', $team->id) }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    Update Members</button></a>
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
                        <th>Members</th>
                        <!-- <th>Due Date</th> -->
                        
                        <!-- <th>Managed By</th>
                        <th>Assigned To</th> -->
                        <!-- <th>status</th>
                        <th>price</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($team_members as $key => $value)
                    <tr class="tr-shadow">
                        
                        <td>{{ $value->name }}</td>
                        
                        
                        <!-- <td></td>                        
                        <td></td> -->
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
