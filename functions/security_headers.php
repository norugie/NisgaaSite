<?php 
    header('X-Frame-Options: SAMEORIGIN');
    header("X-XSS-Protection: 1; mode=block");
    header("Strict-Transport-Security: max-age=63072000");
    header('X-Content-Type-Options: nosniff');
    header('Content-type: text/html; charset=utf-8');
    header("Cache-Control: max-age=604800"); // File to cache lasts for 1 week
?>