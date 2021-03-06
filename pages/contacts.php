
<div class="col-md-9">
    <!-- CONTACT PERSON -->
    <?php $contacts = $site->contactList($database, 2); ?>
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>School Board Office Contacts</h2>
                </div>
                <div class="row text-center">
                    <!-- Display current active members of the Board Office -->
                    <?php foreach($contacts as $contact): ?>
                        <div class="col-md-4 justify-content">
                            <div class="box-simple">
                                <h3 class="h4"><?php echo $contact['firstname'] . " " . $contact['lastname']; ?><br><span style="font-size:15px;"><?php echo $contact['position']?></span></h3>
                                <p style="color: #000!important;">
                                    <strong>Email Address: </strong><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a><br>
                                    <strong>Phone Number: </strong> <?php echo $contact['phone']; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- SCHOOLS -->
    <?php $schools = $site->schoolList($database); ?>
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Schools</h2>
                </div>
                <div class="row text-center">
                    <!-- Display school information -->
                    <?php foreach($schools as $school): ?>
                        <div class="col-md-6">
                            <div class="box-simple">
                                <h3 class="h4"><?php echo $school['school_name']; ?></h3>
                                <p style="color: #000!important;">
                                    <?php echo $school['school_addr']; ?><br>
                                    
                                </p>
                                <p style="color: #000!important;">
                                    <strong>Email Address: </strong><a href="mailto:<?php echo $school['school_email']; ?>"><?php echo $school['school_email']; ?></a><br>
                                    <strong>Phone Number: </strong><?php echo $school['school_phone']; ?><br>
                                    <strong>Fax Number: </strong><?php echo $school['school_fax']; ?><br>
                                    <strong>Principal: </strong><?php echo $school['school_principal']; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- DEPARTMENTS -->
    <?php $departments = $site->departmentList($database); ?>
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>DEPARTMENTS</h2>
                </div>
                <div class="row text-center">
                    <!-- Display department information -->
                    <?php foreach($departments as $department): ?>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <h3 class="h4"><?php echo $department['school_name']; ?></h3>
                                <p style="color: #000!important;">
                                    <strong>Email Address: </strong><a href="mailto:<?php echo $department['school_email']; ?>"><?php echo $department['school_email']; ?></a><br>
                                    <strong>Phone Number: </strong><?php echo $department['school_phone']; ?><br>
                                    <strong>Fax Number: </strong><?php echo $department['school_fax']; ?><br>
                                    <strong>Contact Person: </strong><?php echo $department['school_principal']; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- GMAPS -->
    <?php require 'components/map.php'; ?>
</div>
