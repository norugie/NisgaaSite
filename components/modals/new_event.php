

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
                                            <input type="text" class="form-control" id="event_shortname" name="event_shortname">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <label for="event_name">Event Name *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="event_name" name="event_name">
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
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="event_type">Event Type *</label>
                                    <select class="form-control show-tick" name="event_type" id="event_type" onchange="showDateTimeSetup(this);">
                                        <option selected hidden disabled>-- SELECT TYPE FOR THE EVENT --</option>
                                        <option value="Single">Single</option>
                                        <option value="Continuous">Multiple, Continuous</option>
                                        <option value="Segmented">Multiple, Segmented</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="event_school">Hosting School *</label>
                                    <select class="form-control show-tick" name="event_school" id="event_school">
                                        <option selected hidden disabled>-- SELECT HOSTING SCHOOL FOR THE EVENT --</option>
                                        <?php foreach ($schools as $school): ?>
                                            <option value="<?php echo $school['id']; ?>"><?php echo $school['school_abbv']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
                                                <input type="text" class="form-control" id="event_date_start_single_1" name="event_date_start_single_1">
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
                                        <label for="event_date_start_continuous_1">Event Date *</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" class="form-control" id="event_date_start_continuous_1" name="event_date_start_continuous_1" min="<?php echo date('Y-m-d');?>" onchange="dateChange(this);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label for="event_date_end_continuous_1">Event Date *</label>
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
                                                <input type="text" class="form-control" id="event_time_continuous_1" name="event_time_continuous_1">
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
                                                <input type="text" class="form-control" id="event_time_segmented_1" name="event_time_segmented_1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <h3>Event Post</h3>
                        <fieldset>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="post_title">Post Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="post_title" name="post_title">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="post_cat">Post Categories *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="post_cat" name="post_cat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea id="tinymce">
                                        <h2>WYSIWYG Editor</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ullamcorper sapien non nisl facilisis bibendum in quis tellus. Duis in urna bibendum turpis pretium fringilla. Aenean neque velit, porta eget mattis ac, imperdiet quis nisi. Donec non dui et tortor vulputate luctus. Praesent consequat rhoncus velit, ut molestie arcu venenatis sodales.</p>
                                        <h3>Lacinia</h3>
                                        <ul>
                                            <li>Suspendisse tincidunt urna ut velit ullamcorper fermentum.</li>
                                            <li>Nullam mattis sodales lacus, in gravida sem auctor at.</li>
                                            <li>Praesent non lacinia mi.</li>
                                            <li>Mauris a ante neque.</li>
                                            <li>Aenean ut magna lobortis nunc feugiat sagittis.</li>
                                        </ul>
                                        <h3>Pellentesque adipiscing</h3>
                                        <p>Maecenas quis ante ante. Nunc adipiscing rhoncus rutrum. Pellentesque adipiscing urna mi, ut tempus lacus ultrices ac. Pellentesque sodales, libero et mollis interdum, dui odio vestibulum dolor, eu pellentesque nisl nibh quis nunc. Sed porttitor leo adipiscing venenatis vehicula. Aenean quis viverra enim. Praesent porttitor ut ipsum id ornare.</p>
                                    </textarea>
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

    var ctr = 1;

    function showDateTimeSetup(e){
        var selectedType = $(e).children("option:selected").val();
        
        if(selectedType === 'Single'){
            $('#single-type').removeAttr('hidden');
            $('#continuous-type').attr('hidden', true);
            $('#segmented-type').attr('hidden', true);
        } else if(selectedType === 'Continuous'){
            $('#continuous-type').removeAttr('hidden');
            $('#single-type').attr('hidden', true);
            $('#segmented-type').attr('hidden', true);
        } else {
            $('#segmented-type').removeAttr('hidden');
            $('#single-type').attr('hidden', true);
            $('#continuous-type').attr('hidden', true);
        }
    }

    function addDays(){
        ctr++;

        $("#segmented-type").append('<div class="row clearfix '+ctr+'-day"><div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><label for="event_date_start_segmented_'+ctr+'">Event Date: Day '+ctr+' *</label><div class="form-group"><div class="form-line"><input type="date" class="form-control" id="event_date_start_segmented_'+ctr+'" name="event_date_start_segmented_'+ctr+'" min="<?php echo date('Y-m-d');?>"></div></div></div><div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><label for="event_time_segmented_'+ctr+'">Event Time: Day '+ctr+' *</label><div class="form-group"><div class="form-line"><input type="text" class="form-control" id="event_time_segmented_'+ctr+'" name="event_time_segmented_'+ctr+'"></div></div></div></div>');
    }

    function removeDays(){
        if(ctr > 1){
            $('.'+ctr+'-day').remove();
            ctr--;
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