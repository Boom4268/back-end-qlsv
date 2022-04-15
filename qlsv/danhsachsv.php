
<div class="col-9 position-relative">
    <div class="col-12 mt-3 mb-3">
        <form action="" class="form-inline">
            <div class="input-group">
                <input id="input-search" type="text" class="form-control" size="50" placeholder="Nhập tên tìm kiếm">
                <div class="input-group-btn">
                    <button id="btn-search" type="button" class = "btn btn-danger">Tìm kiếm</button>
                </div>
            </div>
            <button type="button" id="them" class="btn btn-success ml-3">Thêm sinh viên</button>
        </form>
    </div>
    <div class="col-12">
        <table class='table table-bordered w-100'>
        <thead class='thead-dark'>
            <tr>
                <th>STT</th>
                <th>Mã SV</th>
                <th>Tên </th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Lớp học</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thead>
        <tbody id='btl-body'>

        </tbody>
        </table>
    </div>
</div>


<div id="form-id" class="form-student-container display">
<div id="themsv" class="form-student">
    <form id="form" method="POST">
        <div class="form-group">
            <label for="">Mã sinh viên: </label>
            <input type="text" id="masv" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Họ tên sinh viên: </label>
            <input type="text" id="ten" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Ngày sinh: </label>
            <input id="ngaysinh" type="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input type="text" id="diachi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Chọn mã lớp</label>
            <select class="form-control" id="lop">
            </select>
        </div>
    </form> 
    <button id="btn-them" class="btn btn-success display">Thêm</button>
    <button id="btn-sua" class="btn btn-warning display">Cập nhật</button>
    <button id="btn-dong" class="btn btn-danger mr-10">Đóng</button>
</div>
</div>

<script>
    //lấy dữ liệu sinh viên
    function load_data(option){
        $.ajax({
            url : "dssv.php",
            type: "post",
            data: {load:"data", option:option},
            success: function(data){
                $("#btl-body").html(data);
                $('#form')[0].reset();
            }
        });
    }
    load_data("all");

    // lấy dữ liệu lớp học
    function load_lop(tenlop){
        $.ajax({
            url : "dssv.php",
            type: "post",
            data: {lophoc:"lophoc", tenlop:tenlop},
            success: function(data){
                $("#lop").html(data);
            }
        });
    }

    // lấy thông tin để sửa và hiện log sửa
    function sua(id){
        $("#form-id").removeClass("display");
        $("#btn-sua").removeClass("display");
        $("#btn-sua").attr("data-id", id);
        $.ajax({
            url : "dssv.php",
            type: "post",
            data: {sua:"sua", id:id},
            success: function(data){
                var student = JSON.parse(data);
                $("#masv").val(student.ma_sv);
                $("#ten").val(student.ten);
                $("#ngaysinh").val(student.ngay_sinh);
                $("#diachi").val(student.dia_chi);
                load_lop(student.ten_lop);
            }
        });
    }
    //  xóa sinh viên
    function xoa(id){
        confirm("Bạn có chắc chắn muốn xóa ?");
        $.ajax({
            url : "dssv.php",
            type: "post",
            data: {xoa:"xoa", idxoa:id},
            success: function(){
                alert("Xoa thành công");
                load_data("all");
            }
        });
    }

    $('#them').click(function(){
        $("#form-id").removeClass("display");
        $("#btn-them").removeClass("display");
        load_lop("CN01");
    });

    $("#btn-dong").click(function(){
        $("#form-id").addClass("display");
        $("#btn-sua").addClass("display");
        $("#btn-them").addClass("display");
        $('#form')[0].reset();
    });

    // thêm sinh viên
    $('#btn-them').click(function(){
        var ma = $("#masv").val();
        var ten = $("#ten").val();
        var ngaysinh = $("#ngaysinh").val();
        var diachi = $("#diachi").val();
        var idLop = $("#lop option:selected").val();
        if(ma=="" || ten =="" || ngaysinh =="" || diachi==""){
            alert("Ko duoc de trong thong tin");
        }else{
            $.ajax({
            url : "dssv.php",
            type: "post",
            data: {them:"them", ma:ma, ten:ten, ngaysinh:ngaysinh, diachi:diachi, idLop:idLop},
            success: function(data){
                alert("Thêm thành công");
                load_data("all");
                $("#form-id").addClass("display");
                $("#btn-them").addClass("display");
            }
        });
        }
    });

    //Thực hiện cập nhật thông tin
    $('#btn-sua').click(function(){
        var idsv = $(this).data('id');
        var ma = $("#masv").val();
        var ten = $("#ten").val();
        var ngaysinh = $("#ngaysinh").val();
        var diachi = $("#diachi").val();
        var idLop = $("#lop option:selected").val();
        if(ma=="" || ten =="" || ngaysinh =="" || diachi==""){
            alert("Ko duoc de trong thong tin");
        }else{
            $.ajax({
            url : "dssv.php",
            type: "post",
            data: {idsua:idsv, ma:ma, ten:ten, ngaysinh:ngaysinh, diachi:diachi, idLop:idLop},
            success: function(data){
                alert("Cập nhật thành công");
                load_data("all");
                $("#form-id").addClass("display");
                $("#btn-sua").addClass("display");
            }
        });
        }
    });

    $("#btn-search").click(function(){
        var name = $("#input-search").val();
        if(name =="") alert("Nhập tên tìm kiếm");
        else{
            load_data(name);
        }
    });
    
</script>
    