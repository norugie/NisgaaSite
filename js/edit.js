function editUser(userInfo){
    user = $(userInfo).data("values");

    $("#edit-firstname").attr("value", user['firstname']);
    $("#edit-lastname").attr("value", user['lastname']);
    $("#edit-username").attr("value", user['username']);
    $("#edit-password").attr("value", user['password']);
    $("#edit-email").attr("value", user['email']);
    $("#edit-id").attr("value", user['id']);
    $("#edit-username-hidden").attr("value", user['username']);

}

