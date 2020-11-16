<?php $page_info = $site->curriculumInformation($database, $url[1]); ?>
<div id="blog-post" class="col-md-9">
    <h2 class="text-center"><?php echo $content_breadcrumb; ?></h2>
    <div id="post-content">
        <!-- CURRICULUM INFO CONTENT -->
        <section>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $page_info['web_desc']; ?>
                </div>
            </div>
        </section>

        <?php if($url[1] == 'k12'){ ?>
        <!-- K12 FORMS CONTENT -->
        <section>
            <div class="row">
                <div class="col-md-12">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>Relevant Files to K12</b></p>
                    <div class="row">
                        <ul>
                            <?php $page_info = $site->linkList($database, $url[1], 2); ?>
                            <?php foreach($page_info as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php } else if($url[1] == 'dl'){ ?>
        <section>
            <div class="row">
                <div class="col-md-12">
                    <p style="margin-bottom:10px!important;font-size:14pt;"><b>Relevant Files to Distributed Learning Program</b></p>
                    <div class="row">
                        <ul>
                            <?php $page_info = $site->linkList($database, $url[1], 2); ?>
                            <?php foreach($page_info as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php } else { echo "<script>window.open('https://www.nisgaa.bc.ca/404', '_parent');</script>"; } ?>
    </div>
</div>