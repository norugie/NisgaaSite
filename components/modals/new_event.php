

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

                    <form id="wizard_form" class="new_form_validate" action="../functions/district.php?district=true&addEvent=true" method="POST" enctype="multipart/form-data">
                        <h3>Event Information</h3>
                        <fieldset>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label for="event_shortname">Event Shortname *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="event_shortname" name="event_shortname" onkeypress="return validateEvent(event);" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <label for="event_name">Event Name *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="event_name" name="event_name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="event_desc">Event Description </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" id="event_desc" name="event_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="event_location">Event Location </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="event_location" name="event_location">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="event_type">Event Type *</label>
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="event_type" id="event_type" onchange="showDateTimeSetup(this);" title="Select event type" required>
                                            <option value="Single">Single</option>
                                            <option value="Continuous">Multiple, Continuous</option>
                                            <option value="Segmented">Multiple, Segmented</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <h3>Event Date-Time Setup</h3>
                        <fieldset>
                            <div id="single-type" hidden>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="event_date_start_single_1">Event Date *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" class="form-control" id="event_date_start_single_1" name="event_date_start_single_1" min="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="event_time_single_1">Event Time *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="time" class="form-control" id="event_time_single_1" name="event_time_single_1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="continuous-type" hidden>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label for="event_date_start_continuous_1">Event Date Start *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" class="form-control" id="event_date_start_continuous_1" name="event_date_start_continuous_1" min="<?php echo date('Y-m-d');?>" onchange="dateChange(this);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label for="event_date_end_continuous_1">Event Date End *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" class="form-control" id="event_date_end_continuous_1" name="event_date_end_continuous_1" min="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="event_time_continuous_1">Event Time *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="time" class="form-control" id="event_time_continuous_1" name="event_time_continuous_1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="segmented-type" hidden>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: right;">
                                        <button type="button" class="btn bg-blue btn-block btn-lg waves-effect" onclick="addDays();">ADD</button>  
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: right;">
                                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect" onclick="removeDays();">REMOVE</button>  
                                    </div>
                                </div>
                                <br>
                                <div class="row clearfix 1-day">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="event_date_start_segmented_1">Event Date: Day 1 *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" class="form-control" id="event_date_start_segmented_1" name="event_date_start_segmented_1" min="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="event_time_segmented_1">Event Time: Day 1 *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="time" class="form-control" id="event_time_segmented_1" name="event_time_segmented_1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <h3>Event Post</h3>
                        <fieldset>
                            <input type="text" id="ctr_value_event" name="ctr_value_event" hidden>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="post_title">Post Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="post_title" name="post_title" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix" <?php if($_SESSION['school'] == 3 || $_SESSION['school'] == 4 || $_SESSION['school'] == 5 || $_SESSION['school'] == 6){ echo "hidden"; } ?>>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="post_fb_autopost">Post on SD92 Social Media Platforms?</label>
                                    <p class="font-12"><i><b>Note:</b> Posting the new post on SD92's social media outlets will take at least 10 minutes after the post's creation.</i></p>
                                    <div class="demo-radio-button">
                                        <input type="radio" name="post_sm_autopost" id="sm_opt_1" class="radio-col-blue-grey with-gap" value="No" checked>
                                        <label for="sm_opt_1">No</label>
                                        <input type="radio" name="post_sm_autopost" id="sm_opt_2" class="radio-col-blue-grey with-gap" value="Yes">
                                        <label for="sm_opt_2">Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="post_thumbnail">Post Thumbnail</label>
                                    <p class="font-12"><i><b>Note:</b> The max image size you can upload is 10 MB</i></p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="post_thumbnail" id="post_thumbnail" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="post_content" style="margin-bottom:10px;">Post Content *</label><br>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="tinymce_editor" id="post_content" name="post_content">

                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>

                <!-- #END# Inline Layout -->
            </div>
        </div>
    </div>
</div>

<script>

    var ctr_event = 1;

    function showDateTimeSetup(e){
        var selectedType = $(e).children("option:selected").val();
        
        if(selectedType === 'Single'){
            $('#single-type').removeAttr('hidden');
            $('#continuous-type').attr('hidden', true);
            $('#segmented-type').attr('hidden', true);
            ctr_event = 1;
        } else if(selectedType === 'Continuous'){
            $('#continuous-type').removeAttr('hidden');
            $('#single-type').attr('hidden', true);
            $('#segmented-type').attr('hidden', true);
            ctr_event = 1;
        } else {
            $('#segmented-type').removeAttr('hidden');
            $('#single-type').attr('hidden', true);
            $('#continuous-type').attr('hidden', true);
            ctr_event = 1;
        }
    }

    function addDays(){
        ctr_event++;

        $("#segmented-type").append('<div class="row clearfix '+ctr_event+'-day"><div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><label for="event_date_start_segmented_'+ctr_event+'">Event Date: Day '+ctr_event+' *</label><div class="form-group"><div class="form-line"><input type="date" class="form-control" id="event_date_start_segmented_'+ctr_event+'" name="event_date_start_segmented_'+ctr_event+'" min="<?php echo date('Y-m-d');?>"></div></div></div><div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><label for="event_time_segmented_'+ctr_event+'">Event Time: Day '+ctr_event+' *</label><div class="form-group"><div class="form-line"><input type="time" class="form-control" id="event_time_segmented_'+ctr_event+'" name="event_time_segmented_'+ctr_event+'"></div></div></div></div>');
    }

    function removeDays(){
        if(ctr_event > 1){
            $('.'+ctr_event+'-day').remove();
            ctr_event--;
        }
    }


    function dateChange(e){
        var datearray1 = $(e).val().split("-");
        var year1 = datearray1[0];
        var month1 = datearray1[1];
        var day1 = datearray1[2];
        var minDate1 = (year1 +"-"+ month1 +"-"+ day1);

        var datearray2 = $('#event_date_end_continuous_1').val().split("-");
        var year2 = datearray2[0];
        var month2 = datearray2[1];
        var day2 = datearray2[2];
        var minDate2 = (year2 +"-"+ month2 +"-"+ day2);

        $('#event_date_end_continuous_1').attr('min',minDate1);

        if(minDate2 < minDate1) 
            $('#event_date_end_continuous_1').val(minDate1); 
    }     


</script>