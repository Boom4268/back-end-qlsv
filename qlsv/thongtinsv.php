<?php
    
?>
<div class="row mt-4">
    <div class="col-4">
        <div class="card">
            <div class="d-flex justify-content-center">
                <img class="card-img-top w-50 d-block" src="image/man.png" alt="Card image">  
            </div>
            <div class="card-body d-flex justify-content-center flex-column align-items-center">
                <div>
                    <h4 class="card-title">Thông tin cá nhân</h4>
                </div>
               
                <div>
                    <p id="masv" class="card-text"></p>
                    <p id="ten" class="card-text"></p>
                    <p id="lop" class="card-text"></p>
                    <p id="nganh" class="card-text"></p>
                    <p id="ngaysinh" class="card-text"></p>
                    <p id="diachi" class="card-text"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8">
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
</div>

<script>
		var idsv = <?php echo $_SESSION['idsv'];?>;
		$.ajax({
            url : "user.php",
            type: "post",
            data: {id:idsv},
            success: function(data){
                var student = JSON.parse(data);
				console.log(student);
                $("#masv").text("Mã: " + student.ma_sv);
                $("#ten").text("Họ tên: " + student.ten);
                $("#lop").text("Lớp: " + student.ten_lop);
                $("#nganh").text("Họ tên: " + student.ten_khoa);
                $("#ngaysinh").text("Ngày sinh: " + student.ngay_sinh);
                $("#diachi").text("Địa chỉ: " + student.dia_chi);
            }
        });

        $.ajax({
            url : "diem.php",
            type: "post",
            data: {idsv: idsv},
            success: function(data){
                $("#btl-body").html(data);
            }
        });
	</script>