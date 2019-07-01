<script src="<?php echo e(asset('vendor/sweetalert/sweetalert.all.js')); ?>"></script>
<?php if(Session::has('alert.config')): ?>
    <script>
        Swal.fire(<?php echo Session::pull('alert.config'); ?>);
    </script>
<?php endif; ?>
