<?php
    session_start();
    require_once "config.php";
    $ketqua = "";
    if(isset($_POST['login'])){
        $res = login($_POST['username'], $_POST['pass']);
        if(!$res){
            $ketqua = "Sai mật khẩu hoặc tên đăng nhập";
        }else {
            $_SESSION["id_user"] = $res["id_user"];
            $_SESSION["quyen"] = $res["quyen"];
            if($res["quyen"] == "user"){
                $_SESSION["idsv"] = $res['id_user'];
            }
            header("location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="./js/main.js"></script>
</head>
<body>
<div class="container">
   <div class="login-block">
       <div class="login-form">
       <h3 class="heading-form">ĐĂNG NHẬP HỆ THỐNG</h3>
        <form action="" method="post">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                    <input type="text" placeholder="Tên đăng nhập" name="username" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                    <input type="password" placeholder="Mật khẩu" name="pass" class="form-control">
                    </div>
                </div>
                </div>
                <div class="col-12">
                    <?php echo $ketqua ?>
                </div>
                <button class="btn btn-primary" type="submit" name="login">Đăng nhập</button>
            </div>
        </form>
       </div>
   </div>
</div>
</body>