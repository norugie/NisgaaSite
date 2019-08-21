<?php $links = $site->linkList($database, 'Help', $schoolContent); ?>
<div class="col-md-9">
    <!-- HELP INTRO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>We are here to help</h2>
                </div>
                <p class="lead">Need some help? We've put together the answers to some commonly asked tech questions for the staff and students of School District no. 92 (Nisga’a).</p>
                <p class="lead">If you have a question that you can't find the answer to, please feel free to give the IT Department a call at <b>ext. 4357 (HELP)</b>.</p>
            </div>
        </div>
    </section>
    
    <!-- HELP ANSWERS CONTENT -->
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