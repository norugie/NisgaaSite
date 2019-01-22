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
            
            window.location = "/?page=index";

        </script>

<?php

    } else {
        $page_name = $_GET['page'];

        if(file_exists('pages/' . $page_name . '.php')){
            
            if($_GET['page'] != 'index'){

                require 'components/site_breadcrumb.php';
        
        ?>

                <div class="container-no-center">

                    <div class="row bar">
                        <?php
                            if($_GET['page'] == 'blog' && isset($_GET['id']) && !empty($_GET['id'])){
                                require 'pages/read.php';
                            } else {
                                require 'pages/' . $page_name . '.php';
                            }
                        ?>
                        <?php require 'components/site_sidebar.php'; ?>
                        
                    </div>

                </div>

        <?php
            } else {

                require 'pages/index.php';
                
            }

        } else {

            require 'pages/404.php';

        }
        

    }
    
 ?>
<!-- ************************************************************** -->

<!-- Site Footer -->
<?php require 'components/site_footer.php'; ?> 

