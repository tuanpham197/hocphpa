
<?php include_once('header.php') ?>
<?php include_once('nav.php') ?>
<?php include_once('dropdown.php') ?>
    <div class="b2">
        <form >
            <label>Số thứ nhất :</label>
            <input type="text" placeholder="Số thứ nhất" name="num1" value="<?php $_GET['num1']??"" ?>"><br>
            <label>Số thứ nhất :</label>
            <input type="text" placeholder="Số thứ hai" name="num2" value="<?php  $_GET['num2']??"" ?>"><br>
            <label>Vui lòng chọn phép tính</label>
            <select name="operator" id="">
                <option value="add" <?php if(isset($_GET['operator'])) echo $_GET['operator'] == "add" ? "selected" : ""  ?>>Cộng</option>
                <option value="subtract" <?php if(isset($_GET['operator'])) echo $_GET['operator'] == "subtract" ? "selected" : ""  ?>>Trừ</option>
                <option value="multiply" <?php if(isset($_GET['operator'])) echo $_GET['operator'] == "multiply" ? "selected" : ""  ?>>Nhân</option>
                <option value="devide" <?php if(isset($_GET['operator'])) echo $_GET['operator'] == "devide" ? "selected" : ""  ?>>Chia</option>
            </select>
            <button name="btn" value="1" type="submit">Tinh</button>
        </form>
    <?php
        if(isset($_GET['btn'])){
            $num1     = $_GET['num1'];
            $num2     = $_GET['num2'];
            $operator = $_GET['operator'];
            
            switch ($operator) {
                case 'add':
                    $result = $num1+$num2;
                    $sign = "+";
                    break;
                case 'subtract':
                    $result = $num1-$num2;
                    $sign = "-";
                    break;
                case 'multiply':
                    $result = $num1*$num2;
                    $sign = "*";
                    break;
                case 'devide':
                    if($num2==0){
                        $result = "Nhập lại số thứ 2";
                    }else{
                        $result = $num1/$num2;
                    }
                    $sign = "/";
                    break;
                default:
                    break;
            }
            echo "Kết quả $num1 $sign $num2 là $result";
        }
    ?>
    </div>
<?php include_once('footer.php') ?>