
<div class="col-md-9">
    <!-- CONTACT CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>We are here to help you</h2>
                </div>
                <p class="lead">We're here to provide you with more information and answer any question you may have. You can reach us through any of the contact means below:</p>
            </div>
        </div>
    </section>
    <section>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="box-simple">
                    <div class="icon-outlined"><i class="fa fa-map-marker"></i></div>
                    <h3 class="h4">Address</h3>
                    <p><?php echo $addr = str_replace(',', '<br>', $info['school_addr']); ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-simple">
                    <div class="icon-outlined"><i class="fa fa-phone"></i></div>
                    <h3 class="h4">Contact Information</h3>
                    <p>
                        <strong>Email Address: </strong><a href="mailto:"><?php echo $info['school_email']; ?></a><br>
                        <strong>Phone Number: </strong><?php echo $info['school_phone']; ?><br>
                        <strong>Fax Number: </strong><?php echo $info['school_fax']; ?><br>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-simple">
                    <div class="icon-outlined"><i class="fa fa-facebook"></i></div>
                    <h3 class="h4">Facebook</h3>
                    <p>Vestibulum id ornare sapien, quis dignissim erat. Proin tincidunt fringilla dui eu semper.</p>
                    <ul class="list-unstyled text-sm">
                        <li><strong><a href="https://facebook.com/fakepage">https://facebook.com/fakepage</a></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT PERSON -->
    <?php $contacts = $site->contactList($database, 2); ?>
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Contacts</h2>
                </div>
                <div class="row text-center">
                    <?php foreach($contacts as $contact): ?>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <h3 class="h4"><?php echo $contact['firstname'] . " " . $contact['lastname']; ?><br><span style="font-size:15px;"><?php echo $contact['position']?></span></h3>
                                <p>
                                    <strong>Email Address: </strong><a href="mailto:"><?php echo $contact['email']; ?></a><br>
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
                    <?php foreach($schools as $school): ?>
                        <div class="col-md-6">
                            <div class="box-simple">
                                <h3 class="h4"><?php echo $school['school_name']; ?></h3>
                                <p><?php echo $school['school_addr']; ?></p>
                                <p>
                                    <strong>Email Address: </strong><a href="mailto:"><?php echo $school['school_email']; ?></a><br>
                                    <strong>Phone Number: </strong><?php echo $school['school_phone']; ?><br>
                                    <strong>Fax Number: </strong><?php echo $school['school_fax']; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- GMAPS -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Give us a visit</h2>
                </div>
                <div id="map" style="width:100%;height:400px;"></div>
            </div>
        </div>
    </section>
</div>

<script src="js/gmaps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuW6fO9tShx85mZ3u-Y5SEi9EaeLTlGGA&callback=nisgaaMap"></script>