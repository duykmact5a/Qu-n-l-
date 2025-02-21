<?php 
    session_start();
    if(!isset($_SESSION["Admin"]))
    {
        header("location:login.php");
    }
?>

<?php
require_once ('dbhelp.php');

$s_ma = $s_ten = $s_sotin = $s_ki ='';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['ma'])) {
		$s_ma = $_POST['ma'];
	}
	if (isset($_POST['ten'])) {
		$s_ten = $_POST['ten'];
	}
	if (isset($_POST['sotin'])) {
		$s_sotin = $_POST['sotin'];
	}

	if (isset($_POST['ki'])) {
		$s_ki = $_POST['ki'];
	}
	if (isset($_POST['id'])) {
		$s_id = $_POST['id'];
	}

	$s_ma    = str_replace('\'', '\\\'', $s_ma);
	$s_ten   = str_replace('\'', '\\\'', $s_ten);
	$s_sotin = str_replace('\'', '\\\'', $s_sotin);
	$s_id    = str_replace('\'', '\\\'', $s_id);
	$s_ki    = str_replace('\'', '\\\'', $s_ki);
	
	if ($s_id != '') {
		//update
		$sql = "UPDATE mon SET ma = '$s_ma', ten = '$s_ten', sotin = '$s_sotin', ki = '$s_ki' WHERE id = " .$s_id;
	} else {
		//insert
		$sql = " INSERT INTO mon (ma,ten,sotin,ki) VALUES ('$s_ma','$s_ten', '$s_sotin', '$s_ki')";
	}

	// echo $sql;

	execute($sql);

	header('Location: panels.php');
	die();
}

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
			<li><a href="admin.php"><em class="fa fa-dashboard">&nbsp;</em> Thông báo </a></li>
			<li><a href="widgets.php"><em class="fa fa-calendar">&nbsp;</em> Lịch trình</a></li>
			<li><a href="charts.php"><em class="fa fa-bar-chart">&nbsp;</em> Biểu đồ </a></li>
			<li><a href="qlsv.php"><em class="fa label-default">&nbsp;</em> Danh sách học sinh</a></li>
			<li class="active"><a href="panels.php"><em class="fa label-default">&nbsp;</em> TÀI CHÍNH CLB </a></li>
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
                <li class="active">Thêm Thành Viên</li>
            </ol>
        </div><!--/.row-->

        <div id="page-wrapper">
            <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><b> Thêm Thành Viên </b></h1>
            </div>
        </div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="ma"> Họ và tên </label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="ma" name="ma" placeholder="Họ và tên">
					</div>
					<div class="form-group">
					  <label for="ten"> Ghi nhận đóng góp </label>
					  <input type="text" class="form-control" id="ten" name="ten" placeholder=" Ghi nhận đóng góp ">
					</div>
					<div class="form-group">
					  <label for="sotin"> Tiền đóng góp </label>
					  <input type="int" class="form-control" id="sotin" name="sotin" placeholder="Tiền đóng góp">
					</div>
					<div class="form-group">
					  <label for="ki">Thời gian đóng góp</label>
					  <input type="text" class="form-control" id="ki" name="ki" placeholder="Thời gian đóng góp">
					</div>
					<button class="btn btn-success">Lưu</button>
					<button class="btn btn-info" onclick="window.open('panels.php', '_self')">Về trang quản lý</button>
				</form>
			</div>
		</div>
	</div>
                        
</body>
</html>
