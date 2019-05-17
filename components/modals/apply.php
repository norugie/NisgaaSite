<div id="apply-modal" tabindex="-1" role="dialog" aria-labelledby="apply-modalLabel" aria-hidden="true" class="modal fade">
    <div role="document" class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="apply-modalLabel" class="modal-title">Job Application</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="heading"><h4 class="text-center">Personal Details</h4></div>
                            <div class="form-group">
                                <label for="firstname">First Name *</label>
                                <input type="text" id="firstname" name="firstname" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name *</label>
                                <input type="text" id="lastname" name="lastname" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="heading"><h4 class="text-center">Contact Details</h4></div>
                            <div class="form-group">
                                <label for="address">Address *</label>
                                <input type="text" id="address" name="address" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">City *</label>
                                        <input type="text" id="city" name="city" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">Province *</label>
                                        <input type="text" id="province" name="province" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">Country *</label>
                                        <input type="text" id="country" name="country" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">Postal Code *</label>
                                        <input type="text" id="postal" name="postal" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Email Address *</label>
                                <input type="text" id="email" name="email" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Phone Number *</label>
                                <input type="text" id="phone" name="phone" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="heading"><h4 class="text-center">Qualifications</h4></div>
                            <div class="form-group">
                                <label for="degree">Do you have a degree?</label>&nbsp;&nbsp;
                                <label class="radio-inline" style="color:#000;"><input type="radio" id="degree-yes" name="degree" class="form-control" checked> Yes</label> &nbsp;&nbsp;
                                <label class="radio-inline" style="color:#000;"><input type="radio" id="degree-no" name="degree" class="form-control"> No</label>
                            </div>
                            <div class="form-group">
                                <label for="title">If yes, tell us your degree title </label>
                                <input type="text" id="title" name="title" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="resume">Resume *</label>
                                <input type="file" id="resume" name="resume" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="offset-lg-10 offset-md-10 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-template-main btn-block btn-lg">SUBMIT</button>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>