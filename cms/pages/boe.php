<?php

    $chairperson = $interaction->chairInformation($database);
    $vchairperson = $interaction->vchairInformation($database);
    $trustees = $interaction->trusteeInformation($database);

    $boe_img = $interaction->boeImage($database);
?>

<?php require '../components/modals/edit_boe.php'; ?>

<!-- BOE GROUP IMAGE -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>BOARD OF EDUCATION GROUP PICTURE</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <center>
                            <?php if($_SESSION['type'] != 3){ ?>
                                <button type="button" class="btn bg-green waves-effect" style="display: inline-block;" data-toggle="modal" data-target="#edit-boe-image-modal" 
                                    data-values='{
                                        "id":           <?php echo json_encode($boe_img['id']); ?>,
                                        "web_desc":     <?php echo json_encode(str_replace("'", "&apos;", $boe_img['web_desc'])); ?>
                                    }' 
                                    onclick="editBOEImage(this);"><i class="material-icons">mode_edit</i><span>MODIFY</span></button>
                            <?php } ?>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <center>
                            <img class="img-responsive" src="../images/boe/<?php echo $boe_img['web_desc']; ?>" alt="BOE Banner Image">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BOE MEMBER INFORMATION -->
<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card profile-card">
            <div class="profile-header">&nbsp;</div>
            <div class="profile-body">
                <div class="image-area">
                    <img src="../images/contacts/<?php echo $chairperson['photo']; ?>" alt="BOE Image" style="height: 135px; width: 135px; object-fit: cover;" />
                </div>
                <div class="content-area">
                    <h3><?php echo $chairperson['firstname'] . " " . $chairperson['lastname']; ?></h3>
                    <p><?php echo $chairperson['position']; ?></p>
                </div>
            </div>
            <div class="profile-footer">
                <ul>
                        <li>
                            <span>Email Address</span>
                            <span><?php echo $chairperson['email']; ?></span>
                        </li>
                        <li>
                            <span>Contact Number</span>
                            <span><?php echo $chairperson['phone']; ?></span>
                        </li>
                        <li>
                            <span>Trustee for</span>
                            <span><?php echo $chairperson['position_specifics']; ?></span>
                        </li>
                        <li style="margin: 0;"></li>
                </ul>
                <p><?php echo $chairperson['contact_desc']; ?></p>
                <?php if($_SESSION['type'] != 3){ ?>
                    <button class="btn bg-green btn-lg waves-effect btn-block" data-toggle="modal" data-target="#edit-boe-modal" data-values='<?php echo json_encode(str_replace("'", "&apos;", $chairperson)); ?>' 
                    onclick="editBOE(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card profile-card">
            <div class="profile-header">&nbsp;</div>
            <div class="profile-body">
                <div class="image-area">
                    <img src="../images/contacts/<?php echo $vchairperson['photo']; ?>" alt="BOE Image" style="height: 135px; width: 135px; object-fit: cover;" />
                </div>
                <div class="content-area">
                    <h3><?php echo $vchairperson['firstname'] . " " . $vchairperson['lastname']; ?></h3>
                    <p><?php echo $vchairperson['position']; ?></p>
                </div>
            </div>
            <div class="profile-footer">
                <ul>
                        <li>
                            <span>Email Address</span>
                            <span><?php echo $vchairperson['email']; ?></span>
                        </li>
                        <li>
                            <span>Contact Number</span>
                            <span><?php echo $vchairperson['phone']; ?></span>
                        </li>
                        <li>
                            <span>Trustee for</span>
                            <span><?php echo $vchairperson['position_specifics']; ?></span>
                        </li>
                        <li style="margin: 0;"></li>
                </ul>
                <p><?php echo $vchairperson['contact_desc']; ?></p>
                <?php if($_SESSION['type'] != 3){ ?>
                    <button class="btn bg-green btn-lg waves-effect btn-block" data-toggle="modal" data-target="#edit-boe-modal" data-values='<?php echo json_encode(str_replace("'", "&apos;", $vchairperson)); ?>' 
                    onclick="editBOE(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <?php foreach($trustees as $trustee): ?>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card profile-card">
                <div class="profile-header">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area">
                        <img src="../images/contacts/<?php echo $trustee['photo']; ?>" alt="BOE Image" style="height: 135px; width: 135px; object-fit: cover;" />
                    </div>
                    <div class="content-area">
                        <h3><?php echo $trustee['firstname'] . " " . $trustee['lastname']; ?></h3>
                        <p><?php echo $trustee['position']; ?></p>
                    </div>
                </div>
                <div class="profile-footer">
                    <ul>
                            <li>
                                <span>Email Address</span>
                                <span><?php echo $trustee['email']; ?></span>
                            </li>
                            <li>
                                <span>Contact Number</span>
                                <span><?php echo $trustee['phone']; ?></span>
                            </li>
                            <li>
                                <span>Trustee for</span>
                                <span><?php echo $trustee['position_specifics']; ?></span>
                            </li>
                            <li style="margin: 0;"></li>
                    </ul>
                    <p><?php echo $trustee['contact_desc']; ?></p>
                    <?php if($_SESSION['type'] != 3){ ?>
                        <button class="btn bg-green btn-lg waves-effect btn-block" data-toggle="modal" data-target="#edit-boe-modal" data-values='<?php echo json_encode(str_replace("'", "&apos;", $trustee)); ?>' 
                        onclick="editBOE(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
