<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "BookManager";
    $conn = new mysqli($host,$username,$password,$dbname);
    $conn->set_charset("utf8");
    if($conn->connect_error)
        die("Kết nối thất bại. /".$conn->connect_error);
?>