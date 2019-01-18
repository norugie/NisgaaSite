<?php

    $categories = $site->categoryList($database);

?>
<div class="col-md-3">
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="h4 panel-title">Quick Links</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills flex-column text-sm">
                <?php foreach($quick_links as $ql): ?>
                    <li class="nav-item"><a href="<?php if($ql['link_type'] == 'File'){ echo "../links/"; } echo $ql['link_content']; ?>" class="nav-link" <?php if($ql['link_type'] == 'Link'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $ql['link_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="h4 panel-title">Announcements</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills flex-column text-sm">
                <?php foreach($announcements as $a): ?>
                    <li class="nav-item"><a href="#" class="nav-link"><?php echo $a['a_title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="panel sidebar-menu">
        <div class="panel-heading">
            <h3 class="h4 panel-title">Blog Categories</h3>
        </div>
        <div class="panel-body">
            <ul class="tag-cloud list-inline">
                <?php foreach($categories as $cat): ?>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-tags"></i> <?php echo $cat['cat_desc']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>