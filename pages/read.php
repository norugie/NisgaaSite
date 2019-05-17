<?php 
    if($page_name == 'news' && isset($url[1]) && !empty($url[1]) && $url[1] == 'read' && isset($url[2]) && !empty($url[2])){
        $post_info = $site->postInformation($database, $url[2]);
        require 'news_read.php';
    } else if($page_name == 'announcements' && isset($url[1]) && !empty($url[1]) && $url[1] == 'read' && isset($url[2]) && !empty($url[2])){
        $post_info = $site->announcementInformation($database, $url[2]);
        require 'announcements.php';
    } else if($page_name == 'careers' && isset($url[1]) && !empty($url[1]) && $url[1] == 'read' && isset($url[2]) && !empty($url[2])){
        $career = $site->jobInformation($database, $url[2]);
        require 'career_read.php';
    }
?>
