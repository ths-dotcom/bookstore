<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>


	<!-- Thanh menu	 -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-inverse bg-light ">
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



    <!-- Slide 3 ảnh -->
	<div class="container-fluid">
		<div class="row">				
			<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">
				    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
				    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
				      	<img src="http://baochinhphu.vn/Uploaded/hoangtrongdien/2020_04_07/thu%20vien.jpg" class="d-block w-100 slide" alt="gai xinh">
					    <div class="carousel-caption d-none d-md-block">
					        <h5>Gặp được một quyển sách hay nên mua liền dù đọc được hay không đọc được, vì sớm muộn gì cũng cần đến nó.</h5>
					        <p>– W.Churchill –</p>
					    </div>
					</div>
					<div class="carousel-item">
					    <img src="https://cdn.tgdd.vn/Files/2021/02/06/1326207/nhung-cau-noi-hay-ve-sach-va-nguoi-doc-sach--2.jpg" class="d-block w-100 slide" alt="...">
					    <div class="carousel-caption d-none d-md-block">
					        <h5>Một cuốn sách hay cho ta một điều tốt, một người bạn tốt cho ta một điều hay.</h5>
					        <p>– Gustavơ Lebon –</p>
					    </div>
					</div>
					<div class="carousel-item">
					    <img src="https://cdn.tgdd.vn/Files/2021/02/06/1326207/nhung-cau-noi-hay-ve-sach-va-nguoi-doc-sach--1.jpg" class="d-block w-100 slide" alt="...">
					    <div class="carousel-caption d-none d-md-block">
					        <h5>Sách hay, cũng như bạn tốt, ít và được lựa chọn; chọn lựa càng nhiều, thưởng thức càng nhiều.</h5>
					        <p>– Louisa May Alcott –</p>
					    </div>
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    		<span class="visually-hidden">Previous</span>
		    	</button>
		    	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</div>

	<br>
	<div class="container">		
		<div class="box">
			<h2 style="text-align:center">Một số sản phẩm tiêu biểu</h2>
		</div>
	</div>
	<br>

	<!-- Kết nối DB -->
	<?php
        $hostName = 'remotemysql.com';
        $userName = 'gZqNASS21b';
        $passWord = '0jDLuMhgCn';
        $databaseName = 'gZqNASS21b';
        $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
        if (!$connect) {
            exit('Kết nối không thành công!');
        }
        $sql="SELECT isbn, tieude, gia, theloai, img_path FROM book
			ORDER BY RAND()
			LIMIT 8";
        $result = mysqli_query($connect, $sql);
        
        echo '<div class="container">
                <div class= "row">';
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                
                echo '<div class="col-md-3">
				<div class="card" style="width: 18rem;">
				   <img class="card-img-top img-thumbnail" src="'
                   . $row['img_path'] . '" style="width:300px;height:300px" alt="Card image cap">
				   <div class="card-body">
						<div class= "row" style="height:60px">
							<h5 class="card-title">' . $row['tieude'] . 
							'</h5>
						</div>
								<div class= "row" style="height:40px">
							<p class="card-text">' . $row['gia'] . 'đ</p>
						</div>
						<a href="bookinfo.php?id='. $row['isbn'] . '" class="btn btn-info">Xem chi tiết >></a>
					</div>
				</div>
				<br>
			</div>';
				
            }
        }
		echo '
			<div class="box">
				<form action="sanpham.php?page=1&theloai=tatca" method="post">
					<div style="text-align:center;">
						<button class="btn btn-outline-success" style="height:50px;width:250px">Xem  thêm sản phẩm >> </button>
					</div>
				</form>
			</div>';
        echo '</div>
        </div>';

		

		echo'<div class="container">		
				<div class="box">
					<hr  width="100%" size="3px" /> 
					<h2 style="text-align:center/">Tin mới</h2>
				</div>
			</div>
			<br>';

			echo'<div class="container">';

			$sql = "select * from news
					limit 4";
            $result = mysqli_query($connect, $sql);
		    if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
				echo '
                    <div class="row">
                        <div class="col-md-3">
                            <img src="'. $row['img_path'] .'" alt="" style="width:265px;height:180px">
                        </div>
                        <div class="col-md-7">
                            <a style="color:black;text-decoration:none" href="' . $row['link'] .'">
                                <h3>' . $row['tieude'] .'</h3>
                            </a >    
                            <p>' . $row['mota'] .'</p>
                        </div>
                    </div>
                    <hr  width="100%" size="3px" /> 
                ';	
			}
		}

		echo '
			<div class="box">
				<form action="tintuc.php" method="post">
					<div style="text-align:center;">
						<button class="btn btn-outline-success" style="height:50px;width:250px">Xem  thêm tin tức >> </button>
					</div>
				</form>
			</div>
			<hr  width="100%" size="3px" /> ';

		echo '</div>
				<br>';
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