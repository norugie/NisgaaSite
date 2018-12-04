
function alertDesign(e){
    var type = $(e).data('type');
    var id = $(e).data('id');
    var name = $(e).data('name');

    if(type === 'delete-user'){
        showDisableUserConfirm(id, name);
    } else if(type === 'reactivate-user'){
        showReactivateUserConfirm(id, name);
    } else if(type === 'delete-job'){
        showDisableJobConfirm(id, name);
    } else if(type === 'reopen-job'){
        showReopenJobConfirm(id, name);
    } else if(type === 'delete-event'){
        showDisableEventConfirm(id, name);
    }
}

//These codes take from http://t4t5.github.io/sweetalert/

//Warning for disabling user accounts
function showDisableUserConfirm(id, name){
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
            window.location = "../functions/district.php?district=true&userDisable=true&id=" + id + "&username=" + name;
        }
    
    });
}

//Warning for reactivating user accounts
function showReactivateUserConfirm(id, name){
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
            window.location = "../functions/district.php?district=true&userReactivate=true&id=" + id + "&username=" + name;
        }
    
    });
}

//Warning for closing job posting
function showDisableJobConfirm(id, name){
    swal({
        title: "Are you sure you want to close this job posting?",
        text: "Only those with the HR and Administrator role can reopen the job posting",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm){   
        if (isConfirm){   
            window.location = "../functions/district.php?district=true&jobDisable=true&id=" + id + "&job=" + name;
        }
    
    });
}

//Warning for reopening job posting
function showReopenJobConfirm(id, name){
    swal({
        title: "Are you sure you want to reopen this job posting?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00BCD4",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: true,
        closeOnCancel: true
    }, function(isConfirm){   
        if (isConfirm){               
            $('#edit-job-dates-modal').modal('show');
            $('#edit-job-dates-modal').on('shown.bs.modal', function(){
                editJobDates(id, name, 0);
            });
        }
    
    });
}

//Warning for cancelling event
function showDisableEventConfirm(id, name){
    swal({
        title: "Are you sure you want to cancel this event?",
        text: "You won't be able to reactivate this event after this",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm){   
        if (isConfirm){   
            window.location = "../functions/district.php?district=true&eventDisable=true&id=" + id + "&event=" + name;
        }
    
    });
}
