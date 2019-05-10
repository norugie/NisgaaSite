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
                <?php if(count($announcements) < 1){ ?><li class="nav-item">No posted announcements available</li><?php } ?>
                <?php foreach($announcements as $a): ?>
                    <li class="nav-item"><a href="/?page=announcements&id=<?php echo preg_replace('/[a-zA-Z]/', '', $a['a_id']); ?>" class="nav-link"><?php echo $a['a_title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="h4 panel-title">Career Opportunities</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills flex-column text-sm">
                <?php if(count($joblist) < 1){ ?><li class="nav-item">No job postings available</li><?php } ?>
                <?php foreach($joblist as $j): ?>
                    <li class="nav-item"><a href="/?page=careers&id=<?php echo preg_replace('/[a-zA-Z]/', '', $j['job_id']); ?>" class="nav-link"><?php echo $j['title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="h4 panel-title">Upcoming Events</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills flex-column text-sm">
                <?php if(count($events) < 1){ ?><li class="nav-item">No upcoming events</li><?php } ?>
                <?php foreach($events as $e): ?>
                    <li class="nav-item"><a href="/?page=blog&id=<?php echo preg_replace('/[a-zA-Z]/', '', $e['post_id']); ?>" class="nav-link"><?php echo $e['event_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <!-- <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="h4 panel-title">Recent District News</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills flex-column text-sm">
                <?php if(count($blog_posts) < 1){ ?><li class="nav-item">No available district news</li><?php } ?>
                <?php foreach($blog_posts as $recent_post): ?>
                    <li class="nav-item"><a href="/?page=news&id=<?php echo preg_replace('/[a-zA-Z]/', '', $recent_post['post_id']); ?>" class="nav-link"><?php echo $recent_post['post_title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div> -->
</div>