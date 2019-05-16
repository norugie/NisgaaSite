<!-- Site Header -->
<?php require 'components/site_header.php'; ?>

<!-- Site Navbar -->
<?php require 'components/site_navbar.php'; ?>

<!-- ************************************************************** -->
<!-- Site Content -->

<?php
    $url = explode("/", $_SERVER['QUERY_STRING']);
    $page_name = $url[0];
?>


<?php
    if($page_name == "" || $page_name == "/"){

        require 'pages/index.php';

    } else {

        if(file_exists('pages/' . $page_name . '.php')){
            require 'components/site_breadcrumb.php';

        ?>
        <div class="container-no-center">

            <div class="row bar">
        <?php

            if(($page_name == 'news' || $page_name == 'announcements' || $page_name == 'careers') && isset($url[1]) && !empty($url[1])){
                require 'pages/read.php';
            } else {
                require 'pages/' . $page_name . '.php';
            }
            
            require 'components/site_sidebar.php';

        } else {

            require 'pages/404.php';

        }
    }
 ?>

<!-- ************************************************************** -->

<!-- Site Footer -->
<?php require 'components/site_footer.php'; ?> 

