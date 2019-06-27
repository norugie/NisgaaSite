<?php 
    if($page_name == 'news' && isset($url[1]) && !empty($url[1]) && $url[1] == 'read' && isset($url[2]) && !empty($url[2])){
        $post_info = $site->postInformation($database, $url[2]);
        if($post_info['status'] == 'Closed' || empty($post_info)){
        ?>
            <script>window.location.replace("/404");</script>
        <?php
        } else {
            require 'news_read.php';
        }
    } else if($page_name == 'careers' && isset($url[1]) && !empty($url[1]) && $url[1] == 'read' && isset($url[2]) && !empty($url[2])){
        $career = $site->jobInformation($database, $url[2]);
        if($career['status'] == 'Closed' || empty($career)){
        ?>
            <script>window.location.replace("/404");</script>
        <?php
        } else {
            require 'career_read.php';
        }
    }
?>
