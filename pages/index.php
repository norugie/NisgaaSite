<?php $blog_recent = $site->blogRecent($database, 2); ?>
<!-- JUMBOTRON -->
<!-- <section class="no-mb relative-positioned">
    <div style="background: url('images/site/photogrid.jpg') center center repeat; background-size: cover;" class="jumbotron relative-positioned color-white text-md-center">
        <div class="dark-mask mask-primary"></div>
        <div class="row">
            <div class="col-md-9">
                <div class="row mb-small">
                    <div class="col-md-12">
                        <h1 class="text-uppercase">Welcome to SD92 (Nisga'a)</h1>
                        <h2 class="text-uppercase">Lorem ipsum dolor sit amet. Maecenas hendrerit, tortor eget varius tempor.</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="images/nisgaa_icon_big.png" alt="Nisga'a Logo" class="img-fluid">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                    <p class="text-uppercase text-bold">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                    <p class="no-letter-spacing">Get to know us more!</p>
                    <p><a href="/?page=about_us" class="btn btn-template-outlined-white">ABOUT US</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar-jumbotron">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12"><h4>QUICK LINKS</h4></div>
                            <div class="col-md-12 quick-links">
                                    <div class="col-md-12 qa-items" style="text-align:left;">
                                        <?php foreach($quick_links as $ql): ?>
                                            <h5><a href="<?php if($ql['link_type'] == 'File'){ echo "../links/"; } echo $ql['link_content']; ?>" <?php if($ql['link_type'] == 'Link'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $ql['link_name']; ?></a></h5>
                                        <?php endforeach; ?>
                                    </div>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid #fff;">
                        <div class="row">
                            <div class="col-md-12"><h4>ANNOUNCEMENTS</h4></div>
                            <div class="col-md-12 announcements">
                                    <div class="col-md-12 an-items" style="text-align:left;">
                                    <?php if(count($announcements) < 1){ ?><p class="no-letter-spacing">No posted announcements available</p><?php } ?>
                                        <?php foreach($announcements as $a): ?>
                                            <h5><a href="/?page=announcements&id=<?php echo preg_replace('/[a-zA-Z]/', '', $a['a_id']); ?>" class="nav-link"><?php echo $a['a_title']; ?></a></h5>
                                        <?php endforeach; ?>
                                    </div>
                            </div>
                        </div>                        
                        <hr style="border-top: 1px solid #fff;">
                        <div class="row">
                            <div class="col-md-12"><h4>WORD OF THE DAY</h4></div>
                            <div class="col-md-12 daily-word">
                                <h3>" WORD "</h3>
                                <p class="no-letter-spacing">Word meaning</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- JUMBOTRON END -->

<!-- UPCOMING EVENTS -->
<!-- <div class="get-it">
    <div class="row">
        <div class="col-lg-4 text-center p-3">
            <h3>Upcoming Events:</h3>
        </div>
        <div class="col-lg-8 text-center p-3">
            <?php if(count($events) < 1){ ?>
                <div class="row">
                    <div class="col-md-8">
                        <h4 style="margin:0;">No upcoming events</h4>
                    </div>
                </div>
            <?php } ?> -->
            <!-- Owl Carousel -->
            <!-- <div class="owl-carousel"> -->
                <!-- Carousel Items -->
                <!-- <?php foreach($events as $event):?>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 style="margin:0;"><?php echo $event['event_name']; ?></h4>
                            <p class="text-uppercase" style="margin:0;">
                                <?php 
                                    $data_start = explode(',', $event['GROUP_CONCAT(event_days.event_date_day_start)']); 
                                    $data_time = explode(',', $event['GROUP_CONCAT(event_days.event_date_time)']);
                                    $data_end = explode(',', $event['GROUP_CONCAT(event_days.event_date_day_end)']); 
                                ?>
                                <?php 

                                    foreach($data_start as $key => $start):

                                        echo " " . date_format(date_create($start), 'd M Y') . " ";
                                        if($data_end[$key] != $start){ echo ' to ' . date_format(date_create($data_end[$key]), 'd M Y'); } 
                                                        
                                    endforeach; 
                                    
                                ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <a href="/?page=blog&id=<?php echo preg_replace('/[a-zA-Z]/', '', $event['post_id']); ?>" class="btn btn-template-outlined-white">Event Info</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div> -->
<!-- UPCOMING EVENTS END -->

<!-- RECENT BLOG POSTS -->
<section class="bar background-white no-mb">
    <div class="container-no-center">
        <div class="col-md-12">
            <div class="heading text-center">
                <h2>District News</h2>
            </div>
            <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. <a href="/?page=blog">Check our blog!</a></p>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <?php foreach($blog_posts as $recent_post): ?>
                            <div class="col-lg-4">
                                <div class="home-blog-post">
                                    <div class="image"><img src="images/thumbnails/<?php echo $recent_post['post_thumbnail']; ?>" alt="..." class="img-fluid">
                                    <div class="overlay d-flex align-items-center justify-content-center"><a href="/?page=news&id=<?php echo preg_replace('/[a-zA-Z]/', '', $recent_post['post_id']); ?>" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                                    </div>
                                    <div class="text">
                                    <h4><a href="/?page=news&id=<?php echo preg_replace('/[a-zA-Z]/', '', $recent_post['post_id']); ?>"><?php echo $recent_post['post_title']; ?></a></h4>
                                    <p class="author-category">By <?php echo $recent_post['firstname'] . " " . $recent_post['lastname']; ?></p>
                                    <p class="author-category"><?php echo date_format(date_create($recent_post['post_date']), 'd M Y'); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="h4 panel-title">RECENT POSTS</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills flex-column text-sm">
                                <?php foreach($blog_recent as $rp): ?>
                                    <li class="nav-item"><a href="/?page=news&id=<?php echo preg_replace('/[a-zA-Z]/', '', $rp['post_id']); ?>" class="nav-link"><?php echo $rp['post_title']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- RECENT BLOG POSTS END -->