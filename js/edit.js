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

    $("#edit-title").attr("value", job['title']);
    $("#edit-jobdesc").val(job['job_desc']);
    $("#edit-job-id-num").attr("value", job['id']);
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

function editEvent(eventInfo){
    event = $(eventInfo).data("values");

    $("#edit_event_shortname").attr("value", event['event_shortname']);
    $("#edit_event_desc").val(event['event_desc']);
    $("#edit_event_name").attr("value", event['event_name']);
    $("#edit_event_id").attr("value", event['id']);
    $("#edit_event_location").attr("value", event['event_location']);

}