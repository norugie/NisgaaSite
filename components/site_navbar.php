<!-- Site Backend Connection Initialization -->
<?php

    require 'functions/site.php';
    $info = $site->siteInformation($database, 8);
    $quick_links = $site->linkList($database, 'Quick Links', 2);
    $events = $site->eventList($database, 2);
    $joblist = $site->jobList($database);

?>

<!-- Top bar-->
<div class="top-bar">
    <div class="row d-flex align-items-center">
    <div class="col-md-6 d-md-block d-none">
        <p>Contact us at <?php echo $info['school_phone']; ?> or <?php echo $info['school_email']; ?>.</p>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-md-end justify-content-between">
        <div class="login"><a href="https://webdev.nisgaa.bc.ca/<?php if(isset($_SESSION['id']) && isset($_SESSION['type'])){ ?>cms/<?php } else { ?>login<?php } ?>" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-md-inline-block"><?php if(isset($_SESSION['id']) && isset($_SESSION['type'])){ ?>Hello, <?php echo $_SESSION['firstname']; ?><?php } else { ?>Login<?php } ?></span></a></div>
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
    <a href="/" class="navbar-brand home"><img src="/nisgaa-icon-banner.png" alt="Nisga'a SD92 Icon" class="d-none d-md-inline-block"><img src="/nisgaa-icon.png" alt="Nisga'a SD92 Icon" class="d-inline-block d-md-none"><span class="sr-only">Nisga'a - go to homepage</span></a>
    <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
    <div id="navigation" class="navbar-collapse collapse">
        <ul class="nav navbar-nav ml-auto">
        <li class="nav-item"><a href="/">Home</a></li>
        <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Our District <b class="caret"></b></a>
            <ul class="dropdown-menu megamenu">
            <li>
                <div class="row">
                <div class="col-lg-4">
                    <h5>District Information</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="/inquiries" class="nav-link">Inquiries</a></li>
                    <li class="nav-item"><a href="/contacts" class="nav-link">Contact Us</a></li>
                    </ul>
                    <h5>Departments</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="/department/finance" class="nav-link">Finance</a></li>
                    <li class="nav-item"><a href="/department/sdss" class="nav-link">Student Data Support Services</a></li>
                    <li class="nav-item"><a href="/department/tech" class="nav-link">Information Technology Department</a></li>
                    <li class="nav-item"><a href="/department/maintenance" class="nav-link">Transportation and Maintenance Department</a></li>
                    </ul>      
                </div>
                <div class="col-lg-4">
                    <h5>Curriculum</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="/curriculum/k12" class="nav-link">K-12 Program</a></li>
                    <li class="nav-item"><a href="/curriculum/dl" class="nav-link">Distant Learners Program</a></li>
                    <li class="nav-item"><a href="/curriculum/nlc" class="nav-link">Nisga'a Language and Culture</a></li>
                    </ul>
                    <h5>Miscellaneous</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="/culture_corner" class="nav-link">Culture Corner</a></li>
                    <li class="nav-item"><a href="/files" class="nav-link">District Files</a></li>
                    </ul> 
                </div>
                <div class="col-lg-4">
                    <h5>Governance</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="/boe" class="nav-link">Board of Education</a></li>
                    <li class="nav-item"><a href="/packages" class="nav-link">Board Meeting Packages</a></li>
                    </ul>
                    <h5>External Links</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="https://www.nisgaanation.ca/" class="nav-link" target="_blank">Nisga'a Lisims Government</a></li>
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
            <li class="dropdown-item"><a href="/general_resources" class="nav-link">General Resources</a></li>
            <li class="dropdown-item"><a href="/teacher_resources" class="nav-link">Teacher Resources</a></li>
            <li class="dropdown-item"><a href="/learning_resources" class="nav-link">Learning Resources</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="/news">District News</a></li>
        <li class="nav-item"><a href="/careers">Careers</a></li>
        <li class="nav-item"><a href="#search"><i class="fa fa-search fa-lg"></i><span class="d-inline-block d-md-none">&nbsp;&nbsp;Search</span></a></li>
        </ul>
    </div>
</div>
</header>
<!-- Navbar End-->

<!-- Search Page -->

<div id="search">
    <button type="button" class="close">×</button>
    <form action="/search" method="POST">
        <input type="search" name="search" placeholder="Search for..." autocomplete="off" required>
        <button type="submit" class="btn btn-lg btn-primary">Search</button>
    </form>
</div>

<!-- Search Page End -->