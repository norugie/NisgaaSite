<?php $links = $site->linkList($database, 'Board Meeting Minutes', $schoolContent); ?>
<div class="col-md-9">
    <!-- PACKAGE INFO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">Below are the archived minutes from the past conducted board meetings, arranged by recency:</p>
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
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
</div>