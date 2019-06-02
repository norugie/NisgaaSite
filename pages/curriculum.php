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
                    <p class="lead" style="margin-bottom:10px!important;"><b>Relevant Files to K12</b></p>
                    <div class="row">
                        <ul>
                            <?php $page_info = $site->linkList($database, 'K12', 2); ?>
                            <?php foreach($page_info as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "../links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
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
                    <p class="lead" style="margin-bottom:10px!important;"><b>Relevant Files to K12</b></p>
                    <div class="row">
                        <!-- <ul>
                            <?php $page_info = $site->linkList($database, 'DL', 2); ?>
                            <?php foreach($page_info as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "../links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul> -->
                    </div>
                </div>
            </div>
        </section>
        <?php } else if($url[1] == 'nlc'){ ?>
            <section>
            <div class="row">
                <div class="col-md-12">
                    <p class="lead" style="margin-bottom:10px!important;"><b>Relevant Files to Nisga’a Language and Culture</b></p>
                    <div class="row">
                        <ul>
                            <?php $page_info = $site->linkList($database, 'NLC', 2); ?>
                            <?php foreach($page_info as $link): ?>
                                <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "../links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php } else { header("location: /404"); } ?>
    </div>
</div>