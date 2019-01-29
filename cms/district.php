<?php 

    require '../functions/common_connector.php';
    if(isset($_SESSION['id']) && isset($_SESSION['type'])){
        $page_name = $_GET['page'];
        $page_link = 'pages/' . $page_name . '.php';

        require '../functions/district.php';
        $district = new District();
        
        $roles = $district->roleList($database);
        $schools = $district->schoolList($database);
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Page Header -->
    <?php require '../components/page_head.php'; ?>
    <!-- #END# Page Header -->
</head>

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
            <?php require '../components/district_notification.php'; ?>
            
            <div class="block-header">
                <h2>SCHOOL DISTRICT - <?php echo strtoupper($page_name); ?></h2>
            </div>

            <!-- Page Content -->
            
            <?php include($page_link); ?>
            
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