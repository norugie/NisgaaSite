<!-- Edit Contact Modal -->
<div class="modal fade" id="edit-contact-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Contact Information</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form class="edit_form_validate" action="../functions/interaction.php?interaction=true&editContact=true" method="POST" enctype="multipart/form-data">
                                    <input type="text" id="edit_contact_id" name="contact_id">
                                    <input type="text" id="edit_contact_name" name="contact_name">
                                    <input type="text" id="edit_contact_previous_photo" name="contact_previous_photo">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit_contact_firstname">First Name *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="edit_contact_firstname" name="boe_firstname" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit_contact_lastname">Last Name *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="edit_contact_lastname" name="boe_lastname" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit_contact_email">Email Address *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="edit_contact_email" name="boe_email" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit_contact_phone">Phone Number *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="edit_contact_phone" name="boe_phone" onkeypress="return validateEvent(event);" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="edit_contact_photo">Contact Photo</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" class="form-control" id="edit_contact_photo" name="boe_photo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
            </div>
        </div>
    </div>
</div>