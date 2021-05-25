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


    <div class="container">
        <h1>Tin tức</h1>
        <br>

        <?php
            $hostName = 'remotemysql.com';
            $userName = 'gZqNASS21b';
            $passWord = '0jDLuMhgCn';
            $databaseName = 'gZqNASS21b';
            $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
            if (!$connect) {
                exit('Kết nối không thành công!');
            }
            $sql = "select * from news";
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

        ?>

        <!-- <div class="row">
            <div class="col-md-3">
                <img src="https://znews-photo.zadn.vn/w360/Uploaded/pgi_cunzgunat/2021_04_16/ngay_hoi_sach.jpg" alt="" style="width:265px;height:180px">
            </div>
            <div class="col-md-9">
                <a href="https://zingnews.vn/ngay-hoi-sach-2021-mo-cua-mien-phi-post1205094.html">
                    <h2 >Ngày hội sách 2021 mở cửa miễn phí</h2>
                </a>
                <p>Hàng nghìn đầu sách được trưng bày trong Ngày hội sách 2021. Lễ khai mạc diễn ra sáng 16/4 tại Thư viện Quốc gia (Tràng Thi - Hà Nội).</p>
            </div>
        </div>
        <hr  width="100%" size="3px" /> -->



    </div>

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