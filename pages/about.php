<?php 
    $about = $site->aboutList($database, $schoolContent); 
?>
<div class="col-md-9">
    <!-- ABOUT US CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>School District No. 92 (Nisga'a)</h2>
                </div>
                <!-- Display description for SD92 -->
                <p class="lead"><?php echo $about['web_desc']; ?></p>
            </div>
        </div>
    </section>    
</div>