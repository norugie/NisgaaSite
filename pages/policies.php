<div class="col-md-9">
    <!-- POLICIES LIST CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Policies</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>Governance</b></p>
                <div class="row">
                    <ul>
                        <?php $links = $site->linkList($database, 'PolicyP 100', $schoolContent); ?>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>By Laws</b></p>
                <div class="row">
                    <ul>
                        <?php $links = $site->linkList($database, 'PolicyP BL', $schoolContent); ?>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div> -->
        </div>
        <!-- <div class="row">
            <div class="col-md-6">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>300 - Students</b></p>
                <div class="row">
                    <ul>
                        <?php $links = $site->linkList($database, 'PolicyP 300', $schoolContent); ?>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>400 - Operations, Facilities</b></p>
                <div class="row">
                    <ul>
                        <?php $links = $site->linkList($database, 'PolicyP 400', $schoolContent); ?>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>500 - Finance</b></p>
                <div class="row">
                    <ul>
                        <?php $links = $site->linkList($database, 'PolicyP 500', $schoolContent); ?>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>600 - Legislation, School Act, Ministerial Orders, Ministry Directives</b></p>
                <div class="row">
                    <ul>
                        <?php $links = $site->linkList($database, 'PolicyP 600', $schoolContent); ?>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div> -->
        <br>
    </section>
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Administrative Procedures</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">We are currently in the process of updating our administrative procedures. We will be uploading the updated procedures in this section:</p>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-6">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>200 - Personnel</b></p>
                <div class="row">
                    <ul>
                        <?php $links = $site->linkList($database, 'PolicyAP 200', $schoolContent); ?>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>300 - Students</b></p>
                <div class="row">
                    <ul>
                        <?php $links = $site->linkList($database, 'PolicyAP 300', $schoolContent); ?>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>400 - Operations, Facilities</b></p>
                <div class="row">
                    <ul>
                        <?php $links = $site->linkList($database, 'PolicyAP 400', $schoolContent); ?>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <p style="margin-bottom:10px!important;font-size:14pt;"><b>500 - Finance</b></p>
                <div class="row">
                    <ul>
                        <?php $links = $site->linkList($database, 'PolicyAP 500', $schoolContent); ?>
                        <?php foreach($links as $link): ?>
                            <li class="lead mb-0"><a href="<?php if($link['link_type'] == 'File'){ echo "/links/"; } echo $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div> -->
        <br>
    </section>
</div>