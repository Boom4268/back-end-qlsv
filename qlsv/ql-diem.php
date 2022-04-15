
<div class="col-12 mt-3">
    <div class="row">
        <div class="col-5">
            <div class="container-card">
                <div class="form-group">
                    <label for="">Chọn mã lớp</label>
                    <select class="form-control" id="lop">
                    </select>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="container-card">
                <div class="form-group">
                    <label for="">Chọn sinh viên</label>
                    <select class="form-control" id="sinhvien">
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-3 mb-3">
    <button id="btn-select" class="btn btn-primary">Chọn</button>
</div>
<div class="col-12 mb-3">
    <table class='table table-bordered w-100'>
        <thead class='thead-dark'>
            <tr>
                <th>STT</th>
                <th>Tên môn</th>
                <th>Giảng viên</th>
                <th>Điểm chuyên cần </th>
                <th>Điểm giữa kỳ</th>
                <th>Điểm cuối kỳ</th>
            </tr>
        </thead>
        <tbody id='btl-body'>

        </tbody>
    </table>
</div>
<script>
    function load_lop(){
        $.ajax({
            url : "diem.php",
            type: "post",
            data: {lophoc:"lophoc"},
            success: function(data){
                $("#lop").html(data);
            }
        });
    }
    function load_sv(malop){
        $.ajax({
            url : "diem.php",
            type: "post",
            data: {sinhvien:malop},
            success: function(data){
                $("#sinhvien").html(data);
            }
        });
    }
    load_lop();
    load_sv("none");

    function edit_score(id, text, col){
        $.ajax({
            url : "diem.php",
            type: "post",
            data: {idEdit:id, score:text, colname:col},
            success: function(data){
                alert("Cập nhật thành công")
            }
        });
    }

    $("#lop").change(function(){
        var idLop = $("#lop option:selected").val();
        if(idLop == 0){
            load_sv("none");
        }else{
            load_sv(idLop);
        }
    });

    $("#btn-select").click(function(){
        var idsv = $("#sinhvien option:selected").val();
        $.ajax({
            url : "diem.php",
            type: "post",
            data: {idsv: idsv},
            success: function(data){
                $("#btl-body").html(data);
            }
        });
    });

    $(document).on("blur", ".diemchuyencan", function(){
        var id = $(this).data("id_score");
        var score = parseFloat($(this).text(), 10);
      
        if(isNaN(score)){
            alert("Nhập sai dữ liệu");
            $(this).text("");
        }else{
            if(score < 0 || score > 10){
                alert("Điểm phải thuộc [0, 10]");
                $(this).text("");
            }else{
                edit_score(id, score, "diem_chuyen_can");
            }
        }
    });

    $(document).on("blur", ".diemgiuaky", function(){
        var id = $(this).data("id_score");
        var score = parseFloat($(this).text(), 10);
        if(isNaN(score)){
            alert("Nhập sai dữ liệu");
            $(this).text("");
        }else{
            if(score < 0 || score > 10){
                alert("Điểm phải thuộc [0, 10]");
                $(this).text("");
            }else{
                edit_score(id, score, "diem_giua_ky");
            }
        }
    });

    $(document).on("blur", ".diemcuoiky", function(){
        var id = $(this).data("id_score");
        var score = parseFloat($(this).text(), 10);
        if(isNaN(score)){
            alert("Nhập sai dữ liệu");
            $(this).text("");
        }else{
            if(score < 0 || score > 10){
                alert("Điểm phải thuộc [0, 10]");
                $(this).text("");
            }else{
                edit_score(id, score, "diem_cuoi_ky");
            }
        }
    });


</script>