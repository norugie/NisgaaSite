<!-- JUMBOTRON -->
<section class="no-mb relative-positioned">
    <div class="relative-positioned">
        <div class="row jumbotron-new">
            <div class="col-md-9 jumbotron-left">
                <section>
                    <div class="owl-carousel owl-theme" id="owl-demo">
                        <div>
                            <div class="owl-text-overlay d-none d-sm-block">
                                <h2 class="owl-title d-none d-md-block">Image 1</h2>
                                <p class="owl-caption d-none d-md-block lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent iaculis purus vel enim suscipit, vitae volutpat ante scelerisque. Pellentesque blandit malesuada dui, sed aliquet risus molestie non.</p>
                            </div>
                            <img class="owl-img" src="images/carousel/ca-1.jpg">
                        </div>
                        <div>
                            <div class="owl-text-overlay d-none d-sm-block">
                                <h2 class="owl-title d-none d-md-block">Image 2</h2>
                                <p class="owl-caption d-none d-md-block lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent iaculis purus vel enim suscipit, vitae volutpat ante scelerisque. Pellentesque blandit malesuada dui, sed aliquet risus molestie non.</p>
                            </div>
                            <img class="owl-img" src="images/carousel/ca-2.jpg">
                        </div>
                        <div>
                            <div class="owl-text-overlay d-none d-sm-block">
                                <h2 class="owl-title d-none d-md-block">Image 3</h2>
                                <p class="owl-caption d-none d-md-block lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent iaculis purus vel enim suscipit, vitae volutpat ante scelerisque. Pellentesque blandit malesuada dui, sed aliquet risus molestie non.</p>
                            </div>
                            <img class="owl-img" src="images/carousel/ca-3.jpg">
                        </div>
                        <div>
                            <div class="owl-text-overlay d-none d-sm-block">
                                <h2 class="owl-title d-none d-md-block">Image 4</h2>
                                <p class="owl-caption d-none d-md-block lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent iaculis purus vel enim suscipit, vitae volutpat ante scelerisque. Pellentesque blandit malesuada dui, sed aliquet risus molestie non.</p>
                            </div>
                            <img class="owl-img" src="images/carousel/ca-4.jpg">
                        </div>
                        <div>
                            <div class="owl-text-overlay d-none d-sm-block">
                                <h2 class="owl-title d-none d-md-block">Image 5</h2>
                                <p class="owl-caption d-none d-md-block lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent iaculis purus vel enim suscipit, vitae volutpat ante scelerisque. Pellentesque blandit malesuada dui, sed aliquet risus molestie non.</p>
                            </div>
                            <img class="owl-img" src="images/carousel/ca-5.jpg">
                        </div>
                        <div>
                            <div class="owl-text-overlay d-none d-sm-block">
                                <h2 class="owl-title d-none d-md-block">Image 6</h2>
                                <p class="owl-caption d-none d-md-block lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent iaculis purus vel enim suscipit, vitae volutpat ante scelerisque. Pellentesque blandit malesuada dui, sed aliquet risus molestie non.</p>
                            </div>
                            <img class="owl-img" src="images/carousel/ca-6.jpg">
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-3 jumbotron-right">

                <nav id="myTab" role="tablist" class="nav nav-tabs nav-justified">
                    <a id="tab4-1-tab" data-toggle="tab" href="#tab4-1" role="tab" aria-controls="tab4-1" aria-selected="true" class="nav-item nav-link active my-auto" style="border:none;">Quick Links</a>
                    <a id="tab4-2-tab" data-toggle="tab" href="#tab4-2" role="tab" aria-controls="tab4-2" aria-selected="false" class="nav-item nav-link my-auto" style="border:none;">Nisga’a Phrase of the Week</a>
                </nav>
                <div id="nav-tabContent" class="tab-content" style="border:none;">
                    <div id="tab4-1" role="tabpanel" aria-labelledby="tab4-1-tab" class="tab-pane fade show active">
                        <div class="panel panel-default sidebar-menu">
                            <div class="panel-body">
                                <ul class="nav nav-pills flex-column text-sm">
                                    <?php foreach($quick_links as $ql): ?>
                                        <li class="nav-item"><a href="<?php if($ql['link_type'] == 'File'){ echo "../links/"; } echo $ql['link_content']; ?>" class="nav-link" <?php if($ql['link_type'] == 'Link'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $ql['link_name']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="tab4-2" role="tabpanel" aria-labelledby="tab4-2-tab" class="tab-pane fade">
                        This is tab two.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- JUMBOTRON END -->
<!-- INFORMATION BAR -->
<section class="bar bg-primary no-mb color-white">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <h1>Block with primary background</h1>
            <p class="lead mb-0">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
        </div>
        </div>
    </div>
</section>
<!-- INFORMATION BAR END -->