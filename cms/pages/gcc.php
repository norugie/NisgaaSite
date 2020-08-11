<?php
    if(!isset($_GET['option']) || empty($_GET['option'])){
        require 'gcc/gcc_view.php';
    } else {
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <?php
                        require 'gcc/gcc_modify.php';
                    ?>
                </div>
            </div>
        </div>
    <?php        
    }
?>