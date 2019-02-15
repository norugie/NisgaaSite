function alertDesign(e) {
    var type = $(e).data('type');
    var id = $(e).data('id');
    var name = $(e).data('name');

    if (type === 'delete-user') {
        showDisableUserConfirm(id, name);
    } else if (type === 'reactivate-user') {
        showReactivateUserConfirm(id, name);
    } else if (type === 'delete-job') {
        showDisableJobConfirm(id, name);
    } else if (type === 'reopen-job') {
        showReopenJobConfirm(id, name);
    } else if (type === 'delete-event') {
        var post = $(e).data('post');
        showDisableEventConfirm(id, name, post);
    } else if (type === 'delete-cat') {
        showDisableCatConfirm(id, name);
    } else if (type === 'delete-post') {
        var event = $(e).data('event');
        showDisablePostConfirm(id, name, event);
    } else if (type === 'delete-media') {
        showDisableMediaConfirm(id, name);
    } else if (type === 'delete-link') {
        showDisableLinkConfirm(id, name);
    } else if (type === 'reopen-link') {
        showReactivateLinkConfirm(id, name);
    } else if (type === 'delete-announcement') {
        showDisableAnnouncementConfirm(id, name);
    } else if (type === 'delete-logs') {
        showDeleteLogsConfirm();
    } else if (type === 'delete-faq'){
        showDeleteInquiryConfirm(id, name);
    } else if (type === 'delete-contact'){
        showDeleteContactConfirm(id, name);
    } else if(type === 'reactivate-contact'){
        showReactivateContactConirm(id, name);
    }
}


//Warning for disabling user accounts
function showDisableUserConfirm(id, name) {
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
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/district.php?district=true&userDisable=true&id=" + id + "&username=" + name;
        }

    });
}

//Warning for reactivating user accounts
function showReactivateUserConfirm(id, name) {
    swal({
        title: "Are you sure you want to reactivate this account?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00BCD4",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/district.php?district=true&userReactivate=true&id=" + id + "&username=" + name;
        }

    });
}

//Warning for closing job posting
function showDisableJobConfirm(id, name) {
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
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/district.php?district=true&jobDisable=true&id=" + id + "&job=" + name;
        }

    });
}

//Warning for reopening job posting
function showReopenJobConfirm(id, name) {
    swal({
        title: "Are you sure you want to reopen this job posting?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00BCD4",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: true,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            $('#edit-job-dates-modal').modal('show');
            $('#edit-job-dates-modal').on('shown.bs.modal', function () {
                editJobDates(id, name, 0);
            });
        }

    });
}

//Warning for cancelling event
function showDisableEventConfirm(id, name, post) {
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
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/district.php?district=true&eventDisable=true&id=" + id + "&event=" + name + "&post=" + post;
        }

    });
}

//Warning for disabling category
function showDisableCatConfirm(id, name) {
    swal({
        title: "Are you sure you want to disable this category?",
        text: "You won't be able to reactivate this category after this",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/post.php?post=true&catDisable=true&id=" + id + "&cat=" + name;
        }

    });
}

//Warning for disabling post
function showDisablePostConfirm(id, name, event) {
    swal({
        title: "Are you sure you want to disable this post?",
        text: "You won't be able to reactivate this post once archived",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            if (event === 1) {
                window.location = "../functions/post.php?post=true&postDisableEvent=true&id=" + id + "&postName=" + name;
            } else {
                window.location = "../functions/post.php?post=true&postDisable=true&id=" + id + "&postName=" + name;
            }


        }

    });
}

//Warning for disabling media post
function showDisableMediaConfirm(id, name) {
    swal({
        title: "Are you sure you want to disable this media post?",
        text: "You won't be able to reactivate this media post once archived",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/post.php?post=true&mediaDisable=true&id=" + id + "&mediaName=" + name;
        }

    });
}

//Warning for disabling link
function showDisableLinkConfirm(id, name) {
    swal({
        title: "Are you sure you want to disable this link?",
        text: "You will be able to reactivate this link once archived",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/post.php?post=true&linkDisable=true&id=" + id + "&linkName=" + name;
        }

    });
}

//Warning for reactivating link
function showReactivateLinkConfirm(id, name) {
    swal({
        title: "Are you sure you want to reactivate this link?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00BCD4",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/post.php?post=true&linkReactivate=true&id=" + id + "&linkName=" + name;
        }

    });
}

//Warning for disabling announcement
function showDisableAnnouncementConfirm(id, name) {
    swal({
        title: "Are you sure you want to disable this announcement post?",
        text: "You won't be able to reactivate this announcement post once archived",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/post.php?post=true&announcementDisable=true&id=" + id + "&announcementName=" + name;
        }

    });
}

//Warning for disabling announcement
function showDeleteLogsConfirm() {
    swal({
        title: "Are you sure you want to delete all logs?",
        text: "You won't be able to recover the deleted logs",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/dashboard.php?dashboard=true&logDelete=true";
        }

    });
}

//Warning for disabling announcement
function showDeleteInquiryConfirm(id, name) {
    swal({
        title: "Are you sure you want to disable this inquiry information?",
        text: "You won't be able to undo this action once archived",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/interaction.php?interaction=true&inquiryDisable=true&id=" + id + "&inquiryName=" + name;
        }

    });
}

//Warning for disabling contact
function showDeleteContactConfirm(id, name) {
    swal({
        title: "Are you sure you want to disable this contact entry?",
        text: "You can reactivate this contact entry later",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#F44336",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/interaction.php?interaction=true&contactDisable=true&id=" + id + "&contactRole=" + name;
        }

    });
}

//Warning for reactivating contact
function showReactivateContactConirm(id, name) {
    swal({
        title: "Are you sure you want to reactivate this contact entry?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00BCD4",
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location = "../functions/interaction.php?interaction=true&contactReactivate=true&id=" + id + "&contactRole=" + name;
        }

    });
}