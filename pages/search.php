<?php
    $keyword = str_replace('%20', ' ', $_GET['keyword']);
    $school = 2;
    $blogs = $site->blogSearchResults($database, $keyword, $school);
?>
<div class="col-md-9">
    <!-- BLOG RESULTS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Blog</h2>
                </div>
                <?php if(count($blogs) < 1){ ?><p class="lead">No blog posts found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <div class="row">
                    <?php foreach($blogs as $blog): ?>
                        <div class="col-lg-3">
                            <div class="home-blog-post">
                                <div class="image"><img src="images/thumbnails/<?php echo $blog['post_thumbnail']; ?>" alt="..." class="img-fluid">
                                <div class="overlay d-flex align-items-center justify-content-center"><a href="/?page=blog&id=<?php echo preg_replace('/[a-zA-Z]/', '', $blog['post_id']); ?>" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                                </div>
                                <div class="text">
                                    <h4><a href="/?page=blog&id=<?php echo preg_replace('/[a-zA-Z]/', '', $blog['post_id']); ?>"><?php echo $blog['post_title']; ?></a></h4>
                                    <p class="author-category">By <?php echo $blog['firstname'] . " " . $blog['lastname']; ?></p>
                                    <p class="author-category"><?php echo date_format(date_create($blog['post_date']), 'd M Y'); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- RESOURCES RESULTS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Resources</h2>
                </div>
                
            </div>
        </div>
    </section>
    
    <!-- FILES RESULTS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Files</h2>
                </div>
                
            </div>
        </div>
    </section>
</div>