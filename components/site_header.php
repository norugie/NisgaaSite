<?php 
    header('X-Frame-Options: SAMEORIGIN');
    header("X-XSS-Protection: 1; mode=block");
    header("Strict-Transport-Security: max-age=63072000");
    header('X-Content-Type-Options: nosniff');
    header('Content-type: text/html; charset=utf-8');
    header("Cache-Control: max-age=604800"); // File to cache lasts for 1 week
?>
<!DOCTYPE html>
<html>
    <head profile="http://www.w3.org/1999/xhtml/vocab">
        <meta charset="UTF-8">
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Primary Meta Tags -->
        <title>SD92 - Nisga'a</title>
        <meta name="title" content="SD92 - Nisga'a">
        <meta name="description" content="On Nisga'a Lands, primary and secondary students are served by School District #92 (Nisga'a), part of British Columbia's publicly funded school system.
        ">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://webdev.nisgaa.bc.ca/">
        <meta property="og:title" content="SD92 - Nisga'a">
        <meta property="og:description" content="On Nisga'a Lands, primary and secondary students are served by School District #92 (Nisga'a), part of British Columbia's publicly funded school system.
        ">
        <meta property="og:image" content="https://webdev.nisgaa.bc.ca/images/thumbnails/post_thumbnail.jpg">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://webdev.nisgaa.bc.ca/">
        <meta property="twitter:title" content="SD92 - Nisga'a">
        <meta property="twitter:description" content="On Nisga'a Lands, primary and secondary students are served by School District #92 (Nisga'a), part of British Columbia's publicly funded school system.
        ">
        <meta property="twitter:image" content="https://webdev.nisgaa.bc.ca/images/thumbnails/post_thumbnail.jpg">`

        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="/plugins/bootstrap-v4/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">
        <!-- Google fonts - Roboto-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
        <!-- Theme stylesheet-->
        <link rel="stylesheet" href="/css/themes/style.red.min.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="/css/custom.min.css">
        <link rel="stylesheet" href="/css/responsive-font.min.css">
        <!-- Favicon and apple touch icons-->
        <link rel="icon" href="/nisgaa-icon.png" type="image/x-icon">

        <!-- Tweaks for older IEs-->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <!-- JQuery Init -->
        <script src="/plugins/jquery/jquery.min.js"></script>

    </head>
    <body>
        <!-- Page Loader -->
        <?php require 'components/page_loader.php'; ?>
        <!-- #END# Page Loader -->
        <div id="all" style ="overflow-x: hidden;">