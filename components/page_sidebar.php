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
            <li>
                <a href="index.php">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">create</i>
                    <span>Posts</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="posts.php?page=blog">
                            <i class="material-icons">mode_comment</i>
                            <span>Blog Posts</span>
                        </a>
                    </li>
                    <li>
                        <a href="posts.php?page=links">
                            <i class="material-icons">link</i>
                            <span>Links</span>
                        </a>
                    </li>
                    <li>
                        <a href="posts.php?page=categories">
                            <i class="material-icons">widgets</i>
                            <span>Categories</span>
                        </a>
                    </li> 
                    <li>
                        <a href="posts.php?page=media">
                            <i class="material-icons">photo_library</i>
                            <span>Media</span>
                        </a>
                    </li>  
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">business</i>
                    <span>School District</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="district.php?page=users">
                            <i class="material-icons">people</i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="district.php?page=employment">
                            <i class="material-icons">work</i>
                            <span>Employment</span>
                        </a>
                    </li>
                    <li>
                        <a href="district.php?page=events">
                            <i class="material-icons">event</i>
                            <span>Events</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">public</i>
                    <span>Web Interactions</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="interactions.php?page=comments">
                            <i class="material-icons">record_voice_over</i>
                            <span>Comments</span>
                        </a>
                    </li>
                    <li>
                        <a href="interactions.php?page=inquiries">
                            <i class="material-icons">question_answer</i>
                            <span>Inquiries</span>
                        </a>
                    </li>
                    <li>
                        <a href="interactions.php?page=reports">
                            <i class="material-icons">report</i>
                            <span>Reports</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="version">
            &copy; <b>2018 SD92-CMS</b> v1.0
        </div>
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>
        </div>
    </div>
    <!-- #Footer -->
</aside>