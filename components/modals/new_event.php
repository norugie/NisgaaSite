<!-- Add User Modal -->
<div class="modal fade" id="new-event-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">New Event</h4>
            </div>
            <div class="modal-body">
            <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->

                    <form id="wizard_form" class="form_validate" action="../functions/district.php?district=true&addEvent=true" method="POST">
                        <h3>Event Information</h3>
                        <fieldset>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label for="event_shortname">Event Shortname *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="event_shortname" name="event_shortname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label for="event_name">Event Name *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="event_name" name="event_name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </fieldset>

                        <h3>Event Date-Time Setup</h3>
                        <fieldset>

                        </fieldset>

                        <h3>Event Post</h3>
                        <fieldset>

                        </fieldset>
                    </form>

                <!-- #END# Inline Layout -->
            </div>
        </div>
    </div>
</div>
