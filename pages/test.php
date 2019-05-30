
<?php

    $path = "jobs/resumes/";
    $filename = "testfile.pdf";
    $file = $path.$filename;

    $mailto   = 'rbarrameda@nisgaa.bc.ca';
    $mailfrom = 'sd92@nisgaa.bc.ca';
    $mailname = 'SDO';
    $subject  = 'Testing sendmail.exe';
    $message  = 'Hi, you just received an email using sendmail!';
    
    // get file
    $content = file_get_contents( $file);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    
    // header
    $header = "From: ".$mailname." <".$mailfrom.">\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    
    // message & attachment
    $nmessage = "--".$uid."\r\n";
    $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $nmessage .= $message."\r\n\r\n";
    $nmessage .= "--".$uid."\r\n";
    $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $nmessage .= $content."\r\n\r\n";
    $nmessage .= "--".$uid."--";
    
    if (mail($mailto, $subject, $nmessage, $header)) {
        return true;
    } else {
        return false;
    }

?>