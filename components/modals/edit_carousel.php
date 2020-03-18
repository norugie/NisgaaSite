<!-- Edit Carousel Image Modal -->

<div class="modal fade" id="edit-carousel-image-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Carousel Image</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required.</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="edit_form_validate" action="../functions/interaction.php?interaction=true&editCarouselImage=true" method="POST" enctype="multipart/form-data">
                            <input type="text" id="edit_carousel_image_id" name="edit_carousel_image_id" hidden>
                            <input type="text" id="edit_carousel_image_name" name="edit_carousel_image_name" hidden>

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_carousel_caption">Image Caption </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="edit_carousel_caption" name="carousel_caption">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_carousel_image">Carousel Image *</label>
                                    <p class="font-12"><i><b>Note:</b> The max file size you can upload is 20 MB</i></p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="carousel_image" id="imgInp" accept="image/*">
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