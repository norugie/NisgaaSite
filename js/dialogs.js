// $(function () {
//     $('.js-sweetalert button').on('click', function () {
//         var type = $(this).data('type');
//         var id = $(this).data('id');
//         if (type === 'delete-user') {
//             showDeleteUserConfirm(id);
//         }
//     });
// });

function alertDesign(e){
        var type = $(e).data('type');
        var id = $(e).data('id');
        if (type === 'delete-user') {
            showDeleteUserConfirm(id);
        }
        //alert("data-id: "+$(e).data('id')+", data-type: "+$(e).data('type'));
}

//These codes takes from http://t4t5.github.io/sweetalert/

//Warning for deleting users
function showDeleteUserConfirm(id){
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
    }, function(isConfirm){   
        if (isConfirm){   
            window.location = "../functions/district.php?district=true&userDisable=true&id=" + id;
        }
    
    });
}
