<?php include_once('header.php') ?>
<?php include_once('nav.php') ?>
<?php include_once('dropdown.php') ?>

<?php 
    #Code bai 4
    include_once("model/book.php");
    $book = new Book(50,"PHP OOP","tuanz",2019);
    $book->display();
    $ls = $book->getList();
    var_dump($ls);
?>

<?php include_once('footer.php') ?>


