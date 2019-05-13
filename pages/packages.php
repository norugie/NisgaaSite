<?php $links = $site->linkList($database, 'Board Meeting Packages', 2); ?>
<div class="col-md-9">
    <!-- PACKAGE INFO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">Below is are the archived agendas from the past conducted board meetings, arranged by recency:</p>
            </div>
        </div>
    </section>
    
    <!-- PACKAGE LIST CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <ul>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "../links/"; } echo $link['link_content']; ?>" <?php if($link['link_type'] == 'Link' || pathinfo($link['link_content'], PATHINFO_EXTENSION) == 'pdf){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
</div>