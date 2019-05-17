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

$(document).ready(function() {
    $('#init-table').DataTable({
    	"bPaginate": false,
    	"bInfo": false,
    });
});

/**
 * function for popup delete with ajax
 * ==== PARAMS ====
 * @url : url untuk delete , eg : "/orang/delete"
 * @data_id : id untuk delete , eg : 1
 * @title : title dari pop up , eg : "Delete Confirmation"
 * @content : content dari pop up , eg : "want to delete ?"
 * ==== TRIGGER =====
 * delete-confirm:success => saat form submit sudah sukses.
 */
function popup_confirm (url, data_id, title = false, content = false, replace_data = false, type="warning") {
    if (title === false) title = 'Delete Confirmation';
    if (content === false) content = 'Do you really want to delete this ?';
    if (replace_data === false) replace_data = { id: data_id };

    swal({
        title: title,
        text: content,
        type: type,
        showCancelButton: true,
        confirmButtonText: "Yes",
    }).then(function () {
        $.ajax({
            type: "post",
            url: url,
            cache: false,
            data: replace_data,
            dataType: 'json',
            beforeSend: function() {
                $('.loading-box').css("display", "block");
            },
            success: function(data) {
                $('.loading-box').css("display", "none");

                if (data.is_error == true) swal("Error!", data.error_msg, "error");
                else {
                    $.smallBox({
                        title: '<strong>' + data.notif_title + '</strong>',
                        content: data.notif_message,
                        color: "#659265",
                        iconSmall: "fa fa-check fa-2x fadeInRight animated",
                        timeout: 2000
                    }, function() {
                        $(document).trigger("popup-confirm:success", [url,data_id,data]);
                    });
                }
            },
            error: function() {
                $('.loading-box').css("display", "none");
                swal("Error!", "Something Went wrong", "error");
            }
        });
    }).catch(swal.noop);;
}

