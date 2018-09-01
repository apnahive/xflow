(function () {
$('#btnRight').click(function (e) {
    var selectedOpts = $('#lstBox1 option:selected');
    if (selectedOpts.length == 0) {
        alert("Nothing to move.");
        e.preventDefault();
    }

    $('#lstBox2').append($(selectedOpts).clone());
    $(selectedOpts).remove();
    e.preventDefault();
});

$('#btnAllRight').click(function (e) {
    var selectedOpts = $('#lstBox1 option');
    if (selectedOpts.length == 0) {
        alert("Nothing to move.");
        e.preventDefault();
    }

    $('#lstBox2').append($(selectedOpts).clone());
    $(selectedOpts).remove();
    e.preventDefault();
});

$('#btnLeft').click(function (e) {
    var selectedOpts = $('#lstBox2 option:selected');
    if (selectedOpts.length == 0) {
        alert("Nothing to move.");
        e.preventDefault();
    }

    $('#lstBox1').append($(selectedOpts).clone());
    $(selectedOpts).remove();
    e.preventDefault();
});

$('#btnAllLeft').click(function (e) {
    var selectedOpts = $('#lstBox2 option');
    if (selectedOpts.length == 0) {
        alert("Nothing to move.");
        e.preventDefault();
    }

    $('#lstBox1').append($(selectedOpts).clone());
    $(selectedOpts).remove();
    e.preventDefault();
});
$('form').submit(function () {
			        $('#lstBox2 option').each(function (i) {
			            $(this).attr("selected", "selected");
			        });
                    $('#lstBox1 option').each(function (i) {
                        $(this).attr("selected", "selected");
                    });
                    //This was only added in order to illustrate the problem
                    //Off course, you need to remove it to be able to submit
                    //the form.
			       
			    });

})(jQuery);