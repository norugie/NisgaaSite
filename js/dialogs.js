
function alertDesign(e){
        var type = $(e).data('type');
        var id = $(e).data('id');
        var username = $(e).data('username');
        if(type === 'delete-user') {
            showDisableUserConfirm(id, username);
        } else if(type === 'reactivate-user'){
            showReactivateUserConfirm(id, username);
        }
}

//These codes take from http://t4t5.github.io/sweetalert/

//Warning for disabling user accounts
function showDisableUserConfirm(id, username){
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
            window.location = "../functions/district.php?district=true&userDisable=true&id=" + id + "&username=" + username;
        }
    
    });
}

//Warning for reactivating user accounts
function showReactivateUserConfirm(id, username){
    swal({
        title: "Are you sure you want to reactivate this account?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00BCD4",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm){   
        if (isConfirm){   
            window.location = "../functions/district.php?district=true&userReactivate=true&id=" + id + "&username=" + username;
        }
    
    });
}
