<?php include_once('header.php') ?>
<?php include_once('nav.php') ?>
<?php include_once('dropdown.php') ?>
<?php 
    include_once("model/book.php");
    $ls = Book::getList();
    $lsFromFile = Book::getListFromFile();
    
    if(!empty($_REQUEST['search'])){
        //echo $_REQUEST['search'];
        $result = array();
        foreach ($lsFromFile as $key => $value) {
            if(strcasecmp(trim($value->year),$_REQUEST['search'])==0 ||strpos(trim($value->title),$_REQUEST['search'])!=0||strcasecmp(trim($value->author),$_REQUEST['search'])==0){
                array_push($result,$value);
            }
        }
    }

?>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="topnav">
                    <a class="active" href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#contact">Contact</a>
                    <div class="search-container">
                        <form action="displayBook.php" method="get">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2" style="margin-top:40px">
                <a href="add.php" class="btn btn-primary"data-toggle="modal" data-target="#myModal"><i class="fa fa-add"></i>Thêm</a>
            </div>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" ></h4>
                    </div>
                    <div class="modal-body">
                        <p>Thêm mới</p>
                        <form action="add.php" method="post">
                            <div class="form-group">
                                <label for="usr">Title:</label>
                                <input type="text" class="form-control" id="usr" name="title">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Price:</label>
                                <input type="number" class="form-control" id="pwd" name="price">
                            </div>
                            <div class="form-group">
                                <label for="pwd">author:</label>
                                <input type="text" class="form-control" id="pwd" name="price">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Year:</label>
                                <input type="date" class="form-control" id="pwd" name="price">
                            </div>
                            <button class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead align="center">
                    <tr style="background: #333;color:#fff">
                        <th>STT</th>
                        <th>Tên sách</th>
                        <th>Gía</th>
                        <th>Tác giả</th>
                        <th>Năm xuất bản</th>
                        <th colspan="2" style="text-align:center">Thao tác</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php 
                        if(isset($result)){
                            $arr = $result;
                        }
                        else{
                            $arr = $lsFromFile;
                        }
                        foreach ($arr as $key => $value) {         
                    ?>
                    <tr>
                        <td><?php echo $key ?></td>
                        <td><?php echo $value->title ?></td>
                        <td><?php echo $value->price ?></td>
                        <td><?php echo $value->author ?></td>
                        <td><?php echo $value->year ?></td>
                        <td>
                            <a href="" class="btn btn-outline-success"><i class="fas fa-edit"></i>Sửa</a> 
                        </td>
                        <td>
                            <a href="displayBook.php?id=<?php echo $key ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>Xóa</a> 
                        </td>
                    </tr>
                    <?php  }?>
                </tbody>
            </table>
        </div>
    </div>
<?php include_once('footer.php') ?>


