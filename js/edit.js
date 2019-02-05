function editUser(userInfo) {
    user = $(userInfo).data("values");

    $("#edit-firstname").attr("value", user['firstname']);
    $("#edit-lastname").attr("value", user['lastname']);
    $("#edit-role").selectpicker("val", user['user_type']);
    $("#edit-school").selectpicker("val", user['school']);
    $("#edit-id").attr("value", user['id']);
    $("#edit-username-hidden").attr("value", user['username']);

}

function editJob(jobInfo) {
    job = $(jobInfo).data("values");

    $("#edit-title").attr("value", job['title']);
    $("#edit-jobdesc").val(job['job_desc']);
    $("#edit-school").selectpicker("val", job['school']);
    $("#edit-jobtype").selectpicker("val", job['job_type']);
    $("#edit-job-id-num").attr("value", job['id']);
    $("#edit-jobid-hidden").attr("value", job['job_id']);

}

function editJobDates(id, name, identifier) {
    $("#edit-job-id").attr("value", id);
    $("#edit-job-name").attr("value", name);
    $("#edit-job-identifier").attr("value", identifier);
}

function editJobFile(id, name) {
    $("#edit-job-id-file").attr("value", id);
    $("#edit-job-name-file").attr("value", name);
}

function editEvent(eventInfo) {
    event = $(eventInfo).data("values");

    $("#edit_event_shortname").attr("value", event['event_shortname']);
    $("#edit_event_desc").val(event['event_desc']);
    $("#edit_event_name").attr("value", event['event_name']);
    $("#edit_event_id").attr("value", event['id']);
    $("#edit_event_id_name").attr("value", event['event_id']);
    $("#edit_event_location").attr("value", event['event_location']);

}

function viewPost(postInfo) {

    post = $(postInfo).data("values");
    post_date = formatDate(new Date(post['post_date']));

    $("#view-post-title").html(post['post_title']);
    $("#view-post-author").html(post['firstname'] + " " + post['lastname']);
    $("#view-post-date").html(post_date);
    $("#view-post-content").html(post['post_text']);

}

function editMedia(mediaInfo) {

    media = $(mediaInfo).data("values");

    $("#edit_media_post_id").attr("value", media['id']);
    $("#edit_media_post_id_name").attr("value", media['post_id']);
    $("#edit_media_post_title").attr("value", media['post_title']);
    $("#edit_media_post_content").val(media['post_text']);

}

function viewMediaPost(mediaInfo) {

    media = $(mediaInfo).data("values");
    media_date = formatDate(new Date(media['post_date']));

    $("#view-media-title").html(media['post_title']);
    $("#view-media-author").html(media['firstname'] + " " + media['lastname']);
    $("#view-media-date").html(media_date);
    $("#view-media-content").html(media['post_text']);

}

function editLink(linkInfo) {

    link = $(linkInfo).data("values");

    // Link type: Link
    $("#edit_link_id_link").attr("value", link['id']);
    $("#edit_link_id_name_link").attr("value", link['link_id']);
    $("#edit_link_title_link").attr("value", link['link_name']);
    $("#edit_link_desc_link").val(link['link_desc']);
    $("#edit_link_content_link").attr("value", link['link_content']);
    $("#edit_link_tag_link").selectpicker("val", link['link_tag']);

    // Link type: File
    $("#edit_link_id_file").attr("value", link['id']);
    $("#edit_link_id_name_file").attr("value", link['link_id']);
    $("#edit_link_title_file").attr("value", link['link_name']);
    $("#edit_link_desc_file").val(link['link_desc']);
    $("#edit_link_tag_file").selectpicker("val", link['link_tag']);

}

function editAnnouncement(announcementInfo) {

    announcement = $(announcementInfo).data("values");

    date = new Date(announcement['a_date_long']).toISOString().substring(0, 10);
    datefield = document.querySelector('#edit_announcement_date');
    datefield.value = date;

    $("#edit_announcement_id").attr("value", announcement['id']);
    $("#edit_announcement_name").attr("value", announcement['a_id']);
    $("#edit_announcement_title").attr("value", announcement['a_title']);
    $("#edit_announcement_desc").val(announcement['a_text']);

}

function editAboutPrograms(aboutProgramsInfo) {

    abtprg = $(aboutProgramsInfo).data("values");

    $("#edit_about_programs_id").attr("value", abtprg['id']);
    $("#edit_about_programs_name").attr("value", abtprg['web_id']);
    $("#edit_field_name").val(abtprg['web_desc']);

}

function editInquiry(inquiryInfo) {

    inquiry = $(inquiryInfo).data("values");

    $("#edit_faq_id").attr("value", inquiry['id']);
    $("#edit_faq_name").attr("value", inquiry['faq_id']);
    $("#edit_faq_question").val(inquiry['faq_question']);
    $("#edit_faq_answer").val(inquiry['faq_answer']);

}

function editSchool(schoolInfo) {

    school = $(schoolInfo).data("values");
    school_addr = school['school_addr'].split(",");

    $("#edit_school_id").attr("value", school['id']);
    $("#edit_school_id_name").attr("value", school['school_abbv']);
    $("#edit_school_name").attr("value", school['school_name']);
    $("#edit_school_abbv").attr("value", school['school_abbv']);
    $("#edit_school_address").attr("value", school_addr[0]);
    $("#edit_school_city").attr("value", school_addr[1]);
    $("#edit_school_email").attr("value", school['school_email']);
    $("#edit_school_phone").attr("value", school['school_phone']);


}

function editPage(pageInfo) {

}