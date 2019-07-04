<?php $links = $site->linkList($database, 'General Resources', $schoolContent); ?>
<div class="col-md-9">
    <!-- GENERAL RESOURCE INFO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">The following are resources that anyone from the district can use for general purposes:</p>
            </div>
        </div>
    </section>
    
    <!-- GENERAL RESOURCE CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="row products products-big">
                    <?php foreach($links as $link): ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-blog-mobile">
                            <div class="product">
                                <div class="image"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><img src="/images/thumbnails/<?php echo $link['link_thumbnail']; ?>" alt="" class="img-fluid image1" style="max-width: 80% !important;"></a></div>
                                <div class="text">
                                    <h5><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></h5>
                                    <p class="lead mb-0"><?php echo $link['link_desc']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    
</div>