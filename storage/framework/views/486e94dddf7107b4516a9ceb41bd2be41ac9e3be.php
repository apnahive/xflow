<script>
    $(document).ready(function(){
        $('#calendar-<?php echo e($id); ?>').fullCalendar(<?php echo $options; ?>);
    });
</script>
