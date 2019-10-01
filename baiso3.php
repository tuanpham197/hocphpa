<?php include_once('header.php') ?>
<?php include_once('nav.php') ?>
<?php include_once('dropdown.php') ?>
    <div class="b3">
        <?php 
            $maSinhVien = $ho = $ten = $ngaysinh = $email = "";
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $maSinhVien = $_REQUEST['txtmasv'];
                $ho = $_REQUEST['ho'];
                $ten = $_REQUEST['ten'];
                $ngaysinh = $_REQUEST['ngaysinh'];
                $email = $_REQUEST['email'];

                $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                    echo "Bạn đã nhập đúng định dạng email";
                }
                else{
                    echo "định dạng email không đúng";
                }
                if($_FILES['avatar']['name'] != "")
                    move_uploaded_file($_FILES['avatar']['tmp_name'],"upload/".$_FILES['avatar']['name']);
                
            }
            // echo "<pre>";
            // var_dump($_FILES);
            // echo "</pre>"
        ?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Mã sinh viên:</label>
                <input required type="text" class="form-control" name="txtmasv" id="ma" value="<?php echo $maSinhVien ?>">
            </div>
            <div class="form-group">
                <label for="ho">Họ:</label>
                <input required type="text" class="form-control" name="ho" id="ho" value="<?php echo $ho ?>">
            </div>
            <div class="form-group">
                <label for="ten">Tên:</label>
                <input required type="text" class="form-control" name="ten" id="ten" value="<?php echo $ten ?>">
            </div>
            <div class="form-group">
                <label for="date">Ngày sinh:</label>
                <input type="date" class="form-control" name="ngaysinh" id="ngaysinh" value="<?php echo $ngaysinh ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input required type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label for="avatar">Ảnh đại diện:</label>
                <input type="file" class="form-control" name="avatar" id="avatar">
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
<?php include_once('footer.php') ?>