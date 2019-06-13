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
            <div class="col-lg-3 text-xs-sm-center">
                <h4 class="h6">Contact Us</h4>
                <h4 class="h6">
                    <?php echo $info['school_phone']; ?>
                </h4>
                <h4 class="h6">
                    <a href="mailto:<?php echo $info['school_email']; ?>"><?php echo $info['school_email']; ?></a>
                </h4>
                <h4 class="h6">
                    <a href="https://www.facebook.com/sd92nisgaa/" target="blank">SD92 Facebook Page</a>
                </h4>
                <hr>
                <a href="/contacts" class="btn btn-template-main">Go to contact page</a>

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

<!-- Custom Javascript -->
<script src="/js/script.js"></script>


</body>
</html>