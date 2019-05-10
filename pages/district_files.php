<?php $links = $site->linkList($database, 'District Forms', 2); ?>
<div class="col-md-9">
    <!-- DISTRICT FORMS INFO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>
            </div>
        </div>
    </section>
    
    <!-- DISTRICT FORMS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <ul>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "../links/"; } echo $link['link_content']; ?>" <?php if($link['link_type'] == 'Link'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
</div>