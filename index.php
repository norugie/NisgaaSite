<?php

    $url = explode("/", $_SERVER['QUERY_STRING']); // Get URL
    $page_name = $url[0]; // Explode URL string to array, use array 0 as variable for page name

    // Remove the fbclid that gets attached when clicking the site from Facebook
    if(strpos($page_name, "fbclid") !== false){
        header("location: /");
    }

    // Redirect login.php to /login
    if($page_name == "login"){
        require 'login.php';
        exit();
    }

?>

<!-- Site Header -->
<?php require 'components/site_header.php'; ?>

<!-- Site Navbar -->
<?php require 'components/site_navbar.php'; ?>

<!-- ************************************************************** -->
<!-- Site Content -->

<?php

    if($page_name == "" || $page_name == "/"){

        // Display Index page
        require 'pages/index.php';

    } else if($page_name == 'restricted'){

        // Display 403 page
        require 'pages/restricted.php';

    } else {

        if(file_exists('pages/' . $page_name . '.php')){

            // Display site breadcrumb
            require 'components/site_breadcrumb.php';

        ?>
        <div class="container-no-center">

            <div class="row bar">
        <?php

            if(($page_name == 'news' || $page_name == 'careers') && isset($url[1]) && !empty($url[1]) && $url[1] == 'read' && isset($url[2]) && !empty($url[2])){
                
                // Display read page for news and careers
                require 'pages/read.php';
            
            } else {
                
                // Display pages if the file exists
                require 'pages/' . $page_name . '.php';
            
            }
            
            // Display site sidebar
            require 'components/site_sidebar.php';
        
        ?>
            </div>

        </div>
        <?php
        } else {

            // Display 404 page
            require 'pages/404.php';

        }
    }
 ?>

<!-- ************************************************************** -->

<!-- Site Footer -->
<?php require 'components/site_footer.php'; ?> 

