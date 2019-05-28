<?php $__env->startSection('style'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<a href="<?php echo e(URL::previous()); ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small" style="margin-bottom: 33px;">
                    Back</button></a>

<div class="row">
    <div class="col-lg-12">
        <div class="card" style="padding: 36px;">
        	<?php echo $calendar->calendar(); ?>    
        </div>        
    </div>
</div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<?php echo $calendar->script(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.calender', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>