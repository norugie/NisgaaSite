<?php

    if(!isset($_POST['search'])){
?>
    <script>window.location = "/?page=index";</script>
<?php
    }

    $keyword = mysqli_real_escape_string($database->con, $_POST['search']);
    $school = 2;
    $blogs = $site->blogSearchResults($database, $keyword, $school);
    $resources = $site->resourcesSearchResults($database, $keyword, $school);
    $forms = $site->formsSearchResults($database, $keyword, $school);
?>
<div class="col-md-9">
    <!-- BLOG RESULTS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>District News</h2>
                </div>
                <?php if(count($blogs) < 1){ ?><p class="lead">No district news posts found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <div class="row">
                    <?php foreach($blogs as $blog): ?>
                        <div class="col-lg-3">
                            <div class="home-blog-post">
                                <div class="image"><img src="images/thumbnails/<?php echo $blog['post_thumbnail']; ?>" alt="..." class="img-fluid">
                                <div class="overlay d-flex align-items-center justify-content-center"><a href="/?page=news&id=<?php echo preg_replace('/[a-zA-Z]/', '', $blog['post_id']); ?>" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                                </div>
                                <div class="text">
                                    <h4><a href="/?page=news&id=<?php echo preg_replace('/[a-zA-Z]/', '', $blog['post_id']); ?>"><?php echo $blog['post_title']; ?></a></h4>
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
                <?php if(count($resources) < 1){ ?><p class="lead">No resources found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <div class="row products products-big">
                    <?php foreach($resources as $resource): ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="product">
                                <div class="image"><a href="<?php if($resource['link_type'] == 'File'){ echo "../links/"; } echo $resource['link_content']; ?>" <?php if($resource['link_type'] == 'Link' || pathinfo($resource['link_content'], PATHINFO_EXTENSION) == 'pdf'){?>target="_blank"<?php } else { ?> download <?php } ?>><img src="images/thumbnails/<?php echo $resource['link_thumbnail']; ?>" alt="" class="img-fluid image1"></a></div>
                                <div class="text">
                                    <h3 class="h5"><a href="<?php if($resource['link_type'] == 'File'){ echo "../links/"; } echo $resource['link_content']; ?>" <?php if($resource['link_type'] == 'Link' || pathinfo($resource['link_content'], PATHINFO_EXTENSION) == 'pdf'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $resource['link_name']; ?></a></h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FORMS RESULTS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>District Files</h2>
                </div>
                <?php if(count($forms) < 1){ ?><p class="lead">No district files found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <ul>
                    <?php foreach($forms as $form): ?>
                        <li class="lead mb-0"><a href="<?php if($form['link_type'] == 'File'){ echo "../links/"; } echo $form['link_content']; ?>" <?php if($form['link_type'] == 'Link' || pathinfo($form['link_content'], PATHINFO_EXTENSION) == 'pdf'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $form['link_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
        </div>
    </section>
</div>