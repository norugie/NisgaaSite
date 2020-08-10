<?php 
    $about = $site->aboutList($database, 6); 
?>
<div class="col-md-9">
    <!-- DAYCARE CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <!-- Display description for Daycare -->
                <p class="lead"><?php echo $about['web_desc']; ?></p>
            </div>
        </div>
    </section>    
</div>