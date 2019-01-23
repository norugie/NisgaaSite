<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.html">SD92 - NISGA'A CMS</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                <!-- #END# Call Search -->
                <!-- Tasks -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-toggle="modal" data-target="#profile-modal"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../functions/logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </li>
                <!-- #END# Tasks -->
            </ul>
        </div>
    </div>
</nav>

<?php require 'modals/profile.php'; ?>