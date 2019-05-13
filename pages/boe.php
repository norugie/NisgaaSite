<?php $boe = $site->boeInformation($database); ?>

<div class="col-md-9">
    <div class="row">
        <div class="col-md-12">
            <p class="lead">The Board of Education is a corporate unit vested with authority and responsibility to govern the public education of the Nisga’a Nation. As members of the Board, trustees are accountable to the public for the decisions mandated by the Board as a corporate body, and for the quality and the delivery of educational services.</p>
        </div>
        <?php require 'components/modals/site_boe.php'; ?>
        <div class="col-md-12 text-center">
            <div class="box-image-text">
                <div class="image"><img src="images/contacts/boe-banner.jpg" alt="BOE Banner" class="img-fluid"></div>
                <div class="content">
                    <p class="lead">
                        <?php echo "The current elected Board members, from left to right: "; ?>
                        <?php $boe_count = count($boe); foreach($boe as $b): ?> 
                            <a href="#" data-toggle="modal" data-target="#boe-modal" data-values='<?php echo json_encode(str_replace("'", "&apos;", $b)); ?>' onclick="boeInfo(this);"><?php echo $b['firstname'] . " " . $b['lastname'];?></a><?php if($boe_count > 1){ echo ", "; } $boe_count--; ?>
                        <?php endforeach; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function boeInfo(boeInfo){
        boe = $(boeInfo).data("values");
        
        $("#trustee-img").attr("src", 'images/contacts/' + boe['photo']);
        $("#trustee-name").html(boe['firstname'] + " " + boe['lastname']);
        $("#trustee-position").html(boe['position']);
        $("#trustee-place").html(boe['position_specifics']);
        $("#trustee-email").html(boe['email']);
        $("#trustee-phone").html(boe['phone']);
        $("#trustee-desc").html(boe['contact_desc']);

    }

</script>