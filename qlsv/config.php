<?php 

    global $con;

    // Ket noi CSDL
    function connect_db(){

        global $con;

        $hostname = "localhost:3308";
        $username = "root";
        $pass = "";
        $database = "student";

        if(!$con){
            $con = mysqli_connect($hostname, $username, $pass, $database);
        }
    }
    // Dong ket noi CSDL
    function disconnect_db(){
        global $con;
        if($con){
            mysqli_close($con);
        }
    }

    // login
    function login($username, $pass){
        global $con;
        connect_db();

        $query = "SELECT * FROM tai_khoan WHERE ten_dang_nhap='" .$username. "' AND mat_khau='".$pass. "'";
        $res = mysqli_query($con, $query);
        if(mysqli_num_rows($res) == 0){
            return false;
        }else {
            return mysqli_fetch_assoc($res);
        }
    
    }

    function get_total_student(){
        global $con;
        connect_db();

        $query = "SELECT COUNT(*) as total FROM sinh_vien";
        $res = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($res);
        return (int)$row['total'];
    }

    // Lay danh sach sinh vien tu CSDL
    function get_all_student(){
        global $con;
        connect_db();

        $query = "SELECT * FROM sinh_vien
        INNER JOIN lop ON sinh_vien.id_lop = lop.id_lop
        INNER JOIN khoa ON khoa.id_khoa = lop.id_khoa";

        $res = mysqli_query($con, $query);
        $list_student = [];

        if($res){
            while($row = mysqli_fetch_assoc($res)){
                array_push($list_student, $row);
            }
        }
        return $list_student;
    }

    //tìm kiếm
    function get_all_student_search($name){
        global $con;
        connect_db();

        $query = "SELECT * FROM sinh_vien
        INNER JOIN lop ON sinh_vien.id_lop = lop.id_lop
        INNER JOIN khoa ON khoa.id_khoa = lop.id_khoa
        WHERE ten LIKE '%".$name."%'";

        $res = mysqli_query($con, $query);
        $list_student = [];

        if($res){
            while($row = mysqli_fetch_assoc($res)){
                array_push($list_student, $row);
            }
        }
        return $list_student;
    }

    // Lay 1 sinh vien qua id
    function get_a_student($id_sv){
        global $con;

        connect_db();

        $sinhvien_sql = "SELECT * FROM sinh_vien 
        INNER JOIN lop ON sinh_vien.id_lop = lop.id_lop
        INNER JOIN khoa ON lop.id_khoa = khoa.id_khoa
        WHERE id_sv={$id_sv}";

        $res = mysqli_query($con, $sinhvien_sql);
        return mysqli_fetch_assoc($res);
    }


    // them sinh vien
    function add_student($ma, $ten, $ngaysinh ,$diachi, $idLop){

        global $con;

        connect_db();
        
        $sql = "INSERT INTO sinh_vien () 
        VALUES (NULL, '$ma', '$ten', '$ngaysinh', '$diachi', '$idLop')";
        $res = mysqli_query($con, $sql);

        if($res){
            return true;
        }else {
            return false;
        }
    }

    // cập nhật sinh vien
    function update_student($id_sv, $ma, $ten, $ngaysinh ,$diachi, $idLop){
        global $con;
        connect_db();

        $sua_sql = "UPDATE sinh_vien  
        SET  ma_sv='$ma', ten='$ten', ngay_sinh='$ngaysinh', dia_chi='$diachi', id_lop='$idLop'
        WHERE id_sv=$id_sv";

        mysqli_query($con, $sua_sql);
    }

    // xoa sinh vien
    function delete_student($id_sv){
        global $con;

        connect_db();

        $xoa_sql = "DELETE FROM sinh_vien WHERE sinh_vien.id_sv = $id_sv";
        mysqli_query($con, $xoa_sql);
    }

    function get_all_class(){
        global $con;
        connect_db();

        $sql = "SELECT * FROM lop";
        $res = mysqli_query($con, $sql);
        $listClass = [];
        
        if($res){
            while($row = mysqli_fetch_assoc($res)){
                array_push($listClass, $row);
            }
        }
        return $listClass;
    }

?>