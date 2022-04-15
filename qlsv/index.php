<?php 
    session_start(); 
    if(!isset($_SESSION['id_user'])){
        header("location: ./login.php");
    }else{
        if($_SESSION["quyen"] == "admin"){
            header("location: ./admin-home.php?page=dssv");
        }else{
            header("location: ./user-home.php?page=ttsv");
        }
    }
?>




