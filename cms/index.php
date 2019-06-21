<?php 

    require '../functions/common_connector.php';
    if(isset($_SESSION['id']) && isset($_SESSION['type'])){

        require '../functions/get_dashboard.php';
        $dashboard = new Dashboard();
?>


<!-- Page Header -->
<?php require '../components/page_head.php'; ?>
<!-- #END# Page Header -->


<body class="theme-blue-grey">
    
    <!-- Page Loader -->
    <?php require '../components/page_loader.php'; ?>
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Search Bar -->
    <?php require '../components/page_search.php'; ?>
    <!-- #END# Search Bar -->
    
    <!-- Top Bar -->
    <?php require '../components/page_navbar.php'; ?>
    <!-- #Top Bar -->
    
    <section>
        <!-- Left Sidebar -->
        <?php require '../components/page_sidebar.php'; ?>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php require '../components/dashboard_notification.php'; ?>
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Page Content -->

                <?php require 'pages/dashboard.php'; ?>
            
            <!-- #END# Page Content -->

        </div>
    </section>


    <!-- Page Footer -->
    <?php require '../components/page_foot.php'; ?>
    <!-- #END# Page Footer -->

</body>

</html>
<?php

    } else {
        header ("location:../login.php?restricted=true");
    }

?>