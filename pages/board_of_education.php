<?php

    $chairperson = $site->chairInformation($database);
    $vchairperson = $site->vchairInformation($database);
    $trustees = $site->trusteeInformation($database);

?>

<div class="col-md-9">
    <div class="row">
        <div class="col-md-12">
            <div class="row text-center">
                <div class="col-md-6">
                    <div data-animate="fadeInUp" class="team-member">
                        <div class="image"><img src="images/contacts/<?php echo $chairperson['photo']; ?>" alt="" class="img-fluid rounded-circle boe-page"></div>
                        <h3><?php echo $chairperson['firstname'] . " " . $chairperson['lastname']; ?></h3>
                        <p class="role role-main"><?php echo $chairperson['position']; ?></p>
                        <p class="role"><?php echo $chairperson['position_specifics']; ?></p>
                        <p class="role role-contact"><?php echo $chairperson['email']; ?> | <?php echo $chairperson['phone']; ?></p>
                        <div class="text">
                            <p><?php echo $chairperson['contact_desc']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div data-animate="fadeInUp" class="team-member">
                        <div class="image"><img src="images/contacts/<?php echo $vchairperson['photo']; ?>" alt="" class="img-fluid rounded-circle boe-page"></div>
                        <h3><?php echo $vchairperson['firstname'] . " " . $vchairperson['lastname']; ?></h3>
                        <p class="role role-main"><?php echo $vchairperson['position']; ?></p>
                        <p class="role"><?php echo $vchairperson['position_specifics']; ?></p>
                        <p class="role role-contact"><?php echo $vchairperson['email']; ?> | <?php echo $vchairperson['phone']; ?></p>
                        <div class="text">
                            <p><?php echo $vchairperson['contact_desc']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <?php foreach($trustees as $trustee): ?>
                    <div class="col-md-4">
                        <div data-animate="fadeInUp" class="team-member">
                            <div class="image"><img src="images/contacts/<?php echo $trustee['photo']; ?>" alt="" class="img-fluid rounded-circle boe-page"></div>
                            <h3><?php echo $trustee['firstname'] . " " . $trustee['lastname']; ?></h3>
                            <p class="role role-main"><?php echo $trustee['position']; ?></p>
                            <p class="role"><?php echo $trustee['position_specifics']; ?></p>
                            <p class="role role-contact"><?php echo $trustee['email']; ?> | <?php echo $trustee['phone']; ?></p>
                            <div class="text">
                                <p><?php echo $trustee['contact_desc']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>