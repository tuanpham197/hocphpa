<?php
    include_once('model/user.php');
    $username = $_REQUEST['username'];
    $user = new User($username,"12345","Tuấn Phạm");
    $json = json_encode($user);
    echo $json;
?>