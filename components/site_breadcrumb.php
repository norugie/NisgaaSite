<!-- BREADCRUMB -->
<?php

if($_GET['page'] == 'curriculum' || $_GET['page'] == 'department'){
    $content_breadcrumb = $_GET['content'];
    if($content_breadcrumb == 'k12'){
        $content_breadcrumb = 'K-12 PROGRAM';
    } else if($content_breadcrumb == 'dl'){
        $content_breadcrumb = 'DISTANCE LEARNERS PROGRAM';
    } else if($content_breadcrumb == 'nlc'){
        $content_breadcrumb = 'LANGUAGE AND CULTURE';
    } else if($content_breadcrumb == 'sdo'){
        $content_breadcrumb = 'SCHOOL DISTRICT OFFICE';
    } else if($content_breadcrumb == 'sss'){
        $content_breadcrumb = 'STUDENT SUPPORT SERVICES';
    } else if($content_breadcrumb == 'tech'){
        $content_breadcrumb = 'TECH OFFICE';
    } else if($content_breadcrumb == 'maintenance'){
        $content_breadcrumb = 'MAINTENANCE OFFICE';
    } else {
        $content_breadcrumb = '';
    }
}

$breadcrumb;

if($_GET['page'] == 'news'){
    $breadcrumb = "District News";
} else {
    $breadcrumb = str_replace('_', ' ', $_GET['page']);
}

?>
<div id="heading-breadcrumbs" class="border-top-0 border-bottom-0">
    <div class="container-no-center">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-12 text-xs-sm-center">
                <h1 class="h2"><?php echo $breadcrumb; ?></h1>
            </div>
        </div>
    </div>
</div>

<!-- BREADCRUMB END -->