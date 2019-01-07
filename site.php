<!-- Site Header -->
<?php require 'components/site_header.php'; ?>

<!-- Site Navbar -->
<?php require 'components/site_navbar.php'; ?>

<!-- ************************************************************** -->
<!-- Site Content -->

<?php 
    
    if(!isset($_GET['page']) || empty($_GET['page'])){ 

?>

        <script>
            
            window.location = "site.php?page=index";

        </script>

<?php

    } else {
        $page_name = $_GET['page'];

        if(file_exists('pages/' . $page_name . '.php')){
            
            require 'pages/' . $page_name . '.php';
        
        } else {

            require 'pages/404.php';

        }
        

    }
    
 ?>
<!-- ************************************************************** -->

<!-- Site Footer -->
<?php require 'components/site_footer.php'; ?> 

