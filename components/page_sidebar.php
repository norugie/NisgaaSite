<?php

    if(!isset($_GET['tab']) && !isset($_GET['page'])){
    ?>

        <script>
            $(document).ready(function(){
                $('#dashboard').addClass('active');
            });
        </script>

    <?php
    } else {
        $tab = $_GET['tab'];
        $page = $_GET['page'];
    ?>

        <script>
            $(document).ready(function(){
                $('#<?php echo $tab; ?>').addClass('active');
                $('#<?php echo $page; ?>').addClass('active');
                <?php if($page == 'posts'){ ?>
                    $('#categories').addClass('active');
                <?php } ?>
            });
        </script>

    <?php
    }
?>
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="../images/profile/<?php echo $user['display_picture']; ?>" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user['firstname'] . " " . $user['lastname']; ?></div>
            <div class="email"><?php echo $user['email']; ?></div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li id="dashboard">
                <a href="../cms/">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li id="post">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">create</i>
                    <span>Posts</span>
                </a>
                <ul class="ml-menu">
                    <li id="blog">
                        <a href="post.php?tab=post&page=blog">
                            <i class="material-icons">mode_comment</i>
                            <span>Blog Posts</span>
                        </a>
                    </li>
                    <li id="announcements">
                        <a href="post.php?tab=post&page=announcements">
                            <i class="material-icons">announcement</i>
                            <span>Announcements</span>
                        </a>
                    </li>
                    <li id="links">
                        <a href="post.php?tab=post&page=links">
                            <i class="material-icons">link</i>
                            <span>Links</span>
                        </a>
                    </li>
                    <li id="categories">
                        <a href="post.php?tab=post&page=categories">
                            <i class="material-icons">widgets</i>
                            <span>Categories</span>
                        </a>
                    </li> 
                    <li id="media">
                        <a href="post.php?tab=post&page=media">
                            <i class="material-icons">photo_library</i>
                            <span>Media</span>
                        </a>
                    </li>  
                </ul>
            </li>
            <li id="sd">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">business</i>
                    <span>School District</span>
                </a>
                <ul class="ml-menu">
                    <li id="users">
                        <a href="district.php?tab=sd&page=users">
                            <i class="material-icons">people</i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li id="employment">
                        <a href="district.php?tab=sd&page=employment">
                            <i class="material-icons">work</i>
                            <span>Employment</span>
                        </a>
                    </li>
                    <li id="events">
                        <a href="district.php?tab=sd&page=events">
                            <i class="material-icons">event</i>
                            <span>Events</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php if($_SESSION['type'] != 3){ ?> 
            <li id="web">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">public</i>
                    <span>Web Interactions</span>
                </a>
                <ul class="ml-menu">
                    <li id="inquiries">
                        <a href="interaction.php?tab=web&page=inquiries">
                            <i class="material-icons">question_answer</i>
                            <span>Inquiries</span>
                        </a>
                    </li>
                    <li id="content">
                        <a href="interaction.php?tab=web&page=content">
                            <i class="material-icons">view_day</i>
                            <span>Web Content</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="version">
            &copy; <b>2018. SD92 (Nisga'a)</b> v1.0
        </div>
        <div class="copyright">
            Design Template by <b><a href="https://github.com/gurayyarar/AdminBSBMaterialDesign">Güray Yarar</a></b>
        </div>
    </div>
    <!-- #Footer -->
</aside>