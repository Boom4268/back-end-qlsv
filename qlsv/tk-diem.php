
<div class="row mt-3">
    <div class="col-3">
        <div class="container-card">
            <div class="form-group">
                <label for="">Chọn môn học: </label>
                    <select class="form-control" id="monhoc">
                    </select>
            </div>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-around mt-3">
    <div class="card">
        <div class="card-body text-center">
            <canvas id="diemchuyencan"></canvas>
        </div>
        <div class="card-footer text-center">
            Điểm chuyên cần
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <canvas id="diemgiuaky"></canvas>
        </div>
        <div class="card-footer text-center">
            Điểm giữa kỳ
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <canvas id="diemcuoiky"></canvas>
        </div>
        <div class="card-footer text-center">
            Điểm cuối kỳ
        </div>
    </div>
</div>
<script>
    function load_monhoc(){
        $.ajax({
            url : "thongke.php",
            type: "post",
            data: {monhoc:"monhoc"},
            success: function(data){
                $("#monhoc").html(data);
            }
        });
    }
    load_monhoc();

    // Khởi tạo các biểu đồ
    var idCC = document.getElementById("diemchuyencan").getContext('2d');
    var chart_CC = new Chart(idCC ,{
        type: "pie",
        data: {},
        options: {}
    });

    var idGK = document.getElementById("diemgiuaky").getContext('2d');
    var chart_GK = new Chart(idGK ,{
        type: "pie",
        data: {},
        options: {}
    });

    var idCK = document.getElementById("diemcuoiky").getContext('2d');
    var chart_CK = new Chart(idCK ,{
        type: "pie",
        data: {},
        options: {}
    });
    function load_chart(chart, chartData){
        chart.data = {
                labels: ['Yếu', 'TB', 'Khá', 'Giỏi'],
                datasets: [{
                    label: "Điểm cuối kỳ",
                    data: [chartData.yeu, chartData.trungbinh, chartData.kha, chartData.gioi],
                    backgroundColor:["#483D8B" ,"#4B0082", "#FF00FF" , "#800080"]
                }]
            }
        chart.update();
    }
    
    $("#monhoc").change(function(){    
        var idMon = $("#monhoc option:selected").val();
        if(idMon != 0){
            $.ajax({
            url : "thongke.php",
            type: "post",
            data: {chart:"chart", idMon:idMon},
            success: function(data){
                var res = JSON.parse(data);
                load_chart(chart_CC, res.cc);
                load_chart(chart_GK, res.gk);
                load_chart(chart_CK, res.ck);
            }
            });
        }else{
            chart_CC.destroy();
            chart_GK.destroy();
            chart_CK.destroy();
        }
    });
</script>