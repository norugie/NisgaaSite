<?php $carousel = $interaction->carouselList($database); ?>

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
                                        <p><?php echo $c['carousel_desc']; ?></p>
                                        <p>
                                            <a href="javascript:void(0);" class="btn btn-primary waves-effect" role="button">BUTTON</a>
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