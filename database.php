<?php
$conn = mysqli_connect('localhost', 'pruthvish', 'project', 'online_examv5');
if(mysqli_connect_errno()){
        echo 'Failed to connect to MySQL '. mysqli_connect_errno();
    }
date_default_timezone_set('Asia/Kolkata');
?>
