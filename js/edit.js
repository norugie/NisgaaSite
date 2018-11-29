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

function editJob(jobInfo){
    job = $(jobInfo).data("values");

    $("#edit-jobid").attr("value", job['job_id']);
    $("#edit-school").attr("value", job['school']);
    $("#edit-title").attr("value", job['title']);
    $("#edit-desc").attr("value", job['job_desc']);
    $("#edit-open").attr("value", job['open_date']);
    $("#edit-close").attr("value", job['close_date']);
    $("#edit-job-id").attr("value", job['id']);
    $("#edit-jobid-hidden").attr("value", job['job_id']);

}

function editJobDates(id, name, identifier){
    $("#edit-job-id").attr("value", id);
    $("#edit-job-name").attr("value", name);
    $("#edit-job-identifier").attr("value", identifier);
}

function editJobFile(id, name){
    $("#edit-job-id-file").attr("value", id);
    $("#edit-job-name-file").attr("value", name);
}