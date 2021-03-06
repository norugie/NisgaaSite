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
                                        <div id="image-display-new" style="display:none;">
                                            <center>
                                                <p class="font-12"><i><b>Note:</b> This cropping functionality is mainly to help in orienting the image horizontally, with focus on what you'd like to see on the home page's image carousel. The image may look different depending on the resolution size of the screen the website is being viewed on.</i></p>
                                                <img class="img-responsive" id="img-upload-new" style="width: 80%;">
                                                <input type="text" id="cropped-image-value-new" name="cropped_image_value_new" value="" hidden>
                                            </center>
                                        </div>
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
                width: 800,
                height: 420,
                type: 'square' //circle
            },
            boundary:{
                width: 800,
                height: 600
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
                    $("#image-display-new").css("display", "block");
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

        $("#submit-carousel-new").click(function(){
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $("#cropped-image-value-new").attr("value", response);
            });
        })
        

		$("#imgInpCarouselNew").change(function(){
            readURL(this);
        });
    });
</script>