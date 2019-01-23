<?php $links = $site->linkList($database, 'Learning Resources', 2); ?>
<div class="col-md-9">
    <!-- LEARNING RESOURCE INFO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>
            </div>
        </div>
    </section>
    
    <!-- LEARNING RESOURCE CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="row products products-big">
                    <?php foreach($links as $link): ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="product">
                                <div class="image"><a href="<?php if($link['link_type'] == 'File'){ echo "../links/"; } echo $link['link_content']; ?>" <?php if($link['link_type'] == 'Link'){?>target="_blank"<?php } else { ?> download <?php } ?>><img src="images/thumbnails/<?php echo $link['link_thumbnail']; ?>" alt="" class="img-fluid"></a></div>
                                <div class="text">
                                    <h3 class="h5"><a href="<?php if($link['link_type'] == 'File'){ echo "../links/"; } echo $link['link_content']; ?>" <?php if($link['link_type'] == 'Link'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $link['link_name']; ?></a></h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    
</div>