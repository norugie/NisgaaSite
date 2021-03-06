<!-- BREADCRUMB -->
<?php

if($page_name == 'curriculum' || $page_name == 'department'){
    $content_breadcrumb = $url[1];
    if($content_breadcrumb == 'k12'){
        $content_breadcrumb = 'K-12 PROGRAM';
    } else if($content_breadcrumb == 'dl'){
        $content_breadcrumb = 'DISTRIBUTED LEARNING PROGRAM';
    } else if($content_breadcrumb == 'nlc'){
        $content_breadcrumb = 'LANGUAGE AND CULTURE';
    } else if($content_breadcrumb == 'finance'){
        $content_breadcrumb = 'FINANCE DEPARTMENT';
    } else if($content_breadcrumb == 'tech'){
        $content_breadcrumb = 'INFORMATION TECHNOLOGY DEPARTMENT';
    } else if($content_breadcrumb == 'maintenance'){
        $content_breadcrumb = 'TRANSPORTATION AND MAINTENANCE DEPARTMENT';
    } else if($content_breadcrumb == 'superintendent'){
        $content_breadcrumb = 'SCHOOL DISTRICT SUPERINTENDENT';
    } else {
        $content_breadcrumb = '';
    }
}

$breadcrumb;

if($page_name == 'news'){
    $breadcrumb = "District News";
} else if($page_name == 'packages'){
    $breadcrumb = "Board Meeting Packages";
} else if($page_name == 'minutes'){
    $breadcrumb = "Board Meeting Minutes";
} else if($page_name == 'boe'){
    $breadcrumb = "Board of Education";
} else if($page_name == 'about'){
    $breadcrumb = "About us";
} else if($page_name == 'contacts'){
    $breadcrumb = "Contact us";
} else if($page_name == 'files'){
    $breadcrumb = "District Files";
} else if($page_name == 'search'){
    $breadcrumb = "Search Results";
} else if($page_name == 'process_directives'){
    $breadcrumb = "Board of Education - Process and Directives";
} else if($page_name == 'policies'){
    $breadcrumb = "Board of Education - Policies";
} else if($page_name == 'help'){
    $breadcrumb = "Tech Help";
} else if($page_name == 'plans'){
    $breadcrumb = "District Strategic Plans";
} else if($page_name == 'gcc'){
    $breadcrumb = "Gitginsaa Childcare Centre";
} else if($page_name == 'covid_district'){
    $breadcrumb = "COVID-19 Updates from SD92";
} else if($page_name == 'covid_ministry'){
    $breadcrumb = "COVID-19 Updates from the Ministry";
} else if($page_name == "dictionary"){
    $breadcrumb = "Nisga'a Phrases Dictionary";
} else if($page_name == "nlc"){
    $breadcrumb = "Nisga'a Language and Culture";
} else {
    $breadcrumb = str_replace('_', ' ', $page_name);
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