<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <?php
                if(!isset($_GET['option']) || empty($_GET['option'])){
                    require 'culture/culture_view.php';
                } else {
                    require 'culture/culture_modify.php';
                }
            ?>
        </div>
    </div>
</div>