<?php 

    $page_info;

    if($url[1] !== 'finance'){
        $page_info = $site->departmentInformation($database, $url[1]); 
    }
    
?>
<div id="blog-post" class="col-md-9">
    <h2 class="text-center"><?php echo $content_breadcrumb; ?></h2>
    <div id="post-content">

        <?php     
            if($url[1] == 'finance'){
        ?>

            <!-- FINANCE INFO CONTENT -->
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <p class="lead">Below is the list of financial files relevant to School District No. 92 (Nisga’a): </p>
                    </div>
                </div>
            </section>
            
            <!-- FINANCE FORMS CONTENT -->
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <p class="lead" style="margin-bottom:10px!important;"><b>Budgets</b></p>
                        <div class="row">
                            <ul>
                                <?php $page_info = $site->linkList($database, 'Finance Budget', 2); ?>
                                <?php foreach($page_info as $link): ?>
                                    <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "../links/"; } echo $link['link_content']; ?>" <?php if($link['link_type'] == 'Link' || pathinfo($link['link_content'], PATHINFO_EXTENSION) == 'pdf'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $link['link_name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p class="lead" style="margin-bottom:10px!important;"><b>Audited Financial Statements</b></p>
                        <div class="row">
                            <ul>
                                <?php $page_info = $site->linkList($database, 'Finance Audit', 2); ?>
                                <?php foreach($page_info as $link): ?>
                                    <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "../links/"; } echo $link['link_content']; ?>" <?php if($link['link_type'] == 'Link' || pathinfo($link['link_content'], PATHINFO_EXTENSION) == 'pdf'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $link['link_name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p class="lead" style="margin-bottom:10px!important;"><b>Statements of Financial Information</b></p>
                        <div class="row">
                            <ul>
                                <?php $page_info = $site->linkList($database, 'Finance SFI', 2); ?>
                                <?php foreach($page_info as $link): ?>
                                    <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "../links/"; } echo $link['link_content']; ?>" <?php if($link['link_type'] == 'Link' || pathinfo($link['link_content'], PATHINFO_EXTENSION) == 'pdf'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $link['link_name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p class="lead" style="margin-bottom:10px!important;"><b>Executive Compensation Reports</b></p>
                        <div class="row">
                            <ul>
                                <?php $page_info = $site->linkList($database, 'Finance ECR', 2); ?>
                                <?php foreach($page_info as $link): ?>
                                    <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "../links/"; } echo $link['link_content']; ?>" <?php if($link['link_type'] == 'Link' || pathinfo($link['link_content'], PATHINFO_EXTENSION) == 'pdf'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $link['link_name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

        <?php
            } else {
                echo $page_info['web_desc'];
            } ?>
    </div>
</div>