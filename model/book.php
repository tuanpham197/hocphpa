<?php
class Book{
    #--> Properties
    var $id;
    var $price;
    var $title;
    var $author;
    var $year;
    #end properties
    #Contruct function
    function __construct($id,$price,$title,$author,$year) {
        $this->id = $id;
        $this->price = $price;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    #Member function
    function display(){
        echo "Price: ". $this->price. " - Title : ".$this->title."</br>";
        echo "Author: ".$this->author." - Year: ".$this->year;
    }

    #Mock data
    /**
     * lấy toàn bộ các cuốn sách có trong csdl
     */
    static function getList(){
        $listbook = array();
        array_push($listbook,new Book(1,55,"PHP ","tuan",2019));
        array_push($listbook,new Book(2,4,"Ruby ","tuan2",2019));
        array_push($listbook,new Book(3,41,"Java ","tuan2",2019));
        array_push($listbook,new Book(4,55,"C# ","tuane",2019));

        return $listbook;
    }
    /**
     * get data to file
     * 
     */
    static function getListFromFile(){
        $arrData = file("./data/book.txt");
        $listbook = array();
        foreach ($arrData as $key => $value) {
            $arrItem = explode("#",$value);
            $book = new Book($arrItem[0],$arrItem[2],$arrItem[1],$arrItem[3],$arrItem[4]);
            array_push($listbook,$book);
        }  
        return $listbook;
    }
    static function addToFile($value){
        $myfile = fopen("./data/book.txt", "a") or die("Unable to open file!");
        fwrite($myfile, $value."\n");
        fclose($myfile);
    }
    static function deleteItem($arr,$id){
        $myfile = fopen("./data/book.txt", "w") or die("Unable to open file!");
        $item = array_search($id, array_column($arr, 'id'));
        unset($arr[$item]);
        foreach ($arr as $key => $value) {
            $str = $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;
            fwrite($myfile, $str);
        }
        fclose($myfile);
    }
    static function editItem($newItem,$arr){
        $myfile = fopen("./data/book.txt", "w") or die("Unable to open file!");
        foreach ($arr as $key => $value) {
            if($value->id === $newItem->id){
                $value->title = $newItem->title;
                $value->price = $newItem->price;
                $value->author = $newItem->author;
                $value->year = $newItem->year;    
            }
            $str = $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;
            fwrite($myfile, $str);
        }
        fclose($myfile);
    }
}

?>