</div></div>
<!-- FOOTER -->
<footer class="main-footer">
    <div style="padding: 10px 25px;">
        <div class="row">
            <!-- FOOTER ADDRESS -->
            <div class="col-lg-3 text-xs-sm-center">
                <h4 class="h6">SD92 (NISGA'A)</h4>
                <p class="text-uppercase"><?php echo $addr = str_replace(',', '<br>', $info['school_addr']); ?></p>
                <hr class="d-block d-lg-none">
            </div>
            <!-- FOOTER CONTACT PAGE -->
            <div class="col-lg-3">
                <h4 class="h6">Contact Us</h4>
                <ul class="list-unstyled footer-blog-list">
                    <li class="d-flex align-items-center">
                        <div class="text">
                            <h5 class="mb-0">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <i class="fa fa-phone fa-lg"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <?php echo $info['school_phone']; ?>
                                    </div>
                                </div>
                            </h5>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="text">
                            <h5 class="mb-0">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <i class="fa fa-envelope fa-lg"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <a href="post.html"><?php echo $info['school_email']; ?></a>
                                    </div>
                                </div>
                            </h5>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="text">
                            <h5 class="mb-0">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <i class="fa fa-facebook fa-lg"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <a href="post.html">[school district fb page]</a>
                                    </div>
                                </div>
                            </h5>
                        </div>
                    </li>
                </ul>
                <hr>
                <a href="/?page=contacts" class="btn btn-template-main">Go to contact page</a>

                <hr class="d-block d-lg-none">
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="row" style="padding-left: 25px; padding-right: 25px;">
            <div class="col-lg-4 text-center-md">
                <p>&copy; 2018-2019. SD92 (Nisga'a)</p>
            </div>
            <div class="col-lg-8 text-right text-center-md">
                <p>Template design by <a href="https://bootstrapious.com/free-templates">Bootstrapious Templates </a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
        </div>
    </div>
</footer>
</div>

<!-- Javascript files-->
<script src="/plugins/bootstrap-v4/js/bootstrap.min.js"></script>
<script src="/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="/plugins/owl.carousel/owl.carousel.min.js"></script>
<script src="/plugins/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>

<!-- Custom Javascript -->
<script src="/js/script.js"></script>
<script src="/js/front.js"></script>


</body>
</html>