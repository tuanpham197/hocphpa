<?php 
    include_once('model/book.php');



$listbook = array();
array_push($listbook,new Book(1,55,"PHP ","tuan",2019));
array_push($listbook,new Book(2,4,"Ruby ","tuan2",2019));
array_push($listbook,new Book(3,41,"Java ","tuan2",2019));
array_push($listbook,new Book(4,55,"C# ","tuane",2019));
$json = json_encode($listbook);
echo $json;
?>