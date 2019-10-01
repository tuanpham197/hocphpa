<?php
class SinhVien{
    #--> Properties
    var $id;
    var $name;
    var $to;
    var $from;
    var $class;
    var $address;
    #end properties
    #Contruct function
    function __construct($id,$name,$to,$from,$class,$address) {
        $this->id = $id;
        $this->name = $name;
        $this->to = $to;
        $this->from = $from;
        $this->class = $class;
        $this->address = $address;
    }
    #Mock data
    /**
     * lấy toàn bộ các cuốn sách có trong csdl
     * static function
     */
    static function getList(){
        $listSV =  array();
        array_push($listSV,new SinhVien('1','Tuan','2015','2016','K40A','Hue'));
        array_push($listSV,new SinhVien('2','Anh','2015','2016','K40A','DN'));
        array_push($listSV,new SinhVien('3','Xuan','2015','2016','K40B','Hue'));
        array_push($listSV,new SinhVien('4','Truong','2015','2016','K40A','Hue'));
        return $listSV;
    }
}
?>