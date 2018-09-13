<?php if(Session::has('alert.config')): ?>
    <script>
        swal(<?php echo Session::pull('alert.config'); ?>);
    </script>
<?php endif; ?>
