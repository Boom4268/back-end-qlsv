
<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
<head>
	<title>User</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php include_once "./include/header-user.php"?>  
    <div class="container-fluid">
        <?php 
                if(isset($_GET['page'])){
                    switch($_GET['page']){
                        case "ttsv": 
                            include_once "thongtinsv.php";
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

