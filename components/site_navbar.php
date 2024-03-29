<!-- Site Backend Connection Initialization -->
<?php

    $schoolInfo = 8;
    $schoolContent = 2;
    $info = $site->siteInformation($database, $schoolInfo);
    $quick_links = $site->linkList($database, 'Quick Links', $schoolContent);
    $events = $site->eventList($database, $schoolContent);
    $joblist = $site->jobList($database);
    $xml = $xml = simplexml_load_file('https://sd92-makeafuture.simplication.com/Applicant/attSearchexXML.aspx?ep=6bff4ee4-8ea3-4aa9-9bd0-aeebf6dd3dd6&lc=en&app_type=externall');

?>

<!-- Top bar-->
<?php require 'site_topbar.php'; ?>
<!-- Top bar end-->

<!-- Navbar Start-->
<header class="nav-holder make-sticky">
<div id="navbar" role="navigation" class="navbar navbar-expand-lg">
    <a href="/" class="navbar-brand home"><img src="/nisgaa-icon-banner.png" alt="Nisga'a SD92 Icon" class="d-none d-md-inline-block"><img src="/nisgaa-icon-sd92.png" alt="Nisga'a SD92 Icon" class="d-inline-block d-md-none"><span class="sr-only">Nisga'a - go to homepage</span></a>
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
                    <!-- <li class="nav-item"><a href="/inquiries" class="nav-link">Inquiries</a></li> -->
                    <li class="nav-item"><a href="/contacts" class="nav-link">Contact Us</a></li>
                    </ul>
                    <h5>Departments</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="/department/superintendent" class="nav-link">School District Superintendent</a></li>
                    <li class="nav-item"><a href="/department/finance" class="nav-link">Finance</a></li>
                    <li class="nav-item"><a href="/department/tech" class="nav-link">Information Technology Department</a></li>
                    <li class="nav-item"><a href="/department/maintenance" class="nav-link">Transportation and Maintenance Department</a></li>
                    </ul>
                    <h5>Curriculum</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="/curriculum/k12" class="nav-link">K-12 Program</a></li>
                    <!-- <li class="nav-item"><a href="/curriculum/dl" class="nav-link">Distributed Learning Program</a></li> -->
                    </ul>      
                </div>
                <div class="col-lg-4">
                    <h5>Governance</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="/boe" class="nav-link">Board of Education</a></li>
                    <li class="nav-item"><a href="/policies" class="nav-link">Board of Education - Policies</a></li>
                    <li class="nav-item"><a href="/process_directives" class="nav-link">Board of Education - Process and Directives</a></li>
                    <li class="nav-item"><a href="/packages" class="nav-link">Board Meeting Packages</a></li>
                    <li class="nav-item"><a href="/minutes" class="nav-link">Board Meeting Minutes</a></li>
                    <li class="nav-item"><a href="/plans" class="nav-link">District Strategic Plans</a></li>
                    </ul>
                    <h5>Miscellaneous</h5>
                    <ul class="list-unstyled mb-3">
                    <!-- <li class="nav-item"><a href="/culture_corner" class="nav-link">Culture Corner</a></li> -->
                    <li class="nav-item"><a href="/files" class="nav-link">District Files</a></li>
                    <li class="nav-item"><a href="/help" class="nav-link">Tech Help</a></li>
                    <li class="nav-item"><a href="/dictionary" class="nav-link">Nisga'a Phrases</a></li>
                    </ul> 
                </div>
                <div class="col-lg-4">
                    <h5>External Links</h5>
                    <ul class="list-unstyled mb-3">
                    <li class="nav-item"><a href="https://www.nisgaanation.ca/" class="nav-link" target="_blank" rel="noreferrer">Nisga'a Lisims Government</a></li>
                    <li class="nav-item"><a href="http://www.gitlaxtaamiks.com/" class="nav-link" target="_blank" rel="noreferrer">Gitlaxt'aamiks</a></li>
                    <li class="nav-item"><a href="http://www.nisgaanation.ca/gitwinksihlkw-canyon-city" class="nav-link" target="_blank" rel="noreferrer">Gitwinksihlkw</a></li>
                    <li class="nav-item"><a href="http://www.laxgaltsap.ca/" class="nav-link" target="_blank" rel="noreferrer">Laxgaltsap</a></li>
                    <li class="nav-item"><a href="http://www.gingolx.ca/" class="nav-link" target="_blank" rel="noreferrer">Gingolx</a></li>
                    </ul>
                </div>
                </div>
            </li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Schools<b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li class="dropdown-item"><a href="https://ness.nisgaa.bc.ca" class="nav-link">NISGA'A ELEMENTARY SECONDARY SCHOOL</a></li>
            <li class="dropdown-item"><a href="https://ges.nisgaa.bc.ca" class="nav-link">GITWINKSIHLKW ELEMENTARY SCHOOL</a></li>
            <li class="dropdown-item"><a href="https://aames.nisgaa.bc.ca" class="nav-link">ALVIN A. MCKAY ELEMENTARY SCHOOL</a></li>
            <li class="dropdown-item"><a href="https://nbes.nisgaa.bc.ca" class="nav-link">NATHAN BARTON ELEMENTARY SCHOOL</a></li>
            <li class="dropdown-item"><a href="/nlc" class="nav-link">NISGA'A LANGUAGE AND CULTURE</a></li>
            <li class="dropdown-item"><a href="/gcc" class="nav-link">GITGINSAA CHILDCARE CENTRE</a></li>
            <li class="dropdown-item"><a href="/strong_start" class="nav-link">STRONG START</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Resources <b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li class="dropdown-item"><a href="/district_resources" class="nav-link">District Resources</a></li>
            <li class="dropdown-item"><a href="/learning_resources" class="nav-link">Learning Resources</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="/news">District News</a></li>
        <li class="nav-item"><a href="/careers">Careers</a></li>
        <li class="nav-item"><a href="/parent_resources">Parents</a></li>
        <li class="nav-item"><a href="#search"><i class="fa fa-search fa-lg"></i><span class="d-inline-block d-lg-none">&nbsp;&nbsp;Search</span></a></li>
        </ul>
    </div>
</div>
</header>
<!-- Navbar End-->

<!-- Search Page -->

<div id="search">
    <button type="button" class="close">×</button>
    <form action="/search" method="POST">
        <input type="search" name="search" aria-label="Search Overlay" placeholder="Search for..." autocomplete="off" required>
        <button type="submit" class="btn btn-lg btn-primary">Search</button>
    </form>
</div>

<!-- Search Page End -->