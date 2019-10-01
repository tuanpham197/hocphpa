<?php include_once('header.php') ?>
    
<?php include_once('nav.php') ?>

    <?php include_once('dropdown.php') ?>
    <?php
        // $a = "Hello world";
        // var_dump($a);
        // $a = 2;
        // echo "</br>";
        // $b=5;
        // $c = $a+$b;
        // echo "Ket qua cua $a+$b la $c";
        // echo "<hr>";
        define('PI',3.14);
        /**
         * ĐÂY LÀ HÀM TÍNH DIỆN TÍCH HÌNH TRÒN
         * @param $r bán kính hình tròn
         * @return Diện tích hình tròn có bán kính là $r*$r*PI
         */
        function squareCircle($radius){
            return round(pi()*pow($radius,2),2);
        }
        function sum($n)
        {
            $s=0;
            for ($i=0; $i <= $n; $i++) { 
                $s += $i;
            }
            return $s;
        }
       
        function displayToDay()
        {
            $dayOfWeek = ["Sunday","Monday","TuesDay","WendesDay","ThurDay","Friday","SaturDay"];
            $day = date("w");
            //var_dump($day)
            //echo $day;
            return $dayOfWeek[$day];
        }
        $r =5;
        $s = squareCircle($r);
        echo "<h3>Dien  tich hinh tron ban kinh $r la $s</h3> <br>";
        $n=5;
        $tong = sum($n);
        echo "<h3>Tong của $n đầu tiền là $tong </h3><br>";
        echo displayToDay();
        //echo "Hôm nay là ".displayToDay();
    ?>

    
    
    <?php include_once('footer.php') ?>