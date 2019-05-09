<?php 
    if($_GET['page'] == 'news' && isset($_GET['id']) && !empty($_GET['id'])){
        $post_info = $site->postInformation($database, $_GET['id']);
        require 'news_read.php';
    } else if($_GET['page'] == 'announcements' && isset($_GET['id']) && !empty($_GET['id'])){
        $post_info = $site->announcementInformation($database, $_GET['id']);
        require 'announcements.php';
    } else if($_GET['page'] == 'careers' && isset($_GET['id']) && !empty($_GET['id'])){
        require 'career_read.php';
    }
?>
