
<div class="col-md-9">
    <!-- CONTACT CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>We are here to help you</h2>
                </div>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque commodo quam sed metus consectetur, non facilisis dui efficitur. Sed tempor, neque tempus sagittis varius, lorem nisl facilisis lorem, id rutrum nunc elit non arcu.</p>
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
                        <strong>Email Address: </strong><a href="mailto:">fakemail@nisgaa.bc.ca</a><br>
                        <strong>Phone: </strong><?php echo $info['school_phone']; ?><br>
                        <strong>Fax: </strong>+33 555 444 333<br>
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
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Contacts</h2>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="box-simple">
                            <h3 class="h4">Contact Person 1<br><span style="font-size:15px;">Contact Person 1 Position</span></h3>
                            <p>
                                <strong>Email Address: </strong><a href="mailto:">fakemail@nisgaa.bc.ca</a><br>
                                <strong>Phone Number: </strong> +1-111-111-1111
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-simple">
                            <h3 class="h4">Contact Person 2<br><span style="font-size:15px;">Contact Person 2 Position</span></h3>
                            <p>
                                <strong>Email Address: </strong><a href="mailto:">fakemail@nisgaa.bc.ca</a><br>
                                <strong>Phone Number: </strong> +1-111-111-1111
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-simple">
                            <h3 class="h4">Contact Person 3<br><span style="font-size:15px;">Contact Person 3 Position</span></h3>
                            <p>
                                <strong>Email Address: </strong><a href="mailto:">fakemail@nisgaa.bc.ca</a><br>
                                <strong>Phone Number: </strong> +1-111-111-1111
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SCHOOLS -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Schools</h2>
                </div>
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="box-simple">
                            <h3 class="h4">School 1</h3>
                            <p>Address</p>
                            <p>
                                <strong>Email Address: </strong><a href="mailto:">fakemail@nisgaa.bc.ca</a><br>
                                <strong>Phone Number: </strong> +1-111-111-1111
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box-simple">
                            <h3 class="h4">School 2</h3>
                            <p>Address</p>
                            <p>
                                <strong>Email Address: </strong><a href="mailto:">fakemail@nisgaa.bc.ca</a><br>
                                <strong>Phone Number: </strong> +1-111-111-1111
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="box-simple">
                            <h3 class="h4">School 3</h3>
                            <p>Address</p>
                            <p>
                                <strong>Email Address: </strong><a href="mailto:">fakemail@nisgaa.bc.ca</a><br>
                                <strong>Phone Number: </strong> +1-111-111-1111
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box-simple">
                            <h3 class="h4">School 4</h3>
                            <p>Address</p>
                            <p>
                                <strong>Email Address: </strong><a href="mailto:">fakemail@nisgaa.bc.ca</a><br>
                                <strong>Phone Number: </strong> +1-111-111-1111
                            </p>
                        </div>
                    </div>
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