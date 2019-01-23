<!-- Site Backend Connection Initialization -->
<?php

    require 'functions/site.php';
    $info = $site->siteInformationSD92($database);
    $blog_posts = $site->blogListIndex($database, 2);
    $quick_links = $site->linkList($database, 'Quick Links', 2);
    $announcements = $site->announcementList($database, 2);
    $events = $site->eventList($database, 2);

?>

<!-- Top bar-->
<div class="top-bar">
    <div class="row d-flex align-items-center">
    <div class="col-md-6 d-md-block d-none">
        <p>Contact us at <?php echo $info['school_phone']; ?> or [school district email].</p>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-md-end justify-content-between">
        <div class="login"><a href="login.php" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-md-inline-block">Login</span></a></div>
        <ul class="social-custom list-inline">
            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
        </ul>
        </div>
    </div>
    </div>
</div>
<!-- Top bar end-->
<!-- Navbar Start-->
<header class="nav-holder make-sticky">
<div id="navbar" role="navigation" class="navbar navbar-expand-lg">
    <a href="/?page=index" class="navbar-brand home"><img src="nisgaa-icon-banner.png" alt="Nisga'a SD92 Icon" class="d-none d-md-inline-block"><img src="nisgaa-icon.png" alt="Nisga'a SD92 Icon" class="d-inline-block d-md-none"><span class="sr-only">Nisga'a - go to homepage</span></a>
    <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
    <div id="navigation" class="navbar-collapse collapse">
        <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Our District <b class="caret"></b></a>
            <ul class="dropdown-menu megamenu">
            <li>
                <div class="row">
                <div class="col-lg-4">
                    <h5>District Information</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="/?page=about_us" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="/?page=inquiries" class="nav-link">Inquiries</a></li>
                    <li class="nav-item"><a href="/?page=contact_us" class="nav-link">Contact Us</a></li>
                    </ul>
                    <h5>Departments</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="javascript: void(0)" class="nav-link">School District Office</a></li>
                    <li class="nav-item"><a href="javascript: void(0)" class="nav-link">Student Support Services</a></li>
                    <li class="nav-item"><a href="javascript: void(0)" class="nav-link">Tech Office</a></li>
                    <li class="nav-item"><a href="javascript: void(0)" class="nav-link">Maintenance Office</a></li>
                    </ul>      
                </div>
                <div class="col-lg-4">
                    <h5>Curriculum</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="/?page=k-12_program" class="nav-link">K-12 Program</a></li>
                    <li class="nav-item"><a href="/?page=distant_learners_program" class="nav-link">Distant Learners Program</a></li>
                    <li class="nav-item"><a href="/?page=language_and_culture" class="nav-link">Nisga'a Language and Culture</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>Governance</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="/?page=board_of_education" class="nav-link">Board of Education</a></li>
                    <li class="nav-item"><a href="javascript: void(0)" class="nav-link">Nisga'a Lisims Government</a></li>
                    <li class="nav-item"><a href="javascript: void(0)" class="nav-link">Gitlaxt'aamiks</a></li>
                    <li class="nav-item"><a href="javascript: void(0)" class="nav-link">Gitwinksihlkw</a></li>
                    <li class="nav-item"><a href="javascript: void(0)" class="nav-link">Laxgaltsap</a></li>
                    <li class="nav-item"><a href="javascript: void(0)" class="nav-link">Gingolx</a></li>
                    </ul>
                </div>
                </div>
            </li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Schools<b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li class="dropdown-item"><a href="javascript: void(0)" class="nav-link">NESS</a></li>
            <li class="dropdown-item"><a href="javascript: void(0)" class="nav-link">GES</a></li>
            <li class="dropdown-item"><a href="javascript: void(0)" class="nav-link">AAMES</a></li>
            <li class="dropdown-item"><a href="javascript: void(0)" class="nav-link">NBES</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Resources <b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li class="dropdown-item"><a href="/?page=general_resources" class="nav-link">General Resources</a></li>
            <li class="dropdown-item"><a href="/?page=teacher_resources" class="nav-link">Teacher Resources</a></li>
            <li class="dropdown-item"><a href="/?page=learning_resources" class="nav-link">Learning Resources</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="/?page=blog">Blog</a></li>
        <li class="nav-item"><a href="/?page=careers">Careers</a></li>
        <li class="nav-item"><a href="#"><i class="fa fa-search fa-lg"></i><span class="d-inline-block d-md-none">&nbsp;&nbsp;Search</span></a></li>
        </ul>
    </div>
</div>
</header>
<!-- Navbar End-->