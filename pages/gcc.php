<?php 
    $about = $site->aboutList($database, 12); 
?>
<div class="col-md-9">
    <!-- DAYCARE CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <!-- Display description for Daycare -->
                <p class="lead"><?php echo $about['web_desc']; ?></p>
            </div>
        </div>
    </section>
    <?php $gccp = $site->specifiedListIndex($database, $schoolContent, 6); ?>
    <!--  GCC POSTS -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>Gitginsaa Childcare Centre Posts</b></p>
                <div class="row">
                    <?php foreach($gccp as $gcc): ?>
                        <?php if($gcc['role'] == 5){?>
                            <div class="col-lg-6 col-md-6 col-blog-mobile">
                                <ul class="d-block">
                                    <li class="lead mb-0">
                                        <a href="/news/read/<?php echo preg_replace('/[a-zA-Z]/', '', $gcc['post_id']); ?>"><?php echo $gcc['post_title']; ?></a>
                                        <p class="author-category">By <?php echo $gcc['firstname'] . " " . $gcc['lastname']; ?> | <?php echo date_format(date_create($gcc['post_date']), 'd M Y'); ?></p>
                                    </li>
                                </ul>
                            </div>
                        <?php }?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>