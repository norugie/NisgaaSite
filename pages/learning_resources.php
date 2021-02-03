<?php $links = $site->linkList($database, 'Learning Resources', $schoolContent); ?>

<style>

    .iframe-container {
    padding-top: 56.25%;
    position: relative;
    }
    .iframe-container iframe {
    border: 0;
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    }
    /* 4x3 Aspect Ratio */
    .iframe-container-4x3 {
    padding-top: 75%;
    }

</style>

<div class="col-md-9">
    <!-- LEARNING RESOURCE INFO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">The following are resources that anyone from the district can use for learning purposes</p>
            </div>
        </div>
    </section>

    <!-- LEARNING RESOURCE CONTENT FROM BCERAC -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Resources from BCERAC</h2>
                </div>
                <div class="iframe-container">
                    <iframe src= "https://bcerac.ca/district-access-iframe/" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <br>

    <!-- LEARNING RESOURCE CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>District Learning Resources</h2>
                </div>
                <div class="row products products-big">
                    <?php foreach($links as $link): ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-blog-mobile">
                            <div class="product">
                                <div class="image"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank" rel="noreferrer"><img src="/images/thumbnails/<?php echo $link['link_thumbnail']; ?>" alt="" class="img-fluid image1" style="max-width: 80% !important;"></a></div>
                                <div class="text">
                                    <h5><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank" rel="noreferrer"><?php echo $link['link_name']; ?></a></h5>
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