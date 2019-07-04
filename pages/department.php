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
        <?php } else if($url[1] == 'sdss'){ ?>
        <!-- SDSS FORMS CONTENT -->
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
        <?php } else { echo "<script>window.open('https://webdev.nisgaa.bc.ca/404', '_parent');</script>"; } ?>
    </div>
</div>