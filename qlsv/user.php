<?php
    require_once "config.php";

    if($_POST['id']){
        $id = $_POST['id'];
        $student = get_a_student($id);
        echo json_encode($student);
    }
?>