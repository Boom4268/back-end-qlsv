<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan li sinh vien</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/main.js"></script>
</head>
<body>
    <?php include_once "./include/header.php"?>  
    <div class="container-fluid">
        <?php 
                if(isset($_GET['page'])){
                    switch($_GET['page']){
                        case "dssv": 
                            include_once "danhsachsv.php";
                        break;
                        case "qldiem": 
                            include_once "ql-diem.php";
                        break;
                        case "tkdt": 
                            include_once "tk-diem.php";
                        break;
                        case "logout": 
                            include_once "logout.php";
                        break;
                    }
                }
            ?>
    </div>
</body>

</html>