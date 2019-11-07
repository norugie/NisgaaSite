<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php
                if($_SESSION['school'] == 3) echo "https://dev-ness.nisgaa.bc.ca";
                else if($_SESSION['school'] == 4) echo "https://dev-aames.nisgaa.bc.ca";
                else if($_SESSION['school'] == 5) echo "https://dev-ges.nisgaa.bc.ca";
                else if($_SESSION['school'] == 6) echo "https://dev-nbes.nisgaa.bc.ca";
                else echo "../";
            ?>">SD92 - NISGA'A CMS</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Logout -->
                <li><a href="../functions/logout.php"><i class="material-icons">input</i></a></li>
                <!-- #END# Logout -->
            </ul>
        </div>
    </div>
</nav>