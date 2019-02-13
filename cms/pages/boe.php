<?php

    $chairperson = $interaction->chairInformation($database);
    $vchairperson = $interaction->vchairInformation($database);
    $trustees = $interaction->trusteeInformation($database);

?>

<?php require '../components/modals/edit_boe.php'; ?>
<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card profile-card">
            <div class="profile-header">&nbsp;</div>
            <div class="profile-body">
                <div class="image-area">
                    <img src="../images/contacts/<?php echo $chairperson['photo']; ?>" alt="AdminBSB - Profile Image" />
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
                <button class="btn bg-green btn-lg waves-effect btn-block" data-toggle="modal" data-target="#edit-boe-modal" data-values='<?php echo json_encode(str_replace("'", "&apos;", $chairperson)); ?>' 
                                onclick="editBOE(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card profile-card">
            <div class="profile-header">&nbsp;</div>
            <div class="profile-body">
                <div class="image-area">
                    <img src="../images/contacts/<?php echo $vchairperson['photo']; ?>" alt="AdminBSB - Profile Image" />
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
                <button class="btn bg-green btn-lg waves-effect btn-block" data-toggle="modal" data-target="#edit-boe-modal" data-values='<?php echo json_encode(str_replace("'", "&apos;", $vchairperson)); ?>' 
                                onclick="editBOE(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
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
                        <img src="../images/contacts/<?php echo $trustee['photo']; ?>" alt="AdminBSB - Profile Image" />
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
                    <button class="btn bg-green btn-lg waves-effect btn-block" data-toggle="modal" data-target="#edit-boe-modal" data-values='<?php echo json_encode(str_replace("'", "&apos;", $trustee)); ?>' 
                                onclick="editBOE(this);"><i class="material-icons">edit</i><span>MODIFY</span></button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
