<?php 
    $boe = $site->boeInformation($database); 
    $boe_img = $site->boeImageInformation($database);
?>

<div class="col-md-9">
    <div class="row">
        <div class="col-md-12">
            <p class="lead">The Board of Education is a corporate unit vested with authority and responsibility to govern the public education of the Nisga’a Nation. As members of the Board, trustees are accountable to the public for the decisions mandated by the Board as a corporate body, and for the quality and the delivery of educational services.</p>
        </div>
        <?php require 'components/modals/site_boe.php'; ?>
        <div class="col-md-12 text-center">
            <div class="box-image-text">
                <div class="image"><img src="images/boe/<?php echo $boe_img['web_desc']; ?>" alt="BOE Banner" class="img-fluid"></div>
                <div class="content">
                    <p class="lead" style="color: #000!important; font-size: 18px!important;">
                        <?php echo "The current elected Board members, from left to right: "; ?>
                        <?php $boe_count = count($boe); foreach($boe as $b): ?> 
                            <a href="#" data-toggle="modal" data-target="#boe-modal" data-values='{
                                    "firstname":            <?php echo json_encode($b['firstname']); ?>,
                                    "lastname":             <?php echo json_encode($b['lastname']); ?>,
                                    "position":             <?php echo json_encode($b['position']); ?>,
                                    "position_specifics":   <?php echo json_encode(str_replace("'", "&apos;", $b['position_specifics'])); ?>,
                                    "phone":                <?php echo json_encode($b['phone']); ?>,
                                    "email":                <?php echo json_encode($b['email']); ?>,
                                    "contact_desc":         <?php echo json_encode(str_replace("'", "&apos;", $b['contact_desc'])); ?>,
                                    "photo":                <?php echo json_encode($b['photo']); ?>
                                }' 
                            onclick="boeInfo(this);"><?php echo $b['firstname'] . " " . $b['lastname'];?></a><?php if($boe_count > 1){ echo ", "; } $boe_count--; ?>
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