<?php
    require_once "config.php";

    function get_student($malop){
        global $con;
        connect_db();
        $query = "SELECT * FROM sinh_vien
        INNER JOIN lop ON sinh_vien.id_lop = lop.id_lop
        INNER JOIN khoa ON khoa.id_khoa = lop.id_khoa
        WHERE lop.id_lop =".$malop;

        $res = mysqli_query($con, $query);
        $list_student = [];

        if($res){
            while($row = mysqli_fetch_assoc($res)){
                array_push($list_student, $row);
            }
        }
        return $list_student;
    }

    function get_score($idsv){
        global $con;
        connect_db();

        $query = "SELECT * FROM sinh_vien 
        INNER JOIN diem ON sinh_vien.id_sv = diem.id_sinh_vien
        INNER JOIN mon_hoc ON mon_hoc.id_mon = diem.id_mon_hoc
        INNER JOIN giang_vien ON mon_hoc.id_giang_vien = giang_vien.id_gv
        WHERE sinh_vien.id_sv =".$idsv;

        //echo $query;
        
        $res = mysqli_query($con, $query);
        $list = [];

        if($res){
            while($row = mysqli_fetch_assoc($res)){
                array_push($list, $row);
            }
        }
        return $list;
        
    }

    if(isset($_POST['lophoc'])){

        $lophocHtml = "";
        $lophocHtml .= '<option value="0">Tất cả</option>';
        $danhsachlop = get_all_class();

        foreach($danhsachlop as $lop){
            $lophocHtml .= '<option value="' .$lop['id_lop']. '">' .$lop['ten_lop']. '</option>';
        }
        echo $lophocHtml;
    }

    if(isset($_POST['sinhvien'])){
        $malop = $_POST['sinhvien'];
        $sv = "";
        if($malop == "none"){
            $dssv = get_all_student();
        }else{
            $dssv = get_student($malop);
        }
        

        foreach($dssv as $sinhvien){
            $sv .= '<option value="' .$sinhvien['id_sv']. '">' .$sinhvien['ma_sv']." - ".$sinhvien['ten']. '</option>';
        }
        echo $sv;
    }

    if(isset($_POST['idsv'])){

        $scoreHtml = "";
        $list = get_score($_POST['idsv']);
        $item = 1;

        if(count($list) == 0){
            echo "Không tìm thấy dữ liệu";
        }else{
            foreach($list as $score){
                $scoreHtml .= '
                <tr>
                <td>' .$item++. '</td>
                <td>' .$score['ten_mon']. '</td>
                <td>' .$score['ten_giang_vien']. '</td>
                <td class="diemchuyencan" contenteditable data-id_score='.$score['id_diem'].'>' .$score['diem_chuyen_can']. '</td>
                <td class="diemgiuaky" contenteditable data-id_score='.$score['id_diem'].'>'.$score['diem_giua_ky']. '</td>
                <td class="diemcuoiky" contenteditable data-id_score='.$score['id_diem'].'>'.$score['diem_cuoi_ky']. '</td>
                </tr>';
            }
            echo $scoreHtml;
        }
    }

    if(isset($_POST['idEdit'])){
        global $con;
        connect_db();

        $id = $_POST['idEdit'];
        $score = $_POST['score'];
        $colname = $_POST['colname'];

        $sql = "UPDATE diem SET $colname=$score WHERE id_diem=$id";
        mysqli_query($con, $sql);
    }
?>