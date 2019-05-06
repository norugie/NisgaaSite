<!-- BLOG LIST -->

<?php 

    $limit = 5; 


    if (isset($_GET['sheet'])){
        $sheet  = $_GET['sheet']; 
    } else {
        $sheet = 1; 
    }  

    $sheet_index= ($sheet - 1) * $limit;
    $blog_list = $site->blogList($database, 2, $limit, $sheet_index);

?>

<div id="blog-listing-medium" class="col-md-9">
    <?php foreach($blog_list as $blog): ?>
        <section class="post">
            <div class="row">
                <div class="col-md-3">
                    <div class="image"><a href="/?page=news&id=<?php echo preg_replace('/[a-zA-Z]/', '', $blog['post_id']); ?>"><img src="images/thumbnails/<?php echo $blog['post_thumbnail']; ?>" alt="..." class="img-fluid"></a></div>
                </div>
                <div class="col-md-9">
                    <h2 class="h3 mt-0"><a href="/?page=news&id=<?php echo preg_replace('/[a-zA-Z]/', '', $blog['post_id']); ?>"><?php echo $blog['post_title']; ?></a></h2>
                    <div class="d-flex flex-wrap justify-content-between text-xs">
                        <p class="author-category">By <?php echo $blog['firstname'] . " " . $blog['lastname']; ?></p>
                        <p class="date-comments"><i class="fa fa-calendar-o"></i><?php echo date_format(date_create($blog['post_date']), 'd M Y'); ?></p>
                    </div>
                    <p class="intro"><?php echo $blog['post_desc']; ?></p>
                    <a href="/?page=news&id=<?php echo preg_replace('/[a-zA-Z]/', '', $blog['post_id']); ?>">Read More →</a>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <?php
        $total_sheets = $site->blogListCount($database, 2);
        $total_pages = ceil($total_sheets / $limit);  
    ?>

    <ul class="pager list-unstyled d-flex align-items-center justify-content-between">
        <li class="previous <?php if($sheet == $total_pages){ ?>disabled<?php } ?>"><a href="<?php if($sheet == $total_pages){ ?> javascript:void(0);<?php } else { ?>/?page=news&sheet=<?php echo $sheet+1; } ?>" class="btn btn-template-outlined">← Older</a></li>
        <li class="next <?php if($sheet == 1){ ?>disabled<?php } ?>"><a href="<?php if($sheet == 1){ ?> javascript:void(0);<?php } else { ?>/?page=news&sheet=<?php echo $sheet-1; } ?>" class="btn btn-template-outlined">Newer →</a></li>
    </ul>
    <br>
</div>
