<?php 
    $about = $site->aboutList($database, $schoolContent); 
    $programs = $site->programList($database, $schoolContent);
?>
<div class="col-md-9">
    <!-- ABOUT US CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>School District No. 92 (Nisga'a)</h2>
                </div>
                <p class="lead"><?php echo $about['web_desc']; ?></p>
            </div>
        </div>
    </section>
    
    <!-- PROGRAMS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>PROGRAMS</h2>
                </div>
                <p class="lead"><?php echo $programs['web_desc']; ?></p>
            </div>
        </div>
    </section>

    <!-- VISION CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>VISION FOR EDUCATION</h2>
                </div>
                <img class="img-responsive img-fluid" style="display: block; margin-left: auto; margin-right: auto; padding: 10px;" src="/images/site/nisgaa-vision.png" alt="">
            </div>
        </div>
    </section>
    
</div>