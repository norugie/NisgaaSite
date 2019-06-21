<!-- Add Job Modal -->
<div class="modal fade" id="new-job-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">New Job Posting</h4>
            </div>
            <div class="modal-body">
            <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form class="new_form_validate" action="../functions/district.php?district=true&addJob=true" method="POST" enctype="multipart/form-data">
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label for="jobid">Job ID *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="jobid" name="jobid" onkeypress="return validateEvent(event);" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <label for="title">Job Title *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="title" name="title" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="jobdesc">Job Description </label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="2" class="form-control no-resize" id="jobdesc" name="jobdesc"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="jobtype">Job Type *</label>
                                            <div class="form-group">
                                                <select class="form-control show-tick" name="jobtype" id="jobtype" title="Select job type for the posting" required>
                                                    <option value="Full-Time">Full-Time</option>
                                                    <option value="Part-Time">Part-Time</option>
                                                    <option value="Casual">Casual</option>
                                                    <option value="Remote">Remote</option>
                                                    <option value="Seasonal">Seasonal</option>
                                                    <option value="Temporary">Temporary</option>
                                                </select>                                           
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="school">School *</label>
                                            <div class="form-group">
                                                <select class="form-control show-tick" name="school" id="school" title="Select school for the job posting" required>
                                                    <?php foreach ($schools as $school): ?>
                                                        <option value="<?php echo $school['id']; ?>"><?php echo $school['school_abbv']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row clearfix">
                                        <div class="input-daterange input-group" id="bs_datepicker_range_container_new">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="job-open">Starting Date for Job Posting *</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="job-open" name="job-open" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="job-close">Closing Date for Job Posting *</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="job-close" name="job-close" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="jobfile">Job File Upload *</label>
                                            <p class="font-12"><i><b>Note:</b> The max file size you can upload is 20 MB</i></p>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" name="jobfile" id="fileToUpload" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="float: right;">
                                            <button type="submit" class="btn bg-blue-grey btn-block btn-lg waves-effect">SAVE</button>  
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Inline Layout -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateEvent(event) {
        var regex = new RegExp("^[0-9-]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }       
</script>