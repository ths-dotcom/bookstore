<?php
// bắt đầu session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Giới thiệu </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

    
    <!-- Thanh menu	 -->
<nav class="navbar navbar-expand-lg navbar-inverse bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="https://freeiconshop.com/wp-content/uploads/edd/book-open-flat.png" style="height:80px; width:80px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
            </li>
			      <li class="nav-item">
              <a class="nav-link" href="sanpham.php?page=1&theloai=tatca">Sản phẩm</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="danghot.php?page=1&theloai=Mới nhất" id="navbarDropdown">Đang hot</a>
              <div class="dropdown-content">
              	<div class="dropdown-divider" href="#"></div>
                <a class="dropdown-item" href="danghot.php?page=1&theloai=Mới nhất">Mới nhất</a>
                <div class="dropdown-divider" href="#"></div>
                <a class="dropdown-item" href="danghot.php?page=1&theloai=Bán chạy nhất">Bán chạy nhất</a>
                <div class="dropdown-divider" href="#"></div>
                <a class="dropdown-item" href="danghot.php?page=1&theloai=Giá tốt nhất">Giá tốt nhất</a>
                <div class="dropdown-divider" href="#"></div>
              </div>
            </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="gioithieu.php" id="navbarDropdown">Giới thiệu</a>
                <div class="dropdown-content">
                  <div class="dropdown-divider" href="#"></div>
                  <a class="dropdown-item" href="gioithieu.php">Liên hệ</a>
                  <div class="dropdown-divider" href="#"></div>                  
                  </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tintuc.php">Tin tức</a>
              </li>
          </ul>
          
          <form action="timkiem.php?page=1" class="d-flex" method="post" style="width:500px">
            <input class="form-control me-2" type="search" placeholder="Tìm sách bạn muốn" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit">Tìm</button>
          </form>

          <a class="navbar-brand" href="giohang.php?id=0">
            <img src="https://png.pngtree.com/png-vector/20191030/ourlarge/pngtree-cart-plain-shoping-trolly-icon-vector-illustration-for-web-png-image_1927620.jpg" style="height:50px; width:50px">
          </a>

        </div>
      </div>
    </nav>
    <br>

    <div class="container" style = "text-align:center">    
          <div class="box">      
            <img src="https://i.pinimg.com/564x/f7/8f/87/f78f879def6bd3af945ce11279d243b0.jpg" alt="" style="height:150px;width:150px;text-align:center">           
            <h2 style="color:green;text-align:center">ĐẶT HÀNG THÀNH CÔNG</h2>
          </div> 
    </div>

    <?php
        $hoten = isset($_POST['hoten']) ? $_POST['hoten'] : 'rong';
        $sodt = isset($_POST['sodt']) ? $_POST['sodt'] : 'rong';
        $email = isset($_POST['email']) ? $_POST['email'] : 'rong';
        $diachi = isset($_POST['diachi']) ? $_POST['diachi'] : 'rong';
        $isbn = isset($_GET['id']) ? $_GET['id'] : 'rong';
        $soluong = isset($_GET['soluong']) ? $_GET['soluong'] : 'rong';

        // echo $isbn . " - " . $soluong . "<br>";
        // echo $hoten . "<br>" . $sodt . "<br>" . $email . "<br>" . $diachi;

        $hostName = 'remotemysql.com';
        $userName = 'gZqNASS21b';
        $passWord = '0jDLuMhgCn';
        $databaseName = 'gZqNASS21b';;
        $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
        if (!$connect) {
            exit('Kết nối không thành công!');
        }

        $sql = "
            insert into customers(hoten, sodt, email, diachi)
            values('$hoten', '$sodt', '$email', '$diachi')
        ";
        if(!mysqli_query($connect, $sql)) echo 'no';

        $sql="select last_insert_id()";
        $id_user;
        $orderNumber;
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $id_user = $row['last_insert_id()'];
            }
        }
        
        $sql = "insert into orders(ngaydat, ngaydukien, customerNumber)
                values (now(), adddate(now(), interval 5 day), $id_user);";
        if(!mysqli_query($connect, $sql)) echo 'no';

        $sql="select last_insert_id()";
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $orderNumber = $row['last_insert_id()'];
            }
        }
        
        //
        if($isbn != 'rong'){
            $gia;
            $sql = "select gia from book
                    where isbn = $isbn";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $gia = $row['gia'];
                }
            }

            $sql = "insert into orderdetails
                    values ($orderNumber, $isbn, $soluong, $gia);";
            if(!mysqli_query($connect, $sql)) echo 'no';
        }
        else {
            foreach($_SESSION['gh'] as $isbn => $soluong) {
                $gia;
                $sql = "select gia from book
                        where isbn = $isbn";
                $result = mysqli_query($connect, $sql);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $gia = $row['gia'];
                    }
                }

                $sql = "insert into orderdetails
                        values ($orderNumber, $isbn, $soluong, $gia);";
                if(!mysqli_query($connect, $sql)) echo 'no';
            }

            foreach($_SESSION['gh'] as $isbn => $soluong) {
              unset($_SESSION['gh'][$isbn]);
            }
        }

        // in ra thông tin đặt hàng thành công
        $sql = "select date(ngaydat) as dat, date(ngaydukien) as dukien 
                from orders
                where orderNumber = $orderNumber";
        $result = mysqli_query($connect, $sql);
        $dat;
        $dukien;
        if(mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            $dat = $row['dat'];
            $dukien = $row['dukien'];
          }
        }

        // echo '
        //   <div class="container" style = "text-align:center">';
        echo '
          <div class="container">    
            <div class="box">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                  <h5 style="margin-left:20px"> -Mã đơn hàng: ' . $orderNumber . '</h5>
                  <h5 style="margin-left:20px"> -Ngày đặt hàng: ' . $dat . '</h5>
                  <h5 style="margin-left:20px"> -Ngày dự kiến nhận hàng: '. $dukien . '</h5>
                  <h5 style="margin-left:20px"> -Hình thức: thanh toán khi nhận hàng</h5>
                  <h5 style="margin-left:20px"> -Cám ơn '. $hoten .' đã đặt hàng!</h5>
                </div>
              </div>
            </div>
          </div>
        ';
    ?>


          <div class="container mt-5">
              <form action="index.php">
                <div class="row">
                  <button class= "btn btn-success">OK</button>
                </div>
              </form>
            </div>

  
  <div class="container-fluid mt-5" style="background-color:#3f51b570">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-1">
				<br>
				<img src="https://freeiconshop.com/wp-content/uploads/edd/book-open-flat.png" style='width:80px;height:80px'>
			</div>
			<div class="col-md-6">
				<br>
				<h7>Địa chỉ: 144 - Xuân Thủy - Cầu Giấy - Hà Nội</h7>
				<br>
				<h7>Email: asdfghjkl@gmail.com</h7>
				<br>
				<h7>Điện thoại: 0969696969</h7>
				<br>
				<br> 
			</div>
			<div class="col-md-4">
				<br>
				<h7>Trương Hoàng Sơn</h7>
				<br>
				<h7>Nguyễn Trần Nhật Anh</h7>
				<br>
				<h7>Nguyễn Tiến Đàn</h7>
				<br>
				<br> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<p>Giấy chứng nhận Đăng ký Kinh doanh số **0304132047** do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp ngày 1/1/2021.</p>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>