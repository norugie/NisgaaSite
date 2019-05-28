<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <?php
                if(!isset($_GET['option']) || empty($_GET['option'])){
                    if($_GET['page'] == 'finance'){
                        require 'finance.php';
                    } else {
                        require 'curdept/curdept_view.php';
                    }
                } else {
                    require 'curdept/curdept_modify.php';
                }
            ?>
        </div>
    </div>
</div>