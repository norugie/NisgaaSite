<?php 
    if($_GET['page'] == 'blog' && isset($_GET['id']) && !empty($_GET['id'])){
        $post_info = $site->postInformation($database, $_GET['id']);
        require 'blog_read.php';
    } else if($_GET['page'] == 'announcements' && isset($_GET['id']) && !empty($_GET['id'])){
        $post_info = $site->announcementInformation($database, $_GET['id']);
        require 'announcements.php';
    }
?>
