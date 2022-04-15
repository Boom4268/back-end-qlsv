<?php 
    require_once "config.php";
    function get_all_subject(){
        global $con;
        connect_db();
        $query = "SELECT * FROM mon_hoc";

        $res = mysqli_query($con, $query);
        $list = [];

        if($res){
            while($row = mysqli_fetch_assoc($res)){
                array_push($list, $row);
            }
        }
        return $list;
    }

    function thongke($idMon, $col, $x, $y){
        global $con;
        connect_db();
        $query = "SELECT COUNT(*) as num FROM diem WHERE $col >= $x AND $col <=$y AND id_mon_hoc=$idMon";
        $res = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($res);
        return $row['num'];
    }

    function get_data_chart($idMon, $col){
        $yeu = thongke($idMon, $col, 1, 3);
        $trungbinh = thongke($idMon, $col, 4, 6);
        $kha = thongke($idMon, $col, 7, 8);
        $gioi = thongke($idMon, $col, 9, 10);

        $res = array("yeu"=>$yeu, "trungbinh"=>$trungbinh, "kha"=>$kha, "gioi"=>$gioi);
        return $res;
    }

    if(isset($_POST['monhoc'])){

        $monhocHtml = "";
        $monhocHtml .= '<option value="0">---None---</option>';

        $danhsachmon = get_all_subject();
        
        foreach($danhsachmon as $mon){
            $monhocHtml .= '<option value="' .$mon['id_mon']. '">' .$mon['ten_mon']. '</option>';
        }
        echo $monhocHtml;
    }

    if(isset($_POST['chart'])){
        $idMon = $_POST['idMon'];
        $ccData = get_data_chart($idMon, "diem_chuyen_can");
        $gkData = get_data_chart($idMon, "diem_giua_ky");
        $ckData = get_data_chart($idMon, "diem_cuoi_ky");

        $res = array("cc"=>$ccData, "gk"=>$gkData, "ck"=>$ckData);

        echo json_encode($res);
    }
?>