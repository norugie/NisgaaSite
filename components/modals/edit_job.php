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
                <form action="../functions/district.php?district=true&jobReopen=true" method="POST">
                    <input type="text" id="edit-job-id-file" name="jobid">
                    <input type="text" id="edit-job-name-file" name="jobid-name">
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