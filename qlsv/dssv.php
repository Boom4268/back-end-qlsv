<?php 
    require_once "config.php";
    
    if(isset($_POST['load'])){
        $student_html = "";
        $list_student;
        if(isset($_POST['option'])){
            if($_POST['option'] == "all"){
                $list_student = get_all_student();
            }else{
                $list_student = get_all_student_search($_POST['option']);
            }
        }
        $item = 1;

        if(count($list_student) == 0){
            echo "Không tìm thấy dữ liệu";
        }else{
            foreach($list_student as $student){
                $student_html .= '
                <tr>
                <td>' .$item++. '</td>
                <td>' .$student['ma_sv']. '</td>
                <td>' .$student['ten']. '</td>
                <td>' .$student['ngay_sinh']. '</td>
                <td>' .$student['dia_chi']. '</td>
                <td>' .$student['ten_lop']. '</td>
                <td><button onclick="sua(' .$student['id_sv']. ') "class="btn btn-warning">Sửa</button></td>
                <td><button onclick="xoa('.$student['id_sv']. ')" class="btn btn-danger">Xóa</button></td>
                </tr>';
            }
            echo $student_html;
        }
    }
    if(isset($_POST['lophoc'])){

        $lophocHtml = "";
        $danhsachlop = get_all_class();

        if(isset($_POST['tenlop'])){
            $tenlop = $_POST['tenlop'];
            foreach($danhsachlop as $lop){
                if($lop['ten_lop'] == $tenlop) {
                    $lophocHtml .= '<option selected value="' .$lop['id_lop']. '">' .$lop['ten_lop']. '</option>';
                }
                else{
                    $lophocHtml .= '<option value="' .$lop['id_lop']. '">' .$lop['ten_lop']. '</option>';
                }
            }
        }
        echo $lophocHtml;
    }

    if(isset($_POST["them"])){
        if(isset($_POST['ma'])){
            $ma = $_POST['ma'];
            $ten = $_POST['ten'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $idLop = $_POST['idLop'];
            $res = add_student($ma, $ten, $ngaysinh, $diachi,$idLop);
        }
    }
    
    //lấy kết quả 1 sinh viên để sửa
    if(isset($_POST['sua'])){
        $student = get_a_student($_POST['id']);
        echo json_encode($student);
    }

    // thực hiện sửa
    if(isset($_POST['idsua'])){
        $id = $_POST['idsua'];
        $ma = $_POST['ma'];
        $ten = $_POST['ten'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $idLop = $_POST['idLop'];
        $res = update_student($id, $ma, $ten, $ngaysinh ,$diachi, $idLop);
    }

    //Thuc hien xoa sinh vien theo id
    if(isset($_POST['xoa'])){
        if(isset($_POST['idxoa'])){
            delete_student($_POST['idxoa']); 
        }
    }
?>