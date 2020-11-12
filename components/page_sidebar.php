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
        $subtab;
        if(isset($_GET['subtab'])){ $subtab = $_GET['subtab']; }
    ?>

        <script>
            $(document).ready(function(){
                $('#<?php echo $tab; ?>').addClass('active');
                $('#<?php echo $page; ?>').addClass('active');
                <?php if(isset($_GET['subtab'])){ ?> $('#<?php echo $subtab; ?>').addClass('active'); <?php } ?>
            });
        </script>

    <?php
    }
?>
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
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
                    <li id="posts">
                        <a href="post.php?tab=post&page=posts">
                            <i class="material-icons">mode_comment</i>
                            <span><?php if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6 && $_SESSION['type'] != 5 && $_SESSION['type'] != 6 ? $text = "District" : $text = "School"); echo $text; ?> Posts</span>
                        </a>
                    </li>
                    <?php if($_SESSION['type'] != 5){ ?>
                    <li id="events">
                        <a href="post.php?tab=post&page=events">
                            <i class="material-icons">event</i>
                            <span>Events</span>
                        </a>
                    </li>
                    <li id="links">
                        <a href="post.php?tab=post&page=links">
                            <i class="material-icons">link</i>
                            <span>Links</span>
                        </a>
                    </li>
                    <?php } ?>
                    <li id="categories">
                        <a href="post.php?tab=post&page=categories">
                            <i class="material-icons">widgets</i>
                            <span>Categories</span>
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
                    <?php if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6 && $_SESSION['type'] != 5 && $_SESSION['type'] != 6){ ?> 
                    <li id="files">
                        <a href="district.php?tab=sd&page=files">
                            <i class="material-icons">library_books</i>
                            <span>District Files</span>
                        </a>
                    </li>
                    <li id="packages">
                        <a href="district.php?tab=sd&page=packages">
                            <i class="material-icons">archive</i>
                            <span>Board Meeting Packages</span>
                        </a>
                    </li>
                    <li id="minutes">
                        <a href="district.php?tab=sd&page=minutes">
                            <i class="material-icons">access_time</i>
                            <span>Board Meeting Minutes</span>
                        </a>
                    </li>
                    <li id="policy">
                        <a href="district.php?tab=sd&page=policy">
                            <i class="material-icons">account_balance</i>
                            <span>Board of Education - Policy</span>
                        </a>
                    </li>
                    <li id="directives">
                        <a href="district.php?tab=sd&page=directives">
                            <i class="material-icons">subdirectory_arrow_right</i>
                            <span>Board of Education - Process and Directives</span>
                        </a>
                    </li>
                    <li id="plans">
                        <a href="district.php?tab=sd&page=plans">
                            <i class="material-icons">assignment</i>
                            <span>School District Strategic Plans</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <li id="web">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">public</i>
                    <span>Web Interactions</span>
                </a>
                <ul class="ml-menu">
                    <?php if($_SESSION['type'] != 5  && $_SESSION['type'] != 6){ ?>
                    <li id="content">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_day</i>
                            <span>Web Content</span>
                        </a>
                        <ul class="ml-menu">
                            <li id="about">
                                <a href="interaction.php?tab=web&subtab=content&page=about">
                                    <i class="material-icons">info</i>
                                    <span>About</span>
                                </a>
                            </li>
                            <li id="contacts">
                                <a href="interaction.php?tab=web&subtab=content&page=contacts">
                                    <i class="material-icons">contacts</i>
                                    <span>Contacts</span>
                                </a>
                            </li>
                            <li id="carousel">
                                <a href="interaction.php?tab=web&subtab=content&page=carousel">
                                    <i class="material-icons">photo_size_select_large</i>
                                    <span>Home Carousel</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){ ?> 
                    <li id="curriculum">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">local_library</i>
                            <span>Curriculum</span>
                        </a>
                        <ul class="ml-menu">
                            <li id="k12">
                                <a href="interaction.php?tab=web&subtab=curriculum&page=k12">
                                    <span>K-12 Program</span>
                                </a>
                            </li>
                            <li id="dl">
                                <a href="interaction.php?tab=web&subtab=curriculum&page=dl">
                                    <span>Distributed Learning Program</span>
                                </a>
                            </li>
                            <li id="nlc">
                                <a href="interaction.php?tab=web&subtab=curriculum&page=nlc">
                                    <span>Nisga'a Language and Culture</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="department">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">device_hub</i>
                            <span>Departments</span>
                        </a>
                        <ul class="ml-menu">
                            <li id="ssd">
                                <a href="interaction.php?tab=web&subtab=department&page=ssd">
                                    <span>School District Superintendent</span>
                                </a>
                            </li>
                            <li id="finance">
                                <a href="interaction.php?tab=web&subtab=department&page=finance">
                                    <span>Finance Department</span>
                                </a>
                            </li>
                            <li id="tech">
                                <a href="interaction.php?tab=web&subtab=department&page=tech">
                                    <span>Information Technology Department</span>
                                </a>
                            </li>
                            <li id="maintenance">
                                <a href="interaction.php?tab=web&subtab=department&page=maintenance">
                                    <span>Transportation and Maintenance Department</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="boe">
                        <a href="interaction.php?tab=web&page=boe">
                            <i class="material-icons">group_work</i>
                            <span>Board of Education</span>
                        </a>
                    </li>
                    <li id="inquiries">
                        <a href="interaction.php?tab=web&page=inquiries">
                            <i class="material-icons">question_answer</i>
                            <span>Tech Help Inquiries</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php } ?>
                    <?php if($_SESSION['type'] != 3 && $_SESSION['type'] != 4 && $_SESSION['type'] != 6){ ?>
                    <li id="gcc">
                        <a href="interaction.php?tab=web&page=gcc">
                            <i class="material-icons">face</i>
                            <span>Gitginsaa Childcare Centre</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($_SESSION['type'] != 3 && $_SESSION['type'] != 4 && $_SESSION['type'] != 6){ ?>
                    <li id="ss">
                        <a href="interaction.php?tab=web&page=ss">
                            <i class="material-icons">school</i>
                            <span>Strong Start</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($_SESSION['type'] != 3 && $_SESSION['type'] != 4 && $_SESSION['type'] != 5){ ?>
                    <li id="nlc">
                        <a href="interaction.php?tab=web&page=nlc">
                            <i class="material-icons">voice_over_off</i>
                            <span>Nisga'a Language and Culture</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="version">
            &copy; <b>2019. SD92 (Nisga'a)</b> v2.4
        </div>
        <div class="copyright">
            Design Template by <b><a href="https://github.com/gurayyarar/AdminBSBMaterialDesign">Güray Yarar</a></b>
        </div>
    </div>
    <!-- #Footer -->
</aside>