<?php 
    $roles = $district->roleList($database);
    $schools = $district->schoolList($database); 
?>
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
                                <form action="../functions/district.php?district=true&addUser=true" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label for="jobid">Job ID *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="jobid" name="jobid" required>
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
                                                    <textarea rows="3" class="form-control no-resize" id="jobdesc" name="jobdesc"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="role">Job Type *</label>
                                            <select class="form-control show-tick" name="role" id="role">
                                                <option selected hidden disabled>-- SELECT JOB TYPE FOR THE POSTING --</option>
                                                <option value="Full-Time">Full-Time</option>
                                                <option value="Part-Time">Part-Time</option>
                                                <option value="Casual">Casual</option>
                                                <option value="Remote">Remote</option>
                                                <option value="Seasonal">Seasonal</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="school">School *</label>
                                            <select class="form-control show-tick" name="school" id="school">
                                                <option selected hidden disabled>-- SELECT SCHOOL FOR THE JOB POSTING --</option>
                                                <?php foreach ($schools as $school): ?>
                                                    <option value="<?php echo $school['id']; ?>"><?php echo $school['school_abbv']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row clearfix">
                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="jobopen">Starting Date for Job Posting *</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="jobopen" name="jobopen" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="jobclose">Closing Date for Job Posting *</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="jobclose" name="jobclose" required>
                                                    </div>
                                                </div>
                                            </div>
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
