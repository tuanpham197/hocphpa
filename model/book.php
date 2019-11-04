<?php
    include_once("connect.php");
class Book{
    #--> Properties
    var $id;
    var $price;
    var $title;
    var $author;
    var $year;
    #end properties
    #Contruct function
    function __construct($id,$title,$price,$author,$year) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
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
    static function addToFile($title,$price,$author,$year){
        // $myfile = fopen("./data/book.txt", "a") or die("Unable to open file!");
        // fwrite($myfile, $value."\n");
        // fclose($myfile);
        $conn = Book::connect();
        $sql = "INSERT INTO book (Title, Price, Author, Year) VALUES ('".$title."','".$price."','".$author."','".$year."')";
        
        if($conn->query($sql)===true){
            echo "delete thành công";
        }else{
            echo "lOI : ".$conn->error;
        }
    }
    static function deleteItem($id){
        //$myfile = fopen("./data/book.txt", "w") or die("Unable to open file!");
        // $item = array_search($id, array_column($arr, 'id'));
        // unset($arr[$item]);
        // foreach ($arr as $key => $value) {
        //     $str = $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;
        //     fwrite($myfile, $str);
        // }
        // fclose($myfile);

        $conn = Book::connect();
        $sql = "DELETE  FROM book WHERE id =".$id;
        if($conn->query($sql)===true){
            echo "delete thành công";
        }else{
            echo "lOI : ".$conn->error;
        }
    }
    static function editItem($newItem){
        // $myfile = fopen("./data/book.txt", "w") or die("Unable to open file!");
        // foreach ($arr as $key => $value) {
        //     if($value->id === $newItem->id){
        //         $value->title = $newItem->title;
        //         $value->price = $newItem->price;
        //         $value->author = $newItem->author;
        //         $value->year = $newItem->year;    
        //     }
        //     $str = $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;
        //     fwrite($myfile, $str);
        // }
        // fclose($myfile);
        $conn = Book::connect();
        $sql = "UPDATE book SET Title='".$newItem->title."',Price='".$newItem->price."',Author='".$newItem->author."',Year='".$newItem->year."' WHERE ID=".$newItem->id;
        if($conn->query($sql)){
            echo "edit thanh cong";
        }else{
            echo "lOI : ".$conn->error;
        }
    }
    static function connect(){
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "BookManager";
        $conn = new mysqli($host,$username,$password,$dbname);
        $conn->set_charset("utf8");
        if($conn->connect_error)
            die("Kết nối thất bại. /".$conn->connect_error);
        return $conn;
    }
    static function getListFromDB(){
        //Bước 1: Tạo kết nối
        $conn = Book::connect();
        //Bước 2: Thao tác với csdl
        $sql = "SELECT * FROM book";
        $result = $conn->query($sql);
        $listbook = array();
        if($result->num_rows > 0){  
            while($row = $result->fetch_assoc()){
                $book = new Book($row["ID"],$row["Title"],$row["Price"],$row["Author"],$row["Year"]);
                array_push($listbook,$book);
            } 
        }
        //Bước 3: Đóng kết nối
        $conn->close();
        return $listbook;
    }
}

?>