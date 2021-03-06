<?php require 'site_development_warning.php'; ?>
<div class="top-bar">
    <div class="row d-flex align-items-center">
    <div class="col-md-6 d-md-block d-none">
        <p>Contact us at <?php echo $info['school_phone']; ?> or <?php echo $info['school_email']; ?>.</p>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-md-end justify-content-between">
        <div class="login"><a href="https://www.nisgaa.bc.ca/auth" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-md-inline-block">Site Panel</span></a></div>
        <ul class="social-custom list-inline">
            <li class="list-inline-item"><a class="fb-icon" aria-label="Facebook Page" href="https://www.facebook.com/nisgaa.sd92/" target="_blank" rel="noreferrer"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a class="twt-icon" aria-label="Twitter Page" href="https://www.twitter.com/nisgaa_sd92/" target="_blank" rel="noreferrer"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a class="email-icon" aria-label="District Email" href="mailto:<?php echo $info['school_email']; ?>"><i class="fa fa-envelope"></i></a></li>
        </ul>
        </div>
    </div>
    </div>
</div>