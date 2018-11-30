<?php 
    $roles = $district->roleList($database);
    $schools = $district->schoolList($database); 
?>
<!-- Edit Job Modal -->
<div class="modal fade" id="edit-job-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Job Posting</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form action="../functions/district.php?district=true&editJobDetails=true" method="POST">
                                <input type="text" id="edit-job-id-num" name="job-id" hidden>
                                <input type="text" id="edit-jobid-hidden" name="jobid-name" hidden>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="edit-title">Job Title *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="edit-title" name="title" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="edit-jobdesc">Job Description </label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="2" class="form-control no-resize" id="edit-jobdesc" name="jobdesc"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit-jobtype">Job Type *</label>
                                            <select class="form-control show-tick" name="jobtype" id="edit-jobtype">
                                                <option selected hidden disabled>-- SELECT JOB TYPE FOR THE POSTING --</option>
                                                <option value="Full-Time">Full-Time</option>
                                                <option value="Part-Time">Part-Time</option>
                                                <option value="Casual">Casual</option>
                                                <option value="Remote">Remote</option>
                                                <option value="Seasonal">Seasonal</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit-school">School *</label>
                                            <select class="form-control show-tick" name="school" id="edit-school">
                                                <option selected hidden disabled>-- SELECT SCHOOL FOR THE JOB POSTING --</option>
                                                <?php foreach ($schools as $school): ?>
                                                    <option value="<?php echo $school['id']; ?>"><?php echo $school['school_abbv']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: right; margin-right: 12px;">
                                        <button type="submit" class="btn bg-blue-grey btn-block btn-lg waves-effect">SAVE</button>  
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

<!-- Edit Job Dates Modal -->
<div class="modal fade" id="edit-job-dates-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Job Posting Date Range</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form action="../functions/district.php?district=true&jobReopen=true" method="POST">
                                    <input type="text" id="edit-job-id" name="jobid" hidden>
                                    <input type="text" id="edit-job-name" name="jobid-name" hidden>
                                    <input type="text" id="edit-job-identifier" name="identifier" hidden>
                                    <div class="row clearfix">
                                        <div class="input-daterange input-group" id="bs_datepicker_range_container_edit">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="edit-job-open">Starting Date for Job Posting *</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="edit-job-open" name="edit-job-open" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="edit-job-close">Closing Date for Job Posting *</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="edit-job-close" name="edit-job-close" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: right; margin-right: 12px;">
                                            <button type="submit" class="btn bg-blue-grey btn-block btn-lg waves-effect">SAVE</button>  
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Job Dates Modal -->
<div class="modal fade" id="edit-job-file-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Job Posting File</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form action="../functions/district.php?district=true&editJobFile=true" method="POST" enctype="multipart/form-data">
                                    <input type="text" id="edit-job-id-file" name="jobid" hidden>
                                    <input type="text" id="edit-job-name-file" name="jobid-name" hidden>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="jobfile">Job File Upload *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" name="edit-jobfile" id="fileToUploadEdit" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: right; margin-right: 12px;">
                                            <button type="submit" class="btn bg-blue-grey btn-block btn-lg waves-effect">SAVE</button>  
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>