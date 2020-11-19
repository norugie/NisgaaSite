<?php 
    $about = $site->specialAboutList($database, $schoolContent, $page_name);
?>
<div class="col-md-9">
    <!-- STRONG CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <!-- Display description for NLC -->
                <p class="lead"><?php echo $about['web_desc']; ?></p>
            </div>
        </div>
    </section>
    <!--  NLC POSTS -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>NLC Posts</b></p>
                <div class="row">
                    <!-- POST LIST -->

                    <?php 

                    $limit = 6; 
                    $sheet;
                    $category = 0;

                    if (isset($url[2]) && !empty($url[2]) && $url[2] == 'sheet' && isset($url[3]) && !empty($url[3])){
                        $sheet = $url[3];
                    } else {
                        $sheet = 1;
                    }  

                    $sheet_index= ($sheet - 1) * $limit;
                    $blog_list = $site->nlcList($database, $schoolContent, $limit, $sheet_index, $category);

                    ?>

                    <div id="blog-listing-medium" class="col-md-12">
                    <div class="row">
                        <?php foreach($blog_list as $blog): ?>
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 col-blog-mobile">
                                <section class="post">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="image"><a href="/news/read/<?php echo preg_replace('/[a-zA-Z]/', '', $blog['post_id']); ?>"><img src="/images/thumbnails/<?php echo $blog['post_thumbnail']; ?>" alt="..." class="img-fluid"></a></div>
                                        </div>
                                        <div class="col-md-9">
                                            <h2 class="h3 mt-0 blog-title-mobile"><a href="/news/read/<?php echo preg_replace('/[a-zA-Z]/', '', $blog['post_id']); ?>"><?php echo $blog['post_title']; ?></a></h2>
                                            <div class="d-flex flex-wrap justify-content-between text-xs">
                                                <p class="author-category">By <?php echo $blog['firstname'] . " " . $blog['lastname']; ?></p>
                                                <p class="date-comments"><i class="fa fa-calendar-o"></i><?php echo date_format(date_create($blog['post_date']), 'd M Y'); ?></p>
                                            </div>
                                            <p class="intro"><?php echo $blog['post_desc']; ?></p>
                                            <a href="/news/read/<?php echo preg_replace('/[a-zA-Z]/', '', $blog['post_id']); ?>">Read More →</a>
                                        </div>
                                    </div>
                                    <hr class="blog-separator mt-0 d-block d-lg-none d-md-none">
                                </section>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <?php
                        $total_sheets = $site->nlcListCount($database, $schoolContent, $category);
                        $total_pages = ceil($total_sheets / $limit);  
                    ?>

                    <ul class="pager list-unstyled d-flex align-items-center justify-content-between">
                        <li class="previous <?php if($sheet == $total_pages){ ?>disabled<?php } ?>"><a href="<?php if($sheet == $total_pages){ ?> javascript:void(0);<?php } else { ?>/department/superintendent/sheet/<?php echo $sheet+1; } ?>" class="btn btn-template-outlined">← Older</a></li>
                        <li class="next <?php if($sheet == 1){ ?>disabled<?php } ?>"><a href="<?php if($sheet == 1){ ?> javascript:void(0);<?php } else { ?>/department/superintendent/sheet/<?php echo $sheet-1; } ?>" class="btn btn-template-outlined">Newer →</a></li>
                    </ul>
                    <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>