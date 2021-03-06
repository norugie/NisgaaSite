<?php

    if(!isset($_POST['search'])){
?>
    <script>window.location = "/";</script>
<?php
    }

    $keyword = mysqli_real_escape_string($database->con, $_POST['search']);
    $searchKeyword = str_replace(" ", "%", $keyword);

    $blogs = $site->blogSearchResults($database, $searchKeyword, $schoolContent);
    $resources = $site->resourcesSearchResults($database, $searchKeyword, $schoolContent);
    $forms = $site->formsSearchResults($database, $searchKeyword, $schoolContent);
    $dfiles = $site->departmentFormsSearchResults($database, $searchKeyword);
    $cfiles = $site->curriculumFormsSearchResults($database, $searchKeyword);
    $boefiles = $site->boardFormsSearchResults($database, $searchKeyword);
    $policies = $site->policiesSearchResults($database, $searchKeyword);
    $directives = $site->directivesSearchResults($database, $searchKeyword);
    $help = $site->techHelpSearchResults($database, $searchKeyword);
    $minutes = $site->minutesSearchResults($database, $searchKeyword);
    
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
                        <div class="col-lg-6 col-md-6 col-blog-mobile">
                            <ul class="d-block">
                                <li class="lead mb-0">
                                    <a href="/news/read/<?php echo preg_replace('/[a-zA-Z]/', '', $blog['post_id']); ?>"><?php echo $blog['post_title']; ?></a>
                                    <p class="author-category">By <?php echo $blog['firstname'] . " " . $blog['lastname']; ?> | <?php echo date_format(date_create($blog['post_date']), 'd M Y'); ?></p>
                                </li>
                            </ul>
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
                        <div class="col-lg-3 col-md-6 col-blog-mobile">
                            <div class="product d-none d-md-block">
                                <div class="image"><a href="<?php if($resource['link_type'] == 'File'){ echo "/links/"; } echo $resource['link_content']; ?>" target="_blank"><img src="/images/thumbnails/<?php echo $resource['link_thumbnail']; ?>" alt="" class="img-fluid image1" style="max-width: 80% !important;"></a></div>
                                <div class="text">
                                    <h3 class="h5"><a href="<?php if($resource['link_type'] == 'File'){ echo "/links/"; } echo $resource['link_content']; ?>" target="_blank"><?php echo $resource['link_name']; ?></a></h3>
                                </div>
                            </div>
                            <ul class="d-block d-md-none d-lg-none">
                                <li class="lead mb-0"><a href="<?php if($resource['link_type'] == 'File'){ echo "/links/"; } echo $resource['link_content']; ?>" target="_blank"><?php echo $resource['link_name']; ?></a></li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FORMS RESULTS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-6">
                <div class="heading">
                    <h2>District Files</h2>
                </div>
                <?php if(count($forms) < 1){ ?><p class="lead">No district files found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <ul>
                    <?php foreach($forms as $form): ?>
                        <li class="lead mb-0"><a href="<?php if($form['link_type'] == 'File'){ echo "/links/"; } echo $form['link_content']; ?>" target="_blank"><?php echo $form['link_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="heading">
                    <h2>Tech Help</h2>
                </div>
                <?php if(count($help) < 1){ ?><p class="lead">No tech help files found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <ul>
                    <?php foreach($help as $th): ?>
                        <li class="lead mb-0"><a href="<?php if($th['link_type'] == 'File'){ echo "/links/"; } echo $th['link_content']; ?>" target="_blank"><?php echo $th['link_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- MINUTES AND PACKAGES RESULTS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-6">
                <div class="heading">
                    <h2>Board Meeting Minutes</h2>
                </div>
                <?php if(count($minutes) < 1){ ?><p class="lead">No board meeting minutes found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <ul>
                    <?php foreach($minutes as $ms): ?>
                        <li class="lead mb-0"><a href="<?php if($ms['link_type'] == 'File'){ echo "/links/"; } echo $ms['link_content']; ?>" target="_blank"><?php echo $ms['link_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="heading">
                    <h2>Board Meeting Packages</h2>
                </div>
                <?php if(count($boefiles) < 1){ ?><p class="lead">No board meeting packages found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <ul>
                    <?php foreach($boefiles as $boe): ?>
                        <li class="lead mb-0"><a href="<?php if($boe['link_type'] == 'File'){ echo "/links/"; } echo $boe['link_content']; ?>" target="_blank"><?php echo $boe['link_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- POLICIES AND DIRECTIVES RESULTS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-6">
                <div class="heading">
                    <h2>Policy Files</h2>
                </div>
                <?php if(count($policies) < 1){ ?><p class="lead">No policy files found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <ul>
                    <?php foreach($policies as $policy): ?>
                        <li class="lead mb-0"><a href="<?php if($policy['link_type'] == 'File'){ echo "/links/"; } echo $policy['link_content']; ?>" target="_blank"><?php echo $policy['link_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="heading">
                    <h2>Process and Directive Files</h2>
                </div>
                <?php if(count($directives) < 1){ ?><p class="lead">No process and directive files found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <ul>
                    <?php foreach($directives as $directive): ?>
                        <li class="lead mb-0"><a href="<?php if($directive['link_type'] == 'File'){ echo "/links/"; } echo $directive['link_content']; ?>" target="_blank"><?php echo $directive['link_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- DEPARTMENT AND CURRICULUM RESULTS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-6">
                <div class="heading">
                    <h2>Department Files</h2>
                </div>
                <?php if(count($dfiles) < 1){ ?><p class="lead">No department files found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <ul>
                    <?php foreach($dfiles as $df): ?>
                        <li class="lead mb-0"><a href="<?php if($df['link_type'] == 'File'){ echo "/links/"; } echo $df['link_content']; ?>" target="_blank"><?php echo $df['link_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="heading">
                    <h2>Curriculum Files</h2>
                </div>
                <?php if(count($cfiles) < 1){ ?><p class="lead">No curriculum files found for keyword: <?php echo $keyword; ?></p><?php } ?>
                <ul>
                    <?php foreach($cfiles as $cf): ?>
                        <li class="lead mb-0"><a href="<?php if($cf['link_type'] == 'File'){ echo "/links/"; } echo $cf['link_content']; ?>" target="_blank"><?php echo $cf['link_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
</div>