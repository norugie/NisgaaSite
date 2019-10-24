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
                                    <input type="text" id="edit_boe_id" name="boe_id" hidden>
                                    <input type="text" id="edit_boe_name" name="boe_name" hidden>
                                    <input type="text" id="edit_boe_previous_photo" name="boe_previous_photo" hidden>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit_boe_firstname">First Name *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="edit_boe_firstname" name="boe_firstname" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit_boe_lastname">Last Name *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="edit_boe_lastname" name="boe_lastname" required>
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
                                                    <input type="text" class="form-control" id="edit_boe_phone" name="boe_phone" onkeypress="return validateEvent(event);" required>
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
                                            <p class="font-12"><i><b>Note:</b> The max file size you can upload is 10 MB</i></p>
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

<!-- Edit BOE Image Modal -->

<div class="modal fade" id="edit-boe-image-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit BOE Group Image</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required.</i></p><br>
                <p class=""><b>Set the photo position for each trustee from left to right, with 1 being the left most position.</b></p>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="edit_form_validate" action="../functions/interaction.php?interaction=true&editBOEImage=true" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <input type="text" name="edit_boe_position_id_c" value="<?php echo $chairperson['id']; ?>" hidden>
                                    <label>Chairperson - <?php echo $chairperson['firstname'] . " " . $chairperson['lastname']; ?></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" min="1" max="5" value="<?php echo $chairperson['photo_position']; ?>" name="boe_position_c" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <input type="text" name="edit_boe_position_id_v" value="<?php echo $vchairperson['id']; ?>" hidden>
                                    <label>Vice-Chairperson - <?php echo $vchairperson['firstname'] . " " . $vchairperson['lastname']; ?></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control"  min="1" max="5" value="<?php echo $vchairperson['photo_position']; ?>" name="boe_position_v" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <?php $ctr_boe = 1; ?>
                                <?php foreach($trustees as $t): ?>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <input type="text" name="edit_boe_position_id_t_<?php echo $ctr_boe; ?>" value="<?php echo $t['id']; ?>" hidden>
                                        <label>Trustee - <?php echo $t['firstname'] . " " . $t['lastname']; ?></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" min="1" max="5" value="<?php echo $t['photo_position']; ?>" name="boe_position_t_<?php echo $ctr_boe; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $ctr_boe++; ?>
                                <?php endforeach; ?>
                            </div>
                            <hr>

                            <input type="text" id="edit_boe_image_id" name="edit_boe_image_id" hidden>
                            <input type="text" id="edit_boe_image_name" name="edit_boe_image_name" hidden>

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_boe_image">Group Image *</label>
                                    <p class="font-12"><i><b>Note:</b> The max file size you can upload is 10 MB</i></p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="boe_group_image" id="imgInp" accept="image/x-png, image/jpeg" required>
                                        </div>
                                        <br>
                                        <center>
                                            <img class="img-responsive" id='img-upload' style="width: 80%;">
                                        </center>
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

<script type="text/javascript">

    $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
        });
        
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});

    function validateEvent(event) {
        var regex = new RegExp("^[0-9-+]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }       
</script>