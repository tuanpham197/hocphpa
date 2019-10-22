<?php include_once('header.php') ?>
<?php include_once('nav.php') ?>
<?php include_once('dropdown.php') ?>

<?php 
    #Code bai 6
    echo "baii so 6";
?>
<div class="container">
    <div class="row">
        <button class="btn btn-primary" onclick="testAjax()">Test Javascript</button>
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
                <tbody align="center" id="dataBook">
                   
                </tbody>
            </table>
        </div>
</div>
<script>
    function testAjax(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var data = JSON.parse(this.responseText);
                console.log(data);
                var str = "";
                for(var i=0;i<data.length;i++){
                    str += "<tr>"
                    str +=    "<td>"+data[i].id+"</td>";
                    str +=    "<td>"+data[i].title+"</td>";
                    str +=    "<td>"+data[i].price+"</td>";
                    str +=    "<td>"+data[i].author+"</td>";
                    str +=    "<td>"+data[i].year+"</td>";
                    str +=    "<td>";
                    str +=        '<a href="" class="btn btn-outline-success" ><i class="fas fa-edit"></i>Sửa</a> ';
                    str +=    '</td>';
                    str +=    '<td>';
                    str +=        '<a href="" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>Xóa</a> ';
                    str +=    '</td>';
                    str +=    '</tr>';
                }
                // var str = "<ul>";
                // str += "<li>";
                // str += "Username: "+data.username;
                // str += "</li>";
                // str += "<li>";
                // str += "Password: "+data.password;
                // str += "</li>";
                // str += "<li>";
                // str += "FullName: "+data.fullname;
                // str += "</li>";
                // str += "</ul>";
                document.getElementById('dataBook').innerHTML = str;
            }
        }
        xhttp.open('GET','test2.php');
        xhttp.send();
    }
</script>
<?php include_once('footer.php') ?>


