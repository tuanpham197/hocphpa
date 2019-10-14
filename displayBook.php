<?php include_once('header.php') ?>
<?php include_once('nav.php') ?>
<?php include_once('dropdown.php') ?>
<?php 
    include_once("model/book.php");
    $size =3;
    $len = count(Book::getListFromFile());
    

    if(isset($_REQUEST['submit'])){
        $id = count(Book::getListFromFile());
        $title = $_REQUEST['title'];
        $price = $_REQUEST['price'];
        $author = $_REQUEST['author'];
        $year = $_REQUEST['year'];

        $val = $id."#".$title."#".$price."#".$author."#".$year;
        Book::addToFile($val);
    }
    if(isset($_REQUEST['action'])){
        if(strcmp($_REQUEST['action'],"xoa")==0){
            Book::deleteItem(Book::getListFromFile(),$_REQUEST['id']);
        }
    } 
    
    if(isset($_REQUEST['edit'])){
        $id    = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $price = $_REQUEST['price'];
        $author= $_REQUEST['author'];
        $year  = $_REQUEST['year'];
        $book = new Book($id,$price,$title,$author,$year);
        Book::editItem($book,Book::getListFromFile());
    }
    $lsFromFile = Book::getListFromFile();
    if(!empty($_REQUEST['search'])){
        $result = array();
        $search = $_REQUEST['search'];
        foreach ($lsFromFile as $key => $value) {
            if(strlen(strstr($value->year, $search)) || strlen(strstr(strtolower($value->title), strtolower($search))) ||
            strlen(strstr(strtolower($value->author), strtolower($search)))){
                array_push($result,$value);
            }
        }
    }

    $page = 1;
    if(isset($_REQUEST['page'])){
        $page = $_REQUEST['page'];
    }
    
    $from = $size*($page-1);// 0 ,3, 6
    $to = ($size*$page) -1 ; // 2,5,8
    $arrPagi = array();
    for($i=$from;$i<=$to;$i++){
        if($i > count($lsFromFile)-1)
            break;
        array_push($arrPagi,$lsFromFile[$i]);
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
                <a href="add.php" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-add"></i>Thêm</a>
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
                        <form action="displayBook.php" method="get">
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
                                <input type="text" class="form-control" id="pwd" name="author">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Year:</label>
                                <?php 
                                    $date =  date("Y");
                                    $pre = $date - 10;
                                ?>
                                <select multiple class="form-control" name="year" id="year">
                                    <?php for($i = $date;$i>=$pre;$i--){ ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit" name="submit">Thêm</button>
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
                            $arr = $arrPagi;
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
                            <a href="" onclick="func(this)" class="btn btn-outline-success" data-toggle="modal" data-target="#myModalEdit" id="edit" eid="<?php echo $value->id ?>" etitle="<?php echo $value->title ?>" eauthor="<?php echo $value->author ?>" eyear="<?php echo $value->year ?>" eprice="<?php echo $value->price ?>"><i class="fas fa-edit"></i>Sửa</a> 
                        </td>
                        <td>
                            <a href="displayBook.php?action=xoa&&id=<?php echo $value->id ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>Xóa</a> 
                        </td>
                    </tr>
                    <?php  }?>
                    <div id="myModalEdit" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" ></h4>
                            </div>
                            <div class="modal-body">
                                <p>Edit</p>
                                <form action="displayBook.php" method="get">
                                    <div class="form-group">
                                        <label for="usr">Title:</label>
                                        <input type="text" class="form-control"  id="id" name="id">
                                    </div>
                                    <div class="form-group">
                                        <label for="usr">Title:</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Price:</label>
                                        <input type="number" class="form-control" id="price" name="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">author:</label>
                                        <input type="text" class="form-control" id="author" name="author">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">year:</label>
                                        <input type="text" class="form-control" id="yeare" name="yeare">
                                    </div>
                                    <button class="btn btn-primary" type="submit" name="edit">Sửa</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>

                        </div>
                    </div>
                </tbody>
            </table>
        </div>
        <div class="row">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php 
                    $numPage = $len/$size;
                    for($i=1;$i<=ceil($numPage);$i++){
                ?>

                <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php
                    }
                ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
    </div>
<?php include_once('footer.php') ?>


