<?php 
    $page_info;
    $page_info = $site->departmentInformation($database, $url[1]); 
?>
<div id="blog-post" class="col-md-9">
    <h2 class="text-center"><?php echo $content_breadcrumb; ?></h2>
    <div id="post-content">
        <!-- DEPARTMENT INFO CONTENT -->
        <section>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $page_info['web_desc']; ?>
                </div>
            </div>
        </section>
        <br>
        <?php if($url[1] == 'finance'){ ?>
        <!-- FINANCE FORMS CONTENT -->
        <section>
            <div class="row">
                <div class="col-md-6">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>Budgets</b></p>
                    <div class="row">
                        <ul>
                            <?php $page_info = $site->linkList($database, 'Finance Budget', $schoolContent); ?>
                            <?php foreach($page_info as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>Audited Financial Statements</b></p>
                    <div class="row">
                        <ul>
                            <?php $page_info = $site->linkList($database, 'Finance Audit', $schoolContent); ?>
                            <?php foreach($page_info as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>Statements of Financial Information</b></p>
                    <div class="row">
                        <ul>
                            <?php $page_info = $site->linkList($database, 'Finance SFI', $schoolContent); ?>
                            <?php foreach($page_info as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>Executive Compensation Reports</b></p>
                    <div class="row">
                        <ul>
                            <?php $page_info = $site->linkList($database, 'Finance ECR', $schoolContent); ?>
                            <?php foreach($page_info as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php } else if($url[1] == 'tech'){ ?>
        <!-- TECH FORMS CONTENT -->
        <section>
            <div class="row">
                <div class="col-md-12">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>Department Files</b></p>
                    <div class="row">
                        <ul>
                            <?php $page_info = $site->linkList($database, $url[1], $schoolContent); ?>
                            <?php foreach($page_info as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php } else if($url[1] == 'maintenance'){ ?>
        <!-- MAINTENANCE FORMS CONTENT -->
        <section>
            <div class="row">
                <div class="col-md-12">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>Department Files</b></p>
                    <div class="row">
                        <ul>
                            <?php $page_info = $site->linkList($database, $url[1], $schoolContent); ?>
                            <?php foreach($page_info as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php } else if($url[1] == 'superintendent'){ ?>
        <!-- SUPERINTENDENT PAGE CONTENT -->
        <section>
            <div class="row">
                <div class="col-md-12">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>Administrative Procedures</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="lead">We are currently in the process of updating our administrative procedures. We will be uploading the updated procedures in this section:</p>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-6">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>200 - Personnel</b></p>
                    <div class="row">
                        <ul>
                            <?php $links = $site->linkList($database, 'PolicyAP 200', $schoolContent); ?>
                            <?php foreach($links as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>300 - Students</b></p>
                    <div class="row">
                        <ul>
                            <?php $links = $site->linkList($database, 'PolicyAP 300', $schoolContent); ?>
                            <?php foreach($links as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>400 - Operations, Facilities</b></p>
                    <div class="row">
                        <ul>
                            <?php $links = $site->linkList($database, 'PolicyAP 400', $schoolContent); ?>
                            <?php foreach($links as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>500 - Finance</b></p>
                    <div class="row">
                        <ul>
                            <?php $links = $site->linkList($database, 'PolicyAP 500', $schoolContent); ?>
                            <?php foreach($links as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div> -->
            <br>
        </section>
        <section>
            <div class="row">
                <div class="col-md-12">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>School District Superintendent Posts</b></p>
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
                        $blog_list = $site->ssdList($database, $schoolContent, $limit, $sheet_index, $category);

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
                            $total_sheets = $site->ssdListCount($database, $schoolContent, $category);
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
        <?php } else { echo "<script>window.open('https://www.nisgaa.bc.ca/404', '_parent');</script>"; } ?>
    </div>
</div>