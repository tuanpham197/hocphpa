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
        <div id="content">

        </div>
    </div>
</div>
<script>
    function testAjax(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var data = JSON.parse(this.responseText);
                
                var str = "<ul>";
                str += "<li>";
                str += "Username: "+data.username;
                str += "</li>";
                str += "<li>";
                str += "Password: "+data.password;
                str += "</li>";
                str += "<li>";
                str += "FullName: "+data.fullname;
                str += "</li>";
                str += "</ul>";
                document.getElementById('content').innerHTML = str;
            }
        }
        xhttp.open('GET','testajax.php?username=abc');
        xhttp.send();
    }
</script>
<?php include_once('footer.php') ?>


