<?php
    class User{
        var $username;
        var $password;
        var $fullname;

        function __construct($username,$password,$fullname) {
            $this->username = $username;
            $this->password = $password;
            $this->fullname = $fullname;
        }
        /**
         * xac thuc taii khoan nguoi dung
         * @* @param $userName String ten dang nhap
         * * @param $password String mat khau
         * @return User hoac null neu khong ton tai
         */
        static function authentication($userName,$password){
            if($userName == "vantuan197" && $password == "123")
                return new User($userName,$password,"phamvantuan");
            return null;
        }
    }
?>