<?php $carousel = $interaction->carouselList($database); ?>

<?php require '../components/modals/edit_carousel.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>HOME CAROUSEL</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <center>
                            <?php if($_SESSION['type'] != 3){ ?>
                                <button type="button" class="btn bg-green waves-effect" style="display: inline-block;" data-toggle="modal" data-target="#edit-carousel-modal"><i class="material-icons">find_replace</i><span>REPLACE ALL</span></button>
                            <?php } ?>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>ACTIVE IMAGES</h4>
                        <div class="row">
                            <?php foreach($carousel as $c): ?>
                            <div class="col-sm-6 col-md-2">
                                <div class="thumbnail">
                                    <img src="../images/carousel/<?php echo $c['carousel_name']; ?>">
                                    <div class="caption">
                                        <h3>Image Caption</h3>
                                        <p style="color:#000!important;"><?php echo $c['carousel_desc']; ?></p>
                                        <p>
                                            <center>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_horiz</i>
                                                        <span>OPTIONS</span> <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" data-toggle="modal" data-target="#edit-carousel-image-modal" data-values='<?php echo json_encode(str_replace("'", "&apos;", $c)); ?>' onclick="editCarouselImage(this);">Modify Image</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a href="#" data-type="delete-carousel-image" data-id="<?php echo $c['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $c['carousel_name']); ?>" onclick="alertDesign(this);">Delete Image</a></li>
                                                    </ul>
                                                </div>
                                            </center>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>