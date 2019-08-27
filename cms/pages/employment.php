<?php

    if(isset($_GET['applicants']) && $_GET['applicants'] == 'true'){
        require 'employment/applicants.php';
    } else {
        require 'employment/jobs.php';
    }

?>