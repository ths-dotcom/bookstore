<?php
// bắt đầu session
session_start();
//session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Giỏ hàng </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body >

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


  
  <?php
      $isbn = isset($_GET['id']) ? $_GET['id'] : 'rong';
      $xoa = isset($_GET['xoa']) ? $_GET['xoa'] : 'rong';
      if($xoa!='rong') {
        unset($_SESSION['gh'][$xoa]);
      }
      if($isbn!=0) {
        $_SESSION['gh'][$isbn] = 1;
        setcookie($isbn, 1, time()+3600, "/", "", 0);
        echo $isbn . " " . $_COOKIE[2] . "<br>";
      }
        if(!isset($_SESSION['gh']) || empty($_SESSION['gh'])) {
        // echo 'chua co san pham nao';
        echo
            '<div class="container">
                <div class="row">
                    <h3>Bạn chưa thêm sản phẩm nào vào giỏ hàng </h3>
                </div>
                <br>
            </div>
            <br>
            <div class="container">
              <form action="index.php">
                <div class="row">
                  <button class= "btn btn-success">Về trang chủ</button>
                </div>
              </form>
            </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            
          <div class="container-fluid mt-5" style="background-color:#3f51b570">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-1">
                <br>
                <img src="https://freeiconshop.com/wp-content/uploads/edd/book-open-flat.png" style="width:80px;height:80px">
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
          </div>';
        exit();
      }
      // echo $isbn ;
      echo'
        <form action="muagiohang.php?" method="post">
          <div class="container mb-3">
            <div class="row">  
              <div class="col-md-4">
              </div>
              <div class="col-md-6">
                <h1 style="color:green">Giỏ hàng của bạn </h1>
              </div>  
            </div>
          </div>
          <br>';
          $hostName = 'remotemysql.com';
          $userName = 'gZqNASS21b';
          $passWord = '0jDLuMhgCn';
          $databaseName = 'gZqNASS21b';
      $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
      if (!$connect) {
        exit('Kết nối không thành công!');
      }

      foreach($_SESSION['gh'] as $isbn => $soluong) {
        $sql="SELECT isbn, tieude, gia, img_path FROM book
			  WHERE isbn = $isbn";
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo '
                <div class="container mb-4 pt-3 pb-3" style="background-color:#e2dcdc80">
                  <div class="row">
                      <div class="col-md-2">
                          <img src="' . $row['img_path'] .'" alt="" style="height:200px;width:170px">
                      </div>
                      <div class="col-md-10">                         
                          <h4>Tên sản phẩm: '. $row['tieude'] . '</h4>              
                          <h5>Mã: '. $row['isbn'] .'</h5>
                          <h5>Giá: '. $row['gia'] .'</h5>
                          <h5>Số lượng: </h5>
                          <input type="number" style="width:70px" value="'. $soluong .'" name="'. $isbn .'">
                          <br>
                          <div class="row">
                            <div class="col-md-10">                             
                                <a href="bookinfo.php?id='. $row['isbn'] .'" class="btn btn-info mt-1">Xem chi tiết>></a>
                            </div>
                            <div class="col-md-2">
                              <a href="giohang.php?id=0&xoa=' . $row['isbn'] . '" class="btn btn-danger mt-1">Xóa khỏi giỏ hàng</a>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>';
            }
        }
      }

      echo' 
          <div class="container">
            <div class="row">
              <div class="col-md-10">
              </div>
              <div class="col-md-2">
                <button class="btn btn-success" style="height:70px;width:200px">  Mua hàng </button>
              </div>
            </div>
          </div>
        </form>';
      
  ?>
	

  
  
  <br>
    <div class="container-fluid" style="background-color:#3f51b570">
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