
<?php
    if(!isset($_GET['option']) || empty($_GET['option'])){
        require 'about/about_view.php';
    } else {
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <?php
                        require 'about/about_modify.php';
                    ?>
                </div>
            </div>
        </div>
    <?php        
    }
?>
