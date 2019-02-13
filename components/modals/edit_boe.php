<!-- Edit BOE Modal -->
<div class="modal fade" id="edit-boe-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Board Member Information</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form class="edit_form_validate" action="../functions/interaction.php?interaction=true&editBOE=true" method="POST" enctype="multipart/form-data">
                                    <input type="text" id="edit_boe_id" name="boe_id">
                                    <input type="text" id="edit_boe_name" name="boe_name">
                                    <input type="text" id="edit_boe_previous_photo" name="boe_previous_photo">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit_boe_firstname">First Name *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="edit_boe_firstname" name="boe_firstnamee" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit_boe_lastname">Last Name *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="edit_boe_lastname" name="boe_lastnamee" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit_boe_email">Email Address *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="edit_boe_email" name="boe_email" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit_boe_phone">Phone Number *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="edit_boe_phone" name="boe_phone" onkeypress="return validateEvent(event);" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="edit_boe_trustee_for">Trustee For *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="edit_boe_trustee_for" name="boe_trustee_for" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="edit_boe_photo">Trustee Photo</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" class="form-control" id="edit_boe_photo" name="boe_photo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="edit_boe_writeup">Trustee Writeup</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="2" class="form-control no-resize" id="edit_boe_writeup" name="boe_writeup"></textarea>
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

<script type="text/javascript">
    function validateEvent(event) {
        var regex = new RegExp("^[0-9-+]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }       
</script>