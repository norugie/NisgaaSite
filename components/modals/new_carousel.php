<!-- New Carousel Image Modal -->

<div class="modal fade" id="new-carousel-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">New Carousel Image</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required.</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="new_form_validate" action="../functions/interaction.php?interaction=true&newCarouselImage=true" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="carousel_caption">Image Caption</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="carousel_caption" name="carousel_caption">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="carousel_image">Carousel Image *</label>
                                    <p class="font-12"><i><b>Note:</b> The max file size you can upload is 20 MB</i></p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="carousel_image" id="imgInpCarouselNew" accept="image/x-png, image/jpeg" required>
                                        </div>
                                        <br>
                                        <center>
                                            <img class="img-responsive" id="img-upload-new" style="width: 80%;" hidden>
                                            <input type="text" id="cropped_image_value_new" name="cropped_image_value_new" value="">
                                        </center>
                                    </div>

                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="float: right;">
                                    <button type="submit" id="submit-carousel-new" class="btn bg-blue-grey btn-block btn-lg waves-effect">SAVE</button>  
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

        $image_crop = $("#img-upload-new").croppie({
            enableExif: true,
            viewport: {
                width: 600,
                height: 300,
                type: 'square' //circle
            },
            boundary:{
                width: 600,
                height: 400
            }
        });

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
                    $image_crop.croppie('bind', {
                        url: e.target.result
                    }).then(function(){
                        console.log("Success!");
                    });
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

        $("#submit-carousel-new").click(function(){
            var randomNumber = Math.floor(Math.random() * (99999 - 11111 + 1)) + 11111;
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport',
                name: 'CRSL-' + randomNumber
            }).then(function(response){
                $("#cropped_image_value_new").attr("value", response);
            });
        })
        

		$("#imgInpCarouselNew").change(function(){
            readURL(this);
        });
    });
</script>