<?php $updates = $site->specifiedListIndex($database, $schoolContent, 5); ?>
<div class="col-md-9">
    <!-- COVID INFORMATION FROM DISTRICT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php foreach($updates as $update): ?>
                        <div class="col-lg-6 col-md-6 col-blog-mobile">
                            <ul class="d-block">
                                <li class="lead mb-0">
                                    <a href="/news/read/<?php echo preg_replace('/[a-zA-Z]/', '', $update['post_id']); ?>"><?php echo $update['post_title']; ?></a>
                                    <p class="author-category">By <?php echo $update['firstname'] . " " . $update['lastname']; ?> | <?php echo date_format(date_create($update['post_date']), 'd M Y'); ?></p>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>