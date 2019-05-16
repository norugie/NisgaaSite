<?php 
    if($page_name == 'news' && isset($url[1]) && !empty($url[1])){
        $post_info = $site->postInformation($database, $url[1]);
        require 'news_read.php';
    } else if($page_name == 'announcements' && isset($url[1]) && !empty($url[1])){
        $post_info = $site->announcementInformation($database, $url[1]);
        require 'announcements.php';
    } else if($page_name == 'careers' && isset($url[1]) && !empty($url[1])){
        $career = $site->jobInformation($database, $url[1]);
        require 'career_read.php';
    }
?>
