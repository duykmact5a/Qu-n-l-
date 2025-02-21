<?php 
    session_start();
    if(!isset($_SESSION["Admin"]))
    {
        header("location:login.php");
    }
?>

<?php
require_once ('dbhelp.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý học sinh</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="admin.php"><span>Quản Trị</span> học sinh </a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="admin.php">
                        <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                    </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box"><a href="profile.php" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">3 phút trước</small>
                                        <a href="#"><strong>John Doe</strong> bình luận<strong> ảnh của bạn</strong>.</a>
                                    <br /><small class="text-muted">1:24 pm - 7/5/2020</small></div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box"><a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">1 giờ trước</small>
                                        <a href="#">Một tin nhắn mới từ <strong> Jane Doe</strong>.</a>
                                    <br /><small class="text-muted">12:27 pm - 7/05/2020</small></div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="all-button"><a href="#">
                                    <em class="fa fa-inbox"></em> <strong> Hòm thư </strong>
                                </a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-bell"></em><span class="label label-info">5</span>
                    </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><a href="admin.php">
                                <div><em class="fa fa-envelope"></em> 1 Tin nhắn mới
                                    <span class="pull-right text-muted small"> 3 phút trước </span></div>
                            </a></li>
                            <li class="divider"></li>
                            <li><a href="admin.php">
                                <div><em class="fa fa-heart"></em> 12 lượt yêu thích mới
                                    <span class="pull-right text-muted small">4 phút trước </span></div>
                            </a></li>
                            <li class="divider"></li>
                            <li><a href="admin.php">
                                <div><em class="fa fa-user"></em> 5 lượt theo dõi mới
                                    <span class="pull-right text-muted small">4 phút trước </span></div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="3.png" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">Duy Techbyte</div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Trực tuyến</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm">
            </div>
        </form>

        <ul class="nav menu"> 
            <li class="active"><a href="admin.php"><em class="fa fa-dashboard">&nbsp;</em> Thông báo </a></li>
            <li><a href="widgets.php"><em class="fa fa-calendar">&nbsp;</em> Lịch trình </a></li>
            <li><a href="charts.php"><em class="fa fa-bar-chart">&nbsp;</em> Biểu đồ </a></li>
            <li><a href="qlsv.php"><em class="fa label-default">&nbsp;</em> Danh sách học sinh </a></li>
            <li><a href="panels.php"><em class="fa label-default">&nbsp;</em> TÀI CHÍNH CLB </a></li>
            <li><a href="diem.php"><em class="fa label-default">&nbsp;</em>Quản lý clb </a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em> Thống kê <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> Theo kì
                    </a></li>
                    <li><a class="" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> Theo quý
                    </a></li>
                    <li><a class="" href="#">
                        <span class="fa fa-arrow-right">&nbsp;</span> Theo năm
                    </a></li>
                </ul>
            </li>
            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
        </ul>
    </div><!--/.sidebar-->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="admin.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Thông báo</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><b>THÔNG BÁO</b></h1>
                <br>_____________________________________________________________________________________________________________________________________________________________
            </div>
        </div>

<h3><b>Ngày 01/07/2025:</b></h3>
<br>
<h4><b>Theo kế hoạch đã thông báo, câu lạc bộ đã mở từ 12h ngày 01/07 để học sinh đăng ký tham gia :</b></h4>
<b>1. Học sinh đã đăng ký nguyện vọng tham gia Câu lạc bộ:  </b>
<br>
    Các em học sinh vui lòng hoàn thành việc đăng ký theo thời gian quy định, kết thúc trước 24h ngày 05/07/2025. Trong thời gian này, các em cần theo dõi và đăng nhập thường xuyên để đảm bảo hoàn tất quá trình đăng ký. Ban tổ chức sẽ liên tục cập nhật, điều chỉnh danh sách và lịch sinh hoạt để tạo điều kiện thuận lợi nhất cho học sinh tham gia.
<br>
<br>
   <b>2. Học sinh chưa đăng ký nguyện vọng tham gia Câu lạc bộ:  </b> 
   <br>   Sau ngày 06/07/2025, căn cứ vào tình hình cụ thể và nhu cầu của học sinh, Ban tổ chức sẽ có thông báo chi tiết trên trang chủ của trường. Học sinh vui lòng theo dõi để cập nhật thông tin và thực hiện đăng ký nếu có nguyện vọng.
<br>
<br>
----------------------------------------------------------------------------------------------------------------------------------------------------------
<br>


<h3><b>Ngày 26/06/2025:</b></h3>
<br>
<b>Danh sách và lịch sinh hoạt các Câu lạc bộ:</b>
<br>
<b>Danh sách các Câu lạc bộ đang hoạt động, lịch sinh hoạt cụ thể và các Câu lạc bộ đang tạm dừng hoạt động.</b>
 
<br>
Chi tiết học sinh xem tại:  https://portal.ptit.edu.vn/giaovu/thong-bao-vv-dang-ky-thoi-khoa-bieu-cac-lop-hoc-phan-trong-hoc-ky-phu-nam-hoc-2019-2020/
<br>
<br>
<b>2.   Đối tượng, hình thức và thời gian đăng ký:</b>

<br>

- Đối tượng: Học sinh có nguyện vọng tham gia các Câu lạc bộ của trường.
<br>

- Hình thức: Đăng ký trực tiếp tại Văn phòng Đoàn – Đội hoặc qua hệ thống trực tuyến của trường.
<br>

- Đăng nhập hệ thống -> Chọn mục "Đăng ký Câu lạc bộ" -> Nhập "TÊN CÂU LẠC BỘ" mong muốn -> Chọn Tìm kiếm -> Chọn LỊCH SINH HOẠT phù hợp -> Chọn LƯU.
<br>

- Thời gian: Từ 12h00 ngày 01/07/2025 (thứ 4) đến 24h00 ngày 05/07/2025 (Chủ nhật).
<br>
<br>
<b>3.   Lưu ý:</b>
<br>

- Học sinh không đăng ký trong thời gian trên sẽ không được tham gia các Câu lạc bộ trong đợt này. Sau ngày 05/07/2020, căn cứ vào tình hình thực tế, Ban tổ chức sẽ có hướng dẫn bổ sung cho các học sinh có nhu cầu tham gia muộn.

<br>
- Học sinh có nhu cầu thay đổi Câu lạc bộ đã đăng ký, cần làm đơn xác nhận của giáo viên phụ trách (theo mẫu đăng ký thay đổi Câu lạc bộ) và nộp tại Văn phòng Đoàn – Đội từ ngày 01/07 đến hết ngày 10/07/2020.
<br>
- Đối với các Câu lạc bộ có yêu cầu đặc biệt hoặc xét tuyển đầu vào, học sinh cần hoàn thành các thủ tục theo quy định riêng của từng Câu lạc bộ.</b>
<br>
<br>
<h3><b>Xem Chi Tiết</b></h3>
<br>
    Bản tin cũ 
    <br> 
THÔNG BÁO: V/v Đăng ký tham gia Câu lạc bộ học kỳ II năm học 2020 (03/02/2020)
... (03/02/2020)
<br>
THÔNG BÁO:  V/V Đăng ký tham gia Câu lạc bộ Khoa học - Kỹ thuật dành cho học sinh khối 8, 9 - KHÓA 2016
... (18/06/2020)
<br>
THÔNG BÁO:    V/v Đăng ký tham gia Câu lạc bộ Tiếng Anh ĐỢT 1 NĂM 2020
... (05/06/2020)
<br>
THÔNG BÁO: V/v Kiểm tra danh sách đăng ký và điều chỉnh Câu lạc bộ kỳ II năm học 2019 - 2020 (10/12/2019)
... (09/04/2020)<br>


TTHÔNG BÁO: V/v Đăng ký tham gia Câu lạc bộ Truyền thông và Sáng tạo (09/04/2020)

 
... (05/04/2020)
<br>

THÔNG BÁO: V/v Thay đổi lịch sinh hoạt của một số Câu lạc bộ (05/04/2020)
... (10/12/2019)
<br>
THÔNG BÁO: V/v Công bố lịch sinh hoạt và danh sách các Câu lạc bộ học lại trong học kỳ I năm học 2019 - 2020 (20/11/2019)
<br>
THÔNG BÁO: V/v Hỗ trợ học sinh đăng ký tham gia Câu lạc bộ Khoa học - Kỹ thuật khối 9 (24/09/2019)
... (24/09/2019)
<br>
Xem tất cả
    THÔNG BÁO
    
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
        window.onload = function () {
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleFontColor: "#c5c7cc"
    });
};
    </script>
        
</body>
</html>