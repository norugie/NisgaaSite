<?php $links = $site->linkList($database, 'District Forms', $schoolContent); ?>
<div class="col-md-9">
    <!-- DISTRICT FORMS INFO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">Below is the list of files relevant to School District No. 92 (Nisga’a), arranged alphabetically: </p>
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
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
</div>