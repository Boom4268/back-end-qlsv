<?php 
    session_start();
    unset($_SESSION["id_user"]);
    unset($_SESSION["quyen"]);
    header("Location:login.php");
?>