$(function () {
    $('.js-sweetalert button').on('click', function () {
        var type = $(this).data('type');
        if (type === 'delete-user') {
            showDeleteUserConfirm();
        }
    });
});

//These codes takes from http://t4t5.github.io/sweetalert/

function showDeleteUserConfirm() {
    swal({
        title: "Are you sure you want to disable this account?",
        text: "Only those with the Administrator role can reactivate the account",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    });
}
