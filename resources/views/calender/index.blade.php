@extends('layouts.calender')
@section('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<style type="text/css">
	.fc-day-grid-event>.fc-content {
	    padding: 7px;
	    font-size: 13px;
	}
	.fc-right {
	    display: none;
	}
</style>
@endsection
@section('content')

<a href="{{ URL::previous() }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>

<div class="row">
    <div class="col-lg-12">
        <div class="card" style="padding: 36px;">
        	{!! $calendar->calendar() !!}    
        </div>        
    </div>
</div>





@endsection
@section('script')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endsection
