<?php 
    include_once('model/sinhvien.php');
    $listSV = SinhVien::getList();
?>
<?php include_once('header.php') ?>
<?php include_once('nav.php') ?>
<?php include_once('dropdown.php') ?>
<?php 
    if(!empty($_REQUEST['id'])){
        if(strcmp($_REQUEST['action'],"xoa")==0){
            unset($listSV[$_REQUEST['id']-1]);
            unset($_SESSION['list'][$_REQUEST['id']-1]);
            $_SESSION['list']=$listSV;
        }
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <button class="btn btn-primary">Thêm</button>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead align="center">
                    <tr style="background: #333;color:#fff">
                        <th>STT</th>
                        <th>Từ năm</th>
                        <th>Tên</th>
                        <th>Đến năm</th>
                        <th>Lớp</th>
                        <th>Nơi học</th>
                        <th colspan="2" style="text-align:center">Thao tác</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php
                        foreach ($listSV as $key => $value) {
                    ?>         
                        <tr>
                            <td><?php echo $value->id ?></td>
                            <td><?php echo $value->name ?></td>
                            <td><?php echo $value->to ?></td>
                            <td><?php echo $value->from ?></td>
                            <td><?php echo $value->class ?></td>
                            <td><?php echo $value->address ?></td>
                            <td>
                                <a href="baiso5.php?id=<?php echo $value->id ?>&action=sua" class="btn btn-outline-success"><i class="fas fa-edit"></i>Sửa</a> 
                            </td>
                            <td>
                                <a href="baiso5.php?id=<?php echo $value->id ?>&action=xoa" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>Xóa</a> 
                            </td>
                        </tr>
                        
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include_once('footer.php') ?>


