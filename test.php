<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
    include_once("header.php");
    include_once("model/user.php");
    include_once('nav.php') ;
    include_once('dropdown.php') ;
?>
<?php 
    $user = unserialize($_SESSION["user"]);
    echo "Xin chao ". $user->fullname;
?>
<?php
    include_once("footer.php")
?>
