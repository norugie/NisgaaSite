<?php 
    header('X-Frame-Options: SAMEORIGIN');
    header("X-XSS-Protection: 1; mode=block");
    header("Strict-Transport-Security:max-age=63072000");
    header('X-Content-Type-Options: nosniff');
    header('Content-type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Primary Meta Tags -->
        <title>SD92 - Nisga'a</title>
        <meta name="title" content="SD92 - Nisga'a">
        <meta name="description" content="Test Description">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://webdev.nisgaa.bc.ca">
        <meta property="og:title" content="SD92 - Nisga'a">
        <meta property="og:description" content="Test Description">
        <meta property="og:image" content="https://webdev.nisgaa.bc.ca/nisgaa-icon-banner.png">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://webdev.nisgaa.bc.ca">
        <meta property="twitter:title" content="SD92 - Nisga'a">
        <meta property="twitter:description" content="Test Description">
        <meta property="twitter:image" content="https://webdev.nisgaa.bc.ca/nisgaa-icon-banner.png">

        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="/plugins/bootstrap-v4/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">
        <!-- Google fonts - Roboto-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
        <!-- Bootstrap Select-->
        <link rel="stylesheet" href="/plugins/bootstrap-select/css/bootstrap-select.min.css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="/plugins/owl.carousel/assets/owl.carousel.css">
        <link rel="stylesheet" href="/plugins/owl.carousel/assets/owl.theme.default.css">
        <!-- Theme stylesheet-->
        <link rel="stylesheet" href="/css/themes/style.red.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="/css/custom.css">
        <!-- Favicon and apple touch icons-->
        <link rel="icon" href="/nisgaa-icon.png" type="image/x-icon">

        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif] -->

        <!-- JQuery Init -->
        <script src="/plugins/jquery/jquery.min.js"></script>

    </head>
    <body>
        <!-- Page Loader -->
        <?php require 'components/page_loader.php'; ?>
        <!-- #END# Page Loader -->
        <div id="all" style ="overflow-x: hidden;">