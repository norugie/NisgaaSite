<!-- BLOG LIST -->

<?php $blog_list = $site->blogList($database, 2); ?>

<div id="blog-listing-medium" class="col-md-9">
    <?php foreach($blog_list as $blog): ?>
        <section class="post">
            <div class="row">
                <div class="col-md-3">
                    <div class="image"><a href="blog-post.html"><img src="images/thumbnails/<?php echo $blog['post_thumbnail']; ?>" alt="..." class="img-fluid"></a></div>
                </div>
                <div class="col-md-9">
                    <h2 class="h3 mt-0"><a href="post.htmls"><?php echo $blog['post_title']; ?></a></h2>
                    <div class="d-flex flex-wrap justify-content-between text-xs">
                        <p class="author-category">By <?php echo $blog['firstname'] . " " . $blog['lastname']; ?></p>
                        <p class="date-comments"><a href="blog-post.html"><i class="fa fa-calendar-o"></i><?php echo date_format(date_create($blog['post_date']), 'd M Y'); ?></a></p>
                    </div>
                    <p class="intro"><?php echo $blog['post_desc']; ?></p>
                    <a href="blog-post.html">Read More →</a>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <!-- PAGINATION -->

        
    <!-- <div class="pages">
        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link">First</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">Last</a></li>
            </ul>
        </nav>
    </div> -->
    <ul class="pager list-unstyled d-flex align-items-center justify-content-between">
        <li class="previous"><a href="#" class="btn btn-template-outlined">← Older</a></li>
        <li class="next disabled"><a href="#" class="btn btn-template-outlined">Newer →</a></li>
    </ul>
    <br>
</div>
