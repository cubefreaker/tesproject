$( function() {
    $(".datepicker" ).datepicker({
    	dateFormat: 'dd-mm-yy'
    });

    //submit handler from external button.
    $(".submit-form").on("click", function() {
        var formID = $(this).data("form-target");
        $("#" + formID).submit();
    });
});

