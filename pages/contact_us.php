
<div class="col-md-9">
    <!-- CONTACT CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>We are here to help you</h2>
                </div>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque commodo quam sed metus consectetur, non facilisis dui efficitur. Sed tempor, neque tempus sagittis varius, lorem nisl facilisis lorem, id rutrum nunc elit non arcu.</p>
                <p class="text-sm">Feel free to contact us!</p>
            </div>
        </div>
    </section>
    <section>
        <div class="row text-center">
            <div class="col-md-3">
                <div class="box-simple">
                    <div class="icon-outlined"><i class="fa fa-map-marker"></i></div>
                    <h3 class="h4">Address</h3>
                    <p>5002 Skateen Avenue<br>Gitlaxt'aamiks<br>British Columbia, <strong>Canada</strong><br>V0J 1A0</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box-simple">
                    <div class="icon-outlined"><i class="fa fa-phone"></i></div>
                    <h3 class="h4">Contact Number</h3>
                    <p>Nullam interdum nec purus ut egestas. Vestibulum tristique lacinia nulla vel rutrum. Nam elementum felis non gravida luctus.</p>
                    <p><strong>+33 555 444 333</strong></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box-simple">
                    <div class="icon-outlined"><i class="fa fa-envelope"></i></div>
                    <h3 class="h4">Electronic support</h3>
                    <p>Phasellus tincidunt mi sed euismod interdum. Sed sed urna sit amet ipsum pulvinar eleifend.</p>
                    <ul class="list-unstyled text-sm">
                        <li><strong><a href="mailto:">info@fakeemail.com</a></strong></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box-simple">
                    <div class="icon-outlined"><i class="fa fa-facebook"></i></div>
                    <h3 class="h4">Facebook</h3>
                    <p>Vestibulum id ornare sapien, quis dignissim erat. Proin tincidunt fringilla dui eu semper.</p>
                    <ul class="list-unstyled text-sm">
                        <li><strong><a href="mailto:">https://facebook.com/fakepage</a></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="bar pt-0">
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <h2>Contact form</h2>
                </div>
            </div>
            <div class="col-md-8 mx-auto">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input id="firstname" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input id="lastname" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input id="subject" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i> Send message</button>
                        </div>
                    </div>
                </form>
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